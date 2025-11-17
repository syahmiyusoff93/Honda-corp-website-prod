
@extends('layouts.base')


@section('content')

<div class="body-wrapper">

<section class="content-inner col-standard-service-transaction">
    <div class="hero-banner service-withus">
        <div class="text-container">
            <div class="cat">Service With Us</div>
            <div class="header">PERFORMANCE AND SAFETY UPKEEP WITH Honda.</div>
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
                <li><a href="{{url('aftersales/service-with-us')}}">10 REASONS</a></li>
                <li style="border-bottom: 3px solid #e32119;"><a href="{{url('aftersales/service-with-us/standard-transaction')}}">STANDARD SERVICE TRANSACTION</a></li>
                <li><a href="{{url('aftersales/service-with-us/diagnostic-system')}}">Honda DIAGNOSTIC SYSTEM</a></li>
                <li><a href="{{url('aftersales/service-with-us/customised-workshop')}}">CUSTOMISED WORKSHOP MANUAL</a></li>
                <li><a href="{{url('aftersales/service-with-us/team-expert')}}">TEAM OF EXPERT</a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </section>

    <div class="inner-content-section content-area">
        <h2>Quality Assurance Tools and Standards</h2>
        <div class="content-copy">
        <p>The key to Honda's commitment to your satisfaction is the Standard Service Transaction, an operations manual that entails every step to serve you better and provide your car with the best care, from the moment you book an appointment until your next visit to us. </p>
        <hr>
        <div class="content-copy-left">
        <p>1. We keep track of every customer's record with an extensive database including your maintenance records so that we stay up to date with your Honda.</p>
        <p>2. Our Service Advisors will attend to your concerns about your Honda, run diagnostics and advise you on the next course of action to ensure what's best for your Honda.</p>
        <p>3. The moment we attend to your Honda, every servicing is bound to strict quality standards and goes through a senior technician's seal of approval before we hand the keys back to you.</p>
        <p>4. To ensure that your Honda is in pristine condition, we also protect your steering wheel, fender and seats from possible dents and scratches.</p>
        <p>5. When the maintenance is done, we ensure that you understand the repairs and servicing made.</p>
        <p>6. We always appreciate your feedback after every maintenance to guarantee our service standards.</p>
        <p>7. While you're waiting for your car, kick back and relax in the customer area, equipped with satellite TV, or help yourself to some free refreshments we have provided for you.</p>
        </div>
        </div>
        <div class="clearfix"></div>
        <div class="btn-container">
            <a href="{{url('aftersales/service-with-us/diagnostic-system')}}" class="prime-cta-black">
            <span>Honda DIAGNOSTIC SYSTEM</span>
            <div class="overlay"></div>
            </a>
        </div>
    </div>
</section>

</div>

@stop

