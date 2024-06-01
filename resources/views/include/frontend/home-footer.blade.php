<footer class="footer wow fadeInUp animated footer-2" data-wow-delay="900ms">
    <div class="container-fluid custom-width">
        <div class="row">
            <div class="col-md-12 col-lg-3">
                <!-- ===========================
                        Footer About
                     =========================== -->
                <div class="footer-about">
                    <a href="index.html" class="footer-about-logo">
                        <img src="{{ img($settings->logo ?? '') }}" alt="Logo">
                    </a>
                    <div class="footer-description">
                        <p>{{ $settings->quote ?? '' }}</p>
                    </div>
                    <div class="wb-social-media">
                    <a href="#" class="bh"><i class="fa fa-behance"></i></a>
                    <a href="#" class="fb"><i class="fa fa-facebook-official"></i></a>
                    <a href="#" class="db"><i class="fa fa-dribbble"></i></a>
                    <a href="#" class="gp"><i class="fa fa-google-plus"></i></a>
                    <a href="#" class="vn"><i class="fa fa-vine"></i></a>
                    <a href="#" class="yt"><i class="fa fa-youtube-play"></i></a>
                </div>
                </div>
            </div>

            <div class="col-6 col-md-3 col-lg-3 footer-nav">
                <!-- ===========================
                        Need Help ?
                     =========================== -->
                <h6 class="footer-subtitle">Need Help ?</h6>
                <ul>
                    <li><a href="product-details-scroll.html">Getting Started</a></li>
                    <li><a href="{{ route('contact-us.index') }}">Contact Us</a></li>
                    <li><a href="product-details-scroll.html">FAQ's</a></li>
                    <li><a href="product-details-scroll.html">Press</a></li>
                    <li><a href="product-details-scroll.html">Product Feed</a></li>
                    <li><a href="product-details-scroll.html">Best Rated Product</a></li>
                    <li><a href="product-details-scroll.html">Feature product</a></li>
                </ul>
            </div>
            <div class="col-6 col-md-3 col-lg-3 footer-nav">
                <!-- ===========================
                        About
                     =========================== -->
                <h6 class="footer-subtitle">About</h6>
                    <ul>
                        <li><a href="conditions.html">Privacy</a></li>
                        <li><a href="conditions.html">Return Policy</a></li>
                        <li><a href="conditions.html">Order &#38; Return</a></li>
                        <li><a href="conditions.html">Terms &#38; Conditions</a></li>
                    </ul>
            </div>
            <div class="col-12 col-md-12 col-lg-3">
                <h6 class="footer-subtitle">Newsletter Signup</h6>
                <p class="newsletter-content">By subscribing to our mailing list you will always be update with the latest news from us.</p>
                <div class="newsletter-form">
                    <form>
                        <div class="form-group">
                            <input type="text" id="newsletter-mail" class="form-control newsletter-input" placeholder="Enter your email">
                        </div>
                        <button type="submit" class="btn btn-primary newsletter-btn" onclick="newsletter_mail()">Join us</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</footer>

<script type="text/javascript">
    function newsletter_mail() {
        var newsletter_mail = $('#newsletter-mail').val();
        alert(newsletter_mail);
    }
</script>
