<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

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
        'video' => 'nullable|file|mimes:mp4,avi,mov,mkv|max:20480',
        'color_images' => 'nullable|array',
    ]);

    // Handle file uploads for product photos
    $photos = $this->handlePhotoUploads($request);

    // Handle colors and their images
    // Handle colors and their images
$colors = $this->handleColorInputs($request, null);
 $videoPath = null;
    if ($request->hasFile('videos')) {
        $videoFile = $request->file('videos')[0]; // Access the first video if there are multiple
        $videoPath = $videoFile->store('products/videos', 'public');
    }

    // Retrieve the category name from the Category model
    $category = Category::find($request->input('category'));

    // Create and save the new product
    $product = new Product();
    $product->name = $request->input('name');
   $product->description = strip_tags($request->input('description'));

    $product->brandname = $request->input('brandname');
    $product->ytlink = $request->input('ytlink');
    $product->photos = $photos;
    $product->video = $videoPath;
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
    // Fetch products with their categories, ordered by newest first
    $products = Product::with('category')->orderBy('created_at', 'desc')->get();
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
         'video' => 'nullable|file|mimes:mp4,avi,mov,mkv|max:20480',
    ]);

    // Retrieve the product to be updated
    $product = Product::findOrFail($id);

    // Preserve old photos or handle new photos
    $photos = json_decode($product->photos, true) ?? [];

    if ($request->hasFile('photos')) {
        $uploadedPhotos = $this->handlePhotoUploads($request);
        $photos = array_merge($photos, $uploadedPhotos);
    }

    // Reorder photos based on input
    if ($request->has('photo_order')) {
        $photoOrder = $request->input('photo_order');
        $photos = array_values(array_intersect($photoOrder, $photos)); // Reorder based on input
    }


    // Handle colors and their images (if new colors/images are provided)
    $colors = $this->handleColorInputs($request, $product);
     $videoPath = null;
    if ($request->hasFile('videos')) {
        $videoFile = $request->file('videos')[0]; // Access the first video if there are multiple
        $videoPath = $videoFile->store('products/videos', 'public');
    }

    // Update the product fields
    $product->name = $request->input('name');
    $product->description = strip_tags($request->input('description'));
    $product->brandname = $request->input('brandname');
    $product->ytlink = $request->input('ytlink');
    $product->price = $request->input('price');
    $product->video = $videoPath; // Save video path
    $product->review = $request->input('review');
    $product->category_id = $request->input('category'); // Update the category ID

    // Update colors if new ones are provided
    $product->photos = json_encode($photos);
    $product->colors = json_encode($colors);

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
   private function handleColorInputs(Request $request, ?Product $product = null)
{
    $colors = [];

    // Decode existing colors if the product is available
    $existingColors = $product ? json_decode($product->colors, true) ?? [] : [];

    if ($request->has('colors')) {
        $colorNames = $request->input('colors');
        $colorImages = $request->file('color_images');

        foreach ($colorNames as $index => $colorName) {
            // Check if there is a new image for the color
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
            } else {
                // If no new image is uploaded, keep the old one (if available)
                $colors[] = [
                    'name' => $colorName,
                    'image' => $existingColors[$index]['image'] ?? null, // Keep existing image if available
                ];
            }
        }
    }

    return $colors;
}


    
    // Handle file uploads
    private function handlePhotoUploads(Request $request)
    {
        $photos = [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                try {
                    $path = $photo->store('public/products');
                    $photos[] = $path;
                } catch (\Exception $e) {
                    return redirect()->back()->with('error', 'File upload failed: ' . $e->getMessage());
                }
            }
        }
        return json_encode($photos);
    }
}
