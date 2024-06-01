@foreach($products as $product)
    <script>
        window['loaded_recent_product_ids_{{ $id }}'].push({{ $product->id }});
    </script>
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
                        <a href="#">
                            @if(count($product->active_reviews))
                            <i class="fa fa-star active-color" aria-hidden="true"></i><strong>{{ $product->avg_rating }}</strong>
                            @else
                            <b></b>
                            @endif
                        </a>
                        <a href="#">
                            <img src="{{ asset('frontend/img/product-img/compare.png') }}" alt="">
                            <img class="compare-white" src="{{ asset('frontend/img/product-img/compare-white.png') }}" alt="">
                        </a>
                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>{{ count($product->active_reviews) }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
