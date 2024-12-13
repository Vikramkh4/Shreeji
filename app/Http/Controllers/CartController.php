<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade as Cart; // Correct Cart import

class CartController extends Controller
{
    // Add product to cart
 // Add product to cartuse Darryldecode\Cart\Facades\CartFacade as Cart;

  public function addToCart(Request $request, $id)
 {
     // Get the product details
     $product = Product::findOrFail($id);
     $photos = json_decode($product->photos);
 
     // Loop through the colors array to handle multiple entries
     foreach ($request->input('colors', []) as $color) {
         $size = $request->input("size.{$color}");  // Get the size for this color
         $quantity = $request->input("quantity.{$color}", 1);  // Get the quantity for this color
 
         // Add each color/size combination to the cart
         Cart::add([
             'id' => $product->id . '-' . $color . '-' . $size,  // Unique ID for each variation
             'name' => $product->name,
             'price' => $product->price,
             'quantity' => $quantity,
             'attributes' => [
                 'size' => $size,
                 'color' => $color,
                 'image' => $photos[0] ?? null,  // Use the first image as thumbnail
             ]
         ]);
     }
 
     // Check the cart contents (for debugging)
     
 
     return redirect()->back()->with('success', 'Product added to cart successfully!');
 }

 
 
    // View cart
    public function viewCart()
    {
        // Retrieve all cart items
        $cartItems = Cart::getContent()->sortBy('id'); // Sort the cart items by their ID or another key
      
    
        // Create an array to hold product details along with cart details
        $cartDetails = [];
    
        foreach ($cartItems as $item) {
            // Find the product using the product ID from the cart item
            $product = Product::find($item->id);
    
            // Add product and cart details into the array
            $cartDetails[] = [
                'id' => $item->id,
                'name' => $item->name,
                'price' => $item->price,
                'quantity' => $item->quantity,
                'total' => $item->price * $item->quantity,
                'image' => $product ? $product->photos : null, // Use the 'photos' field from the product table
                'size' => $item->attributes->get('size', 'N/A'), // Retrieve size from cart attributes
                'color' => $item->attributes->get('color', 'N/A'), // Retrieve color from cart attributes
               
            ];

       
        }
        
    
        // Pass the combined cart details and product data to the view
        return view('frontend.cart', ['cartDetails' => $cartDetails]);
    }
    
    
    // Remove item from cart
    public function update($id, Request $request) {
        $quantity = $request->input('quantity');
    
        Cart::update($id, [
            'quantity' => [
                'relative' => false, // Set this to false to update the quantity absolutely
                'value' => $quantity
            ]
        ]);
    
        return redirect()->back()->with('success', 'Cart updated successfully!');
    }
    

    

// Remove item from cart
public function removeFromCart($rowId)
{
    try {
        if (Cart::get($rowId)) {
            Cart::remove($rowId);
            return redirect()->back()->with('success', 'Product removed from cart!');
        }
        return redirect()->back()->with('error', 'Product not found in cart!');
    } catch (\Exception $e) {
        // If there's an issue, clear the cart
        Cart::clear();
        return redirect()->back()->with('error', 'There was an issue with your cart, it has been reset.');
    }
}

public function clearCart()
{
    Cart::clear(); // Clears all items from the cart
    return redirect()->back()->with('success', 'Cart has been cleared!');
}
public function proceedToCheckout()
{
    $cartItems = Cart::getContent(); // Get cart items
    return view('frontend.enquir', compact('cartItems')); // Pass cart items to inquiry view
}



}
