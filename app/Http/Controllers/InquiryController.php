<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Inquiry;

class InquiryController extends Controller
{
    public function create()
    {
        return view('inquiry'); // Make sure this points to your form view
    }

    public function store(Request $request)
{
    // Validate the form input
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:15',
        'address' => 'required|string|max:255',
        'products' => 'required|array',
        'products.*.name' => 'required|string|max:255',
        'products.*.size' => 'required|string|max:50',
        'products.*.color' => 'required|string|max:50',
        'products.*.quantity' => 'required|integer|min:1',
        'message' => 'required|string',
    ]);

    // Encode products properly into JSON format
    $products = json_encode($request->products);

    // Store the inquiry and products
    $inquiry = Inquiry::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        'message' => $request->message,
        'products' => $products, // Store products as a properly formatted JSON string
    ]);



    return redirect()->back()->with('success', 'Your inquiry has been submitted!');
}

    

    public function index()
    {
        $inquiries = Inquiry::all();
        return view('iqtable', compact('inquiries'));
    }

    public function edit($id)
    {
        $inquiry = Inquiry::findOrFail($id);
        return view('editinqury', compact('inquiry'));
    }

    public function update(Request $request, $id)
    {
        $inquiry = Inquiry::findOrFail($id);
    
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string',
            'products' => 'required|array',
            'products.*.name' => 'required|string|max:255',
            'products.*.quantity' => 'required|integer|min:1',
            'message' => 'required|string',
        ]);
    
        $inquiry->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'message' => $request->message,
            'products' => json_encode($request->products), // Store products as JSON
        ]);
    
        return redirect()->route('inquiries.list')->with('success', 'Inquiry updated successfully.');
    }
    

    public function destroy($id)
    {
        $inquiry = Inquiry::findOrFail($id);
        $inquiry->delete();
        
        return redirect()->route('inquiries.list')->with('success', 'Inquiry deleted successfully.');
    }
}