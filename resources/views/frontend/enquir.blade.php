@extends('frontend.layout')
@section('contet')
    <!-- Page Header -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92"
        style="background-image: url('{{ asset('assets2/images/bg-01.jpg') }}');">
        <h2 class="ltext-105 cl0 txt-center">
            Enquiry
        </h2>
    </section>

    <!-- Inquiry Form Section -->
    <section class="bg0 p-t-104 p-b-116">
        <div class="container">
            <div class="flex-w flex-tr">
                <!-- Form Section -->
                <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
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

                        <!-- Products and Quantities -->
                        <div class="m-b-30">
                            <label class="stext-111 cl2 plh3">Products and Quantities</label>
                            <div id="product-list">
                                @foreach ($cartItems as $index => $item)
                                    <div class="bor8 m-b-20 product-item row">
                                        <div class="col-md-6">
                                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text"
                                                name="products[{{ $index }}][name]" value="{{ $item->name }}"
                                                placeholder="Product Name" required readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="number"
                                                name="products[{{ $index }}][quantity]" value="{{ $item->quantity }}"
                                                placeholder="Quantity" required>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-danger remove-product">Remove</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <button type="button" id="add-product"
                                class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer mt-3">+
                                Add Another Product</button>
                        </div>

                        <!-- Inquiry Message -->
                        <div class="bor8 m-b-30">
                            <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" id="message" name="message" rows="4"
                                placeholder="How Can We Help?" required></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                            Submit Inquiry
                        </button>
                    </form>
                </div>

                <!-- Contact Info Section -->
                <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                    <!-- Address -->
                    <div class="flex-w w-full p-b-42">
                        <span class="fs-18 cl5 txt-center size-211">
                            <span class="lnr lnr-map-marker"></span>
                        </span>
                        <div class="size-212 p-t-2">
                            <span class="mtext-110 cl2">Address</span>
                            <p class="stext-115 cl6 size-213 p-t-18">
                                Coza Store Center 8th floor, 379 Hudson St, New York, NY 10018 US
                            </p>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="flex-w w-full p-b-42">
                        <span class="fs-18 cl5 txt-center size-211">
                            <span class="lnr lnr-phone-handset"></span>
                        </span>
                        <div class="size-212 p-t-2">
                            <span class="mtext-110 cl2">Let's Talk</span>
                            <p class="stext-115 cl1 size-213 p-t-18">
                                +1 800 1236879
                            </p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex-w w-full">
                        <span class="fs-18 cl5 txt-center size-211">
                            <span class="lnr lnr-envelope"></span>
                        </span>
                        <div class="size-212 p-t-2">
                            <span class="mtext-110 cl2">Sale Support</span>
                            <p class="stext-115 cl1 size-213 p-t-18">
                                contact@example.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map -->
    <!-- Include the Google Maps API script with your API key -->

    <div class="map">
        <div class="size-303" id="google_map" data-map-x="22.725626" data-map-y="75.891789" data-pin="images/icons/pin.png"
            data-scrollwheel="0" data-draggable="1" data-zoom="11"></div>
    </div>

    <!-- Google Maps API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDuekOmjBhvpq93hiPRwk_JeStW8zXrJlg"></script>

    <script>
        function initMap() {
            // Get the data attributes from the map div
            const mapElement = document.getElementById('google_map');
            const lat = parseFloat(mapElement.getAttribute('data-map-x'));
            const lng = parseFloat(mapElement.getAttribute('data-map-y'));
            const pinImage = mapElement.getAttribute('data-pin');
            const zoomLevel = parseInt(mapElement.getAttribute('data-zoom'));
            const scrollwheel = mapElement.getAttribute('data-scrollwheel') === '1'; // Corrected spelling
            const draggable = mapElement.getAttribute('data-draggable') === '1';

            // Map options
            const mapOptions = {
                center: {
                    lat: lat,
                    lng: lng
                },
                zoom: zoomLevel,
                scrollwheel: scrollwheel,
                draggable: draggable,
            };

            // Create a new map
            const map = new google.maps.Map(mapElement, mapOptions);

            // Add a marker to the map
            const marker = new google.maps.Marker({
                position: {
                    lat: lat,
                    lng: lng
                },
                map: map,
                icon: pinImage, // Custom pin icon
            });
        }

        // Initialize the map when the window loads
        window.onload = initMap;
    </script>
@endsection
