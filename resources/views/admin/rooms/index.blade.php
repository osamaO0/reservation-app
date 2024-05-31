@extends('layouts.admin')

@section('title', 'Rooms')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('admin/plugins/table/datatable/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/plugins/table/datatable/custom_dt_html5.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/plugins/table/datatable/dt-global_style.css')}}">
@endsection

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing" id="cancel-row">

        <a href="{{route('rooms.create')}}" class="btn btn-primary m-4">
            Add Room
        </a>

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Created At</th>
                            <th class="dt-no-sorting">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rooms as $room)
                        <tr>
                            <td>
                                @php $mediaItems = $room->getMedia("images") @endphp
                                <img src="{{$mediaItems[0]->getUrl()}}" alt="Room Image" style="width: 70px" height="70px">
                            </td>
                            <td>{{$room->name}}</td>
                            <td style="width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                {{$room->description}}
                            </td>
                            <td>{{$room->price}}</td>
                            <td>{{$room->created_at->format('d/m/Y')}}</td>
                            <td>
                                <a href="{{route('rooms.edit', $room->id)}}" class="btn btn-primary">Edit</a>
                                <form method="POST" action="{{ route('rooms.destroy', $room->id) }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this room?')">Delete</button>
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
@endsection
