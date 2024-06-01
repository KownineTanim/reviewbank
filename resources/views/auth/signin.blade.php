<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
     <title>Sign In | {{ config('app.name') }}</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.png">

    <!-- Master Stylesheet [If you remove this CSS file, your file will be broken undoubtedly.] -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

</head>

<body class="login-area">

    <!-- Preloader -->
    <div id="preloader">
        <div class="preloader-load"></div>
    </div>
    <!-- Preloader -->

    <!-- ======================================
    ******* Page Wrapper Area Start **********
    ======================================= -->
    <div class="main-content- h-100vh">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-md-8 col-lg-5">
                    <!-- Middle Box -->
                    <div class="middle-box">
                        <div class="card">
                            <div class="card-body p-4">

                                <!-- Logo -->
                                <h4 class="font-24 mb-1">Sign In.</h4>
                                <p class="mb-30">Sign in to your account to continue.</p>

                                @error('invalid-cred')
                                    <p class='alert alert-danger'>{{ $message }}</p>
                                @enderror

                                <form action="{{ route('backend.login') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label class="float-left" for="email">Email or Mobile</label>
                                        <input class="form-control" type="text" name="email" id="email" required="">
                                        @error('email')
                                            <p class='text-danger'>{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <a href="forget-password.html" class="text-dark float-right"></a>
                                        <label class="float-left" for="password">Password</label>
                                        <input class="form-control" type="password" name="password" required="" id="password">
                                        @error('password')
                                            <p class='text-danger'>{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group d-flex justify-content-between align-items-center mb-3">
                                        <div class="checkbox d-inline mb-0">
                                            <input type="checkbox" name="checkbox-1" name="remember" id="checkbox-8">
                                            <label for="checkbox-8" class="cr mb-0">Remember me</label>
                                        </div>
                                        <span class="font-13 text-primary"><a href="forget-password.html">Forgot your password?</a></span>
                                    </div>

                                    <div class="form-group mb-0">
                                        <button class="btn btn-primary btn-block" type="submit"> Sign In </button>
                                    </div>

                                    <div class="text-center mt-15"><span class="mr-2 font-13 font-weight-bold">Don't have an account?</span><a class="font-13 font-weight-bold" href="register.html">Sign up</a></div>

                                </form>

                                <!-- end card -->
                            </div>
                        </div>
                    </div>
                </div>
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

    <!-- Active JS -->
    <script type="text/javascript" src="{{ asset('js/default-assets/active.js') }}"></script>

</body>

</html>
