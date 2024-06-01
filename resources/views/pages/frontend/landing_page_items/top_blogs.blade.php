<section id="wd-news">
    <div class="container-fluid custom-width">
        <div class="row" style="width: 100%; overflow: hidden;">
            <div class="col-md-12 text-center">
                <h2 class="news-title">Weekly Top Blogs</h2>
            </div>
            @foreach($blogs as $blog)
            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 wow fadeIn animated" data-wow-delay="300ms" style="width: 100%; float: left;">
                <a href="{{ route('blog.view', $blog->token) }}">
                    <div class="wd-news-box">
                        <figure class="figure">
                            <figcaption></figcaption>
                            <img src="{{ img($blog->blog_thumb) }}" class="figure-img img-fluid rounded" alt="blog-img">
                            <div class="wd-news-info">
                                <div class="figure-caption"><a href="{{ route('blog.view', $blog->token) }}">{{ Str::limit($blog->title, 70) }}</a></div>
                                <p class="wd-news-content">{!! Str::limit($blog->content, 170) !!}</p>
                                <a href="{{ route('blog.view', $blog->token) }}" class="badge badge-light wd-news-more-btn">Read More <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                            </div>
                            <span class="angle-right-to-left"></span>
                        </figure>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
