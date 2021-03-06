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
					Stage Management
				</h3>
			</div>
			@can('stage-create')
			<div class="kt-portlet__head-toolbar">
				<div class="kt-portlet__head-wrapper">
					<div class="kt-portlet__head-actions">

						<a href="{{ route('stage.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
							<i class="la la-plus"></i>
							Create New Stage
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
						<th>Sub Stage Name </th>
						<th>Icon </th>
						<th>Validity</th>
						<th>Stage Name </th>
						<th>Cteated By</th>
						<th>Created Date </th>

						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($stages as $key => $role)
					@php $totalrule = \DB::table('stage_rule')->where(['stageid'=>$role->id])->count();   @endphp
					<tr>
						<td>{{ ++$i }}</td>
						<td>{{ $role->name }}</td>
						<td><i class="{{ $role->icon }}" aria-hidden="true"></i></td>
						<td>{{ $role->validity }}</td>
						<td>{{ $role->cname }}</td>
						<td>{{ $role->uname }}</td>
						<td>{{ date('d M, Y h:i:a',strtotime($role->created_at)) }}</td>
						<td>
						<a class="btn btn-info" href="{{ url('stage/rule',$role->id) }}"><span class="kt-badge kt-badge--warning">{{$totalrule}}</span>Rule</a>
							@can('stage-edit')
							<a class="btn btn-primary" href="{{ route('stage.edit',$role->id) }}">Edit</a>
							@endcan
							@can('stage-delete')
							{!! Form::open(['method' => 'DELETE','route' => ['stage.destroy', $role->id],'style'=>'display:inline']) !!}
							{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
							{!! Form::close() !!}
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
