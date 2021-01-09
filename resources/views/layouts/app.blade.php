<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Plus Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ my_asset() }}dashboard1/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ my_asset() }}dashboard1/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ my_asset() }}dashboard1/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ my_asset() }}dashboard1/vendors/jquery-bar-rating/css-stars.css" />
    <link rel="stylesheet" href="{{ my_asset() }}dashboard1/vendors/font-awesome/css/font-awesome.min.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ my_asset() }}dashboard1/css/demo_2/style.css" />
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ my_asset() }}dashboard1/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_horizontal-navbar.html -->
        <div class="horizontal-menu">
            <nav class="navbar top-navbar col-lg-12 col-12 p-0">
                <div class="container">
                    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                        <a class="navbar-brand brand-logo" href="index.html">
                            <img src="{{ my_asset() }}dashboard1/images/logo.svg" alt="logo" />
                            <span class="font-12 d-block font-weight-light">Responsive Dashboard </span>
                        </a>
                        <a class="navbar-brand brand-logo-mini" href="index.html"><img
                                src="{{ my_asset() }}dashboard1/images/logo-mini.svg" alt="logo" /></a>
                    </div>
                    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                        <ul class="navbar-nav mr-lg-2">
                            <li class="nav-item nav-search d-none d-lg-block">
                                <div class="input-group">
                                    <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                                        <span class="input-group-text" id="search">
                                            <i class="mdi mdi-magnify"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" id="navbar-search-input"
                                        placeholder="Search" aria-label="search" aria-describedby="search" />
                                </div>
                            </li>
                        </ul>
                        <ul class="navbar-nav navbar-nav-right">
                            <li class="nav-item nav-profile dropdown">
                                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown"
                                    aria-expanded="false">
                                    <div class="nav-profile-img">
                                        <img src="{{ my_asset() }}dashboard1/images/faces/face1.jpg" alt="image" />
                                    </div>
                                    <div class="nav-profile-text">
                                        <p class="text-black font-weight-semibold m-0"> Olson jass </p>
                                        <span class="font-13 online-color">online <i
                                                class="mdi mdi-chevron-down"></i></span>
                                    </div>
                                </a>
                                <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="mdi mdi-cached mr-2 text-success"></i> Activity Log </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">
                                        <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
                                </div>
                            </li>
                        </ul>
                        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                            data-toggle="horizontal-menu-toggle">
                            <span class="mdi mdi-menu"></span>
                        </button>
                    </div>
                </div>
            </nav>
            <nav class="bottom-navbar">
                @include("layouts.company_bar")
            </nav>
        </div>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield("content")
                </div>
            </div>
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ my_asset() }}dashboard1/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ my_asset() }}dashboard1/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
    <script src="{{ my_asset() }}dashboard1/vendors/chart.js/Chart.min.js"></script>
    <script src="{{ my_asset() }}dashboard1/vendors/flot/jquery.flot.js"></script>
    <script src="{{ my_asset() }}dashboard1/vendors/flot/jquery.flot.resize.js"></script>
    <script src="{{ my_asset() }}dashboard1/vendors/flot/jquery.flot.categories.js"></script>
    <script src="{{ my_asset() }}dashboard1/vendors/flot/jquery.flot.fillbetween.js"></script>
    <script src="{{ my_asset() }}dashboard1/vendors/flot/jquery.flot.stack.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ my_asset() }}dashboard1/js/off-canvas.js"></script>
    <script src="{{ my_asset() }}dashboard1/js/hoverable-collapse.js"></script>
    <script src="{{ my_asset() }}dashboard1/js/misc.js"></script>
    <script src="{{ my_asset() }}dashboard1/js/settings.js"></script>
    <script src="{{ my_asset() }}dashboard1/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ my_asset() }}dashboard1/js/dashboard.js"></script>
    @yield("script")
    <!-- End custom js for this page -->
</body>

</html>
