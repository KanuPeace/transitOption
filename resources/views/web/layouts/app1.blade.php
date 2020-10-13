<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>@yield('title') :: WUSOB</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Wusob Technologies, NGO-Website Developent, Eccommerce-Website-Developmwnt with Payment Integration, Mobile-APp Development, Desktop-App Development" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

    </script>
    <!-- //Meta tag Keywords -->

    <!-- Custom-Files -->
    <link rel="stylesheet" href="{{ $web_source }}/css/bootstrap.css">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="{{ $web_source }}/css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ $web_source }}/css/portfolio.css">
    <link rel="stylesheet" href="{{ $web_source }}/css/aos.css">
    <link href="{{ $web_source }}/css/aos-animation.css" rel='stylesheet prefetch' type="text/css" media="all" />

    <!-- Style-CSS -->
    <!-- font-awesome-icons -->
    <link href="{{ $web_source }}/css/font-awesome.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ $web_source }}/images/wusob_logo.png">
    <!-- //font-awesome-icons -->
    <!-- /Fonts -->
    <link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Playfair+Display:400,400i,700i" rel="stylesheet">
    <script src="//rum-static.pingdom.net/pa-5f44e30d8e83fa0015000963.js" async></script>
    @toastr_css
    <!-- //Fonts -->

</head>
<body>
    <!-- mian-content -->
    <div class="main-content" id="home">
        @include('web.includes.header')
    </div>

    @yield('content')
    @include('web.includes.footer')
    <!--//Register-->
    <script src="{{ $web_source }}/js/jquery-2.2.3.min.js"></script>
    <!--/aos -->
    <script src="{{ $web_source }}/js/aos.js"></script>
    <script>
        AOS.init({
            easing: 'ease-out-back',
            duration: 1000
        });

    </script>
    <!--//aos -->
    <!--/counter-->
    <script src="{{ $web_source }}/js/counternew.js"></script>
    <!--//counter-->
    <!--/ start-smoth-scrolling -->
    <script src="{{ $web_source }}/js/move-top.js"></script>
    <script src="{{ $web_source }}/js/easing.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 900);
            });
        });

    </script>
    <script>
        $(document).ready(function() {
            /*
            						var defaults = {
            							  containerID: 'toTop', // fading element id
            							containerHoverID: 'toTopHover', // fading element hover id
            							scrollSpeed: 1200,
            							easingType: 'linear'
            						 };
            						*/

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });

    </script>
    <!--// end-smoth-scrolling -->

    <!-- //js -->

    <script src="{{ $web_source }}/js/bootstrap.js"></script>
    <script src="{{ $web_source }}/js/custom.js"></script>
    <script src="{{ $web_source }}/js/jquery-2.2.3.min.js"></script>
    @toastr_js
</body>
@toastr_render
</html>
