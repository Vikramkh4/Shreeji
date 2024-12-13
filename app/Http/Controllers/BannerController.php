<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Helpers\helper;
use Illuminate\Support\Facades\Storage;




class BannerController extends Controller
{
    // Show the form to create a banner
    public function create()
    {
        return view('banners.create');
    }

    // Store the banner in the database
    public function store(Request $request)
    {
   
        $request->validate([
            'image' => 'required|image', // Ensuring the uploaded file is an image
 
            'link' => 'nullable|url',
        ]);
     // image compresor
        $newName  =   helper::compressImage('banners' ,'image' ,$request);

        // Create banner
        Banner::create([
            'title' => $request->input('title'),
            'image' => $newName, // Save the new file name to the database
            'description' => $request->input('description'),
            'link' => $request->input('link'),
        ]);
    
        // Redirect back to the banner index page with success message
        return redirect()->route('banners.index')->with('success', 'Banner created successfully!');
    }
    
    // Show all banners
    public function index()
    {
        // Fetch all banners from the database
        $banners = Banner::all();
    
        // Return the 'index' view inside a 'banners' directory and pass the banners data to the view
        return view('banners.index', ['banners' => $banners]);
    }
    
    // Show form to edit a banner
    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('banners.edit', compact('banner'));
    }

    // Update a banner
   // Update a banner
public function update(Request $request, $id)
{
    $request->validate([
        'image' => 'nullable|image',
        'link' => 'nullable|url',
    ]);

    $banner = Banner::findOrFail($id);
    $newName = "";
    // Handle image upload
    if ($request->hasFile('image')) {
       $newName  =  helper::compressImage('banners' ,'image' , $request,  $banner->image);
      
    }

    // Update banner details
    $banner->title = $request->input('title');
    $banner->description = $request->input('description');
    $banner->link = $request->input('link');
    $banner->image = $newName;

    // Save the changes
    $banner->save();

    return redirect()->route('banners.index')->with('success', 'Banner updated successfully!');
}

    // Delete a banner
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();

        return redirect()->route('banners.index')->with('success', 'Banner deleted successfully!');
    }
}
