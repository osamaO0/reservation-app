@extends('layouts.admin')

@section('title', 'Users')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('admin/plugins/table/datatable/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/plugins/table/datatable/custom_dt_html5.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/plugins/table/datatable/dt-global_style.css')}}">


@endsection

@section('content')

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('users.store')}}" method="post">
            @csrf
            <div class="modal-body">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="roles">Roles</label>
                    <select class="js-example-basic-multiple" name="roles[]" multiple="multiple" style="width: 100%;">
                        @foreach ($roles as $role)
                            <option value="{{$role->name}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
    </form>
      </div>
    </div>
</div>


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalTitle">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editForm" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit_name">Name</label>
                        <input type="text" name="edit_name" id="edit_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="edit_email">Email</label>
                        <input type="email" name="edit_email" id="edit_email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="edit_password">Password</label>
                        <input type="password" name="edit_password" id="edit_password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="edit_roles">Roles</label>
                        <select class="js-example-basic-multiple" name="edit_roles[]" id="edit_roles" multiple="multiple" style="width: 100%;">
                            @foreach ($roles as $role)
                                <option value="{{$role->name}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="layout-px-spacing">

    <div class="row layout-top-spacing" id="cancel-row">

        <button type="button" class="btn btn-primary m-4" data-toggle="modal" data-target="#exampleModalLong">
            Add User
        </button>

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th>Created At</th>
                            <th class="dt-no-sorting">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @foreach ($user->roles as $role)
                                    <span class="badge badge-primary">{{$role->name}}</span>
                                @endforeach
                            </td>
                            <td>{{$user->created_at->format('d/m/Y')}}</td>
                            <td>
                                <button class="btn btn-primary edit-btn" data-id="{{$user->id}}" data-name="{{$user->name}}" data-email="{{$user->email}}" data-roles="{{json_encode($user->roles->pluck('name')->toArray())}}">Edit</button>
                                <form method="POST" action="{{ route('users.destroy', $user->id) }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>
@endsection

@section('js')
<script src="{{asset('admin/plugins/table/datatable/datatables.js')}}"></script>
<script src="{{asset('admin/plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin/plugins/table/datatable/button-ext/jszip.min.js')}}"></script>
<script src="{{asset('admin/plugins/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
<script src="{{asset('admin/plugins/table/datatable/button-ext/buttons.print.min.js')}}"></script>
<script>
    $('#html5-extension').DataTable( {
        "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
    "<'table-responsive'tr>" +
    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        buttons: {
            buttons: [
                { extend: 'copy', className: 'btn btn-sm' },
                { extend: 'csv', className: 'btn btn-sm' },
                { extend: 'excel', className: 'btn btn-sm' },
                { extend: 'print', className: 'btn btn-sm' }
            ]
        },
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [7, 10, 20, 50],
        "pageLength": 7
    } );
</script>



<script>
    $(document).ready(function() {
        $('#exampleModalLong').on('shown.bs.modal', function () {
            $('.js-example-basic-multiple').select2({
                dropdownParent: $('#exampleModalLong') // Ensures the dropdown is appended to the modal
            });
        });
    });
</script>

<script>
    $(document).on("click", ".edit-btn", function () {
        var userId = $(this).data('id');
        var userName = $(this).data('name');
        var userEmail = $(this).data('email');
        var userRoles = $(this).data('roles');

        $('#edit_name').val(userName);
        $('#edit_email').val(userEmail);
        $('#edit_roles').val(userRoles).trigger('change');
        $('#editForm').attr('action', '/admin/users/' + userId);
        $('.js-example-basic-multiple').select2({
            dropdownParent: $('#editModal')
        });
        $('#editModal').modal('show');
    });

</script>
@endsection
