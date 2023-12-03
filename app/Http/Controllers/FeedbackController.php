<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::join('users', 'feedbacks.user_id', '=', 'users.id')
            ->join('products', 'feedbacks.product_id', '=', 'products.id')
            ->get();

        // Get data from the database
        $categories = Category::with('subcategories')->get();

        return view('user.feedback', compact('feedbacks', 'categories'));
    }
}