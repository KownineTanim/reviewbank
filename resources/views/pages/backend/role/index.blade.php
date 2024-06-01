@extends('layout.backend')
@section('title','Role')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 box-margin">
            <div class="filter-table">
                <div class="card">
                    <div class="card-body">
                        @if(session()->has('success'))
                          <p class="alert alert-primary">{{ session()->pull('success') }}</p>
                        @endif
                        <input type="text" class="input" id="role-filter-input" onkeyup="filter()" placeholder="Search for role names..">

                        <table class='table' id="role-table">
                            <tr class="header">
                                <th style="width:60%;">Role</th>
                                @if(can('Edit Role'))
                                <th style="width:40%;">Action</th>
                                @endif
                            </tr>

                            @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                @if(can('Edit Role'))
                                <td>
                                   <a href="{{ route('backend.role.edit', $role->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function filter() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("role-filter-input");
        filter = input.value.toUpperCase();
        table = document.getElementById("role-table");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
@endsection
