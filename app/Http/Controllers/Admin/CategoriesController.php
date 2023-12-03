<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category', compact('categories'));
    }

    public function create()
    {
        return view('admin.category-create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        // Create a new category
        Category::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('admin.category')->with('success', 'Category added successfully!');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category-edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        // Update the category
        Category::where('id', $id)->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('admin.category')->with('success', 'Category updated successfully!');
    }

    public function delete($id)
    {
        // Find and delete the category
        Category::find($id)->delete();

        return redirect()->route('admin.category')->with('success', 'Category deleted successfully!');
    }
}