@extends('layouts.app')


@section('content')



<!--begin:: Portlet-->
@foreach ($contact as $key => $role)


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
														<i class="flaticon2-correct kt-font-success"></i>
													</a>
													@endcan
													<div class="kt-widget__action">
                                       <a href="http://localhost/lms/list/{{ $role->id }}">
														<button type="button" class="btn btn-label-success btn-sm btn-upper">Details</button></a>&nbsp;
														<button type="button" class="btn btn-brand btn-sm btn-upper">Add Note</button>
													</div>
												</div>
												<div class="kt-widget__subhead">
													<a href="#"><i class="flaticon2-new-email"></i>jason@siastudio.com</a>
													<a href="#"><i class="flaticon2-calendar-3"></i>PR Manager </a>
													<a href="#"><i class="flaticon2-placeholder"></i>Melbourne</a>
												</div>
												<div class="kt-widget__info">
													<div class="kt-widget__desc">
                                          <b>Filter Used:</b>
                                         
													</div>
													
                                    </div>
                                    <div class="kt-widget__info">
													<div class="kt-widget__desc">
                                          <b>Last Note:</b>
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
													<span class="kt-widget__value"><span>$</span>249,500</span>
												</div>
											</div>
											<div class="kt-widget__item">
												<div class="kt-widget__icon">
													<i class="flaticon-confetti"></i>
												</div>
												<div class="kt-widget__details">
													<span class="kt-widget__title">Total Unsubscriber</span>
													<span class="kt-widget__value"><span>$</span>164,700</span>
												</div>
											</div>
											<div class="kt-widget__item">
												<div class="kt-widget__icon">
													<i class="flaticon-pie-chart"></i>
												</div>
												<div class="kt-widget__details">
													<span class="kt-widget__title">Total Blacklisted</span>
													<span class="kt-widget__value"><span>$</span>782,300</span>
												</div>
											</div>
											<div class="kt-widget__item">
												<div class="kt-widget__icon">
													<i class="flaticon-pie-chart"></i>
												</div>
												<div class="kt-widget__details">
													<span class="kt-widget__title">Total Move to Opportunity</span>
													<span class="kt-widget__value"><span>$</span>782,300</span>
												</div>
											</div>
											
											
										</div>
									</div>
								</div>
							</div>
							@endforeach
							<!--end:: Portlet-->
                       




@endsection