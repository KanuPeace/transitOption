<!-- Header -->
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
                    <li><a href="{{ route('contactUs') }}" title="Contact">Dashboard</a></li>
                @else
                    <li><a href="{{ route('register') }}" title="Contact">Register</a></li>
                    <li><a href="{{ route('login') }}" title="Contact">Login</a></li>
                @endauth
            </ul>
        </nav>
        <!-- //Main Nav -->
    </div>
</header>
<!-- //Header -->