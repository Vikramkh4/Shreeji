@extends('frontend.layout')
@section('contet')
    <!-- Slider -->
    <section class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1">
                @foreach ($banner as $b)
                    <div class="item-slick1"
                        style="background-image: url('{{ asset('public/banners/' . $b->image) }}'); height: 500px;">
                        <div class="container h-full">
                            <div class="flex-col-l-m h-full p-t-50 p-b-20 respon5">
                                <br><br><br>
                                <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                                    <span class="ltext-101 cl2 respon2">{{ $b->title }}</span>
                                </div>
                                <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                    <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">{{ $b->description }}</h2>
                                </div>
                                <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                    @if ($b->link)
                                        <a href="{{ $b->link }}"
                                            class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                            Shop Now
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <div class="sec-banner bg0 p-t-80 p-b-50">
        <div class="container">
            <div class="row">
                @foreach ($category as $cat)
                    <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                        <div class="block1 wrap-pic-w">
                            <!-- Add lazy loading to category images -->
                            <img src="{{ asset('public/categories/' . $cat->image) }}" alt="{{ $cat->name }}" loading="lazy">
                            <a href="{{ route('category.products', $cat->id) }}"
                                class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                                <div class="block1-txt-child1 flex-col-l">
                                    <span class="block1-name ltext-102 trans-04 p-b-8">{{ $cat->name }}</span>
                                    <span class="block1-info stext-102 trans-04">{{ $cat->description ?? 'Explore Now' }}</span>
                                </div>
                                <div class="block1-txt-child2 p-b-4 trans-05">
                                    <div class="block1-link stext-101 cl0 trans-09">Shop Now</div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Featured Products Section -->
    <section class="bg0 p-t-23 p-b-140">
        <div class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5">Featured Product</h3>
            </div>
            <div class="row isotope-grid">
                @foreach ($products as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                        <div class="block2 product-card">
                            <div class="block2-pic hov-img0 position-relative" style="height: auto; overflow: hidden;">
                                @if ($product->photos)
                                    @php
                                        $photos = json_decode($product->photos);
                                    @endphp
                                    <img src="{{ url('storage/app/' . $photos[0]) }}" alt="Product Photo"
                                        class="img-fluid product-image" loading="lazy">
                                @else
                                    <img src="{{ asset('assets2/images/default-product.jpg') }}" alt="No Photo Available"
                                        class="img-fluid product-image" loading="lazy">
                                @endif

                                <!-- Quick View Button -->
                                <a href="{{ route('product.quickView', $product->id) }}"
                                    class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
                                    Quick View
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l text-center">
                                    <a href="{{ route('product.detail', $product->id) }}"
                                        class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        {{ $product->name }}
                                    </a>

                                    <span class="stext-105 cl3">
                                        ₹ {{ number_format($product->price, 2) }}
                                    </span>
                                </div>

                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                        <img class="icon-heart1 dis-block trans-04"
                                            src="{{ asset('assets2/images/icons/icon-heart-01.png') }}" alt="ICON" loading="lazy">
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                            src="{{ asset('assets2/images/icons/icon-heart-02.png') }}" alt="ICON" loading="lazy">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Back to Top Button -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>
@endsection
