@include('layouts.header')
@include('layouts.left_side_bar')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Stage Rule</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('stage.index') }}"> Back</a>
        </div>
    </div>
</div>


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

<form method="post" action="{{ url('stage/rulestore') }}">
{{ csrf_field() }}

<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Rule Name:</strong>
            <input class="form-control" name="created_by" type="hidden" value="{{ Auth::user()->id }}">
            <input class="form-control" name="stageid" type="hidden" value="{{ $id }}">
            {!! Form::text('stagerulename', null, array('placeholder' => 'Stage Rule','class' => 'form-control')) !!}
        </div>
    </div>
    </div>

    <strong>Entry:</strong>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <strong>SMS Template:</strong>
            <select name="entry_sms_template" class="form-control">
            <option value="">Select SMS Template</option>
            @foreach($sms_template as $value)
 <option value="{{ $value->id }}">{{ $value->name }}</option>
 @endforeach
 
 </select>
           
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <strong>Email Template:</strong>
            <select name="entry_email_template" class="form-control">
            <option value="">Select Email Template</option>
            @foreach($email_template as $value)
 <option value="{{ $value->id }}">{{ $value->name }}</option>
 @endforeach
 
 </select>
           
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <strong>Whatsapp Template:</strong>
       
            <select name="entry_whatsapp_template" class="form-control">
            <option value="">Select Whatsapp Template</option>
            @foreach($whatsapp_template as $value)
 <option value="{{ $value->id }}">{{ $value->name }}</option>
 @endforeach
 
 </select>
           
        </div>
    </div>
    </div>
    <strong>Exit:</strong>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <strong>SMS Template:</strong>
         
            <select name="exit_sms_template" class="form-control">
            <option value="">Select SMS Template</option>
            @foreach($sms_template as $value)
 <option value="{{ $value->id }}">{{ $value->name }}</option>
 @endforeach
 
 </select>
           
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <strong>Email Template:</strong>
         
            <select name="exit_email_template" class="form-control">
            <option value="">Select Email Template</option>
            @foreach($email_template as $value)
 <option value="{{ $value->id }}">{{ $value->name }}</option>
 @endforeach
 
 </select>
           
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <strong>Whatsapp Template:</strong>
       
           
            <select name="exit_whatsapp_template" class="form-control">
            <option value="">Select Whatsapp Template</option>
            @foreach($whatsapp_template as $value)
 <option value="{{ $value->id }}">{{ $value->name }}</option>
 @endforeach
 
 </select>
           
        </div>
    </div>
    </div>
    <strong>Expire:</strong>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <strong>SMS Template:</strong>
            
            <select name="expire_sms_template" class="form-control">
            <option value="">Select SMS Template</option>
            @foreach($sms_template as $value)
 <option value="{{ $value->id }}">{{ $value->name }}</option>
 @endforeach
 
 </select>
           
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <strong>Email Template:</strong>
            
            <select name="expire_email_template" class="form-control">
            <option value="">Select Email Template</option>
            @foreach($email_template as $value)
 <option value="{{ $value->id }}">{{ $value->name }}</option>
 @endforeach
 
 </select>
           
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <strong>Whatsapp Template:</strong>
            <select name="expire_whatsapp_template" class="form-control">
            <option value="">Select Whatsapp Template</option>
            @foreach($whatsapp_template as $value)
 <option value="{{ $value->id }}">{{ $value->name }}</option>
 @endforeach
 
 </select>
           
        </div>
    </div>
    </div>
    <div class="row">

<div class="col-xs-4 col-sm-4 col-md-4">
    <div class="form-group">
        <strong>To:</strong>
        <select name="assigned_to" class="form-control">
            <option value="">Select Roles</option>
            @foreach($users as $value)
 <option value="{{ $value->id }}">{{ $value->name }}</option>
 @endforeach
 
 </select>
    </div>
</div>
</div>

    
    <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
</form>


@endsection
@include('layouts.footer')
