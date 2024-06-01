<section id="wd-header" class="d-flex align-items-center mob-sticky">
    <div class="container">
        <div class="row">
            <!-- =========================
                Mobile Menu
            ============================== -->
            <div class="order-2 order-sm-1 col-2 col-sm-2 col-md-4 d-block d-lg-none">
                <div class="accordion-wrapper hide-sm-up">
                    <a href="#" class="mobile-open"><i class="fa fa-bars" ></i></a>
                    <!--Mobile Menu start-->

                    <ul id="mobilemenu" class="accordion">
                       <!-- <li class="mob-logo"><a href="index.html"><img src="img/logo.png" alt=""></a></li>-->
                        <li><a class="closeme" href="#"><i class="fa fa-times" ></i></a></li>
                        <li class="mob-logo"><a href="{{ route('home') }}"><img src="{{ img($settings->logo ?? '') }}" alt=""></a></li>
                        <li class="out-link"><a class="" href="{{ route('home') }}">Home</a></li>
                        <li class="out-link"><a class="" href="{{ route('category.index') }}">Category</a></li>
                        <li class="out-link"><a class="" href="{{ route('sub-category.index') }}">Sub-category</a></li>
                        <li class="out-link"><a class="" href="{{ route('brand.index') }}">Brand</a></li>
                        <li class="out-link"><a class="" href="{{ route('blog.index') }}">Blog</a></li>
                        <li class="out-link"><a class="" href="coupon.html">Contact us</a></li>
                        <li class="out-link"><a class="" href="coupon.html">About us</a></li>

                    </ul>
                    <!--Mobile Menu end-->
                </div>
            </div><!--Mobile menu end-->

            <div class="order-1 order-sm-2  col-12 col-sm-4 col-md-4 col-lg-2 col-xl-2">
                <div class="blrub-logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ img($settings->logo ?? '') }}" alt="Logo">
                    </a>
                </div>
            </div>

            <!-- =========================
                 Search Box  Show on large device
            ============================== -->
            <div class="col-12 order-lg-2 col-md-5 col-lg-6 col-xl-5 d-none d-lg-block">
                <div class="input-group wd-btn-group header-search-option">
                    <input type="text" class="form-control blurb-search d-none" placeholder="Search ..." aria-label="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-secondary wd-btn-search d-none" type="button">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </span>
                </div>
            </div>

            <!-- =========================
                 Login and My Acount
            ============================== -->
            <div class="order-3 order-sm-3 col-10 col-sm-6 col-lg-4 col-md-4 col-xl-5">
                <!-- =========================
                     User Account Section
                ============================== -->
                    <div class="acc-header-wraper">
                        <div class="account-section">
                            @auth
                            <button class="btn btn-primary my-account d-none d-lg-block dropdown-toggle" type="button" id="user-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i> {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="user-menu">
                              <a class="dropdown-item" href="{{ route('my.profile') }}">Profile</a>
                              @if(can('Access Dashbaord'))
                              <a class="dropdown-item" href="{{ route('backend.home') }}">Dashbaord</a>
                              @endif
                              <a class="dropdown-item" href="{{ route('my.reviews') }}">My Reviews</a>
                              <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                            </div>
                            @endauth
                            @guest
                                <button class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg2">
                                    <i class="fa fa-sign-in" aria-hidden="true"></i><span>Login/Register</span>
                                </button>
                                @include('auth.frontend.authentication')
                            @endguest
                        </div>
                        <div class="serch-wrapper">
                            <div class="search">
                                <input class="search-input" placeholder="Search" type="text">
                                <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                </div>

            </div>
        </div><!--Row End-->
    </div><!--Container End-->
</section><!--Section End-->
