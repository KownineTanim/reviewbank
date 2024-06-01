@extends('layout.backend')
@section('title','General-settings')
@section('content')
<div class="container-fluid">
  <div class="col-xl-10 offset-xl-1 box-margin height-card">
      <div class="card card-body">
          <h4 class="card-title">Update General-settings Data</h4>
          <div class="row">
              <div class="col-sm-12 col-xs-12">
                  <form action="javascript:void(0)" id="setting-submission" method="post" enctype="multipart/form-data" data-parsley-validate>
                      @csrf
                      <div class="form-group">
                          <label for="quote">Quote :</label>
                          <input type="text" value="{{ $settings->quote ?? '' }}" class="form-control" name="quote" id="quote" placeholder="Enter Quote  Here" required>
                      </div>
                      <div class="form-group mt-4 bg-primary">
                          <input required data-parsley-validateimage="1024" type="file" name="logo" id="logo" class="custom-input-file custom-input-file--2" onchange="previewLogo()"/>
                          <label for="logo">
                              <i class="fa fa-upload warning"></i>
                              <span class="warning">Logo Upload…</span>
                          </label>
                      </div>
                      <p style="color:black;"><b>Recomended image size height 50px and width 139px</b></p>
                      <img id="preview-logo" src="{{ img($settings->logo ?? '' ) }}" class="rounded mx-auto d-block" width="150">
                      <div class="form-group col-md-12">
                          <label for="fb-page-link">Facebook page link :</label>
                          <input type="url" class="form-control" name="fb_page_link" id="fb-page-link" value="{{ $settings->fb_page_link ?? '' }}" placeholder="Enter Fb page link" required>
                      </div>
                      <div class="form-group col-md-12">
                          <label for="fb-page-link">Youtube page link :</label>
                          <input type="url" class="form-control" name="yt_page_link" id="yt-page-link" value="{{ $settings->yt_page_link ?? '' }}" placeholder="Enter Yt page link" required>
                      </div>
                      <div class="form-group mt-4 bg-primary">
                          <input required data-parsley-validateimage="1024" type="file" name="login_image" id="login-image" class="custom-input-file custom-input-file--2" onchange="previewLogin()"/>
                          <label for="login-image">
                              <i class="fa fa-upload warning"></i>
                              <span class="warning">Login Background Image Upload…</span>
                          </label>
                      </div>
                      <img id="preview-login-background" src="{{ img($settings->login_image ?? '' ) }}" alt="No logo Provided" class="rounded mx-auto d-block" width="150">
                      <p style="color:black;"><b>Recomended image size height 600px and width 422px</b></p>
                      <div class="form-group">
                          <label for="login-quote">Login Quote :</label>
                          <textarea id="login-quote" name="login_quote" rows="4" cols="154" required>{{ $settings->login_quote ?? '' }}</textarea>
                      </div>
                      <div class="form-group mt-4 bg-primary">
                          <input required data-parsley-validateimage="1024" type="file" name="signup_image" id="signup-image" class="custom-input-file custom-input-file--2" onchange="previewSignup()"/>
                          <label for="signup-image">
                              <i class="fa fa-upload warning"></i>
                              <span class="warning">Signup Background Image Upload…</span>
                          </label>
                      </div>
                      <img id="preview-signup-background" src="{{ img($settings->signup_image ?? '' ) }}" class="rounded mx-auto d-block" width="150">
                      <p style="color:black;"><b>Recomended image size height 600px and width 422px</b></p>
                      <div class="form-group">
                          <label for="signup-quote">Signup Quote :</label>
                          <textarea id="signup-quote" name="signup_quote" rows="4" cols="154" required>{{ $settings->signup_quote ?? '' }}</textarea>
                      </div>
                      <div class="form-group">
                          <label for="terms-of-uses">Terms of Uses Link :</label>
                          <input type="url" class="form-control" name="terms_of_uses" id="terms-of-uses" value="{{ $settings->terms_of_uses ?? '' }}" placeholder="Enter Terms of Uses Link" required>
                      </div>
                      <div class="form-group">
                          <label for="privacy-policy-link">Privacy Policy Link :</label>
                          <input type="url" class="form-control" name="privacy_policy_link" id="privacy-policy-link" value="{{ $settings->privacy_policy_link ?? '' }}" placeholder="Enter Privacy Policy Link" required>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Save</button>
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
    .warning {
        color : white;
    }
</style>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
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

        $('#setting-submission').parsley().on('form:success', function() {
            submitSettingsForm();
        });
    });

    function previewLogo() {
        var file = document.getElementById("logo").files
        if (file.length > 0) {
            var fileReader = new FileReader()
            fileReader.onload = function (event) {
                document.getElementById("preview-logo").setAttribute("src", event.target.result)
            }
            fileReader.readAsDataURL(file[0])
        }
    }

    function previewLogin() {
        var file = document.getElementById("login-image").files
        if (file.length > 0) {
            var fileReader = new FileReader()
            fileReader.onload = function (event) {
                document.getElementById("preview-login-background").setAttribute("src", event.target.result)
            }
            fileReader.readAsDataURL(file[0])
        }
    }

    function previewSignup() {
        var file = document.getElementById("signup-image").files
        if (file.length > 0) {
            var fileReader = new FileReader()
            fileReader.onload = function (event) {
                document.getElementById("preview-signup-background").setAttribute("src", event.target.result)
            }
            fileReader.readAsDataURL(file[0])
        }
    }

    function submitSettingsForm() {
        let quote = $('#quote').val();
        let logo = $('#logo').prop('files')[0];
        let fb_page_link = $('#fb-page-link').val();
        let yt_page_link = $('#yt-page-link').val();
        let login_image = $('#login-image').prop('files')[0];
        let login_quote = $('#login-quote').val();
        let signup_image = $('#signup-image').prop('files')[0];
        let signup_quote = $('#signup-quote').val();
        let terms_of_uses = $('#terms-of-uses').val();
        let privacy_policy_link = $('#privacy-policy-link').val();
        let form_data = new FormData();
        form_data.append('_token',"{{ csrf_token() ?? '' }}");
        form_data.append('settings_data[quote]',quote);
        form_data.append('settings_data[fb_page_link]',fb_page_link);
        form_data.append('settings_data[yt_page_link]',yt_page_link);
        form_data.append('settings_data[login_quote]',login_quote);
        form_data.append('settings_data[signup_quote]',signup_quote);
        form_data.append('settings_data[terms_of_uses]',terms_of_uses);
        form_data.append('settings_data[privacy_policy_link]',privacy_policy_link);

        if (logo) {
            form_data.append('settings_data[images][logo]',logo);
        }
        if (login_image) {
            form_data.append('settings_data[images][login_image]',login_image);
        }
        if (signup_image) {
            form_data.append('settings_data[images][signup_image]',signup_image);
        }

        $.ajax({
             url: "{{ route('backend.general-settings.create') ?? '' }}",
             type: "post",
             processData: false,
             contentType: false,
             data : form_data,
             success: function (response) {
                 if (response.status == 'success') {
                     toastr.success('General settings data added successfully');
                 } else {
                     toastr.error('General settings data add failed');
                 }
             },
             error: function(jqXHR, textStatus, errorThrown) {
                 toastr.error('Something went wrong');
                // console.log(textStatus, errorThrown);
             }
         });
    }

</script>
@endsection
