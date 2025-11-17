
@extends('layouts.base')


@section('content')

<div class="body-wrapper">

<section class="content-inner col-10reasons">
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
                <li style="border-bottom: 3px solid #e32119;"><a href="{{url('aftersales/service-with-us')}}">10 REASONS</a></li>
                <li><a href="{{url('aftersales/service-with-us/standard-transaction')}}">STANDARD SERVICE TRANSACTION</a></li>
                <li><a href="{{url('aftersales/service-with-us/diagnostic-system')}}">Honda DIAGNOSTIC SYSTEM</a></li>
                <li><a href="{{url('aftersales/service-with-us/customised-workshop')}}">CUSTOMISED WORKSHOP MANUAL</a></li>
                <li><a href="{{url('aftersales/service-with-us/team-expert')}}">TEAM OF EXPERT</a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </section>

    <div class="inner-content-section content-area">
        <h2>Why You Should Service Your Car Periodically</h2>
        <div class="content-copy">
            <div class="row-content-10reasons content-copy-left">
                <div class="column-content-10reasons">
                <div class="content-copy-no">01</div><p>Promote better fuel-efficiency and lower CO2 emissions</p>
                </div>
                <div class="column-content-10reasons mobile-bg-grey">
                <div class="content-copy-no">02</div><p>Ensure effectiveness of engine oil with regular replacement</p>
                </div>
            </div>
            <div class="row-content-10reasons content-copy-left desktop-bg-grey">
                <div class="column-content-10reasons">
                <div class="content-copy-no">03</div><p>Prevent fluid leakage</p>
                </div>
                <div class="column-content-10reasons mobile-bg-grey">
                <div class="content-copy-no">04</div><p>Ensure brake safety as brakes will be checked and adjusted accordingly</p>
                </div>
            </div>
            <div class="row-content-10reasons content-copy-left">
                <div class="column-content-10reasons">
                <div class="content-copy-no">05</div><p>Avoid unnecessary wear and tear with lubrication of moving parts</p>
                </div>
                <div class="column-content-10reasons mobile-bg-grey">
                <div class="content-copy-no">06</div><p>Improve lifespan of tyres with regular checking, rotation and inflation of proper tyre pressure</p>
                </div>
            </div>
            <div class="row-content-10reasons content-copy-left desktop-bg-grey">
                <div class="column-content-10reasons">
                <div class="content-copy-no">07</div><p>For better visibility, lights must be frequently checked and adjusted</p>
                </div>
                <div class="column-content-10reasons mobile-bg-grey">
                <div class="content-copy-no">08</div><p>Ensure smooth driving with regular checking of steering and suspension components</p>
                </div>
            </div>
            <div class="row-content-10reasons content-copy-left">
                <div class="column-content-10reasons">
                <div class="content-copy-no">09</div><p>Prevent engine component damage of failure</p>
                </div>
                <div class="column-content-10reasons mobile-bg-grey">
                <div class="content-copy-no">10</div><p>It enhances the resale value of your vehicle</p>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="btn-container">
            <a href="{{url('aftersales/service-with-us/standard-transaction')}}" class="prime-cta-black">
            <span>STANDARD SERVICE TRANSACTION</span>
            <div class="overlay"></div>
            </a>
        </div>
    </div>
</section>

</div>

@stop

