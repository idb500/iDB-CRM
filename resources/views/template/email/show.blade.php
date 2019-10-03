@include('layouts.header')
@include('layouts.left_side_bar')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Email Temaplte</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ url('template/email') }}"> Back</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $email_template->name }}
        </div>
    </div>
    
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Description:</strong>
           
        </div>
        {!!html_entity_decode($email_template->description)!!}
    </div>
    
</div>
@endsection
@include('layouts.footer')
