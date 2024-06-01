<section id="main-slider-section-{{ $id }}" class="main-slider-section">
    <div id="main-slider-{{ $id }}" class="slider-bg2 main-slider  owl-carousel owl-theme product-review slider-cat">
        @foreach($sliders as $slider)
        <div class="item d-flex  slider-bg align-items-center">
            <div class="container-fluid">
                <div class="row justify-content-end">

                    <div class="slider-text order-2 order-sm-1 col-sm-6  col-xl-4   col-md-6">
                        <h6 class="sub-title">{{ $slider->highlighted_title }}</h6>
                        <h1 class="slider-title"><strong class="highlights-text">{{ explode(' ', $slider->heading)[0] }} </strong>{{ substr(strstr($slider->heading, ' '), 1) }}</h1>
                        <p class="slider-content">{{ $slider->summary }}.</p>
                        <a href="{{ $slider->button_url }}" class="btn btn-primary wd-shop-btn slider-btn" target="{{ $slider->button_target == 'other-site' ? '_blank' : '_self' }}">
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
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        $('#main-slider-{{ $id }}').owlCarousel({
            loop: true,
            nav: true,
            items: 1,
            navText: ['<i class=\'fa fa-angle-left\'></i>', '<i class=\'fa fa-angle-right\'></i>'],
            dots: false
        })

        $('#main-slider-{{ $id }}').on('translate.owl.carousel', function () {
            $('.slider-text').removeClass('fadeInUp animated').hide();
        });
        $('#main-slider-{{ $id }}').on('translated.owl.carousel', function () {
            $('.slider-text').addClass('fadeInUp animated').show();
        });

        $('#main-slider-{{ $id }}').on('translate.owl.carousel', function () {
            $('.slider-img').removeClass('fadeInDown animated').hide();
        });
        $('#main-slider-{{ $id }}').on('translated.owl.carousel', function () {
            $('.slider-img').addClass('fadeInDown animated').show();
        });

        $('#main-slider-{{ $id }}').on('translate.owl.carousel', function () {
            $('.slider-img-two').removeClass('fadeInDown animated').hide();
        });
        $('#main-slider-{{ $id }}').on('translated.owl.carousel', function () {
            $('.slider-img-two').addClass('fadeInDown animated').show();
        });

        $('#main-slider-{{ $id }}').on('translate.owl.carousel', function () {
            $('.slider-countdown').removeClass('fadeInUp animated').hide();
        });
        $('#main-slider-{{ $id }}').on('translated.owl.carousel', function () {
            $('.slider-countdown').addClass('fadeInUp animated').show();
        });

        $('#main-slider-{{ $id }}').on('translate.owl.carousel', function () {
            $('.cou-slider-img').removeClass('fadeInDown animated').hide();
        });
        $('#main-slider-{{ $id }}').on('translated.owl.carousel', function () {
            $('.cou-slider-img').addClass('fadeInDown animated').show();
        });
    });
</script>
