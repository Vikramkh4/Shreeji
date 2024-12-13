<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Premium;

class ShopController extends Controller
{
    public function view(Request $request)
    {
        $query = Product::query();
        $title = "Shops";

        // Filter by category
        if ($request->has('category') && $request->category != 'all') {
            $query->where('category_id', $request->category);
        }

        // Search products
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('brandname', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('description', 'LIKE', '%' . $searchTerm . '%');
            });
        }

        // Order by newest products first
        $query->orderBy('id', 'desc');

        // Fetch featured products
       $premiumProducts = Premium::with('product')->where('status', 1)->get();

    $premium = $premiumProducts->map(function ($premiumProduct) {
        return $premiumProduct->product; // Assuming there is a relation between FeatureProduct and Product
    });

        // Paginate results
        $products = $query->paginate(12);
        
   
        // Fetch categories for filtering
        $categories = Category::all();

        return view('frontend.shop', [
            'products' => $products,
            'categories' => $categories,
            'title' => $title,
            'premium' => $premium,
        ]);
    }
}
