@extends('layout.backend')
@section('title','Add Review')
@section('content')
<div class="container-fluid">
  <div class="col-xl-10 offset-xl-1 box-margin height-card">
      <div class="card card-body">
          <h4 class="card-title">Add Review</h4>
          <div class="row">
              <div class="col-sm-12 col-xs-12">
                  <form id="review-form" action="javascript:void(0)">
                      <div class="form-group">
                          <label for="category">Select Product :</label>
                          <select class="form-control select2 @error('product_id') is-invalid @enderror" name="product_id" id="product-id" aria-label=".form-select-lg example">
                              <option value="0" selected>Select Product</option>
                              @foreach($products as $product)
                                <option value="{{ $product->id }}" @if (old('product_id') == $product->id)  selected  @endif>{{ $product->name }}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="review-comment-section">
                          <div class="row">
                              <div class="col-12 col-md-6 col-lg-5 col-xl-5 product-rating-area mt-4">
                                  <div class="form-group">
                                      <label>Design rating :</label>
                                      <input type="radio" class="form-check-input ml-1 " name="design_rating" id="design-rating-1" value="1">
                                      <label for="design-rating-1" class="form-check-label ml-4">⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="design_rating" id="design-rating-2" value="2">
                                      <label for="design-rating-2" class="form-check-label ml-4">⭐⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="design_rating" id="design-rating-3" value="3">
                                      <label for="design-rating-3" class="form-check-label ml-4">⭐⭐⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="design_rating" id="design-rating-4" value="4">
                                      <label for="design-rating-4" class="form-check-label ml-4">⭐⭐⭐⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="design_rating" id="design-rating-5" value="5" checked>
                                      <label for="design-rating-5" class="form-check-label ml-4">⭐⭐⭐⭐⭐</label>
                                  </div>
                                  <div class="form-group">
                                      <label>Quality rating :</label>
                                      <input type="radio" class="form-check-input ml-1 " name="quality_rating" id="quality-rating-1" value="1">
                                      <label for="quality-rating-1" class="form-check-label ml-4">⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="quality_rating" id="quality-rating-2" value="2">
                                      <label for="quality-rating-2" class="form-check-label ml-4">⭐⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="quality_rating" id="quality-rating-3" value="3">
                                      <label for="quality-rating-3" class="form-check-label ml-4">⭐⭐⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="quality_rating" id="quality-rating-4" value="4">
                                      <label for="quality-rating-4" class="form-check-label ml-4">⭐⭐⭐⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="quality_rating" id="quality-rating-5" value="5" checked>
                                      <label for="quality-rating-5" class="form-check-label ml-4">⭐⭐⭐⭐⭐</label>
                                  </div>
                                  <div class="form-group">
                                      <label>Durability rating :</label>
                                      <input type="radio" class="form-check-input ml-1 " name="durability_rating" id="durability-rating-1" value="1">
                                      <label for="durability-rating-1" class="form-check-label ml-4">⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="durability_rating" id="durability-rating-2" value="2">
                                      <label for="durability-rating-2" class="form-check-label ml-4">⭐⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="durability_rating" id="durability-rating-3" value="3">
                                      <label for="durability-rating-3" class="form-check-label ml-4">⭐⭐⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="durability_rating" id="durability-rating-4" value="4">
                                      <label for="durability-rating-4" class="form-check-label ml-4">⭐⭐⭐⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="durability_rating" id="durability-rating-5" value="5" checked>
                                      <label for="durability-rating-5" class="form-check-label ml-4">⭐⭐⭐⭐⭐</label>
                                  </div>
                                  <div class="form-group">
                                      <label>Price rating :</label>
                                      <input type="radio" class="form-check-input ml-1 " name="price_rating" id="price-rating-1" value="1">
                                      <label for="price-rating-1" class="form-check-label ml-4">⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="price_rating" id="price-rating-2" value="2">
                                      <label for="price-rating-2" class="form-check-label ml-4">⭐⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="price_rating" id="price-rating-3" value="3">
                                      <label for="price-rating-3" class="form-check-label ml-4">⭐⭐⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="price_rating" id="price-rating-4" value="4">
                                      <label for="price-rating-4" class="form-check-label ml-4">⭐⭐⭐⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="price_rating" id="price-rating-5" value="5" checked>
                                      <label for="price-rating-5" class="form-check-label ml-4">⭐⭐⭐⭐⭐</label>
                                  </div>
                                  <div class="form-group">
                                      <label>Service rating :</label>
                                      <input type="radio" class="form-check-input ml-1 " name="service_rating" id="service-rating-1" value="1">
                                      <label for="service-rating-1" class="form-check-label ml-4">⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="service_rating" id="service-rating-2" value="2">
                                      <label for="service-rating-2" class="form-check-label ml-4">⭐⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="service_rating" id="service-rating-3" value="3">
                                      <label for="service-rating-3" class="form-check-label ml-4">⭐⭐⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="service_rating" id="service-rating-4" value="4">
                                      <label for="service-rating-4" class="form-check-label ml-4">⭐⭐⭐⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="service_rating" id="service-rating-5" value="5" checked>
                                      <label for="service-rating-5" class="form-check-label ml-4">⭐⭐⭐⭐⭐</label>
                                  </div>
                              </div>
                              <div class="col-12 col-md-6 col-lg-7 col-xl-7">
                                  <textarea class="review-description" name="review_description" id="review-description"></textarea>
                              </div>
                          </div>
                      </div>
                      <div class="form-group mt-2">
                          <label for="status">Status:</label>
                          <input type="radio" class="form-check-input ml-1" name="status" id="active" value="active" checked>
                          <label for="active" class="form-check-label ml-4">Active</label>
                          <input type="radio" class="form-check-input ml-1" name="status" id="inactive" value="inactive">
                          <label for="inactive" class="form-check-label ml-4">Inactive</label>
                          <input type="radio" class="form-check-input ml-1" name="status" id="deleted" value="deleted">
                          <label for="deleted" class="form-check-label ml-4">Deleted</label>
                          <input type="radio" class="form-check-input ml-1" name="status" id="pending" value="pending">
                          <label for="pending" class="form-check-label ml-4">Pending</label>
                          <input type="radio" class="form-check-input ml-1" name="status" id="draft" value="draft">
                          <label for="draft" class="form-check-label ml-4">Guest-pending</label>
                          <input type="radio" class="form-check-input ml-1" name="status" id="guest-pending" value="guest-pending">
                          <label for="guest-pending" class="form-check-label ml-4">Draft</label>
                          <input type="radio" class="form-check-input ml-1" name="status" id="rejected" value="rejected">
                          <label for="rejected" class="form-check-label ml-4">Rejected</label>
                      </div>
                      <div class="row mt-3 review-document-wrapper">
                          <div class="col-12">
                              <h5>
                                  Put Some Documents Of Your Purchased Product :
                                  <input type="radio" name="review-image" id="review-image-file" value="upload" onchange="review_image_document_input_type_toggle(event)">
                                  <label for="review-image-file" class="badge bg-secondary text-light">Upload</label>
                                  <input type="radio" name="review-image" id="review-image-url" value="url" onchange="review_image_document_input_type_toggle(event)" checked>
                                  <label for="review-image-url" class="badge bg-secondary text-light">Link</label>
                              </h5>
                          </div>
                          <div class="col-12" id="image-document-url-tab">
                              <div class="d-inline-block w-100" id="image-document-url-wrapper">
                                  <div class="d-flex">
                                      <input class='form-control m-1' name="image_document_url[]" type="url" placeholder="Paste the image link">
                                      <button type="button" class="btn btn-sm btn-danger m-1" onclick="$(event.target).parent().remove()">&times;</button>
                                  </div>
                              </div>
                              <div class="d-inline-block w-50">
                                  <button type="button" onclick="image_document_url_add(event)" class="btn btn-sm btn-info w-50">+</button>
                              </div>
                          </div>
                          <div class="col-12 d-none" id="image-document-upload-tab">
                              <div class="d-inline-block w-100" id="image-document-upload-wrapper">
                                  <div class="d-flex">
                                      <input class='form-control m-1' name="image_document_upload[]" type="file" placeholder="Paste the image link">
                                      <button type="button" class="btn btn-sm btn-danger m-1" onclick="$(event.target).parent().remove()">&times;</button>
                                  </div>
                              </div>
                              <div class="d-inline-block w-50">
                                  <button type="button" onclick="image_document_upload_add(event)" class="btn btn-sm btn-info w-50">+</button>
                              </div>
                          </div>
                      </div>
                      <button type="button" onclick="submitReview()" class="btn btn-primary mt-3">Submit</button>
                      <button onclick="history.go(-1);" class="btn btn-danger ml-1 mt-3">Back</button>
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
        $('.select22').select2().change(function() {
            setTimeout(() => {
                let product_id = $('#product').val();
            }, 3000);
        });

        $('#description').summernote({
            placeholder: 'Product description goes here',
            tabsize: 2,
            height: 300
        });
        $('#review-description').summernote({
            placeholder: 'Review description goes here',
            tabsize: 2,
            height: 220,
            callbacks: {
                onChange: function() {
                    let review_description = $('#review-description').val();
                }
            }
        });
    });

    /*********
    *  Review Documents Handler
    ******/

    function review_image_document_input_type_toggle(event) {
        if (event.target.value == 'url') {
            $('#image-document-upload-tab').addClass('d-none');
            $('#image-document-url-tab').removeClass('d-none');
        } else {
            $('#image-document-url-tab').addClass('d-none');
            $('#image-document-upload-tab').removeClass('d-none');
        }
    }

    function image_document_url_add(event) {
        $('#image-document-url-wrapper').append(`
            <div class="d-flex">
                <input class='form-control m-1' name="image_document_url[]" type="url" placeholder="Paste the image link">
                <button type="button" class="btn btn-sm btn-danger m-1" onclick="$(event.target).parent().remove()">&times;</button>
            </div>
        `);
    }
    function image_document_upload_add(event) {
        $('#image-document-upload-wrapper').append(`
            <div class="d-flex">
                <input class='form-control m-1' name="image_document_upload[]" type="file" placeholder="Paste the image link">
                <button type="button" class="btn btn-sm btn-danger m-1" onclick="$(event.target).parent().remove()">&times;</button>
            </div>
        `);
    }

    function submitReview() {
        let formData = new FormData();
        let product_id = $('#product-id').val();
        let design_rating = $('[name="design_rating"]:checked').val();
        let quality_rating = $('[name="quality_rating"]:checked').val();
        let durability_rating = $('[name="durability_rating"]:checked').val();
        let price_rating = $('[name="price_rating"]:checked').val();
        let service_rating = $('[name="service_rating"]:checked').val();
        let status = $('[name="status"]:checked').val();
        let review_description = $('#review-description').val();


        [...document.querySelectorAll(`input[name='image_document_upload[]']`)].forEach((input, i) => {
            if (input.files.length) {
                formData.append(`uploaded_document[]`, input.files[0]);
            }
        });
        [...document.querySelectorAll(`input[name='image_document_url[]']`)].forEach((input, i) => {
            if (input.value) {
                formData.append(`uploaded_document_url[]`, input.value);
            }
        });

        formData.append('product_id', product_id);
        formData.append('design_rating', design_rating);
        formData.append('quality_rating', quality_rating);
        formData.append('durability_rating', durability_rating);
        formData.append('price_rating', price_rating);
        formData.append('service_rating', service_rating);
        formData.append('status', status);
        formData.append('review_description', review_description);
        formData.append('_token', "{{ csrf_token() }}");

       $.ajax({
            url: "{{ route('backend.review.create') }}",
            type: "post",
            processData: false,
            contentType: false,
            data: formData,
            success: function (response) {
                if (response.status == 'success') {
                    toastr.success('Review added successfully');
                    $('#product-id').val('');
                    $('#review-description').val('');

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

</script>
@endsection
