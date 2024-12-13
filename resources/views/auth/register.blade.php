<x-auth-session-status class="mb-4" :status="session('status')" />

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Connect Plus</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('assets/image/Shreeji-logo.png') }}">
    
    <style>
        .auth-form-light {
            width: 50%;
            float: left;
            padding: 20px;
        }
        .background-image {
            width: 50%;
            float: right;
            background-image: url('{{ asset('assets/images/shreeji-clothing.jpg') }}');  
            background-size: cover;
            background-position: center;
            height: 100vh;
        }
        .full-page-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 100vh;
        }
        .brand-logo img {
            width: 150px; /* Adjust the size of the logo as needed */
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="auth-form-light text-left p-5">
                {{-- <div class="brand-logo">
                    <img src="{{ asset('assets/images/Shreeji-logo.png') }}" alt="Shreeji Logo">
                </div> --}}
                <h4>New here?</h4>
                <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                <form method="POST" action="{{ route('register') }}" class="pt-3">
                    @csrf

                    <!-- Name -->
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Name" value="{{ old('name') }}" required autofocus autocomplete="name">
                        @error('name')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email Address -->
                    <div class="form-group">
                        <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="username">
                        @error('email')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password" required autocomplete="new-password">
                        @error('password')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group">
                        <input type="password" class="form-control form-control-lg" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                        @error('password_confirmation')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Register</button>
                    </div>

                    <div class="text-center mt-4 font-weight-light">
                        Already have an account? <a href="{{ route('login') }}" class="text-primary">Login</a>
                    </div>
                </form>
            </div>
            <div class="background-image">
                <!-- Background image area -->
            </div>
        </div>
    </div>

    <!-- plugins:js -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <!-- endinject -->
</body>
</html>
