<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Contact;

class ContactUsController extends Controller
{
    public function index()
    {
        // Get data from the database
        $categories = Category::with('subcategories')->get();

        return view('user.contactus', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'nullable|numeric|digits:10',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        Contact::create($request->all());

        return redirect()->route('home')->with('success', 'Your message has been sent successfully!');
    }
}
