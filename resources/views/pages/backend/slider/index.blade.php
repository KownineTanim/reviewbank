@extends('layout.backend')
@section('title','Slider')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 box-margin">
          <div class="card">
              <div class="card-body">
                  @if(session()->has('success'))
                    <p class="alert alert-primary">{{ session()->pull('success') }}</p>
                  @endif
                  <h4 class="card-title mb-2 text-center">Slider List</h4>
                  <table id="slider-table" class="table table-striped dt-responsive nowrap w-100">
                      <thead>
                          <tr>
                              <th>Sl no</th>
                              <th>Title</th>
                              <th>Heading</th>
                              <th>Summary</th>
                              <th>Image</th>
                              <th>Button text</th>
                              <th>Button url</th>
                              <th>Button target</th>
                              <th>Start date</th>
                              <th>End date</th>
                              <th>Status</th>
                              <th>Created by</th>
                              @if(can('Edit Slider'))
                              <th>Action</th>
                              @endif
                          </tr>
                      </thead>


                      <tbody>
                          @foreach($sliders as $slider)
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $slider->highlighted_title }}</td>
                              <td>{{ $slider->heading }}</td>
                              <td>{{ $slider->summary }}</td>
                              <td>
                                  <img src="{{ img($slider->image) }}" width="100">
                              </td>
                              <td>{{ $slider->button_text }}</td>
                              <td>{{ $slider->button_url }}</td>
                              <td>{{ $slider->button_target }}</td>
                              <td>{{ $slider->start_date }}</td>
                              <td>{{ $slider->end_date }}</td>
                              <td><span class="badge bg-{{ $slider->status == 'published' ? 'success' : 'danger' }}">{{ strtoupper($slider->status) }}</span></td>
                              <td>{{ $slider->createdBy->first_name }} {{ $slider->createdBy->last_name }}</td>
                              @if(can('Edit Slider'))
                              <td>
                                 <a href="{{ route('backend.slider.edit', $slider->id) }}" class="btn btn-sm btn-primary">Edit</a>
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
          $('#slider-table').DataTable();
          $('.dataTables_filter').addClass("float-right");
      });
  </script>
@endsection
