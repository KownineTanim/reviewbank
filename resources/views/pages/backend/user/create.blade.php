@extends('layout.backend')
@section('title','Add User')
@section('content')
<div class="container-fluid">
  <div class="col-xl-10 offset-xl-1 box-margin height-card">
      <div class="card card-body">
          <h4 class="card-title">Add User</h4>
          <div class="row">
              <div class="col-sm-12 col-xs-12">
                  <form action="{{ route('backend.user.create') }}" method="post">
                      @csrf
                      <div class="form-group">
                          <label for="name">First Name :</label>
                          <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{old('first_name')}}" id="first-name" placeholder="Type First Name">
                      </div>
                      @error('first_name')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <div class="form-group">
                          <label for="name">Last Name :</label>
                          <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{old('last_name')}}" id="last-name" placeholder="Type Last Name">
                      </div>
                      @error('last_name')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <div class="form-group">
                          <label for="name">Email :</label>
                          <input type="email" class="form-control @error('user_email') is-invalid @enderror" name="user_email" value="{{old('user_email')}}" id="user-email" placeholder="Type Email">
                      </div>
                      @error('user_email')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <div class="form-group">
                          <label for="name">Password :</label>
                          <input type="password" class="form-control @error('user_password') is-invalid @enderror" name="user_password" value="{{old('user_password')}}" id="user-password" placeholder="Type Password">
                      </div>
                      @error('user_password')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <div class="form-group">
                          <label for="category">Select Role :</label>
                          <select class="form-control @error('role') is-invalid @enderror" name="role" id="role"  aria-label=".form-select-lg example">
                              <option value="0" selected>Select Role</option>
                              @foreach($roles as $role)
                                <option value="{{ $role->id }}" @if (old('role') == $role->id)  selected  @endif>{{ $role->name }}</option>
                              @endforeach
                          </select>
                      </div>
                      @error('role')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror

                      <div class="form-group">
                          <label for="status">Status :</label>
                          <input type="radio" class="form-check-input ml-1 @error('status') is-invalid @enderror" name="status" id="active" value="active">
                          <label for="active" class="form-check-label ml-4">Active</label>
                          <input type="radio" class="form-check-input ml-1 @error('status') is-invalid @enderror" name="status" id="inactive" value="inactive">
                          <label for="inactive" class="form-check-label ml-4">Inactive</label>
                      </div>
                      @error('status')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <button type="submit" class="btn btn-primary mr-2">Save</button>
                      <button onclick="history.go(-1);"  class="btn btn-danger">Back</button>
                  </form>
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
