<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;

class AboutUsController extends Controller
{
    public function index()
    {
        // Get data from the database
        $categories = Category::with('subcategories')->get();

        return view('user.aboutus', compact('categories'));
    }
}
