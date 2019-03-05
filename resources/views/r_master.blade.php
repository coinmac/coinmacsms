<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>COINMAC SMS | </title>
    <link rel="stylesheet" href="/css/bootstrap.css">
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:navy;">
        <a class="navbar-brand" href="#">COINMAC SMS</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
        
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('posts.index')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="about"  href="#">About</a>                   
                </li>
                
                <li class="nav-item">
                        <a class="nav-link" id="pricing"  href="#">Pricing/Payment</a>                   
                </li>
                <li class="nav-item ml-5 text-white pt-2">
                        Need Support? Call: (+234) 0802 326 2908                   
                </li>               
                
            </ul>
            <div class="nav-item my-4 my-lg-2">
                @auth
                    <form method="post" action="{{route('logout')}}" class="d-inline-block float-right">
                        @csrf

                        <button class="btn btn-primary"> Logout </button>
                    </form>
                    
                @else                
                    <div class="btn-group" role="group" aria-label="Button group">
                    <a href="{{route('login')}}" class="btn btn-primary"> Login </a><a href="{{route('register')}}" class="btn btn-info"> Sign up </a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>
    <div class="container mt-5">
                
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        
                        @yield('content')
                    </div>
                    
                </div>
    </div>
<div class="bg-dark text-white p-4 text-center" style="bottom:0px; position: absolute; width: 100%;">All rights reserved - COINMAC SMS {{date("Y")}}</div>
    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.js"></script>
</body>
</html>