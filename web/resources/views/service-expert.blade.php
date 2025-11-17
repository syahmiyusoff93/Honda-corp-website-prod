
@extends('layouts.base')


@section('content')

<div class="body-wrapper">

<section class="content-inner col-team-experts">
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
                <li><a href="{{url('aftersales/service-with-us/diagnostic-system')}}">Honda DIAGNOSTIC SYSTEM</a></li>
                <li><a href="{{url('aftersales/service-with-us/customised-workshop')}}">CUSTOMISED WORKSHOP MANUAL</a></li>
                <li style="border-bottom: 3px solid #e32119;"><a href="{{url('aftersales/service-with-us/team-expert')}}">TEAM OF EXPERT</a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </section>

    <div class="inner-content-section content-area">
        <h2>A Dedicated Team of Experts</h2>
        <div class="content-copy">
        <p>Our Service Centres are made up of qualified technicians with certified technical college backgrounds, who are led by senior experts in the automotive technology.</p>
        <P>Training sessions in diagnostics, maintenance work and repairs are held on a regular basis for all Service Centre personnel.</P>
        </div>
        <div class="clearfix"></div>
        <div class="btn-container">
            <a href="{{url('aftersales/maintenance-schedule')}}" class="prime-cta-black">
            <span>MAINTENANCE SCHEDULE</span>
            <div class="overlay"></div>
            </a>
        </div>
    </div>
</section>

</div>

@stop

