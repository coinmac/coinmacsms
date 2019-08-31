<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>COINMAC SMS | </title>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/datatables.css">
    <link rel="stylesheet" href="/css/mystyles.css">
</head>

<style>
    ul li a.nav-link, a.nav-item{color: white !important; width:auto; z-index:99999999999999999999999 !important; }
</style>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:navy; z-index:99999999999999999999999 !important;">
        <a class="navbar-brand" href="#">COINMAC SMS</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
        
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0" style="color: white !important;">
                <li class="nav-item active">
                    <a class="btn btn-sm" href="{{route('sendmessage.index')}}" style="color: white !important; z-index:99999999999999999999999 !important;" >Send SMS <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-sm" href="{{route('phonebook.index')}}" style="color: white !important; z-index:99999999999999999999999 !important;">Phone Book</a>                   
                </li>
                <li class="nav-item">
                        <a class="btn btn-sm" href="{{url('sentmessages')}}" style="color: white !important;">Reports</a>                   
                </li>
                <li class="nav-item dropdown">
                    <a class="btn btn-sm dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white !important;">Top Up</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="{{route('topup.index')}}">Buy Credit</a>
                        <a class="dropdown-item" href="{{route('topup.index')}}">Credit History</a>
                    </div>
                </li>
                <li class="nav-item">
                        <a class="btn btn-sm" target="_blank" href="{{route('posts.index')}}" style="color: white !important;">FAQs</a>                   
                </li>
                <li class="nav-item ml-5 text-white pt-2" style="color: white !important;">
                        @auth
                           Hello, {{auth()->user()->name}} ({{auth()->user()->username}})! 
                           <span class="badge badge-danger">Credit: {{auth()->user()->units}} units</span>
                        @endauth                 
                </li>               
                
            </ul>
            <div class="nav-item my-4 my-lg-2" style="color: white !important;">
                @auth
                    <form method="post" action="{{route('logout')}}" class="d-inline-block float-right">
                        @csrf
                        <div class="btn-group" role="group" aria-label="Button group">                            
                            <a class="btn btn-success" target="_blank" href="{{route('sendmessage.index')}}">My Account</a>
                            <button class="btn btn-primary"> Logout </button>
                        </div>
                    </form>
                    
                @else                
                    <div class="btn-group" role="group" aria-label="Button group" style="background-color: white !important;">
                    <a href="{{route('login')}}" class="btn btn-primary"> Login </a><a href="{{route('register')}}" class="btn btn-info"> Sign up </a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>
    <div class="container mt-5">
                
                <div class="row">
                    <div class="col-lg-7">
                        
                        @yield('content')
                    </div>

                    <div class="col-lg-5">
                        
                            @yield('leftbar')
                    </div>
                    
                </div>
    </div>
<div class="bg-dark text-white p-4 text-center">All rights reserved - COINMAC SMS {{date("Y")}}</div>
    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script src="/js/datatables.js"></script>
    <script src="/js/myscripts.js"></script>
    <script src="/js/datatablesb4.js"></script>
</body>
</html>