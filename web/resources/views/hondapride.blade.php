
@extends('layouts.base')


@section('content')

<div class="body-wrapper">

<section class="content-inner honda-pride innerpage" id="honda-pride">
    <div class="hero-banner hondapride">
        <!-- <div class="text-container">
            <div class="cat">Honda Pride</div>
            <div class="header">FROM QUALITY MAINTENANCE & SERVICE TO CUSTOMER CAR EXPERIENCE, WE GOT YOU COVERED.  </div>
        </div> -->
    </div>

    <section class="service-tab-menu">
        <div class="menu-toggle smooth-slide">
            <input type="checkbox" id="service-tab-menu-check">
                <div class="service-tab-menu-btn">
                <label for="service-tab-menu-check">
                    <span></span>
                </label>
                </div>
                <ul>
                    <li style="border-bottom: 3px solid #e32119;"><a href="{{url('aftersales/honda-pride')}}">Honda PRIDE</a></li>
                    <li><a href="{{url('aftersales/honda-body-paint')}}">BODY &amp; PAINT</a></li>
                </ul>
        </div>
        <div class="clearfix"></div>
    </section>

    <div class="inner-content-section content-area">
        <h2>Honda AUTHORISED SERVICE CENTRE</h2>
        <div class="content-copy">Honda Authorised Service Centres are equipped with the tools, expertise and parts that are tailored for every Honda, so that you get the quality and excellence you deserve. Experience the joy of driving for years to come with these 12 specially designed benefits.</div>       
    </div>

    <div class="stage-contained">
        <ul class="flex">
            <li>
                <div class="icon"><img src="{{url('img/aftersales/icon/01.png')}}" alt=""> </div>
                <div class="title">Preventive Maintenance Service Schedule</div>
                <div class="content">Regular comprehensive service helps to maintain your car as if it’s brand new</div>
            </li>

            <li>
                <div class="icon"><img src="{{url('img/aftersales/icon/02.png')}}" alt=""> </div>
                <div class="title">Free Labour Service</div>
                <div class="content">Enjoy cost savings at alternate service intervals</div>
            </li>

            <li>
                <div class="icon"><img src="{{url('img/aftersales/icon/03.png')}}" alt=""> </div>
                <div class="title">Minimum 15% Parts Discount</div>
                <div class="content">Genuine Honda parts at wallet-friendly prices helps to reduce maintenance costs</div>
            </li>

            <li>
                <div class="icon"><img src="{{url('img/aftersales/icon/04.png')}}" alt=""> </div>
                <div class="title">Skilled Technicians</div>
                <div class="content">Specialised training for Honda technicians guarantees quality service</div>
            </li>

            <li>
                <div class="icon"><img src="{{url('img/aftersales/icon/05.png')}}" alt=""> </div>
                <div class="title">Bulk Oil System</div>
                <div class="content">Reduces wastage and ensures you only pay for the oil you need</div>
            </li>

            <li>
                <div class="icon"><img src="{{url('img/aftersales/icon/06.png')}}" alt=""> </div>
                <div class="title">Honda Insurance Plus</div>
                <div class="content">Comprehensive coverage for the best care</div>
            </li>

            <li>
                <div class="icon"><img src="{{url('img/aftersales/icon/07.png')}}" alt=""> </div>
                <div class="title">10,000km Service Interval</div>
                <div class="content">Longer intervals between service helps to save your time and money</div>
            </li>

            <li>
                <div class="icon"><img src="{{url('img/aftersales/icon/08.png')}}" alt=""> </div>
                <div class="title">5-Year Warranty With Unlimited Mileage</div>
                <div class="content">For peace of mind</div>
            </li>

            <li>
                <div class="icon"><img src="{{url('img/aftersales/icon/09.png')}}" alt=""> </div>
                <div class="title">Genuine Parts</div>
                <div class="content">Extend the life of your car with quality parts which are available without having to wait for days</div>
            </li>

            <li>
                <div class="icon"><img src="{{url('img/aftersales/icon/10.png')}}" alt=""> </div>
                <div class="title">Special Tools</div>
                <div class="content">DST-i ensures accurate vehicle diagnostics</div>
            </li>

            <li>
                <div class="icon"><img src="{{url('img/aftersales/icon/11.png')}}" alt=""> </div>
                <div class="title">Quality Fuel Strainer And Pollen Filter</div>
                <div class="content">A longer lifespan for these parts gives greater value for money</div>
            </li>

            <li>
                <div class="icon"><img src="{{url('img/aftersales/icon/12.png')}}" alt=""> </div>
                <div class="title">Customer Comfort</div>
                <div class="content">Comfortable lounges, complimentary F&B, Wi-Fi and kids’ corners are in all Service Centres</div>
            </li>
        </ul>
    </div>

    <!-- 10 reasons -->

    <div class="inner-content-section content-area">
        <h2>10 REASONS WHY YOU SHOULD SERVICE YOUR CAR PERIODICALLY</h2>
        <div class="content-copy">
            <div class="row-content-10reasons content-copy-left">
                <div class="column-content-10reasons">
                <div class="content-copy-no"><img src="{{url('img/aftersales/icon/reasons/01.png')}}" alt=""></div><p>Promote better <span class="bold">fuel-efficiency</span> and lower CO<sub>2</sub> emissions</p>
                </div>
                <div class="column-content-10reasons mobile-bg-grey">
                <div class="content-copy-no"><img src="{{url('img/aftersales/icon/reasons/02.png')}}" alt=""></div><p>Ensure <span class="bold">effectiveness of engine oil</span> with regular replacement <br><span style="font-size:0.7em;">(this also ensures better fuel-efficiency)</span></p>
                </div>
            </div>
            <div class="row-content-10reasons content-copy-left desktop-bg-grey">
                <div class="column-content-10reasons">
                <div class="content-copy-no"><img src="{{url('img/aftersales/icon/reasons/03.png')}}" alt=""></div><p class="bold">Prevent fluid leakage</p>
                </div>
                <div class="column-content-10reasons mobile-bg-grey">
                <div class="content-copy-no"><img src="{{url('img/aftersales/icon/reasons/04.png')}}" alt=""></div><p>Ensure <span class="bold">brake safety</span> as brakes will be checked and adjusted accordingly</p>
                </div>
            </div>
            <div class="row-content-10reasons content-copy-left">
                <div class="column-content-10reasons">
                <div class="content-copy-no"><img src="{{url('img/aftersales/icon/reasons/05.png')}}" alt=""></div><p><span class="bold">Avoid unnecessary wear and tear</span> with lubrication of moving parts</p>
                </div>
                <div class="column-content-10reasons mobile-bg-grey">
                <div class="content-copy-no"><img src="{{url('img/aftersales/icon/reasons/06.png')}}" alt=""></div><p>Improve <span class="bold">lifespan of tyres</span> with regular checking, rotation and inflation of proper tyre pressure</p>
                </div>
            </div>
            <div class="row-content-10reasons content-copy-left desktop-bg-grey">
                <div class="column-content-10reasons">
                <div class="content-copy-no"><img src="{{url('img/aftersales/icon/reasons/07.png')}}" alt=""></div><p>For <span class="bold">better visibility,</span> lights must be frequently checked and adjusted</p>
                </div>
                <div class="column-content-10reasons mobile-bg-grey">
                <div class="content-copy-no"><img src="{{url('img/aftersales/icon/reasons/08.png')}}" alt=""></div><p>Ensure <span class="bold">smooth driving</span> with regular checking of steering and suspension components</p>
                </div>
            </div>
            <div class="row-content-10reasons content-copy-left">
                <div class="column-content-10reasons">
                <div class="content-copy-no"><img src="{{url('img/aftersales/icon/reasons/09.png')}}" alt=""></div><p><span class="bold">Prevent engine component damage</span> of failure</p>
                </div>
                <div class="column-content-10reasons mobile-bg-grey">
                <div class="content-copy-no"><img src="{{url('img/aftersales/icon/reasons/10.png')}}" alt=""></div><p>It <span class="bold">enhances the resale value</span> of your vehicle</p>
                </div>
            </div>
        </div>
    </div>

        <!-- standard service transaction -->
    <div class="inner-content-section content-area">
        <h2>STANDARD SERVICE TRANSACTION</h2>
        <div class="content-copy" style="padding-bottom: 20px;">The key to Honda's commitment to your satisfaction is the Standard Service Transaction, an operations manual that entails every step to serve you better and provide your car with the best care, from the moment you book an appointment until your next visit to us. </div>
        <!-- <div class="content-copy">
            <div class="row-content-sst content-copy-left">
                <div class="column-content-sst">
                <div class="content-copy-no-sst"><img src="{{url('img/aftersales/icon/sst/01.png')}}" alt=""></div><p>We <span class="bold">keep track of every customer's record</span> with an extensive database.</p>
                </div>
                <div class="column-content-sst mobile-bg-grey">
                <div class="content-copy-no-sst"><img src="{{url('img/aftersales/icon/sst/02.png')}}" alt=""></div><p>Our Service Advisors will <span class="bold">attend to you, run diagnostics & advise</span> on the next course of action.</p>
                </div>
            </div>
            <div class="row-content-sst content-copy-left desktop-bg-grey">
                <div class="column-content-sst">
                <div class="content-copy-no-sst"><img src="{{url('img/aftersales/icon/sst/03.png')}}" alt=""></div><p>Every servicing is <span class="bold">bound to strict quality standards</span> and requires a senior technician's seal of approval.</p>
                </div>
                <div class="column-content-sst mobile-bg-grey">
                <div class="content-copy-no-sst"><img src="{{url('img/aftersales/icon/sst/04.png')}}" alt=""></div><p>For a pristine condition, we also <span class="bold">protect your steering wheel, fender and seats</span> from possible dents and scratches.</p>
                </div>
            </div>
            <div class="row-content-sst content-copy-left">
                <div class="column-content-sst">
                <div class="content-copy-no-sst"><img src="{{url('img/aftersales/icon/sst/05.png')}}" alt=""></div><p>We <span class="bold">ensure that you understand</span> the repairs and servicing made.</p>
                </div>
                <div class="column-content-sst mobile-bg-grey">
                <div class="content-copy-no-sst"><img src="{{url('img/aftersales/icon/sst/06.png')}}" alt=""></div><p>We always <span class="bold">appreciate your feedback</span> to guarantee our service standards.</p>
                </div>
            </div>
            <div class="row-content-sst content-copy-left desktop-bg-grey">
                <div class="column-content-sst">
                <div class="content-copy-no-sst"><img src="{{url('img/aftersales/icon/sst/07.png')}}" alt=""></div><p>While you're waiting for your car, <span class="bold">relax</span> in the customer area, equipped with satellite TV & <span class="bold">free refreshments.</span></p>
                </div>
                <div class="column-content-sst mobile-bg-grey">
                <div class="content-copy-no-sst"></div><p></p>
                </div>
            </div>
        </div> -->
        <div class="content-copy">
            <div class="row-content-10reasons content-copy-left">
                <div class="column-content-10reasons">
                <div class="sst-img content-copy-no"><img src="{{url('img/aftersales/icon/sst/01.png')}}" alt=""></div><p>We <span class="bold">keep track of every customer's record</span> with an extensive database.</p>
                </div>
                <div class="column-content-10reasons mobile-bg-grey">
                <div class="sst-img content-copy-no"><img src="{{url('img/aftersales/icon/sst/02.png')}}" alt=""></div><p>Our Service Advisors will <span class="bold">attend to you, run diagnostics & advise</span> on the next course of action.</p>
                </div>
            </div>
            <div class="row-content-10reasons content-copy-left desktop-bg-grey">
                <div class="column-content-10reasons">
                <div class="sst-img content-copy-no"><img src="{{url('img/aftersales/icon/sst/03.png')}}" alt=""></div><p>Every servicing is <span class="bold">bound to strict quality standards</span> and requires a senior technician's seal of approval.</p>
                </div>
                <div class="column-content-10reasons mobile-bg-grey">
                <div class="sst-img content-copy-no"><img src="{{url('img/aftersales/icon/sst/04.png')}}" alt=""></div><p>For a pristine condition, we also <span class="bold">protect your steering wheel, fender and seats</span> from possible dents and scratches.</p>
                </div>
            </div>
            <div class="row-content-10reasons content-copy-left">
                <div class="column-content-10reasons">
                <div class="sst-img content-copy-no"><img src="{{url('img/aftersales/icon/sst/05.png')}}" alt=""></div><p>We <span class="bold">ensure that you understand</span> the repairs and servicing made.</p>
                </div>
                <div class="column-content-10reasons mobile-bg-grey">
                <div class="sst-img content-copy-no"><img src="{{url('img/aftersales/icon/sst/06.png')}}" alt=""></div><p>We always <span class="bold">appreciate your feedback</span> to guarantee our service standards.</p>
                </div>
            </div>
            <div class="row-content-10reasons content-copy-left desktop-bg-grey">
                <div class="column-content-10reasons">
                <div class="sst-img content-copy-no"><img src="{{url('img/aftersales/icon/sst/07.png')}}" alt=""></div><p>While you're waiting for your car, <span class="bold">relax</span> in the customer area, equipped with satellite TV & <span class="bold">free refreshments.</span></p>
                </div>
                <div class="column-content-10reasons mobile-bg-grey">
                <div class="content-copy-no"></div><p></p>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="btn-container">
            <a href="{{url('aftersales/maintenance')}}" class="prime-cta-black">
            <span>MAINTENANCE SCHEDULE</span>
            <div class="overlay"></div>
            </a>
        </div>
    </div>

    <div class="stage-contained">
        <div class="note-container">
            <div class="note-title more long">DISCLAIMERS</div>
            <div class=" expand-content" style="display: none;">
                <ul class="note number">
                    <li>Free Labour Service: Applicable up to 5 or 6 times only within the first 100,000km or 5 years of ownership, whichever comes first. Terms may vary according to model.</li>
                    <li>Bulk Oil System: Only applies to the recommended SN OW-20 (Honda Low Viscosity Engine Oil).</li>
                    <li>10,000KM Service Interval: Applicable for Full Model Change Honda models purchased from July 2012 onwards only.</li>
                    <li>Genuine Parts: Applicable for parts changed in accordance with the Preventive Maintenance Service Schedule only.</li>
                    <li>5-Year Warranty with Unlimited Mileage: Applicable for Honda models purchased from June 2012 onwards.</li>
                    <li>Honda reserves the right to change these terms and conditions at any time without prior notice.</li>
                </ul>
            </div>
            
            
        </div>
    </div>


</section>



</div>

<style>
.content-copy-no {position: absolute;margin-left: -50px;margin-top: 0px;}
.content-copy-no img {width: 80%;}
.content-inner .inner-content-section .content-copy p:last-child {padding-right: 30px;padding-left: 10px;}
.content-inner .inner-content-section .content-copy {line-height: 20px;}
.desktop-bg-grey {background-color: #fff;}
.bold {font-weight: 500;}

.column-content-sst {float: left;width: 50%;padding: 15px;padding-left: 30px;}
.content-copy-no-sst {position: absolute;margin-left: -50px;margin-top: 0px;}
.content-copy-no-sst img {width: 80%;}
.sst-img img {width: 40%;}

.content-copy-left {text-align: left;padding-left: 20px;padding-top: 0px;margin-top: 30px;}
.honda-pride.innerpage .title {height: 35px;}

@media screen and (max-width: 640px) {
    .column-content-10reasons {width: 50%; padding: 5px;}
    .content-copy-no {position: relative;margin-left: 0px;margin-top: 0px; text-align: center;}
    .content-inner .inner-content-section .content-copy p:last-child {padding-right: 0px; text-align: center;padding-left: 0px;}
    
    .mobile-bg-grey {background-color: #fff;}
    .content-copy-no img {width: 30%;}
    .sst-img img {width: 30%;}

    .column-content-sst {width: 100%;padding: 5px;padding-bottom: 15px;}
    .content-copy-no-sst {margin-left: 0px;margin-top: 9px;}
    .content-copy-no-sst img {width: 50%;}
    .content-inner .inner-content-section .content-copy .column-content-sst p:last-child {padding-right: 0px; text-align: left; margin-left: 40px;}
    .content-copy-left {padding-left: 0px;}
    a.prime-cta-black, a.prime-cta-white {padding: 20px 0px;}
    .honda-pride.innerpage .title {height: 55px;}
}

@media screen and (max-width: 480px) {
    .honda-pride.innerpage ul.flex li {width:50%; padding: 20px 15px;}
}
</style>

@stop

