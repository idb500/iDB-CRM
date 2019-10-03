@include('layouts.header')
@include('layouts.left_side_bar')


@section('content')
<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
  </script>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit SMS Template</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ url('template/email') }}"> Back</a>
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

<form method="post" action="{{ url('template/email/update') }}/{{ $email_template->id }}">
{{ csrf_field() }}

<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Name:</strong>
            <input class="form-control" name="created_by" type="hidden" value="{{ Auth::user()->id }}">
            <input class="form-control" name="name" type="text" value="{{ $email_template->name }}">
            
        </div>
    </div>
    </div>
    <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Description:</strong>
            <textarea rows="10" name="description" class="form-control">{{ $email_template->description }}</textarea>
          
        </div>
    </div>
    </div>
    <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</div>
</form>


@endsection
@include('layouts.footer')
