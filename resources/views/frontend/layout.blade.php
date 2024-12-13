<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{$title??'Home'}}</title>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('assets2/images/icons/favicon.png') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets2/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets2/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets2/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets2/fonts/linearicons-v1.0.0/icon-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets2/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets2/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets2/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets2/vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets2/vendor/slick/slick.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets2/vendor/MagnificPopup/magnific-popup.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets2/vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets2/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets2/css/main.css') }}">
    
    
    
    <style>
        /* Style for product cards */
        .product-card {
            border: 1px solid #e6e6e6;
            border-radius: 5px;
            padding: 10px;
            transition: box-shadow 0.3s ease;
        }

        .product-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        /* Ensure all product images have the same height */
        .product-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        /* Make sure image container has a fixed height */
        .block2-pic {
            height: 250px;
            overflow: hidden;
        }

        /* Adjust text alignment and card padding */
        .block2-txt-child1 {
            text-align: center;
            padding-top: 10px;
        }
        
      .menu-mobile {
    position: fixed;
    top: 0;
    left: -100%; /* Hidden off-screen */
    width: 80%; /* Adjust the width as per requirement */
    height: 100%;
    background-color: white;
    z-index: 9999;
    transition: left 0.3s ease-in-out;
}

.menu-mobile.open {
    left: 0; /* Slide in when open */
}

.menu-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Dark semi-transparent background */
    z-index: 9998;
    display: none; /* Hidden by default */
}

.menu-overlay.visible {
    display: block; /* Shown when menu is open */
}

    </style>
    <!--===============================================================================================-->
</head>

<body class="animsition">

    <!-- Header -->
    <header class="header-v2">
        <!-- Header desktop -->
        <div class="container-menu-desktop trans-03">
            <!--<div class="top-bar">-->
            <!--    <div class="content-topbar flex-sb-m h-full container">-->
            <!--        <div class="left-top-bar">-->
            <!--            Free shipping for standard order over $100-->
            <!--        </div>-->

            <!--        <div class="right-top-bar flex-w h-full">-->
            <!--            <a href="#" class="flex-c-m trans-04 p-lr-25">-->
            <!--                Help & FAQs-->
            <!--            </a>-->

            <!--            <a href="#" class="flex-c-m trans-04 p-lr-25">-->
            <!--                My Account-->
            <!--            </a>-->

            <!--            <a href="#" class="flex-c-m trans-04 p-lr-25">-->
            <!--                EN-->
            <!--            </a>-->

            <!--            <a href="#" class="flex-c-m trans-04 p-lr-25">-->
            <!--                USD-->
            <!--            </a>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
            <div class="wrap-menu-desktop">
                <nav class="limiter-menu-desktop p-l-45">
                    <!-- Logo desktop -->
                    <a href="{{url("/")}}" class="logo">
                        <img src={{ asset('assets/images/Shreeji-logo.png') }} alt="IMG-LOGO">
                    </a>
                    <!-- Menu desktop -->
                    <div class="menu-desktop">
                        <ul class="main-menu">
                            <li class="active-menu">
                                <a href="{{ route('home') }}">Home</a>
                            </li>

                           <li>
                                <a href="{{ route('shop.view') }}">Shop</a>
                            </li>
                            <li>
                                <a href="{{route('about')}}">About</a>
                            </li>

                            <li>
                                <a href="{{route('contact')}}">Contact</a>
                            </li>
                            <li>
                                <a href="{{route('catalogue')}}">Catalogue</a>
                            </li>
                            
                            <li>
                                <a href="{{route('distributer')}}">{{ucfirst("distributor")}}</a>
                            </li>
                            <li>
                                <a href="{{route('retailer')}}">{{ucfirst("retailer")}}</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m h-full">
                        <div class="flex-c-m h-full p-r-24">

                        </div>

                        <div class="flex-c-m h-full p-l-18 p-r-25 bor5">
                            <a href="{{ route('cart.view') }}"
                                class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11
                                  js-show-cart"
                                {{-- data-notify="2" --}}>
                                <i class="zmdi zmdi-shopping-cart"></i>
                            </a>
                        </div>



                    </div>
                </nav>
            </div>
        </div>

<!-- Header Mobile -->
<div class="wrap-header-mobile">
    <!-- Logo mobile -->
    <div class="logo-mobile">
        <a href="{{ route('home') }}"><img src="{{ asset('assets/images/Shreeji-logo.png') }}" alt="IMG-LOGO" /></a>
    </div>

    <!-- Icon header -->
    <div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
        <div class="flex-c-m h-full p-r-10">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>
        </div>

        <div class="flex-c-m h-full p-lr-10 bor5">
            <a href="{{ route('cart.view') }}" class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11">
                <i class="zmdi zmdi-shopping-cart"></i>
            </a>
        </div>
    </div>

    <!-- Button show menu -->
    <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
        <span class="hamburger-box">
            <span class="hamburger-inner"></span>
        </span>
    </div>
</div>

<!-- Menu Mobile -->
<div class="menu-mobile" id="mobileMenu">
    <ul class="main-menu-m">
        <li><a href="{{ route('home') }}">Home</a></li>
       <li> <a href="{{ route('shop.view') }}">Shop</a> </li>
        <li><a href="{{route('about')}}">About</a></li>
        <li><a href="{{route('contact')}}">Contact</a></li>
        <li><a href="{{route('catalogue')}}">Catalogue</a></li>

    </ul>
</div>

<!-- Overlay -->
<div class="menu-overlay" id="menuOverlay"></div>



        <!-- Modal Search -->
        <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
            <div class="container-search-header">
                <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                    <img src="images/icons/icon-close2.png" alt="CLOSE" />
                </button>

                <form class="wrap-search-header flex-w p-l-15">
                    <button class="flex-c-m trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <input class="plh3" type="text" name="search" placeholder="Search..." />
                </form>
            </div>
        </div>
    </header>



    @yield('contet')
    <!-- Footer -->
   <footer class="bg3 p-t-75 p-b-32">
        <div class="container">
            <div class="row">
                
                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Categories
                    </h4>

                    <ul>
                        <?php $category =  App\Models\Category::all();
                        ?>
                         @foreach ($category as $cat)
                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                {{ $cat->name }}
                            </a>
                        </li>
                         @endforeach

                        

                       
                    </ul>
                </div>
                

                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Help
                    </h4>

                    <ul>
                      

                        <li class="p-b-10">
                            <a href="{{route('contact')}}" class="stext-107 cl7 hov-cl1 trans-04">
                                Contact Us
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="https://shreejiienterprise.com/terms%20and%20conditions.html" class="stext-107 cl7 hov-cl1 trans-04">
                                Privacy & Policy
                            </a>
                        </li>
                    </ul>
                </div>
                
                  

                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Address
                    </h4>

                    <p class="stext-107 cl7 size-201">
                        3rd Floor, Mateshwari Complex, Darji Oli, Lashkar, Gwalior (M.P.)

                       
                    </p>

                    <div class="p-t-27">
                        <a href="https://www.facebook.com/shreejiitraditionalwear" target="_blank"
                            class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-facebook"></i>
                        </a>



                        <a href="https://www.instagram.com/shreejiitraditionalwear/" target="_blank"
                            class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-instagram"></i>
                        </a>

                        <a href="https://www.linkedin.com/company/shree-jii-traditional-wear" target="_blank"
                            class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-linkedin"></i>
                        </a>
                    </div>
                </div>

<div class="col-sm-6 col-lg-3 p-b-50">
    <h4 class="stext-301 cl0 p-b-30">
        Contact Us
    </h4>
    <div class="contact-info">
        <p class="mb-2">
            <i class="fa fa-phone" ></i> 
            <strong class="stext-107">Phone:</strong> 
            <br>
            <a href="tel:+919406972478">+91-9406972478</a>, 
            <a href="tel:+918305018444">+91-8305018444</a>
        </p>
        <p>
            <i class="fa fa-envelope" ></i> 
            <strong stext-107>Email:</strong> 
            <br>
            <a href="mailto:shreejienterprises787@gmail.com">shreejienterprises787@gmail.com</a>
        </p>
    </div>
</div>

            </div>

            <div class="p-t-40">


                <p class="stext-107 cl6 txt-center">

                    <br>

                    <span>Developed by </span>
                    <a href="https://www.swifnix.com" target="_blank">Swifnix Technologies</a>
                    <br>

                </p>
            </div>
        </div>
    </footer>


    <!-- Back to top -->



    <!--===============================================================================================-->
    <script src="{{ asset('assets2/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('assets2/vendor/animsition/js/animsition.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('assets2/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('assets2/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(".js-select2").each(function() {
            $(this).select2({
                minimumResultsForSearch: 20
            });
        });
    </script>
    <script>
       $(document).ready(function () {
    // Show the menu and overlay when the hamburger is clicked
    $('.btn-show-menu-mobile').on('click', function () {
        $('#mobileMenu').addClass('open'); // Slide in the mobile menu
        $('#menuOverlay').addClass('visible'); // Show overlay
    });

    // Hide the menu and overlay when the overlay or anywhere outside menu is clicked
    $('#menuOverlay').on('click', function () {
        $('#mobileMenu').removeClass('open'); // Slide out the mobile menu
        $(this).removeClass('visible'); // Hide overlay
    });

    // Close menu if a menu link is clicked
    $('.menu-mobile a').on('click', function () {
        $('#mobileMenu').removeClass('open'); // Slide out the mobile menu
        $('#menuOverlay').removeClass('visible'); // Hide overlay
    });

    // Also close the menu if the user clicks anywhere on the screen except the menu
    $(document).on('click', function (e) {
        if (!$(e.target).closest('#mobileMenu, .btn-show-menu-mobile').length) {
            $('#mobileMenu').removeClass('open'); // Slide out the mobile menu
            $('#menuOverlay').removeClass('visible'); // Hide overlay
        }
    });
});


    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('assets2/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('assets2/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('assets2/vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('assets2/js/slick-custom.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('assets2/vendor/parallax100/parallax100.js') }}"></script>
    <script>
        $('.parallax100').parallax100();
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('assets2/vendor/MagnificPopup/jquery.magnific-popup.min.js') }}"></script>
    <script>
        $('.gallery-lb').each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled: true
                },
                mainClass: 'mfp-fade'
            });
        });
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('assets2/vendor/isotope/isotope.pkgd.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('assets2/vendor/sweetalert/sweetalert.min.js') }}"></script>
    {{-- <script>
        $('.js-addwish-b2').on('click', function(e) {
            e.preventDefault();
        });

        $('.js-addwish-b2').each(function() {
            var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
            $(this).on('click', function() {
                swal(nameProduct, "is added to wishlist!", "success");

                $(this).addClass('js-addedwish-b2');
                $(this).off('click');
            });
        });

        $('.js-addwish-detail').each(function() {
            var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

            $(this).on('click', function() {
                swal(nameProduct, "is added to wishlist!", "success");

                $(this).addClass('js-addedwish-detail');
                $(this).off('click');
            });
        });

        /*---------------------------------------------*/

        $('.js-addcart-detail').each(function() {
            var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
            $(this).on('click', function() {
                swal(nameProduct, "is added to cart!", "success");
            });
        });
    </script> --}}

    <!--===============================================================================================-->
    <script src="{{ asset('assets2/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script>
        $('.js-pscroll').each(function() {
            $(this).css('position', 'relative');
            $(this).css('overflow', 'hidden');
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });

            $(window).on('resize', function() {
                ps.update();
            });
        });
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('assets2/js/main.js') }}"></script>




</body>

</html>
