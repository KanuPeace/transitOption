<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="Transfers - Private Transport and Car Hire HTML Template" />
        <meta name="description" content="Transfers - Private Transport and Car Hire HTML Template">
        <meta name="author" content="themeenergy.com">
        
        <title>{{ !empty($title ?? '') ? $title.' - ' : '' }} Transit Option</title>
        
        @include('web.includes.style')

    </head>
<body class="home">
    <!-- Preloader -->
    <div class="preloader">
        <div id="followingBallsG">
            <div id="followingBallsG_1" class="followingBallsG"></div>
            <div id="followingBallsG_2" class="followingBallsG"></div>
            <div id="followingBallsG_3" class="followingBallsG"></div>
            <div id="followingBallsG_4" class="followingBallsG"></div>
        </div>
    </div>
    <!-- //Preloader -->
    @include('web.includes.header')
	@if ($pageType ?? '' == "auth")

    <!-- Main -->
	<main class="main auth_form" role="main">


            <div class="container">
                <div class="row mt-5">
                    <div class="col-md-3">
                        @include("company.fragments.sidebar" , ["activePage" => $activePage ?? ""])    
                    </div>

                    
                    <div class=" col-md-9">
                        <div class="container card">
                            @include('web.includes.flash_message')
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
       
            
        
        </main>
        <!-- //Main -->
    @else
        @yield('content')
    @endif
    @include('web.includes.footer')

<!--bottom to top button start-->
<button class="scroll-top scroll-to-target" data-target="html">
    <span class="ti-angle-up"></span>
</button>
<!--bottom to top button end-->

        @include('web.includes.script')
</body>

</html>
