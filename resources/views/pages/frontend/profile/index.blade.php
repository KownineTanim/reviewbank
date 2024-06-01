@extends('layout.frontend')
@section('title','Profile')
@push('styles')
    <!-- Profile page css linked here -->
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <!-- These plugins only need for date picker -->
    <link rel="stylesheet" href="{{ asset('css/jquery.datetimepicker.min.css') }}">
    <!-- These plugins only need for font of bio -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@0;1&display=swap" rel="stylesheet">
@endpush
@section('content')
<style>
    .avatar-upload {
      position: relative;
      max-width: 205px;
      margin: 50px auto;
    }
    .avatar-upload .avatar-edit {
        position: absolute;
        right: 0px;
        z-index: 1;
        top: -20px;
    }
    .avatar-upload .avatar-edit input {
      display: none;
    }
    .avatar-upload .avatar-edit input + label {
      display: inline-block;
      width: 34px;
      height: 34px;
      margin-bottom: 0;
      border-radius: 100%;
      background: #f1f1f1;
      border: 1px solid transparent;
      box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
      cursor: pointer;
      font-weight: normal;
      transition: all 0.2s ease-in-out;
    }
    .avatar-upload .avatar-edit input + label:hover {
        background: #FFFFFF;
    }
    .avatar-upload .avatar-edit input + label:after {
      content: "\f040";
      font-family: 'FontAwesome';
      color: #757575;
      position: absolute;
      top: 10px;
      left: 0;
      right: 0;
      text-align: center;
      margin: auto;
    }
    .avatar-upload .avatar-preview {
      width: 192px;
      position: relative;
      border-radius: 100%;
      border: 6px solid #F8F8F8;
      box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
    }
    .profile-menu {
        /* background-color: gray; */
        top: 2px !important;
        left: -38px !important;
    }
    .profile-menu-item {
        color: white;
    }
    #basic-info-bio {
        font-family: 'Playfair Display', serif;
    }
</style>
<div class="main-content">
  <!-- Top navbar -->
  <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
      <!-- Brand -->
      <a href="{{ route('home') }}">
          <img src="{{ img($settings->logo ?? '') }}" alt="Logo">
      </a>

      <!-- User -->
        @auth
            <div class="media align-items-center">
                <span class="avatar avatar-sm bg-white rounded-circle">
                    <img alt="Image placeholder" class="profile-picture-circle" src="{{ authProfilePhoto() }}">
                </span>
                <span id="top-profile-name" class="p-2 d-lg-block text-white">
                    {{ $user->first_name }} {{ $user->last_name }}
                </span>
            </div>
        @endauth
    </div>
  </nav>
  <!-- Header -->
  <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-8"></span>
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
      <div class="row">
        <div class="col-lg-7 col-md-10">
          <h1 class="display-6 text-white">Greetings <span id="profile-name">{!! $user->first_name .'&nbsp;'.$user->last_name !!}</span>,</h1>
          <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>
        </div>
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--7">
    <div class="row">
      <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
        <div class="card card-profile shadow">
          <div class="row justify-content-center avatar-upload">
              <div class="avatar-edit">
                  <input type="hidden" id="_id" value="{{ $user->id }}">
                  <input  type="file" id="profile-photo" onchange="updateProfilePhoto(event)" name="profile-photo">
                  <label for="profile-photo"></label>
              </div>
            <div class="col-lg-3 order-lg-2 avatar-preview">
              <div class="card-profile-image" id="imagePreview">
                  <img src="{{ authProfilePhoto() }}" class="rounded-circle profile-picture-circle">
              </div>
            </div>
          </div>
          <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
            <div class="d-flex justify-content-between">
                <span class="badge badge-pill badge-primary text-white p-3">Basic Info</span>
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    My profile
                  </button>
                  <div class="dropdown-menu profile-menu bg-gradient-default">
                    <a class="dropdown-item profile-menu-item" href="{{ route('home') }}">Home</a>
                    <div class="dropdown-divider"></div>
                    @if(can('Access Dashbaord'))
                    <a class="dropdown-item profile-menu-item" href="{{ route('backend.home') }}">Dashbaord</a>
                    <div class="dropdown-divider"></div>
                    @endif
                    <a class="dropdown-item profile-menu-item" href="{{ route('my.reviews') }}">My Reviews</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item profile-menu-item" id="change-password-btn" href="#">Change Password</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item profile-menu-item" href="{{ route('logout') }}">Logout</a>
                  </div>
                </div>
            </div>
          </div>
          <div class="card-body pt-0 pt-md-4">
            <div class="row">
              <div class="col">
                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                  <div>
                    <span class="heading">{{ count($user->reviews) }}</span>
                    <span class="description">Reviews</span>
                  </div>
                  <div>
                    <span class="heading">{{ count($user->active_reviews) }}</span>
                    <span class="description">Approved</span>
                  </div>
                  <div>
                    <span class="heading">89</span>
                    <span class="description">Comments</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center">
              <h3>
                <span id="basic-info-profile-name" class="font-weight-light">{{ $user->first_name }} {{ $user->last_name }}, </span><p id="basic-info-age" class="font-weight-light"> {{ $age }} years</p>
              </h3>
              <div class="h5 font-weight-300">
                <i class="ni location_pin mr-2"></i><span id="basic-info-address-post-code" class="font-weight-light">{{ $user->address }}, {{ $user->postal_code }}</span>
              </div>
              <div class="h5 mt-4">
                <i class="ni business_briefcase-24 mr-2"></i>{{ $user->email }}
              </div>
              <div>
                <i class="ni education_hat mr-2"></i><span id="basic-info-city-country" class="font-weight-light">{{ $user->city }}, {{ $user->country }}</span>
              </div>
              <hr class="my-4">
                <span class="description">Bio</span>
                <p id="basic-info-bio">{{ $user->bio }}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-8 order-xl-1">
        <div class="card bg-secondary shadow">
          <div class="card-header bg-white border-0">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0">My account</h3>
              </div>
              <div class="col-4 text-right">
                <input type="hidden" id="_id" value="{{ $user->id }}">
                <a href="javascript:void(0)" class="btn btn-primary" id="save_profile_btn">Save profile</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form>
              <h6 class="heading-small text-muted mb-4">User information</h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group focused">
                      <label class="form-control-label" for="input-username">Username</label>
                      <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Username" value="{{ $user->user_name }}">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-phone">Phone no</label>
                      <input type="email" id="input-phone" class="form-control form-control-alternative" value = "{{ $user->mobile_primary }}">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group focused">
                      <label class="form-control-label" for="input-first-name">First name</label>
                      <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="First name" value="{{ $user->first_name }}">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group focused">
                      <label class="form-control-label" for="input-last-name">Last name</label>
                      <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" value="{{ $user->last_name }}">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                        <label for="birth-date">Date of birth :</label>
                        <input type="text" class="form-control" id="birth-date" name="birth_date" placeholder="Pick your birth date" value = "{{ $user->dob }}" >
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group mt-5">
                      <label class="form-control-label">Gender</label>
                      <input type="radio" class="form-check-input ml-1" name="gender" id="male" value="male" {{ $user->gender == 'male' ? 'checked' : ''}}>
                      <label for="male" class="form-check-label ml-4">Male</label>
                      <input type="radio" class="form-check-input ml-1" name="gender" id="female" value="female" {{ $user->gender == 'female' ? 'checked' : ''}}>
                      <label for="female" class="form-check-label ml-4">Female</label>
                      <input type="radio" class="form-check-input ml-1" name="gender" id="others" value="others" {{ $user->gender == 'others' ? 'checked' : ''}}>
                      <label for="other" class="form-check-label ml-4">Other</label>
                    </div>
                  </div>
                </div>
              </div>
              <hr class="my-4">
              <!-- Address -->
              <h6 class="heading-small text-muted mb-4">Contact information</h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group focused">
                      <label class="form-control-label" for="input-address">Address</label>
                      <input id="input-address" class="form-control form-control-alternative" placeholder="Home Address" value="{{ $user->address }}" type="text">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-group focused">
                      <label class="form-control-label" for="input-city">City</label>
                      <input type="text" id="input-city" class="form-control form-control-alternative" placeholder="City" value="{{ $user->city }}">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group focused">
                      <label class="form-control-label" for="input-country">Country</label>
                      <input type="text" id="input-country" class="form-control form-control-alternative" placeholder="Country" value="{{ $user->country }}">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label" for="input-postal-code">Postal code</label>
                      <input type="number" id="input-postal-code" class="form-control form-control-alternative" placeholder="Post-code" value="{{ $user->postal_code }}" >
                    </div>
                  </div>
                </div>
              </div>
              <hr class="my-4">
              <!-- Description -->
              <h6 class="heading-small text-muted mb-4">About me</h6>
              <div class="pl-lg-4">
                <div class="form-group focused">
                  <label>Bio</label>
                  <textarea rows="2" id="input-bio" class="form-control form-control-alternative" maxlength="255" placeholder="A few words about you ...">{{ $user->bio }}</textarea>
                  <span class="float-right" id="count" style="position: relative; top: -22px; right: 15px;"></span>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Change password modal here -->
<div class="modal fade" id="change-password-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Want to change password ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body  text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-control-label float-left" for="previous-password">Current password :</label>
                            <input id="previous-password" type="password" class="form-control mb-3" placeholder="Type previous password">
                            <label class="form-control-label float-left" for="input-postal-code">New password :</label>
                            <input id="new-password" type="password" class="form-control mb-3" placeholder="Type previous password">
                            <label class="form-control-label float-left" for="input-postal-code">Confirm code : </label>
                            <input id="confirm-password" type="password" class="form-control mb-3" placeholder="Type previous password">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                    <button  id="password-change-confirm-btn" type="button" class="btn  btn-sm  btn-primary">Proceed</button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- =========================
CopyRight
============================== -->
@include('include.frontend.copyright')
@endsection
@section('script')
    <!-- These plugins only need for datepicker -->
    <script type="text/javascript" src="{{ asset('js/jquery.datetimepicker.full.min.js') }}"></script>
    <script type="text/javascript">
        //date picker
        $(document).ready(function() {
            $('#birth-date').datetimepicker({
                format: 'Y-m-d', // set the format of the datetime
                timepicker: false,
            });
        });

        $('#change-password-btn').click(function() {
            $('#change-password-modal').modal('show');
        });

        const message = document.getElementById('input-bio');
        const count = document.getElementById('count');

        message.addEventListener('input', function() {
            const messageLength = message.value.length;
            count.innerText = `${messageLength}/255`;

            if (messageLength > 255) {
                message.value = message.value.slice(0, 255);
                count.innerText = '255/255';
            }
        });

        $(document).on('click', '#save_profile_btn', function() {
            var id = $('#_id').val();
            var user_name = $('#input-username').val();
            var mobile_primary = $('#input-phone').val();
            var first_name = $('#input-first-name').val();
            var last_name = $('#input-last-name').val();
            var dob = $('#birth-date').val();
            var gender = $('[name="gender"]:checked').val();
            var address = $('#input-address').val();
            var city = $('#input-city').val();
            var country = $('#input-country').val();
            var postal_code = $('#input-postal-code').val();
            var bio = $('#input-bio').val();

            let formData = new FormData();
            formData.append('id', id);
            formData.append('first_name', first_name);
            formData.append('last_name', last_name);
            formData.append('user_name', user_name);
            formData.append('address', address);
            formData.append('city', city);
            formData.append('country', country);
            formData.append('postal_code', postal_code);
            formData.append('bio', bio);
            formData.append('dob', dob);
            formData.append('gender', gender);
            formData.append('mobile_primary', mobile_primary);
            formData.append('_token', "{{ csrf_token() }}");

            $.ajax({
                 url: "{{ route('update.profile') }}",
                 type: "post",
                 processData: false,
                 contentType: false,
                 data: formData,
                 success: function (response) {
                     if (response.status == 'success') {
                         toastr.success('User data updated successfully');
                         $("#profile-name").html(response.user.first_name.concat('&nbsp', response.user.last_name));
                         $("#top-profile-name").html(response.user.first_name.concat(" ", response.user.last_name));
                         $("#basic-info-profile-name").html(response.user.first_name.concat(" ", response.user.last_name));
                         $("#basic-info-age").html(response.age);
                         $("#basic-info-address-post-code").html(response.user.address.concat(', ',response.user.postal_code ));
                         $("#basic-info-city-country").html(response.user.city.concat(', ',response.user.country ));
                         $("#basic-info-bio").html(response.user.bio);
                     } else {
                         toastr.error(response.message);
                     }
                 },
                 error: function(jqXHR, textStatus, errorThrown) {
                     toastr.error('Something went wrong');
                    // console.log(textStatus, errorThrown);
                 }
             });

        });

        function updateProfilePhoto(event) {
            var id = $('#_id').val();
            let file = event.target.files[0];

            if (!file) {
                return;
            }
            let formData = new FormData();
            formData.append('_token', "{{ csrf_token() }}");
            formData.append('profile_photo', file);

            $.ajax({
                 url: '{{ route("update.picture", ":id") }}'.replace(':id', id),
                 type: "post",
                 processData: false,
                 contentType: false,
                 data: formData,
                 success: function (response) {
                     if (response.status == 'success') {
                         toastr.success('Profile picture updated');
                         $('.profile-picture-circle').attr('src', response.image);
                     } else {
                         toastr.error(response.message);
                     }
                 },
                 error: function(jqXHR, textStatus, errorThrown) {
                     toastr.error('Something went wrong');
                    // console.log(textStatus, errorThrown);
                 }
             });
        }

        $(document).on('click', '#password-change-confirm-btn', function() {

            var previous_password = $('#previous-password').val();
            var new_password = $('#new-password').val();
            var confirm_password = $('#confirm-password').val();

            if ( new_password == confirm_password )
            {
                let formData = new FormData();
                formData.append('previous_password', previous_password);
                formData.append('new_password', new_password);
                formData.append('confirm_password', confirm_password);
                formData.append('_token', "{{ csrf_token() }}");

                $.ajax({
                     url: "{{ route('change.password') }}",
                     type: "post",
                     processData: false,
                     contentType: false,
                     data: formData,
                     success: function (response) {
                         if (response.status == 'success') {
                             $('#change-password-modal').modal('hide');
                             toastr.success('Password changeed successfully');
                         } else {
                             toastr.error(response.message);
                         }
                     },
                     error: function(jqXHR, textStatus, errorThrown) {
                         toastr.error('Something went wrong');
                        // console.log(textStatus, errorThrown);
                     }
                 });
            } else {
                toastr.error("New password & Confirm password doesn't match");
            }
        });
    </script>
@endsection
