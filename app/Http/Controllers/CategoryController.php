<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    // List all categories
    public function index()
    {
        $categories = Category::all();
        return view('catgtable', compact('categories'));
    }

    // Show form to create a new category
    public function create()
    {
        return view('addcateg');
    }

    // Store a new category in the database
    public function store(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image', // Ensure it's an image
            'description' => 'nullable|string',
        ]);
    
        
       // Handling file upload
        $newName = "";
        if ($request->hasFile('image')) {
            // Check if the file is valid
            $file = $request->file('image');
            $newName = time() . '_' . $file->getClientOriginalName(); // Generate a unique name using the current timestamp
            $file->move(public_path('categories'), $newName); // Move the file to the public/banners directory
        }
        Category::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image' => $newName,
        ]);
    
        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }
    
    

    // Show form to edit an existing category
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('editcateg', compact('category'));
    }

    // Update an existing category in the database
    // Update an existing category in the database
public function update(Request $request, $id)
{
    // Find the category by its ID
    $category = Category::findOrFail($id);

    // Validate the request
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image', // Ensure it's an image
    ]);

    // Handle image upload
    if ($request->hasFile('image')) {
        // Delete the old image if it exists
        if ($category->image && file_exists(public_path('categories/' . $category->image))) {
            unlink(public_path('categories/' . $category->image));
        }

        // Store the new image
        $file = $request->file('image');
        $newName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('categories'), $newName);

        // Update the image field with the new image name
        $category->image = $newName;
    }

    // Update the category details
    $category->name = $request->input('name');
    $category->description = $request->input('description');
    
    // Save the updated category data
    $category->save();

    return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
}



    // Delete a category
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
