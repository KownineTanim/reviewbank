@extends('layout.backend')
@section('title','Product update')
@section('content')
<style>
.image-container {
  position: relative;
  width: 100%;
  max-width: 600px;
}

.overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  opacity: 1;
  transition: opacity 0.3s ease-in-out;
}

.close-button {
  position: absolute;
  top: -15px;
  right: 17px;
  font-size: 35px;
  color: red !important;
  cursor: pointer;
  z-index: 1;
}
</style>
<div class="container-fluid">
  <div class="col-xl-10 offset-xl-1 box-margin height-card">
      <div class="card card-body">
          <h4 class="card-title">Update Product</h4>
          <div class="row">
              <div class="col-sm-12 col-xs-12">
                  <form action="{{ route('backend.product.edit', $row->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                      <div class="form-group">
                          <label for="category">Select Category :</label>
                          <select class="form-control select2" name="category_id" id="category" onchange="loadSubcategories()" aria-label=".form-select-lg example">
                              <option value="{{ $row->category_id }}" selected>{{ $row->category->name }}</option>
                              @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="sub_category">Select Sub-category :</label>
                          <select class="form-control select2" name="subcategory_id" id="sub_category" onchange="loadBrands()" aria-label=".form-select-lg example">
                              <option value="{{ $row->subcategory_id }}" selected>{{ $row->sub_category->name }}</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="brand">Select Brand :</label>
                          <select class="form-control select2" name="brand_id" id="brand" aria-label=".form-select-lg example">
                              <!-- <option value="{{ $row->brand_id }}" selected>{{ $row->brand->name }}</option> -->
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="product_name">Product Name :</label>
                          <input type="text" class="form-control" name="name" id="product_name" value="{{ $row->name }}">
                      </div>
                      <div class="form-group mt-4 bg-primary">
                          <input type="file" name="thumbnail" id="product_thumb" class="custom-input-file custom-input-file--2" onchange="previewImage()"/>
                          <label for="product_thumb">
                              <i class="fa fa-upload"></i>
                              <span>Thumbnail Upload…</span>
                          </label>
                      </div>
                      <img id="preview" src="{{ img($row->thumbnail) }}" class="rounded mx-auto d-block" width="500">
                      <div class="form-group mt-3">
                          <label for="summernote">Product Description :</label>
                          <textarea class="summernote" name="description" id="summernote">{{ $row->description }}</textarea>
                      </div>
                      <div class="form-group">
                          <label for="status">Status :</label>
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
              <div class="other-image-wrapper col-sm-12 col-xs-12">
                  <div class="form-group mt-4 col-sm-2 bg-primary">
                      <input type="hidden" id="_id" value="{{ $row->id }}">
                      <input type="file" name="other_image" id="other_image" onchange="uploadSingleImage(event)" class="custom-input-file custom-input-file--2"/>
                      <label for="other_image">
                          <span><i class="fa fa-upload"></i>Add An Image</span>
                      </label>
                  </div>
                  <div class="row" id="other-image-wrapper">
                      @foreach($row->images as $image)
                        <div class="image-container col-md-2">
                            <img class="figure-img img-fluid other_img" src="{{ img($image->path) }}" alt="product-img" />
                            <div class="overlay">
                                <a data-id="{{ $image->id }}" class="img-delete-btn close-button">&times;</a>
                            </div>
                        </div>
                      @endforeach
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

@endsection
@section('script')
<script type="text/javascript">
    $('#summernote').summernote({
        placeholder: 'Product description goes here',
        tabsize: 2,
        height: 300
    });

    window.categories = @json($categories);
    loadSubcategories();

    function loadSubcategories() {
        let category_id = document.querySelector('#category').value;

        let sub_categories = window.categories.find(category => category.id == category_id).sub_categories;
        let html = ``;

        sub_categories.forEach((sub_category) => {
            html += `<option value='${sub_category.id}'>${sub_category.name}</option>`
        });
        document.querySelector(`#sub_category`).innerHTML = html;
        loadBrands();
    }

    function loadBrands() {
        let category_id = document.querySelector('#category').value;
        let subcategory_id = document.querySelector('#sub_category').value;
        let brands = window.categories.find(category => category.id == category_id)
            .sub_categories
            .find(subcategory => subcategory.id == subcategory_id)
            .brands;
        let html = ``;

        brands.forEach((brand) => {
            html += `<option value='${brand.id}'>${brand.name}</option>`
        });
        document.querySelector(`#brand`).innerHTML = html;
    }

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


    function uploadSingleImage(event) {
        var id = $('#_id').val();
        let file = event.target.files[0];

        if (!file) {
            return;
        }
        let formData = new FormData();
        formData.append('_token', "{{ csrf_token() }}");
        formData.append('image', file);

        $.ajax({
             url: '{{ route("backend.product.otherImage.store", ":product_id") }}'.replace(':product_id', id),
             type: "post",
             processData: false,
             contentType: false,
             data: formData,
             success: function (response) {
                 if (response.status == 'success') {
                     toastr.success('Image added successfully');
                     $('#other-image-wrapper').append(`
                         <div class="image-container col-md-2">
                             <img class="figure-img img-fluid other_img" src="${window.location.origin}/storage/${response.image.path}" alt="product-img" />
                             <div class="overlay">
                                 <a data-id="${response.image.id}" class="img-delete-btn close-button">&times;</a>
                             </div>
                         </div>
                     `);
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

    $(document).on('click', '.img-delete-btn', function() {
        var id = $(this).data('id');
        var This = this;

        if(!confirm('Are you sure ?')) {
            return;
        }

        $.ajax({
            url: '{{ route("backend.product.otherImage.destroy", ":id") }}'.replace(':id', id),
            type: 'post',
            dataType: 'json',
            data: {
                '_token': '{{ csrf_token() }}',
                '_method': 'DELETE'
            },
            success: function(data) {
                toastr.success('Image deleted successfully');
                setTimeout(() => {
                    $(This).parent().parent().remove();
                }, 1000);
            },
            error: function(data) {
                toastr.error('Delete Fail');
            }
        });
    });

</script>
@endsection
