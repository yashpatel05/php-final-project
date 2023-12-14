<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Category;

class WishlistController extends Controller
{
    public function index()
    {
        $categories = Category::with('subcategories')->get();

        $user_id = session('user_id');

        // Retrieve the wishlist items for the user
        $wishlistItems = Wishlist::where('user_id', $user_id)->get();

        return view('user.wishlist', compact('wishlistItems', 'categories'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        // Get the user id
        $user_id = session('user_id');

        // Check if the product is already in the wishlist
        $existingWishlistItem = Wishlist::where('user_id', $user_id)
            ->where('product_id', $request->product_id)
            ->first();

        if (!$existingWishlistItem) {
            // Add the product to the wishlist
            Wishlist::create([
                'user_id' => $user_id,
                'product_id' => $request->product_id,
            ]);

            return redirect()->route('home')->with('success', 'Product added to wishlist successfully.');
        } else {
            return redirect()->back()->with('error', 'Product is already in the wishlist.');
        }
    }

    public function delete($id)
    {
        // Find the wishlist item based on product_id
        $wishlistItem = Wishlist::where('product_id', $id)->firstOrFail();

        // Check if the user owns the wishlist item
        if (session('user_id') !== $wishlistItem->user_id) {
            abort(403, 'Unauthorized action.');
        }

        // Delete the wishlist item
        $wishlistItem->delete();

        return redirect()->route('wishlist.index')->with('success', 'Product removed from wishlist.');
    }
}
