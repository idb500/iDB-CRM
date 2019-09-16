@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        @hasrole('Agent')
            
                @if($c_data_count >= 1)
                    {{--<div class="col-md-12 white_box">
                        <div class="white_box">
                            <form action="{{url('update/cprofile')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="c_name">Company Name</label>
                                        @if($c_data->c_name == '')
                                        <input type="text" class="form_control" required="" value="{{old('c_name')}}" name="c_name">
                                        @else
                                        <input type="text" class="form_control" required="" value="{{$c_data->c_name}}" name="c_name">
                                        @endif
                                    </div>    
                                
                                    <div class="col-sm-6">
                                        <label for="c_addess">Company Address</label>
                                        @if($c_data->c_addess == '')
                                        <input type="text" class="form_control" required="" value="{{old('c_addess')}}" name="c_addess">
                                        @else
                                        <input type="text" class="form_control" required="" value="{{$c_data->c_addess}}" name="c_addess">
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="c_country">Country</label>
                                        @if($c_data->c_country == '')
                                        <input type="text" class="form_control" required="" value="{{old('c_country')}}" name="c_country">
                                        @else
                                        <input type="text" class="form_control" required="" value="{{$c_data->c_country}}" name="c_country">
                                        @endif
                                    </div>    
                                
                                    <div class="col-sm-6">
                                        <label for="c_state">State</label>
                                        @if($c_data->c_state == '')
                                        <input type="text" class="form_control" required="" value="{{old('c_state')}}" name="c_state">
                                        @else
                                        <input type="text" class="form_control" required="" value="{{$c_data->c_state}}" name="c_state">
                                        @endif
                                    </div>    
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="c_city">City</label>
                                        @if($c_data->c_city == '')
                                        <input type="text" class="form_control" required="" value="{{old('c_city')}}" name="c_city">
                                        @else
                                        <input type="text" class="form_control" required="" value="{{$c_data->c_city}}" name="c_city">
                                        @endif
                                    </div>    
                                
                                    <div class="col-sm-6">
                                        <label for="c_pin">PIN</label>
                                        @if($c_data->c_pin == '')
                                        <input type="text" class="form_control" required="" value="{{old('c_pin')}}" name="c_pin">
                                        @else
                                        <input type="text" class="form_control" required="" value="{{$c_data->c_pin}}" name="c_pin">
                                        @endif
                                    </div>    
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="c_gstin">GSTIN</label>
                                        @if($c_data->c_gstin == '')
                                        <input type="text" class="form_control" required="" value="{{old('c_gstin')}}" name="c_gstin">
                                        @else
                                        <input type="text" class="form_control" required="" value="{{$c_data->c_gstin}}" name="c_gstin">
                                        @endif
                                    </div>    
                                
                                    <div class="col-sm-6">
                                        <label for="c_person">Contact Person</label>
                                        @if($c_data->c_person == '')
                                        <input type="text" class="form_control" required="" value="{{old('c_person')}}" name="c_person">
                                        @else
                                        <input type="text" class="form_control" required="" value="{{$c_data->c_person}}" name="c_person">
                                        @endif
                                    </div>    
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="c_email">Contact Person Email</label>
                                        @if($c_data->c_email == '')
                                        <input type="text" class="form_control" required="" value="{{old('c_email')}}" name="c_email">
                                        @else
                                        <input type="text" class="form_control" required="" value="{{$c_data->c_email}}" name="c_email">
                                        @endif
                                    </div>    
                                
                                    <div class="col-sm-6">
                                        <label for="c_phone">Contact Person Phone</label>
                                        @if($c_data->c_phone == '')
                                        <input type="text" class="form_control" required="" value="{{old('c_phone')}}" name="c_phone">
                                        @else
                                        <input type="text" class="form_control" required="" value="{{$c_data->c_phone}}" name="c_phone">
                                        @endif
                                    </div>    
                                </div>
        
                                <br>
                                <div class="col-sm-6">
                                    <button class="btn blue">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>--}}
                @else
                    <div class="col-md-12 white_box">
                        <div class="white_box">
                            <form action="{{url('update/cprofile')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="c_name">Company Name</label>
                                        <input type="text" class="form_control" required="" value="{{old('c_name')}}" name="c_name">
                                    </div>    
                                
                                    <div class="col-sm-6">
                                        <label for="c_addess">Company Address</label>
                                        <input type="text" class="form_control" required="" value="{{old('c_addess')}}" name="c_addess">
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="c_country">Country</label>
                                        <input type="text" class="form_control" required="" value="{{old('c_country')}}" name="c_country">
                                    </div>    
                                
                                    <div class="col-sm-6">
                                        <label for="c_state">State</label>
                                        <input type="text" class="form_control" required="" value="{{old('c_state')}}" name="c_state">
                                    </div>    
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="c_city">City</label>
                                        <input type="text" class="form_control" required="" value="{{old('c_city')}}" name="c_city">
                                    </div>    
                                
                                    <div class="col-sm-6">
                                        <label for="c_pin">PIN</label>
                                        <input type="text" class="form_control" required="" value="{{old('c_pin')}}" name="c_pin">
                                    </div>    
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="c_gstin">GSTIN</label>
                                        <input type="text" class="form_control" value="{{old('c_gstin')}}" name="c_gstin">
                                    </div>    
                                
                                    <div class="col-sm-6">
                                        <label for="c_person">Contact Person</label>
                                        <input type="text" class="form_control" required="" value="{{old('c_person')}}" name="c_person">
                                    </div>    
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="c_email">Contact Person Email</label>
                                        <input type="text" class="form_control" required="" value="{{old('c_email')}}" name="c_email">
                                    </div>    
                                
                                    <div class="col-sm-6">
                                        <label for="c_phone">Contact Person Phone</label>
                                        <input type="text" class="form_control" required="" value="{{old('c_phone')}}" name="c_phone">
                                    </div>    
                                </div>                     
                                <br>
                                <div class="col-sm-6">
                                    <button class="btn blue">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
            
            <hr>
            @if($c_data_count >= 1)
                <div class="col-md-12">
                    <table class="intelly_table">
                        <thead>
                            <th>Transaction No.</th>
                            <th>Transaction Date</th>
                            <th>Bank Name</th>
                            <th>Licence</th>
                            <th>Ammount</th>
                            <th>Expiry Date</th>
                            <th>Attachement</th>
                            <th>Status</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach($p_data as $p_datas)
                                <tr>
                                    <td>{{$p_datas->tnx_n}}</td>
                                    <td>{{date('d-M-Y', strtotime($p_datas->tnx_date))}}</td>
                                    <td>{{$p_datas->tnx_bank}}</td>
                                    <td>{{$p_datas->c_licence}}</td>
                                    <td>{{$p_datas->tnx_ammount}}</td>
                                    <td>{{date('d-M-Y', strtotime($p_datas->tnx_exp))}}</td>
                                    <td>
                                        @if($p_datas->tnx_copy != 'NA')
                                        <a href="{{url('/uploads/tnx_copy/')}}/{{$p_datas->tnx_copy}}" download><img src="{{url('/uploads/tnx_copy/')}}/{{$p_datas->tnx_copy}}" width="50px" height="50px"></a>
                                        @else
                                            {{'NA'}}
                                        @endif
                                    </td>
                                    <td>@if($p_datas->tnx_status == 1) {{'Active'}} @elseif($p_datas->tnx_status == 2) {{'Pending'}} @else {{'Expired'}} @endif</td>
                                    @if($p_datas->tnx_status == 1)
                                        <td><a href="{{'download/app'}}" class="btn blue">Download</a></td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>    
                </div>           
            
                <div class="col-md-12" style="margin-top: 39px;">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Online</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Offline</a>
                        </li>
                    </ul>
                    
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active white_box" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <form action="{{url('payment')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="number" placeholder="No of Licence" name="payu_lic_count" class="form_control">
                                    </div>                                    

                                    <div class="col-sm-6">
                                        <input type="text" placeholder="Amount" name="payu_amount" class="form_control">
                                    </div>                                    

                                    <div class="col-sm-6">
                                        <input type="text" placeholder="Phone " name="payu_phone" class="form_control">
                                    </div>                                    

                                    <div class="col-sm-6">
                                        <button class="btn btn-success">Pay Now</button>
                                    </div>
                                </div>                                
                            </form>    
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="white_box">
                                <form action="{{url('offline/tnx')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="tnx_n">Transaction No.</label>
                                            <input type="text" class="form_control" required="" value="{{old('tnx_n')}}" name="tnx_n">
                                        </div>    
                                    
                                        <div class="col-sm-6">
                                            <label for="tnx_date">Transaction Date</label>
                                            <input type="text" class="form_control" required="" value="{{old('tnx_date')}}" name="tnx_date">
                                        </div>                            
                                        
                                        <div class="col-sm-6">
                                            <label for="tnx_bank">Bank Name</label>
                                            <input type="text" class="form_control" required="" value="{{old('tnx_bank')}}" name="tnx_bank">
                                        </div>                            
                                        
                                        <div class="col-sm-6">
                                            <label for="tnx_ammount">Ammount</label>
                                            <input type="text" class="form_control" required="" value="{{old('tnx_ammount')}}" name="tnx_ammount">
                                        </div>                            
                                        
                                        <div class="col-sm-6">
                                            <label for="tnx_copy">Attachement</label>
                                            <input type="file" class="form_control" required="" value="{{old('tnx_copy')}}" name="tnx_copy">
                                        </div>
                                        
                                  
                                        <div class="col-sm-6">
                                            <label for="c_licence">Number of Licence</label>
                                            <input type="number" class="form_control" required="" value="{{old('c_licence')}}" name="c_licence">
                                        </div>
                                    </div>  
                                    <br>
                                    <div class="col-sm-6">
                                        <button class="btn blue">Submit</button>
                                    </div>
                                </form>  
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endif
        @if($is_admin == 0 OR $is_admin == 1 )
            <div class="col-md-12">
                <table class="intelly_table ">
                    <thead>
                        <th>Transaction No.</th>
                        <th>User Name</th>
                        <th>Transaction Date</th>
                        <th>Bank Name</th>
                        <th>Licence</th>
                        <th>Ammount</th>
                        <th>Expiry Date</th>
                        <th>Attachement</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($p_data as $p_datas)
                            <tr>
                                <td>{{$p_datas->tnx_n}}</td>
                                <td>{{$p_datas->name}}</td>
                                <td>{{date('d-M-Y', strtotime($p_datas->tnx_date))}}</td>
                                <td>{{$p_datas->tnx_bank}}</td>
                                <td>{{$p_datas->c_licence}}</td>
                                <td>{{$p_datas->tnx_ammount}}</td>
                                <td>{{date('d-M-Y', strtotime($p_datas->tnx_exp))}}</td>
                                <td>
                                    @if($p_datas->tnx_copy != 'NA')
                                    <a href="{{url('/uploads/tnx_copy/')}}/{{$p_datas->tnx_copy}}" download><img src="{{url('/uploads/tnx_copy/')}}/{{$p_datas->tnx_copy}}" width="50px" height="50px"></a>
                                    @else
                                        {{'NA'}}
                                    @endif
                                </td>
                                <td>@if($p_datas->tnx_status == 1) {{'Active'}} @elseif($p_datas->tnx_status == 2) {{'Pending'}} @else {{'Expired'}} @endif</td>
                                <td>
                                    @if($p_datas->tnx_status == 2)
                                        <form action="{{url('approve/tnx')}}" method="post">
                                            @csrf
                                            <input type="hidden" value="{{$p_datas->id}}" name="c_id">
                                            <input type="text" value="{{$p_datas->c_licence}}" name="c_licence" style="width: 38px;padding: 5px 5px;">
                                            <button class="" title="Approve" type="submit" style="    position: relative;top: -2px;padding: 3px;" value="approve" name="approve"><img src="{{asset('images/check.png')}}" width="25px" style="cursor: pointer;"></button>
                                            <button class="" title="Reject" type="submit" style="    position: relative;top: -2px;padding: 3px;" value="reject" name="approve"><img src="{{asset('images/cancel.png')}}" width="25px" style="cursor: pointer;"></button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>    
            </div>
        @endif
    </div>
</div>
@endsection
