@extends('layout.backend')
@section('title','Single Blog')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 box-margin height-card">
            <div class="card">
                <div class="card-body">
                    <div class="project-desc">
                        <h5>{{ $blog->title }}</h5>
                        <p class="font-weight-bold font-12">Date: {{ $blog->created_at->format('d/m/Y') }} Time: {{ $blog->created_at->format('g:i A') }}</p>
                        <p class="font-weight-bold font-12"><span class="profile-info badge bg-{{ $blog->status == 'publish' ? 'success' : 'warning' }}" style="color:white;">{{ ucfirst($blog->status) }}</span></p>
                        <div class="thunb mb-20">
                        <p class="mb-0">{!! substr($blog->content, 0, 627) !!}</p>
                        <div class="thunb mb-20">
                            <img src="{{ img($blog->blog_thumb) }}" alt="blog_thumb" width=100%>
                        </div>
                        <p class="mb-0">{!! substr($blog->content, 627) !!}</p>
                        <p class="mb-0">Posted by : {{ $blog->postedBy->first_name }} {{ $blog->postedBy->last_name }}</p>
                        <p class="mb-0">Email : {{ $blog->postedBy->email }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">

</script>
@endsection
