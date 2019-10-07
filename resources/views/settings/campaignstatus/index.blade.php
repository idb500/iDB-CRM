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
					Campaign Status Management
				</h3>
			</div>
			@can('category-create')
			<div class="kt-portlet__head-toolbar">
				<div class="kt-portlet__head-wrapper">
					<div class="kt-portlet__head-actions">

						<a href="{{ route('campaignstatus.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
							<i class="la la-plus"></i>
							Create New Campaign Status
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
						<th>Name </th>
						<th>Icon </th>
						<th>Created By</th>
						<th>Created Date</th>

						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
				@php $i=0; @endphp
					@foreach ($stages as $key => $role)
					<tr>
						<td>{{ ++$i }}</td>
						<td>{{ $role->name }}</td>
						<td><i class="{{ $role->icon }}" aria-hidden="true"></i></td>
						<td>{{ $role->uname }}</td>
						<td>{{ date('d M, Y h:i a',strtotime($role->created_at)) }}</td>


						<td>

							@can('category-edit')
							<a class="btn btn-primary" href="{{ route('campaignstatus.edit',$role->id) }}">Edit</a>
							@endcan
							@can('category-delete')
							{!! Form::open(['method' => 'DELETE','route' => ['campaignstatus.destroy', $role->id],'style'=>'display:inline']) !!}
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