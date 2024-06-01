<!doctype html>
<html class="no-js" lang="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="{{ asset('frontend/img/apple-touch-icon.png') }}">
    <!-- Place favicon.ico in the root directory -->


    <!-- =========================
        Loding All Stylesheet
    ============================== -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/rateyo.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/lightslider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/megamenu.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/toastr.min.css') }}">
    @stack('styles')
    <!-- =================================================
        These plugins only need for the select2 dropdown
    ====================================================== -->
    <link rel="stylesheet" href="{{ asset('frontend/css/select2.min.css') }}">
    <!-- =========================
        Loding Main Theme Style
    ============================== -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

    <!-- =========================
    	Header Loding JS Script
    ============================== -->
    <script src="{{ asset('frontend/js/modernizr.js') }}"></script>
    @guest
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    @endguest
    <!-- Summernote -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/plugins/summernote/summernote-bs4.min.css')}}">
  </head>
  <body class="">
    <!-- Page content -->
    <div class="preloader"></div>
    @yield('content')
    <!-- =========================
    	Main Loding JS Script
    ============================== -->
    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('frontend/js/popper.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.nav.js') }}"></script>
    <!-- <script src="{{ asset('frontend/js/jquery.nicescroll.js') }}"></script> -->
    <script src="{{ asset('frontend/js/jquery.rateyo.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('frontend/js/mobile.js') }}"></script>
    <script src="{{ asset('frontend/js/lightslider.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/circle-progress.min.js') }}"></script>
    <script src="{{ asset('frontend/js/waypoints.min.js') }}"></script>

    <script src="{{ asset('frontend/js/simplePlayer.js') }}"></script>

    <script src="{{ asset('frontend/js/main.js') }}"></script>

    <!-- Summernote -->
    <script type="text/javascript" src="{{asset('frontend/plugins/summernote/summernote-bs4.min.js')}}"></script>

    <!-- These plugins only need for the select2 dropdown -->
    <script type="text/javascript" src="{{ asset('frontend/js/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/js/toastr.min.js') }}"></script>

    @yield('script')
  </body>
</html>
