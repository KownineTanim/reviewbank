@extends('layout.backend')
@section('title','Add Brand')
@section('content')
<div class="container-fluid">
  <div class="col-xl-10 offset-xl-1 box-margin height-card">
      <div class="card card-body">
          <h4 class="card-title">Add Brand</h4>
          <div class="row">
              <div class="col-sm-12 col-xs-12">
                  <form action="{{ route('backend.brand.create') }}" method="post">
                      @csrf
                      <div class="form-group">
                          <label for="category">Select Category :</label>
                          <select class="form-control select2 @error('category_id') is-invalid @enderror" name="category_id" id="category" onchange="loadSubcategories()" aria-label=".form-select-lg example">
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
                          <label for="sub_category">Select Sub-category :</label>
                          <select class="form-control select2 @error('subcategory_id') is-invalid @enderror" name="subcategory_id" id="sub_category" aria-label=".form-select-lg example">
                              <option value="0" selected>Select Sub-category</option>
                          </select>
                      </div>
                      @error('subcategory_id')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <div class="form-group">
                          <label for="name">Brand Name :</label>
                          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" id="name" placeholder="Enter Brand Name">
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
@section('script')
<script type="text/javascript">
    window.categories = @json($categories);

    function loadSubcategories() {
        let category_id = document.querySelector('#category').value;
        try {
            let sub_categories = window.categories.find(category => category.id == category_id).sub_categories;
            let html = `<option value="0" selected>--Select--</option>`;
            sub_categories.forEach((sub_category) => {
                html += `<option value='${sub_category.id}'>${sub_category.name}</option>`
            });

            document.querySelector(`#sub_category`).innerHTML = html;
        } catch (e) {
            $(`#sub_category`).html('');
            return;
        }
    }

    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@endsection
