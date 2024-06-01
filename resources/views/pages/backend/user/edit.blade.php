@extends('layout.backend')
@section('title','User update')
@section('content')
<div class="container-fluid">
  <div class="col-xl-10 offset-xl-1 box-margin height-card">
      <div class="card card-body">
          <h4 class="card-title">Update User</h4>
          <div class="row">
              <div class="col-sm-12 col-xs-12">
                  <form action="{{ route('backend.user.edit', $user->id) }}" method="post">
                      @foreach($errors->all() as $message)
                        <p class="alert alert-danger"> {{ $message }}</p>
                      @endforeach
                      @if(session()->has('success'))
                        <p class="alert alert-primary">{{ session()->pull('success') }}</p>
                      @endif
                      @csrf
                      <div class="form-group">
                          <label for="name">First Name :</label>
                          <input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}" id="first-name" placeholder="Type First Name">
                      </div>
                      <div class="form-group">
                          <label for="name">Last Name :</label>
                          <input type="text" class="form-control " name="last_name" value="{{ $user->last_name }}" id="last-name" placeholder="Type Last Name">
                      </div>
                      <div class="form-group">
                          <label for="name">Email :</label>
                          <input type="email" class="form-control " name="user_email" value="{{ $user->email }}" id="user-email" placeholder="Type Email">
                      </div>
                      <div class="form-group">
                          <label for="name">Password :</label>
                          <input type="password" class="form-control " name="user_password" value="" id="user-password" placeholder="Type Password">
                      </div>
                      <div class="form-group">
                          <label for="category">Select Role :</label>
                          <select class="form-control" name="role" id="role"  aria-label=".form-select-lg example">
                              <option value="{{ $user->active_role_id }}" selected> {{ $user->role->name }} </option>
                              <option value="0" >Select Role</option>
                              @foreach($roles as $role)
                                <option value="{{ $role->id }}" >{{ $role->name }}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="status">Status :</label>
                          <input type="radio" class="form-check-input ml-1" name="status" id="active" value="active" {{ $user->status == 'active' ? 'checked' : ''}}>
                          <label for="active" class="form-check-label ml-4">Active</label>
                          <input type="radio" class="form-check-input ml-1" name="status" id="inactive" value="inactive" {{ $user->status == 'inactive' ? 'checked' : ''}}>
                          <label for="inactive" class="form-check-label ml-4">Inactive</label>
                      </div>
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

</script>
@endsection
