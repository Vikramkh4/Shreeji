<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class CatalogueController extends Controller
{
   
    public function catalogue()
    
    {    $products = Product::orderBy('created_at', 'desc')->paginate(2); 
        // $products = Product::paginate(2); // Eager loading category
        
        return view('catalogue', ['products' => $products]);
    }


}
