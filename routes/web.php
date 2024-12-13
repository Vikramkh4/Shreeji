<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\Distributer_contoller;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FeatureProductController;
use App\Http\Controllers\PremiumController;
use App\Http\Controllers\AboutController;
use App\Models\Product;
use App\Models\Inquiry;
use App\Models\Category;

Route::get('/dashboard', function () {
    $productCount = Product::count();
    $inquiryCount = Inquiry::count();
    $categoryCount = Category::count();

    return view('home', compact('productCount', 'inquiryCount', 'categoryCount'));
})->middleware(['auth', 'verified'])->name('dashboard');


//add products to pdf
    Route::get('generatepdf', [PdfController::class, 'generatepdf'])->name('generatepdf');
    Route::get('pdf_convert',[PdfController::class, 'pdfGeneration'])->name('pdf.convert');
    Route::get('/upload-pdf', [PdfController::class, 'showUploadForm'])->name('pdf.upload.form');
    Route::post('/upload-pdf', [PdfController::class, 'uploadPdf'])->name('pdf.upload');
    Route::get('/download-pdf/{filename}', [PdfController::class, 'downloadPdf'])->name('pdf.download');
    
   //Distributer
Route::get('distributer',[Distributer_contoller::class, 'distributers'])->name("distributer");
Route::get('retailer',[Distributer_contoller::class, 'retailers'])->name("retailer");    
Route::post('save_distributer',[Distributer_contoller::class, 'add_distributer'])->name("save.distributer");
Route::get('view-distributers', [Distributer_contoller::class, 'view_distributer'])->name('view.distributer');

    
    
    
//catalogue page
    Route::get('catalogue', [CatalogueController::class, 'catalogue'])->name('catalogue');
    Route::get('contact', [ContactController::class, 'contact'])->name('contact');
    Route::get('about', [AboutController::class, 'about'])->name('about');
    

    
Route::get('/shop', [ShopController::class, 'view'])->name('shop.view');
// Add product to cart
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');

// View cart
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');

// Update cart
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');

// routes/web.php



Route::get('category/{id}/products', [FrontendController::class, 'showCategoryProducts'])->name('category.products');

// Remove item from cart
Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');

// Clear cart
Route::post('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');


Route::get('/inqure',[FrontendController::class,'inquiryview'])->name('inq.view');
Route::get('/checkout', [CartController::class, 'proceedToCheckout'])->name('checkout');
Route::post('/inquiry/store', [InquiryController::class, 'store'])->name('inquiry.store');


// Frontend Routes (Accessible without login)
// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/product/{id}', [FrontendController::class, 'showProductDetail'])->name('product.detail');

// web.php
Route::get('/product/quick-view/{id}', [FrontendController::class, 'quickView'])->name('product.quickView');


// Inquiry form (public access)

// Authenticated Routes (Requires login)
Route::middleware(['auth'])->group(function () {
    Route::resource('banners', BannerController::class);
    // Dashboard (only for logged-in users)
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');

    // Route to show the form for creating a new category
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    
    Route::post('pr/store', [PremiumController::class, 'store'])->name('premium.store');
        Route::get('pr/create', [PremiumController::class, 'create'])->name('premium.create');
    Route::get('premium/{id}/edit', [PremiumController::class, 'edit'])->name('premium.edit');
Route::put('premium/{id}', [PremiumController::class, 'update'])->name('premium.update');
Route::delete('premium/{id}', [PremiumController::class, 'destroy'])->name('premium.destroy');

Route::get('premium-products', [PremiumController::class, 'index'])->name('premium.index');

    
    
    
    // Route to store a new category
    Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
    
    // Route to show the form for editing a category
    Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    
    // Route to update a specific category
    Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    
    // Route to delete a specific category
    Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    
    Route::get('/inquiry', [InquiryController::class, 'create'])->name('inquiry.form');
    
  
    
    // Route to display list of inquiries (optional, for admin)
    Route::get('/inquiries', [InquiryController::class, 'index'])->name('inquiries.list');
    // Edit inquiry form
    Route::get('/inquiries/{id}/edit', [InquiryController::class, 'edit'])->name('inquiry.edit');
    
    // Update inquiry
    Route::put('/inquiries/{id}', [InquiryController::class, 'update'])->name('inquiry.update');
    
    // Delete inquiry
    Route::delete('/inquiries/{id}', [InquiryController::class, 'destroy'])->name('inquiry.destroy');
     Route::get('fpr/create', [FeatureProductController::class, 'create'])->name('feature_products.create');
    Route::get('feature_products/{id}/edit', [FeatureProductController::class, 'edit'])->name('feature_products.edit');
Route::put('feature_products/{id}', [FeatureProductController::class, 'update'])->name('feature_products.update');
Route::delete('feature_products/{id}', [FeatureProductController::class, 'destroy'])->name('feature_products.destroy');

Route::get('featured-products', [FeatureProductController::class, 'index'])->name('feature_products.index');


//view_distributer
Route::get('view_distributer', [Distributer_contoller::class, 'view_distributer'])->name('view.distributer');




    Route::post('fpr/store', [FeatureProductController::class, 'store'])->name('feature_products.store');
    
    Route::get('/product', [ProductController::class, 'product'])->name('product.show');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/productslist', [ProductController::class, 'showProducts'])->name('products.list');
    // Show the form to edit a product
    Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/update/{id}', [ProductController::class, 'update'])->name('products.update');
    
    // Delete a product
    Route::delete('/products/destroy/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    
    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentication routes
require __DIR__.'/auth.php';
