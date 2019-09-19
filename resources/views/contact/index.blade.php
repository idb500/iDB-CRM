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
											Contact
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
                     <th>Domain Name</th>
                     <th>Email</th>
                     <th>Phone</th>
                     <th>Country</th>
                     <th>City</th>
                     <th>Domain Registrar Name</th>
                     <th>Create Date</th>
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
           ajax: "{{ url('users-list') }}",
           columns: [
                    { data: 'id', name: 'id' },
                    { data: 'id', name: 'id' },
                    { data: 'registrant_email', name: 'registrant_email' },
					     { data: 'registrant_phone', name: 'registrant_phone' },
                    { data: 'registrant_country', name: 'registrant_country' },
                    { data: 'registrant_city', name: 'registrant_city' },
                    { data: 'domain_registrar_name', name: 'domain_registrar_name' },
                    { data: 'created_date', name: 'created_date' },
                    { data: 'expiry_date', name: 'expiry_date' }
                 ]
        });
     });
  </script>





@endsection