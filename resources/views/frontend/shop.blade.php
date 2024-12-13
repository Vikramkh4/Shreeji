@extends('frontend.layout')
@section('contet')
<style>
    /* Adjust pagination styling */
    .w-5.h-5 {
        width: 20px;
    }
 
/* Mobile-specific styles */
@media (max-width: 576px) {
    .carousel .item {
        min-height: auto; /* Adjust height for better mobile fit */
    }

    .carousel .thumb-wrapper {
        padding: 15px 10px; /* Reduce padding for a compact look */
        margin: 0 auto; /* Center align the content */
        width: 100%; /* Ensure full width on small screens */
    }

    .carousel .item img {
        max-width: 80%; /* Slightly smaller image for better fit */
        height: auto;
    }

    .carousel .thumb-content .btn {
        font-size: 9px; /* Smaller font for button */
        padding: 3px 8px; /* Smaller button size */
    }
}


.carousel .thumb-content .btn {
    color: #fff; /* Make text white for contrast */
    font-size: 10px; /* Reduce font size */
    text-transform: uppercase;
    font-weight: bold;
    background: #ed3237; /* Set the button background color */
    border: 1px solid #ed3237; /* Match border color to button */
    padding: 4px 10px; /* Smaller padding for a smaller button */
    margin-top: 5px;
    border-radius: 12px; /* Adjust radius for a rounded button */
}

.carousel .thumb-content .btn:hover, 
.carousel .thumb-content .btn:focus {
    color: #fff; /* Keep text white on hover */
    background: #c11f23; /* Slightly darker red on hover */
    box-shadow: none;
}
.carousel .thumb-content .btn i {
	font-size: 14px;
	font-weight: bold;
	margin-left: 5px;
}
/*.carousel .item-price {*/
/*	font-size: 13px;*/
/*	padding: 2px 0;*/
/*}*/
.carousel .item-price strike {
	opacity: 0.7;
	margin-right: 5px;
}
.carousel-control-prev, .carousel-control-next {
	height: 44px;
	width: 40px;
	background: #ed3237;	
	margin: auto 0;
	border-radius: 4px;
	opacity: 0.8;
}
.carousel-control-prev:hover, .carousel-control-next:hover {
	background: #ed3237;
	opacity: 1;
}
.carousel-control-prev i, .carousel-control-next i {
	font-size: 36px;
	position: absolute;
	top: 50%;
	display: inline-block;
	margin: -19px 0 0 0;
	z-index: 5;
	left: 0;
	right: 0;
	color: #fff;
	text-shadow: none;
	font-weight: bold;
}
.carousel-control-prev i {
	margin-left: -2px;
}
.carousel-control-next i {
	margin-right: -4px;
}		
.carousel-indicators {
	bottom: -50px;
}
.carousel-indicators li, .carousel-indicators li.active {
	width: 10px;
	height: 10px;
	margin: 4px;
	border-radius: 50%;
	border: none;
}
.carousel-indicators li {	
	background: rgba(0, 0, 0, 0.2);
}
.carousel-indicators li.active {	
	background: rgba(0, 0, 0, 0.6);
}
/*.carousel .wish-icon {*/
/*	position: absolute;*/
/*	right: 10px;*/
/*	top: 10px;*/
/*	z-index: 99;*/
/*	cursor: pointer;*/
/*	font-size: 16px;*/
/*	color: #abb0b8;*/
/*}*/
.carousel .wish-icon .fa-heart {
	color: #ff6161;
}
.star-rating li {
	padding: 0;
}
.star-rating i {
	font-size: 14px;
	color: #ffc000;
}
  
</style>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Open+Sans">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


    <div class="container-xl">
    <div class="row">
        <div class="col-md-12">
            <h2>PREMIUM <b>PRODUCTS</b></h2>
            <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
                <!-- Carousel indicators -->
                <ol class="carousel-indicators">
                     @foreach($premium as $index => $product)
            <li data-target="#myCarousel" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
        @endforeach
                </ol>

                <!-- Wrapper for carousel items -->
                <div class="carousel-inner">
                     @foreach($premium as $index => $product)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
                        <div class="block2 product-card">
                            <!-- Main Product Image and Thumbnails -->
                            <div class="block2-pic hov-img0 position-relative" style="height: auto; overflow: hidden;">
                                @if ($product->photos)
                                    @php
                                        $photos = json_decode($product->photos);
                                    @endphp

                                    <!-- Main Photo -->
                                    <img id="main-image-{{ $product->id }}" src="{{ asset('storage/app/' . $photos[0]) }}" alt="Product Photo"
                                        class="img-fluid product-image mb-2">

                                    <!-- Thumbnails -->
                                    <div class="d-flex justify-content-center product-thumbnails">
                                        @foreach ($photos as $photo)
                                            <img src="{{ asset('storage/app/' . $photo) }}" alt="Thumbnail"
                                                class="img-thumbnail m-1" style="width: 80px; height: 80px; cursor: pointer;"
                                                onclick="document.getElementById('main-image-{{ $product->id }}').src = '{{ asset('storage/app/' . $photo) }}';">
                                        @endforeach
                                    </div>
                                @else
                                    <img src="{{ asset('assets2/images/default-product.jpg') }}" alt="No Photo Available"
                                        class="img-fluid product-image">
                                @endif

                                <a href="{{ route('product.quickView', $product->id) }}"
                                    class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                    View
                                </a>
                            </div>

                            <!-- Product Details -->
                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l text-center">
                                    <!-- Product Name -->
                                    <a href="{{ route('product.detail', $product->id) }}"
                                        class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        {{ $product->name }}
                                    </a>

                                    <!-- Product Price with Colors -->
                                    <div class="price-color-section">
                                        <span class="stext-105 cl3 d-block mb-2">
                                            ₹ {{ number_format($product->price, 2) }}
                                        </span>

                                        <!-- Colors -->
                                        <div class="d-flex justify-content-center">
                                            @if ($product->colors)
                                                @php
                                                    $colors = json_decode($product->colors);
                                                @endphp
                                                @foreach ($colors as $color)
                                                    <div class="color-indicator"
                                                        style="
                                                            width: 15px; 
                                                            height: 15px; 
                                                            border-radius: 50%; 
                                                            background-image: url('{{ url('storage/app/' . $color->image) }}'); 
                                                            margin: 0 3px; 
                                                            background-size: cover; 
                                                            background-position: center;"
                                                        title="{{ $color->name }}">
                                                    </div>
                                                @endforeach
                                            @else
                                                <p>No colors available.</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Wishlist Icon -->
                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                        <img class="icon-heart1 dis-block trans-04"
                                            src="{{ asset('assets2/images/icons/icon-heart-01.png') }}" alt="ICON">
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                            src="{{ asset('assets2/images/icons/icon-heart-02.png') }}" alt="ICON">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

                <!-- Carousel controls -->
                <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>

    
<div class="bg0 m-t-23 p-b-140">
    <div class="container">
        <div class="flex-w flex-sb-m p-b-52">
            <!-- Category Filter Buttons -->
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <a href="{{ route('shop.view', ['category' => 'all']) }}">
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 {{ request('category') == 'all' ? 'how-active1' : '' }}" data-filter="*">
                        All Products
                    </button>
                </a>

                <?php $categories = App\Models\Category::all(); ?>
                @foreach ($categories as $cat)
                    <a href="{{ route('shop.view', ['category' => $cat->id]) }}">
                        <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 {{ request('category') == $cat->id ? 'how-active1' : '' }}">
                            {{ $cat->name }}
                        </button>
                    </a>
                @endforeach
            </div>

            <!-- Search Section -->
            <div class="flex-w flex-c-m m-tb-10">
                <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                    <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                    <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Search
                </div>
            </div>

            <!-- Search Form -->
            <div class="dis-none panel-search w-full p-t-10 p-b-15">
                <form action="{{ route('shop.view') }}" method="GET">
                    <div class="bor8 dis-flex p-l-15">
                        <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                        <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search" 
                            placeholder="Search products..." value="{{ request()->search ?? '' }}" />
                    </div>
                </form>
            </div>
        </div>

        <!-- Product Display Section -->
  <div class="row isotope-grid">
    @foreach ($products as $product)
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
            <div class="block2 product-card">
                <!-- Main Product Image and Thumbnails -->
               <div class="block2-pic hov-img0 position-relative" style="height: auto; overflow: hidden;">
    @if ($product->photos)
        @php
            $photos = json_decode($product->photos);
        @endphp

        <!-- Main Photo -->
        <img id="main-image-{{ $product->id }}" 
             src="{{ asset('storage/app/' . $photos[0]) }}" 
             alt="Product Photo"
             class="img-fluid product-image mb-2" 
             style="width: 100%; height: 300px; object-fit: cover;">

        <!-- Thumbnails -->
        <div class="d-flex justify-content-center product-thumbnails">
            @foreach ($photos as $photo)
                <img src="{{ asset('storage/app/' . $photo) }}" 
                     alt="Thumbnail"
                     class="img-thumbnail m-1" 
                    style="width: 80px; height: 80px; object-fit: cover; cursor: pointer;"
                     onclick="document.getElementById('main-image-{{ $product->id }}').src = '{{ asset('storage/app/' . $photo) }}';">
            @endforeach
        </div>
    @else
        <img src="{{ asset('assets2/images/default-product.jpg') }}" 
             alt="No Photo Available"
             class="img-fluid product-image" 
             style="width: 100%; height: 300px; object-fit: cover;">
    @endif

    <a href="{{ route('product.quickView', $product->id) }}"
       class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 mt-2">
        View
    </a>
</div>


                <!-- Product Details -->
                <div class="block2-txt flex-w flex-t p-t-14">
                    <div class="block2-txt-child1 flex-col-l text-center">
                        <!-- Product Name -->
                        <a href="{{ route('product.detail', $product->id) }}"
                            class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                            {{ $product->name }}
                        </a>

                        <!-- Product Price with Colors -->
                        <div class="price-color-section">
                            <span class="stext-105 cl3 d-block mb-2">
                                ₹ {{ number_format($product->price, 2) }}
                            </span>

                          <!-- Colors -->
<div class="d-flex justify-content-center">
    @if ($product->colors)
        @php
            $colors = json_decode($product->colors);
        @endphp
        @foreach ($colors as $color)
            <div class="color-indicator"
                style="
                    width: 15px; 
                    height: 15px; 
                    border-radius: 50%; 
                    background-image: url('{{ url('storage/app/' . $color->image) }}'); 
                    
                    margin: 0 3px; 
                    background-size: cover; 
                    background-position: center;"
                title="{{ $color->name }}">
            </div>
        @endforeach
    @else
        <p>No colors available.</p>
    @endif
</div>

                        </div>
                    </div>

                    <!-- Wishlist Icon -->
                    <div class="block2-txt-child2 flex-r p-t-3">
                        <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                            <img class="icon-heart1 dis-block trans-04"
                                src="{{ asset('assets2/images/icons/icon-heart-01.png') }}" alt="ICON">
                            <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                src="{{ asset('assets2/images/icons/icon-heart-02.png') }}" alt="ICON">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

        

        <!-- Pagination -->
        <div class="pagination-wrapper text-center">
            {{ $products->links() }}
        </div>
    </div>
</div>
</div>
@endsection
