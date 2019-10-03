@include('layouts.header')
@include('layouts.left_side_bar_bigdata')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New List </h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('note_type.index') }}"> Back</a>
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

<form action="{{ url('/listcreatestore2') }}" method="post" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="row">

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>List Name:</strong>
            <input class="form-control" name="created_by" type="hidden" value="{{ Auth::user()->id }}">
            {!! Form::text('listname', null, array('required'=>'required','placeholder' => 'List Name','class' => 'form-control')) !!}
         
        </div>
    </div>
    </div>
    <div class="row">

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Filter Condition:</strong>
            
            {!! Form::text('fileter', null, array('required'=>'required','placeholder' => 'Filter Condition','class' => 'form-control')) !!}
         
        </div>
    </div>
    </div>

    <div class="row">

<div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
    <strong>Assigned To:</strong>
        <select class="form-control" name="assignedto" required>
                            <option>Select Name</option>
                            @foreach($users as $value)
                            <option value="{{ $value->id }}">{{ $value->name }} - {{ $value->rname }}</option>
                            @endforeach
                        </select>
</div>
</div>
</div>
<div class="row">

<div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
    <strong>CSV File contact:</strong>
    <input class="form-control" name="file" type="file" accept=".csv" required>
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
