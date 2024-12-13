@extends('frontend.layout')
@section('contet')

    <style>
        .color-circle-wrapper {
            position: relative;
            display: inline-block;
            margin-right: 15px;
        }

        .color-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-size: cover;
            background-position: center;
            border: 1px solid #ccc;
            display: inline-block;
        }

        .popup-image {
            display: none;
            position: absolute;
            top: -120px;
            left: 50%;
            transform: translateX(-50%);
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background-size: cover;
            background-position: center;
            border: 2px solid #ccc;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 10;
        }

        .color-circle-wrapper:hover .popup-image {
            display: block;
        }

        .product-options-wrapper {
            margin-bottom: 30px;
        }

        .product-options {
            margin-bottom: 20px;
        }

        /* Display colors next to each other */
        .color-selection {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        /* Styling the color block (color, size, and quantity) */
        .color-block {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
        }

        .color-circle-wrapper {
            text-align: center;
        }

        /* Circle for the color */
        .color-circle {
            width: 50px;
            height: 50px;
            background-size: cover;
            border-radius: 50%;
            margin-bottom: 5px;
        }

        /* Style for size dropdown */
        .size-dropdown {
            width: 80px;
            margin-bottom: 10px;
            padding: 5px;
            text-align: center;
        }

        /* Style for quantity input (smaller) */
        .quantity-input {
            width: 60px;
            padding: 5px;
            text-align: center;
        }

        /* Align size and quantity vertically below the color */
        .color-size-quantity {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 10px;
        }
              .desktop-view {
            display: block;
        }

        .mobile-view {
            display: none;
        }

        /* Show mobile view on small screens */
        @media (max-width: 768px) {
            .desktop-view {
                display: none;
            }

            .mobile-view {
                display: block;
            }
        }

        /* Mobile-specific styling */
        .mobile-container {
            padding: 20px;
        }

        .mobile-product-image {
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .mobile-product-details {
            margin-top: 10px;
        }

        .mobile-product-title {
            font-size: 18px;
            font-weight: bold;
        }

        .mobile-product-price {
            color: #ff5722;
            font-size: 16px;
            margin-top: 5px;
        }

        .mobile-color-block {
            margin-bottom: 15px;
        }

        .mobile-color-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 1px solid #ccc;
            margin: 0 auto 5px;
        }

        .mobile-color-name {
            text-align: center;
            font-size: 12px;
        }

        .mobile-add-cart {
            margin-top: 20px;
            text-align: center;
        }

        .mobile-add-cart button {
            width: 100%;
        }
    </style>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="desktop-view">
        <section class="sec-product-detail bg0 p-t-65 p-b-60">
        <div class="container">
            <div class="row">
                <!-- Product Images -->
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots"></div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>
                            <div class="slick3 gallery-lb">
                                @foreach ($product->photos as $image)
                                    <div class="item-slick3" data-thumb="{{ asset('storage/app/' . $image) }}"
                                        alt="{{ $product->name }}">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="{{ asset('storage/app/' . $image) }}" alt="{{ $product->name }}"
                                                alt="{{ $product->name }}">
                                        </div>
                                    </div>
                                @endforeach

                                @if ($product->video)
                                    <div class="item-slick3" data-thumb="{{ asset('assets/images/qw.jpg') }}"
                                        style="background-image: {{ asset('storage/app/' . $image) }}">

                                        <!-- Provide a default video thumbnail -->
                                        <div class="wrap-pic-w pos-relative">
                                            <video class="video-thumbnail" width="100%" controls>
                                                <source src="{{ asset('storage/app/public/' . $product->video) }}"
                                                    type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>

                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Details -->
                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                            Article: {{ $product->name }}
                        </h4>
                        <span class="mtext-106 cl2">
                            Price: ₹:{{ $product->price }}
                        </span>
                        <p class="stext-102 cl3 p-t-23">
                            Description: {{ $product->description }}
                        </p>
<br>
                        <form action="{{ route('add.to.cart', $product->id) }}" method="POST">
                            @csrf
                            <!-- Colors Display -->
                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-203 flex-c-m respon6">Color</div>
                                <div class="size-204 respon6-next">
                                    <div class="flex-w color-selection">
                                        @if ($product->colors)
                                            @foreach ($product->colors as $color)
                                                <div class="color-block">
                                                    <label class="color-circle-wrapper">
                                                        <input type="checkbox" name="colors[]" value="{{ $color->name }}">
                                                        <div class="color-circle"
                                                            style="background-image: url('{{ url('storage/app/' . $color->image) }}');">
                                                        </div>
                                                        <div class="popup-image"
                                                            style="background-image: url('{{ url('storage/app/' . $color->image) }}');">
                                                        </div>
                                                        <div>{{ $color->name }}</div>
                                                    </label>

                                                    <!-- Size and Quantity below each color -->
                                                    <div class="color-size-quantity">
                                                        <!-- Size Select -->
                                                        <select class="js-select2 size-dropdown"
                                                            name="size[{{ $color->name }}]">
                                                            <option value="">Size</option>
                                                            <option value="S">S</option>
                                                            <option value="M">M</option>
                                                            <option value="L">L</option>
                                                            <option value="XL">XL</option>
                                                            <option value="ALL">ALL</option>
                                                        </select>

                                                        <!-- Quantity Input -->
                                                        <input class="mtext-104 cl3 txt-center num-product quantity-input"
                                                            type="number" name="quantity[{{ $color->name }}]"
                                                            value="1" min="1">
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <p>No color options available for this product.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-204 flex-w flex-m respon6-next">
                                    @if ($product->ytlink)
                                        <a href="{{ $product->ytlink }}" class="stext-104 cl4 hov-cl1 trans-04"
                                            target="_blank">
                                            Watch product video
                                        </a>
                                    @endif

                                    <button type="submit"
                                        class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                        Add to cart
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    </div>
    <!-- Product Detail Section -->
   
<div class="mobile-view">
        <div class="mobile-container">
            <!-- Product Images -->
           <div >
                    <div>
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots"></div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>
                            <div class="slick3 gallery-lb">
                                @foreach ($product->photos as $image)
                                    <div class="item-slick3" data-thumb="{{ asset('storage/app/' . $image) }}"
                                        alt="{{ $product->name }}">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="{{ asset('storage/app/' . $image) }}" alt="{{ $product->name }}"
                                                alt="{{ $product->name }}">
                                        </div>
                                    </div>
                                @endforeach

                                @if ($product->video)
                                    <div class="item-slick3" data-thumb="{{ asset('assets/images/qw.jpg') }}"
                                        style="background-image: {{ asset('storage/app/' . $image) }}">

                                        <!-- Provide a default video thumbnail -->
                                        <div class="wrap-pic-w pos-relative">
                                            <video class="video-thumbnail" width="90%" controls>
                                                <source src="{{ asset('storage/app/public/' . $product->video) }}"
                                                    type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>

                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            <!-- Product Details -->
            <div class="mobile-product-details">
                <div class="mobile-product-title">Article: {{ $product->name }}</div>
                <div class="mobile-product-price"><strong>Price: ₹{{ $product->price }}</strong></div>
                <p> Description: {{ $product->description }}</p>
            </div>

            <!-- Color Options -->
            <form action="{{ route('add.to.cart', $product->id) }}" method="POST">
                @csrf
                <div>
                    <h6>Choose Colors:</h6>
                    <div class="d-flex flex-wrap">
                        @if ($product->colors)
                            @foreach ($product->colors as $color)
                                <div class="mobile-color-block text-center">
                                    <input type="checkbox" name="colors[]" value="{{ $color->name }}">
                                    <div class="mobile-color-circle"
                                        style="background-image: url('{{ url('storage/app/' . $color->image) }}'); background-size: cover; background-position: center;">
                                    </div>
                                    <div class="mobile-color-name">{{ $color->name }}</div>

                                    <!-- Size -->
                                    <select class="form-select" name="size[{{ $color->name }}]">
                                        <option value="">Size</option>
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                        <option value="ALL">ALL</option>
                                    </select>

                                    <!-- Quantity -->
                                    <input type="number" name="quantity[{{ $color->name }}]" class="form-control mt-2"
                                        value="1" min="1" style="width: 80px; margin: 0 auto;">
                                </div>
                            @endforeach
                        @else
                            <p>No color options available for this product.</p>
                        @endif
                    </div>
                </div>

                <!-- Add to Cart Button -->
                <div class="mobile-add-cart">
                    <button type="submit"
                                        class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                        Add to cart
                                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- Related Products -->
@endsection
