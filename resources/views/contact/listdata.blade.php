@extends('layouts.app')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!--begin:: Portlet-->


<form action="{{ url('/store') }}" method="post">
@can('contact-assigned')
        {{ csrf_field() }}
		<div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="select all">Select All</label>
			<input class="form-control" name="created_by" type="hidden" value="{{ Auth::user()->id }}">
            
			<input type="checkbox" id="check_all">
        </div>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="description">Assigned To</label>
            <select class="form-control" name="assignedto">
                <option>Select name</option>
            @foreach($users as $value)
 <option value="{{ $value->id }}">{{ $value->name }}-{{ $value->rname }}</option>
 @endforeach
            </select>
        </div>
		</div>
        <button type="submit" class="btn btn-primary">Submit</button>
		@endcan
@foreach ($contact as $key => $role)
<div class="kt-portlet">
<input type="checkbox" class="checkbox" name="checkid[]" data-id="{{$role->id}}" value="{{ $role->id }}">
								<div class="kt-portlet__body">
								
									<div class="kt-widget kt-widget--user-profile-3">
										<div class="kt-widget__top">
											<div class="kt-widget__media kt-hidden-">
												<img src="assets/media/users/100_1.jpg" alt="image">
											</div>
											<div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden">
												JM
											</div>
											<div class="kt-widget__content">
												<div class="kt-widget__head">
													<a href="" class="kt-widget__username">
														{{ $role->domain_name }}
														<i class="flaticon2-correct kt-font-success"></i>
													</a>
													<div class="kt-widget__action">
														<button type="button" class="btn btn-label-success btn-sm btn-upper">ask</button>&nbsp;
														<button type="button" class="btn btn-brand btn-sm btn-upper">hire</button>
													</div>
												</div>
												<div class="kt-widget__subhead">
													<a href="#"><i class="flaticon2-new-email"></i>jason@siastudio.com</a>
													<a href="#"><i class="flaticon2-calendar-3"></i>PR Manager </a>
													<a href="#"><i class="flaticon2-placeholder"></i>Melbourne</a>
												</div>
												<div class="kt-widget__info">
													<div class="kt-widget__desc">
														I distinguish three main text objektive could be merely to inform people.
														<br> A second could be persuade people.You want people to bay objective
													</div>
													<div class="kt-widget__progress">
														<div class="kt-widget__text">
															Progress
														</div>
														<div class="progress" style="height: 5px;width: 100%;">
															<div class="progress-bar kt-bg-success" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
														<div class="kt-widget__stats">
															78%
														</div>
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
							<script type="text/javascript">
$(document).ready(function () {
	$('#check_all').on('click', function(e) {
	 if($(this).is(':checked',true))  
	 {
		$(".checkbox").prop('checked', true);  
	 } else {  
		$(".checkbox").prop('checked',false);  
	 }  
	});
});
	</script>


@endsection