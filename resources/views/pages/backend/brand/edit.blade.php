@extends('layout.backend')
@section('title','Brand update')
@section('content')
<div class="container-fluid">
  <div class="col-xl-10 offset-xl-1 box-margin height-card">
      <div class="card card-body">
          <h4 class="card-title">Update Brand</h4>
          <div class="row">
              <div class="col-sm-12 col-xs-12">
                  <form action="{{ route('backend.brand.edit', $row->id) }}" method="post">
                      @foreach($errors->all() as $message)
                        <p class="alert alert-danger"> {{ $message }}</p>
                      @endforeach
                      @if(session()->has('success'))
                        <p class="alert alert-primary">{{ session()->pull('success') }}</p>
                      @endif
                      @csrf
                      <div class="form-group">
                          <label for="category">Select Category</label>
                          <select class="form-control" name="category_id" id="category" onchange="loadSubcategories()" aria-label=".form-select-lg example">
                                <option value="{{ $row->category_id }}" selected>{{ $row->category->name }}</option>
                                @foreach($categories as $category)
                                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="sub_category">Select Sub-category</label>
                          <select class="form-control" name="subcategory_id" id="sub_category" aria-label=".form-select-lg example">
                              <option value="{{ $row->subcategory_id }}" selected>{{ $row->sub_category->name }}</option>
                              <option>Select Sub-category</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="brand">Brand Name</label>
                          <input type="text" class="form-control" name="name" id="brand" value="{{ $row->name }}" id="brand" placeholder="Enter Brand Name">
                      </div>
                      <div class="form-group">
                          <label for="status">Status:</label>
                          <input type="radio" class="form-check-input ml-1" name="status" id="active" value="active" {{ $row->status == 'active' ? 'checked' : ''}}>
                          <label for="active" class="form-check-label ml-4">Active</label>
                          <input type="radio" class="form-check-input ml-1" name="status" id="inactive" value="inactive" {{ $row->status == 'inactive' ? 'checked' : ''}}>
                          <label for="inactive" class="form-check-label ml-4">Inactive</label>
                          <input type="radio" class="form-check-input ml-1" name="status" id="deleted" value="deleted" {{ $row->status == 'deleted' ? 'checked' : ''}}>
                          <label for="deleted" class="form-check-label ml-4">Deleted</label>
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
</script>
@endsection
