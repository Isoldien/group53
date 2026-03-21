<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, int $productId)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        $product = Product::findOrFail($productId);

        Review::create([
            'product_id' => $product->product_id,
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'comment' => $request->comment,
            'review_date' => now(),
        ]);

        return redirect()->back()->with('success', 'Review submitted successfully!');
    }

    public function update(Request $request, Review $review)
    {
        if (Auth::id() !== $review->user_id) {
            return redirect()->back()->withErrors(['error' => 'You are not authorized to edit this review.']);
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        $review->update([
            'rating' => $request->rating,
            'comment' => $request->comment,
            'review_date' => now(),
        ]);

        return redirect()->back()->with('success', 'Review updated successfully!');
    }

    public function destroy(Review $review)
    {
        if (Auth::id() !== $review->user_id) {
            return redirect()->back()->withErrors(['error' => 'You are not authorized to delete this review.']);
        }

        $review->delete();

        return redirect()->back()->with('success', 'Review deleted successfully!');
    }
}
