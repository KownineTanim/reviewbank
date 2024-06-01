@extends('layout.backend')
@section('title','Landing-pages')
@section('content')
<div class="container-fluid">
    @if(can('Create Landing-Page-Item'))
    <div class="row">
        <div class="col-12 p0">
            <a href="{{ route('backend.landing-page-item.create') }}" class="btn btn-sm btn-outline-primary float-right m-3">Add new <i class="zmdi zmdi-plus-square"></i></a>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-12 box-margin">
          <div class="card">
              <div class="card-body">
                  @if(session()->has('success'))
                    <p class="alert alert-primary">{{ session()->pull('success') }}</p>
                  @endif
                  <h4 class="card-title mb-2 text-center">Landing-page item List</h4>
                <div id="my-list" class="row p-2">
                    @foreach($landingPageItems as $landingPageItem)
                        <div class="col-12 p-2 m-1 bg-light d-flex" key="{{ $landingPageItem->id }}">
                            @if(!empty($landingPageItem->ad))
                                <img width="300" src="{{ asset('frontend/ads/'.$landingPageItem->ad->template) }}.png" alt="">
                            @else
                                <img width="150" src="{{ asset('/backend/landing-pages/item-image/'.$landingPageItem->type) }}.png" alt="">
                            @endif
                            <div class="ml-3">
                                @if(!empty($landingPageItem->ad))
                                    <p class="h3 text-dark">{{ $landingPageItem->ad->title }}</p>
                                @else
                                    <p class="h3 text-dark">{{ strtoupper(str_replace('_', ' ', $landingPageItem->type)) }}</p>
                                @endif
                                    <span class="mb-1 badge badge-{{ $landingPageItem->status == 'published' ? 'success' : 'danger' }}">{{ ucfirst($landingPageItem->status) }}</span><br>
                                    @if(can('Delete Landing-Page-Item'))
                                    <button class='btn btn-sm btn-outline-danger item-delete-btn'  data-id="{{ $landingPageItem->id }}"><i class="fa fa-trash"></i> Remove</button>
                                    @endif
                            </div>
                        </div>
                    @endforeach
                </div>
              </div>
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

    let Block = document.getElementById('my-list');

    new Sortable(Block, {
        animation: 150,
        ghostClass: 'blue-background-class'
    });

    Block.addEventListener('dragend', function(e) {
        let payload = {};
        payload['data'] = [];
        payload['_token'] = "{{ csrf_token() }}";

        for(let i = 0; i < Block.children.length; i++) {
            payload['data'].push([
                Block.children[i].getAttribute('key'), i+1
            ]);
        }

        if (payload['data'].length) {
            $.ajax({
                url : "{{ route('backend.landing-page-item.sort') }}",
                type : 'POST',
                data : payload,
                success : function(response) {}
            });
        }
    });

    $('.item-delete-btn').click(function(){
        var id = $(this).data('id');
        var This = this;

        if(!confirm('Are you sure ?')) {
            return;
        }

        $.ajax({
            url: '{{ route("backend.landing-page-item.destroy", ":id") }}'.replace(':id', id),
            type: 'post',
            dataType: 'json',
            data: {
                '_token': '{{ csrf_token() }}',
                '_method': 'DELETE'
            },
            success: function(data) {
                toastr.success('Item deleted successfully');
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
