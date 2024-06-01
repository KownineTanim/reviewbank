@extends('layout.backend')
@section('title','Product wise reviews')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 box-margin">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title mb-2 text-center">Product wise reviews list</h4>
                  @if(session()->has('success'))
                    <p class="alert alert-primary">{{ session()->pull('success') }}</p>
                  @endif
                  @foreach($errors->all() as $message)
                    <p class="alert alert-danger"> {{ $message }}</p>
                  @endforeach
                  <table id="product-wise-review-table" class="table table-striped dt-responsive nowrap w-100">
                      <thead>
                          <tr>
                              <th>Sl no</th>
                              <th>Price rating</th>
                              <th>Quality rating</th>
                              <th>Design rating</th>
                              <th>Durability rating</th>
                              <th>Service rating</th>
                              <th>Average rating</th>
                              <th>Created date</th>
                              <th>Created time</th>
                              <th>Posted by</th>
                              <th>Action</th>
                          </tr>
                      </thead>

                      <tbody>
                          @foreach($product->reviews as $review)
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>
                                  {!! str_repeat('<i class="fa fa-star text-warning font-14" aria-hidden="true"></i>',intval($review->price_rating)) !!}
                                  {!! str_repeat('<i class="fa fa-star-o text-warning font-14" aria-hidden="true"></i>',5-intval($review->price_rating)) !!}
                              </td>
                              <td>
                                  {!! str_repeat('<i class="fa fa-star text-warning font-14" aria-hidden="true"></i>',intval($review->quality_rating)) !!}
                                  {!! str_repeat('<i class="fa fa-star-o text-warning font-14" aria-hidden="true"></i>',5-intval($review->quality_rating)) !!}
                              </td>
                              <td>
                                  {!! str_repeat('<i class="fa fa-star text-warning font-14" aria-hidden="true"></i>',intval($review->design_rating)) !!}
                                  {!! str_repeat('<i class="fa fa-star-o text-warning font-14" aria-hidden="true"></i>',5-intval($review->design_rating)) !!}
                              </td>
                              <td>
                                  {!! str_repeat('<i class="fa fa-star text-warning font-14" aria-hidden="true"></i>',intval($review->durability_rating)) !!}
                                  {!! str_repeat('<i class="fa fa-star-o text-warning font-14" aria-hidden="true"></i>',5-intval($review->durability_rating)) !!}
                              </td>
                              <td>
                                  {!! str_repeat('<i class="fa fa-star text-warning font-14" aria-hidden="true"></i>',intval($review->service_rating)) !!}
                                  {!! str_repeat('<i class="fa fa-star-o text-warning font-14" aria-hidden="true"></i>',5-intval($review->service_rating)) !!}
                              </td>
                              <td>
                                  {!! str_repeat('<i class="fa fa-star text-warning font-14" aria-hidden="true"></i>',intval(($review->price_rating + $review->quality_rating + $review->design_rating + $review->durability_rating + $review->service_rating)/5)) !!}
                                  {!! str_repeat('<i class="fa fa-star-o text-warning font-14" aria-hidden="true"></i>',5-intval(($review->price_rating + $review->quality_rating + $review->design_rating + $review->durability_rating + $review->service_rating)/5)) !!}
                              </td>
                              <td>{{ $review->created_at->format('d/m/Y') }}</td>
                              <td>{{ $review->created_at->format('g:i A') }}</td>
                              <td>{{ $review->postedBy->first_name }} {{ $review->postedBy->last_name }}</td>
                              <td>
                                  <a href="{{ route('backend.review.singleReview', $review->id) }}" class="btn btn-sm btn-outline-info"><i class=" zmdi zmdi-eye"></i></a>
                                  @if(can('Edit Review'))
                                  <a href="{{ route('backend.review.edit', $review->id) }}" class="btn btn-sm btn-outline-primary"><i class=" zmdi zmdi-edit"></i></a>
                                  @endif
                              </td>
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
          $('#product-wise-review-table').DataTable();
          $('.dataTables_filter').addClass("float-right");
      });

  </script>
@endsection
