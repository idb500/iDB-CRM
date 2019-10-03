@include('layouts.header')
@include('layouts.left_side_bar')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Rule Stage</h2>
        </div>
        <div class="pull-right">
        <a class="btn btn-info" href="{{ url('stage/addrule',$id) }}">Add Rule</a>
            <a class="btn btn-primary" href="{{ route('stage.index') }}"> Back</a>
        </div>
       
    </div>

</div>

@foreach ($stage_rule as $key => $role)
@php
$email_template = \DB::table('email_template')->where(['id'=>$role->entry_email_template])->first(); 
$sms_template = \DB::table('sms_template')->where(['id'=>$role->entry_sms_template])->first(); 
$whatsapp_template = \DB::table('whatsapp_template')->where(['id'=>$role->entry_whatsapp_template])->first(); 

$exit_sms_template = \DB::table('email_template')->where(['id'=>$role->exit_sms_template])->first(); 
$exit_email_template = \DB::table('sms_template')->where(['id'=>$role->exit_email_template])->first(); 
$exit_whatsapp_template = \DB::table('whatsapp_template')->where(['id'=>$role->exit_whatsapp_template])->first(); 

$expire_sms_template = \DB::table('email_template')->where(['id'=>$role->expire_sms_template])->first(); 
$expire_email_template = \DB::table('sms_template')->where(['id'=>$role->expire_email_template])->first(); 
$expire_whatsapp_template = \DB::table('whatsapp_template')->where(['id'=>$role->expire_whatsapp_template])->first(); 

$roles = \DB::table('roles')->where(['id'=>$role->assign_to])->first(); 
@endphp
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Name:</strong>
          {{ $role->name }}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Roles:</strong>
          {{ $roles->name }}
        </div>
    </div>
    </div>
    <strong>Entry:</strong>
    <div class="row">
 
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>SMS Template:</strong>
        </div>
        @if($sms_template!='')  {{ $sms_template->name }} @endif
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>Email Template:</strong>
          
        </div>
        @if($email_template!='') {{ $email_template->name }} @endif
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>Whatsapp Template:</strong>
          
        </div>
        @if($whatsapp_template!='') {{ $whatsapp_template->name }} @endif
    </div>
</div>
<strong>Exit:</strong>
    <div class="row">
 
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>SMS Template:</strong>
        </div>
        @if($exit_sms_template!='') {{ $exit_sms_template->name }} @endif
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>Email Template:</strong>
          
        </div>
        @if($exit_email_template!='') {{ $exit_email_template->name }} @endif
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>Whatsapp Template:</strong>
          
        </div>
        @if($exit_whatsapp_template!='')   {{ $exit_whatsapp_template->name }} @endif
    </div>
</div>
<strong>Expire:</strong>
    <div class="row">
 
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>SMS Template:</strong>
        </div>
        @if($expire_sms_template!='') {{ $expire_sms_template->name }} @endif
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>Email Template:</strong>
          
        </div>
        @if($expire_email_template!='') {{ $expire_email_template->name }} @endif
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>Whatsapp Template:</strong>
          
        </div>
        @if($expire_whatsapp_template!='')  {{ $expire_whatsapp_template->name }} @endif
    </div>
</div>
<br/>
@endforeach

@endsection
@include('layouts.footer')
