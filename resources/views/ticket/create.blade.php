@include('layouts.header')
@include('layouts.left_side_bar')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Ticket</h2>
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


<form action="{{url('ticket/store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Subject:</strong>
                {!! Form::text('ticket_subject', null, array('placeholder' => 'Subject','class' => 'form-control')) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" name="ticket_description" cols="10" rows="10" placeholder="Description"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Priority:</strong>
                <select class="form-control" name="ticket_priority">
                    <option value="">Choose Priority</option>
                    @foreach($TicketPriority as $TicketPriorities)
                        <option value="{{$TicketPriorities->id}}" style="color:{{$TicketPriorities->color_code}}"> {{$TicketPriorities->priority_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Category:</strong>
                <select class="form-control" name="ticket_category">
                    <option value="">Choose Category</option>
                    @foreach($TicketCategory as $TicketCategories)
                        <option value="{{$TicketCategories->id}}" style="color:{{$TicketCategories->color_code}}">{{$TicketCategories->category_name}}</option>
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