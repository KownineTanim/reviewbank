<section id="main-menu" class="sticker-nav">
    <div class="container">
        <div class="row">
            <div class="col-2 col-md-6 col-lg-12" style="max-width:83%;">
                <div class="menu-container wd-megamenu">
                    <div class="menu">
                        <ul class="wd-megamenu-ul">
                            <li>
                                <a href="{{ route('home') }}" class="main-menu-list">
                                    <i class="fa fa-home" aria-hidden="true">
                                    </i> Home
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('category.index') }}" class="main-menu-list">Category
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
            <div class="col-6 col-md-4 col-lg-5 text-right ext-right p0  d-none ">
                <div class="account-and-search">
                    <div class="account-section">
                        <button class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">
                            <i class="fa fa-sign-in" aria-hidden="true"></i>
                        </button>

                        <div class="modal wd-ph-modal fade bd-example-modal-lg" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="container">
                                        <div class="row text-left">
                                            <div class="col-md-12 p0">

                                                <div class="modal-tab-section wd-modal-tabs">
                                                    <ul class="nav nav-tabs wd-modal-tab-menu text-center" id="myTab-account" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="login-tab-2" data-toggle="tab" href="#login-2" role="tab" aria-controls="login-2" aria-expanded="true">Login</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="sign-up-tab-2" data-toggle="tab" href="#sign-up-2" role="tab" aria-controls="sign-up-2">Sign up</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content" id="myTabContent-account">
                                                        <div class="tab-pane fade show active" id="login-2" role="tabpanel" aria-labelledby="login-tab-2">

                                                            <div class="row">
                                                                <div class="col-md-6 p0 brand-description-area">
                                                                    <img src="{{ img($settings->login_image ?? '') }}" class="img-fluid" alt="">
                                                                    <div class="brand-description">
                                                                        <div class="brand-logo">
                                                                            <img src="{{ img($settings->logo  ?? '') }}" alt="Logo">
                                                                        </div>
                                                                        <div class="modal-description">
                                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod teoccaecvoluptatem.</p>
                                                                        </div>
                                                                        <ul class="list-unstyled">
                                                                            <li class="media">
                                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                                                <div class="media-body">
                                                                                    Lorem ipsum dolor sit amet, consecadipisicing
                                                                                    elit, sed do eiusmod teoccaecvoluptatem.
                                                                                </div>
                                                                            </li>
                                                                            <li class="media my-4">
                                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                                                <div class="media-body">
                                                                                    Lorem ipsum dolor sit amet, consecadipisicing
                                                                                    elit, sed do eiusmod teoccaecvoluptatem.
                                                                                </div>
                                                                            </li>
                                                                            <li class="media">
                                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                                                <div class="media-body">
                                                                                    Lorem ipsum dolor sit amet, consecadipisicing
                                                                                    elit, sed do eiusmod teoccaecvoluptatem.
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-12 col-lg-6 p0">
                                                                    <div class="login-section text-center">
                                                                        <div class="social-media ph-social-media">
                                                                            <a href="#" class="facebook-bg"><i class="fa fa-facebook" aria-hidden="true"></i> Login</a>
                                                                            <a href="#" class="twitter-bg"><i class="fa fa-twitter" aria-hidden="true"></i> Login</a>
                                                                            <a href="#" class="google-bg"><i class="fa fa-google-plus" aria-hidden="true"></i> Login</a>
                                                                        </div>
                                                                        <div class="login-form text-left">
                                                                            <form>
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputEmail1">User name</label>
                                                                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="John mist |">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputPassword1">Password</label>
                                                                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="*** *** ***">
                                                                                </div>
                                                                                <button type="submit" class="btn btn-primary wd-login-btn">LOGIN</button>

                                                                                <div class="form-check">
                                                                                    <label class="form-check-label">
                                                                                        <input type="checkbox" class="form-check-input">
                                                                                        Save this password
                                                                                    </label>
                                                                                </div>

                                                                                <div class="wd-policy">
                                                                                    <p>
                                                                                        By Continuing. I conferm that i have read and userstand the <a href="#">terms of uses</a> and <a href="#">Privacy Policy</a>.
                                                                                        Don’t have an account? <a href="#" class="black-color"><strong><u>Sign up</u></strong></a>
                                                                                    </p>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="tab-pane fade" id="sign-up-2" role="tabpanel" aria-labelledby="sign-up-tab-2">

                                                            <div class="row">
                                                                <div class="col-md-12 p0 brand-login-section">
                                                                    <img src="{{ img($settings->signup_image ?? '') }}" class="img-fluid" alt="">
                                                                    <div class="brand-description">
                                                                        <div class="brand-logo">
                                                                            <img src="{{ img($settings->logo  ?? '') }}" alt="Logo">
                                                                        </div>
                                                                        <div class="modal-description">
                                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod teoccaecvoluptatem.</p>
                                                                        </div>
                                                                        <ul class="list-unstyled">
                                                                            <li class="media">
                                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                                                <div class="media-body">
                                                                                    Lorem ipsum dolor sit amet, consecadipisicing
                                                                                    elit, sed do eiusmod teoccaecvoluptatem.
                                                                                </div>
                                                                            </li>
                                                                            <li class="media my-4">
                                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                                                <div class="media-body">
                                                                                    Lorem ipsum dolor sit amet, consecadipisicing
                                                                                    elit, sed do eiusmod teoccaecvoluptatem.
                                                                                </div>
                                                                            </li>
                                                                            <li class="media">
                                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                                                <div class="media-body">
                                                                                    Lorem ipsum dolor sit amet, consecadipisicing
                                                                                    elit, sed do eiusmod teoccaecvoluptatem.
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-12 col-lg-6 p0">
                                                                    <div class="sign-up-section text-center">
                                                                        <div class="login-form text-left">
                                                                            <form>
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputname-login-in">First name</label>
                                                                                    <input type="text" class="form-control" id="exampleInputname-login-in" placeholder="First Name">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputname-login-in-2">Last name</label>
                                                                                    <input type="text" class="form-control" id="exampleInputname-login-in-2" placeholder="Last Name">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputEmail-login-in">Email</label>
                                                                                    <input type="text" class="form-control" id="exampleInputEmail-login-in" placeholder="Enter you email ...">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputPassword-login-in">Password</label>
                                                                                    <input type="password" class="form-control" id="exampleInputPassword-login-in" placeholder="*** *** ***">
                                                                                </div>
                                                                                <button type="submit" class="btn btn-primary wd-login-btn">Sign Up</button>

                                                                                <div class="wd-policy">
                                                                                    <p>
                                                                                        By Continuing. I conferm that i have read and userstand the <a href="#">terms of uses</a> and <a href="#">Privacy Policy</a>.
                                                                                        Don’t have an account? <a href="#" class="black-color"><strong><u>Sign up</u></strong></a>
                                                                                    </p>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
