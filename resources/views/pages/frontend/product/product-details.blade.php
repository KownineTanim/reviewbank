@extends('layout.frontend')
@section('title','Product details')
@section('content')
<!-- =========================
    Header Top Section
============================== -->


<!-- =========================
    Header Section
============================== -->
@include('include.frontend.wd-header')

<!-- =========================
    Main Menu Section
============================== -->
@include('include.frontend.menu')

<!-- =========================
    Product Details Section
============================== -->
<section class="product-details">
    <div class="container">
        <div class="row">
            <div class="col-12 p0">
                <div class="page-location">
                    <ul>
                        <li><a href="{{ route('home') }}">
                            Home / Shop <span class="divider">/</span>
                        </a></li>
                        <li><a class="page-location-active" href="{{ route('product.view', $product->token) }}">
                            {{ $product->name }}
                            <span class="divider">/</span>
                        </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 product-details-section">
                <!-- ====================================
                    Product Details Gallery Section
                ========================================= -->
                <div class="row">
                    <div class="product-gallery col-12 col-md-12 col-lg-6">
                        <!-- ====================================
                            Single Product Gallery Section
                        ========================================= -->
                        <div class="row">
                            <div class="col-md-12 product-slier-details">
                                <ul id="lightSlider">
                                    <li data-thumb="{{ img($product->thumbnail) }}">
                                        <img class="figure-img img-fluid" src="{{ img($product->thumbnail) }}" alt="product-img" />
                                    </li>
                                    @foreach($product->images as $image)
                                    <li data-thumb="{{ img($image->path) }}">
                                        <img class="figure-img img-fluid" src="{{ img($image->path) }}" alt="product-img" />
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-12 col-md-12 col-lg-6">
                        <div class="product-details-gallery">
                            <div class="list-group">
                                <h4 class="list-group-item-heading product-title">
                                    {{ $product->name }}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            <div class="wd-tab-section">
                <div class="bd-example bd-example-tabs">
                  <ul class="nav nav-pills mb-3 wd-tab-menu" id="pills-tab" role="tablist">
                    <li class="nav-item col-6 col-md">
                        <a class="nav-link active" id="reviews-tab" data-toggle="pill" href="#reviews" role="tab" aria-controls="reviews" aria-expanded="false">Reviews</a>
                    </li>
                    <li class="nav-item col-6 col-md">
                      <a class="nav-link" id="description-tab" data-toggle="pill" href="#description-section" role="tab" aria-controls="description-section" aria-expanded="true">Description</a>
                    </li>
                  </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade active show" id="reviews">
                            <div class="row">
                                <div class="col-12">
                                    <p class="wd-opacity">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores id assumenda, ex ab voluptatem doloremque soluta magnam eum nihil iusto maiores! Libero nisi maior</p>

                                    <h6 class="review-rating-title">Average Ratings and Reviews</h6>
                                    <div class="row tab-rating-bar-section">
                                        <div class="col-8 col-md-4 col-lg-4">
                                            <img src="{{ asset('frontend/img/review-bg.png') }}" alt="review-bg">
                                            <div class="review-rating text-center">
                                                <h1 class="rating">{{ $product->avg_rating }}</h1>
                                                <p> Ratings &amp;
                                                {{count($product->reviews)}} Reviews</p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-3 rating-bar-section">
                                            <div class="media rating-star-area">
                                                <p>Price rating</p>
                                                <div class="media-body rating-bar">
                                                    <div class="progress wd-progress">
                                                        <div class="progress-bar wd-bg-red" role="progressbar" style="width: {{ $product->avg_price_rating*100/5 }}%" aria-valuenow="{{ $product->avg_quality_rating*100/5 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media rating-star-area">
                                                <p>Quality rating</p>
                                                <div class="media-body rating-bar">
                                                    <div class="progress wd-progress">
                                                        <div class="progress-bar wd-bg-green" role="progressbar" style="width: {{ $product->avg_quality_rating*100/5 }}%" aria-valuenow="{{ $product->avg_quality_rating*100/5 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media rating-star-area">
                                                <p>Design rating</p>
                                                <div class="media-body rating-bar">
                                                    <div class="progress wd-progress">
                                                        <div class="progress-bar wd-bg-yellow" role="progressbar" style="width: {{ $product->avg_design_rating*100/5 }}%" aria-valuenow="{{ $product->avg_design_rating*100/5 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media rating-star-area">
                                                <p>Durability rating</p>
                                                <div class="media-body rating-bar">
                                                    <div class="progress wd-progress">
                                                        <div class="progress-bar wd-bg-blue" role="progressbar" style="width: {{ $product->avg_durability_rating*100/5 }}%" aria-valuenow="{{ $product->avg_durability_rating*100/5 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media rating-star-area">
                                                <p>Service rating</p>
                                                <div class="media-body rating-bar">
                                                    <div class="progress wd-progress">
                                                        <div class="progress-bar wd-bg-sky" role="progressbar" style="width: {{ $product->avg_service_rating*100/5 }}%" aria-valuenow="{{ $product->avg_service_rating*100/5 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="reviews-market">
                                        <!--
                                            =================================
                                            Review Our Product
                                            =================================
                                        -->
                                        <div class="review-our-product text-left row">
                                            <div class="col-12 col-lg-6 reviews-title">
                                                <h3>Review to our Blurb</h3>
                                            </div>

                                            <div class="col-12 col-lg-6 text-right display-none-md">
                                                <div class="filter">
                                                    <div class="btn-group" role="group">
                                                        <div class="d-flex">
                                                            <p>View as:</p>
                                                            <button id="btnGroupDropwdreview" type="button" class="btn btn-secondary dropdown-toggle filter-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                              New
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="btnGroupDropwdreview" style="position: absolute; transform: translate3d(50px, 29px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                              <a class="dropdown-item" href="#">Camara</a>
                                                              <a class="dropdown-item" href="#">Joystick</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" onclick="addReviewModal()" class="btn btn-primary btn-sm add-review-btn">Add your review</button>
                                                </div>
                                            </div>

                                            <!-- =================================
                                                Review Client Section
                                                ================================= -->
                                            @foreach($product->reviews as $review)
                                            <div class="col-12 review-our-product-area">
                                                <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="media">
                                                                  <div class="media-left media-middle">
                                                                    <a href="#">
                                                                      <img class="media-object rounded-circle p-2" width="50" src="{{ profilePhoto($review->postedBy) }}" alt="client-img">
                                                                    </a>
                                                                  </div>
                                                                  <div class="media-body">
                                                                    <h4 class="media-heading client-title">{{ $review->postedBy->name }}</h4>
                                                                  </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 review-date-time">
                                                        <p class="review-date">{{ $review->created_at->format('d/m/Y') }}</p>
                                                        <p class="review-time">at {{ $review->created_at->format('g:i A') }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12"></div>
                                                    <div class="col-6 col-md-4">
                                                        <div class="rating-market-section">
                                                            <span class="badge badge-secondary wd-star-market-badge text-uppercase">{{ round(($review->price_rating + $review->quality_rating + $review->design_rating + $review->durability_rating + $review->service_rating)/5) }} <i class="fa fa-star-o" aria-hidden="true"></i></span>
                                                            <div class="rating-star">
                                                                <span>Price</span> :
                                                                {!! str_repeat('<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>',round($review->price_rating)) !!}
                                                                {!! str_repeat('<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>',5-round($review->price_rating)) !!}
                                                            </div>
                                                            <div class="rating-star">
                                                                <span>Quality</span> :
                                                                {!! str_repeat('<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>',round($review->quality_rating)) !!}
                                                                {!! str_repeat('<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>',5-round($review->quality_rating)) !!}
                                                            </div>
                                                            <div class="rating-star">
                                                                <span>Design</span> :
                                                                {!! str_repeat('<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>',round($review->design_rating)) !!}
                                                                {!! str_repeat('<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>',5-round($review->design_rating)) !!}
                                                            </div>
                                                            <div class="rating-star">
                                                                <span>Durability</span> :
                                                                {!! str_repeat('<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>',round($review->durability_rating)) !!}
                                                                {!! str_repeat('<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>',5-round($review->durability_rating)) !!}
                                                            </div>
                                                            <div class="rating-star">
                                                                <span>Service</span> :
                                                                {!! str_repeat('<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>',round($review->service_rating)) !!}
                                                                {!! str_repeat('<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>',5-round($review->service_rating)) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-md-8">
                                                        {!! $review->description !!}
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>

                                        <!--
                                            =================================
                                            Review Comment Section
                                            =================================
                                        -->
                                        <div class="review-comment-section">
                                            <div class="row">
                                                <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="reviews-title leave-opinion">
                                                        <h3>Leave your Review here</h3>
                                                    </div>
                                                    <form id="review-form" action="javascript:void(0)">
                                                        @guest
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="form-group col-md-4">
                                                                        <label for="reviewer-name">Name:</label>
                                                                        <input type="text" class="form-control" name="reviewer_name" id="reviewer-name" placeholder="Put your name here">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="reviewer-email">Email:</label>
                                                                        <input type="email" class="form-control" name="reviewer_email" id="reviewer-email" placeholder="name@example.com">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="reviewer-phone">Phone:</label>
                                                                        <input type="text" class="form-control" name="reviewer_phone" id="reviewer-phone" placeholder="Put your phone no here">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endguest

                                                        <!-- Card body for user entry -->

                                                        <div class="form-group p-3">
                                                            <input type="hidden" id="product" value="{{ $product->id }}">
                                                        </div>
                                                        <!--=================================
                                                        Review Comment Section
                                                        =================================-->
                                                        <div class="review-comment-section">
                                                            <div class="row">
                                                                <div class="col-12 col-md-4 col-lg-4 col-xl-4 product-rating-area">
                                                                    <div class="product-rating-list product-rating-desktop">
                                                                        <div class="rating-area">
                                                                            <div class="d-flex justify-content-between">
                                                                                <p>Design</p>
                                                                                <div class="rating">
                                                                                    <a href="#"><i class="fa fa-star cat-1" aria-hidden="true"></i></a>
                                                                                    <a href="#"><i class="fa fa-star cat-2" aria-hidden="true"></i></a>
                                                                                    <a href="#"><i class="fa fa-star cat-3" aria-hidden="true"></i></a>
                                                                                    <a href="#"><i class="fa fa-star cat-4" aria-hidden="true"></i></a>
                                                                                    <a href="#"><i class="fa fa-star cat-5" aria-hidden="true"></i></a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="rating-slider-1 Design"></div>
                                                                        </div>
                                                                        <div class="rating-area">
                                                                            <div class="d-flex justify-content-between">
                                                                                <p>Quality</p>
                                                                                <div class="rating">
                                                                                    <a href="#"><i class="fa fa-star cat-2-1" aria-hidden="true"></i></a>
                                                                                    <a href="#"><i class="fa fa-star cat-2-2" aria-hidden="true"></i></a>
                                                                                    <a href="#"><i class="fa fa-star cat-2-3" aria-hidden="true"></i></a>
                                                                                    <a href="#"><i class="fa fa-star cat-2-4" aria-hidden="true"></i></a>
                                                                                    <a href="#"><i class="fa fa-star cat-2-5" aria-hidden="true"></i></a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="rating-slider-2 Quality"></div>
                                                                        </div>
                                                                        <div class="rating-area">
                                                                            <div class="d-flex justify-content-between">
                                                                                <p>Durability</p>
                                                                                <div class="rating">
                                                                                    <a href="#"><i class="fa fa-star cat-3-1" aria-hidden="true"></i></a>
                                                                                    <a href="#"><i class="fa fa-star cat-3-2" aria-hidden="true"></i></a>
                                                                                    <a href="#"><i class="fa fa-star cat-3-3" aria-hidden="true"></i></a>
                                                                                    <a href="#"><i class="fa fa-star cat-3-4" aria-hidden="true"></i></a>
                                                                                    <a href="#"><i class="fa fa-star cat-3-5" aria-hidden="true"></i></a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="rating-slider-3 Durability"></div>
                                                                        </div>
                                                                        <div class="rating-area">
                                                                            <div class="d-flex justify-content-between">
                                                                                <p>Price</p>
                                                                                <div class="rating">
                                                                                    <a href="#"><i class="fa fa-star cat-4-1" aria-hidden="true"></i></a>
                                                                                    <a href="#"><i class="fa fa-star cat-4-2" aria-hidden="true"></i></a>
                                                                                    <a href="#"><i class="fa fa-star cat-4-3" aria-hidden="true"></i></a>
                                                                                    <a href="#"><i class="fa fa-star cat-4-4" aria-hidden="true"></i></a>
                                                                                    <a href="#"><i class="fa fa-star cat-4-5" aria-hidden="true"></i></a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="rating-slider-4 Price"></div>
                                                                        </div>
                                                                        <div class="rating-area">
                                                                            <div class="d-flex justify-content-between">
                                                                                <p>Service</p>
                                                                                <div class="rating">
                                                                                    <a href="#"><i class="fa fa-star cat-5-1" aria-hidden="true"></i></a>
                                                                                    <a href="#"><i class="fa fa-star cat-5-2" aria-hidden="true"></i></a>
                                                                                    <a href="#"><i class="fa fa-star cat-5-3" aria-hidden="true"></i></a>
                                                                                    <a href="#"><i class="fa fa-star cat-5-4" aria-hidden="true"></i></a>
                                                                                    <a href="#"><i class="fa fa-star cat-5-5" aria-hidden="true"></i></a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="rating-slider-5 Service"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-6 col-lg-8 col-xl-8">
                                                                    <textarea class="review-description" name="review_description" id="review-description"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3 review-document-wrapper">
                                                            <div class="col-12">
                                                                <h5>
                                                                    Put Some Documents Of Your Purchased Product :
                                                                    <input type="radio" name="review-image" id="review-image-file" value="upload" onchange="review_image_document_input_type_toggle(event)">
                                                                    <label for="review-image-file" class="badge bg-secondary text-light">Upload</label>
                                                                    <input type="radio" name="review-image" id="review-image-url" value="url" onchange="review_image_document_input_type_toggle(event)" checked>
                                                                    <label for="review-image-url" class="badge bg-secondary text-light">Link</label>
                                                                </h5>
                                                            </div>
                                                            <div class="col-12" id="image-document-url-tab">
                                                                <div class="d-inline-block w-100" id="image-document-url-wrapper">
                                                                    <div class="d-flex">
                                                                        <input class='form-control m-1' name="image_document_url[]" type="url" placeholder="Paste the image link">
                                                                        <button type="button" class="btn btn-sm btn-danger m-1" onclick="$(event.target).parent().remove()">&times;</button>
                                                                    </div>
                                                                </div>
                                                                <div class="d-inline-block w-50">
                                                                    <button type="button" onclick="image_document_url_add(event)" class="btn btn-sm btn-info w-50">+</button>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 d-none" id="image-document-upload-tab">
                                                                <div class="d-inline-block w-100" id="image-document-upload-wrapper">
                                                                    <div class="d-flex">
                                                                        <input class='form-control m-1' name="image_document_upload[]" type="file" placeholder="Paste the image link">
                                                                        <button type="button" class="btn btn-sm btn-danger m-1" onclick="$(event.target).parent().remove()">&times;</button>
                                                                    </div>
                                                                </div>
                                                                <div class="d-inline-block w-50">
                                                                    <button type="button" onclick="image_document_upload_add(event)" class="btn btn-sm btn-info w-50">+</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="button" onclick="submitReview()" class="btn btn-primary mt-3">Submit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fadedescription-section" id="description-section" role="tabpanel" aria-labelledby="description-tab" aria-expanded="true">
                            <div class="product-tab-content">
                                <h4 class="description-title">{{ $product->name }} Details</h4>
                                <p>{!! $product->description !!}</p>

                                <hr>

                                <div class="row tab-gallery">
                                    @foreach($product->images as $image)
                                        <div class="col-6 col-md-3">
                                            <img class="figure-img img-fluid" src="{{ img($image->path) }}" alt="features">
                                        </div>
                                    @endforeach
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

<!-- =========================
    Add Modal
============================== -->
<div class="modal fade add-review-modal-xl" id="review-modal" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-lg modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="review-form-modal" action="javascript:void(0)">
                    @guest
                        <div class="container">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="reviewer-name-modal">Name:</label>
                                    <input type="text" class="form-control" name="reviewer_name" id="reviewer-name-modal" placeholder="Put your name here">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="reviewer-email-modal">Email:</label>
                                    <input type="email" class="form-control" name="reviewer_email" id="reviewer-email-modal" placeholder="name@example.com">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="reviewer-phone-modal">Phone:</label>
                                    <input type="text" class="form-control" name="reviewer_phone" id="reviewer-phone-modal" placeholder="Put your phone no here">
                                </div>
                            </div>
                        </div>
                    @endguest
                    <!--=================================
                    Review Comment Section
                    =================================-->
                    <div class="review-comment-section">
                        <div class="row">
                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 product-rating-area">
                                <div class="product-rating-list product-rating-desktop">
                                    <div class="rating-area">
                                        <div class="d-flex justify-content-between">
                                            <p>Design</p>
                                            <div class="rating">
                                                <a href="#"><i class="fa fa-star cat-1-modal" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-star cat-2-modal" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-star cat-3-modal" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-star cat-4-modal" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-star cat-5-modal" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                        <div class="rating-slider-1-modal Design mt-3"></div>
                                    </div>
                                    <div class="rating-area">
                                        <div class="d-flex justify-content-between">
                                            <p>Quality</p>
                                            <div class="rating">
                                                <a href="#"><i class="fa fa-star cat-2-1-modal" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-star cat-2-2-modal" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-star cat-2-3-modal" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-star cat-2-4-modal" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-star cat-2-5-modal" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                        <div class="rating-slider-2-modal Quality mt-3"></div>
                                    </div>
                                    <div class="rating-area">
                                        <div class="d-flex justify-content-between">
                                            <p>Durability</p>
                                            <div class="rating">
                                                <a href="#"><i class="fa fa-star cat-3-1-modal" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-star cat-3-2-modal" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-star cat-3-3-modal" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-star cat-3-4-modal" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-star cat-3-5-modal" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                        <div class="rating-slider-3-modal Durability mt-3"></div>
                                    </div>
                                    <div class="rating-area">
                                        <div class="d-flex justify-content-between">
                                            <p>Price</p>
                                            <div class="rating">
                                                <a href="#"><i class="fa fa-star cat-4-1-modal" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-star cat-4-2-modal" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-star cat-4-3-modal" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-star cat-4-4-modal" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-star cat-4-5-modal" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                        <div class="rating-slider-4-modal Price mt-3"></div>
                                    </div>
                                    <div class="rating-area">
                                        <div class="d-flex justify-content-between">
                                            <p>Service</p>
                                            <div class="rating">
                                                <a href="#"><i class="fa fa-star cat-5-1-modal" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-star cat-5-2-modal" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-star cat-5-3-modal" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-star cat-5-4-modal" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-star cat-5-5-modal" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                        <div class="rating-slider-5-modal Service mt-3"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-8 col-xl-8">
                                <textarea class="review_description" name="review_description" id="review-description-modal"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 review-document-wrapper">
                        <div class="col-12">
                            <h5>
                                Put Some Documents Of Your Purchased Product :
                                <input type="radio" name="review-image" id="review-image-file" value="upload" onchange="review_image_document_input_type_toggle_modal(event)">
                                <label for="review-image-file" class="badge bg-secondary text-light">Upload</label>
                                <input type="radio" name="review-image" id="review-image-url" value="url" onchange="review_image_document_input_type_toggle_modal(event)" checked>
                                <label for="review-image-url" class="badge bg-secondary text-light">Link</label>
                            </h5>
                        </div>
                        <div class="col-12" id="image-document-url-tab-modal">
                            <div class="d-inline-block w-100" id="image-document-url-wrapper_modal">
                                <div class="d-flex">
                                    <input class='form-control m-1' name="image_document_url_modal[]" type="url" placeholder="Paste the image link">
                                    <button type="button" class="btn btn-sm btn-danger m-1" onclick="$(event.target).parent().remove()">&times;</button>
                                </div>
                            </div>
                            <div class="d-inline-block w-50">
                                <button type="button" onclick="image_document_url_add_modal(event)" class="btn btn-sm btn-info w-50">+</button>
                            </div>
                        </div>
                        <div class="col-12 d-none" id="image-document-upload-tab-modal">
                            <div class="d-inline-block w-100" id="image-document-upload-wrapper_modal">
                                <div class="d-flex">
                                    <input class='form-control m-1' name="image_document_upload_modal[]" type="file" placeholder="Paste the image link">
                                    <button type="button" class="btn btn-sm btn-danger m-1" onclick="$(event.target).parent().remove()">&times;</button>
                                </div>
                            </div>
                            <div class="d-inline-block w-50">
                                <button type="button" onclick="image_document_upload_add_modal(event)" class="btn btn-sm btn-info w-50">+</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="submitModalReview()" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>
<!-- =========================
    Call To Action Section
============================== -->


<!-- =========================
    Details Section
============================== -->
@include('include.frontend.details')

<!-- =========================
    Subscribe Section
============================== -->
@include('include.frontend.subscribe')

<!-- =========================
    Footer Section
============================== -->
@include('include.frontend.footer')

<!-- =========================
    CopyRight
============================== -->
@include('include.frontend.copyright')
@endsection
@section('script')
<script type="text/javascript">

    /*********
    *  Rating slider js
    ******/

    $(document).ready(function() {
        $('.select22').select2().change(function() {
            setTimeout(() => {
                let category_id = $('#category').val();
                let subcategory_id = $('#sub_category').val();
                let brand_id = $('#brand').val();
                let product_id = $('#product').val();
            }, 3000);
        });

        $('#review-description').summernote({
            placeholder: 'Review description goes here',
            tabsize: 2,
            height: 220,
            callbacks: {
                onChange: function() {
                    let review_description = $('#review-description').val();
                }
            }
        });
        $('.rating-slider-1').slider({
            value: 0,
            min: 0,
            max: 5,
            step: 1,
            slide: function (event, ui) {
                $('#slider-value').html(ui.value);
                if (ui.value == 1) {
                    $('.cat-1').addClass('active-color');
                } else {
                    $('.cat-1').removeClass('active-color');
                }
                if (ui.value == 2) {
                    $('.cat-1').addClass('active-color');
                    $('.cat-2').addClass('active-color');
                } else {
                    $('.cat-2').removeClass('active-color');
                }
                if (ui.value == 3) {
                    $('.cat-1').addClass('active-color');
                    $('.cat-2').addClass('active-color');
                    $('cat-3').addClass('active-color');
                } else {
                    $('.cat-3').removeClass('active-color');
                }
                if (ui.value == 4) {
                    $('.cat-1').addClass('active-color');
                    $('.cat-2').addClass('active-color');
                    $('.cat-3').addClass('active-color');
                    $('.cat-4').addClass('active-color');
                } else {
                    $('.cat-4').removeClass('active-color');
                }
                if (ui.value == 5) {
                    $('.cat-1').addClass('active-color');
                    $('.cat-2').addClass('active-color');
                    $('.cat-3').addClass('active-color');
                    $('.cat-4').addClass('active-color');
                    $('.cat-5').addClass('active-color');
                } else {
                    $('.cat-5').removeClass('active-color');
                }
            }
        });
        $('.rating-slider-2').slider({
            value: 0,
            min: 0,
            max: 5,
            step: 1,
            slide: function (event, ui) {
                $('#slider-value').html(ui.value);
                if (ui.value == 1) {
                    $('.cat-2-1').addClass('active-color');
                } else {
                    $('.cat-2-1').removeClass('active-color');
                }
                if (ui.value == 2) {
                    $('.cat-2-1').addClass('active-color');
                    $('.cat-2-2').addClass('active-color');
                } else {
                    $('.cat-2-2').removeClass('active-color');
                }
                if (ui.value == 3) {
                    $('.cat-2-1').addClass('active-color');
                    $('.cat-2-2').addClass('active-color');
                    $('cat-2-3').addClass('active-color');
                } else {
                    $('.cat-2-3').removeClass('active-color');
                }
                if (ui.value == 4) {
                    $('.cat-2-1').addClass('active-color');
                    $('.cat-2-2').addClass('active-color');
                    $('.cat-2-3').addClass('active-color');
                    $('.cat-2-4').addClass('active-color');
                } else {
                    $('.cat-2-4').removeClass('active-color');
                }
                if (ui.value == 5) {
                    $('.cat-2-1').addClass('active-color');
                    $('.cat-2-2').addClass('active-color');
                    $('.cat-2-3').addClass('active-color');
                    $('.cat-2-4').addClass('active-color');
                    $('.cat-2-5').addClass('active-color');
                } else {
                    $('.cat-2-5').removeClass('active-color');
                }
            }
        });
        $('.rating-slider-3').slider({
            value: 0,
            min: 0,
            max: 5,
            step: 1,
            slide: function (event, ui) {
                $('#slider-value').html(ui.value);
                if (ui.value == 1) {
                    $('.cat-3-1').addClass('active-color');
                } else {
                    $('.cat-3-1').removeClass('active-color');
                }
                if (ui.value == 2) {
                    $('.cat-3-1').addClass('active-color');
                    $('.cat-3-2').addClass('active-color');
                } else {
                    $('.cat-3-2').removeClass('active-color');
                }
                if (ui.value == 3) {
                    $('.cat-3-1').addClass('active-color');
                    $('.cat-3-2').addClass('active-color');
                    $('cat-3-3').addClass('active-color');
                } else {
                    $('.cat-3-3').removeClass('active-color');
                }
                if (ui.value == 4) {
                    $('.cat-3-1').addClass('active-color');
                    $('.cat-3-2').addClass('active-color');
                    $('.cat-3-3').addClass('active-color');
                    $('.cat-3-4').addClass('active-color');
                } else {
                    $('.cat-3-4').removeClass('active-color');
                }
                if (ui.value == 5) {
                    $('.cat-3-1').addClass('active-color');
                    $('.cat-3-2').addClass('active-color');
                    $('.cat-3-3').addClass('active-color');
                    $('.cat-3-4').addClass('active-color');
                    $('.cat-3-5').addClass('active-color');
                } else {
                    $('.cat-3-5').removeClass('active-color');
                }
            }
        });
        $('.rating-slider-4').slider({
            value: 0,
            min: 0,
            max: 5,
            step: 1,
            slide: function (event, ui) {
                $('#slider-value').html(ui.value);
                if (ui.value == 1) {
                    $('.cat-4-1').addClass('active-color');
                } else {
                    $('.cat-4-1').removeClass('active-color');
                }
                if (ui.value == 2) {
                    $('.cat-4-1').addClass('active-color');
                    $('.cat-4-2').addClass('active-color');
                } else {
                    $('.cat-4-2').removeClass('active-color');
                }
                if (ui.value == 3) {
                    $('.cat-4-1').addClass('active-color');
                    $('.cat-4-2').addClass('active-color');
                    $('cat-4-3').addClass('active-color');
                } else {
                    $('.cat-4-3').removeClass('active-color');
                }
                if (ui.value == 4) {
                    $('.cat-4-1').addClass('active-color');
                    $('.cat-4-2').addClass('active-color');
                    $('.cat-4-3').addClass('active-color');
                    $('.cat-4-4').addClass('active-color');
                } else {
                    $('.cat-4-4').removeClass('active-color');
                }
                if (ui.value == 5) {
                    $('.cat-4-1').addClass('active-color');
                    $('.cat-4-2').addClass('active-color');
                    $('.cat-4-3').addClass('active-color');
                    $('.cat-4-4').addClass('active-color');
                    $('.cat-4-5').addClass('active-color');
                } else {
                    $('.cat-4-5').removeClass('active-color');
                }
            }
        });
        $('.rating-slider-5').slider({
            value: 0,
            min: 0,
            max: 5,
            step: 1,
            slide: function (event, ui) {
                $('#slider-value').html(ui.value);
                if (ui.value == 1) {
                    $('.cat-5-1').addClass('active-color');
                } else {
                    $('.cat-5-1').removeClass('active-color');
                }
                if (ui.value == 2) {
                    $('.cat-5-1').addClass('active-color');
                    $('.cat-5-2').addClass('active-color');
                } else {
                    $('.cat-5-2').removeClass('active-color');
                }
                if (ui.value == 3) {
                    $('.cat-5-1').addClass('active-color');
                    $('.cat-5-2').addClass('active-color');
                    $('cat-5-3').addClass('active-color');
                } else {
                    $('.cat-5-3').removeClass('active-color');
                }
                if (ui.value == 4) {
                    $('.cat-5-1').addClass('active-color');
                    $('.cat-5-2').addClass('active-color');
                    $('.cat-5-3').addClass('active-color');
                    $('.cat-5-4').addClass('active-color');
                } else {
                    $('.cat-5-4').removeClass('active-color');
                }
                if (ui.value == 5) {
                    $('.cat-5-1').addClass('active-color');
                    $('.cat-5-2').addClass('active-color');
                    $('.cat-5-3').addClass('active-color');
                    $('.cat-5-4').addClass('active-color');
                    $('.cat-5-5').addClass('active-color');
                } else {
                    $('.cat-5-5').removeClass('active-color');
                }
            }
        });
    });

    /*********
    *  Review Documents Handler
    ******/

    function review_image_document_input_type_toggle(event) {
        if (event.target.value == 'url') {
            $('#image-document-upload-tab').addClass('d-none');
            $('#image-document-url-tab').removeClass('d-none');
        } else {
            $('#image-document-url-tab').addClass('d-none');
            $('#image-document-upload-tab').removeClass('d-none');
        }
    }

    function image_document_url_add(event) {
        $('#image-document-url-wrapper').append(`
            <div class="d-flex">
                <input class='form-control m-1' name="image_document_url[]" type="url" placeholder="Paste the image link">
                <button type="button" class="btn btn-sm btn-danger m-1" onclick="$(event.target).parent().remove()">&times;</button>
            </div>
        `);
    }
    function image_document_upload_add(event) {
        $('#image-document-upload-wrapper').append(`
            <div class="d-flex">
                <input class='form-control m-1' name="image_document_upload[]" type="file" placeholder="Paste the image link">
                <button type="button" class="btn btn-sm btn-danger m-1" onclick="$(event.target).parent().remove()">&times;</button>
            </div>
        `);
    }

    function submitReview() {
        let rating_type = @json(get_rating_types());
        let formData = new FormData();
        let product_id = $('#product').val();
        let review_description = $('#review-description').val();
        [...document.querySelectorAll('#review-form .ui-slider-handle')].forEach((item, i) => {
           formData.append(`ratings[${rating_type[i]}]`, parseInt(item.style.left)/20);
        });
        [...document.querySelectorAll(`input[name='image_document_upload[]']`)].forEach((input, i) => {
            if (input.files.length) {
                formData.append(`uploaded_document[]`, input.files[0]);
            }
        });
        [...document.querySelectorAll(`input[name='image_document_url[]']`)].forEach((input, i) => {
            if (input.value) {
                formData.append(`uploaded_document_url[]`, input.value);
            }
        });

        formData.append('product_id', product_id);
        formData.append('review_description', review_description);
        formData.append('_token', "{{ csrf_token() }}");

        @guest
            let reviewer_name = $('#reviewer-name').val();
            let reviewer_email = $('#reviewer-email').val();
            let reviewer_phone = $('#reviewer-phone').val();
            formData.append('reviewer_name', reviewer_name);
            formData.append('reviewer_email', reviewer_email);
            formData.append('reviewer_phone', reviewer_phone);
        @endguest

       $.ajax({
            url: "{{ auth()->check() ? route('review.store') : route('guest-review.store') }}",
            type: "post",
            processData: false,
            contentType: false,
            data: formData,
            success: function (response) {
                if (response.status == 'success') {
                    toastr.success('Review added successfully');
                    setTimeout(() => {
                        window.location.href = window.location.href;
                    }, 2000);

                } else {
                    toastr.error(response.message);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                toastr.error('Something went wrong');
               // console.log(textStatus, errorThrown);
            }
        });
    }

    function addReviewModal() {
        $('#review-modal').modal('show');
    }

    $('#review-description-modal').summernote({
        placeholder: 'Review description goes here',
        tabsize: 2,
        height: 220,
        callbacks: {
            onChange: function() {
                let review_description = $('#review-description-modal').val();
            }
        }
    });

    $('.rating-slider-1-modal').slider({
        value: 0,
        min: 0,
        max: 5,
        step: 1,
        slide: function (event, ui) {
            $('#slider-value').html(ui.value);
            if (ui.value == 1) {
                $('.cat-1-modal').addClass('active-color');
            } else {
                $('.cat-1-modal').removeClass('active-color');
            }
            if (ui.value == 2) {
                $('.cat-1-modal').addClass('active-color');
                $('.cat-2-modal').addClass('active-color');
            } else {
                $('.cat-2-modal').removeClass('active-color');
            }
            if (ui.value == 3) {
                $('.cat-1-modal').addClass('active-color');
                $('.cat-2-modal').addClass('active-color');
                $('cat-3-modal').addClass('active-color');
            } else {
                $('.cat-3-modal').removeClass('active-color');
            }
            if (ui.value == 4) {
                $('.cat-1-modal').addClass('active-color');
                $('.cat-2-modal').addClass('active-color');
                $('.cat-3-modal').addClass('active-color');
                $('.cat-4-modal').addClass('active-color');
            } else {
                $('.cat-4-modal').removeClass('active-color');
            }
            if (ui.value == 5) {
                $('.cat-1-modal').addClass('active-color');
                $('.cat-2-modal').addClass('active-color');
                $('.cat-3-modal').addClass('active-color');
                $('.cat-4-modal').addClass('active-color');
                $('.cat-5-modal').addClass('active-color');
            } else {
                $('.cat-5-modal').removeClass('active-color');
            }
        }
    });

    $('.rating-slider-2-modal').slider({
        value: 0,
        min: 0,
        max: 5,
        step: 1,
        slide: function (event, ui) {
            $('#slider-value').html(ui.value);
            if (ui.value == 1) {
                $('.cat-2-1-modal').addClass('active-color');
            } else {
                $('.cat-2-1-modal').removeClass('active-color');
            }
            if (ui.value == 2) {
                $('.cat-2-1-modal').addClass('active-color');
                $('.cat-2-2-modal').addClass('active-color');
            } else {
                $('.cat-2-2-modal').removeClass('active-color');
            }
            if (ui.value == 3) {
                $('.cat-2-1-modal').addClass('active-color');
                $('.cat-2-2-modal').addClass('active-color');
                $('cat-2-3-modal').addClass('active-color');
            } else {
                $('.cat-2-3-modal').removeClass('active-color');
            }
            if (ui.value == 4) {
                $('.cat-2-1-modal').addClass('active-color');
                $('.cat-2-2-modal').addClass('active-color');
                $('.cat-2-3-modal').addClass('active-color');
                $('.cat-2-4-modal').addClass('active-color');
            } else {
                $('.cat-2-4-modal').removeClass('active-color');
            }
            if (ui.value == 5) {
                $('.cat-2-1-modal').addClass('active-color');
                $('.cat-2-2-modal').addClass('active-color');
                $('.cat-2-3-modal').addClass('active-color');
                $('.cat-2-4-modal').addClass('active-color');
                $('.cat-2-5-modal').addClass('active-color');
            } else {
                $('.cat-2-5-modal').removeClass('active-color');
            }
        }
    });

    $('.rating-slider-3-modal').slider({
        value: 0,
        min: 0,
        max: 5,
        step: 1,
        slide: function (event, ui) {
            $('#slider-value').html(ui.value);
            if (ui.value == 1) {
                $('.cat-3-1-modal').addClass('active-color');
            } else {
                $('.cat-3-1-modal').removeClass('active-color');
            }
            if (ui.value == 2) {
                $('.cat-3-1-modal').addClass('active-color');
                $('.cat-3-2-modal').addClass('active-color');
            } else {
                $('.cat-3-2-modal').removeClass('active-color');
            }
            if (ui.value == 3) {
                $('.cat-3-1-modal').addClass('active-color');
                $('.cat-3-2-modal').addClass('active-color');
                $('cat-3-3-modal').addClass('active-color');
            } else {
                $('.cat-3-3').removeClass('active-color');
            }
            if (ui.value == 4) {
                $('.cat-3-1-modal').addClass('active-color');
                $('.cat-3-2-modal').addClass('active-color');
                $('.cat-3-3-modal').addClass('active-color');
                $('.cat-3-4-modal').addClass('active-color');
            } else {
                $('.cat-3-4-modal').removeClass('active-color');
            }
            if (ui.value == 5) {
                $('.cat-3-1-modal').addClass('active-color');
                $('.cat-3-2-modal').addClass('active-color');
                $('.cat-3-3-modal').addClass('active-color');
                $('.cat-3-4-modal').addClass('active-color');
                $('.cat-3-5-modal').addClass('active-color');
            } else {
                $('.cat-3-5-modal').removeClass('active-color');
            }
        }
    });

    $('.rating-slider-4-modal').slider({
        value: 0,
        min: 0,
        max: 5,
        step: 1,
        slide: function (event, ui) {
            $('#slider-value').html(ui.value);
            if (ui.value == 1) {
                $('.cat-4-1-modal').addClass('active-color');
            } else {
                $('.cat-4-1-modal').removeClass('active-color');
            }
            if (ui.value == 2) {
                $('.cat-4-1-modal').addClass('active-color');
                $('.cat-4-2-modal').addClass('active-color');
            } else {
                $('.cat-4-2-modal').removeClass('active-color');
            }
            if (ui.value == 3) {
                $('.cat-4-1-modal').addClass('active-color');
                $('.cat-4-2-modal').addClass('active-color');
                $('cat-4-3-modal').addClass('active-color');
            } else {
                $('.cat-4-3-modal').removeClass('active-color');
            }
            if (ui.value == 4) {
                $('.cat-4-1-modal').addClass('active-color');
                $('.cat-4-2-modal').addClass('active-color');
                $('.cat-4-3-modal').addClass('active-color');
                $('.cat-4-4-modal').addClass('active-color');
            } else {
                $('.cat-4-4-modal').removeClass('active-color');
            }
            if (ui.value == 5) {
                $('.cat-4-1-modal').addClass('active-color');
                $('.cat-4-2-modal').addClass('active-color');
                $('.cat-4-3-modal').addClass('active-color');
                $('.cat-4-4-modal').addClass('active-color');
                $('.cat-4-5-modal').addClass('active-color');
            } else {
                $('.cat-4-5-modal').removeClass('active-color');
            }
        }
    });

    $('.rating-slider-5-modal').slider({
        value: 0,
        min: 0,
        max: 5,
        step: 1,
        slide: function (event, ui) {
            $('#slider-value').html(ui.value);
            if (ui.value == 1) {
                $('.cat-5-1-modal').addClass('active-color');
            } else {
                $('.cat-5-1-modal').removeClass('active-color');
            }
            if (ui.value == 2) {
                $('.cat-5-1-modal').addClass('active-color');
                $('.cat-5-2-modal').addClass('active-color');
            } else {
                $('.cat-5-2-modal').removeClass('active-color');
            }
            if (ui.value == 3) {
                $('.cat-5-1-modal').addClass('active-color');
                $('.cat-5-2-modal').addClass('active-color');
                $('cat-5-3-modal').addClass('active-color');
            } else {
                $('.cat-5-3-modal').removeClass('active-color');
            }
            if (ui.value == 4) {
                $('.cat-5-1-modal').addClass('active-color');
                $('.cat-5-2-modal').addClass('active-color');
                $('.cat-5-3-modal').addClass('active-color');
                $('.cat-5-4-modal').addClass('active-color');
            } else {
                $('.cat-5-4-modal').removeClass('active-color');
            }
            if (ui.value == 5) {
                $('.cat-5-1-modal').addClass('active-color');
                $('.cat-5-2-modal').addClass('active-color');
                $('.cat-5-3-modal').addClass('active-color');
                $('.cat-5-4-modal').addClass('active-color');
                $('.cat-5-5-modal').addClass('active-color');
            } else {
                $('.cat-5-5-modal').removeClass('active-color');
            }
        }
    });

    function review_image_document_input_type_toggle_modal(event) {
        if (event.target.value == 'url') {
            $('#image-document-upload-tab-modal').addClass('d-none');
            $('#image-document-url-tab-modal').removeClass('d-none');
        } else {
            $('#image-document-url-tab-modal').addClass('d-none');
            $('#image-document-upload-tab-modal').removeClass('d-none');
        }
    }

    function image_document_url_add_modal(event) {
        $('#image-document-url-wrapper_modal').append(`
            <div class="d-flex">
                <input class='form-control m-1' name="image_document_url[]" type="url" placeholder="Paste the image link">
                <button type="button" class="btn btn-sm btn-danger m-1" onclick="$(event.target).parent().remove()">&times;</button>
            </div>
        `);
    }

    function image_document_upload_add_modal(event) {
        $('#image-document-upload-wrapper_modal').append(`
            <div class="d-flex">
                <input class='form-control m-1' name="image_document_upload[]" type="file" placeholder="Paste the image link">
                <button type="button" class="btn btn-sm btn-danger m-1" onclick="$(event.target).parent().remove()">&times;</button>
            </div>
        `);
    }

    function submitModalReview() {
        let rating_type = @json(get_rating_types());
        let formData = new FormData();
        let product_id = $('#product').val();
        let review_description = $('#review-description-modal').val();

        [...document.querySelectorAll('#review-form-modal .ui-slider-handle')].forEach((item, i) => {
           formData.append(`ratings[${rating_type[i]}]`, parseInt(item.style.left)/20);
        });
        [...document.querySelectorAll(`input[name='image_document_upload_modal[]']`)].forEach((input, i) => {
            if (input.files.length) {
                formData.append(`uploaded_document[]`, input.files[0]);
            }
        });
        [...document.querySelectorAll(`input[name='image_document_url_modal[]']`)].forEach((input, i) => {
            if (input.value) {
                formData.append(`uploaded_document_url_modal[]`, input.value);
            }
        });

        formData.append('product_id', product_id);
        formData.append('review_description', review_description);
        formData.append('_token', "{{ csrf_token() }}");

        @guest
            let reviewer_name = $('#reviewer-name-modal').val();
            let reviewer_email = $('#reviewer-email-modal').val();
            let reviewer_phone = $('#reviewer-phone-modal').val();
            formData.append('reviewer_name', reviewer_name);
            formData.append('reviewer_email', reviewer_email);
            formData.append('reviewer_phone', reviewer_phone);
        @endguest

       $.ajax({
            url: "{{ auth()->check() ? route('review.store') : route('guest-review.store') }}",
            type: "post",
            processData: false,
            contentType: false,
            data: formData,
            success: function (response) {
                if (response.status == 'success') {
                    toastr.success('Review added successfully');
                    setTimeout(() => {
                        window.location.href = window.location.href;
                    }, 2000);

                } else {
                    toastr.error(response.message);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                toastr.error('Something went wrong');
               // console.log(textStatus, errorThrown);
            }
        });
    }

</script>
@endsection
