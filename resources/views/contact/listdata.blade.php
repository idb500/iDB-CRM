@include('layouts.header')
@include('layouts.left_side_bar_bigdata')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!--begin:: Portlet-->
@php
$rolelist = \DB::table('list')->select('list.*','users.name as uname')->join("users", "list.created_by", "=", "users.id")->where('list.id','=',$listid)->first();  
$contactcountlist = \DB::table('contact')->where(['list_id'=>$rolelist->id])->count();   

$latestnotelist = \DB::table('list_note')->select('list_note.*','users.name as rname')->join("users", "users.id", "=", "list_note.created_by")->where(['list_note.list_id'=>$rolelist->id])->orderBy('id', 'DESC')->first();   
$latestnotelistcount = \DB::table('list_note')->select('list_note.*','users.name as rname')->join("users", "users.id", "=", "list_note.created_by")->where(['list_note.list_id'=>$rolelist->id])->count();   
  
@endphp
<div class="kt-portlet">
								<div class="kt-portlet__body">
									<div class="kt-widget kt-widget--user-profile-3">
										<div class="kt-widget__top">
                              <div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden-">
							  {{ date('d',strtotime($rolelist->created_date)) }}<br>
				{{ date('M',strtotime($rolelist->created_date)) }}<br>
				{{ date('Y',strtotime($rolelist->created_date)) }}
                </div>
											<div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden">
												JM
											</div>
											<div class="kt-widget__content">
												<div class="kt-widget__head">
												@can('contact')
													<a href="" class="kt-widget__username">
														{{ $rolelist->list_name}}
														
													</a>
													@endcan
													<div class="kt-widget__action">
                                    
													
													</div>
												</div>
												<div class="kt-widget__subhead">
												<a href="#"><i class="flaticon-time"></i>{{ date('d M, Y h:i a',strtotime($rolelist->created_date)) }}</a>
													<a href="#"><i class="flaticon2-calendar-3"></i>{{ $rolelist->uname }} </a>
												</div>
												<div class="kt-widget__info">
													<div class="kt-widget__desc">
                                                   <b>Filter Used :</b> {{ $rolelist->filter_condition }}
                                                </div>
													
												   </div>
												   <div class="kt-widget__info">
									<div class="kt-widget__desc">
                                          <b>Total Contacts:</b> {{$contactcountlist}}
													</div>
													
												</div>
                                    <div class="kt-widget__info">

									

													<div class="kt-widget__desc">
											
												<b>	Note: </b>@if($latestnotelist!='') Added on <b>{{ date('d M, Y h:i a',strtotime($latestnotelist->created_at)) }}</b> By <b>{{ $latestnotelist->rname }}</b><br/>
												{{ $latestnotelist->description }}  @endif
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
													<span class="kt-widget__value"><span></span>{{$latestnotelistcount}}</span>
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
<div class="kt-portlet">
<form action="{{ url('/store') }}" method="post" class="kt-form kt-form--label-right">
    <div class="kt-portlet__body">
        <div class="form-group row">
			
           
                    @can('contact-assigned')
					{{ csrf_field() }}
					<div class="col-lg-2">
					<input class="form-control" name="created_by" type="hidden" value="{{ Auth::user()->id }}">
					<label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand">
								<input type="checkbox" id="check_all"> Select All Contact
								<span></span>
				
                    </div>

                    <div class="col-lg-2">

                        <select class="form-control kt-font-brand" style="width: 180px" name="assignedto">
                            <option>Select Name</option>
                            @foreach($users as $value)
                            <option value="{{ $value->id }}">{{ $value->name }} - {{ $value->rname }}</option>
                            @endforeach
                        </select>
					</div>
					
					<div class="col-lg-2">
					<button type="submit" class="btn btn-primary">Submit</button>
                       </div>
                    @endcan


</div>  
    </div>

</div>
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
{{ $contact->render() }}
@php $i=0; @endphp
@foreach ($contact as $key => $role)
@php
$i++;
$contactid=$role->id;

$latestnote1 = \DB::table('list_note')->where(['contact_id'=>$contactid])->orderBy('id', 'DESC')->first();  
if($latestnote1!=''){
	$latestnote = \DB::table('list_note')->select('list_note.*','users.name as uname')->join("users", "users.id", "=", "list_note.created_by")->where(['list_note.contact_id'=>$contactid])->orderBy('id', 'DESC')->first();   
} else{
	$latestnote = \DB::table('list_note')->select('list_note.*','users.name as uname')->join("users", "users.id", "=", "list_note.created_by")->where(['list_note.list_id'=>$role->list_id])->orderBy('id', 'DESC')->first();    
}   
$latestnotecontactcount = \DB::table('list_note')->select('list_note.*','users.name as rname')->join("users", "users.id", "=", "list_note.created_by")->where(['list_note.contact_id'=>$contactid])->count();     
$remainderlatest = \DB::table('contact_remainder')->where([['contact_id','=',$contactid],['datetime' , '>=' ,date('Y-m-d H:i:s')]])->orderBy('datetime', 'ASC')->first(); 

$nooflistcount = DB::table('contact')->select(DB::raw('count(DISTINCT(list_id)) as name_count'))->where(['registrant_email'=>$role->registrant_email])->get();
$activeremaindercount = DB::table('contact_remainder')->where([['contact_id','=',$contactid],['datetime' , '>=' ,date('Y-m-d H:i:s')],['stage' , '=' ,0]])->count(); 
$totalreplycount = DB::table('bigdata_reply')->where([['contactid','=',$contactid],['stage' , '=' ,0]])->count(); 

$parameter= Crypt::encrypt($role->registrant_email);
@endphp
<script>
// Set the date we're counting down to
var countDownDate{{$i}} = new Date("@if($remainderlatest!='') {{ date('M d, Y H:i:s',strtotime($remainderlatest->datetime)) }} @endif").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance{{$i}} = countDownDate{{$i}} - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance{{$i}} / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance{{$i}} % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance{{$i}} % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance{{$i}} % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo{{$i}}").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo{{$i}}").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
<div class="kt-portlet">
<label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand">
<input type="checkbox" class="checkbox" name="checkid[]" data-id="{{$role->id}}" value="{{ $role->id }}">
			<span></span>
</label>
   
    <div class="kt-portlet__body">

        <div class="kt-widget kt-widget--user-profile-3">
            <div class="kt-widget__top">
            <div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden-" style="display: initial;background:#b3e5fc;">
		
		<img alt="Logo" src="{{ asset('assets/media/icons/countdowntimer.png') }}" class="timerImg"><br>
		
		@if($remainderlatest!='')	<p class="timertext" id="demo{{$i}}"></p> @endif
		
		</div>
                <div class="kt-widget__content">
                    <div class="kt-widget__head">
                        <a href="" class="kt-widget__username">
                            {{ $role->registrant_name }}
                          
                        </a>
                        <div class="kt-widget__action">
                        <a href="{{ url('/contactdetails') }}/{{ $role->id }}"><button type="button" class="btn btn-success btn-sm btn-upper view_data_remainder">Details</button></a>
																		
													@can('add-remainder')
														<button type="button" data-toggle="modal" data-target="#kt_scrollable_modal_remainder" id="{{ $role->id }}" class="btn btn-success btn-sm btn-upper view_data_remainder">Add Remainder</button>
													@endcan
                            @can('list-note')
														<button type="button" data-toggle="modal" data-target="#kt_scrollable_modal_1" id="{{ $role->id }}" class="btn btn-brand btn-sm btn-upper view_data">Add Contact Note</button>
													@endcan
													<button type="button" data-toggle="modal" data-target="#kt_scrollable_modal_addreplyform" id="{{ $role->id }}" class="btn btn-warning btn-sm btn-upper addreplyform">Add Reply Form</button>
													<button type="button" data-toggle="modal" data-target="#kt_scrollable_modal_stage" id="{{ $role->id }}" class="btn btn-danger btn-sm btn-upper stage">Stage</button>
													
                        </div>
                    </div>
                    <div class="kt-widget__subhead">
                    <a href="#"><i class="flaticon2-new-email"></i> {{ $role->registrant_email }}</a>
                        <a href="#"><i class="flaticon2-calendar-3"></i>{{ $role->	domain_registrar_name }} </a>
                        <a href="#"><i class="flaticon2-placeholder"></i>{{$role->registrant_phone}}</a>
						<a href="#"><i class="flaticon2-placeholder"></i>{{$role->registrant_city}}</a>
						<a href="#"><i class="flaticon2-placeholder"></i>{{$role->registrant_company}}</a>
                    </div>
                    <div class="kt-widget__info">
                        <div class="kt-widget__desc">
						<b>	Note: </b> @if($latestnote!='') Added on <b>{{ date('d M, Y h:i a',strtotime($latestnote->created_at)) }}</b> By <b> {{ $latestnote->uname }} </b>	</br> {{ $latestnote->description }}  @endif
                       
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
												<span class="kt-widget__title">Total Campaign Note</span>
													<span class="kt-widget__value"><span></span> {{ $latestnotecontactcount }} </span>
												</div>
											</div>
											<div class="kt-widget__item">
												<div class="kt-widget__icon">
													<i class="flaticon-confetti"></i>
												</div>
												<a href="{{ url('nooflist') }}/{{$parameter}}">
												<div class="kt-widget__details">
												
													<span class="kt-widget__title">No Of List</span>
													<span class="kt-widget__value">{{ $nooflistcount[0]->name_count }}</span>
												
												</div>
												</a>
											</div>
											<div class="kt-widget__item">
												<div class="kt-widget__icon">
													<i class="flaticon-pie-chart"></i>
												</div>
												<div class="kt-widget__details">
													<span class="kt-widget__title">Active Remainder</span>
													<span class="kt-widget__value">{{$activeremaindercount}}</span>
												</div>
											</div>
											<div class="kt-widget__item">
												<div class="kt-widget__icon">
													<i class="flaticon-file-2"></i>
												</div>
												<div class="kt-widget__details">
													<span class="kt-widget__title">Total Ticket</span>
													<a href="#" class="kt-widget__value kt-font-brand">52</a>
												</div>
											</div>
											<div class="kt-widget__item">
												<div class="kt-widget__icon">
													<i class="flaticon-chat-1"></i>
												</div>
												<div class="kt-widget__details">
													<span class="kt-widget__title">Total Reply</span>
													<a href="#" class="kt-widget__value kt-font-brand">{{$totalreplycount}}</a>
												</div>
											</div>
											<div class="kt-widget__item">
												<div class="kt-widget__icon">
													<i class="flaticon-chat-1"></i>
												</div>
												<div class="kt-widget__details">
													<span class="kt-widget__title">Total Notes</span>
													<a href="#" class="kt-widget__value kt-font-brand">{{ $latestnotecontactcount }}</a>
												</div>
											</div>
										
										</div>
        </div>
    </div>
</div>
@endforeach
<!--end:: Portlet-->

</form>

{{ $contact->render() }}
</div>
<div class="modal fade" id="kt_scrollable_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">New Contact Note</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<div class="kt-scroll" data-scroll="true">
<form action="{{ url('/listnote2') }}" method="post">
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
<form action="{{ url('/remaindercont') }}" method="post">
{{ csrf_field() }}
<div class="form-group">
<label for="recipient-name" class="form-control-label">Type:</label>
<input class="form-control" name="created_by" type="hidden" value="{{ Auth::user()->id }}">
<input type="hidden" class="form-control" name="contactid" id="contactidremainder" value>
<select class="form-control" name="typeid" required>
                            <option>Select Type</option>
                            @foreach($stag2 as $value)
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
</div>
<div class="form-group">
<label for="recipient-name" class="form-control-label">Date Time:</label>

<input type="text" class="form-control kt_datetimepicker_3" name="datetimepicker" required>
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

<div class="modal fade" id="kt_scrollable_modal_addreplyform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Add Reply Form</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<div class="kt-scroll" data-scroll="true">
<form action="{{ url('/addreply_form') }}" method="post">
{{ csrf_field() }}
<div class="form-group">
<label for="recipient-name" class="form-control-label">Source:</label>
<input class="form-control" name="created_by" type="hidden" value="{{ Auth::user()->id }}">
<input type="hidden" class="form-control" name="contactid" id="addreplyform" value>
<select class="form-control" name="typeid" required>
                            <option>Select Source</option>
                            @foreach($addreplyform as $value)
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
</div>

<div class="form-group">
<label for="recipient-name" class="form-control-label">Date Time:</label>

<input type="text" class="form-control kt_datetimepicker_3" name="datetimepicker" required>
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

<div class="modal fade" id="kt_scrollable_modal_stage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Stage Change</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<div class="kt-scroll" data-scroll="true">
<form action="{{ url('/stageform') }}" method="post">
{{ csrf_field() }}
<div class="form-group">
<label for="recipient-name" class="form-control-label">Stage:</label>
<input class="form-control" name="created_by" type="hidden" value="{{ Auth::user()->id }}">
<input type="hidden" class="form-control" name="contactid" id="stage" value>
<select class="form-control" name="typeid" required>
                            <option>Select Stage</option>
                            @foreach($stage as $value)
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
<script type="text/javascript">
 $(document).ready(function(){  
      $('.view_data').click(function(){  
           var employee_detail = $(this).attr("id");
		   $("#contactid").val( employee_detail );
	  });

	  $('.addreplyform').click(function(){  
           var addreplyform = $(this).attr("id");
		   $("#addreplyform").val( addreplyform );
	  });
	  $('.stage').click(function(){  
           var stage = $(this).attr("id");
		   $("#stage").val( stage );
	  });
 
 $('.view_data_remainder').click(function(){  
           var employee_detail101 = $(this).attr("id");
		   $("#contactidremainder").val( employee_detail101 );
	  });

	  $('.kt_datetimepicker_3').datetimepicker({
                    //    format: "dd/mm/yyyy hh:ii"
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
@include('layouts.footer')