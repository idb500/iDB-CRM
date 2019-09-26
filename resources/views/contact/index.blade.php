@include('layouts.header')
@include('layouts.left_side_bar_bigdata')

@section('content')
     

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  

<!--begin:: Portlet-->
@foreach ($contact as $key => $role)
<?php

$contactcount = \DB::table('contact')->where(['list_id'=>$role->id])->count();   
$latestnote = \DB::table('list_note')->where(['list_id'=>$role->id])->orderBy('id', 'DESC')->first();   
?>
<div class="kt-portlet">
								<div class="kt-portlet__body">
									<div class="kt-widget kt-widget--user-profile-3">
										<div class="kt-widget__top">
                              <div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden-">
							  {{ date('d',strtotime($role->created_date)) }}<br>
				{{ date('M',strtotime($role->created_date)) }}<br>
				{{ date('Y',strtotime($role->created_date)) }}
                </div>
											<div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden">
												JM
											</div>
											<div class="kt-widget__content">
												<div class="kt-widget__head">
												@can('contact')
													<a href="{{ url('/list') }}/{{ $role->id }}" class="kt-widget__username">
														{{ $role->list_name}}
														
													</a>
													@endcan
													<div class="kt-widget__action">
                                       <a href="{{ url('/list') }}/{{ $role->id }}">
														<button type="button" class="btn btn-label-success btn-sm btn-upper">Details</button></a>&nbsp;
														@can('list-note')
														<button type="button" data-toggle="modal" data-target="#kt_scrollable_modal_1" id="{{ $role->id }}" class="btn btn-brand btn-sm btn-upper view_data">Add Note</button>
													@endcan
													</div>
												</div>
												<div class="kt-widget__subhead">
												<a href="#"><i class="flaticon-time"></i>{{ date('d M, Y h:i a',strtotime($role->created_date)) }}</a>
													<a href="#"><i class="flaticon2-calendar-3"></i>{{ $role->uname }} </a>
												</div>
												<div class="kt-widget__info">
													<div class="kt-widget__desc">
                                                   <b>Filter Used :</b> {{ $role->filter_condition }}
                                                </div>
													
												   </div>
												   <div class="kt-widget__info">
									<div class="kt-widget__desc">
                                          <b>Total Contacts:</b> {{$contactcount}}
													</div>
													
												</div>
                                    <div class="kt-widget__info">

									

													<div class="kt-widget__desc">
													@if($latestnote!='') {{ date('d M, Y h:i a',strtotime($latestnote->created_at)) }} {{ $latestnote->description }}  @endif

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
													<span class="kt-widget__title">Total Campaign Done</span>
													<span class="kt-widget__value"><span></span>24500</span>
												</div>
											</div>
											<div class="kt-widget__item">
												<div class="kt-widget__icon">
													<i class="flaticon-confetti"></i>
												</div>
												<div class="kt-widget__details">
													<span class="kt-widget__title">Total Unsubscriber</span>
													<span class="kt-widget__value"><span></span>164</span>
												</div>
											</div>
											<div class="kt-widget__item">
												<div class="kt-widget__icon">
													<i class="flaticon-pie-chart"></i>
												</div>
												<div class="kt-widget__details">
													<span class="kt-widget__title">Total Blacklisted</span>
													<span class="kt-widget__value"><span></span>78</span>
												</div>
											</div>
											<div class="kt-widget__item">
												<div class="kt-widget__icon">
													<i class="flaticon-pie-chart"></i>
												</div>
												<div class="kt-widget__details">
													<span class="kt-widget__title">Total Move to Opportunity</span>
													<span class="kt-widget__value"><span></span>782</span>
												</div>
											</div>
											
											
										</div>
									</div>
								</div>
							</div>
							@endforeach
							<!--end:: Portlet-->
                       


<!-- note model start -->

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
<form action="{{ url('/listnote') }}" method="post">
{{ csrf_field() }}
<div class="form-group">
<label for="recipient-name" class="form-control-label">Type:</label>
<input class="form-control" name="created_by" type="hidden" value="{{ Auth::user()->id }}">
<input type="hidden" class="form-control" name="contactid" id="contactid" value>
<select class="form-control" name="typeid" required>
                            <option>Select Type</option>
                            @foreach($stag2 as $value)
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
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

<script>  
 $(document).ready(function(){  
      $('.view_data').click(function(){  
           var employee_detail = $(this).attr("id");
		   $("#contactid").val( employee_detail );
	  });
 }); 
</script>

@endsection
@include('layouts.footer')