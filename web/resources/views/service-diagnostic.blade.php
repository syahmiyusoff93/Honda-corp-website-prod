
@extends('layouts.base')


@section('content')

<div class="body-wrapper">

<section class="content-inner col-diagnostic-system">
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
                <li><a href="{{url('aftersales/service-with-us/standard-transaction')}}">STANDARD SERVICE TRANSACTION</a></li>
                <li style="border-bottom: 3px solid #e32119;"><a href="{{url('aftersales/service-with-us/diagnostic-system')}}">Honda DIAGNOSTIC SYSTEM</a></li>
                <li><a href="{{url('aftersales/service-with-us/customised-workshop')}}">CUSTOMISED WORKSHOP MANUAL</a></li>
                <li><a href="{{url('aftersales/service-with-us/team-expert')}}">TEAM OF EXPERT</a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </section>

    <div class="inner-content-section content-area">
        <h2>Honda Diagnostic System (HDS)</h2>
        <div class="content-copy">
        <p>Anytime a Honda is brought in for maintenance, it is inspected with the Honda Diagnostic System (HDS), a diagnostic tool specially created to restore all computerised parts up to manufacturing standards, aid to have complete diagnostics if there is any issue to be resolved.</p>
        </div>
        <div class="clearfix"></div>
        <div class="btn-container">
            <a href="{{url('aftersales/service-with-us/customised-workshop')}}" class="prime-cta-black">
            <span>CUSTOMISED WORKSHOP MANUAL</span>
            <div class="overlay"></div>
            </a>
        </div>
    </div>
</section>


</div>

@stop

