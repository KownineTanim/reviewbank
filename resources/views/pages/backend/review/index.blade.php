@extends('layout.backend')
@section('title','Review')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 box-margin">
          <div class="card">
              <div class="card-body">
                  @if(session()->has('success'))
                    <p class="alert alert-primary">{{ session()->pull('success') }}</p>
                  @endif
                  <h4 class="card-title mb-2 text-center">Reviews List of Product</h4>
                  <table id="review-table" class="table table-striped dt-responsive nowrap w-100">
                      <thead>
                          <tr>
                              <th width="10%">Sl no</th>
                              <th width="20%">Product Name</th>
                              <th width="10%">Brand</th>
                              <th width="15%">Thumbnail</th>
                              <th width="15%">Average Rating</th>
                              <th width="15%">Total reviews</th>
                              <th width="15%">Action</th>
                          </tr>
                      </thead>


                      <tbody>
                          @foreach($products as $product)
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $product->name }}</td>
                              <td>{{ $product->brand->name }}</td>
                              <td>
                                  <img src="{{ img($product->thumbnail) }}" width="100">
                              </td>
                              <td>
                                  <strong>
                                      {!! str_repeat('<i class="fa fa-star text-warning font-14" aria-hidden="true"></i>',intval($product->avg_rating)) !!}
                                      {!! str_repeat('<i class="fa fa-star-o text-warning font-14" aria-hidden="true"></i>',5-intval($product->avg_rating)) !!}
                                  </strong>
                              </td>
                              <td>{{ count($product->reviews) }}</td>
                              <td>
                                  <a href="{{ route('backend.review.productWiseReview', $product->id) }}" class="btn btn-sm btn-primary">Show Reviews</a>
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div> <!-- end card body-->
          </div>

        </div>
    </div>
</div>
@endsection

@section('script')
  <!-- These plugins only need for the run this page -->
  <script type="text/javascript" src="{{ asset('js/default-assets/jquery.datatables.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/default-assets/datatables.bootstrap4.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/default-assets/datatable-responsive.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/default-assets/responsive.bootstrap4.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/default-assets/datatable-button.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/default-assets/button.bootstrap4.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/default-assets/button.html5.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/default-assets/button.flash.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/default-assets/button.print.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/default-assets/datatables.keytable.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/default-assets/datatables.select.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/default-assets/demo.datatable-init.js') }}"></script>
  <script type="text/javascript">
      $(document).ready(function() {
          $('#review-table').DataTable();
          $('.dataTables_filter').addClass("float-right");
      });

  </script>
@endsection
