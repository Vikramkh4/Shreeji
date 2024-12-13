<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Helpers\helper;


class ProductController extends Controller
{
    // Show the form
    public function product()
    {
        $categories = Category::all(); // Fetch all categories
        return view('products', compact('categories')); // Pass categories to the view
    }

    // Store the form data into the database
    public function store(Request $request)
{
    // $request->validate([
    //     'name' => 'required',
    //     'description' => 'required',
    //     'brandname' => 'required',
    //     'photos' => 'nullable|array',
    //     'price' => 'required|numeric',
    //     'review' => 'nullable|string',
    //     'category' => 'required|exists:categories,id',
    //     'colors' => 'nullable|array',
    //     'color_images' => 'nullable|array',
    // ]);

    // Handle file uploads for product photos
    $photos = helper::compressMultipleImages('products' ,'photos' ,$request);
    

   
    // Handle colors and their images
    $colors = $this->handleColorInputs($request) ?? [];
    
    
    

    // Retrieve the category name from the Category model
    $category = Category::find($request->input('category'));

    // Create and save the new product
    $product = new Product();
    $product->name = $request->input('name');
    $product->description = $request->input('description');
    $product->brandname = $request->input('brandname');
    $product->ytlink = $request->input('ytlink');
    $product->photos = $photos;
    $product->price = $request->input('price');
    $product->review = $request->input('review');
    $product->category_id = $category->id; // Store category ID
    $product->category = $category->name; // Store category name
    $product->colors = json_encode($colors); // Store colors and images as JSON

    $product->save();

    return redirect()->route('products.list')->with('success', 'Product added successfully!');
}

    

    // Show all products
    public function showProducts()
    {
        $products = Product::with('category')->get(); // Eager loading category
        return view('prtable', ['products' => $products]);
    }

    // Show the edit form
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all(); // Pass categories for editing
        return view('edit-product', compact('product', 'categories'));
    }

    // Update the product
  // Update the product
// Update the product
public function update(Request $request, $id)
{
    // Validate incoming request
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'brandname' => 'required',
        'ytlink' => 'nullable|url',
        'photos' => 'nullable|array',
        'price' => 'required|numeric',
        'review' => 'nullable|string',
        'category' => 'required|exists:categories,id',
        'colors' => 'nullable|array',
        'color_images' => 'nullable|array',
    ]);

    // Retrieve the product to be updated
    $product = Product::findOrFail($id);

    // Preserve old photos or handle new photos
    if ($request->hasFile('photos')) {
        // Handle photo uploads as done in the store method
        $product->photos = $this->handlePhotoUploads($request);
    }

    // Handle colors and their images (if new colors/images are provided)
    $colors = $this->handleColorInputs($request);

    // Update the product fields
    $product->name = $request->input('name');
    $product->description = $request->input('description');
    $product->brandname = $request->input('brandname');
    $product->ytlink = $request->input('ytlink');
    $product->price = $request->input('price');
    $product->review = $request->input('review');
    $product->category_id = $request->input('category'); // Update the category ID

    // Update colors if new ones are provided, otherwise keep old colors
    if (!empty($colors)) {
        $product->colors = json_encode($colors); // Update colors and images as JSON
    }

    // Save the product
    $product->save();

    return redirect()->route('products.list')->with('success', 'Product updated successfully!');
}




    // Delete the product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.list')->with('success', 'Product deleted successfully!');
    }
    private function handleColorInputs(Request $request)
    {
        $colors = [];
    
        // Check if colors and color_images arrays exist
        if ($request->has('colors') && $request->hasFile('color_images')) {
            $colorNames = $request->input('colors');
            $colorImages = $request->file('color_images');
    
            foreach ($colorNames as $index => $colorName) {
                // Handle image upload for the corresponding color
                if (isset($colorImages[$index])) {
                    try {
                        $imagePath = $colorImages[$index]->store('public/colors');
                        $colors[] = [
                            'name' => $colorName,
                            'image' => $imagePath,
                        ];
                    } catch (\Exception $e) {
                        return redirect()->back()->with('error', 'Color image upload failed: ' . $e->getMessage());
                    }
                }
            }
        }
    
        return $colors; // Return colors as an array of associative arrays
    }
    
    // Handle file uploads
    private function handlePhotoUploads(Request $request)
    {
        $photos = [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                try {
                   
                    $photos[] = $path;
                } catch (\Exception $e) {
                    return redirect()->back()->with('error', 'File upload failed: ' . $e->getMessage());
                }
            }
        }
        return json_encode($photos);
    }
}
