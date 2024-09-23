<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        $userId = Auth::user()->getId();
        Review::validate($request);

        $review = new Review;
        $review->setRating($request->input('rating'));
        $review->setTitle($request->input('title'));
        $review->setDescription($request->input('description'));
        $review->setProductId($productId);
        $review->setUserId($userId);
        $review->save();

        $product = Product::findOrFail($productId);
        $product->addReviewWithRating($request->input('rating'));

        Session::flash('success', __('review.add_success'));

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
        $product->updateReviewWithRating($review->getRating(), $request->input('rating'));

        $review->setRating($request->input('rating'));
        $review->setTitle($request->input('title'));
        $review->setDescription($request->input('description'));
        $review->save();

        Session::flash('success', __('review.update_success'));

        return redirect()->route('product.show', $review->getProduct()->getId());
    }

    public function delete(int $id): RedirectResponse
    {
        $review = Review::findOrFail($id);

        $product = Product::findOrFail($review->getProduct()->getId());
        $product->deleteReviewWithRating($review->getRating());
        Review::destroy($id);

        Session::flash('success', __('review.delete_success'));

        return redirect()->route('product.show', $review->getProduct()->getId());
    }

    public function report(int $id): View
    {
        $viewData = [];
        $review = Review::findOrFail($id);
        $viewData['review'] = $review;

        return view('review.report')->with('viewData', $viewData);
    }

    public function validateReport(Request $request, int $id): RedirectResponse
    {
        $review = Review::findOrFail($id);
        $reportTitle = $request->input('title');
        $reportDescription = $request->input('description');
        $aiGeneratedResponse = $review->report($reportTitle, $reportDescription);
        $aiDecision = strtolower(trim(explode("\n", $aiGeneratedResponse)[0]));
        if ($aiDecision === 'delete') {
            $product = Product::findOrFail($review->getProduct()->getId());
            $product->deleteReviewWithRating($review->getRating());
            Review::destroy($id);
        }

        Session::flash('success', __('review.report_success'));

        return redirect()->route('product.show', $review->getProduct()->getId());
    }
}
