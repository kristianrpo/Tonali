<?php

namespace App\Http\Controllers;

use App\Models\Colorimetry;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use App\Utils\ProductRecommendation;

class ProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['products'] = Product::all();

        return view('product.index')->with('viewData', $viewData);
    }

    public function show(int $id): View
    {
        $viewData = [];

        $product = Product::with('reviews')->findOrFail($id);

        $averageRating = $product->getAverageRating();
        $calculatedStars = floor($averageRating);

        $userId = Auth::id();

        $viewData['product'] = $product;
        $viewData['relatedProducts'] = Product::where('id', '>', 10)->get();
        $viewData['averageRating'] = $averageRating;
        $viewData['calculatedStars'] = $calculatedStars;
        $viewData['userId'] = $userId;

        return view('product.show')->with('viewData', $viewData);
    }

    public function search(Request $request): View
    {
        $query = $request->input('query');
        $products = Product::where('name', 'like', '%'.$query.'%')
            ->orWhere('brand', 'like', '%'.$query.'%')
            ->get();

        return view('product.index')->with('viewData', ['products' => $products]);
    }

    public function recommended(): View|RedirectResponse
    {
        $userId = Auth::user()->getId();
        $colorimetry = Colorimetry::where('user_id', $userId)->first();
        $viewData = [];

        if(!$colorimetry)
        {
            $viewData['colorimetry'] = null;
            $viewData['recommendation'] = null;
            return view('product.recommended')->with('viewData', $viewData);
        }

        $products = Product::select('id', 'description')->get();

        $aiGeneratedResponse = ProductRecommendation::recommendation($products,$colorimetry);
        $cleanedResponse = trim(preg_replace('/^```json|\s+|```$/', '', $aiGeneratedResponse));
        $productIds = json_decode($cleanedResponse, true);

        if (!is_array($productIds) || is_array($productIds) && empty($productIds)) 
        {
            Session::flash('error', __('product.error_recommended'));
            return redirect()->route('home.index');
        }

        $recommendedProducts = Product::whereIn('id', $productIds)->get();
        $viewData['colorimetry'] = $colorimetry;
        $viewData['recommendation'] = $recommendedProducts;

        return view('product.recommended')->with('viewData', $viewData);
    }
}
