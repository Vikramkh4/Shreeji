@extends('frontend.layout')
@section('contet')
    <div class="bg0 p-t-75 p-b-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart">
                                <tr class="table_head">
                                    <th class="column-1">Product</th>
                                    <th class="column-2"></th>
                                    <th class="column-3">Price</th>
                                    <th class="column-4">Quantity</th>
                                    <th class="column-5">Total</th>
                                </tr>

                                @foreach ($cartDetails as $item)
                                    <tr class="table_row">
                                        <td class="column-1">
                                            <div class="how-itemcart1">
                                                @php
                                                    // Decode the JSON array of images
                                                    $images = json_decode($item['image'], true);
                                                @endphp

                                                @if (!empty($images) && is_array($images))
                                                    <!-- Display the first image from the array -->
                                                    <img src="{{ url('storage/app/' . $images[0]) }}" alt="Product Image">
                                                @else
                                                    <!-- Fallback in case there are no images -->
                                                    <img src="{{ asset('uploads/products/default-image.jpg') }}"
                                                        alt="No Image Available">
                                                @endif
                                            </div>
                                        </td>
                                        <td class="column-2">{{ $item['name'] }}
                                            <p class="product-size-color">
                                                Size: {{ $item['size'] }} <br>
                                                Color: {{ $item['color'] }}
                                            </p>
                                        </td>
                                        <td class="column-3">₹{{ $item['price'] }}</td>
                                        <td class="column-4">
                                            <form action="{{ route('cart.update', $item['id']) }}" method="POST">
                                                @csrf
                                                <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                                    </div>
                                                    <input class="mtext-104 cl3 txt-center num-product update-cart"
                                                        data-id="{{ $item['id'] }}" type="number" name="quantity"
                                                        value="{{ $item['quantity'] }}" min="1">
                                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                                    </div>
                                                </div>
                                        </td>
                                        <td class="column-5">₹{{ $item['total'] }}</td>
                                        <td>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            </form>
                                            <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Remove</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </table>
                        </div>

                        <!--<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">-->
                        <!--    <div class="flex-w flex-m m-r-20 m-tb-5">-->
                        <!--        <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text"-->
                        <!--            name="coupon" placeholder="Coupon Code">-->
                        <!--        <div-->
                        <!--            class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">-->
                        <!--            Apply coupon-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--    <div-->
                        <!--        class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">-->
                        <!--        Update Cart-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>

                    <!-- Inquiry Form -->
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-t-50">
                        <form action="{{ route('inquiry.store') }}" method="POST">
                            @csrf
                            <h4 class="mtext-105 cl2 txt-center p-b-30">
                                Send Us A Message
                            </h4>

                            <!-- Name -->
                            <div class="bor8 m-b-20 how-pos4-parent">
                                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" id="name"
                                    name="name" placeholder="Your Name" required>
                                <span class="how-pos4 pointer-none lnr lnr-user"></span>
                            </div>

                            <!-- Email -->
                            <div class="bor8 m-b-20 how-pos4-parent">
                                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="email" id="email"
                                    name="email" placeholder="Your Email Address" required>
                                <span class="how-pos4 pointer-none lnr lnr-envelope"></span>
                            </div>

                            <!-- Phone -->
                            <div class="bor8 m-b-20 how-pos4-parent">
                                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" id="phone"
                                    name="phone" placeholder="Your Phone Number" required>
                                <span class="how-pos4 pointer-none lnr lnr-phone-handset"></span>
                            </div>

                            <!-- Address -->
                            <div class="bor8 m-b-30">
                                <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" id="address" name="address" rows="2"
                                    placeholder="Your Address" required></textarea>
                            </div>

                            <!-- Message -->
                            <div class="bor8 m-b-30">
                                <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" id="message" name="message" rows="3"
                                    placeholder="Your Message" required></textarea>
                            </div>

                            <!-- Products and Quantities -->
                            <div class="m-b-30">
                                <label class="stext-111 cl2 plh3">Products and Quantities</label>
                                <div id="product-list">
                                    @foreach ($cartDetails as $index => $item)
                                        <div class="bor8 m-b-20 product-item row">
                                            <div class="col-md-6">
                                                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text"
                                                    name="products[{{ $index }}][name]" value="{{ $item['name'] }}"
                                                    placeholder="Product Name" required readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="number"
                                                    name="products[{{ $index }}][quantity]"
                                                    value="{{ $item['quantity'] }}" placeholder="Quantity" required>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text"
                                                    name="products[{{ $index }}][size]"
                                                    value="{{ $item['size'] }}" placeholder="Size" required>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text"
                                                    name="products[{{ $index }}][color]"
                                                    value="{{ $item['color'] }}" placeholder="Color" required>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit"
                                class="flex-c-m stext-101 cl0 size-121 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                                Submit Inquiry
                            </button>
                        </form>
                    </div>
                </div>

                <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-30">
                            Cart Totals
                        </h4>

                        <div class="flex-w flex-t bor12 p-b-13">
                            <div class="size-208">
                                <span class="stext-110 cl2">
                                    Subtotal:
                                </span>
                            </div>

                            <div class="size-209">
                                <span class="mtext-110 cl2">
                                    ₹{{ Cart::getSubTotal() }}
                                </span>
                            </div>
                        </div>



                        <div class="flex-w flex-t p-t-27 p-b-33">
                            <div class="size-208">
                                <span class="mtext-101 cl2">
                                    Total:
                                </span>
                            </div>

                            <div class="size-209 p-t-1">
                                <span class="mtext-110 cl2">
                                    ₹{{ Cart::getTotal() }}
                                </span>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
