
<head>
    <title> XYZ Wear Coporation - @yield('htmlheader_title', 'Your title here') </title>
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/css/owl.carousel.css') }}" rel="stylesheet" type="text/css"/>
    @stack('page_css')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <script src="{{ asset('/js/jquery.min.js') }}"></script>
    <!-- cart -->
    <script src="{{ asset('/js/simpleCart.min.js') }}"></script>
    <!-- cart -->
    <script type="text/javascript" src="{{ asset('/js/bootstrap-3.1.1.min.js') }}"></script>
    <script src="{{ asset('/js/imagezoom.js') }}"></script>


    <!-- FlexSlider -->
    <script defer src="{{ asset('/js/jquery.flexslider.js') }}"></script>
    <link rel="stylesheet" href="{{asset('css/flexslider.css') }}" type="text/css" media="screen"/>

    <script>
        // Can also be used with $(document).ready()
        $(window).load(function () {
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
        });
    </script>


</head>