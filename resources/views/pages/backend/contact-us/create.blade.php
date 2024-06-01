@extends('layout.backend')
@section('title','Contact-us')
@section('content')
<div class="container-fluid">
  <div class="col-xl-10 offset-xl-1 box-margin height-card">
      <div class="card card-body">
          <h4 class="card-title">Update Contact-us Data</h4>
          <div class="row">
              <div class="col-sm-12 col-xs-12">
                  <form action="{{ route('backend.contact-us.create') }}" method="post">
                      @if(session()->has('success'))
                        <p class="alert alert-primary">{{ session()->pull('success') }}</p>
                      @endif
                      @csrf
                      <div class="form-group">
                          <label for="address">Address :</label>
                          <input type="text" value="{{ $contactUs->address }}" class="form-control @error('address') is-invalid @enderror" name="address" id="address" placeholder="Enter address  Here" >
                      </div>
                      @error('address')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <div class="form-group">
                          <label for="city">City :</label>
                          <input type="text" value="{{ $contactUs->city }}" class="form-control @error('city') is-invalid @enderror" name="city" id="city" placeholder="Enter city  Here" >
                      </div>
                      @error('city')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <div class="form-group">
                          <label for="country">Country :</label>
                          <input type="text" value="{{ $contactUs->country }}" class="form-control @error('country') is-invalid @enderror" name="country" id="country" placeholder="Enter city  Here" >
                      </div>
                      @error('country')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <div class="form-group">
                          <label for="phone">Phone :</label>
                          <input type="text" value="{{ $contactUs->phone }}" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="Enter phone no  Here" >
                      </div>
                      @error('phone')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <div class="form-group">
                          <label for="phone-optional">Phone (optional) :</label>
                          <input type="text" value="{{ $contactUs->phone_optional }}" class="form-control @error('phone_optional') is-invalid @enderror" name="phone_optional" id="phone-optional" placeholder="Enter optional phone no  Here" >
                      </div>
                      @error('phone_optional')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <div class="form-group">
                          <label for="phone">Email :</label>
                          <input type="text" value="{{ $contactUs->email }}" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Enter email id  Here" >
                      </div>
                      @error('email')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <div class="form-group">
                          <label for="email-optional">Email (optional) :</label>
                          <input type="text" value="{{ $contactUs->email_optional }}" class="form-control @error('email_optional') is-invalid @enderror" name="email_optional" id="email-optional" placeholder="Enter email id  Here" >
                      </div>
                      @error('email_optional')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <div class="form-group">
                          <label for="latitude">Latitude :</label>
                          <input type="number" value="{{ $contactUs->latitude }}" class="form-control @error('latitude') is-invalid @enderror" id="latitude" name="latitude" step="0.0000001">
                      </div>
                      @error('latitude')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <div class="form-group">
                          <label for="longitude">Latitude :</label>
                          <input type="number" value="{{ $contactUs->longitude }}" class="form-control @error('longitude') is-invalid @enderror" id="longitude" name="longitude" step="0.0000001">
                      </div>
                      @error('longitude')
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
