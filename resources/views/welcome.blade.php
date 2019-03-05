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

<div id="homecontent">
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
</div>

<div id="aboutcontent">
    <h3>About COINMAC SMS</h3><hr>
    <p>
        COINMAC-SMS is the leading bulk SMS service provider in Nigeria that offers all your bulk SMS text messaging needs with highly efficient bulk SMS infrastructure. We are providing excellent, fastest, reliable and cheapest bulk SMS service in Nigeria. We guarantee instant bulk SMS delivery to all GSM networks in Nigeria. Our professional bulk SMS service can be deployed for the following purposes: Launching, Love Text Messages, Birthday Invitation, New Year SMS, Friendship SMS, Valentine SMS, Burial Ceremony, Coronation Ceremony, Award-winning ceremony, Promo Text Messages, Meeting notification, Customer notification, I Love You SMS, Political Awareness/Campaign, Result Notification, Romantic Text Messages, Interview Notification, Sweet Love SMS, Special season’s greetings, Product Advertisement, Wedding Invitation, etc.
    </p>
    <p>
        You can buy bulk SMS Nigeria text message at as low as 2 Naira/unit which is equivalent to 1 Page SMS, no hidden charges. Over 71,457 users are using our bulk SMS service since 2010. If you are looking for Bulk SMS Nigeria platform where you can send bulk SMS with a customized sender ID, here is the most reliable bulk SMS platform to reach all your bulk SMS goals. Our perfect and user-friendly bulk SMS platform is primarily designed to suit Nigeria bulk SMS purposes. Deem it necessary to run a test to confirm the quality of our excellent bulk SMS service.
    </p>
</div>
<div id="pricingcontent">
    We have a flat unambiguous pricing of <b> 2 Naira Per One Page SMS </b> which is equivalent to 160 Characters of Text to Nigerian Networks.
    We also have discounted offers for customers and resellers buying above 100,000 Units of SMS Credits which is 1.60 Kobo Per SMS/160 Charachters of Text.
<hr>
    <p class="h3">PAYMENT/BANKING DETAILS</p>
    <p class="HeadText2">Pay into any of these accounts</p>
    
      <p><b>Bank Name:</b> FIRST CITY MONUMENT BANK PLC </p>
      <p><b>Account Number:</b> 0136506015</p>
      <p><b>Account Name:</b> COINMAC INT’L. LTD.</p>
    
    <p>OR</p>
    
      <p><b>Bank Name:</b>ZENITH BANK PLC, OLUYOLE BRANCH, IBADAN</p>
      <p><b>Account Number:</b>1012790202</p>
      <p><b>Account Name:</b>COINMAC INTERNATIONAL LIMITED.</p>
        <p style="color:red;">Click Here to <a href="{{route('topup.index')}}">Login</a> and Purchase SMS Credit</p>
</div>



@endsection    