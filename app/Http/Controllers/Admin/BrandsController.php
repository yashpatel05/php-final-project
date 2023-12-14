<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand', compact('brands'));
    }

    public function create()
    {
        return view('admin.brand-create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle file upload
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('assets/img/product'), $imageName);

        // Create a new brand
        Brand::create([
            'name' => $request->input('name'),
            'logo' => $imageName, // Store the image name in the database
        ]);

        return redirect()->route('admin.brand')->with('success', 'Brand added successfully!');
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.brand-edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Find the brand
        $brand = Brand::find($id);

        // Update the brand name
        $brand->name = $request->input('name');

        // Check if a new logo is provided
        if ($request->hasFile('logo')) {
            // Handle file upload
            $imageName = time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('assets/img/product'), $imageName);

            // Update the brand logo
            $brand->logo = $imageName;
        }

        // Save the changes
        $brand->save();

        return redirect()->route('admin.brand')->with('success', 'Brand updated successfully!');
    }

    public function delete($id)
    {
        // Find and delete the brand
        Brand::find($id)->delete();

        return redirect()->route('admin.brand')->with('success', 'Brand deleted successfully!');
    }
}
