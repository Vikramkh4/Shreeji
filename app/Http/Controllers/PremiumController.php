<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Premium;

use Illuminate\Http\Request;

class PremiumController extends Controller
{
    // Display the add Premium Product form
    public function create()
    {
      
        // Fetch all products to populate the dropdown
        $products = Product::all();
        return view('premium.create', compact('products'));
    }
    public function edit($id)
{
    // Fetch the Premium Product by ID
    $premiumProduct = Premium::findOrFail($id);

    // Fetch all products to populate the dropdown
    $products = Product::all();

    // Return the edit view with the featured product and products list
    return view('premium.edit', compact('premiumProduct', 'products'));
}

public function update(Request $request, $id)
{
    // Validate the incoming request data
    $request->validate([
        'products_id' => 'required|exists:products,id',
        'status' => 'required|boolean',
    ]);

    // Find the Premium Product and update it
    $premiumProduct = Premium::findOrFail($id);
    $premiumProduct->update([
        'products_id' => $request->products_id,
        'status' => $request->status,
    ]);

    // Redirect back with success message
    return redirect()->route('premium.index')->with('success', 'Premium Product updated successfully!');
}

    public function index()
    {
        $premiumProducts = Premium::with('product')->get();

        return view('premium.index', compact('premiumProducts'));
    }
    // Store the new Premium Product
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'products_id' => 'required|exists:products,id', // Ensure the product exists
            'status' => 'required|boolean', // Status should be boolean (featured or not)
        ]);

        // Create a new Premium Product
        Premium::create([
            'products_id' => $request->products_id,
            'status' => $request->status,
        ]);

        // Redirect back with success message
        return redirect()->route('premium.create')->with('success', 'Premium Product added successfully!');
    }
    public function destroy($id)
{
    // Find the Premium Product by ID
    $premiumProduct = Premium::findOrFail($id);

    // Delete the Premium Product
    $premiumProduct->delete();

    // Redirect back with success message
    return redirect()->route('premium.index')->with('success', 'Premium Product deleted successfully!');
}

}
