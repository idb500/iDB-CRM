@extends('layouts.app')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="kt-portlet">
<form action="{{ url('/store') }}" method="post" class="kt-form kt-form--label-right">
    <div class="kt-portlet__body">
        <div class="form-group row">
			
           
               
					{{ csrf_field() }}
					<div class="col-lg-2">
					<input class="form-control" name="created_by" type="hidden" value="{{ Auth::user()->id }}">
					<label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand">
								<input type="checkbox" id="check_all"> Select All Contact
								<span></span>
				
                    </div>

                    <div class="col-lg-2">

                        <select class="form-control kt-font-brand" style="width: 180px" name="assignedto">
                            <option>Select Stage</option>
                            @foreach($stag as $value)
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
					</div>
					
					<div class="col-lg-2">
					<button type="submit" class="btn btn-primary">Submit</button>
                       </div>
        


</div>  
    </div>

</div>

@foreach ($contact as $key => $role)
<?php
$latestnote = \DB::table('list_note')->where(['list_id'=>$role->list_id])->orderBy('id', 'DESC')->first();   
?>
<div class="kt-portlet">
<label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand">
<input type="checkbox" class="checkbox" name="checkid[]" data-id="{{$role->id}}" value="{{ $role->id }}">
			<span></span>
</label>
							<div class="kt-portlet__body">
								
									<div class="kt-widget kt-widget--user-profile-3">
										<div class="kt-widget__top">
										<div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden-">
				{{ date('d',strtotime($role->created_date)) }}<br>
				{{ date('M',strtotime($role->created_date)) }}<br>
				{{ date('Y',strtotime($role->created_date)) }}
                </div>
                <div
                    class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden">
                    {{ date('d',strtotime($role->created_date)) }}<br>
				{{ date('M',strtotime($role->created_date)) }}<br>
				{{ date('Y',strtotime($role->created_date)) }}
                </div>
											<div class="kt-widget__content">
												<div class="kt-widget__head">
													<a href="" class="kt-widget__username">
														{{ $role->domain_name }}
														<i class="flaticon2-correct kt-font-success"></i>
													</a>
													<div class="kt-widget__action">
													@can('add-remainder')
														<button type="button" data-toggle="modal" data-target="#kt_scrollable_modal_remainder" id="{{ $role->id }}" class="btn btn-success btn-sm btn-upper view_data_remainder">Add Remainder</button>
													@endcan
														@can('list-note')
														<button type="button" data-toggle="modal" data-target="#kt_scrollable_modal_1" id="{{ $role->id }}" class="btn btn-brand btn-sm btn-upper view_data">Add Note</button>
													@endcan
													</div>
												</div>
												<div class="kt-widget__subhead">
												<a href="#"><i class="flaticon2-new-email"></i> {{ $role->registrant_email }}</a>
                        <a href="#"><i class="flaticon2-calendar-3"></i>{{ $role->	domain_registrar_name }} </a>
                        <a href="#"><i class="flaticon2-placeholder"></i>{{$role->registrant_phone}}</a>
												</div>
												<div class="kt-widget__info">
													<div class="kt-widget__desc">
													<b>Last Note :</b> {{ $latestnote->description }}
													</div>
												
												</div>
											</div>
										</div>
										<div class="kt-widget__bottom">
											<div class="kt-widget__item">
												<div class="kt-widget__icon">
													<i class="flaticon-piggy-bank"></i>
												</div>
												<div class="kt-widget__details">
													<span class="kt-widget__title">Earnings</span>
													<span class="kt-widget__value"><span>$</span>249,500</span>
												</div>
											</div>
											<div class="kt-widget__item">
												<div class="kt-widget__icon">
													<i class="flaticon-confetti"></i>
												</div>
												<div class="kt-widget__details">
													<span class="kt-widget__title">Expenses</span>
													<span class="kt-widget__value"><span>$</span>164,700</span>
												</div>
											</div>
											<div class="kt-widget__item">
												<div class="kt-widget__icon">
													<i class="flaticon-pie-chart"></i>
												</div>
												<div class="kt-widget__details">
													<span class="kt-widget__title">Net</span>
													<span class="kt-widget__value"><span>$</span>782,300</span>
												</div>
											</div>
											<div class="kt-widget__item">
												<div class="kt-widget__icon">
													<i class="flaticon-file-2"></i>
												</div>
												<div class="kt-widget__details">
													<span class="kt-widget__title">73 Tasks</span>
													<a href="#" class="kt-widget__value kt-font-brand">View</a>
												</div>
											</div>
											<div class="kt-widget__item">
												<div class="kt-widget__icon">
													<i class="flaticon-chat-1"></i>
												</div>
												<div class="kt-widget__details">
													<span class="kt-widget__title">648 Comments</span>
													<a href="#" class="kt-widget__value kt-font-brand">View</a>
												</div>
											</div>
										
										</div>
									</div>
								</div>
							</div>
							@endforeach
							<!--end:: Portlet-->
							</form>
							
      <div class="modal fade" id="kt_scrollable_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">New Note</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<div class="kt-scroll" data-scroll="true">
<form action="{{ url('/listnote3') }}" method="post">
{{ csrf_field() }}
<div class="form-group">
<label for="recipient-name" class="form-control-label">Subject:</label>
<input class="form-control" name="created_by" type="hidden" value="{{ Auth::user()->id }}">
<input type="hidden" class="form-control" name="contactid" id="contactid" value>
<input type="text" class="form-control" name="subject" required>
</div>

<div class="form-group">
<label for="message-text" class="form-control-label">Description:</label>
<textarea class="form-control" name="description" rows="3" required></textarea>
</div>


<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>

<!--end:: note Modal-->
<div class="modal fade" id="kt_scrollable_modal_remainder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Remainder</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<div class="kt-scroll" data-scroll="true">
<form action="{{ url('/remainder') }}" method="post">
{{ csrf_field() }}
<div class="form-group">
<label for="recipient-name" class="form-control-label">Type:</label>
<input class="form-control" name="created_by" type="hidden" value="{{ Auth::user()->id }}">
<input type="hidden" class="form-control" name="contactid" id="contactidremainder" value>
<select class="form-control" name="typeid" required>
                            <option>Select Type</option>
                            @foreach($stag as $value)
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
</div>
<div class="form-group">
<label for="recipient-name" class="form-control-label">Date Time:</label>

<input type="text" id="kt_datetimepicker_3" class="form-control" name="datetimepicker" required>
</div>
<div class="form-group">
<label for="message-text" class="form-control-label">Remarks:</label>
<textarea class="form-control" name="description" rows="3" required></textarea>
</div>


<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
 $(document).ready(function(){  
      $('.view_data').click(function(){  
           var employee_detail = $(this).attr("id");
		   $("#contactid").val( employee_detail );
	  });

	  $('.view_data_remainder').click(function(){  
           var employee_detail101 = $(this).attr("id");
		   $("#contactidremainder").val( employee_detail101 );
	  });

	  $('#kt_datetimepicker_3').datetimepicker({
                       format: "dd/mm/yyyy hh:ii"
        });

	  $('#check_all').on('click', function(e) {
        if ($(this).is(':checked', true)) {
            $(".checkbox").prop('checked', true);
        } else {
            $(".checkbox").prop('checked', false);
        }
    });
 }); 
</script>       
						
@endsection