@extends('user_master')
@section('content')

    
    <div class="card">
    <div class="card-body">

            @if (session()->has('message'))
                <div class="alert alert-success" role="alert">
                    {{session()->get('message')}}
                </div>            
            @endif

            <p><b>Title:</b><br>{{$recipients->title}}</p>
            <p><b>Body:</b><br>{{$recipients->message}}</p>
            <p>{{$status->status}}</p>
        
        
        
    </div>    

    </div>
    
@endsection


@section('leftbar')
<div class="card">
    <div class="card-body">
        <h5 class="card-title"> Scheduled SMS </h5>
        <hr>
        
    </div>
</div>
    
@stop
