@include('layouts.header')
@include('layouts.left_side_bar')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Stage Type</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('bigdatastage.index') }}"> Back</a>
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


{!! Form::open(array('route' => 'bigdatastage.store','method'=>'POST')) !!}
<div class="row">

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Name:</strong>
            <input class="form-control" name="created_by" type="hidden" value="{{ Auth::user()->id }}">
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
         
        </div>
    </div>
    </div>
    <div class="row">

<div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
        <strong>Fa Fa Icon:</strong>
       
        {!! Form::text('fafaicon', null, array('placeholder' => 'Fa Fa Icon','class' => 'form-control')) !!}
     
    </div>
</div>
</div>
    <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}


@endsection
@include('layouts.footer')
