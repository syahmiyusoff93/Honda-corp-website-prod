
@extends('layouts.base')

@section('content')

<div class="body-wrapper">
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
                <li><a href="{{url('aftersales/maintenance')}}">Maintenance Schedule</a></li>
                <li style="border-bottom: 3px solid #e32119;"><a href="{{url('aftersales/maintenance-faq')}}">FAQ</a></li>
            </ul>
    </div>
    <div class="clearfix"></div>
</section>
<section class="content-inner innerpage" style="margin-top: 30px;">

    <div class="inner-content-section content-area hip-reason">
        <h2>SERVICE MAINTENANCE</h2>
        <div class="collapse-container">

            <div class="more">What is the service interval for Honda vehicle? </div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                    Service intervals will be as per the 'Preventive Maintenance Service Schedule' (PMSS) which is stipulated in your Owner's Manual. Please refer to your Honda Authorised dealer for further information.
                </div>
            </div>

            <div class="more">Can I send my vehicle for service / repair at different dealers? </div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                    You may service / repair your vehicle at any of our Honda Authorised Dealers.
                </div>
            </div>

            <div class="more">Can I claim my Free Service if I fail to service my vehicle on time? </div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                    The Free Service Promotion is only applicable to vehicles that adhere to the 'Preventive Maintenance Service Schedule' (PMSS) on regular basis.
                </div>
            </div>

            <div class="more">Do I have any options of choosing the engine oil for service? </div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                    It is advisable to use Honda Genuine Engine Oils as recommended by your dealer.
                </div>
            </div>

            <div class="more">Will it affect my vehicle's engine if I switch from Fully Synthetic Oil to Mineral Oil or vice versa?  </div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                    There will be no adverse effect to your vehicle's engine, however we would recommend you to use Fully Synthetic Oil for better performance.
                </div>
            </div>

            <div class="more">What are the benefits of using Fully Synthetic Oil? </div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                    Listed below are some of the benefits of using Fully Synthetic Oil:
                    <ul class="disc roman">
                        <li>It possesses good anti-wear properties to ensure reduced engine sludge.</li>
                        <li>Speedy acceleration response. </li>
                        <li>Maximum engine performance.</li>
                        <li>Reduce friction effectively and promoted better fuel-efficiency. </li>
                    </ul>
                </div>
            </div>

            <div class="more">Where can I obtain the price of the engine oils?</div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                    Please refer to our authorised dealers for the prices of engine oils.
                </div>
            </div>

            <div class="more">When is it recommended to perform tyres alignment, rotation and balancing?</div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                    Tyres alignment, rotation and balancing are recommended at every 10,000km.
                </div>
            </div>

            <div class="more">I would like to know what parts will be replaced at each service interval and what is the price for each item?</div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                    Our authorised dealers will be able to explain to you in detail of the requirements for each service interval.
                </div>
            </div>

        </div>
    </div>

    <div class="inner-content-section content-area hip-reason">
        <h2>SERVICE APPOINTMENT</h2>
        <div class="collapse-container">

            <div class="more">What is the "Appointment System"? </div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                    It is a reserved time for you to meet up with the Service Advisor to discuss your vehicle service requirements.
                </div>
            </div>

            <div class="more">How do I make an Appointment? </div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                    Just call your preferred Honda Authorised Dealer and make a reservation for your preferred date and time.
                </div>
            </div>

            <div class="more">Does this mean that my car will be immediately sent in for service / repair? </div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                    The appointment time allocated is for you to meet the Service Advisor only. This will reduce your waiting time to be attended to.
                </div>
            </div>

            <div class="more">When should I make the appointment? </div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                    <ul class="disc roman">
                        <li>Weekdays: at least two (2) week in advance.</li>
                        <li>Weekends: please refer to your preferred dealers as it is subject to availability. </li>
                        <li>Festive season: at least one (1) weeks in advance. </li>
                    </ul>
                    <span style="font-style: italic;">This is to avoid non-availability or long waiting time. </span>
                </div>
            </div>

            <div class="more">What happens if I am late? </div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                    <ul class="disc roman">
                        <li>Any later than fifteen (15) mins, you will be considered as walk-in customer and need to be queued with other walk-in customers to be attended.</li>
                        <li>Please be punctual to ensure that there are no disruptions to the appointment time allocated for other customers.</li>
                        <li>It is advisable to be at the service centre 15 minutes before your appointment time. </li>
                    </ul>
                </div>
            </div>

            <div class="more">What if I can't make it for the Appointment?</div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                    The dealers will assist you to reschedule the appointment to another available date and time.
                </div>
            </div>

            <div class="more">Can I walk in without an appointment?</div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                    It is highly not recommended as you may have to wait long to be attended by Service Advisor and completion of the service / repair.
                </div>
            </div>

        </div>
    </div>

</section>

</div>

<script>
    $(document).ready(function(){
        // TO APPEND NUMBER TO THE FAQ QUESTION AUTOMATICALLY - in case we need to shuffle questions, then no need to manually number it again
        var faqrunning=0;
        $('.collapse-container .more').each(function(){
            faqrunning++;
            $(this).html('<div class="numcontainer">'+faqrunning+'.</div><div class="tcontainer"> '+$(this).html()+'</div>')
        })
    })
</script>

<style>
     ul.roman, ul.roman li {list-style:lower-roman;}
     .content-inner .expand-content {margin: 0 45px; margin-bottom:10px;}

     .content-inner .numcontainer {width:25px; display: inline-block; vertical-align: text-top; }
     .content-inner .tcontainer {width:calc(100% - 28px); display:inline-block;vertical-align: text-top;}
</style>

@stop

