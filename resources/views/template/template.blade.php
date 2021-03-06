@include('layouts.header')
@include('layouts.left_side_bar')
@section('content')
<div class="row">
<div class="kt-portlet">
								<div class="kt-portlet__body  kt-portlet__body--fit">
									<div class="row row-no-padding row-col-separator-lg">
                                        
										<div class="col-md-12 col-lg-6 col-xl-4">
                                        <a href="{{ url('template/sms') }}">
											<!--begin::Total Profit-->
											<div class="kt-widget24">
												<div class="kt-widget24__details">
													<div class="kt-widget24__info">
														<h4 class="kt-widget24__title">
															SMS Template
														</h4>
														<span class="kt-widget24__desc">
                                                        Total Template
														</span>
													</div>
													<span class="kt-widget24__stats kt-font-brand">
														<!-- 10 -->
													</span>
												</div>
												<div class="progress progress--sm">
													<div class="progress-bar kt-bg-brand" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
												
											</div>
                                            </a>
											<!--end::Total Profit-->
                                        </div>


										<div class="col-md-12 col-lg-6 col-xl-4">
                                        <a href="{{ url('template/email') }}">
											<!--begin::New Feedbacks-->
											<div class="kt-widget24">
												<div class="kt-widget24__details">
													<div class="kt-widget24__info">
														<h4 class="kt-widget24__title">
															Email Template
														</h4>
														<span class="kt-widget24__desc">
                                                        Total Template
														</span>
													</div>
													<span class="kt-widget24__stats kt-font-warning">
														<!-- 1349 -->
													</span>
												</div>
												<div class="progress progress--sm">
													<div class="progress-bar kt-bg-warning" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											
											</div>
                                            </a>
											<!--end::New Feedbacks-->
                                        </div>

                                      
										<div class="col-md-12 col-lg-6 col-xl-4">
                                        <a href="{{ url('template/whatsapp') }}">
											<!--begin::New Orders-->
											<div class="kt-widget24">
												<div class="kt-widget24__details">
													<div class="kt-widget24__info">
														<h4 class="kt-widget24__title">
															Whatsapp Template
														</h4>
														<span class="kt-widget24__desc">
															Total Template
														</span>
													</div>
													<span class="kt-widget24__stats kt-font-danger">
														<!-- 567 -->
													</span>
												</div>
												<div class="progress progress--sm">
													<div class="progress-bar kt-bg-danger" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
												
											</div>
                                            </a>
											<!--end::New Orders-->
										</div>

									</div>
								</div>
							</div>
</div>
@endsection
@extends('layouts.footer')