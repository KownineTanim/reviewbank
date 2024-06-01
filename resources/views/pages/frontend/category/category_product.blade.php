@extends('layout.frontend')
@section('title','Category wise product')
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
                    <h1 class="wishlist-slider-title">{{ $products->name }}</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================
    Recent-Product Section
============================== -->
<section id="category-wise-product" class="recent-product-wrapper recent-pro-2">
    <div class="container-fluid custom-width">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 text-center">
                <h2 class="recent-product-title">Products List</h2>
            </div>
            @foreach($products->active_products as $product)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 wow fadeIn animated recent-product-item" data-wow-delay="100ms">
                    <div class="recent-product-box">
                        <div class="recent-product-img">
                            <a href="{{ route('product.view', $product->token) }}"><img src="{{ img($product->thumbnail) }}" class="img-fluid" alt="recent-product img"></a>
                            <div class="recent-product-info">
                                <div class="d-flex justify-content-between">
                                    <div class="recente-product-categories">
                                        {{ $product->sub_category->name }}
                                    </div>
                                </div>
                                <div class="recente-product-content" data-name='{{ $product->name }}'>
                                    {{ Str::limit($product->name, 60) }}
                                </div>
                                <div class="recent-product-meta-link">
                                    <a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i><strong>{{ $product->avg_rating }}</strong></a>
                                    <a href="#">
                                        <img src="{{ asset('frontend/img/product-img/compare.png') }}" alt="">
                                        <img class="compare-white" src="{{ asset('frontend/img/product-img/compare-white.png') }}" alt="">
                                    </a>
                                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>{{ $product->id }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="no-product d-none">
                <img class="figure-img img-fluid rounded" src="{{ asset('frontend/img/no-product.png')}}" alt="no-product"/>
            </div>
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
    window['loaded_category_product_ids'] = @json($products->active_products->pluck('id')->toArray());
    if (loaded_category_product_ids.length == 0)
    $( ".no-product" ).removeClass( "d-none" );


</script>
@endsection
