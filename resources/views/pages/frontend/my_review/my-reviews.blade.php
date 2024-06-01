@extends('layout.frontend')
@section('title','My reviews')
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
    Slider Section
============================== -->
<style>
    .select2 {
        width: 100% !important;
    }
    .review-document-wrapper {
        border-radius: 10px;
        border: 1px solid #768be1;
        margin: 0 10px;
        background: #768be129;
        padding: 10px;
    }
    .compare-products .wishlist-table-title th {
        width: 1%;
    }
    #review-display tr td {
        text-align: center;
    }
</style>
<script type="text/javascript">
    window['loaded_review_ids'] = @json(collect($ratings)->pluck('review_id')->toArray());
</script>
<section class="wishlist-slider-section  wd-slider-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h1 class="wishlist-slider-title">Review List</h1>
                    <div class="page-location pt-0">
                        <ul>
                            <li><a href="{{ route('home') }}">
                                Home <span class="divider">/</span>
                            </a></li>
                            <li><a class="page-location-active" href="{{ route('my.reviews') }}">
                                <span class="active-color">My reviews</span>
                                <span class="divider">/</span>
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================
    Product Details Section
============================== -->
<section class="product-details wishlist-table">
    <div class="container">
        <div class="row">
            <div class="col-12 p0">
                <button type="button" onclick="addReviewModal()" class="btn btn-primary m-3">Add a review</button>
            </div>
        </div>
        <div class="row compare-products rounded">
            <div class="col-12 pt-5">
                <div id="no-more-tables">
                    <table class="table table-striped dt-responsive nowrap w-100" id="review-table">
                      <thead>
                        <tr class="wishlist-table-title">
                          <th class="text-center">Remove</th>
                          <th class="text-center">Image</th>
                          <th class="text-center">Product name</th>
                          <th class="text-center">Rating</th>
                          <th class="text-center">Status</th>
                          <th class="text-center">Availability</th>
                          <th class="text-center">Availability</th>
                        </tr>
                      </thead>
                        <tbody id='review-display'>
                            @foreach($ratings as $rating)
                                <tr>
                                    <td class="text-center remove-icon">
                                        <div class="vertical-center">
                                            <a href="#">
                                                <div class="close-icon">
                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <img src="{{ img($rating->thumbnail) }}" class="review-table-img figure-img img-fluid" alt="product-img">
                                    </td>
                                    <td class="text-center">
                                        <div class="vertical-center">
                                            <p>{{ Str::limit($rating->name, 50) }}</p>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="vertical-center">
                                            <div class="wishlist-ratings">
                                                <strong>{{ $rating->rating }}</strong>
                                            </div>
                                            <div class="rating">
                                                {!! str_repeat('<i class="fa fa-star active-color" id="active-star" aria-hidden="true"></i>',intval($rating->rating)) !!}
                                                {!! str_repeat('<i class="fa fa-star-o" id="blank-star" aria-hidden="true"></i>',5-intval($rating->rating)) !!}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="vertical-center">
                                            <div class="wishlist-price">
                                                <p>{{ ucfirst($rating->status) }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="vertical-center">
                                            <div class="green-color"><i class="fa fa-check" aria-hidden="true"></i> In stock</div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="vertical-center">
                                            <a href="#!" class="btn btn-primary select-market-btn">
                                                Go to store <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id='load-more-review' class="col-12 text-center mt-4">
            <button class="btn btn-info" onclick="more_review()"><i class="fa fa-refresh" aria-hidden="true"></i> Load More..</button>
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
                <form id="review-form" action="javascript:void(0)">
                    <div class="container">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="category">Select Category:</label>
                                <button type="button" class="btn btn-info btn-circle btn-sm mb-2" onclick="toggle_add_category_card('show')"><i class="fa fa-plus"></i></button>
                                <select class="form-control select22" name="category_id" id="category" onchange="load_subcategories()" aria-label=".form-select-lg example">
                                    <option value="" selected>--Select--</option>
                                    @foreach($categories as $category)
                                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="sub_category">Select Sub-category:</label>
                                <button type="button" class="btn btn-info btn-circle btn-sm mb-2" onclick="toggle_add_subcategory_card('show')"><i class="fa fa-plus"></i></button>
                                <select class="form-control select22" name="subcategory_id" id="sub_category" onchange="load_brands()" aria-label=".form-select-lg example">
                                    <option value="" selected>--Select--</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="brand">Select Brand:</label>
                                <button type="button" class="btn btn-info btn-circle btn-sm mb-2" onclick="toggle_add_brand_card('show')"><i class="fa fa-plus"></i></button>
                                <select class="form-control select22" name="brand_id" id="brand" onchange="load_products()" aria-label=".form-select-lg example">
                                    <option value="" selected>--Select--</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Card body for user entry -->
                    <div class="container w-50">
                        <div class="row>">
                            <!-- Add category card -->
                            <div class="card text-center mt-1 d-none" id="add-category">
                                <div class="card-header">
                                    Add Category
                                </div>
                                <div class="card-body">
                                    <div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Enter Category Name">
                                        </div>
                                        <button type="button" onclick="add_category(event)" class="btn btn-primary mr-2">Save</button>
                                        <button type="button" onclick="toggle_add_category_card('hide')"  class="btn btn-danger">Close</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Add sub-category card -->
                            <div class="card text-center mt-1 d-none" id="add-subcategory">
                                <div class="card-header">
                                    Add Sub-category
                                </div>
                                <div class="card-body">
                                    <div>
                                        <div class="form-group">
                                            <select class="form-control" name="category_id" id="cate-for-add-subcate" aria-label=".form-select-lg example">
                                                <option value="0" selected>Select Category</option>
                                                @foreach($categories as $category)
                                                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" id="subcategory" placeholder="Enter Sub-category Name">
                                        </div>
                                        <button type="button" class="btn btn-primary mr-2" onclick="add_subcategory(event)">Save</button>
                                        <button type="button" onclick="toggle_add_subcategory_card('hide')" class="btn btn-danger">Close</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Add Brand card -->
                            <div class="card text-center mt-1 d-none" id="add-brand">
                                <div class="card-header">
                                    Add Brand
                                </div>
                                <div class="card-body">
                                    <div>
                                        <div class="form-group">
                                            <select class="form-control" name="category-id-for-add-brand" id="category-id-for-add-brand" onchange="load_subcat_for_add_brand()" aria-label=".form-select-lg example">
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="subcategory_id" id="subcate-id-for-add-brand" aria-label=".form-select-lg example">
                                                  <option value="" selected>Select Sub-category Name</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" id="brand-name" placeholder="Enter Brand Name">
                                        </div>
                                        <button type="button" class="btn btn-primary mr-2" onclick="add_brand(event)">Save</button>
                                        <button type="button" onclick="toggle_add_brand_card('hide')" class="btn btn-danger">Close</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Add Product card -->
                            <div class="card text-center mt-1 d-none" id="add-product">
                                <div class="card-header">
                                    Add Product
                                </div>
                                <div class="card-body">
                                    <div>
                                        <div class="form-group">
                                            <select class="form-control" name="category_id" id="category-id-for-add-product" onchange="load_subcat_for_add_product()"  aria-label=".form-select-lg example">
                                                  <option value="" selected>Select Category Name</option>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="subcategory_id" id="subcate-id-for-add-product" onchange="load_brand_for_add_product()" aria-label=".form-select-lg example">
                                                <option value="" selected>Select Sub-category</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="brand_id" id="brand-id-for-add-product" aria-label=".form-select-lg example">
                                                <option value="" selected>Select Brand</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" id="product-name" placeholder="Enter Product Name">
                                        </div>
                                        <div class="form-group mt-4">
                                            <label for="product-thumb" class="float-left">Thumbnail Upload:</label>
                                            <input class="form-control custom-input-file custom-input-file--2" name="product-thumb" id="product-thumb" type="file" onchange="preview_image()"/>
                                        </div>
                                        <img id="preview" class="rounded mx-auto d-block" width="500">
                                        <div class="form-group mt-3">
                                            <textarea class="description" name="description" id="description"></textarea>
                                        </div>
                                        <div class="form-group mt-4">
                                            <label for="other_images" class="float-left">Upload More Images…:</label>
                                            <input class="form-control custom-input-file custom-input-file--2" name="other-images[]" id="other-images" type="file" multiple>
                                        </div>
                                        <button type="button" class="btn btn-primary mr-2" onclick="add_product(event)">Save</button>
                                        <button type="button" onclick="toggle_add_product_card('hide')"  class="btn btn-danger">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group p-3">
                        <label for="brand">Select Product:</label>
                        <button type="button" class="btn btn-info btn-circle btn-sm mb-2" onclick="toggle_add_product_card('show')"><i class="fa fa-plus"></i></button>
                        <select class="form-control select22" name="brand_id" id="product" aria-label=".form-select-lg example">
                            <option value="" selected>--Select--</option>
                        </select>
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
                                <textarea class="review_description" name="review_description" id="review_description"></textarea>
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
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex justify-content-between">
                                        <div class="from-group mr-5">
                                            <input class='form-control m-1' name="image_document_url[]" type="url" placeholder="Paste the image link">
                                        </div>
                                        <div class="from-group ml-5 mt-2">
                                            <label for="status">Status :</label>
                                            <input type="radio" class="form-check-input ml-1 url_document_mode" name="url_document_mode[0]" id="public-link-0" value="public">
                                            <label for="public-link-0" class="form-check-label ml-4">Public</label>
                                            <input type="radio" class="form-check-input ml-1 url_document_mode" name="url_document_mode[0]" id="private-link-0" value="private" checked>
                                            <label for="private-link-0" class="form-check-label ml-4">Private</label>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-danger m-1" onclick="$(event.target).parent().remove()">&times;</button>
                                </div>
                            </div>
                            <div class="d-inline-block w-50">
                                <button type="button" onclick="image_document_url_add(event)" class="btn btn-sm btn-info w-50">+</button>
                            </div>
                        </div>
                        <div class="col-12 d-none" id="image-document-upload-tab">
                            <div class="d-inline-block w-100" id="image-document-upload-wrapper">
                                <!-- <div class="d-flex">
                                    <input class='form-control m-1' name="image_document_upload[]" type="file" placeholder="Paste the image link">
                                    <button type="button" class="btn btn-sm btn-danger m-1" onclick="$(event.target).parent().remove()">&times;</button>
                                </div> -->
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex justify-content-between">
                                        <div class="from-group mr-5">
                                            <input class='form-control m-1' name="image_document_upload[]" type="file">
                                        </div>
                                        <div class="from-group ml-5 mt-2">
                                            <label for="status">Status :</label>
                                            <input type="radio" class="form-check-input ml-1 image_document_mode" name="image_document_mode[0]" id="public-0" value="public">
                                            <label for="public-0" class="form-check-label ml-4">Public</label>
                                            <input type="radio" class="form-check-input ml-1 image_document_mode" name="image_document_mode[0]" id="private-0" value="private" checked>
                                            <label for="private-0" class="form-check-label ml-4">Private</label>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-danger m-1" onclick="$(event.target).parent().remove()">&times;</button>
                                </div>
                            </div>
                            <div class="d-inline-block w-50">
                                <button type="button" onclick="image_document_upload_add(event)" class="btn btn-sm btn-info w-50">+</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="submitReview()" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>


<!-- =========================
    Call To Action Section
============================== -->
@include('include.frontend.call-to-action')

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
<script type="text/javascript" src="{{ asset('js/default-assets/jquery.datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/default-assets/datatables.bootstrap4.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/default-assets/datatable-responsive.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/default-assets/responsive.bootstrap4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/default-assets/datatable-button.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/default-assets/button.bootstrap4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/default-assets/button.html5.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/default-assets/button.flash.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/default-assets/button.print.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/default-assets/datatables.keytable.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/default-assets/datatables.select.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/default-assets/demo.datatable-init.js') }}"></script>
<script type="text/javascript">

    $(document).ready(function() {
        window.dataTable = $('#review-table').DataTable();
        $('#review-table_info').addClass("mt-5");
        $('#review-table_paginate').addClass("mt-5 mb-3");
        $('.dataTables_filter').addClass("float-right");
    });

    function loadCache() {
        let cache_storage_name = '{{ auth()->id() }}_review_cache';
        let cache_data = localStorage.getItem(cache_storage_name);
        let rating_types = @json(get_rating_types());
        let rating_wrapper = [...document.querySelectorAll('.ui-slider-handle')];

        if (cache_data) {
            cache = JSON.parse(cache_data);

            if (cache.category_id) {
                $('#category').val(cache.category_id).change();
            }
            if (cache.sub_category_id) {
                $('#sub_category').val(cache.sub_category_id).change();
            }
            if (cache.brand_id) {
                $('#brand').val(cache.brand_id).change();
            }
            if (cache.product_id) {
                $('#product').val(cache.product_id).change();
            }
            if (cache.review_description) {
                $('#review_description').summernote('code', cache.review_description)
            }

            for(let i in rating_types) {
                if (cache.ratings[rating_types[i]] && rating_wrapper[i]) {
                    $(`.${rating_types[i]}`).slider("value", parseInt(cache.ratings[rating_types[i]]));
                    $(`.${rating_types[i]}`).parent().children('div:first-child').children('.rating').children('a').each((index, a)=>{
                        if(index < parseInt(cache.ratings[rating_types[i]])) {
                                $($(a).children('i')[0]).addClass('active-color');
                        }

                    });
                }
            }
        } else {
            let category_id = $('#category').val();
            let sub_category_id = $('#sub_category').val();
            let brand_id = $('#brand').val();
            let product_id = $('#product').val();
            let ratings = {};

            @json(get_rating_types()).forEach((item) => {
                ratings[item] = 0;
            });


            let cache_data = {
                category_id : category_id ? category_id : '',
                sub_category_id : sub_category_id ? sub_category_id : '',
                brand_id : brand_id ? brand_id : '',
                product_id : product_id ? product_id : '',
                review_description : '',
                ratings : ratings
            };
            localStorage.setItem(cache_storage_name, JSON.stringify(cache_data));
        }
    }

    function setCacheData(key, value) {
        let cache_storage_name = '{{ auth()->id() }}_review_cache';
        let cache_data = localStorage.getItem(cache_storage_name);
        let cache = JSON.parse(cache_data);
        let keys = key.split('.');

        if (keys.length == 1) {
            cache[keys[0]] = value;
        }
        if (keys.length == 2) {
            cache[keys[0]][keys[1]] = value;
        }

        localStorage.setItem(cache_storage_name, JSON.stringify(cache));
    }

    $(document).ready(function() {
        $('.select22').select2().change(function() {
            setTimeout(() => {
                let category_id = $('#category').val();
                let subcategory_id = $('#sub_category').val();
                let brand_id = $('#brand').val();
                let product_id = $('#product').val();

                setCacheData('category_id', category_id);
                setCacheData('sub_category_id', subcategory_id);
                setCacheData('brand_id', brand_id);
                setCacheData('product_id', product_id);
            }, 3000);
        });

        $('#description').summernote({
            placeholder: 'Product description goes here',
            tabsize: 2,
            height: 300
        });
        $('#review_description').summernote({
            placeholder: 'Review description goes here',
            tabsize: 2,
            height: 220,
            callbacks: {
                onChange: function() {
                    let review_description = $('#review_description').val();
                    setCacheData('review_description', review_description);
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
                setCacheData('ratings.Design', ui.value);
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
                setCacheData('ratings.Quality', ui.value);
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
                setCacheData('ratings.Durability', ui.value);
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
                setCacheData('ratings.Price', ui.value);
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
                setCacheData('ratings.Service', ui.value);
            }
        });
    });

    window.categories = @json($categories);
    load_subcategories();

    function load_subcategories() {
        let category_id = document.querySelector('#category').value;

        try {
            let sub_categories = window.categories.find(category => category.id == category_id).sub_categories;
            let html = `<option value="" selected>--Select--</option>`;
            sub_categories.forEach((sub_category) => {
                html += `<option value='${sub_category.id}'>${sub_category.name}</option>`
            });

            document.querySelector(`#sub_category`).innerHTML = html;
        } catch (e) {
            $(`#sub_category`).html('');
            return;
        }
        load_brands();
    }

    function load_brands() {
        let category_id = document.querySelector('#category').value;
        let subcategory_id = document.querySelector('#sub_category').value;

        try {
            let brands = window.categories.find(category => category.id == category_id)
                .sub_categories
                .find(subcategory => subcategory.id == subcategory_id)
                .brands;
            let html = `<option value="" selected>--Select--</option>`;

            brands.forEach((brand) => {
                    html += `<option value='${brand.id}'>${brand.name}</option>`
                });
            document.querySelector(`#brand`).innerHTML = html;
        } catch (e) {
            $(`#brand`).html('');
            return;
        }
        load_products();
    }

    function load_products() {
        let category_id = document.querySelector('#category').value;
        let subcategory_id = document.querySelector('#sub_category').value;
        let brand_id = document.querySelector('#brand').value;
        try {
            let products = window.categories.find(category => category.id == category_id)
                .sub_categories
                .find(subcategory => subcategory.id == subcategory_id)
                .brands
                .find(brand => brand.id == brand_id)
                .products;
            let html = `<option value="" selected>--Select--</option>`;

            products.forEach((product) => {
                html += `<option value='${product.id}'>${product.name}</option>`
            });
            document.querySelector(`#product`).innerHTML = html;
        } catch (e) {
            $(`#product`).html('');
            return;
        }
    }

    // User data entry modal open & hide start here
    function toggle_add_category_card(mode) {
        if (mode == 'show') {
            $('#add-category').removeClass('d-none');
            $('#add-subcategory').addClass('d-none');
            $('#add-brand').addClass('d-none');
            $('#add-product').addClass('d-none');
        } else {
            $('#add-category').addClass('d-none');
        }
    }

    function toggle_add_subcategory_card(mode) {
        if (mode == 'show') {
            let options = '<option value="">--Select--</option>';
            window.categories.forEach((category) => {
                options += `<option value="${category.id}">${category.name}</option>`;
            });
            // $('#cate-for-add-subcate').html(options).select22();
            $('#cate-for-add-subcate').html(options);
            $('#add-subcategory').removeClass('d-none');
            $('#add-category').addClass('d-none');
            $('#add-brand').addClass('d-none');
            $('#add-product').addClass('d-none');
        } else {
            $('#add-subcategory').addClass('d-none');
        }
    }

    function toggle_add_brand_card(mode) {
        if (mode == 'show') {
            let category_options = '<option value="">--Select--</option>';
            window.categories.forEach((category) => {
                category_options += `<option value="${category.id}">${category.name}</option>`;
            });
            $('#category-id-for-add-brand').html(category_options);
            $('#add-brand').removeClass('d-none');
            $('#add-category').addClass('d-none');
            $('#add-subcategory').addClass('d-none');
            $('#add-product').addClass('d-none');
        } else {
            $('#add-brand').addClass('d-none');
        }
    }

    function load_subcat_for_add_brand() {
        let category_id = document.querySelector('#category-id-for-add-brand').value;
        try {
            let subcate_options = '';
            let sub_categories = window.categories.find(category => category.id == category_id).sub_categories;
            sub_categories.forEach((sub_category) => {
                subcate_options += `<option value="${sub_category.id}">${sub_category.name}</option>`;
            });
            $('#subcate-id-for-add-brand').html(subcate_options);
        } catch (e) {
            return;
        }
    }

    function toggle_add_product_card(mode) {
        if (mode == 'show') {
            let category_options = '<option value="">--Select--</option>';
            window.categories.forEach((category) => {
                category_options += `<option value="${category.id}">${category.name}</option>`;
            });
            $('#category-id-for-add-product').html(category_options);
            $('#add-product').removeClass('d-none');
            $('#add-category').addClass('d-none');
            $('#add-subcategory').addClass('d-none');
            $('#add-brand').addClass('d-none');
        } else {
            $('#add-product').addClass('d-none');
        }
    }

    function load_subcat_for_add_product() {
        let category_id = document.querySelector('#category-id-for-add-product').value;
        try {
            let subcate_options = '<option value="">--Select--</option>';
            let sub_categories = window.categories.find(category => category.id == category_id).sub_categories;
            sub_categories.forEach((sub_category) => {
                subcate_options += `<option value="${sub_category.id}">${sub_category.name}</option>`;
            });
            $('#subcate-id-for-add-product').html(subcate_options);
        } catch (e) {
            return;
        }
    }

    function load_brand_for_add_product() {
        let category_id = document.querySelector('#category-id-for-add-product').value;
        let subcategory_id = document.querySelector('#subcate-id-for-add-product').value;
        try {
            let brand_options = '';
            let brands = window.categories.find(category => category.id == category_id)
                .sub_categories
                .find(subcategory => subcategory.id == subcategory_id)
                .brands;
            brands.forEach((brand) => {
                brand_options += `<option value='${brand.id}'>${brand.name}</option>`
            });
            $('#brand-id-for-add-product').html(brand_options);

        } catch (e) {
            return;
        }
    }

    function preview_image() {
        var file = document.getElementById("product-thumb").files
        if (file.length > 0) {
            var fileReader = new FileReader()
            fileReader.onload = function (event) {
                document.getElementById("preview").setAttribute("src", event.target.result)
            }
            fileReader.readAsDataURL(file[0])
        }
    }

    function add_category(event) {
        let category_name = $('#category_name').val();

        $.ajax({
             url: "{{ route('category.store') }}",
             type: "post",
             data: {
                 category_name ,
                 _token : "{{ csrf_token() }}"
             } ,
             success: function (response) {
                 if (response.status == 'success') {
                     toastr.success('Category added successfully');
                     $('#category_name').val('');
                     $('#add-category').addClass('d-none');
                     let option = new Option(response.category.name, response.category.id);
                     let category = response.category;
                     category.sub_categories = [];
                     window.categories.push(category);
                     $('#category').append(option).val(response.category.id);
                     $('#category').change();
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
        loadCache();
        $('#review-modal').modal('show');
    }

    function add_subcategory(event) {
        let category_id = $('#cate-for-add-subcate').val();
        let name = $('#subcategory').val();

        $.ajax({
             url: "{{ route('sub-category.store') }}",
             type: "post",
             data: {
                 category_id,
                 name,
                 _token : "{{ csrf_token() }}"
             } ,
             success: function (response) {
                 if (response.status == 'success') {
                     toastr.success('Sub-category added successfully');
                     $('#cate-for-add-subcate').val('');
                     $('#subcategory').val('');
                     $('#add-subcategory').addClass('d-none');
                     let option = new Option(response.sub_category.name, response.sub_category.id);
                     let sub_category = response.sub_category;
                     sub_category.brands = [];

                     for (let i in window.categories) {
                         if (window.categories[i].id == category_id) {
                             window.categories[i].sub_categories.push(sub_category);
                             break;
                         }
                     }
                     $('#sub_category').append(option).val(response.sub_category.id);
                     $('#sub_category').change();
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

    function add_brand(event) {
        let category_id = $('#category-id-for-add-brand').val();
        let subcategory_id = $('#subcate-id-for-add-brand').val();
        let name = $('#brand-name').val();

        $.ajax({
             url: "{{ route('brand.store') }}",
             type: "post",
             data: {
                 name,
                 category_id,
                 subcategory_id,
                 _token : "{{ csrf_token() }}"
             } ,
             success: function (response) {
                 if (response.status == 'success') {
                     toastr.success('Brand added successfully');
                     $('#category-id-for-add-brand').val('');
                     $('#subcate-id-for-add-brand').val('');
                     $('#brand-name').val('');
                     $('#add-brand').addClass('d-none');

                     let option = new Option(response.brand.name, response.brand.id);
                     let brand = response.brand;
                     brand.products = [];

                     for (let i in window.categories) {
                         if (window.categories[i].id == category_id) {
                             for (let j in window.categories[i].sub_categories) {
                                 if (window.categories[i].sub_categories[j].id == subcategory_id) {
                                     window.categories[i].sub_categories[j].brands.push(brand);
                                     break;
                                 }
                             }
                         }
                     }
                     $('#brand').append(option).val(response.brand.id);
                     $('#brand').change();
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

    function add_product(event) {
        let category_id = $('#category-id-for-add-product').val();
        let subcategory_id = $('#subcate-id-for-add-product').val();
        let brand_id = $('#brand-id-for-add-product').val();
        let product_name = $('#product-name').val();
        let product_thumb = $('#product-thumb').prop('files')[0];
        let product_desc= $('#description').val();
        let other_images = $('#other-images').prop('files');

        let form_data = new FormData();
        form_data.append('category_id',category_id);
        form_data.append('subcategory_id',subcategory_id);
        form_data.append('brand_id',brand_id);
        form_data.append('product_name',product_name);
        form_data.append('product_thumb',product_thumb);
        form_data.append('product_desc',product_desc);
        form_data.append('_token',"{{ csrf_token() }}");

        [...other_images].forEach((image, i) => {
            form_data.append(`other_images[${i}]`,image);
        });


        $.ajax({
             url: "{{ route('product.store') }}",
             type: "post",
             processData: false,
             contentType: false,
             data: form_data,
             success: function (response) {
                 if (response.status == 'success') {
                     toastr.success('Product added successfully');
                     $('#category-id-for-add-product').val('');
                     $('#subcate-id-for-add-product').val('');
                     $('#brand-id-for-add-product').val('');
                     $('#product-name').val('');
                     $('#product-thumb').val('');
                     $('#description').val('');
                     $('#add-product').addClass('d-none');

                     let option = new Option(response.product.name, response.product.id);
                     let product = response.product;

                     for (let i in window.categories) {
                         if (window.categories[i].id == category_id) {
                             for (let j in window.categories[i].sub_categories) {
                                 if (window.categories[i].sub_categories[j].id == subcategory_id) {
                                     for (let k in window.categories[i].sub_categories[j].brands) {
                                         if (window.categories[i].sub_categories[j].brands[k].id == brand_id) {
                                             window.categories[i].sub_categories[j].brands[k].products.push(product);
                                             break;
                                         }
                                     }
                                 }
                             }
                         }
                     }
                     $('#product').append(option).val(response.product.id);
                     $('#product').change();
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
        var i = $('#image-document-url-wrapper').children().length + 1;
        $('#image-document-url-wrapper').append(`
            <div class="d-flex justify-content-between">
                <div class="d-flex justify-content-between">
                    <div class="from-group mr-5">
                        <input class='form-control m-1' name="image_document_url[]" type="url" placeholder="Paste the image link">
                    </div>
                    <div class="from-group ml-5 mt-2">
                        <label">Status :</label>
                        <input type="radio" class="form-check-input ml-1 url_document_mode" name="url_document_mode[${i}]" id="public-url${i}" value="public">
                        <label for="public-url${i}" class="form-check-label ml-4">Public</label>
                        <input type="radio" class="form-check-input ml-1 url_document_mode" name="url_document_mode[${i}]" id="private-url${i}" value="private" checked>
                        <label for="private-url${i}" class="form-check-label ml-4">Private</label>
                    </div>
                </div>
                <button type="button" class="btn btn-sm btn-danger m-1" onclick="$(event.target).parent().remove()">&times;</button>
            </div>
        `);
    }
    function image_document_upload_add(event) {
        var i = $('#image-document-upload-wrapper').children().length + 1;
        $('#image-document-upload-wrapper').append(`
            <div class="d-flex justify-content-between">
                <div class="d-flex justify-content-between">
                    <div class="from-group mr-5">
                        <input class='form-control m-1' name="image_document_upload[]" type="file">
                    </div>
                    <div class="from-group ml-5 mt-2">
                        <label>Status :</label>
                        <input type="radio" class="form-check-input ml-1 image_document_mode" id="public-${i}" name="image_document_mode[${i}]" value="public">
                        <label for="public-${i}" class="form-check-label ml-4">Public</label>
                        <input type="radio" id="private-${i}" class="form-check-input ml-1 image_document_mode" name="image_document_mode[${i}]" value="private" checked>
                        <label for="private-${i}" class="form-check-label ml-4">Private</label>
                    </div>
                </div>
                <button type="button" class="btn btn-sm btn-danger m-1" onclick="$(event.target).parent().remove()">&times;</button>
            </div>
        `);
    }
    function submitReview() {
        let rating_type = @json(get_rating_types());
        let formData = new FormData();
        let category_id = $('#category').val();
        let subcategory_id = $('#sub_category').val();
        let brand_id = $('#brand').val();
        let product_id = $('#product').val();
        let review_description = $('#review_description').val();

        [...document.querySelectorAll('.ui-slider-handle')].forEach((item, i) => {
           formData.append(`ratings[${rating_type[i]}]`, parseInt(item.style.left)/20);
        });
        [...document.querySelectorAll(`input[name='image_document_upload[]']`)].forEach((input, i) => {
            if (input.files.length) {
                formData.append(`uploaded_document[]`, input.files[0]);
            }
        });
        [...document.querySelectorAll(`.image_document_mode`)].forEach((input, i) => {
            if (input.checked) {
                formData.append(`uploaded_document_mode[]`, input.value);
            }
        });
        [...document.querySelectorAll(`input[name='image_document_url[]']`)].forEach((input, i) => {
            if (input.value) {
                formData.append(`uploaded_document_url[]`, input.value);
            }
        });
        [...document.querySelectorAll(`.url_document_mode`)].forEach((input, i) => {
            if (input.checked) {
                formData.append(`url_document_mode[]`, input.value);
            }
        });



        formData.append('category_id', category_id);
        formData.append('sub_category_id', subcategory_id);
        formData.append('brand_id', brand_id);
        formData.append('product_id', product_id);
        formData.append('review_description', review_description);
        formData.append('_token', "{{ csrf_token() }}");

       $.ajax({
            url: "{{ route('review.store') }}",
            type: "post",
            processData: false,
            contentType: false,
            data: formData,
            success: function (response) {
                let cache_storage_name = '{{ auth()->id() }}_review_cache';
                if (response.status == 'success') {
                    toastr.success('Review added successfully');
                    localStorage.removeItem(cache_storage_name);
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

    function more_review() {
        event.preventDefault();

        $.ajax({
            url: `{{ route('reviews.load-more') }}?else=${window['loaded_review_ids'].join(',')}`,
            success: function(data) {
                $.each(data, function(index, value) {
                    var active_star = `<i class='fa fa-star active-color' id='active-star' aria-hidden='true'></i>`;
                    var blank_star = `<i class='fa fa-star-o' id='blank-star' aria-hidden='true'></i>`;
                    dataTable.row.add([
                        "<div class='vertical-center'><a href='#'><div class='close-icon'><i class='fa fa-times' aria-hidden='true'></i></div></a></div>",
                        "<img src='"+window.location.origin+'/storage/'+ value.thumbnail +"' class='figure-img img-fluid' alt='product-img'>",
                        "<div class='vertical-center'><p>"+ value.name.slice(0, 49) +"</p></div></td>",
                        "<div class='vertical-center'><div class='wishlist-ratings'><strong>"+ Math.round(value.rating) +"</strong></div><div class='rating'>"+ active_star.repeat(Math.round(value.rating)) +"<span>"+ blank_star.repeat(5-Math.round(value.rating)) +"</span></div></div>",
                        "<div class='vertical-center'><div class='wishlist-price'><p>"+ value.status +"</p></div></div>",
                        "<div class='vertical-center'><div class='green-color'><i class='fa fa-check' aria-hidden='true'></i> In stock</div></div>",
                        "<div class='vertical-center'><a href='#!' class='btn btn-primary select-market-btn'>Go to store <i class='fa fa-arrow-right' aria-hidden='true'></i></a></div>",
                    ]).draw();
                });
            },  error: function(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    }

</script>
@endsection
