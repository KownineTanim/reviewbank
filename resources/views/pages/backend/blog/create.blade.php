@extends('layout.backend')
@section('title','Add Blog')
@section('content')
<div class="container-fluid">
  <div class="col-xl-10 offset-xl-1 box-margin height-card">
      <div class="card card-body">
          <h4 class="card-title">Add Blog</h4>
          <div class="row">
              <div class="col-sm-12 col-xs-12">
                  <form action="{{ route('backend.blog.create') }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                          <label for="product_name">Title :</label>
                          <input type="text" class="form-control @error('blog_title') is-invalid @enderror" name="blog_title" id="blog-title" placeholder="Enter Blog Title">
                      </div>
                      @error('blog_title')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <div class="form-group mt-4 bg-primary">
                          <input type="file" name="blog_thumb" id="blog-thumb" class="custom-input-file custom-input-file--2 @error('blog-thumb') is-invalid @enderror" onchange="previewImage()"/>
                          <label for="blog-thumb">
                              <i class="fa fa-upload"></i>
                              <span>Thumbnail Upload…</span>
                          </label>
                      </div>
                      <p>Recomended image size height 517px and width 1170px</p>
                      @error('blog_thumb')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <img id="preview" class="rounded mx-auto d-block" width="500">
                      <div class="form-group mt-3">
                          <label for="summernote">Content:</label>
                          <textarea class="summernote" name="content" id="blog-content"></textarea>
                      </div>
                      <div class="form-group">
                          <label for="status">Status :</label>
                          <input type="radio" class="form-check-input ml-1" name="status" id="publish" value="publish" {{ old('status') == "publish" ? 'checked' : '' }}>
                          <label for="publish" class="form-check-label ml-4">Publish</label>
                          <input type="radio" class="form-check-input ml-1" name="status" id="unpublish" value="unpublish" {{ old('status') == "unpublish" ? 'checked' : '' }}>
                          <label for="unpublish" class="form-check-label ml-4">Unpublish</label>
                      </div>
                      @error('status')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <button type="submit" class="btn btn-primary mr-2">Save</button>
                      <button onclick="history.go(-1);" class="btn btn-danger">Back</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
@section('script')
<script type="text/javascript">

    $('#blog-content').summernote({
        placeholder: 'Blog content goes here',
        tabsize: 2,
        height: 300
    });

    function previewImage() {
        var file = document.getElementById("blog-thumb").files
        if (file.length > 0) {
            var fileReader = new FileReader()
            fileReader.onload = function (event) {
                document.getElementById("preview").setAttribute("src", event.target.result)
        }
            fileReader.readAsDataURL(file[0])
        }
    }
</script>
@endsection
