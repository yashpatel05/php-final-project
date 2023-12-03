<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;

class MyAccountController extends Controller
{
    public function index()
    {
        $id = session('user_id');
        $user = User::find($id);

        // Get data from the database
        $categories = Category::with('subcategories')->get();

        return view('user.myaccount', compact('user', 'categories'));
    }
}