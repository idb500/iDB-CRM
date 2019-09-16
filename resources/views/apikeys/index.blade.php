@extends('layouts.app')

@section('content')
<!--<script>window.location = "{{env('APP_URL')}}/tickets";</script>-->
<div class="container">
    <div class="row justify-content-center">
        @if ($errors->any())
            <div class="col-sm-12">
                @foreach ($errors->all() as $error)
                <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                    {{$error}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endforeach
            </div>
        @endif
        @if (session('success'))
            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif
        

        <div class="col-md-12">
            <table class="intelly_table intelly_table_delivery">
                <thead>
                    <th>API Key</th>
                    <th>Created On</th>
                    <th>Status</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($apidata as $apidatas)
                        <tr>
                            <td>{{$apidatas->apikey}}</td>
                            <td>{{date('d-M-Y', strtotime($apidatas->created_at))}}</td>
                            <td>@if($apidatas->status == 1) {{'Active'}} @else {{'In-active'}} @endif</td>
                            <td>
                                <form action="{{url('api/regenerate')}}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{$apidatas->id}}" name="api_id">
                                    <button class="btn blue  btn-big">Re-generate</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>    
        </div>
        
    </div>
</div>

@endsection
<style>
    .form-control{
        margin-bottom: 20px!important;
    }    
    
    .btn-primary{
        margin: -12px -12px!important;
    }
    table.intelly_table.intelly_table_delivery tr td {
        width: 100%;
    }
</style>
