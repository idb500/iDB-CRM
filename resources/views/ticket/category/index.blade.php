@include('layouts.header')
@include('layouts.left_side_bar')
<script src="http://code.jquery.com/jquery-1.12.3.js"></script>
@section('content')

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    Ticket Category Management
                </h3>
            </div>
            @can('stage-create')
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">

                        <a href="{{ url('ticket/settings/category/create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                            <i class="la la-plus"></i>
                            Create New Category
                        </a>
                    </div>
                </div>
            </div>
            @endcan
        </div>
        <div class="kt-portlet__body">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable" id="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Color</th>
                        <th>Created Date </th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($TicketCategory as $key => $role)
                    <tr>
                        <td>{{ $i-- }}</td>
                        <td>{{ $role->category_name }}</td>
                        <td><span style="background:{{ $role->color_code }}">{{ $role->color_code }}</span></td>
                        <td>{{ date('d M, Y h:i:a',strtotime($role->created_at)) }}</td>
                        <td>
                            @can('stage-edit')
                            <a class="btn btn-primary" href="{{ url('ticket/settings/category', [$role->id]) }}">Edit</a>
                            @endcan
                            @can('stage-delete')
                                <form action="{{url('ticket/settings/category/delete')}}" method="post" style="display:inline">
                                    @csrf
                                    <input type="hidden" value="{{$role->id}}" name="category_id">
                                    <input type="submit" value="Delete" name="" class="btn btn-danger">
                                </form>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!--end: Datatable -->
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>
@endsection
@include('layouts.footer')