<section id="amazon-review">
    <div class="container-fluid custom-width">
        <div class="amazon-review-box-area">
            <div class="row m0 justify-content-center">
                <div class="col-md-12 p0 ">
                    <div class="amazon-review-title">
                        <h6>Top Reviewed</h6>
                    </div>
                </div>
                @foreach($productsIndexed as $product)
                    @if(count($product->reviews))
                    <div class="col-12 col-md-6 col-lg-4 p0 amazon-review-box wow fadeIn animated" data-wow-delay="0.2s">
                        <div class="media">
                            <div class="row">
                                <div class="col-sm-4 col-md-5">
                                    <img class="img-fluid" src="{{ img($product->thumbnail) }}" alt="Generic placeholder image">
                                </div>
                                <div class="col-sm-8 col-md-7 p0 d-flex align-items-center">
                                    <div class="amazon-review-box-content">
                                        <div class="rating">
                                            {!! str_repeat('<i class="fa fa-star active-color" aria-hidden="true"></i>',intval($product->avg_rating)) !!}
                                            {!! str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',5-intval($product->avg_rating)) !!}
                                        </div>
                                        <h6 data-id="{{ $product->name }}" class="amazon-review-box-title">{{ Str::limit($product->name, 60) }}</h6>
                                        <div class="price">
                                            <strong>$159 - $250</strong>
                                        </div>
                                        <a href="{{ route('product.view', $product->token) }}" class="btn btn-primary amazon-details">Details <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>
