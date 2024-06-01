@extends('layout.backend')
@section('title','Ads')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 box-margin">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title mb-2 text-center">Ads List</h4>
                  <table id="ads-table" class="table table-striped dt-responsive nowrap w-100">
                      <thead>
                          <tr>
                              <th>Sl no</th>
                              <th>Title</th>
                              <th>Template</th>
                              @if(can('Edit Ads'))
                              <th>Action</th>
                              @endif
                          </tr>
                      </thead>


                      <tbody>
                          @foreach($ads as $ad)
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $ad->title }}</td>
                              <td>{{ $ad->template }}</td>
                              @if(can('Edit Ads'))
                              <td>
                                 <a href="{{ route('backend.ads.edit', $ad->id) }}" class="btn btn-sm btn-primary">Edit</a>
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
          $('#ads-table').DataTable();
          $('.dataTables_filter').addClass("float-right");
      });
  </script>
@endsection
