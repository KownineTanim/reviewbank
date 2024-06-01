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
                    <h1 class="wishlist-slider-title">Blog</h1>
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
        <div class="row four-grid">
            @foreach($blogs as $blog)
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="blog-box">
                    <a href="{{ route('blog.view', $blog->token) }}">
                        <div class="blog-img">
                            <img src="{{ img($blog->blog_thumb) }}" class="figure-img img-fluid" alt="blog-img">
                        </div>
                        <div class="blog-content-box">
                            <a href="{{ route('blog.view', $blog->token) }}"><h4 class="blog-title">{{ Str::limit($blog->title, 20) }}</h4></a>
                            <p class="blog-content">{!! Str::limit($blog->content, 50) !!}</p>
                            <div class="raed-more">
                                <a class="btn btn-link" href="{{ route('blog.view', $blog->token) }}">
                                    READ MORE <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="float-right">
                    <nav class="wd-pagination">
                      <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">First</a></li>
                        <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active">
                          <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">Last</a></li>
                      </ul>
                    </nav>
                </div>
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

</script>
@endsection
