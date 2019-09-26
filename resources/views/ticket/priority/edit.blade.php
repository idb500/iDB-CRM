@include('layouts.header')
@include('layouts.left_side_bar')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Priority</h2>
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


<form action="{{url('ticket/settings/priority/update')}}" method="post">
    @csrf
    <input type="hidden" value="{{$TicketPriority->id}}" name="status_id" class="form-control">
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Priority:</strong>
                <input type="text" value="{{$TicketPriority->priority_name}}" name="priority_name" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Color:</strong>
                <input type="color" name="color_code" class="form-control" value="{{$TicketPriority->color_code}}">
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