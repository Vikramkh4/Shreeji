<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\FeatureProduct;
use Illuminate\Http\Request;

class FeatureProductController extends Controller
{
    // Display the add feature product form
    public function create()
    {
      
        // Fetch all products to populate the dropdown
        $products = Product::all();
        return view('feature_products.create', compact('products'));
    }
    public function edit($id)
{
    // Fetch the feature product by ID
    $featuredProduct = FeatureProduct::findOrFail($id);

    // Fetch all products to populate the dropdown
    $products = Product::all();

    // Return the edit view with the featured product and products list
    return view('feature_products.edit', compact('featuredProduct', 'products'));
}

public function update(Request $request, $id)
{
    // Validate the incoming request data
    $request->validate([
        'products_id' => 'required|exists:products,id',
        'status' => 'required|boolean',
    ]);

    // Find the feature product and update it
    $featuredProduct = FeatureProduct::findOrFail($id);
    $featuredProduct->update([
        'products_id' => $request->products_id,
        'status' => $request->status,
    ]);

    // Redirect back with success message
    return redirect()->route('feature_products.index')->with('success', 'Feature Product updated successfully!');
}

    public function index()
    {
        $featuredProducts = FeatureProduct::with('product')->get();

        return view('feature_products.index', compact('featuredProducts'));
    }
    // Store the new feature product
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'products_id' => 'required|exists:products,id', // Ensure the product exists
            'status' => 'required|boolean', // Status should be boolean (featured or not)
        ]);

        // Create a new feature product
        FeatureProduct::create([
            'products_id' => $request->products_id,
            'status' => $request->status,
        ]);

        // Redirect back with success message
        return redirect()->route('feature_products.create')->with('success', 'Feature Product added successfully!');
    }
    public function destroy($id)
{
    // Find the feature product by ID
    $featuredProduct = FeatureProduct::findOrFail($id);

    // Delete the feature product
    $featuredProduct->delete();

    // Redirect back with success message
    return redirect()->route('feature_products.index')->with('success', 'Feature Product deleted successfully!');
}

}
