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
					No O List Management
				</h3>
			</div>
	

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
						<th>List Name </th>
                        <th>Filter</th>
						<th>Last Used By</th>
					

					</tr>
				</thead>
				<tbody>
                @php $i=0; @endphp
					@foreach ($stages as $key => $role)
@php                    $latestnote = \DB::table('list_note')->select('list_note.*','users.name as uname')->join("users", "users.id", "=", "list_note.created_by")->where(['list_note.list_id'=>$role->id])->orderBy('id', 'DESC')->first();    @endphp

					<tr>
						<td>{{ ++$i }}</td>
						<td>{{ $role->list_name }}</td>
						<td>{{ $role->filter_condition }}</td>
                        <td>
                        @if($latestnote!='') Added on <b>{{ date('d M, Y h:i a',strtotime($latestnote->created_at)) }}</b> By <b> {{ $latestnote->uname }} </b>	 {{ $latestnote->description }}  @endif
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
