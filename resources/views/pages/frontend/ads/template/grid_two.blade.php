<section id="offer-time">
    <div class="container-fluid custom-width">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-6 wow fadeInLeft animated" data-wow-delay="300ms">
                <div class="offer-time-box">
                    <div class="row">
                        <div class="col-sm-5 col-md-6">
                            <img src="{{ img($advertiseData->ad1_image) }}" alt="offer img" class="offer-img">
                        </div>
                        <div class="col-sm-7 col-md-6 d-flex align-items-center">
                            <div class="offer-content">
                                <p class="offer-brand-name">{{ $advertiseData->ad1_highlight }}</p>
                                <h2 class="offer-title">SALE 75% <span>OFF</span></h2>
                                <p class="offer-price">{{ $advertiseData->ad1_quote }}</p>
                                <div class='countdown' data-date="2018-12-31"></div>
                                <div class="offer-btn offer-btn-primary">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-12 col-xl-6 wow fadeInRight animated" data-wow-delay="300ms">
                <div class="offer-time-box">
                    <div class="row">
                        <div class="col-sm-5 col-md-6">
                            <img src="{{ img($advertiseData->ad2_image) }}" alt="offer img" class="offer-img">
                        </div>
                        <div class="col-sm-7 col-md-6 d-flex align-items-center">
                            <div class="offer-content">
                                <p class="offer-brand-name">{{ $advertiseData->ad2_highlight }}</p>
                                <h2 class="offer-title">SALE 75% <span>OFF</span></h2>
                                <p class="offer-price">{{ $advertiseData->ad2_quote }}</p>
                                <div class='countdown' data-date="2018-12-31"></div>
                                <div class="offer-btn offer-btn-green">
                                    @if (!empty($advertiseData->ad2_button_target))
                                        <a href="{{ $advertiseData->ad2_button_url }}" class="btn btn-primary wd-shop-btn" target="{{ $advertiseData->ad2_button_target == 'other-site' ? '_blank' : '_self' }}">
                                            {{ $advertiseData->ad2_button_text }}
                                        </a>
                                    @else
                                        <a href="{{ $advertiseData->ad2_button_url }}" class="btn btn-primary wd-shop-btn">
                                            {{ $advertiseData->ad2_button_text }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
