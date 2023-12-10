<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Feedback;
use App\Models\User;
use App\Models\Product;

class FeedbackController extends Controller
{
    public function index()
    {
        // Get the user ID from the session
        $userId = session('user_id');

        // Find the user by ID
        $user = User::find($userId);

        if ($user) {
            // User is logged in, fetch only the feedbacks given by the user
            $feedbacks = Feedback::where('user_id', $userId)
                ->join('products', 'feedbacks.product_id', '=', 'products.id')
                ->paginate(5);
        } else {
            // User is not logged in, fetch all feedbacks
            $feedbacks = Feedback::join('users', 'feedbacks.user_id', '=', 'users.id')
                ->join('products', 'feedbacks.product_id', '=', 'products.id')
                ->paginate(5);
        }

        // Get data from the database
        $categories = Category::with('subcategories')->get();

        return view('user.feedback', compact('feedbacks', 'categories'));
    }

    public function create()
    {
        // Get all products from the database
        $products = Product::all();

        // Get data from the database
        $categories = Category::with('subcategories')->get();

        return view('user.feedback-create', compact('categories', 'products'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'feedback' => 'required',
        ]);

        // Get the user ID from the session
        $userId = session('user_id');

        // Create a new feedback record
        Feedback::create([
            'product_id' => $request->input('product_id'),
            'user_id' => $userId,
            'feedback' => $request->input('feedback'),
        ]);

        return redirect()->route('feedback')->with('success', 'Feedback added successfully!');
    }
}