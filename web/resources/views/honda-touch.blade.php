
@extends('layouts.base')


@section('content')

<div class="body-wrapper">
<section class="content-inner innerpage hip">
    <div class="hero-banner hondatouchbanner">
        <!-- <div class="text-container">
            <div class="cat">Honda Insurance Plus (HiP)</div>
            <div class="header">EXTENSIVE COVERAGE AND SAVINGS PLAN DESIGNED FOR YOU.</div>
        </div> -->
        <div class="bottomright">
            <a href="https://www.honda.com.my/technology/honda-connect">
                <img class="connect-img" src="{{url('img/aftersales/honda-touch/Honda_Connect_CTA.png')}}" alt="">
            </a>
        </div>
    </div>

    <section class="service-tab-menu">
        <div class="menu-toggle smooth-slide">
            <input type="checkbox" id="service-tab-menu-check">
                <div class="service-tab-menu-btn">
                <label for="service-tab-menu-check">
                    <span></span>
                    <!-- <span></span>
                    <span></span> -->
                </label>
                </div>
                <ul>
                    <li style="border-bottom: 3px solid #e32119;"><a href="{{url('aftersales/hondatouch')}}">HondaTouch</a></li>
                    <li><a href="{{url('aftersales/hondatouch/signup')}}">How To Sign Up</a></li>
                </ul>
        </div>
        <div class="clearfix"></div>
    </section>

    <div class="inner-content-section content-area">
        <h2>The app for Everything Honda, <span style="white-space: nowrap;">In One Touch.</span></h2>
        <div class="content-copy">With HondaTouch, you're always connected, always in the know and always one touch away from our services. Whether it's service booking, emergency assistance, or our latest promotions, experience Honda with a whole new level of convenience today.</div>
        <div class="clearfix"></div>

        <div class="btn-container">
            <a href="{{url('https://hondatouch.honda.com.my/login')}}" target="_blank" class="prime-cta-white" style="background: black; color:white;">
            <span style="text-transform: none;">VISIT HondaTouch</span>
            <div class="overlay"></div>
            </a>
            <div class="clearfix"></div>
        </div>

        <h2 class="mobile-space">Download the app now!</h2>
        <ul class="flex" style="justify-content: center;">
            <li style="padding: 10px;">
                <a href="{{url('https://apps.apple.com/us/app/id1528936599')}}" target="_blank"><img src="{{url('img/aftersales/honda-touch/revise/Badge_Apple2x-8.png')}}" alt=""> </a>
            </li>
            <li style="padding: 10px;">
                <a href="{{url('https://play.google.com/store/apps/details?id=com.honda.HondaTouch.prod')}}" target="_blank"><img src="{{url('img/aftersales/honda-touch/revise/Badge_Google2x-8.png')}}" alt=""> </a>
            </li>
        </ul>
    </div>

    <div class="" style="background-color: #f5f5f5;padding: 50px 5px 50px 5px;">
        <div class="" style="font-size: 1.5rem;font-weight: 500;text-align: center;max-width: 500px;margin: auto;">
        Features of HondaTouch
        </div>
        <div class="" style="font-size: 1.5rem;font-weight: 500;text-align: center;color: #e30720;padding-top: 70px;padding-bottom: 20px;">FOR YOUR SERVICE CONVENIENCE</div>
        <ul class="flex" style="justify-content: center;">
            <li>
                <div class="icon"><img src="{{url('img/aftersales/honda-touch/Icons/icon1.png')}}" alt=""> </div>
                <div class="title">Service Appointment <br>Booking</div>
                <div class="content">Now, you can book your service in just a few clicks. <span style="white-space: nowrap;">With HondaTouch,</span> there's no need to call for your next appointment anymore!</div>
            </li>
            <li>
                <div class="icon"><img src="{{url('img/aftersales/honda-touch/Icons/icon2.png')}}" alt=""> </div>
                <div class="title">Service Appointment Reminder</div>
                <div class="content">Never miss a service booking again! Receive reminders for upcoming appointments, direct to your phone!</div>
            </li>
            <li>
                <div class="icon"><img src="{{url('img/aftersales/honda-touch/Icons/icon3.png')}}" alt=""> </div>
                <div class="title">Real-Time Service Status Tracking</div>
                <div class="content">Enjoy the freedom of waiting out of the service centre. With real-time service tracking in HondaTouch, you'll know the status of your service, wherever <span style="white-space: nowrap;">you are.</span></div>
            </li>
            <li>
                <div class="icon"><img src="{{url('img/aftersales/honda-touch/Icons/icon4.png')}}" alt=""> </div>
                <div class="title">Service History</div>
                <div class="content">Find all your previous service records in one place on HondaTouch! Refer to past services in just one touch, so you know exactly what to expect for <span style="white-space: nowrap;">future services.</span></div>
            </li>
            <li>
                <div class="icon"><img src="{{url('img/aftersales/honda-touch/Icons/icon5.png')}}" alt=""> </div>
                <div class="title">Find Your Nearest Dealer</div>
                <div class="content">Whether you're out of state or unfamiliar with the area, <br class="desktop">the Find Your Nearest Dealer feature leads you straight to the nearest Honda Authorised Dealership.</div>
            </li>
            <li>
                <div class="icon"><img src="{{url('img/aftersales/honda-touch/Icons/Icon6.png')}}" alt=""> </div>
                <div class="title">ePayment for Car Service*</div>
                <div class="content">Make online payments for any&nbsp;of our services via the app with up to&nbsp;7 payment channels of your&nbsp;preference.</div>
            </li>
        </ul>

        <div class="" style="font-size: 1.5rem;font-weight: 500;text-align: center;color: #e30720;padding-top: 70px;padding-bottom: 20px;">FOR IMMEDIATE ASSISTANCE &amp; SUPPORT</div>
        <ul class="flex" style="justify-content: center;">
            <li>
                <div class="icon"><img src="{{url('img/aftersales/honda-touch/Icons/icon7.png')}}" alt=""> </div>
                <div class="title">Emergency Assistance</div>
                <div class="content">Need immediate help? HondaTouch puts you in direct contact with emergency services in just one tap.</div>
            </li>
            <li>
                <div class="icon"><img src="{{url('img/aftersales/honda-touch/Icons/icon8.png')}}" alt=""> </div>
                <div class="title">Insurance Renewal Reminder</div>
                <div class="content">Let HondaTouch do the remembering for you. Receive reminders when your vehicle insurance is near expiry, so you'll never be caught off guard again.</div>
            </li>
        </ul>

        <div class="" style="font-size: 1.5rem;font-weight: 500;text-align: center;color: #e30720;padding-top: 70px;padding-bottom: 20px;">FOR ALL THE LATEST FROM Honda</div>
        <ul class="flex" style="justify-content: center;">
            <li>
                <div class="icon"><img src="{{url('img/aftersales/honda-touch/Icons/icon9.png')}}" alt=""> </div>
                <div class="title">Promos, Events &amp; Updates</div>
                <div class="content">Stay updated on all Honda events, and be the first to know about the latest and greatest Honda deals!</div>
            </li>

            <li>
                <div class="icon"><img src="{{url('img/aftersales/honda-touch/Icons/icon10.png')}}" alt=""> </div>
                <div class="title">New Car Pre-Booking</div>
                <div class="content">Stay ahead of the crowd with <span style="white-space: nowrap;">pre-booking</span> on new cars through HondaTouch!</div>
            </li>

            <li>
                <div class="icon"><img src="{{url('img/aftersales/honda-touch/Icons/icon11.png')}}" alt=""> </div>
                <div class="title">Contact Us</div>
                <div class="content">Got a question for us? With the direct <span style="white-space: nowrap;">in-app</span> link to Honda, submit your enquiries anytime, anywhere!</div>
            </li>
        </ul>

        {{-- <div class="" style="font-size: 1.5rem;font-weight: 500;text-align: center;color: #e30720;padding-top: 70px;padding-bottom: 20px;">FOR EASY ACCESS TO YOUR INFORMATION</div>
        <ul class="flex" style="justify-content: center;">
            <li>
                <div class="icon"><img src="{{url('img/aftersales/honda-touch/Icons/Icon11@3x.png')}}" alt=""> </div>
                <div class="title">My Profile</div>
                <div class="content">View and update your user information from anywhere, in just a few easy taps!</div>
            </li>

            <li>
                <div class="icon"><img src="{{url('img/aftersales/honda-touch/Icons/Icon12@3x.png')}}" alt=""> </div>
                <div class="title">My Vehicle</div>
                <div class="content">View all your vehicle details and data in one dashboard, quick and easy!</div>
            </li>
        </ul>  --}}
    </div>

    {{-- ------------------------------------------------------------------- IMPORTANT! - only use Laravel comment. DO NOT USE HTML comment --}}

    <div class="video-container" style="padding: 50px 0 50px 0;">
        <div class="embed-youtube"><iframe width="760" height="515" src="https://www.youtube.com/embed/ZDnBs5aGtmk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
    </div>

    <div class="" style="padding-bottom: 30px;">
        <div class="stage-contained">
            <div class="note-container" style="margin: 0px 20px 0px 20px;">
                <div class="note-title more long">DISCLAIMERS</div>
                <div class=" expand-content" style="display: none;">
                    <ul class="note">
                        <li>*Only available at selected Honda Authorised Dealers.<br/>Terms and Conditions apply.</li>
                    </ul>
                </div>


            </div>
        </div>
    </div>

</section>

</div>

<style>

    .content-inner .hondatouchbanner {
        background: url(../img/aftersales/honda-touch/HeroBanner.png)
        no-repeat top center;
        background-size: cover;
        height: 420px;
        color: #fff;
        position: relative;
        background-position-y: center;
    }
    .title-left {text-align:left;}
    .hip.innerpage .icon {width:90px; height: 90px;}
    .note-container .more.long:after{left:unset;}
    .hip.innerpage ul.flex li {margin-bottom: 0px;}

    ul.flex li img {width:100%;}
    .mobile-space {padding-top: 0;}
    .desktop {display: block;}
    /* overwrite */
    .innerpage ul.flex li {width:26%;}
    .hip.innerpage .title {height: 45px;}

    .video-container {display: block;margin: 20px auto;width: 100%;max-width: 760px;padding: 0 10px;}

    .embed-youtube {padding-bottom: 56.25%;overflow: hidden;position: relative;width: 100%;height: 100%;cursor: pointer;}
    .embed-youtube iframe,
    .embed-youtube object,
    .embed-youtube embed { border: 0; position: absolute; top: 0; left: 0; width: 100%; height: 100%;}
    
    .bottomright {
        position: absolute;
        top: 16.5rem;
        right: -4rem;
    }
    .connect-img {
        width: 73%;
    }

    @media only screen and (max-width: 640px) {
        .content-inner .hondatouchbanner {background: url(../img/aftersales/honda-touch/HeroBanner.png)no-repeat top center;background-size: cover;height: 135px;}
        .title-left {text-align:center;}
        ul.flex li img {width:50%;}
        .mobile-space {padding-top: 20px;}
        .hip.innerpage .title {height: unset;}
        .desktop {display: none;}
        .connect-img {width: 20%;}
        .bottomright {top: 5.5rem; right: -14.5rem;}
    }


</style>

@stop

