@extends('layout.backend')
@section('title','Ads update')
@section('content')
<div class="container-fluid">
  <div class="col-xl-10 offset-xl-1 box-margin height-card">
      <div class="card card-body">
          <h4 class="card-title">Update Ads</h4>
          <div class="row">
              <div class="col-sm-12 col-xs-12">
                  <form action="javascript:void(0)" id="landing-page-item-form" method="post" data-parsley-validate>
                      @csrf
                      <div class="form-group col-md-12">
                          <label for="title">Title :</label>
                          <input type="text" class="form-control" name="title" id="title" value="{{ $row->title }}" placeholder="Enter a Title for Ads" required>
                      </div>
                      <div class="form-group template">
                          <label>Select Template :</label>
                          <input type="radio" class="form-check-input ml-1 " name="template" id="template-1" value="grid_one" {{ $row->template == 'grid_one' ? 'checked' : ''}}>
                          <label for="template-1" class="form-check-label ml-4"><img src="{{ asset('frontend/ads/grid_one.png') }}" width="250" alt=""></label>
                          <input type="radio" class="form-check-input ml-1 " name="template" id="template-2" value="grid_two" {{ $row->template == 'grid_two' ? 'checked' : ''}}>
                          <label for="template-2" class="form-check-label ml-4"><img src="{{ asset('frontend/ads/grid_two.png') }}" width="250" alt=""></label>
                      </div>
                      <div id="template-form"></div>
                      <button type="submit" class="btn btn-primary mr-2">Update</button>
                      <button onclick="history.go(-1);" class="btn btn-danger">Back</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
<style>
    .parsley-errors-list {
        color : red;
    }
    .parsley-error {
        border: 1px solid red !important;
    }
</style>
@endsection
@section('script')
<script type="text/javascript">
    $( document ).ready(function() {
        window.Parsley.addValidator('validateimage', {
            requirementType: 'string',
            validateString: function (value, requirement, parsleyInstance) {

                let file = parsleyInstance.$element[0].files[0];
                let deferred = $.Deferred();

                if (file.size > Number(requirement) * 1000) {
                    deferred.reject();
                } else {
                    deferred.resolve();
                }
                return deferred.promise();
            },
            messages: {
                en: 'Image size must be less than %sKB'
            }
        });

        $('#landing-page-item-form').parsley().on('form:success', function() {
            submitItemForm();
        });
        $('[name="template"]').on('change', function() {
            var option = $(this).val();
            $.ajax({
                type : 'GET',
                url : "{{ route('backend.ads.loadForm', ':template') }}".replace(':template', option),
                success : function(response) {
                    $('#template-form').html(response);
                    if (window.fillFormData) {
                        window.fillFormData({!! $row->data !!});
                    }
                }
            });
        });
        $('[name="template"]:checked').change();
    });


    function imagePreview(mode, event) {
        $(event.target).parsley().whenValid({}).done(() => {
            if (mode == 'ad1') {
                var file = document.getElementById("ad1-image").files
                if (file.length > 0) {
                    var fileReader = new FileReader()
                    fileReader.onload = function (event) {
                        document.getElementById("preview1").setAttribute("src", event.target.result)
                    }
                    fileReader.readAsDataURL(file[0])
                }
            } else if (mode == 'ad2') {

                var file = document.getElementById("ad2-image").files
                if (file.length > 0) {
                    var fileReader = new FileReader()
                    fileReader.onload = function (event) {
                        document.getElementById("preview2").setAttribute("src", event.target.result)
                    }
                    fileReader.readAsDataURL(file[0])
                }
            } else {
                var file = document.getElementById("ad3-image").files
                if (file.length > 0) {
                    var fileReader = new FileReader()
                    fileReader.onload = function (event) {
                        document.getElementById("preview3").setAttribute("src", event.target.result)
                    }
                    fileReader.readAsDataURL(file[0])
                }
            }
        });
    }

    function submitItemForm() {
        let form_data = window.getAdFormData();
        form_data.append('title',$('#title').val());
        form_data.append('template',$('[name="template"]:checked').val());

        $.ajax({
             url: "{{ route('backend.ads.edit', $row->id) }}",
             type: "post",
             processData: false,
             contentType: false,
             data: form_data,
             success: function (response) {
                 if (response.status == 'success') {

                     toastr.success('Advertise updated successfully');
                 } else {
                     toastr.error(response.message);
                 }
             },
             error: function(jqXHR, textStatus, errorThrown) {
                 toastr.error('Something went wrong');
             }
         });
    }
</script>
@endsection
