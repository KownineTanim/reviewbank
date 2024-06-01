<style>
    .mobile-search
    {
        background-image: url('img/core-img/search.png');
        background-position: 10px 10px;
        background-repeat: no-repeat;
        padding-left: 40px; /* Adjust the value according to your icon size */
    }
</style>
<section id="wd-header-2" class="wd-header-nav sticker-nav mob-sticky">
    <div class="container-fluid custom-width">
        <div class="row">
            <div class="col-md-8 col-8 col-sm-6 col-md-4 d-block d-lg-none">
                 <div class="accordion-wrapper hide-sm-up">
                    <a href="#" class="mobile-open"><i class="fa fa-bars" ></i></a>
                    <!--Mobile Menu start-->

                    <ul id="mobilemenu" class="accordion">
                       <!-- <li class="mob-logo"><a href="index.html"><img src="{{ asset('frontend/img/logo.png') }}" alt=""></a></li>-->
                        <li><a class="closeme" href="#"><i class="fa fa-times" ></i></a></li>
                        <li class="mob-logo"><a href="{{ route('home') }}"><img src="{{ img($settings->logo  ?? '') }}" alt=""></a></li>
                        <li class="out-link"><a class="" href="{{ route('home') }}">Home</a></li>
                        <li class="out-link"><a class="" href="{{ route('category.index') }}">Category</a></li>
                        <li class="out-link"><a class="" href="{{ route('sub-category.index') }}">Sub-category</a></li>
                        <li class="out-link"><a class="" href="{{ route('brand.index') }}">Brand</a></li>
                        <li class="out-link"><a class="" href="{{ route('blog.index') }}">Blog</a></li>
                        <li class="out-link"><a class="" href="{{ route('contact-us.index') }}">Contact us</a></li>
                        <li class="out-link"><a class="" href="coupon.html">About us</a></li>
                    </ul>

                    <!--Mobile Menu end-->
                </div>
            </div>

            <!--Mobile menu end-->
            <div class="col-xl-3 d-none d-xl-block">
                    <div class="department">
                        <img src="{{ asset('frontend/img/menu-bar.png') }}" alt="menu-bar">
                        All Departments
                        <div class="shape-img">
                            <img src="{{ asset('frontend/img/department-shape-img.png') }}" class="img-fluid" alt="department img">
                        </div>
                        <div id="department-list" class="department-list">
                            <ul class="list-group">
                                @foreach($categories as $category)
                                <li class="list-group-item">
                                    <a href="#!" data-id="{{ $category->id }}">
                                        <div class="department-list-logo">
                                            <img src="{{ asset('frontend/img/department-img/department-img-1.png')}}" alt="category icon">
                                        </div>
                                        <span class="sub-list-main-menu">{{ $category->name }}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            <div class="col-md-6 col-lg-10 col-xl-7 header-search-box d-none d-lg-block">
                    <div id="main-menu-2" class="main-menu-desktop no-border main-menu-sh">
                        <div class="menu-container wd-megamenu text-left">
                            <div class="menu">
                                <ul class="wd-megamenu-ul">
                                    <li>
                                        <a href="{{ route('home') }}" class="main-menu-list">
                                            <i class="fa fa-home" aria-hidden="true">
                                            </i>Home
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('category.index') }}" class="main-menu-list">
                                            Category
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('sub-category.index') }}" class="main-menu-list">Sub-category
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('brand.index') }}" class="main-menu-list">Brand
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('blog.index') }}" class="main-menu-list">
                                            Blog
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('contact-us.index') }}" class="main-menu-list">
                                            Contact us
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="main-menu-list">
                                            About us
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="serch-wrapper" style="margin-top: -25px; margin-left:380px;">
                    <div class="search">
                        <input class="search-input search-tag" placeholder="Search" type="text">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                        <ul id="search-result" class="search-result" tabindex="0" ></ul>
                    </div>
                </div>
        </div>
    </div>
</section>
