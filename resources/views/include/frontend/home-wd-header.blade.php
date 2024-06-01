<style>
    #search-wrapper {
        height:346px;
        background-color:white;
        overflow:auto;
        box-shadow: 1px 1px 1px 1px;
        padding: 10px;
        z-index:10000000;
        position: absolute;
        max-width: 96%;
    }
</style>
<section id="wd-header">
    <div class="container-fluid custom-width">
        <div class="row">
            <div class="col-md-12 col-lg-3 col-xl-3 text-center second-home-main-logo">
                <a href="{{ route('home') }}"><img src="{{ img($settings->logo  ?? '') }}" alt="Logo"></a>
            </div>
            <div class="col-md-6 col-lg-6 slider-search-section d-none d-lg-block mb-1" style="position:relative;">
                    <div class="input-group">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-secondary wd-slider-search-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span id="category-name">All Categories</span> <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu wd-dropdown-menu">
                                <div class="search-category">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6 class="search-category-title">Categories</h6>
                                             <ul>
                                                 @foreach($categories as $category)
                                                   <li><a class="category-list" data-id="{{ $category->id }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> {{ $category->name }}</a></li>
                                                 @endforeach
                                             </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="text" class="form-control input-search-box search-tag" id="search-tag" placeholder="Enter your search key ...">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary wd-search-btn" type="button" onclick="{$('.search-tag').keyup()}"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </span>
                    </div>
                    <div class="col-md-4 col-lg-4 d-none search-wrapper" id="search-wrapper">
                        <ul id="search-result" class="" tabindex="0" ></ul>
                    </div>
                </div>
            <div class="col-md-6 col-lg-3  col-xl-3 text-right">
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
                    <button class="btn btn-primary my-account d-none d-lg-block" data-toggle="modal" data-target=".bd-example-modal-lg2">
                        <i class="fa fa-user" aria-hidden="true"></i> My account
                    </button>
                    @include('auth.frontend.authentication')
                @endguest
            </div>
        </div>
    </div>
</section>
