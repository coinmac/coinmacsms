@extends('master')
@section('content')    
<div id="slider" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#slider" data-slide-to="0" class="active"></li>
            <li data-target="#slider" data-slide-to="1"></li>
            <li data-target="#slider" data-slide-to="2"></li>
            <li data-target="#slider" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img src="img/slide1.jpg" alt="First slide" width="100%" height="auto">
            </div>
            <div class="carousel-item">
                <img src="img/slide2.jpg" alt="Second slide" width="100%" height="auto">
            </div>
            <div class="carousel-item">
            <a href="{{route('register')}}"><img src="img/slide3.jpg" alt="Third slide" width="100%" height="auto"></a>
            </div>
            <div class="carousel-item">
                    <img src="img/slide4.jpg" alt="Third slide" width="100%" height="auto">
            </div>
        </div>
        <a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#slider" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
</div>

<p>
    Looking for a reliable, fast and affordable bulk SMS Service Provider in Nigeria? Look no further because you have just stumbled/landed on the right place - <b>COINMAC SMS Solutions</b> - the best of whatever bulk messaging can give on the internet.
</p>

<p>
    We are Nigeria's NO 1 choice for so many reasons;
    <ul>
        <li>Instant Delivery</li>
        <li>Unlimited No of SMS Per Day</li>
        <li>Good Value for Money</li>
        <li>24/7 Customer Support</li>
        <li>DND Numbers Delivery</li>
        <li>Over 1200 Network Coverage</li>
        <li>International Numbers Delivery (Outside Nigeria)</li>
        <li>And Many more reasons to start using COINMAC SMS Now.</li>
    </ul>
</p>
@endsection    