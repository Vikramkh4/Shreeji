@extends('frontend.layout')
@section('contet')
    <div class="bg0 m-t-23 p-b-140">
        <div class="container">


             <div class="row isotope-grid">
                @foreach ($products as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                        <!-- Product Card -->
                        <div class="block2 product-card">
                            <div class="block2-pic hov-img0 position-relative" style="height: auto; overflow: hidden;">
                                @if ($product->photos)
                                    @php
                                        $photos = json_decode($product->photos);
                                    @endphp
                                    <img src="{{ url('storage/app/' . $photos[0]) }}" alt="Product Photo"
                                        class="img-fluid product-image">
                                @else
                                    <img src="{{ asset('assets2/images/default-product.jpg') }}" alt="No Photo Available"
                                        class="img-fluid product-image">
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
                                        {{ $product->brandname }}
                                    </a>

                                    <span class="stext-105 cl3">
                                        ₹ {{ number_format($product->price, 2) }}
                                    </span>
                                </div>

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

            <!-- Load more -->

        </div>
    </div>
@endsection
