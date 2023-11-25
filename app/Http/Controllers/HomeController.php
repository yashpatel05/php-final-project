<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\Feedback;

class HomeController extends Controller
{
    public function index()
    {
        // Get data from the database
        $categories = Category::with('subcategories')->get();
        $products = Product::with('subcategory')->get();
        $feedbacks = Feedback::with(['user', 'product'])->get();

        return view('user.index', compact('categories', 'products', 'feedbacks'));
    }
}
