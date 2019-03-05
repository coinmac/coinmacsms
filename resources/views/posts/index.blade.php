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
        <p class="jumbotron blockquote">
            
            Looking for a reliable, fast and affordable bulk SMS Service Provider in Nigeria? Look no further because you have just landed on the right place - <b>COINMAC SMS Solutions</b> - the best of whatever bulk messaging can give on the internet.
            
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

<div class="text-center"><a href="{{route("login")}}" class="btn btn-success mb-2">Click Here to Send SMS Now!</a></div>
</p>
</div>

<div id="aboutcontent">
    <h3>About COINMAC SMS</h3><hr>
    <p class="jumbotron">
        COINMAC-SMS is the leading bulk SMS service provider in Nigeria that offers all your bulk SMS text messaging needs with highly efficient bulk SMS infrastructure. We are providing excellent, fastest, reliable and cheapest bulk SMS service in Nigeria. We guarantee instant bulk SMS delivery to all GSM networks in Nigeria. Our professional bulk SMS service can be deployed for the following purposes: Launching, Love Text Messages, Birthday Invitation, New Year SMS, Friendship SMS, Valentine SMS, Burial Ceremony, Coronation Ceremony, Award-winning ceremony, Promo Text Messages, Meeting notification, Customer notification, I Love You SMS, Political Awareness/Campaign, Result Notification, Romantic Text Messages, Interview Notification, Sweet Love SMS, Special season’s greetings, Product Advertisement, Wedding Invitation, etc.
    </p>
    <p>
        You can buy bulk SMS Nigeria text message at as low as 2 Naira/unit which is equivalent to 1 Page SMS, no hidden charges. Over 71,457 users are using our bulk SMS service since 2010. If you are looking for Bulk SMS Nigeria platform where you can send bulk SMS with a customized sender ID, here is the most reliable bulk SMS platform to reach all your bulk SMS goals. Our perfect and user-friendly bulk SMS platform is primarily designed to suit Nigeria bulk SMS purposes. Deem it necessary to run a test to confirm the quality of our excellent bulk SMS service.
    </p>
    <hr>
    <h3>How COINMAC SMS Works</h3>
    <p>
        Steps involved;
        <ul>
            <li><b>Created An Account:</b><br>
            Anyone can create an account with the COINMAC SMS Platform by simply clicking on the signup button on the topmost right corner of this website. This will open up the signup form.<br>Fill this form and click on the Signup Button.<br> A one time activation message and and activation code will be sent to your e-mail and phone number provided. Proceed to the activation and login.
            </li>
            <li><b>Test the Platform:</b><br>
                After Signing up and activating your account with us, we will give you 5 Credit units to use in testing our platform. Click on the Send Message Menu Link of the top leftmost section of the menu to fill the sending message form. <br> <b>Note:</b><br>The Sender ID/Title should be maximum 11 Characters, seperate numbers with comma on the same line and make sure there is no strange characters and unnecessary spaces. Click on the Send Button to send your sms </li>
        </ul>
    </p>
    <hr>
    Contact our customer care representatives for all your enquiry, complaints and suppoty <hr>
    <p class="h3">Contact Information</p>
    <p class="HeadText2">Corporate Head Office:</p>
    
      <p><b>Address:</b> 2nd Floor, Bayelsa Guest House, Maitama, Abuja </p>
      <p><b>Phone Number:</b>  (+234) 8038437312, 8023262908</p>
      <p><b>Email Address:</b> coinmacsms@gmail.com, info@coinmac.com.ng</p>
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