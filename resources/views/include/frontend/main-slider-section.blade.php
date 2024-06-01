<section id="main-slider-section">
    <div id="main-slider" class="slider-bg2  owl-carousel owl-theme product-review slider-cat">
        @foreach($sliders as $slider)
        <div class="item d-flex  slider-bg align-items-center">
            <div class="container-fluid">
                <div class="row justify-content-end">

                    <div class="slider-text order-2 order-sm-1 col-sm-6  col-xl-4   col-md-6">
                        <h6 class="sub-title">{{ $slider->highlighted_title }}</h6>
                        <h1 class="slider-title"><strong class="highlights-text">{{ explode(' ', $slider->heading)[0] }} </strong>{{ substr(strstr($slider->heading, ' '), 1) }}</h1>
                        <p class="slider-content">{{ $slider->summary }}.</p>
                        <a href="shop-left-sidebar.html" class="btn btn-primary wd-shop-btn slider-btn">
                            {{ $slider->button_text }} <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-6  order-1 order-sm-2 col-xl-6 slider-img">
                        <img src="{{ img($slider->image) }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
