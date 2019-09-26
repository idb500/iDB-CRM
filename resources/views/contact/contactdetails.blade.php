@include('layouts.header')
@include('layouts.left_side_bar_sales')

@section('content')
     

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  

<!--begin:: Portlet-->
@foreach ($contact as $key => $role)
<?php
$contactid=$role->id;

$latestnote1 = \DB::table('list_note')->where(['contact_id'=>$contactid])->orderBy('id', 'DESC')->first();  

if($latestnote1!=''){
	$latestnote = \DB::table('list_note')->where(['contact_id'=>$contactid])->orderBy('id', 'DESC')->first();  
} else{
	$latestnote = \DB::table('list_note')->where(['list_id'=>$role->list_id])->orderBy('id', 'DESC')->first(); 
}
$remainderlatest = \DB::table('contact_remainder')->where([['contact_id','=',$contactid],['datetime' , '>=' ,date('Y-m-d H:i:s')]])->orderBy('datetime', 'ASC')->first(); 

$latestnote11 = \DB::table('list_note')->where([['list_id','=',$role->list_id],['stage','=',0]])->orderBy('id', 'DESC')->get(); 
$latestnote21 = \DB::table('list_note')->where([['contact_id','=',$contactid],['stage','=',0]])->orderBy('id', 'DESC')->get(); 
$latestnote31 = \DB::table('contact_remainder')->where([['contact_id','=',$contactid],['stage','=',0]])->orderBy('id', 'DESC')->get(); 
$array1 = array($latestnote11);
$array2 = array($latestnote21);
$array3 = array($latestnote31);
$newArray = array_merge($array1, $array2, $array3);
$singleArray = []; 
foreach($newArray as $array) {
    foreach($array as $k=>$v) {
        $singleArray[] = $v;
       }
    
}
 foreach($singleArray as $key=>$value) {
     $chanl[] = $value->created_at;
 }
 if(!empty($singleArray)) {  array_multisort($chanl,SORT_DESC,SORT_STRING,$singleArray);   }

  $latestnote12 = \DB::table('list_note')->where([['list_id','=',$role->list_id],['stage','=',1]])->orderBy('id', 'DESC')->get(); 
$latestnote22  = \DB::table('list_note')->where([['contact_id','=',$contactid],['stage','=',1]])->orderBy('id', 'DESC')->get(); 
$latestnote32 = \DB::table('contact_remainder')->where([['contact_id','=',$contactid],['stage','=',1]])->orderBy('id', 'DESC')->get(); 
$array12 = array($latestnote12);
$array22 = array($latestnote22);
$array32 = array($latestnote32);
$newArray2 = array_merge($array12, $array22, $array32);
$singleArray2 = []; 
foreach($newArray2 as $array2) {
    foreach($array2 as $k2=>$v2) {
        $singleArray2[] = $v2;
       }
    
}
 foreach($singleArray2 as $key2=>$value2) {
     $chanl2[] = $value2->created_at;
 }
  if(!empty($singleArray2)) { array_multisort($chanl2,SORT_DESC,SORT_STRING,$singleArray2); } 
  $latestnote13 = \DB::table('list_note')->where([['list_id','=',$role->list_id],['stage','=',2]])->orderBy('id', 'DESC')->get(); 
$latestnote23 = \DB::table('list_note')->where([['contact_id','=',$contactid],['stage','=',2]])->orderBy('id', 'DESC')->get(); 
$latestnote33 = \DB::table('contact_remainder')->where([['contact_id','=',$contactid],['stage','=',2]])->orderBy('id', 'DESC')->get(); 
$array13 = array($latestnote13);
$array23 = array($latestnote23);
$array33 = array($latestnote33);
$newArray3 = array_merge($array13, $array23, $array33);
$singleArray3 = []; 
foreach($newArray3 as $array3) {
    foreach($array3 as $k3=>$v3) {
        $singleArray3[] = $v3;
       }
    
}
 foreach($singleArray3 as $key3=>$value3) {
     $chanl3[] = $value3->created_at;
 }
 if(!empty($singleArray3)) { array_multisort($chanl3,SORT_DESC,SORT_STRING,$singleArray3);  }
  $latestnote14 = \DB::table('list_note')->where([['list_id','=',$role->list_id],['stage','=',3]])->orderBy('id', 'DESC')->get(); 
$latestnote24 = \DB::table('list_note')->where([['contact_id','=',$contactid],['stage','=',3]])->orderBy('id', 'DESC')->get(); 
$latestnote34 = \DB::table('contact_remainder')->where([['contact_id','=',$contactid],['stage','=',3]])->orderBy('id', 'DESC')->get(); 
$array14 = array($latestnote14);
$array24 = array($latestnote24);
$array34 = array($latestnote34);
$newArray4 = array_merge($array14, $array24, $array34);
$singleArray4 = []; 
foreach($newArray4 as $array4) {
    foreach($array4 as $k4=>$v4) {
        $singleArray4[] = $v4;
       }
    
}
 foreach($singleArray4 as $key4=>$value4) {
     $chanl4[] = $value4->created_at;
 }
 if(!empty($singleArray4)) {  array_multisort($chanl4,SORT_DESC,SORT_STRING,$singleArray4); }
// echo "<pre>";
// print_r($singleArray);
// echo "</pre>";
$stgchk=$role->stage;
?>

<script>
// Set the date we're counting down to
var countDownDate = new Date("@if($remainderlatest!='') {{ date('M d, Y H:i:s',strtotime($remainderlatest->datetime)) }} @endif").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
<div class="kt-portlet">
									
										<div class="kt-portlet__body">
											<ul class="nav nav-tabs nav-fill" role="tablist">
                                            <li class="nav-item">
													<a class="nav-link active" data-toggle="tab" href="#kt_tabs_1_1">BigData</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#kt_tabs_1_2" readonly>Contact</a>
												</li>
												@if($stgchk==0)
												<li class="nav-item">
													<a class="nav-link disabled" data-toggle="tab" href="#kt_tabs_1_3">Opportunity</a>
												</li>
												<li class="nav-item">
													<a class="nav-link disabled" data-toggle="tab" href="#kt_tabs_1_4">Lead</a>
												</li>
												<li class="nav-item">
													<a class="nav-link disabled" data-toggle="tab" href="#kt_tabs_1_5">Client</a>
												</li>
												@endif
												@if($stgchk==1)
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#kt_tabs_1_3">Opportunity</a>
												</li>
												<li class="nav-item">
													<a class="nav-link disabled" data-toggle="tab" href="#kt_tabs_1_4">Lead</a>
												</li>
												<li class="nav-item">
													<a class="nav-link disabled" data-toggle="tab" href="#kt_tabs_1_5">Client</a>
												</li>
												@endif
												@if($stgchk==2)
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#kt_tabs_1_3">Opportunity</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#kt_tabs_1_4">Lead</a>
												</li>
												<li class="nav-item">
													<a class="nav-link disabled" data-toggle="tab" href="#kt_tabs_1_5">Client</a>
												</li>
												@endif
												@if($stgchk==3)
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#kt_tabs_1_3">Opportunity</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#kt_tabs_1_4">Lead</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#kt_tabs_1_5">Client</a>
												</li>
												@endif
											</ul>
											<div class="tab-content">
												<div class="tab-pane active" id="kt_tabs_1_1" role="tabpanel">
                                                <!-- tab 1 -->
                                                <div class="kt-portlet">
								<div class="kt-portlet__body">
									<div class="kt-widget kt-widget--user-profile-3">
										<div class="kt-widget__top">
                                        <div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden-" style="display: initial;background:#b3e5fc;">
		
		<img alt="Logo" src="{{ asset('assets/media/icons/countdowntimer.png') }}" class="timerImg"><br>
		
		@if($remainderlatest!='')	<p class="timertext" id="demo"></p> @endif
		
		</div>
											<div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden">
												JM
											</div>
											<div class="kt-widget__content">
												<div class="kt-widget__head">
											
													<a href="{{ url('/list') }}/{{ $role->id }}" class="kt-widget__username">
                                                    {{ $role->registrant_name }}
														
													</a>
													
													
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
													<b>Last Note :</b> @if($latestnote!='') {{ date('d M, Y h:i a',strtotime($latestnote->created_at)) }} {{ $latestnote->description }}  @endif
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
													<span class="kt-widget__value"><span></span>24</span>
												</div>
											</div>
											<div class="kt-widget__item">
												<div class="kt-widget__icon">
													<i class="flaticon-confetti"></i>
												</div>
												<div class="kt-widget__details">
												<span class="kt-widget__title">No Of List</span>
													<span class="kt-widget__value"><span></span>16</span>
												</div>
											</div>
											<div class="kt-widget__item">
												<div class="kt-widget__icon">
													<i class="flaticon-pie-chart"></i>
												</div>
												<div class="kt-widget__details">
                                                <span class="kt-widget__title">Active Remainder</span>
													<span class="kt-widget__value"><span></span>78</span>
												</div>
											</div>
                                            <div class="kt-widget__item">
												<div class="kt-widget__icon">
													<i class="flaticon-chat-1"></i>
												</div>
												<div class="kt-widget__details">
													<span class="kt-widget__title">Total Notes</span>
													<a href="#" class="kt-widget__value kt-font-brand">5</a>
												</div>
											</div>
											<div class="kt-widget__item">
												<div class="kt-widget__icon">
													<i class="flaticon-pie-chart"></i>
												</div>
												<div class="kt-widget__details">
                                                <span class="kt-widget__title">Total Ticket</span>
													<a href="#" class="kt-widget__value kt-font-brand">10</a>
												</div>
											</div>
											<div class="row">
								<div class="col-lg-12">

									<!--Begin::Portlet-->
                                    <div class="kt-portlet" style="margin-top:3%;">
                                    <div class="col-lg-12" style="padding: 10px;border-bottom: 1px solid #dee2e6;">Contact</div>
										<div class="kt-portlet__body">
											<div class="kt-notes">
												<div class="kt-notes__items">
                                                @foreach ($singleArray as $rolgfe)
													<div class="kt-notes__item">
														<div class="kt-notes__media">
															<span class="kt-notes__icon">
                                                            @if(!empty($rolgfe->type_id))
                                                            <?php  $iconclass = \DB::table('note_type')->where(['id'=>$rolgfe->type_id])->first();  ?>
                                                            <i class="{{ $iconclass->icon }}"></i> 
                                                          
															@endif
                                                            @if(!empty($rolgfe->type))
                                                          <?php  $iconclass = \DB::table('note_type')->where(['id'=>$rolgfe->type])->first();  ?>
                                                            <i class="{{ $iconclass->icon }}"></i>
                                                           
															@endif
															@if(!empty($rolgfe->sub_type))
                                                            <?php  $iconclass = \DB::table('stages')->where(['id'=>$rolgfe->sub_type])->first();  ?>
                                                            <i class="{{ $iconclass->icon }}"></i> 
                                                          
															@endif
															</span>
														</div>
														<div class="kt-notes__content">
															<div class="kt-notes__section">
																<div class="kt-notes__info">
																	<a href="#" class="kt-notes__title">
                                                                    @if(!empty($rolgfe->created_by))
                                                          <?php  $createdbyname = \DB::table('users')->where(['id'=>$rolgfe->created_by])->first();  ?>
                                                           {{ $createdbyname->name }}
                                                           
															@endif
																	</a>
																	<span class="kt-notes__desc">
                                                                    {{ date('d M, Y h:i a',strtotime($rolgfe->created_at)) }}
																	</span>
																
																</div>
															</div>
															<span class="kt-notes__body">
                                                           
                                                        @if(!empty($rolgfe->description)) {{ $rolgfe->description }} @endif
                                                        @if(!empty($rolgfe->remarks)) {{ $rolgfe->remarks }} @endif
                                                        @if(!empty($rolgfe->datetime)) ( {{ date('d M, Y h:i a',strtotime($rolgfe->datetime)) }} ) @endif
															</span>
														</div>
													</div>
											
                            @endforeach
												</div>
											</div>
                                        </div>
                                        <div class="col-lg-12" style="padding: 10px;border-bottom: 1px solid #dee2e6;">Ticketing System</div>
                                        <div class="kt-portlet__body">
											<div class="kt-notes">
												<div class="kt-notes__items">
													<div class="kt-notes__item">
														<div class="kt-notes__media">
															<span class="kt-notes__icon">
																<!-- <i class="flaticon2-shield kt-font-brand"></i> -->
															</span>
														</div>
														<div class="kt-notes__content">
															<div class="kt-notes__section">
																<div class="kt-notes__info">
																	<a href="#" class="kt-notes__title">
																		who did it (name)
																	</a>
																	<span class="kt-notes__desc">
																		whem (date and time)
																	</span>
																	<span class="kt-badge kt-badge--brand kt-badge--inline">Status</span>
																</div>
															</div>
															<span class="kt-notes__body">
																message like:<br>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto.
															</span>
                                                        </div><br>
                                                        <div class="kt-mycart__button">
													<button type="button" class="btn btn-success btn-sm" style=" ">Reply</button>
												</div>
													</div>
													<div class="kt-notes__item">
														<div class="kt-notes__media">
															<span class="kt-notes__icon">
																<!-- <i class="flaticon2-line-chart kt-font-success"></i> -->
															</span>
														</div>
														<div class="kt-notes__content">
															<div class="kt-notes__section">
																<div class="kt-notes__info">
																	<a href="#" class="kt-notes__title">
																		who did it (name)
																	</a>
																	<span class="kt-notes__desc">
																		whem (date and time)
																	</span>
																	<span class="kt-badge kt-badge--brand kt-badge--inline">Status</span>
																</div>
															</div>
															<span class="kt-notes__body">
																message like:<br>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto.
															</span>
                                                        </div><br>
                                                        <div class="kt-mycart__button">
													<button type="button" class="btn btn-success btn-sm" style=" ">Reply</button>
												</div>
													</div>
												</div>
											</div>
                                        </div>
									</div>

									<!--End::Portlet-->
								</div>
							</div>
										</div>
									</div>
								</div>
							</div>
                                                </div>
                                                <div class="tab-pane" id="kt_tabs_1_2" role="tabpanel">
													<!-- tab 2 -->
                                                    <div class="kt-portlet">
								<div class="kt-portlet__body">
									<div class="kt-widget kt-widget--user-profile-3">
										<div class="kt-widget__top">
                                        <div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden-" style="display: initial;background:#b3e5fc;">
		
		<img alt="Logo" src="{{ asset('assets/media/icons/countdowntimer.png') }}" class="timerImg"><br>
		
		@if($remainderlatest!='')	<p class="timertext" id="demo"></p> @endif
		
		</div>
											<div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden">
												JM
											</div>
											<div class="kt-widget__content">
												<div class="kt-widget__head">
											
													<a href="{{ url('/list') }}/{{ $role->id }}" class="kt-widget__username">
                                                    {{ $role->registrant_name }}
														
													</a>
													
													
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
													<b>Last Note :</b> @if($latestnote!='') {{ date('d M, Y h:i a',strtotime($latestnote->created_at)) }} {{ $latestnote->description }}  @endif
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
													<span class="kt-widget__value"><span></span>24</span>
												</div>
											</div>
											<div class="kt-widget__item">
												<div class="kt-widget__icon">
													<i class="flaticon-confetti"></i>
												</div>
												<div class="kt-widget__details">
												<span class="kt-widget__title">No Of List</span>
													<span class="kt-widget__value"><span></span>16</span>
												</div>
											</div>
											<div class="kt-widget__item">
												<div class="kt-widget__icon">
													<i class="flaticon-pie-chart"></i>
												</div>
												<div class="kt-widget__details">
                                                <span class="kt-widget__title">Active Remainder</span>
													<span class="kt-widget__value"><span></span>78</span>
												</div>
											</div>
                                            <div class="kt-widget__item">
												<div class="kt-widget__icon">
													<i class="flaticon-chat-1"></i>
												</div>
												<div class="kt-widget__details">
													<span class="kt-widget__title">Total Notes</span>
													<a href="#" class="kt-widget__value kt-font-brand">5</a>
												</div>
											</div>
											<div class="kt-widget__item">
												<div class="kt-widget__icon">
													<i class="flaticon-pie-chart"></i>
												</div>
												<div class="kt-widget__details">
                                                <span class="kt-widget__title">Total Ticket</span>
													<a href="#" class="kt-widget__value kt-font-brand">10</a>
												</div>
											</div>
											<div class="row">
								<div class="col-lg-12">

									<!--Begin::Portlet-->
                                    <div class="kt-portlet" style="margin-top:3%;">
                                    <div class="col-lg-12" style="padding: 10px;border-bottom: 1px solid #dee2e6;">Contact</div>
										<div class="kt-portlet__body">
											<div class="kt-notes">
												<div class="kt-notes__items">
                                                @foreach ($singleArray2 as $rolgfe)
													<div class="kt-notes__item">
														<div class="kt-notes__media">
															<span class="kt-notes__icon">
                                                            @if(!empty($rolgfe->type_id))
                                                            <?php  $iconclass = \DB::table('note_type')->where(['id'=>$rolgfe->type_id])->first();  ?>
                                                            <i class="{{ $iconclass->icon }}"></i> 
                                                          
															@endif
                                                            @if(!empty($rolgfe->type))
                                                          <?php  $iconclass = \DB::table('note_type')->where(['id'=>$rolgfe->type])->first();  ?>
                                                            <i class="{{ $iconclass->icon }}"></i>
                                                           
															@endif
															@if(!empty($rolgfe->sub_type))
                                                            <?php  $iconclass = \DB::table('stages')->where(['id'=>$rolgfe->sub_type])->first();  ?>
                                                            <i class="{{ $iconclass->icon }}"></i> 
                                                          
															@endif
															</span>
														</div>
														<div class="kt-notes__content">
															<div class="kt-notes__section">
																<div class="kt-notes__info">
																	<a href="#" class="kt-notes__title">
                                                                    @if(!empty($rolgfe->created_by))
                                                          <?php  $createdbyname = \DB::table('users')->where(['id'=>$rolgfe->created_by])->first();  ?>
                                                           {{ $createdbyname->name }}
                                                           
															@endif
																	</a>
																	<span class="kt-notes__desc">
                                                                    {{ date('d M, Y h:i a',strtotime($rolgfe->created_at)) }}
																	</span>
																
																</div>
															</div>
															<span class="kt-notes__body">
                                                           
                                                        @if(!empty($rolgfe->description)) {{ $rolgfe->description }} @endif
                                                        @if(!empty($rolgfe->remarks)) {{ $rolgfe->remarks }} @endif
                                                        @if(!empty($rolgfe->datetime)) ( {{ date('d M, Y h:i a',strtotime($rolgfe->datetime)) }} ) @endif
															</span>
														</div>
													</div>
											
                            @endforeach
												</div>
											</div>
                                        </div>
                                        <div class="col-lg-12" style="padding: 10px;border-bottom: 1px solid #dee2e6;">Ticketing System</div>
                                        <div class="kt-portlet__body">
											<div class="kt-notes">
												<div class="kt-notes__items">
													<div class="kt-notes__item">
														<div class="kt-notes__media">
															<span class="kt-notes__icon">
																<!-- <i class="flaticon2-shield kt-font-brand"></i> -->
															</span>
														</div>
														<div class="kt-notes__content">
															<div class="kt-notes__section">
																<div class="kt-notes__info">
																	<a href="#" class="kt-notes__title">
																		who did it (name)
																	</a>
																	<span class="kt-notes__desc">
																		whem (date and time)
																	</span>
																	<span class="kt-badge kt-badge--brand kt-badge--inline">Status</span>
																</div>
															</div>
															<span class="kt-notes__body">
																message like:<br>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto.
															</span>
                                                        </div><br>
                                                        <div class="kt-mycart__button">
													<button type="button" class="btn btn-success btn-sm" style=" ">Reply</button>
												</div>
													</div>
													<div class="kt-notes__item">
														<div class="kt-notes__media">
															<span class="kt-notes__icon">
																<!-- <i class="flaticon2-line-chart kt-font-success"></i> -->
															</span>
														</div>
														<div class="kt-notes__content">
															<div class="kt-notes__section">
																<div class="kt-notes__info">
																	<a href="#" class="kt-notes__title">
																		who did it (name)
																	</a>
																	<span class="kt-notes__desc">
																		whem (date and time)
																	</span>
																	<span class="kt-badge kt-badge--brand kt-badge--inline">Status</span>
																</div>
															</div>
															<span class="kt-notes__body">
																message like:<br>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto.
															</span>
                                                        </div><br>
                                                        <div class="kt-mycart__button">
													<button type="button" class="btn btn-success btn-sm" style=" ">Reply</button>
												</div>
													</div>
												</div>
											</div>
                                        </div>
									</div>

									<!--End::Portlet-->
								</div>
							</div>
										</div>
									</div>
								</div>
							</div>
                                                </div>
                                                <div class="tab-pane" id="kt_tabs_1_3" role="tabpanel">
                                                <!-- tab 3 -->
                                                <div class="kt-portlet">
								<div class="kt-portlet__body">
									<div class="kt-widget kt-widget--user-profile-3">
										<div class="kt-widget__top">
                                        <div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden-" style="display: initial;background:#b3e5fc;">
		
		<img alt="Logo" src="{{ asset('assets/media/icons/countdowntimer.png') }}" class="timerImg"><br>
		
		@if($remainderlatest!='')	<p class="timertext" id="demo"></p> @endif
		
		</div>
											<div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden">
												JM
											</div>
											<div class="kt-widget__content">
												<div class="kt-widget__head">
											
													<a href="{{ url('/list') }}/{{ $role->id }}" class="kt-widget__username">
                                                    {{ $role->registrant_name }}
														
													</a>
													
													
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
													<b>Last Note :</b> @if($latestnote!='') {{ date('d M, Y h:i a',strtotime($latestnote->created_at)) }} {{ $latestnote->description }}  @endif
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
													<span class="kt-widget__value"><span></span>24</span>
												</div>
											</div>
											<div class="kt-widget__item">
												<div class="kt-widget__icon">
													<i class="flaticon-confetti"></i>
												</div>
												<div class="kt-widget__details">
												<span class="kt-widget__title">No Of List</span>
													<span class="kt-widget__value"><span></span>16</span>
												</div>
											</div>
											<div class="kt-widget__item">
												<div class="kt-widget__icon">
													<i class="flaticon-pie-chart"></i>
												</div>
												<div class="kt-widget__details">
                                                <span class="kt-widget__title">Active Remainder</span>
													<span class="kt-widget__value"><span></span>78</span>
												</div>
											</div>
                                            <div class="kt-widget__item">
												<div class="kt-widget__icon">
													<i class="flaticon-chat-1"></i>
												</div>
												<div class="kt-widget__details">
													<span class="kt-widget__title">Total Notes</span>
													<a href="#" class="kt-widget__value kt-font-brand">5</a>
												</div>
											</div>
											<div class="kt-widget__item">
												<div class="kt-widget__icon">
													<i class="flaticon-pie-chart"></i>
												</div>
												<div class="kt-widget__details">
                                                <span class="kt-widget__title">Total Ticket</span>
													<a href="#" class="kt-widget__value kt-font-brand">10</a>
												</div>
											</div>
											<div class="row">
								<div class="col-lg-12">

									<!--Begin::Portlet-->
                                    <div class="kt-portlet" style="margin-top:3%;">
                                    <div class="col-lg-12" style="padding: 10px;border-bottom: 1px solid #dee2e6;">Contact</div>
										<div class="kt-portlet__body">
											<div class="kt-notes">
												<div class="kt-notes__items">
                                                @foreach ($singleArray3 as $rolgfe)
													<div class="kt-notes__item">
														<div class="kt-notes__media">
															<span class="kt-notes__icon">
                                                            @if(!empty($rolgfe->type_id))
                                                            <?php  $iconclass = \DB::table('note_type')->where(['id'=>$rolgfe->type_id])->first();  ?>
                                                            <i class="{{ $iconclass->icon }}"></i> 
                                                          
															@endif
                                                            @if(!empty($rolgfe->type))
                                                          <?php  $iconclass = \DB::table('note_type')->where(['id'=>$rolgfe->type])->first();  ?>
                                                            <i class="{{ $iconclass->icon }}"></i>
                                                           
															@endif
															@if(!empty($rolgfe->sub_type))
                                                            <?php  $iconclass = \DB::table('stages')->where(['id'=>$rolgfe->sub_type])->first();  ?>
                                                            <i class="{{ $iconclass->icon }}"></i> 
                                                          
															@endif
															</span>
														</div>
														<div class="kt-notes__content">
															<div class="kt-notes__section">
																<div class="kt-notes__info">
																	<a href="#" class="kt-notes__title">
                                                                    @if(!empty($rolgfe->created_by))
                                                          <?php  $createdbyname = \DB::table('users')->where(['id'=>$rolgfe->created_by])->first();  ?>
                                                           {{ $createdbyname->name }}
                                                           
															@endif
																	</a>
																	<span class="kt-notes__desc">
                                                                    {{ date('d M, Y h:i a',strtotime($rolgfe->created_at)) }}
																	</span>
																
																</div>
															</div>
															<span class="kt-notes__body">
                                                           
                                                        @if(!empty($rolgfe->description)) {{ $rolgfe->description }} @endif
                                                        @if(!empty($rolgfe->remarks)) {{ $rolgfe->remarks }} @endif
                                                        @if(!empty($rolgfe->datetime)) ( {{ date('d M, Y h:i a',strtotime($rolgfe->datetime)) }} ) @endif
															</span>
														</div>
													</div>
											
                            @endforeach
												</div>
											</div>
                                        </div>
                                        <div class="col-lg-12" style="padding: 10px;border-bottom: 1px solid #dee2e6;">Ticketing System</div>
                                        <div class="kt-portlet__body">
											<div class="kt-notes">
												<div class="kt-notes__items">
													<div class="kt-notes__item">
														<div class="kt-notes__media">
															<span class="kt-notes__icon">
																<!-- <i class="flaticon2-shield kt-font-brand"></i> -->
															</span>
														</div>
														<div class="kt-notes__content">
															<div class="kt-notes__section">
																<div class="kt-notes__info">
																	<a href="#" class="kt-notes__title">
																		who did it (name)
																	</a>
																	<span class="kt-notes__desc">
																		whem (date and time)
																	</span>
																	<span class="kt-badge kt-badge--brand kt-badge--inline">Status</span>
																</div>
															</div>
															<span class="kt-notes__body">
																message like:<br>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto.
															</span>
                                                        </div><br>
                                                        <div class="kt-mycart__button">
													<button type="button" class="btn btn-success btn-sm" style=" ">Reply</button>
												</div>
													</div>
													<div class="kt-notes__item">
														<div class="kt-notes__media">
															<span class="kt-notes__icon">
																<!-- <i class="flaticon2-line-chart kt-font-success"></i> -->
															</span>
														</div>
														<div class="kt-notes__content">
															<div class="kt-notes__section">
																<div class="kt-notes__info">
																	<a href="#" class="kt-notes__title">
																		who did it (name)
																	</a>
																	<span class="kt-notes__desc">
																		whem (date and time)
																	</span>
																	<span class="kt-badge kt-badge--brand kt-badge--inline">Status</span>
																</div>
															</div>
															<span class="kt-notes__body">
																message like:<br>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto.
															</span>
                                                        </div><br>
                                                        <div class="kt-mycart__button">
													<button type="button" class="btn btn-success btn-sm" style=" ">Reply</button>
												</div>
													</div>
												</div>
											</div>
                                        </div>
									</div>

									<!--End::Portlet-->
								</div>
							</div>
										</div>
									</div>
								</div>
							</div>
                                                </div>
                                                <div class="tab-pane" id="kt_tabs_1_4" role="tabpanel">
													<!-- tab 4 -->
                                                    <div class="kt-portlet">
								<div class="kt-portlet__body">
									<div class="kt-widget kt-widget--user-profile-3">
										<div class="kt-widget__top">
                                        <div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden-" style="display: initial;background:#b3e5fc;">
		
		<img alt="Logo" src="{{ asset('assets/media/icons/countdowntimer.png') }}" class="timerImg"><br>
		
		@if($remainderlatest!='')	<p class="timertext" id="demo"></p> @endif
		
		</div>
											<div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden">
												JM
											</div>
											<div class="kt-widget__content">
												<div class="kt-widget__head">
											
													<a href="{{ url('/list') }}/{{ $role->id }}" class="kt-widget__username">
                                                    {{ $role->registrant_name }}
														
													</a>
													
													
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
													<b>Last Note :</b> @if($latestnote!='') {{ date('d M, Y h:i a',strtotime($latestnote->created_at)) }} {{ $latestnote->description }}  @endif
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
													<span class="kt-widget__value"><span></span>24</span>
												</div>
											</div>
											<div class="kt-widget__item">
												<div class="kt-widget__icon">
													<i class="flaticon-confetti"></i>
												</div>
												<div class="kt-widget__details">
												<span class="kt-widget__title">No Of List</span>
													<span class="kt-widget__value"><span></span>16</span>
												</div>
											</div>
											<div class="kt-widget__item">
												<div class="kt-widget__icon">
													<i class="flaticon-pie-chart"></i>
												</div>
												<div class="kt-widget__details">
                                                <span class="kt-widget__title">Active Remainder</span>
													<span class="kt-widget__value"><span></span>78</span>
												</div>
											</div>
                                            <div class="kt-widget__item">
												<div class="kt-widget__icon">
													<i class="flaticon-chat-1"></i>
												</div>
												<div class="kt-widget__details">
													<span class="kt-widget__title">Total Notes</span>
													<a href="#" class="kt-widget__value kt-font-brand">5</a>
												</div>
											</div>
											<div class="kt-widget__item">
												<div class="kt-widget__icon">
													<i class="flaticon-pie-chart"></i>
												</div>
												<div class="kt-widget__details">
                                                <span class="kt-widget__title">Total Ticket</span>
													<a href="#" class="kt-widget__value kt-font-brand">10</a>
												</div>
											</div>
											<div class="row">
								<div class="col-lg-12">

									<!--Begin::Portlet-->
                                    <div class="kt-portlet" style="margin-top:3%;">
                                    <div class="col-lg-12" style="padding: 10px;border-bottom: 1px solid #dee2e6;">Contact</div>
										<div class="kt-portlet__body">
											<div class="kt-notes">
												<div class="kt-notes__items">
                                                @foreach ($singleArray4 as $rolgfe)
													<div class="kt-notes__item">
														<div class="kt-notes__media">
															<span class="kt-notes__icon">
                                                            @if(!empty($rolgfe->type_id))
                                                            <?php  $iconclass = \DB::table('note_type')->where(['id'=>$rolgfe->type_id])->first();  ?>
                                                            <i class="{{ $iconclass->icon }}"></i> 
                                                          
															@endif
                                                            @if(!empty($rolgfe->type))
                                                          <?php  $iconclass = \DB::table('note_type')->where(['id'=>$rolgfe->type])->first();  ?>
                                                            <i class="{{ $iconclass->icon }}"></i>
                                                           
															@endif
															@if(!empty($rolgfe->sub_type))
                                                            <?php  $iconclass = \DB::table('stages')->where(['id'=>$rolgfe->sub_type])->first();  ?>
                                                            <i class="{{ $iconclass->icon }}"></i> 
                                                          
															@endif
															</span>
														</div>
														<div class="kt-notes__content">
															<div class="kt-notes__section">
																<div class="kt-notes__info">
																	<a href="#" class="kt-notes__title">
                                                                    @if(!empty($rolgfe->created_by))
                                                          <?php  $createdbyname = \DB::table('users')->where(['id'=>$rolgfe->created_by])->first();  ?>
                                                           {{ $createdbyname->name }}
                                                           
															@endif
																	</a>
																	<span class="kt-notes__desc">
                                                                    {{ date('d M, Y h:i a',strtotime($rolgfe->created_at)) }}
																	</span>
																
																</div>
															</div>
															<span class="kt-notes__body">
                                                           
                                                        @if(!empty($rolgfe->description)) {{ $rolgfe->description }} @endif
                                                        @if(!empty($rolgfe->remarks)) {{ $rolgfe->remarks }} @endif
                                                        @if(!empty($rolgfe->datetime)) ( {{ date('d M, Y h:i a',strtotime($rolgfe->datetime)) }} ) @endif
															</span>
														</div>
													</div>
											
                            @endforeach
												</div>
											</div>
                                        </div>
                                        <div class="col-lg-12" style="padding: 10px;border-bottom: 1px solid #dee2e6;">Ticketing System</div>
                                        <div class="kt-portlet__body">
											<div class="kt-notes">
												<div class="kt-notes__items">
													<div class="kt-notes__item">
														<div class="kt-notes__media">
															<span class="kt-notes__icon">
																<!-- <i class="flaticon2-shield kt-font-brand"></i> -->
															</span>
														</div>
														<div class="kt-notes__content">
															<div class="kt-notes__section">
																<div class="kt-notes__info">
																	<a href="#" class="kt-notes__title">
																		who did it (name)
																	</a>
																	<span class="kt-notes__desc">
																		whem (date and time)
																	</span>
																	<span class="kt-badge kt-badge--brand kt-badge--inline">Status</span>
																</div>
															</div>
															<span class="kt-notes__body">
																message like:<br>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto.
															</span>
                                                        </div><br>
                                                        <div class="kt-mycart__button">
													<button type="button" class="btn btn-success btn-sm" style=" ">Reply</button>
												</div>
													</div>
													<div class="kt-notes__item">
														<div class="kt-notes__media">
															<span class="kt-notes__icon">
																<!-- <i class="flaticon2-line-chart kt-font-success"></i> -->
															</span>
														</div>
														<div class="kt-notes__content">
															<div class="kt-notes__section">
																<div class="kt-notes__info">
																	<a href="#" class="kt-notes__title">
																		who did it (name)
																	</a>
																	<span class="kt-notes__desc">
																		whem (date and time)
																	</span>
																	<span class="kt-badge kt-badge--brand kt-badge--inline">Status</span>
																</div>
															</div>
															<span class="kt-notes__body">
																message like:<br>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto.
															</span>
                                                        </div><br>
                                                        <div class="kt-mycart__button">
													<button type="button" class="btn btn-success btn-sm" style=" ">Reply</button>
												</div>
													</div>
												</div>
											</div>
                                        </div>
									</div>

									<!--End::Portlet-->
								</div>
							</div>
										</div>
									</div>
								</div>
							</div>
												</div>
                                                <div class="tab-pane" id="kt_tabs_1_5" role="tabpanel">
                                                <!-- tab 5 -->
                                                <div class="kt-portlet">
								<div class="kt-portlet__body">
									<div class="kt-widget kt-widget--user-profile-3">
										<div class="kt-widget__top">
                                        <div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden-" style="display: initial;background:#b3e5fc;">
		
		<img alt="Logo" src="{{ asset('assets/media/icons/countdowntimer.png') }}" class="timerImg"><br>
		
		@if($remainderlatest!='')	<p class="timertext" id="demo"></p> @endif
		
		</div>
											<div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden">
												JM
											</div>
											<div class="kt-widget__content">
												<div class="kt-widget__head">
											
													<a href="{{ url('/list') }}/{{ $role->id }}" class="kt-widget__username">
                                                    {{ $role->registrant_name }}
														
													</a>
													
													
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
													<b>Last Note :</b> @if($latestnote!='') {{ date('d M, Y h:i a',strtotime($latestnote->created_at)) }} {{ $latestnote->description }}  @endif
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
													<span class="kt-widget__value"><span></span>24</span>
												</div>
											</div>
											<div class="kt-widget__item">
												<div class="kt-widget__icon">
													<i class="flaticon-confetti"></i>
												</div>
												<div class="kt-widget__details">
												<span class="kt-widget__title">No Of List</span>
													<span class="kt-widget__value"><span></span>16</span>
												</div>
											</div>
											<div class="kt-widget__item">
												<div class="kt-widget__icon">
													<i class="flaticon-pie-chart"></i>
												</div>
												<div class="kt-widget__details">
                                                <span class="kt-widget__title">Active Remainder</span>
													<span class="kt-widget__value"><span></span>78</span>
												</div>
											</div>
                                            <div class="kt-widget__item">
												<div class="kt-widget__icon">
													<i class="flaticon-chat-1"></i>
												</div>
												<div class="kt-widget__details">
													<span class="kt-widget__title">Total Notes</span>
													<a href="#" class="kt-widget__value kt-font-brand">5</a>
												</div>
											</div>
											<div class="kt-widget__item">
												<div class="kt-widget__icon">
													<i class="flaticon-pie-chart"></i>
												</div>
												<div class="kt-widget__details">
                                                <span class="kt-widget__title">Total Ticket</span>
													<a href="#" class="kt-widget__value kt-font-brand">10</a>
												</div>
											</div>
											<div class="row">
								
												</div>
											</div>
                                        </div>
                                      
									</div>

									<!--End::Portlet-->
								</div>
							</div>
										</div>
									</div>
								</div>
							</div>
												</div>
											</div>
										</div>
									</div>

							@endforeach
							<!--end:: Portlet-->
                       

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
<form action="{{ url('/listnote_contact') }}" method="post">
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
<form action="{{ url('/remainder_contact') }}" method="post">
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

<input type="text" id="kt_datetimepicker_3" class="form-control" name="datetimepicker" required>
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

	  $('.view_data_remainder').click(function(){  
           var employee_detail101 = $(this).attr("id");
		   $("#contactidremainder").val( employee_detail101 );
	  });

	  $('#kt_datetimepicker_3').datetimepicker({
                    //    format: "dd/mm/yyyy hh:ii"
        });

 }); 
</script>   
@endsection

@extends('layouts.footer')