<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubCategoriesController extends Controller
{
    public function index()
    {
        $subCategories = Subcategory::with('category')->get();
        return view('admin.subcategory', compact('subCategories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.subcategory-create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'category' => 'required|exists:categories,id',
        ]);

        // Create a new sub-category
        SubCategory::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'category_id' => $request->input('category'),
        ]);

        return redirect()->route('admin.subcategory')->with('success', 'Sub-category added successfully!');
    }

    public function edit($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $categories = Category::all();

        return view('admin.subcategory-edit', compact('subCategory', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'category' => 'required|exists:categories,id',
        ]);

        // Find the sub-category and update its details
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'category_id' => $request->input('category'),
        ]);

        return redirect()->route('admin.subcategory')->with('success', 'Sub-category updated successfully!');
    }

    public function delete($id)
    {
        // Find and delete the category
        Subcategory::find($id)->delete();

        return redirect()->route('admin.subcategory')->with('success', 'Sub-Category deleted successfully!');
    }
}