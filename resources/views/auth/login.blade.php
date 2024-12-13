<x-auth-session-status class="mb-4" :status="session('status')" />
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Shreeji Traditional Wear - Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('assets/images/Shreeji-logo.png') }}" />

    <style>
        /* Page Container */
        .auth-form-light {
            width: 50%;
            float: left;
            padding: 40px;
            background-color: rgba(255, 255, 255, 0.85);
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        /* Background Image */
        .background-image {
            width: 50%;
            float: right;
            background-image: url('{{ asset('assets/images/sa.png') }}');
            background-size: cover;
            background-position: center;
            height: 100vh;
            position: relative;
        }

        /* Background Pattern Overlay */
        .background-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.3);
            background-image: url('{{ asset('assets/images/pattern-overlay.png') }}');
            background-repeat: repeat;
            background-blend-mode: overlay;
        }

        .full-page-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 100vh;
        }

        /* Branding and Title */
        .brand-logo img {
            width: 180px;
            margin-bottom: 20px;
        }

        h4 {
            color: rgb(181, 29, 42);
            font-family: 'Playfair Display', serif;
            font-size: 28px;
        }

        h6 {
            color: #555;
            font-family: 'Lora', serif;
        }

        .form-control {
            border-radius: 25px;
            border: 2px solid rgb(181, 29, 42);
        }

        .form-check-label {
            color: #8A5A44;
        }

        /* Button Styles */
        .btn-primary {
            background-color: rgb(181, 29, 42);
            border-color: rgb(181, 29, 42);
            border-radius: 25px;
        }

        .btn-primary:hover {
            background-color: #8A5A44;
            border-color: #8A5A44;
        }

        /* Link Styles */
        .auth-link {
            color: #8A5A44;
        }

        .auth-link:hover {
            color: #B5651D;
        }

        /* Footer */
        .font-weight-light a {
            color: #B5651D;
            font-weight: 600;
        }

        .font-weight-light a:hover {
            color: #8A5A44;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="auth-form-light text-left p-5">
                <div class="brand-logo text-center mb-4">
                    <img class="mx-auto d-block" src="{{ asset('assets/images/Shreeji-logo.png') }}" alt="Shreeji Logo">
                </div>
                <h4 class="text-center">Welcome to Shreeji</h4>
                <h6 class="font-weight-light text-center">Sign in to explore our finest traditional wear</h6>

                <form method="POST" action="{{ route('login') }}" class="pt-3">
                    @csrf
                    <!-- Email Address -->
                    <div class="form-group">
                        <input type="email" class="form-control form-control-lg" id="email" name="email"
                            placeholder="Email" value="{{ old('email') }}" required autofocus autocomplete="username">
                        @error('email')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <input type="password" class="form-control form-control-lg" id="password" name="password"
                            placeholder="Password" required autocomplete="current-password">
                        @error('password')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="form-check mt-4 d-flex align-items-center">
                        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                        <label for="remember_me" class="form-check-label text-muted ml-2">Keep me signed in</label>
                    </div>

                    <!-- Forgot Password and Login Button -->
                    <div class="mt-3 d-flex justify-content-between align-items-center">
                       
                        <button type="submit"
                            class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Log in</button>
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
