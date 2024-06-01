@extends('layout.backend')
@section('title','Add Product')
@section('content')
<div class="container-fluid">
  <div class="col-xl-10 offset-xl-1 box-margin height-card">
      <div class="card card-body">
          <h4 class="card-title">Add Product</h4>
          <div class="row">
              <div class="col-sm-12 col-xs-12">
                  <form action="{{ route('backend.product.create')}}" method="post" enctype="multipart/form-data">
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
                          <select class="form-control select2 @error('subcategory_id') is-invalid @enderror" name="subcategory_id" id="sub_category" onchange="loadBrands()" aria-label=".form-select-lg example">
                              <option value="0" selected>Select Sub-Category</option>
                          </select>
                      </div>
                      @error('subcategory_id')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <div class="form-group">
                          <label for="brand">Select Brand :</label>
                          <select class="form-control select2 @error('brand_id') is-invalid @enderror" name="brand_id" id="brand" aria-label=".form-select-lg example">
                              <option value="0" selected>Select Brand</option>
                          </select>
                      </div>
                      @error('brand_id')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <div class="form-group">
                          <label for="product_name">Product Name :</label>
                          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" id="product_name" placeholder="Enter Category Name">
                      </div>
                      @error('name')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <div class="form-group mt-4 bg-primary">
                          <input type="file" name="thumbnail" id="product_thumb" class="custom-input-file custom-input-file--2 @error('thumbnail') is-invalid @enderror" onchange="previewImage()"/>
                          <label for="product_thumb">
                              <i class="fa fa-upload"></i>
                              <span>Thumbnail Upload…</span>
                          </label>
                      </div>
                      <p>Recomended image size height 240 px and width 350 px</p>
                      @error('thumbnail')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <img id="preview" class="rounded mx-auto d-block" width="500">
                      <div class="form-group mt-3">
                          <label for="summernote">Product Description :</label>
                          <textarea class="summernote @error('description') is-invalid @enderror" value="{{old('description')}}" name="description" id="summernote"></textarea>
                      </div>
                      @error('description')
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
                      <div class="form-group col-12 box-margin">
                          <input type="file" name="other_images[]" id="other_images" class="custom-input-file custom-input-file--2" data-multiple-caption="{count} files selected" multiple/>
                          <label for="other_images">
                              <i class="fa fa-upload"></i>
                              <span>Upload More Images…</span>
                          </label>
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
    // loadSubcategories();

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

    function loadBrands() {
        let category_id = document.querySelector('#category').value;
        let subcategory_id = document.querySelector('#sub_category').value;
        try {
            let brands = window.categories.find(category => category.id == category_id)
                .sub_categories
                .find(subcategory => subcategory.id == subcategory_id)
                .brands;
            let html = `<option value="" selected>--Select--</option>`;

            brands.forEach((brand) => {
                    html += `<option value='${brand.id}'>${brand.name}</option>`
                });
            document.querySelector(`#brand`).innerHTML = html;
        } catch (e) {
            $(`#brand`).html('');
            return;
        }
    }

    $('#summernote').summernote({
        placeholder: 'Product description goes here',
        tabsize: 2,
        height: 300
    });

    function previewImage() {
    var file = document.getElementById("product_thumb").files
    if (file.length > 0) {
        var fileReader = new FileReader()
        fileReader.onload = function (event) {
            document.getElementById("preview").setAttribute("src", event.target.result)
        }
        fileReader.readAsDataURL(file[0])
        }
    }

    $(document).ready(function() {
        $('.select2').select2();
    });


</script>




@endsection
