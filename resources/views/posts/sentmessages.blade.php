@extends('user_master')
@section('content')

    
    <div class="card">
    <div class="card-body">

            @if (session()->has('message'))
                <div class="alert alert-success" role="alert">
                    {{session()->get('message')}}
                </div>            
            @endif

        <h5 class="card-title">Sent Message Report </h5>
        
        <table class="table table-light" id="datatable">
                <thead class="thead-light" style="font-size: 0.8em">
                    <tr>
                        <th>SN</th>
                        <th>Title</th>
                        <th>Message</th>
                        <th>Date Sent</th>
                        <th>Actions</th>
                        
                    </tr>
                </thead>
                <tbody>
                @foreach ($messages as $message)  
                    <tr>
                        <td>{{ $message->id}}</td>
                        <td>{{ $message->title }}</td>
                        <td>{{ $message->message }}</td>
                        <td>{{ $message->created_at }}</td>
                        <td>
                            @auth
                                <div class="btn-group" role="group" aria-label="Button group">
                                    <a href="{{url('recipients',$message->messageid)}}" class="btn btn-primary btn-sm">Recipients</a>
                                    <a href="{{url('status',$message->messageid)}}" class="btn btn-success btn-sm">Status</a>
                                </div>  
                            @endauth
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot class="thead-light">
                    <tr>
                        <th>SN</th>
                        <th>Title</th>
                        <th>Message</th>
                        <th>Date Sent</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
            </table>
        
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
