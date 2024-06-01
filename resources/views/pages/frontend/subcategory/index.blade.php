@extends('layout.frontend')
@section('title','Sub-Categories')
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
<section class="blog-slider-tow-grid wd-slider-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h1 class="wishlist-slider-title">Sub-Categories List</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================
    Category Section
============================== -->
<section class="blog-section">
    <div class="container">
        <div class="row four-grid">
            @foreach($subCategories as $subCategory)
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="blog-box">
                    <div class="blog-content-box">
                        <a href="{{ route('sub-category.productList', $subCategory->token) }}">
                            <h4 class="blog-title mb-3 text-center">
                                {{ $subCategory->name }}
                            </h4>

                            <img src="{{ asset('frontend/img/categories.png')}}" width="30" class="figure-img img-fluid rounded mx-auto d-block" alt="blog-img">
                            <p class="blog-content text-center mt-3">
                                Total Products: {{ count($subCategory->active_products) }}
                            </p>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>






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

</script>
@endsection
