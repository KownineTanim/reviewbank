@extends('layout.backend')
@section('title','User')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 box-margin">
          <div class="card">
              <div class="card-body">
                  @if(session()->has('success'))
                    <p class="alert alert-primary">{{ session()->pull('success') }}</p>
                  @endif
                  <h4 class="card-title mb-2 text-center">User List</h4>
                  <table id="user-table" class="table table-striped dt-responsive nowrap w-100">
                      <thead>
                          <tr>
                              <th>Sl no</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Email</th>
                              <th>Role</th>
                              <th>Status</th>
                              @if(can('Edit User'))
                              <th>Action</th>
                              @endif
                          </tr>
                      </thead>


                      <tbody>
                          @foreach($users as $user)
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $user->first_name }}</td>
                              <td>{{ $user->last_name }}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ $user->role->name }}</td>
                              <td>{{ ucfirst($user->status) }}</td>
                              @if(can('Edit User'))
                              <td>
                                 <a href="{{ route('backend.user.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
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
          $('#user-table').DataTable();
          $('.dataTables_filter').addClass("float-right");
      });
  </script>
@endsection
