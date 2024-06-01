@extends('layout.backend')
@section('title','Blog')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 box-margin">
          <div class="card">
              <div class="card-body">
                  @if(session()->has('success'))
                    <p class="alert alert-primary">{{ session()->pull('success') }}</p>
                  @endif
                  <h4 class="card-title mb-2 text-center">Blog List</h4>
                  <table id="blog-table" class="table table-striped dt-responsive nowrap w-100">
                      <thead>
                          <tr>
                              <th>Sl no</th>
                              <th>Title</th>
                              <th>Thumbnail</th>
                              <th>Status</th>
                              <th>Posted by</th>
                              <th>Created at</th>
                              <th>Action</th>
                          </tr>
                      </thead>


                      <tbody>
                          @foreach($blogs as $blog)
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ Str::limit($blog->title, 50) }}</td>
                              <td>
                                  <img src="{{ img($blog->blog_thumb) }}" width="100">
                              </td>
                              <td><span class="badge bg-{{ $blog->status == 'publish' ? 'info' : 'warning' }}">{{ strtoupper($blog->status) }}</span></td>
                              <td>{{ $blog->postedBy->name }}</td>
                              <td>{{ $blog->created_at->format('d/m/Y') }}<br>(<b>{{ $blog->created_at->format('g:i A') }}</b>)</td>
                              <td>
                                 <a href="{{ route('backend.blog.view', $blog->id) }}" class="btn btn-sm btn-outline-info"><i class=" zmdi zmdi-eye"></i></a>
                                 @if(can('Edit Blog'))
                                 <a href="{{ route('backend.blog.edit', $blog->id) }}" class="btn btn-sm btn-outline-primary"><i class=" zmdi zmdi-edit"></i></a>
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
          $('#blog-table').DataTable();
          $('.dataTables_filter').addClass("float-right");
      });
  </script>
@endsection
