<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/core-img/favicon.png') }}">

    <!-- Master Stylesheet [If you remove this CSS file, your file will be broken undoubtedly.] -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <!-- Summernote -->
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">

    <!-- These plugins only need for the run file upload -->
    <link rel="stylesheet" href="{{ asset('css/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/default-assets/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/default-assets/fileupload.css') }}">

    <!-- These plugins only need for the select2 dropdown -->
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">

    <!-- These plugins only need for toaster alert -->
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">

    <!-- These plugins only need for date picker -->
    <link rel="stylesheet" href="{{ asset('css/jquery.datetimepicker.min.css') }}">

    <!-- These plugins only need for the run sweetalert -->
    <link rel="stylesheet" href="{{ asset('css/default-assets/new/sweetalert-2.min.css') }}">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="preloader-load"></div>
    </div>
    <!-- Preloader -->

    <!-- ======================================
    ******* Page Wrapper Area Start **********
    ======================================= -->
    <div class="ecaps-page-wrapper">
    @include('include.sidebar')

        <!-- Page Content -->
        <div class="ecaps-page-content">
        @include('include.navbar')

            <!-- Main Content Area -->
            <div class="main-content">
            @yield('content')

            <!-- include('include.footer')  -->
            </div>

        </div>
    </div>

    <!-- ======================================
    ********* Page Wrapper Area End ***********
    ======================================= -->

    <!-- Must needed plugins to the run this Template -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bundle.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/default-assets/setting.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/default-assets/fullscreen.js') }}"></script>

    <!-- Active JS -->
    <script type="text/javascript" src="{{ asset('js/default-assets/active.js') }}"></script>

    <!-- Summernote -->
    <script type="text/javascript" src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>

    <!-- These plugins only need for the run file upload -->
    <script src="{{ asset('js/dropzone.min.js') }}"></script>
    <script src="{{ asset('js/default-assets/dropzone-custom.js') }}"></script>
    <script src="{{ asset('js/default-assets/dropzone-and-module.min.js') }}"></script>

    <!-- These plugins only need for toaster alert -->
    <script src="{{ asset('js/toastr.min.js') }}"></script>

    <!-- These plugins only need for the select2 dropdown -->
    <script type="text/javascript" src="{{ asset('js/select2.min.js') }}"></script>

    <!-- These plugins only need for datepicker -->
    <script type="text/javascript" src="{{ asset('js/jquery.datetimepicker.full.min.js') }}"></script>

    <!-- These plugins only need for parsley alert -->
    <script src="{{ asset('js/parsley.min.js') }}"></script>

    <!-- These plugins only need for reorderable sortable drag-and-drop lists -->
    <script src="{{ asset('js/sortable/prettify.js') }}"></script>
    <script src="{{ asset('js/sortable/run_prettify.js') }}"></script>
    <script src="{{ asset('js/sortable/sortable.min.js') }}"></script>

    <!-- These plugins only need for the run sweet alert -->
    <script type="text/javascript" src="{{ asset('js/default-assets/sweetalert2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/default-assets/sweetalert-init.js') }}"></script>





    @yield('script')
    <script>
        $(document).ajaxStart(function() {
            $("#preloader").show();
        });

        // AJAX stop
        $(document).ajaxStop(function() {
            $("#preloader").hide();
        });
    </script>
</body>

</html>
