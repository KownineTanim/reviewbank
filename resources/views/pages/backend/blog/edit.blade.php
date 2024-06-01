@extends('layout.backend')
@section('title','Blog update')
@section('content')
<div class="container-fluid">
  <div class="col-xl-10 offset-xl-1 box-margin height-card">
      <div class="card card-body">
          <h4 class="card-title">Update Blog</h4>
          <div class="row">
              <div class="col-sm-12 col-xs-12">
                  <form action="{{ route('backend.blog.edit', $row->id) }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                          <label for="product_name">Title :</label>
                          <input type="text" class="form-control" name="blog_title" id="blog-title" value="{{ $row->title}}">
                      </div>
                      <div class="form-group mt-4 bg-primary">
                          <input type="file" name="blog_thumb" id="blog-thumb" class="custom-input-file custom-input-file--2" onchange="previewImage()"/>
                          <label for="blog-thumb">
                              <i class="fa fa-upload"></i>
                              <span>Thumbnail Upload…</span>
                          </label>
                      </div>
                      <p>Recomended image size height 517px and width 1170px</p>
                      <img id="preview" src="{{ img($row->blog_thumb) }}" class="rounded mx-auto d-block" width="500">
                      <div class="form-group mt-3">
                          <label for="summernote">Content:</label>
                          <textarea class="summernote" name="content" id="blog-content">{{ $row->content}}</textarea>
                      </div>
                      <div class="form-group">
                          <label for="status">Status :</label>
                          <input type="radio" class="form-check-input ml-1" name="status" id="publish" value="publish" {{ $row->status == 'publish' ? 'checked' : ''}}>
                          <label for="publish" class="form-check-label ml-4">Publish</label>
                          <input type="radio" class="form-check-input ml-1" name="status" id="unpublish" value="unpublish" {{ $row->status == 'unpublish' ? 'checked' : ''}}>
                          <label for="unpublish" class="form-check-label ml-4">Unpublish</label>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Update</button>
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
