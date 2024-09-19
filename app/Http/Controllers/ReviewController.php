<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function create(int $productId): View
    {
        $viewData = [];
        $product = Product::findOrFail($productId);
        $viewData['product'] = $product;

        return view('review.create')->with('viewData', $viewData);
    }

    public function store(Request $request, int $productId): RedirectResponse
    {
        $userId = Auth::id();
        Review::validate($request);

        $review = new Review;
        $review->setRating($request->input('rating'));
        $review->setTitle($request->input('title'));
        $review->setDescription($request->input('description'));
        $review->setProductId($productId);
        $review->setUserId($userId);
        $review->save();

        $product = Product::findOrFail($productId);
        $product->setSumRatings($product->getSumRatings() + $request->input('rating'));
        $product->setQuantityReviews($product->getQuantityReviews() + 1);
        $product->save();

        return redirect()->route('product.show', $productId);
    }

    public function edit(int $id): View
    {
        $viewData = [];
        $review = Review::findOrFail($id);
        $viewData['review'] = $review;

        return view('review.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $review = Review::findOrFail($id);
        Review::validate($request);

        $product = Product::findOrFail($review->getProduct()->getId());
        $product->setSumRatings($product->getSumRatings() - $review->getRating() + $request->input('rating'));
        $product->save();

        $review->setRating($request->input('rating'));
        $review->setTitle($request->input('title'));
        $review->setDescription($request->input('description'));
        $review->save();

        return redirect()->route('product.show', $review->getProduct()->getId());
    }

    public function delete(int $id): RedirectResponse
    {
        $review = Review::findOrFail($id);
        Review::destroy($id);

        $product = Product::findOrFail($review->getProduct()->getId());
        $product->setSumRatings($product->getSumRatings() - $review->getRating());
        $product->setQuantityReviews($product->getQuantityReviews() - 1);
        $product->save();

        return back();
    }
}
