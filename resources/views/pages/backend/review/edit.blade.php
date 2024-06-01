@extends('layout.backend')
@section('title','Edit Review')
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
          <h4 class="card-title">Update Review</h4>
          @if(session()->has('success'))
            <p class="alert alert-primary">{{ session()->pull('success') }}</p>
          @endif
          <div class="row">
              <div class="col-sm-12 col-xs-12">
                  <form action="{{ route('backend.review.edit', $row->id) }}" method="post">
                      @foreach($errors->all() as $message)
                        <p class="alert alert-danger"> {{ $message }}</p>
                      @endforeach
                      @csrf
                      <div class="form-group">
                          <label for="category">Select Product :</label>
                          <select class="form-control select22" name="product_id" id="product-id" aria-label=".form-select-lg example">
                              <option value="{{ $row->product_id }}" selected>{{ $row->product->name }}</option>
                              <option value="0">Select Product</option>
                              @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="review-comment-section">
                          <div class="row">
                              <div class="col-12 col-md-6 col-lg-5 col-xl-5 product-rating-area mt-4">
                                  <div class="form-group">
                                      <label>Design rating :</label>
                                      <input type="radio" class="form-check-input ml-1 " name="design_rating" id="design-rating-1" value="1" {{ $row->design_rating == '1' ? 'checked' : ''}}>
                                      <label for="design-rating-1" class="form-check-label ml-4">⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="design_rating" id="design-rating-2" value="2" {{ $row->design_rating == '2' ? 'checked' : ''}}>
                                      <label for="design-rating-2" class="form-check-label ml-4">⭐⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="design_rating" id="design-rating-3" value="3" {{ $row->design_rating == '3' ? 'checked' : ''}}>
                                      <label for="design-rating-3" class="form-check-label ml-4">⭐⭐⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="design_rating" id="design-rating-4" value="4" {{ $row->design_rating == '4' ? 'checked' : ''}}>
                                      <label for="design-rating-4" class="form-check-label ml-4">⭐⭐⭐⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="design_rating" id="design-rating-5" value="5" {{ $row->design_rating == '5' ? 'checked' : ''}}>
                                      <label for="design-rating-5" class="form-check-label ml-4">⭐⭐⭐⭐⭐</label>
                                  </div>
                                  <div class="form-group">
                                      <label>Quality rating :</label>
                                      <input type="radio" class="form-check-input ml-1 " name="quality_rating" id="quality-rating-1" value="1" {{ $row->quality_rating == '1' ? 'checked' : ''}}>
                                      <label for="quality-rating-1" class="form-check-label ml-4">⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="quality_rating" id="quality-rating-2" value="2" {{ $row->quality_rating == '2' ? 'checked' : ''}}>
                                      <label for="quality-rating-2" class="form-check-label ml-4">⭐⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="quality_rating" id="quality-rating-3" value="3" {{ $row->quality_rating == '3' ? 'checked' : ''}}>
                                      <label for="quality-rating-3" class="form-check-label ml-4">⭐⭐⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="quality_rating" id="quality-rating-4" value="4" {{ $row->quality_rating == '4' ? 'checked' : ''}}>
                                      <label for="quality-rating-4" class="form-check-label ml-4">⭐⭐⭐⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="quality_rating" id="quality-rating-5" value="5" {{ $row->quality_rating == '5' ? 'checked' : ''}}>
                                      <label for="quality-rating-5" class="form-check-label ml-4">⭐⭐⭐⭐⭐</label>
                                  </div>
                                  <div class="form-group">
                                      <label>Durability rating :</label>
                                      <input type="radio" class="form-check-input ml-1 " name="durability_rating" id="durability-rating-1" value="1" {{ $row->durability_rating == '1' ? 'checked' : ''}}>
                                      <label for="durability-rating-1" class="form-check-label ml-4">⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="durability_rating" id="durability-rating-2" value="2" {{ $row->durability_rating == '2' ? 'checked' : ''}}>
                                      <label for="durability-rating-2" class="form-check-label ml-4">⭐⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="durability_rating" id="durability-rating-3" value="3" {{ $row->durability_rating == '3' ? 'checked' : ''}}>
                                      <label for="durability-rating-3" class="form-check-label ml-4">⭐⭐⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="durability_rating" id="durability-rating-4" value="4" {{ $row->durability_rating == '4' ? 'checked' : ''}}>
                                      <label for="durability-rating-4" class="form-check-label ml-4">⭐⭐⭐⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="durability_rating" id="durability-rating-5" value="5" {{ $row->durability_rating == '5' ? 'checked' : ''}}>
                                      <label for="durability-rating-5" class="form-check-label ml-4">⭐⭐⭐⭐⭐</label>
                                  </div>
                                  <div class="form-group">
                                      <label>Price rating :</label>
                                      <input type="radio" class="form-check-input ml-1 " name="price_rating" id="price-rating-1" value="1" {{ $row->price_rating == '1' ? 'checked' : ''}}>
                                      <label for="price-rating-1" class="form-check-label ml-4">⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="price_rating" id="price-rating-2" value="2" {{ $row->price_rating == '2' ? 'checked' : ''}}>
                                      <label for="price-rating-2" class="form-check-label ml-4">⭐⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="price_rating" id="price-rating-3" value="3" {{ $row->price_rating == '3' ? 'checked' : ''}}>
                                      <label for="price-rating-3" class="form-check-label ml-4">⭐⭐⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="price_rating" id="price-rating-4" value="4" {{ $row->price_rating == '4' ? 'checked' : ''}}>
                                      <label for="price-rating-4" class="form-check-label ml-4">⭐⭐⭐⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="price_rating" id="price-rating-5" value="5" {{ $row->price_rating == '5' ? 'checked' : ''}}>
                                      <label for="price-rating-5" class="form-check-label ml-4">⭐⭐⭐⭐⭐</label>
                                  </div>
                                  <div class="form-group">
                                      <label>Service rating :</label>
                                      <input type="radio" class="form-check-input ml-1 " name="service_rating" id="service-rating-1" value="1" {{ $row->service_rating == '1' ? 'checked' : ''}}>
                                      <label for="service-rating-1" class="form-check-label ml-4">⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="service_rating" id="service-rating-2" value="2" {{ $row->service_rating == '2' ? 'checked' : ''}}>
                                      <label for="service-rating-2" class="form-check-label ml-4">⭐⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="service_rating" id="service-rating-3" value="3" {{ $row->service_rating == '3' ? 'checked' : ''}}>
                                      <label for="service-rating-3" class="form-check-label ml-4">⭐⭐⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="service_rating" id="service-rating-4" value="4" {{ $row->service_rating == '4' ? 'checked' : ''}}>
                                      <label for="service-rating-4" class="form-check-label ml-4">⭐⭐⭐⭐</label>
                                      <input type="radio" class="form-check-input ml-1 " name="service_rating" id="service-rating-5" value="5" {{ $row->service_rating == '5' ? 'checked' : ''}}>
                                      <label for="service-rating-5" class="form-check-label ml-4">⭐⭐⭐⭐⭐</label>
                                  </div>
                              </div>
                              <div class="col-12 col-md-6 col-lg-7 col-xl-7">
                                  <textarea class="review-description" name="review_description" id="review-description">{{ $row->description }}</textarea>
                              </div>
                          </div>
                      </div>
                      <div class="form-group mt-2">
                          <label for="status">Status:</label>
                          <input type="radio" class="form-check-input ml-1" name="status" id="active" value="active" {{ $row->status == 'active' ? 'checked' : ''}}>
                          <label for="active" class="form-check-label ml-4">Active</label>
                          <input type="radio" class="form-check-input ml-1" name="status" id="inactive" value="inactive" {{ $row->status == 'inactive' ? 'checked' : ''}}>
                          <label for="inactive" class="form-check-label ml-4">Inactive</label>
                          <input type="radio" class="form-check-input ml-1" name="status" id="pending" value="pending" {{ $row->status == 'pending' ? 'checked' : ''}}>
                          <label for="pending" class="form-check-label ml-4">Pending</label>
                          <input type="radio" class="form-check-input ml-1" name="status" id="rejected" value="rejected" {{ $row->status == 'rejected' ? 'checked' : ''}}>
                          <label for="rejected" class="form-check-label ml-4">Rejected</label>
                      </div>
                      <button type="submit" class="btn btn-primary mt-3">Submit</button>
                      <button onclick="history.go(-1);" class="btn btn-danger ml-1 mt-3">Back</button>
                  </form>
                  <div class="row mt-2" id="review-file-wrapper">
                      @foreach($row->reviewFiles as $reviewFile)
                        @if( $reviewFile->size_kb !== -1.0)
                          <div class="image-container col-md-2">
                              <img class="figure-img img-fluid other_file" src="{{ img($reviewFile->path) }}" alt="review-img" />
                              <div class="overlay">
                                  <a data-id="{{ $reviewFile->id }}" class="img-delete-btn close-button">&times;</a>
                              </div>
                          </div>
                        @endif
                      @endforeach
                  </div>
                  <div class="row mt-2" id="review-link-wrapper">
                      @foreach($row->reviewFiles as $reviewFile)
                        @if( $reviewFile->size_kb == -1.0)
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" id="name" value="{{ $reviewFile->url }}">
                            </div>
                        @endif
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

    $(document).ready(function() {
        $('.select22').select2().change(function() {
            setTimeout(() => {
                let product_id = $('#product-id').val();
            }, 3000);
        });
        $('#review-description').summernote({
            placeholder: 'Review description goes here',
            tabsize: 2,
            height: 220
        });
    });

</script>
@endsection
