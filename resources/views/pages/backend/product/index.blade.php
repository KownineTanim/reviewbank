@extends('layout.backend')
@section('title','Products')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 box-margin">
          <div class="card">
              <div class="card-body">
                  @if(session()->has('success'))
                    <p class="alert alert-primary">{{ session()->pull('success') }}</p>
                  @endif
                  <h4 class="card-title mb-2 text-center">Products List</h4>
                  <table id="product-table" class="table table-striped dt-responsive nowrap w-100">
                      <thead>
                          <tr>
                              <th width="10%">Sl no</th>
                              <th width="15%">Product Name</th>
                              <th width="10%">Category</th>
                              <th width="10%">Sub-category</th>
                              <th width="10%">Brand</th>
                              <th width="15%">Thumbnail</th>
                              <th width="10%">Created By</th>
                              <th width="10%">Status</th>
                              @if(can('Edit Product'))
                              <th width="10%">Action</th>
                              @endif
                          </tr>
                      </thead>


                      <tbody>
                          @foreach($products as $product)
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $product->name }}</td>
                              <td>{{ $product->category->name }}</td>
                              <td>{{ $product->sub_category->name }}</td>
                              <td>{{ $product->brand->name }}</td>
                              <td>
                                  <img src="{{ img($product->thumbnail) }}" width="100">
                              </td>
                              <td>{{ $product->createdBy->first_name }} {{ $product->createdBy->last_name }}</td>
                              <td>{{ ucfirst($product->status) }}</td>
                              @if(can('Edit Product'))
                              <td>
                                 <a href="{{ route('backend.product.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>
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
          $('#product-table').DataTable();
          $('.dataTables_filter').addClass("float-right");
      });
  </script>
@endsection
