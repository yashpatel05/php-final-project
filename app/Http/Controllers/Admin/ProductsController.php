<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Brand;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::with(['subCategory', 'brand'])->get();
        return view('admin.product', compact('products'));
    }

    public function create()
    {
        $subcategories = SubCategory::all();
        $brands = Brand::all();

        return view('admin.product-create', compact('subcategories', 'brands'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'size' => 'required|string',
            'colour' => 'required|string',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'brand_id' => 'required|exists:brands,id',
        ]);

        // Upload product image
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('assets/img/product'), $imageName);

        // Create a new product
        Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
            'image' => $imageName,
            'size' => $request->input('size'),
            'colour' => $request->input('colour'),
            'sub_category_id' => $request->input('sub_category_id'),
            'brand_id' => $request->input('brand_id'),
        ]);

        return redirect()->route('admin.product')->with('success', 'Product added successfully!');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $subcategories = SubCategory::all();
        $brands = Brand::all();

        return view('admin.product-edit', compact('product', 'subcategories', 'brands'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'size' => 'required|string',
            'colour' => 'required|string',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'brand_id' => 'required|exists:brands,id',
        ]);

        // Find the product
        $product = Product::find($id);

        // Update the product details
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->size = $request->input('size');
        $product->colour = $request->input('colour');
        $product->sub_category_id = $request->input('sub_category_id');
        $product->brand_id = $request->input('brand_id');

        // Check if a new image is provided
        if ($request->hasFile('image')) {
            // Handle file upload
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('assets/img/product'), $imageName);

            // Update the product image
            $product->image = $imageName;
        }

        // Save the changes
        $product->save();

        return redirect()->route('admin.product')->with('success', 'Product updated successfully!');
    }

    public function delete($id)
    {
        // Find and delete the product
        Product::find($id)->delete();

        return redirect()->route('admin.product')->with('success', 'Product deleted successfully!');
    }
}