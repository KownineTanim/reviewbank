@extends('layout.frontend')
@section('title','Contact us')
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
    Contact from Section
============================== -->
<section id="contact-us">
    <div class="container">
        <div class="row">
            <div class="col-12 p0">
                <div class="page-location">
                    <ul>
                        <li><a href="{{ route('home') }}">
                            Home<span class="divider">/</span>
                        </a></li>
                        <li><a class="page-location-active" href="{{ route('contact-us.index') }}">
                            Contact Us
                            <span class="divider">/</span>
                        </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="contact-us-content">
            <div class="row">
                <div class="col-md-12">
                    <div id="map"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-9 col-xl-9">
                    <div class="contact-from">
                        <div class="contact-description">
                            <h4 class="contact-description-title">Have a query ?</h4>
                            <p class="contact-description-content">Your email address will not be published. Required fields are marked *</p>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="contact-name" class="col-form-label">Name *</label>
                                <input type="text" class="form-control" id="contact-name" name="contact_name" placeholder="Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="contact-email" class="col-form-label">Email *</label>
                                <input type="email" class="form-control" id="contact-email" name="contact_email" placeholder="Email">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="contact-message" class="col-form-label">Your Message *</label>
                                <textarea class="form-control" id="contact-message" name="contact_message"></textarea>
                                <span class="float-right" id="count" style="position: relative; top: -25px; right: 13px;"></span>
                            </div>
                        </div>
                        <button type="submit" id="contact-msg-submit-btn" class="btn btn-primary wd-contact-btn">Submit</button>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 col-xl-3">
                    <div class="contact-address-area">
                        <h4 class="contact-address-title">Address</h4>
                        <p class="contact-address-content">Your email address will not be published.
                        Required fields are marked *</p>
                        <div class="contact-address">
                            <div class="media radius-icon-area">
                                <div class="radius-icon">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                </div>
                                <div class="media-body radius-content">
                                    {{ $contactUs->address }}, {{ $contactUs->city }}</br>
                                    {{ $contactUs->country }}
                                </div>
                            </div>
                            <div class="media radius-icon-area">
                                <div class="radius-icon">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                </div>
                                <div class="media-body radius-content">
                                    <p><a href="tel:{{ $contactUs->phone }}">{{ $contactUs->phone }}</a></p>
                                    <p><a href="tel:{{ $contactUs->phone_optional }}">{{ $contactUs->phone_optional }}</a></p>
                                </div>
                            </div>
                            <div class="media radius-icon-area">
                                <div class="radius-icon">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </div>
                                <div class="media-body radius-content">
                                    <p><a href="mailto:{{ $contactUs->email }}">{{ $contactUs->email }}</a></p>
                                    <p><a href="mailto:{{ $contactUs->email_optional }}">{{ $contactUs->email_optional }}</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
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
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmzsVKw7vAfVti9uhVHCuxrUMUEFVH4Ng"></script>
<script type="text/javascript">
// When the window has finished loading create our google map below
 google.maps.event.addDomListener(window, 'load', init);

 function init() {
     // Basic options for a simple Google Map
     // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
     var mapOptions = {
         // How zoomed in you want the map to start at (always required)
         zoom: 18,
         scrollwheel: false,

         // The latitude and longitude to center the map (always required)
         center: new google.maps.LatLng({{ $contactUs->latitude }},  {{ $contactUs->longitude }}), // New York

         // How you would like to style the map.
         // This is where you would paste any style found on Snazzy Maps.
         styles: [{ "featureType": "administrative", "elementType": "labels.text.fill", "stylers": [{ "color": "#444444" }] }, { "featureType": "administrative.locality", "elementType": "labels.text", "stylers": [{ "visibility": "on" }] }, { "featureType": "administrative.neighborhood", "elementType": "labels.text", "stylers": [{ "visibility": "off" }] }, { "featureType": "landscape", "elementType": "all", "stylers": [{ "color": "#e1e1e1" }, { "saturation": "0" }] }, { "featureType": "poi", "elementType": "geometry.fill", "stylers": [{ "color": "#d1d1d1" }] }, { "featureType": "poi.attraction", "elementType": "geometry.fill", "stylers": [{ "visibility": "off" }, { "color": "#d1d1d1" }] }, { "featureType": "poi.attraction", "elementType": "labels.text", "stylers": [{ "visibility": "on" }] }, { "featureType": "poi.business", "elementType": "geometry.fill", "stylers": [{ "saturation": "-3" }, { "lightness": "-4" }, { "gamma": "4.82" }, { "weight": "1.39" }, { "visibility": "off" }] }, { "featureType": "poi.business", "elementType": "labels.text", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi.business", "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi.government", "elementType": "geometry.fill", "stylers": [{ "color": "#d1d1d1" }, { "visibility": "off" }] }, { "featureType": "poi.medical", "elementType": "geometry.fill", "stylers": [{ "visibility": "off" }, { "color": "#d1d1d1" }] }, { "featureType": "poi.park", "elementType": "geometry.fill", "stylers": [{ "visibility": "on" }, { "color": "#ebebeb" }] }, { "featureType": "poi.park", "elementType": "labels", "stylers": [{ "visibility": "on" }] }, { "featureType": "poi.place_of_worship", "elementType": "geometry.fill", "stylers": [{ "visibility": "on" }, { "color": "#d1d1d1" }] }, { "featureType": "poi.school", "elementType": "geometry.fill", "stylers": [{ "color": "#d1d1d1" }, { "visibility": "off" }] }, { "featureType": "poi.sports_complex", "elementType": "geometry.fill", "stylers": [{ "visibility": "on" }, { "color": "#d1d1d1" }] }, { "featureType": "road", "elementType": "all", "stylers": [{ "saturation": -100 }, { "lightness": 45 }] }, { "featureType": "road", "elementType": "labels.text.fill", "stylers": [{ "color": "#333333" }] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{ "color": "#ffffff" }, { "visibility": "on" }] }, { "featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{ "visibility": "off" }] }, { "featureType": "road.highway", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "road.arterial", "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "road.local", "elementType": "geometry.fill", "stylers": [{ "saturation": "6" }, { "hue": "#ff0000" }, { "visibility": "on" }] }, { "featureType": "transit", "elementType": "all", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit", "elementType": "labels", "stylers": [{ "visibility": "on" }] }, { "featureType": "transit", "elementType": "labels.text.fill", "stylers": [{ "color": "#333333" }] }, { "featureType": "water", "elementType": "all", "stylers": [{ "color": "#00667d" }, { "visibility": "on" }] }, { "featureType": "water", "elementType": "geometry.fill", "stylers": [{ "color": "#cecece" }] }, { "featureType": "water", "elementType": "labels.text.fill", "stylers": [{ "color": "#ffffff" }] }, { "featureType": "water", "elementType": "labels.text.stroke", "stylers": [{ "visibility": "off" }] }]
     };

     // Get the HTML DOM element that will contain your map
     // We are using a div with id="map" seen below in the <body>
     var mapElement = document.getElementById('map');

     // Create the Google Map using our element and options defined above
     var map = new google.maps.Map(mapElement, mapOptions);

     // Let's also add a marker while we're at it
     var marker = new google.maps.Marker({
         position: new google.maps.LatLng({{ $contactUs->latitude }},  {{ $contactUs->longitude }}),
         map: map,
         title: 'Wd It Solution',
         icon: 'img/marker.png'
     });
 }
</script>
<script type="text/javascript">

    const message = document.getElementById('contact-message');
    const count = document.getElementById('count');

    message.addEventListener('input', function() {
        const messageLength = message.value.length;
        count.innerText = `${messageLength}/255`;

        if (messageLength > 255) {
            message.value = message.value.slice(0, 255);
            count.innerText = '255/255';
        }
    });

    $("#contact-msg-submit-btn").click(function(){
        var name = $('#contact-name').val();
        var email = $('#contact-email').val();
        var message = $('#contact-message').val();

        $.ajax({
             url: "{{ route('contact-us.store-msg') }}",
             type: "post",
             data: {
                 name,
                 email,
                 message,
                 _token : "{{ csrf_token() }}"
             } ,
             success: function (response) {
                 if (response.status == 'success') {
                     $('#contact-name').val('');
                     $('#contact-email').val('');
                     $('#contact-message').val('');
                     toastr.success('Dear ' + response.contactMessage + ' message sent successfully');
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
</script>
@endsection
