@extends('layout.frontend')
@section('title','Blog')
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
                    <h1 class="wishlist-slider-title">{{ $blog->title }}</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================
    Blog Section
============================== -->
<section class="blog-section">
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="blog-single">
                    <div class="blog-box">
                        <!--
                            ==================
                            Date Section
                            ==================
                         -->
                        <div class="blog-date text-center">
                            <h2 class="date">{{ $blog->created_at->format('d') }}</h2>
                            <h4 class="monthe">{{ $blog->created_at->format('F') }}</h4>
                        </div>
                        <!--
                            ==================
                            Blog Img
                            ==================
                         -->
                        <div class="blog-img">
                            <img src="{{ img($blog->blog_thumb) }}" class="figure-img img-fluid" alt="blog-img">
                            <div class="shadow">
                                <img src="{{ asset('img/blog-img/shadow.png') }}" class="figure-img img-fluid" alt="blog-img">
                            </div>
                        </div>
                        <!--
                            ==================
                            Author Meta
                            ==================
                         -->
                        <div class="author-meta">
                            Posted by: {{ $blog->postedBy->first_name }} {{ $blog->postedBy->last_name }}
                        </div>
                        <!--
                            ======================
                            Blog Content
                            ======================
                         -->
                        <div class="blog-content-box">
                            {!! $blog->content !!}

                            <div class="author-meta">
                                Email: {{ $blog->postedBy->email }}
                            </div>

                        </div>
                        <!--
                            =====================
                            Blog Share Oprion
                            =====================
                         -->
                        <div class="single-blog-share-section">
                            <strong>Share :</strong>
                            <a href="#">
                                <span class="badge badge-secondary share-facebook" data-toggle="tooltip" data-placement="top" title="Share This Blog in Facebook"><i class="fa fa-facebook" aria-hidden="true"></i>facebook</span>
                            </a>
                            <a href="#">
                                <span class="badge badge-secondary share-twitter" data-toggle="tooltip" data-placement="top" title="Share This Blog in Twitter"><i class="fa fa-twitter" aria-hidden="true"></i>twitter</span>
                            </a>
                            <a href="#">
                                <span class="badge badge-secondary share-linkedin" data-toggle="tooltip" data-placement="top" title="Share This Blog in Linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i>Linkdin</span>
                            </a>
                            <a href="#">
                                <span class="badge badge-secondary share-pinterest" data-toggle="tooltip" data-placement="top" title="Share This Blog in Pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i>Pinterest</span>
                            </a>
                        </div>

<!-- =========================
    Call To Action Section
============================== -->


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
