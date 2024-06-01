@extends('layout.backend')
@section('title','Role')
@section('content')
<div class="container-fluid">
    <form action="{{ route('backend.role.edit', $role->id) }}" method="post">
      @csrf
      <div class="row justify-content-center">
          @foreach($permissionCategories as $category => $permissions)
          <div class="col-lg-4 col-xl-3 height-card box-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="single-smart-card d-flex">
                            <div class="icon mr-3">
                                <i class="zmdi zmdi-flower font-40 text-primary"></i>
                            </div>
                            <div class="text">
                                <h5>
                                  {{ $category }} <input type="checkbox" style="width:17px;height:17px" onchange="togglePermissionGroup(event, '{{ $category }}')">
                                </h5>
                                @foreach($permissions as $permission)
                                <div class="checkbox checkbox-primary" style="padding:0px;">
                                    <input type="checkbox" group="{{ $category }}" name="permissions[]" value="{{ $permission->id }}" id="checkbox-p-{{ $permission->id }}" @if(in_array($permission->id, $existingPermissionIds)) checked @endif>
                                    <label for="checkbox-p-{{ $permission->id }}" class="cr">{{ $permission->name }}</label>
                                </div>
                                @endforeach
                            </p></div>
                        </div>
                    </div>
                </div>
          </div>
          @endforeach
      </div>
      <div class="row justify-content-center">
          <button type="submit" class="btn btn-success">Submit</button>
      <div>
    </form>
</div>
@endsection

@section('script')
<script type="text/javascript">
    function togglePermissionGroup(event, category) {
      $(`input[group='${category}']`).prop('checked', event.target.checked);
    }
</script>
@endsection
