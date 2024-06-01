<section id="categories">
    <div class="container-fluid custom-width">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6 col-xl-4 wow fadeIn animated" data-wow-delay="300ms">
                <div class="categories-big-box">
                    <div class="categories-title">
                        {{ $advertiseData->video_title }}
                    </div>
                    <!-- =========================
                        Youtube Video Section
                    ============================== -->
                    <div data-video="{{ $advertiseData->video_id }}" class='video' id="video-{{ $id }}">
                      <img class="figure-img img-fluid" src="{{ img($advertiseData->ad3_image) }}" alt="Youtube Video">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-4">
                <div class="categories-small-box wow fadeIn animated" data-wow-delay="600ms">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-start align-items-center">
                                    <div class="categories-info">
                                        <h2 class="categories-name">{{ $advertiseData->ad1_title }}</h2>
                                        <p class="categories-content">{{ $advertiseData->ad1_quote }}</p>
                                        @if (!empty($advertiseData->ad1_button_target))
                                            <a href="{{ $advertiseData->ad1_button_url }}" class="btn btn-primary wd-shop-btn" target="{{ $advertiseData->ad1_button_target == 'other-site' ? '_blank' : '_self' }}">
                                                {{ $advertiseData->ad1_button_text }}
                                            </a>
                                        @else
                                            <a href="{{ $advertiseData->ad1_button_url }}" class="btn btn-primary wd-shop-btn">
                                                {{ $advertiseData->ad1_button_text }}
                                            </a>
                                        @endif
                                    </div>
                                    <div class="categories-img align-items-center">
                                        <img src="{{ img($advertiseData->ad1_image) }}" class="img-fluid" alt="categories-img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="categories-small-box wow fadeIn animated" data-wow-delay="900ms">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-start align-items-center">
                                    <div class="categories-img align-items-center">
                                        <img src="{{ img($advertiseData->ad2_image) }}" class="img-fluid" alt="categories-img">
                                    </div>
                                    <div class="categories-info">
                                        <h2 class="categories-name">{{ $advertiseData->ad2_title }}</h2>
                                        <p class="categories-content">{{ $advertiseData->ad2_quote }}</p>
                                        <a href="{{ $advertiseData->ad2_button_url }}" class="btn btn-primary wd-shop-btn" target="{{ $advertiseData->ad2_button_target == 'other-site' ? '_blank' : '_self' }}">
                                            {{ $advertiseData->ad2_button_text }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-12 col-xl-4 wow fadeIn animated" data-wow-delay="1200ms">
                <div class="categories-big-box text-center">
                    <div class="featured-img">
                        <img src="{{ img($advertiseData->ad3_image) }}" class="img-fluid" alt="featured-img">
                    </div>
                    <div class="featured-info">
                        <h3 class="featured-product-title">
                            {{ $advertiseData->ad3_title }}
                        </h3>
                        <div class="rating">

                            {!! str_repeat('<a href="#"><i class="fa fa-star active-color" aria-hidden="true"></i></a>',intval($advertiseData->ad3_rating)) !!}
                            {!! str_repeat('<a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>',5-intval($advertiseData->ad3_rating)) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        $('#video-{{ $id }}').simplePlayer();
    });
</script>
