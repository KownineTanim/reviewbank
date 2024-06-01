@extends('layout.backend')
@section('title','Contact Message')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 box-margin">
          <div class="card">
              <div class="card-body">
                  @if(session()->has('success'))
                    <p class="alert alert-primary">{{ session()->pull('success') }}</p>
                  @endif
                  <h4 class="card-title mb-2 text-center">Contact Message List</h4>
                  <table id="contact-message-table" class="table table-striped dt-responsive nowrap w-100">
                      <thead>
                          <tr>
                              <th>Sl no</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Message</th>
                              @if(can('Delete Contact-Message'))
                              <th>Action</th>
                              @endif
                          </tr>
                      </thead>


                      <tbody>
                          @foreach($contactMessages as $contactMessage)
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $contactMessage->name }}</td>
                              <td>{{ $contactMessage->email }}</td>
                              <td>{{ $contactMessage->message }}</td>
                              @if(can('Delete Contact-Message'))
                              <td>
                                 <a data-id="{{$contactMessage->id}}" href="#" class="btn btn-sm btn-outline-danger contact-msg-delete-btn"><i class=" zmdi zmdi-delete"></i></a>
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
          $('#contact-message-table').DataTable();
          $('.dataTables_filter').addClass("float-right");
      });

      $(document).on('click', '.contact-msg-delete-btn', function() {
          var id = $(this).data('id');
          var This = this;

          if(!confirm('Are you sure ?')) {
              return;
          }

          $.ajax({
              url: '{{ route("backend.contact-us.destroy", ":id") }}'.replace(':id', id),
              type: 'post',
              dataType: 'json',
              data: {
                  '_token': '{{ csrf_token() }}',
                  '_method': 'DELETE'
              },
              success: function(data) {
                  toastr.success('Message deleted successfully');
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
