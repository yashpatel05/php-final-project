<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Category;

class CartController extends Controller
{
    public function index()
    {
        $categories = Category::with('subcategories')->get();

        // Check if the user is logged in
        if (!session()->has('user_id')) {
            // User is not logged in, redirect to login page
            return redirect()->route('login')->with('error', 'Please log in to view your cart');
        }

        // Get the user id
        $user_id = session('user_id');

        // Fetch all items added by the current user
        $cartItems = Cart::where('user_id', $user_id)->get();

        return view('user.cart', compact('cartItems', 'categories'));
    }

    public function store(Request $request)
    {
        // Check if the user is logged in
        if (!session()->has('user_id')) {
            // User is not logged in, redirect to login page
            return redirect()->route('login')->with('error', 'Please log in to add items to the cart');
        }

        // Validate the request
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'product_price' => 'required|numeric|min:0',
        ]);

        // Get the user id
        $user_id = session('user_id');

        // Add to cart
        $cartItem = new Cart([
            'user_id' => $user_id,
            'product_id' => $request->input('product_id'),
            'quantity' => $request->input('quantity'),
            'price' => $request->input('product_price'),
        ]);

        $cartItem->save();

        return redirect()->route('home')->with('success', 'Item added to cart successfully');
    }

    public function delete($id)
    {
        Cart::where('product_id', $id)->delete();

        // Redirect back to the cart page
        return redirect()->route('cart')->with('success', 'Item deleted successfully');
    }
}
