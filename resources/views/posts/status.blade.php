@extends('user_master')
@section('content')

    
    <div class="card">
    <div class="card-body">

            @if (session()->has('message'))
                <div class="alert alert-success" role="alert">
                    {{session()->get('message')}}
                </div>            
            @endif

            <p><b>Title:</b> {{$status->title}}</p>
            <p><b>Body:</b><br>{{$status->message}}</p>
            <p><b>Delivery Report(s):<br></b>
                @php
                    if($status->status!=""){
                        $results = unserialize($status->status);
                        foreach ($results as $res){
                            $oneres = explode("|",$res);

                            if($oneres[0]=="1701"){
                                echo $oneres[1]." - Delivered";
                            }elseif($oneres[0]=="1032"){
                                echo $oneres[1]." - Number on DND";
                            }elseif($oneres[0]=="1706"){
                                echo $oneres[1]." - Invalid Destination";
                            }else{
                                echo $oneres[1]." - Unknown Error!";
                            }
                            echo "<hr>";
                        }
                    }
                    
                @endphp
            </p>
        
        
        
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
