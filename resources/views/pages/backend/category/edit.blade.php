@extends('layout.backend')
@section('title','Category update')
@section('content')
<div class="container-fluid">
  <div class="col-xl-10 offset-xl-1 box-margin height-card">
      <div class="card card-body">
          <h4 class="card-title">Update Category</h4>
          <div class="row">
              <div class="col-sm-12 col-xs-12">
                  <form action="{{ route('backend.category.edit', $row->id) }}" method="post">
                      @csrf
                      <div class="form-group">
                          <label for="name">Category Name :</label>
                          <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $row->name }}" name="name" id="name" placeholder="Enter Category Name">
                      </div>
                      @error('name')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <div class="form-group">
                          <label for="status">Status :</label>
                          <input type="radio" class="form-check-input ml-1 @error('status') is-invalid @enderror" name="status" id="active" value="active" {{ $row->status == 'active' ? 'checked' : ''}}>
                          <label for="active" class="form-check-label ml-4">Active</label>
                          <input type="radio" class="form-check-input ml-1 @error('status') is-invalid @enderror" name="status" id="inactive" value="inactive" {{ $row->status == 'inactive' ? 'checked' : ''}}>
                          <label for="inactive" class="form-check-label ml-4">Inactive</label>
                          <input type="radio" class="form-check-input ml-1 @error('status') is-invalid @enderror" name="status" id="deleted" value="deleted" {{ $row->status == 'deleted' ? 'checked' : ''}}>
                          <label for="deleted" class="form-check-label ml-4">Deleted</label>
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
