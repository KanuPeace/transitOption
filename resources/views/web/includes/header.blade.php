{{-- <!-- Header -->
<header class="header" role="banner">
    <div class="wrap">
        <!-- Logo -->
        <div class="logo">
            <a href="{{ route('homepage') }}" title="Transfers"><img src="{{ $logo_img }}" alt="Transfers" width="80"/></a>
        </div>
        <!-- //Logo -->
        
        <!-- Main Nav -->
        <nav role="navigation" class="main-nav">
            <ul>
                <li class="active"><a href="{{ route('homepage') }}" title="">Home</a></li>
                <li class=""><a href="{{ route('our_blog') }}" title="Blog">Blog</a></li>
                <li><a href="{{ route('contactUs') }}" title="Contact">Contact</a></li>
                @auth
                    <li><a href="{{ route('home') }}" title="Contact">Dashboard</a></li>
                    <li><a href="#" onclick=" return $('#logout_form').trigger('submit'); " title="Contact">Logout</a></li>
                    <form action="{{ route("logout") }}" id="logout_form" method="post">@csrf</form>
                @else
                    <li><a href="{{ route('register') }}" title="Contact">Register</a></li>
                    <li><a href="{{ route('login') }}" title="Contact">Login</a></li>
                @endauth
            </ul>
        </nav>
        <!-- //Main Nav -->
    </div>
</header>
<!-- //Header --> --}}

<header class="header-area">

    {{-- <div class="top-header-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-7">
                    <div class="contact-info">
                        <div class="content">
                            <i class='bx bx-phone'></i>
                            <a href="tel:+0123456987">+0123 456 987</a>
                        </div>
                        <div class="content">
                            <i class='bx bx-envelope'></i>
                            <a
                                href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#adc5c8c1c1c2edc7ccd8c3d983cec2c0"><span
                                    class="__cf_email__"
                                    data-cfemail="85ede0e9e9eac5efe4f0ebf1abe6eae8">[email&#160;protected]</span></a>
                        </div>
                        <div class="content">
                            <i class='bx bx-map'></i>
                            <a href="#">Mon-Fri: 8 AM – 7 PM</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-5">
                    <div class="side-option">
                        <div class="item">
                            <div class="language">
                                <a href="#language" id="languageButton"
                                    class="btn-secondary">
                                    Language <i class='bx
                                        bxs-chevron-down'></i>
                                </a>
                                <ul class="menu">
                                    <li class="menu-item">
                                        <a href="#" class="menu-link">
                                            <img
                                                src="assets/img/flag-uk.png"
                                                alt="flag">
                                            English
                                        </a>
                                    </li>
                                    <li class="menu-item"><a href="#"
                                            class="menu-link">
                                            <img
                                                src="assets/img/flag-germany.png"
                                                alt="flag">
                                            Deutsch</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#" class="menu-link">
                                            <img
                                                src="assets/img/flag-jordan.png"
                                                alt="flag">
                                            العربية
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#" class="menu-link">
                                            <img
                                                src="assets/img/flag-china.png"
                                                alt="flag">
                                            中文
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="item">
                            <a href="#" class="btn-secondary">
                                Login <i class='bx bx-log-in-circle'></i>
                            </a>
                        </div>
                        <div class="item">
                            <a href="#searchBox" id="searchButton"
                                class="btn-search"
                                data-effect="mfp-zoom-in">
                                <i class='bx bx-search-alt'></i>
                            </a>
                            <div id="searchBox" class="search-box
                                mfp-with-anim mfp-hide">
                                <form class="search-form">
                                    <input class="search-input"
                                        name="search"
                                        placeholder="Search"
                                        type="text">
                                    <button class="btn-search">
                                        <i class='bx bx-search-alt'></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    <div class="main-navbar-area">
        <div class="main-responsive-nav">
            <div class="container">
                <div class="main-responsive-menu">
                    <div class="logo">
                        <a href="{{ route('homepage') }}" title="Logo"><img src="{{ $logo_img }}" alt="Transfers" width="80"/></a>
                    </div>
                    <div class="cart responsive">
                        <a href="cart.html" class="cart-btn"><i
                                class='bx bx-cart'></i>
                            <span class="badge">0</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="{{ route('homepage') }}" title="Logo"><img src="{{ $logo_img }}" alt="Transfers" width="80"/></a>
                    <div class="collapse navbar-collapse mean-menu">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active"><a href="{{ route('homepage') }}" class="nav-link" title="">Home</a></li>
                            <li class="nav-item"><a href="{{ route('our_blog') }}"  class="nav-link" title="Blog">Blog</a></li>
                            <li class="nav-item"><a href="{{ route('contactUs') }}" class="nav-link" title="Contact">Contact</a></li>
                            @auth
                                <li class="nav-item"><a href="{{ route('home') }}" class="nav-link" title="Contact">Dashboard</a></li>
                                <li class="nav-item"><a href="#" onclick=" return $('#logout_form').trigger('submit'); " class="nav-link" title="Contact">Logout</a></li>
                                <form action="{{ route("logout") }}" id="logout_form" method="post">@csrf</form>
                            @else
                                <li class="nav-item"><a href="{{ route('register') }}" class="nav-link" title="Contact">Register</a></li>
                                <li class="nav-item"><a href="{{ route('login') }}" class="nav-link" title="Contact">Login</a></li>
                            @endauth
                        </ul>
                        <div class="cart">
                            <a href="cart.html" class="cart-btn"><i
                                    class='bx bx-cart'></i>
                                <span class="badge">0</span>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>

</header>
