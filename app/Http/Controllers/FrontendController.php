<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Banner;
use App\Models\Category;
use App\Models\FeatureProduct;

class FrontendController extends Controller
{
    
    // Existing home method
    public function home()
{
    $banner = Banner::all();
    $title = "Home";

    // Use eager loading to fetch all related products in one query
    $featureProducts = FeatureProduct::with('product')->where('status', 1)->get();

    $products = $featureProducts->map(function ($featureProduct) {
        return $featureProduct->product; // Assuming there is a relation between FeatureProduct and Product
    });

    $category = Category::all(); // Fetch all categories

    return view('frontend.home', ['products' => $products, 'banner' => $banner, 'category' => $category,'title'=>$title]);
}


    // Show product detail
    public function showProductDetail($id)
    {
        // Fetch the product by its ID
        $product = Product::findOrFail($id);

        // Render the product detail view
        return view('frontend.product-detail', compact('product'));
    }

    // Quick view for a product
    public function quickView($id) {
        $product = Product::find($id);
        $photo  = $product['photos'];
        // $color=$product['colors'];
        // $product['colors'] = json_decode($product['colors']); 
        
        if (is_string($product['colors'])) {
            $product['colors'] = json_decode($product['colors']);
        }
        $product['photos']= json_decode($photo);
     
        return view('frontend.quick_view', compact('product'));
    }
    public function inquiryview(){
        return view('frontend.enquir');
    }
    public function showCategoryProducts($id)
{
    // Fetch the category
    $category = Category::findOrFail($id);

    // Fetch the products for that category
    $products = Product::where('category_id', $id)->get();

    // Return view with products for the selected category
    return view('frontend.category-products', compact('category', 'products'));
}
    
}
