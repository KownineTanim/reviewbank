@extends('layout.backend')
@section('title','Add Slider')
@section('content')
<div class="container-fluid">
  <div class="col-xl-10 offset-xl-1 box-margin height-card">
      <div class="card card-body">
          <h4 class="card-title">Add Slider</h4>
          <div class="row">
              <div class="col-sm-12 col-xs-12">
                  <form action="{{ route('backend.slider.create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                      <div class="form-group">
                          <label for="highlighted-title">Highlighted title :</label>
                          <input type="text" class="form-control @error('highlighted_title') is-invalid @enderror" value="{{old('highlighted_title')}}" name="highlighted_title" id="highlighted-title" placeholder="Enter Highlighted Title">
                      </div>
                      @error('highlighted_title')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <div class="form-group">
                          <label for="heading">Heading :</label>
                          <input type="text" class="form-control @error('heading') is-invalid @enderror" value="{{old('heading')}}" name="heading" id="heading" placeholder="Enter Heading">
                      </div>
                      @error('heading')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <div class="form-group">
                          <label for="heading">Summary :</label>
                          <input type="text" class="form-control @error('summary') is-invalid @enderror" value="{{old('summary')}}" name="summary" id="summary" placeholder="Enter Summary">
                      </div>
                      @error('summary')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <div class="form-group mt-4 bg-primary">
                          <input type="file" name="slider_image" id="slider-image" class="custom-input-file custom-input-file--2 @error('slider_image') is-invalid @enderror" value="{{old('slider_image')}}" onchange="previewImage()"/>
                          <label for="slider-image">
                              <i class="fa fa-upload"></i>
                              <span>Image Upload…</span>
                          </label>
                      </div>
                      <p>Recomended image size height 383 px and width 749 px</p>
                      @error('slider_image')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <img id="preview" class="rounded mx-auto d-block" width="500">
                      <div class="form-group">
                          <label for="button-text">Button text :</label>
                          <input type="text" class="form-control @error('button_text') is-invalid @enderror" value="{{old('button_text')}}" name="button_text" id="button-text" placeholder="Enter Button Text">
                      </div>
                      @error('slider_image')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <div class="form-group">
                          <label for="button-text">Button url :</label>
                          <input type="text" class="form-control @error('button_url') is-invalid @enderror" value="{{old('button_url')}}" name="button_url" id="button-url" placeholder="Enter Button Url">
                      </div>
                      @error('button_url')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <div class="form-group">
                          <input type="checkbox" name="button_target" value="other-site">
                          <label for="button-text">Open new tab</label>
                      </div>
                      @error('button_target')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <div class="col-sm-12 col-xs-12 d-flex justify-content-between">
                          <div class="col-sm-6 col-xs-6">
                              <div class="form-group">
                                  <label for="start-date">Start date :</label>
                                  <input type="text" class="form-control datetimepicker @error('start_date') is-invalid @enderror" id="start-date" name="start_date" placeholder="Pick a date for start campaign">
                              </div>
                          </div>
                          <div class="col-sm-6 col-xs-6">
                              <div class="form-group">
                                  <label for="end-date">End date :</label>
                                  <input type="text" class="form-control datetimepicker @error('end_date') is-invalid @enderror" value="{{old('end_date')}}" id="end-date" name="end_date" placeholder="Pick a date for end campaign">
                              </div>
                          </div>
                      </div>
                      @error('start_date')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      @error('end_date')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <div class="form-group">
                          <label for="status">Status :</label>
                          <input type="radio" class="form-check-input ml-1 @error('status') is-invalid @enderror" name="status" id="publish-add" value="published" checked {{ old('status') == "published" ? 'checked' : '' }}>
                          <label for="publish-add" class="form-check-label ml-4">Publish</label>
                          <input type="radio" class="form-check-input ml-1 @error('status') is-invalid @enderror" name="status" id="unpublish-add" value="unpublished" {{ old('status') == "unpublished" ? 'checked' : '' }}>
                          <label for="unpublish-add" class="form-check-label ml-4">Unpublish</label>
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
    //form image preview here
    function previewImage() {
    var file = document.getElementById("slider-image").files
    if (file.length > 0) {
        var fileReader = new FileReader()
        fileReader.onload = function (event) {
            document.getElementById("preview").setAttribute("src", event.target.result)
        }
        fileReader.readAsDataURL(file[0])
        }
    }

    //date picker
    $(document).ready(function() {
        $('.datetimepicker').datetimepicker({
            format: 'Y-m-d H:i:s', // set the format of the datetime
            step: 1 // set the time increment to 5 minutes
        });
    });



</script>
@endsection
