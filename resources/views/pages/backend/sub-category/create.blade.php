@extends('layout.backend')
@section('title','Sub-category')
@section('content')
<div class="container-fluid">
  <div class="col-xl-10 offset-xl-1 box-margin height-card">
      <div class="card card-body">
          <h4 class="card-title">Add Sub-category</h4>
          <div class="row">
              <div class="col-sm-12 col-xs-12">
                  <form action="{{ route('backend.sub-category.create') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="category_id">Category Name :</label>
                        <select class="form-control select2 @error('category_id') is-invalid @enderror" name="category_id"  aria-label=".form-select-lg example">
                            <option value="0" selected>Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @if (old('category_id') == $category->id)  selected  @endif>{{ $category->name }}</option>
                                @endforeach
                        </select>
                    </div>
                    @error('category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="name">Sub-category Name :</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name')}}" placeholder="Enter Sub-category Name">
                    </div>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="status">Status :</label>
                        <input type="radio" class="form-check-input ml-1 @error('status') is-invalid @enderror" name="status" id="active" value="active" {{ old('status') == "active" ? 'checked' : '' }}>
                        <label for="active" class="form-check-label ml-4">Active</label>
                        <input type="radio" class="form-check-input ml-1 @error('status') is-invalid @enderror" name="status" id="inactive" value="inactive" {{ old('status') == "inactive" ? 'checked' : '' }}>
                        <label for="inactive" class="form-check-label ml-4">Inactive</label>
                        <input type="radio" class="form-check-input ml-1 @error('status') is-invalid @enderror" name="status" id="deleted" value="deleted" {{ old('status') == "deleted" ? 'checked' : '' }}>
                        <label for="delete" class="form-check-label ml-4">Deleted</label>
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
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@endsection
