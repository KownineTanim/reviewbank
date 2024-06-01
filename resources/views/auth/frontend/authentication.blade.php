<div class="modal fade bd-example-modal-lg2" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="container">
                <div class="row text-left">
                    <div class="col-md-12 p0">

                        <div class="modal-tab-section wd-modal-tabs">
                            <ul class="nav nav-tabs wd-modal-tab-menu text-center" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-expanded="true">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="sign-up-tab" data-toggle="tab" href="#sign-up" role="tab" aria-controls="sign-up">Sign up</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">

                                <div class="row">
                                    <div class="col-md-6 p0 brand-description-area">
                                        <img src="{{ img($settings->login_image ?? '') }}" class="img-fluid" alt="">
                                        <div class="brand-description">
                                            <div class="brand-logo">
                                                <img src="{{ img($settings->logo ?? '') }}" alt="Logo">
                                            </div>
                                            <div class="modal-description">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod teoccaecvoluptatem.</p>
                                            </div>
                                            <ul class="list-unstyled">
                                                <li class="media">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                    <div class="media-body">
                                                        {{ $settings->login_quote  ?? ''}}
                                                    </div>
                                                </li>
                                                <li class="media my-4">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                    <div class="media-body">
                                                        Lorem ipsum dolor sit amet, consecadipisicing
                                                        elit, sed do eiusmod teoccaecvoluptatem.
                                                    </div>
                                                </li>
                                                <li class="media">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                    <div class="media-body">
                                                        Lorem ipsum dolor sit amet, consecadipisicing
                                                        elit, sed do eiusmod teoccaecvoluptatem.
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-6 p0">
                                        <div class="login-section text-center">
                                            <div class="social-media">
                                                <div class="text-center">
                                                    <div id="g_id_onload"
                                                         data-client_id="749040693263-33p0g7gd84fgju5rgob68vdpa36unv79.apps.googleusercontent.com"
                                                         data-context="signin"
                                                         data-ux_mode="redirect"
                                                         data-login_uri="http://localhost:8000/webhook/google/signin"
                                                         data-itp_support="true">
                                                    </div>

                                                    <div class="g_id_signin"
                                                         data-type="standard"
                                                         data-shape="pill"
                                                         data-theme="filled_blue"
                                                         data-text="signin_with"
                                                         data-size="large"
                                                         data-logo_alignment="left">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="login-form text-left">
                                                <form action="javascript:void(0)" method="post">
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="text" class="form-control" id="email" placeholder="Golam Mojahed |">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password">Password</label>
                                                        <input type="password" class="form-control" id="password" placeholder="*** *** ***">
                                                    </div>
                                                    <button type="submit" onclick="submitLoginForm()" class="btn btn-primary wd-login-btn">LOGIN</button>

                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" id="remember" name="remember" class="form-check-input">
                                                            Remember Me
                                                        </label>
                                                    </div>

                                                    <div class="wd-policy">
                                                        <p>
                                                            By Continuing. I conferm that i have read and userstand the <a href="{{ $settings->terms_of_uses  ?? ''}}" target="_blank">terms of uses</a> and <a href="{{ $settings->privacy_policy_link  ?? ''}}" target="_blank">Privacy Policy</a>.
                                                        </p>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                </div>
                                <div class="tab-pane fade" id="sign-up" role="tabpanel" aria-labelledby="sign-up-tab">

                                <div class="row">
                                    <div class="col-md-6 p0 brand-login-section">
                                        <img src="{{ img($settings->signup_image ?? '') }}" class="img-fluid" alt="">
                                        <div class="brand-description">
                                            <div class="brand-logo">
                                                <img src="{{ img($settings->logo  ?? '') }}" alt="Logo">
                                            </div>
                                            <div class="modal-description">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod teoccaecvoluptatem.</p>
                                            </div>
                                            <ul class="list-unstyled">
                                                <li class="media">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                    <div class="media-body">
                                                        Lorem ipsum dolor sit amet, consecadipisicing
                                                        elit, sed do eiusmod teoccaecvoluptatem.
                                                    </div>
                                                </li>
                                                <li class="media my-4">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                    <div class="media-body">
                                                        {{ $settings->signup_quote  ?? ''}}
                                                    </div>
                                                </li>
                                                <li class="media">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                    <div class="media-body">
                                                        Lorem ipsum dolor sit amet, consecadipisicing
                                                        elit, sed do eiusmod teoccaecvoluptatem.
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p0">
                                        <div class="sign-up-section text-center">
                                            <div class="login-form text-left">
                                                    <div class="form-group">
                                                        <label for="exampleInputname2-sign-up">Name</label>
                                                        <input type="text" class="form-control" id="signup-name" placeholder="Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmailsign-up">Email</label>
                                                        <input type="text" class="form-control" id="signup-email" placeholder="Enter you email ...">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPasswordsign-up">Password</label>
                                                        <input type="password" class="form-control" id="signup-password" placeholder="*** *** ***">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPasswordsign-up">Confirm Password</label>
                                                        <input type="password" class="form-control" id="signup-confirmation" placeholder="*** *** ***">
                                                    </div>
                                                    <button type="submit" onclick="submitSignupForm()" class="btn btn-primary wd-login-btn">Sign Up</button>

                                                    <div class="wd-policy">
                                                        <p>
                                                            By Continuing. I conferm that i have read and userstand the <a href="{{ $settings->terms_of_uses  ?? ''}}" target="_blank">terms of uses</a> and <a href="{{ $settings->privacy_policy_link  ?? ''}}" target="_blank">Privacy Policy</a>.
                                                        </p>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    function submitLoginForm() {
        let email = $('#email').val();
        let password = $('#password').val();
        let form_data = new FormData();
        form_data.append('_token',"{{ csrf_token() ?? '' }}");
        form_data.append('email', email);
        form_data.append('password', password);
        form_data.append('remember', $('#remember').is(':checked') ? 'true' : 'false');

        $.ajax({
             url: "{{ route('user.login') }}",
             type: "post",
             processData: false,
             contentType: false,
             data : form_data,
             success: function (response) {
                 if (response.status == 'success') {
                     toastr.success(response.message);

                     setTimeout(() => {
                         window.location.href += '';
                     }, 5000);
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
    function submitSignupForm() {
        let name = $('#signup-name').val();
        let email = $('#signup-email').val();
        let password = $('#signup-password').val();
        let confirmed = $('#signup-confirmation').val()
        let form_data = new FormData();
        form_data.append('_token',"{{ csrf_token() ?? '' }}");
        form_data.append('name', name);
        form_data.append('email', email);
        form_data.append('password', password);
        form_data.append('confirmed', confirmed);

        $.ajax({
             url: "{{ route('user.registration') }}",
             type: "post",
             processData: false,
             contentType: false,
             data : form_data,
             success: function (response) {
                 if (response.status == 'success') {
                     toastr.success(response.message);

                     setTimeout(() => {
                         window.location.href += "";
                     }, 5000);
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
</script>
