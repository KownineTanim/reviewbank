<footer class="footer wow fadeInUp animated" data-wow-delay="900ms">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- ===========================
                        Footer About
                     =========================== -->
                <div class="footer-about">
                    <a href="#" class="footer-about-logo">
                        <img src="{{ img($settings->logo ?? '') }}" alt="Logo">
                    </a>
                    <div class="footer-description">
                        <p>Lorem ipsum dolor sit amet, anim id est laborum. Sed ut perspconsectetur, adipisci vam aliquam qua.</p>
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
            <div class="col-md-3 footer-view-controller">
                <!-- ===========================
                        Need Help ?
                     =========================== -->
                <div class="footer-nav">
                    <h6 class="footer-subtitle">Need Help ?</h6>
                    <ul>
                        <li><a href="#">Getting Started</a></li>
                        <li><a href="{{ route('contact-us.index') }}">Contact us</a></li>
                        <li><a href="#">FAQ's</a></li>
                        <li><a href="#">Press</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 footer-view-controller">
                <!-- ===========================
                        About
                     =========================== -->
                <div class="footer-nav">
                    <h6 class="footer-subtitle">About</h6>
                    <ul>
                        <li><a href="conditions.html">Privacy</a></li>
                        <li><a href="conditions.html">Return Policy</a></li>
                        <li><a href="conditions.html">Order &#38; Return</a></li>
                        <li><a href="conditions.html">Terms &#38; Conditions</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
