@extends('layout.backend')
@section('title','Pending Brands')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 box-margin">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title mb-2 text-center">Pending Brand List</h4>
                  <table id="brand-table" class="table table-striped dt-responsive nowrap w-100">
                      <thead>
                          <tr>
                              <th>Sl no</th>
                              <th>Brand Name</th>
                              <th>Category Name</th>
                              <th>Sub-category Name</th>
                              <th>Created By</th>
                              @if(can('Approve Brand'))
                              <th>Action</th>
                              @endif
                          </tr>
                      </thead>


                      <tbody>
                        @foreach($pendingBrands as $brand)
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $brand->name }}</td>
                              <td>{{ $brand->category->name }}</td>
                              <td>{{ $brand->sub_category->name }}</td>
                              <td>{{ $brand->createdBy->first_name }} {{ $brand->createdBy->last_name }}</td>
                              @if(can('Approve Brand'))
                              <td>
                                 <button onclick="approveBrand({{ $brand->id }}, event)" class="btn btn-sm btn-primary pending">Approve Now</button>
                              </td>
                              @endif
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
      $('#brand-table').DataTable();
  });
  function approveBrand(id, event) {
      $.ajax({
           url: "{{ route('backend.brand.approved') }}",
           type: "post",
           data: {
               id,
               _token : "{{ csrf_token() }}"
           } ,
           success: function (response) {
               if (response.status == 'success') {
                   setTimeout(()=>{
                       $('#brand-table').DataTable().destroy();
                       $(event.target).parent().parent().remove();
                       $('#brand-table').DataTable({
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
