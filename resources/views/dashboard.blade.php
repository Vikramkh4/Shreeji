<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Connect Plus</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}" />
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
      <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('assets/images/Shreeji-logo.png') }}" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.html"><img src={{ asset('assets/images/Shreeji-logo.png')}} alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src={{ asset('assets/images/Shreeji-logo.png')}} alt="logo" /></a>
        </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>

                <ul class="navbar-nav navbar-nav-right">



                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown"
                            aria-expanded="false">
                            <div class="nav-profile-img">
                               <img src={{ asset('assets/images/Shreeji-logo_old.png') }} alt="IMG-LOGO">
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black">Shreeji</p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm"
                            aria-labelledby="profileDropdown" data-x-placement="bottom-end">
                            <div class="p-3 text-center bg-primary">
                                <img class="img-avatar img-avatar48 img-avatar-thumb"
                                    src={{ asset('assets/images/Shreeji-logo_old.png') }} alt="" />
                            </div>
                            <div class="p-2">
                               
                              
                              
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                            <a href="#" class="dropdown-item py-1 d-flex align-items-center justify-content-between"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="mdi mdi-logout menu-icon"></i>
                                <span class="menu-title">Log Out</span>
                            </a>
                            </div>
                        </div>
                    </li>

                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                            data-toggle="dropdown">
                            <i class="mdi mdi-bell-outline"></i>
                            <span class="count-symbol bg-danger"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                            aria-labelledby="notificationDropdown">
                            <h6 class="p-3 mb-0 bg-primary text-white py-4">
                                Notifications
                            </h6>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-success">
                                        <i class="mdi mdi-calendar"></i>
                                    </div>
                                </div>
                                <div
                                    class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="preview-subject font-weight-normal mb-1">
                                        Event today
                                    </h6>
                                    <p class="text-gray ellipsis mb-0">
                                        Just a reminder that you have an event today
                                    </p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-warning">
                                        <i class="mdi mdi-settings"></i>
                                    </div>
                                </div>
                                <div
                                    class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="preview-subject font-weight-normal mb-1">
                                        Settings
                                    </h6>
                                    <p class="text-gray ellipsis mb-0">Update dashboard</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-info">
                                        <i class="mdi mdi-link-variant"></i>
                                    </div>
                                </div>
                                <div
                                    class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="preview-subject font-weight-normal mb-1">
                                        Launch Admin
                                    </h6>
                                    <p class="text-gray ellipsis mb-0">New admin wow!</p>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <h6 class="p-3 mb-0 text-center">See all notifications</h6>
                        </div>
                    </li> --}}
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                
                <ul class="nav">
                    <li class="nav-item nav-category">Main</li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <span class="icon-bg">
                                <i class="mdi mdi-cube menu-icon"></i>
                            </span>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.list') }}">
                            <span class="icon-bg">
                                <i class="mdi mdi-cube menu-icon"></i>
                            </span>
                            <span class="menu-title">Products</span>
                        </a>
                    </li>

                    {{-- <li class="nav-item">
              <a
                class="nav-link"
                data-toggle="collapse"
                href="#ui-basic"
                aria-expanded="false"
                aria-controls="ui-basic"
              >
                <span class="icon-bg"
                  ><i class="mdi mdi-crosshairs-gps menu-icon"></i
                ></span>
                <span class="menu-title">UI Elements</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a
                      class="nav-link"
                      href="../../pages/ui-features/buttons.html"
                      >Buttons</a
                    >
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link"
                      href="../../pages/ui-features/dropdowns.html"
                      >Dropdowns</a
                    >
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link"
                      href="../../pages/ui-features/typography.html"
                      >Typography</a
                    >
                  </li>
                </ul>
              </div>
            </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('inquiries.list') }}">
                            <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
                            <span class="menu-title">Inquiry</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.index') }}">
                            <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
                            <span class="menu-title">Category</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('banners.index') }}">
                            <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
                            <span class="menu-title">Banner</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('feature_products.index') }}">
                            <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
                            <span class="menu-title">Feature</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('premium.index') }}">
                            <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
                            <span class="menu-title">Premium</span>
                        </a>
                    </li>

                    <li class="nav-item">
              <a class="nav-link" href="{{ route('view.distributer') }}">
                <span class="icon-bg"
                  ><i class="mdi mdi-chart-bar menu-icon"></i
                ></span>
                <span class="menu-title">Distributor&Retailer</span>
              </a>
            </li>
                    <li class="nav-item">
              <a class="nav-link" href="{{ route('pdf.upload.form') }}">
                <span class="icon-bg"
                  ><i class="mdi mdi-chart-bar menu-icon"></i
                ></span>
                <span class="menu-title">Upload Pdf</span>
              </a>
            </li>
          {{--   <li class="nav-item">
              <a class="nav-link" href="../../pages/tables/basic-table.html">
                <span class="icon-bg"
                  ><i class="mdi mdi-table-large menu-icon"></i
                ></span>
                <span class="menu-title">Tables</span>
              </a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                data-toggle="collapse"
                href="#auth"
                aria-expanded="false"
                aria-controls="auth"
              >
                <span class="icon-bg"
                  ><i class="mdi mdi-lock menu-icon"></i
                ></span>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a
                      class="nav-link"
                      href="../../pages/samples/blank-page.html"
                    >
                      Blank Page
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../../pages/samples/login.html">
                      Login
                    </a>
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link"
                      href="../../pages/samples/register.html"
                    >
                      Register
                    </a>
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link"
                      href="../../pages/samples/error-404.html"
                    >
                      404
                    </a>
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link"
                      href="../../pages/samples/error-500.html"
                    >
                      500
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item documentation-link">
              <a
                class="nav-link"
                href="http://www.bootstrapdash.com/demo/connect-plus-free/jquery/documentation/documentation.html"
                target="_blank"
              >
                <span class="icon-bg">
                  <i class="mdi mdi-file-document-box menu-icon"></i>
                </span>
                <span class="menu-title">Documentation</span>
              </a>
            </li>
            <li class="nav-item sidebar-user-actions">
              <div class="user-details">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <div class="d-flex align-items-center">
                      <div class="sidebar-profile-img">
                        <img
                        src={{ asset('assets/images/faces/face28.png')}}
                         
                          alt="image"
                        />
                      </div>
                      <div class="sidebar-profile-text">
                        <p class="mb-1">Henry Klein</p>
                      </div>
                    </div>
                  </div>
                  <div class="badge badge-danger">3</div>
                </div>
              </div>
            </li>
            <li class="nav-item sidebar-user-actions">
              <div class="sidebar-user-menu">
                <a href="#" class="nav-link"
                  ><i class="mdi mdi-settings menu-icon"></i>
                  <span class="menu-title">Settings</span>
                </a>
              </div>
            </li>
            <li class="nav-item sidebar-user-actions">
              <div class="sidebar-user-menu">
                <a href="#" class="nav-link"
                  ><i class="mdi mdi-speedometer menu-icon"></i>
                  <span class="menu-title">Take Tour</span></a
                >
              </div>
            </li> --}}
                    <li class="nav-item sidebar-user-actions">
                        <div class="sidebar-user-menu">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                            <a href="#" class="nav-link"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="mdi mdi-logout menu-icon"></i>
                                <span class="menu-title">Log Out</span>
                            </a>
                        </div>
                    </li>

                </ul>
            </nav>

            <div class="main-panel">
                <div class="content-wrapper">

                    @yield('content')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                <footer class="footer">
                    <div class="footer-inner-wraper">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                                bootstrapdash.com 2020</span>
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
                                Free
                                <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard
                                    templates</a>
                                from Bootstrapdash.com</span>
                        </div>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>

    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
</body>

</html>
