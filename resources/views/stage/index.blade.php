@extends('layouts.app')


@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 

<div class="kt-portlet kt-portlet--mobile">
<div class="kt-portlet__head kt-portlet__head--lg">
									<div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-line-chart"></i>
										</span>
										<h3 class="kt-portlet__head-title">
											Stage
											<small>Management</small>
										</h3>
									</div>
									<div class="kt-portlet__head-toolbar">
										<div class="kt-portlet__head-wrapper">
											<div class="kt-portlet__head-actions">
											
												&nbsp;
												<a href="#" class="btn btn-brand btn-elevate btn-icon-sm">
													<i class="la la-plus"></i>
													New Record
												</a>
											</div>
										</div>
									</div>
                </div>
                <div class="kt-portlet__body">

									<!--begin: Search Form -->
								

									<!--end: Search Form -->
								</div>
              <div class="kt-portlet__body kt-portlet__body--fit">
              <table class="table table-bordered" id="laravel_datatable">
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>Stage Name</th>
                     <th>Validity</th>
                     <th>Category Name</th>
                     <th>Created Date</th>
                     <th>Action</th>
                  </tr>
               </thead>
            </table>
</div>
</div>
   
   <script>
   $(document).ready( function () {
    $('#laravel_datatable').DataTable({
           processing: true,
           serverSide: true,
           ajax: "{{ url('stages-list') }}",
           columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'validity', name: 'validity' },
                    { data: 'category', name: 'category' },
					     { data: 'created_date', name: 'created_date' },
                    { data: 'id', name: 'id' }
                    
        });
     });
  </script>





@endsection