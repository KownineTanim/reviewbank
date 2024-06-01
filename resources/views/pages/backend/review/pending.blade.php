@extends('layout.backend')
@section('title','Pending Reviews')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 box-margin">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title mb-2 text-center">Pending Reviews List</h4>
                  <table id="pending-review-table" class="table table-striped dt-responsive nowrap w-100">
                      <thead>
                          <tr>
                              <th>Sl no</th>
                              <th>Product Name</th>
                              <th>Thumbnail</th>
                              <th>Price</th>
                              <th>Quality</th>
                              <th>Design</th>
                              <th>Durability</th>
                              <th>Service</th>
                              <th>Average</th>
                              <th>Date</th>
                              <th>Status</th>
                              @if(can('Approve Review'))
                              <th>Action</th>
                              @endif
                          </tr>
                      </thead>


                      <tbody>
                          @foreach($pendingReviews as $review)
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ Str::limit($review->product->name, 35) }}</td>
                              <td>
                                  <img src="{{ img($review->product->thumbnail) }}" width="100">
                              </td>
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
                                  {!! str_repeat('<i class="fa fa-star text-warning font-14" aria-hidden="true"></i>',intval(round(($review->price_rating + $review->quality_rating + $review->design_rating + $review->durability_rating + $review->service_rating)/5))) !!}
                                  {!! str_repeat('<i class="fa fa-star-o text-warning font-14" aria-hidden="true"></i>',5-intval(round(($review->price_rating + $review->quality_rating + $review->design_rating + $review->durability_rating + $review->service_rating)/5))) !!}
                              </td>
                              <td>{{ $review->created_at->format('d/m/Y') }}<br>(<b>{{ $review->created_at->format('g:i A') }}</b>)</td>
                              <td><span class="badge bg-{{ $review->status == 'pending' ? 'info' : 'warning' }}">{{ strtoupper($review->status) }}</span></td>
                              <td>
                                 <a href="{{ route('backend.review.singleReview', $review->id) }}" class="btn btn-sm btn-outline-info"><i class=" zmdi zmdi-eye"></i></a>
                                 @if(can('Approve Review'))
                                 <button onclick="approveReview({{ $review->id }}, event)" class="btn btn-sm btn-outline-primary pending"><i class="fa fa-check" aria-hidden="true"></i>
                                 </button>
                                 @endif
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
          $('#pending-review-table').DataTable();
          $('.dataTables_filter').addClass("float-right");
      })

      function approveReview(id, event) {

          if(!confirm('Are you sure ?')) {
              return;
          }

          $.ajax({
               url: "{{ route('backend.review.approved') }}",
               type: "post",
               data: {
                   id,
                   _token : "{{ csrf_token() }}"
               } ,
               success: function (response) {
                   if (response.status == 'success') {
                       toastr.success('Review approved successfully');
                       setTimeout(()=>{
                           $('#pending-review-table').DataTable().destroy();

                           if (event.target.tagName == 'I') {
                               $(event.target).parent().parent().parent().remove();
                           } else {
                               $(event.target).parent().parent().remove();
                           }

                           $('#pending-review-table').DataTable({
                              colReorder: true
                           });
                       }, 1000);
                   } else {
                       console.log(response);
                   }
               },
               error: function(jqXHR, textStatus, errorThrown) {
                  console.log(textStatus, errorThrown);
               }
           });
      }

  </script>
@endsection
