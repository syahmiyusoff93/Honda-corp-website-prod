@php

    $faq_cat[] = ['general','General'];
    $faq_cat[] = ['specialsales','Special Sales'];
    $faq_cat[] = ['sales','Sales'];
    $faq_cat[] = ['servicemaintenance','Service Maintenance'];
    $faq_cat[] = ['serviceappointment','Service Appointment'];
    $faq_cat[] = ['technicaladvice','Technical Advice'];
    $faq_cat[] = ['hip','Honda Insurance Plus'];
    $faq_cat[] = ['accessories','Accessories'];
    $faq_cat[] = ['hondaparts','Honda Parts'];
    $faq_cat[] = ['warranty','Warranty'];
    $faq_cat[] = ['hybrid','Hybrid Vehicle'];
    $faq_cat[] = ['ima','Hybrid Battery'];

@endphp

@extends('layouts.base')
@section('page-title')
    Customer Service
@endsection


@section('content')

<section class="service-tab-menu">
        <div class="menu-toggle smooth-slide">
            <input type="checkbox" id="service-tab-menu-check">
                <div class="service-tab-menu-btn">
                <label for="service-tab-menu-check">
                    <span></span>
                </label>
                </div>
                <ul>
                    <li><a href="{{url('locate-us')}}">LOCATE US</a></li>
                    <li style="border-bottom: 3px solid #e32119;"><a href="{{url('customer-service')}}">CUSTOMER SERVICE</a></li>
                    <li><a href="{{url('career')}}">CAREER</a></li>
                </ul>
        </div>
        <div class="clearfix"></div>

<style>
/* overwrite */
    .service-tab-menu {background: #e4e4e4; margin-bottom: -15px;}
    .service-tab-menu ul li a {color: #000;}

    @media only screen and (max-width: 640px) {
        /* .service-tab-menu {display: none;} */
    }
</style>
</section>

<div class="body-wrapper model-inner-container">

    <section class="inner-container intro">
        <div class="topgap" style="height:0px;"></div>
        <h2>CUSTOMER SERVICE</h2>
        <div class="intro-title grey">Your experience with Honda should be one that is unrivalled. Which is why your feedback is vital to help us make the necessary improvements to serve you better. If you have any thoughts, suggestions or queries, do contact us and we'll be more than happy to assist you.</div>
        <div class="btn-container center">
            <a href="{{url('/customer-service/enquiry')}}" class="prime-cta-white" style="background: black; color:white;">
                <span>ENQUIRY &amp; FEEDBACK FORM</span>
                <div class="overlay"></div>
            </a>
        </div>
    </section>

    <section id="faq" class="inner-container bg-grey">

        <div class="faq-maincontainer">
            <h2>FREQUENTLY ASKED QUESTION</h2>
            <div class="intro-title center">Search for a topic or pick one below.</div>

            <div class="search-bar-column center">


                    <input class="faq-search" type="text" placeholder="Search FAQs" name="keyword" value="">

                <div class="search-status">Please type more than 3-character keyword to search...</div>

            </div>
            <!-- <div class="clearfix"></div> -->
            <div class="faq-btn-container">
                <div class="faq-btn-row">
                    @foreach ($faq_cat as $item)
                    <div class="faq-btn-col">
                        <div class="faq-btn" data-box="faq-{{$item[0]}}"><span>{{$item[1]}}</span></div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- mobile --}}
            <div class="formsection globalform" style="display: none;">
                {{-- EVERY <ul> IS A ROW --}}
                <ul class="formrow">
                    {!! form_generate_select('', 'faq', $faq_cat, '', '', '', 'Select') !!}
                </ul>
                <div class="clearfix"></div>
            </div>
            {{-- MUST INCLUDE THIS FOR EVERY PAGE THAT UTILISE GLOBAL FORM ELEMENT --}}
            @include('form.script-style')
        </div>

        <div class="faq-details-container">
            <div class="content-inner">
                <!-- faq details start -->
                <div id="faq-general" class="faq-details active">
                    <h2>GENERAL</h2>
                    <div class="collapse-container">

                        <div class="more">How can I update my new mailing address?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                You may update your details through any of the following ways:
                                <ul class="disc roman">
                                    <li>Honda Website (<a href="{{url('aftersales/update-profile')}}" target="_blank">www.honda.com.my</a>). </li>
                                    <li>Honda Toll Free Line 1-800-88-2020 (during working hours)</li>
                                </ul>
                            </div>
                        </div>

                        <div class="more">I'm the second owner of the vehicle. How can I update the ownership profile?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                You may update your details through any of the following ways:
                                <ul class="disc roman">
                                    <li>Honda Website (<a href="{{url('aftersales/update-profile')}}" target="_blank">www.honda.com.my</a>)**. </li>
                                    <li>Honda Toll Free Line 1-800-88-2020 (during work hours)*</li>
                                    <li>Fax in request letter*</li>
                                    <li>Mail in request letter*</li>
                                </ul>
                            </div>
                            <div class="disclaimer-copy">*Kindly provide us a copy of your ID card or passport and the vehicle's grant / registration card.</div>
                            <div class="disclaimer-copy">**Honda MALAYSIA PIC will call & ask for copy of your ID card or passport and the vehicle's grant / registration card.</div>
                        </div>

                        <div class="more">Can I lodge a complaint on a vehicle issue if I'm a non-owner?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                Yes, you may but Honda Malaysia Sdn Bhd will only proceed with the investigation once the Owner has given his / her consent via authorisation letter as per Personal Data Protection Act 2010 (PDPA).
                            </div>
                        </div>

                        <div class="more">Where is your main showroom or branch that I can view all of the models?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                Honda Malaysia has 100+ dealers nationwide, please contact your nearest dealer to find out the availability of your desired Honda model(s).
                            </div>
                        </div>

                        <div class="more">Who should I contact regarding the tyre warranty on my Honda vehicle?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                Please contact your tyre's manufacturer directly as the tyres that come as original equipment on your vehicle are warranted by the manufacturer.
                            </div>
                        </div>

                        <div class="more">Which fuel is recommended by Honda Malaysia Sdn Bhd - RON95 or RON97?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                Both RON95 and RON97 are compatible for all Honda models except for Civic Type R, which we recommend RON97.
                            </div>
                        </div>

                        <div class="more">Can I refuel from a different brand of petrol or do I have to stick to the same brand of petrol? </div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                You may select any fuel brands of your choice.
                            </div>
                        </div>


                    </div>
                </div>
                <!-- faq details end -->
                <!-- faq details start -->
                <div id="faq-specialsales" class="faq-details">
                    <h2>SPECIAL SALES</h2>
                    <div class="collapse-container">

                        <div class="more">What is Fleet Sales?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                <ul class="disc roman">
                                    <li>Fleet Sales refers to a purchase made by a Company (Bhd, Sdn Bhd or Enterprise), Government (Ministry, Government Department / Agency or Statutory Body) or Association</li>
                                    <li>The vehicle(s) must be registered under respective Company, Government (Ministry, Government Department / Agency or Statutory Body) or Association only</li>
                                    <li>Honda Malaysia reserves the right to review the above criteria without prior notice</li>
                                    <li>Please visit our Honda Authorised Dealers for more information on Fleet Sales programme</li>
                                </ul>
                            </div>
                        </div>

                        <div class="more">What are the documents required for purchase of vehicle under the Fleet Sales Programme?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                <ul class="disc roman">
                                    <li>Valid documentation such as Form 9,24 and 49 or Purchase Order or “Pesanan Kerajaan” for Government or relevant document which certified the above criteria</li>
                                    <li>The documents required for a purchase from the Ministry or Government Agency or related Government Body that entitled for tax exemption as stated under item No. 9 (under item Government Purchase).</li>
                                </ul>
                            </div>
                        </div>

                        <div class="more">What is PAKAR Sales?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                <ul class="disc roman">
                                    <li>PAKAR Sales is an incentive programme to encourage Malaysian Citizens with expertise residing overseas to return to Malaysia</li>
                                    <li>Applicants may purchase one (1) or maximum of two (2) new vehicle(s) made or assembled in Malaysia</li>
                                    <li>He / She will be exempted from paying Excise Duty and GST or Excise Duty only on new vehicle(s)</li>
                                </ul>
                            </div>
                        </div>

                        <div class="more">What are the documents required for PAKAR Sales?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                <ul class="disc roman" style="list-style: lower-roman;">
                                    <li>Approval letter from Ministry of Human Resource (Talent Corp) - 1st stage.</li>
                                    <li>'Surat Akuan Tarikh Kembali' from Ministry of Human Resource (Talent Corp).</li>
                                    <li>Copy of applicant’s / spouse's identification card.</li>
                                    <li>Vehicle purchase order / booking form.</li>
                                    <li>Certificate of Marriage if the vehicle is to be registered under spouse's name.</li>
                                    <li>Approval letter from Ministry of Finance upon obtaining the chassis and engine number from Honda Malaysia Sdn Bhd.</li>
                                </ul>
                            </div>
                        </div>

                        <div class="more">What is Embassy Sales?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                <ul class="disc roman">
                                    <li>Embassy Sales is applicable to Diplomatic Missions and Consular posts to purchase locally assembled vehicle (CKD) or imported vehicle (CBU) which is exempted from Import Duty, Excise Duty, Registration Fees, Transfer and Licensing Fees</li>
                                    <li>Excise Duty and Sales Tax must be paid if the vehicle is transferred to a person other than another diplomatic or consular officer</li>
                                </ul>
                            </div>
                        </div>

                        <div class="more">What are the documents required for Embassy Sales?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy" style="list-style: lower-roman;">
                                The following documents must be made available:
                                <ul class="disc roman">
                                    <li>Offer letter from Ministry of Foreign Affairs- 1st Stage.</li>
                                    <li>Copy of customer's passport.</li>
                                    <li>Booking form.</li>
                                    <li>Approval letter from Ministry of Foreign Affairs with chassis and engine no. - 2nd stage. </li>
                                    <li>Certification for Exemption from Payment of Customs Duties and Taxes.</li>
                                    <li>Certificate of Remission (for registration purposes).</li>
                                    <li>Third Schedule Form.</li>
                                </ul>
                            </div>
                        </div>

                        <div class="more">What is Government Sales?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                <p style="text-decoration: underline;">Federal & State</p>
                                <ul class="disc roman">
                                    <li>Government Sales is made available to Government bodies to purchase new locally assembled vehicle (CKD) or imported vehicle (CBU) which is exempted from Excise Duty & GST</li>
                                    <li>However, to purchase imported vehicle (CBU), government bodies must obtain approval from 'Bahagian Perolehan Kerajaan', Ministry of Finance</li>

                                </ul>
                                <br>
                                <p style="text-decoration: underline;">Local Authorities</p>
                                <ul class="disc roman">
                                    <li>Government Sales under Local Authorities are only entitled to purchase Honda 4WD models new locally assembled vehicle (CKD) which is exempted from Excise duty not GST</li>
                                    <li>The application of exemption on the excise duty letter under this programme must highlight the use of the vehicle is for Local Authorities enforcement</li>
                                </ul>
                            </div>
                        </div>

                        <div class="more">What are the documents required for Government Sales?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            The following documents must be made available:
                                <ul class="disc roman" style="list-style: lower-roman;">
                                    <li>Purchase order or 'Pesanan Kerajaan'.</li>
                                    <li>Letter from customer to Malaysian Royal Custom - Melaka Station (must be in letterhead).</li>
                                    <li>Certificate of exemption</li>
                                    <li>Booking form.</li>
                                    <li>Letter of sample signature - Authorised letter. </li>
                                    <li>Copy of identification card (Person in Charge).</li>
                                    <li>Sales letter.</li>
                                    <li>Third Schedule Form (Federal & State).</li>
                                </ul>
                            </div>
                        </div>

                        <div class="more">What is Parliament Sales?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                <ul class="disc roman">
                                    <li>All Malaysian Parliament Members and ADUN who are NOT Administrative Member may purchase one new motorcar made or assembled in Malaysia for Honda CR-V 2.0L i-VTEC only. He / She will be exempted from paying Excise Duty but NOT GST</li>
                                    <li>Each Parliament member will get this exemption once every 5 years</li>
                                </ul>
                            </div>
                        </div>

                        <div class="more">What are the documents required for Parliament Sales?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                <ul class="disc roman" style="list-style: lower-roman;">
                                    <li>Copy of Verification Letter from Parliament or Dewan Undangan Negeri (DUN).</li>
                                    <li>Copy Of ’Kad Ahli Parlimen’ & Identification Card.</li>
                                    <li>Customer Booking Form.</li>
                                    <li>Copy of Second approval letter from MINISTRY OF FINANCE upon obtaining the Chassis and Engine No. from Honda MALAYSIA.</li>
                                </ul>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- faq details end -->
                <!-- faq details start -->
                <div id="faq-sales" class="faq-details">
                    <h2>SALES</h2>
                    <div class="collapse-container">

                        <div class="more">How much do I need to pay for the booking fee?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            The booking fee should not exceed one percent (1%) of the vehicle's 'On The Road' (OTR) price for each model as stated under the 'Hire Purchase Act' agreement. Please refer to the nearest <a href="{{url('dealers')}}" target="_blank">Honda Authorised Dealer</a> for standard booking fees by model and variant.
                            </div>
                        </div>

                        <div class="more">How much do I need to pay for the down payment?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            The down payment amount depends on amount of loan approved from the panel bank. Please refer to your Sales Advisor on the calculation of your down payment.
                            <br><br><a href="{{url('dealers')}}" target="_blank">Our Dealers</a>
                            </div>
                        </div>

                        <div class="more">Will I get a refund if I decide to cancel the booking?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            Booking cancellation and refund are subjected to Honda Malaysia Sdn Bhd’s refund guideline. Please refer to the nearest Honda Authorised Dealer for detailed information. The dealer shall refund the booking fee as stated in the booking form which you have signed.
                            </div>
                        </div>

                        <div class="more">What is the interest rate offered for the loan?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            The interest rate varies and is subjected to the Terms and Conditions from respective panel banks. Please refer to the nearest <a href="{{url('dealers')}}" target="_blank">Honda Authorised Dealer</a> for detailed information.
                            </div>
                        </div>

                        <div class="more">Will I be able to get the vehicle within the same month the booking was made?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            The lead time for delivery varies from one model to another. Your Sales Advisor will be able to advise on stock availability for your preferred model and confirm the estimated delivery date.
                            <br><br><a href="{{url('dealers')}}" target="_blank">Our Dealers</a>
                            </div>
                        </div>

                        <div class="more">How long is the waiting period after the order has been placed?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            The lead time for delivery varies from one model to another. Your Sales Advisor will be able to advise on stock availability for your preferred model and confirm the estimated delivery date.
                            <br><br><a href="{{url('dealers')}}" target="_blank">Our Dealers</a>
                            </div>
                        </div>

                        <div class="more">Do you have all models shown on your website available at any of the showrooms for viewing? </div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            The availability of models for viewing and test drive may vary from one dealer to another. Please contact the nearest <a href="{{url('dealers')}}" target="_blank">Honda Authorised Dealer</a> to enquire on the availability of your preferred model.
                            </div>
                        </div>

                        <div class="more">Does Honda Malaysia Sdn Bhd provide trade-in services?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            Honda Malaysia Sdn Bhd does not offer any trade-in services. However, for your convenience, our <a href="{{url('dealers')}}" target="_blank">Honda Authorised Dealers</a> may be able to assist you on this matter.
                            </div>
                        </div>


                    </div>
                </div>
                <!-- faq details end -->
                <!-- faq details start -->
                <div id="faq-servicemaintenance" class="faq-details">
                    <h2>SERVICE MAINTENANCE</h2>
                    <div class="collapse-container">

                        <div class="more">What is the service interval for a Honda vehicle?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                Service intervals will be as per the 'Preventive Maintenance Service Schedule' (PMSS) which is stipulated in your Owner's Manual. Please refer to your <a href="{{url('dealers')}}" target="_blank">preferred dealer</a> for further information.
                            </div>
                        </div>

                        <div class="more">Can I send my vehicle for service / repair at different dealers?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                You may service / repair your vehicle at any <a href="{{url('dealers')}}" target="_blank">Honda Authorised Dealers.</a>
                            </div>
                        </div>

                        <div class="more">Can I claim my Free Service if I fail to service my vehicle on time?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            The Free Service Promotion is only applicable to vehicles that adhere to the 'Preventive Maintenance Service Schedule' (PMSS).
                            </div>
                        </div>

                        <div class="more">Do I have any options of choosing the engine oil for service?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                It is advisable to use Honda Genuine Engine Oils as recommended by your dealer.
                            </div>
                        </div>

                        <div class="more">Will it affect my vehicle's engine if I switch from Fully Synthetic Oil to Mineral Oil or vice versa?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            There will be no adverse effect to your vehicle's engine, however we would recommend you to use Fully Synthetic Oil for better performance.
                            </div>
                        </div>

                        <div class="more">What are the benefits of using Fully Synthetic Oil?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                <ul class="disc roman" style="list-style: lower-roman;">
                                    <li>Possess good anti-wear properties to ensure reduced engine sludge</li>
                                    <li>Speedy acceleration response</li>
                                    <li>Maximum engine performance</li>
                                    <li>Reduces friction effectively and promotes better fuel-efficiency </li>
                                </ul>
                                <br><a href="https://legacy.honda.com.my/service_maintenance/genuine_parts" target="_blank">Genuinie Engine Oil</a>
                            </div>
                        </div>

                        <div class="more">Where can I obtain the price of the engine oils?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                Please refer to <a href="{{url('dealers')}}" target="_blank">Honda Authorised Dealers</a> for the prices of engine oils.
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
                            Our authorised dealers will be able to explain the requirements for each service interval.
                            <br><br> <a href="{{url('dealers')}}" target="_blank">Our Dealers</a> | <a href="{{url('aftersales/maintenance')}}" target="_blank">Maintenance</a>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- faq details end -->
                <!-- faq details start -->
                <div id="faq-serviceappointment" class="faq-details">
                    <h2>SERVICE APPOINTMENT</h2>
                    <div class="collapse-container">

                        <div class="more">What is the "Appointment System"?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            It is a reserved time for you to meet up with the Service Advisor to discuss your vehicle service requirements.
                            </div>
                        </div>

                        <div class="more">How do I make an Appointment?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                Just call your preferred <a href="{{url('dealers')}}" target="_blank">Honda Authorised Dealer</a> and make a reservation for your preferred date and time.

                            </div>
                        </div>

                        <div class="more">Does this mean that my car will be immediately sent in for service / repair?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            The appointment time allocated is for you to meet the Service Advisor only. This will reduce your waiting time to be attended to.
                            </div>
                        </div>

                        <div class="more">When should I make the appointment?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                <ul class="disc roman">
                                    <li>Weekdays: at least one (1) week in advance</li>
                                    <li>Weekends: please refer to your preferred dealers as it is subject to availability</li>
                                    <li>Festive season: at least two (2) weeks in advance </li>
                                </ul>
                                This is to avoid non-availability or long waiting time.
                            </div>
                        </div>

                        <div class="more">What happens if I am late?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                <ul class="disc roman">
                                    <li>Any later than fifteen (15) mins, you will be considered a walk-in customer</li>
                                    <li>Please be punctual to ensure no disruptions to the appointment time allocated for other customers</li>
                                </ul>
                            </div>
                        </div>

                        <div class="more">What if I can't make it to the Appointment?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            The dealers will assist you to reschedule the appointment to another date and time.
                            </div>
                        </div>

                        <div class="more">Can I walk in without an appointment?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            You may walk in to the dealers and will be attended to on a 'First Come, First Serve' basis. However, this is not recommended.
                            </div>
                        </div>


                    </div>
                </div>
                <!-- faq details end -->
                <!-- faq details start -->
                <div id="faq-technicaladvice" class="faq-details">
                    <h2>TECHNICAL ADVICE</h2>
                    <div class="collapse-container">

                        <div class="more">When my vehicle's alarm triggers, what do I need to do to deactivate the alarm?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                Please refer to the nearest <a href="{{url('dealers')}}" target="_blank">Honda Authorised Dealer</a> who will be able to assist you accordingly. Different models have different alarm deactivation methods.
                            </div>
                        </div>

                        <div class="more">I need the radio code for the radio to function. Where do I find it?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            Please bring your vehicle to the nearest <a href="{{url('dealers')}}" target="_blank">Honda Authorised Dealer</a> and they would be able to provide you the radio code.
                            </div>
                        </div>

                        <div class="more">I have lost my vehicle's key. Where can I get the replacement key?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            Please refer to the nearest <a href="{{url('dealers')}}" target="_blank">Honda Authorised Dealer.</a>
                            </div>
                        </div>

                        <div class="more">Why can't the dealer just replace the brake disc instead of skimming?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            It is Honda's standard procedure that the brake disc will have to undergo skimming (depending on the thickness of the brake disc) first before replacement. We assure you that brake discs will only be skimmed within its specification and will not affect the safety of your vehicle.
                            </div>
                        </div>

                    </div>
                </div>
                <!-- faq details end -->
                <!-- faq details start -->
                <div id="faq-hip" class="faq-details">
                    <h2>Honda INSURANCE PLUS</h2>
                    <div class="collapse-container">

                        <div class="more">My vehicle is involved in an accident, what should I do?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                <ul class="disc roman" style="list-style: lower-roman;">
                                    <li>Stay calm and contact Honda Insurance Plus (HIP 24 Hours Call Centre 1-800-18-1177) to have your vehicle towed to the nearest Honda Authorised Body and Paint Panel.</li>
                                    <li>Take note of the person's details involved in the accident such as vehicle registration number, name, ID or passport number and driving license number.</li>
                                    <li>Finally, lodge a report at the nearest police station within 24 hours.</li>
                                </ul>
                            </div>
                        </div>

                        <div class="more">My vehicle can't start and all the indicator lights are on, what should I do?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            Please contact Honda Insurance Plus (HIP 24 Hours Call Centre 1-800-18-1177) to have your vehicle towed to the nearest Honda Authorised Dealer.
                            </div>
                        </div>

                        <div class="more">My vehicle is overheating and smoke is emitting from the engine. What should I do?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                <ul class="disc roman" style="list-style: lower-roman;">
                                    <li>Stay calm and safely pull over your vehicle to the side of the road.</li>
                                    <li>Turn transmission to "P" mode and set the parking brake.</li>
                                    <li>Turn off the engine and switch on the hazard lights.</li>
                                    <li>iv.	Contact Honda Insurance Plus (HIP 24 Hours Call Centre 1-800-18-1177) to have your vehicle towed to the nearest Honda Authorised Dealer.</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- faq details end -->
                <!-- faq details start -->
                <div id="faq-accessories" class="faq-details">
                    <h2>ACCESSORIES</h2>
                    <div class="collapse-container">

                        <div class="more">Does a new Honda car come with accessories?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                Besides the basic design and styling of each model, Honda offers Genuine Accessories for your customisation. We offer Modulo and Mugen packages at special prices and these items are also available individually.
                            </div>
                            <div class="disclaimer-copy">*Please refer to our website for our accessories line up. The items may vary from one model to another.</div>
                        </div>

                        <div class="more">What is the accessories line-up offered by Honda Malaysia?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                Additional to Modulo and Mugen packages, we are collaborating with our trusted partners to offer Honda Authorised Accessories which include:
                                <ul class="disc roman">
                                    <li>DVD Multimedia Navigation System</li>
                                    <li>Window Tint Film</li>
                                    <li>Stolen Vehicle Recovery</li>
                                </ul>
                            </div>
                            <div class="disclaimer-copy">*Please refer to our website for our accessories line-up. The items may vary from one model to another.</div>
                        </div>

                        <div class="more">How do I find out more about the products?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                For more information on Honda Genuine/ Authorised Accessories products, prices and current promotions, you may visit our website or contact our <a href="{{url('dealers')}}" target="_blank">Honda Authorised Dealer</a> directly.
                            </div>
                        </div>

                        <div class="more">What is the benefit of installing Honda Genuine / Authorised Accessories?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                             Customers can expect high quality products which have been acknowledged by Honda Malaysia and installation is done by trained professionals. These products come with warranty and after-sales support from Honda Dealers nationwide.
                            </div>
                        </div>

                        <div class="more">Can I install accessories other from what is being offered by Honda?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            Honda Genuine / Authorised Accessories come with warranty for the product and vehicle. Vehicle warranty may be voided if customers proceed to install other non-genuine / non-authorised products.
                            </div>
                        </div>

                        <div class="more">How do I purchase Genuine / Authorised accessories?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            If you would like to purchase the accessories together with a new car purchase, you can make your bookings with the same <a href="{{url('dealers')}}" target="_blank">Honda Authorised Dealer</a>. For existing car owners, you may contact our nearest <a href="{{url('dealers')}}" target="_blank">Honda Authorised Dealer</a> as listed in our websites for accessories booking and installation.
                            </div>
                        </div>

                        <div class="more">Can the accessories payment be factored together with car loans?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            Yes, you can include the accessories payment together with the car loan where you can pay monthly installation instead of a one-time payment.
                            </div>
                        </div>

                        <div class="more">How do I find out on stock availability?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            For stock availability, please contact the nearest <a href="{{url('dealers')}}" target="_blank">Honda Authorised Dealers.</a>
                            </div>
                        </div>

                        <div class="more">What is the window tint product offered under Honda MALAYSIA?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            Honda Malaysia offers quality products under Honda Authorised Window Tint Film (HAWTF) which are:
                                <ul class="disc roman" style="list-style: lower-roman;">
                                    <li>Horizon Safety.</li>
                                    <li>Horizon Safety +.</li>
                                    <li>Horizon Security Premium +.</li>
                                    <li>Ray Barrier 4 +.</li>
                                    <li>Ray Barrier 6 +.</li>
                                    <li>Ray Barrier 4 Black Pearl.</li>
                                    <li>Ray Barrier 6 Black Pearl.</li>
                                </ul>
                                Prices range from RM1500-RM2800 (including GST). For installation, customers must go through a Honda Authorised Dealer. For product info, please refer to our website.
                            </div>
                        </div>

                        <div class="more">What is the benefit of Honda Authorised Window Tint Film (HAWTF)?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            Honda Authorised Tint Film has been tested, and it is in compliance with JPJ regulation. It does not have any signal interference for GPS, Smart Tag, remote access and devices using infrared.
                            </div>
                        </div>

                        <div class="more">Can the warranty for HAWTF be transferred to the next owner?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            Yes, the warranty can be transferred to the new car owner if the car purchased is within the 5-year warranty period.
                            </div>
                        </div>


                    </div>
                </div>
                <!-- faq details end -->
                <!-- faq details start -->
                <div id="faq-hondaparts" class="faq-details">
                    <h2>Honda PARTS</h2>
                    <div class="collapse-container">

                        <div class="more">Why are Honda Genuine Parts usually higher-priced than non-genuine ones?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            Every genuine part is a product of continuous research and development to ensure utmost reliability for your Honda. Unlike non-genuine, genuine parts come with better quality and warranty from Honda Malaysia Sdn Bhd. Every genuine part offers the best value for your car.
                            </div>
                        </div>

                        <div class="more">What is the advantage of using Honda Genuine Parts?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            You will enjoy 100% quality and performance with the same parts used to manufacture your vehicle.
                            </div>
                        </div>

                        <div class="more">Do Honda Genuine Parts come with warranty?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            All parts purchased at Authorised Honda Dealer come with a 6-month / 10,000km warranty and 12-month / 20,000km warranty for batteries (whichever comes first). However, warranty is not applicable to consumption parts.
                            </div>
                        </div>

                        <div class="more">Is there a way to tell if the part is genuine or non-genuine?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            Some non-genuine parts are made and imitated exactly as per genuine parts which is hard to tell with the naked eye. The best way to avoid purchasing non-genuine parts is to get them and have them installed at <a href="{{url('dealers')}}" target="_blank">Honda Authorised Dealer</a> itself.
                            </div>
                        </div>

                        <div class="more">How will I know if a particular spare part needs changing?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            Your Service Advisor will be able to inform you beforehand if a part needs to be replaced. You may also refer to your Honda's Service Booklet Schedule or consult our friendly Service Advisors for more details.
                            </div>
                        </div>

                        <div class="more">Can I buy a specific spare part and install it myself?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            It is recommended to have parts installed by a trained and qualified Honda Technician. After all, these parts come with a warranty, so installing it yourself may void the manufacturer's warranty.
                            </div>
                        </div>

                        <div class="more">Where can I purchase Honda Genuine Parts?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                Honda Genuine Parts can be purchased from <a href="{{url('dealers')}}" target="_blank">Honda Authorised Dealers.</a>
                            </div>
                        </div>

                        <div class="more">Can I purchase the spare parts directly from Honda Malaysia Sdn Bhd?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                Honda Genuine Parts can only be purchased from <a href="{{url('dealers')}}" target="_blank">Honda Authorised Dealers.</a>
                            </div>
                        </div>

                        <div class="more">Can I purchase the spare parts from an outside distributor?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                Honda Genuine Parts can only be purchased from <a href="{{url('dealers')}}" target="_blank">Honda Authorised Dealers.</a>
                            </div>
                        </div>

                        <div class="more">I'm driving an old Honda model. Does Honda Authorised Dealer carry parts for older models?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                Honda Authorised Dealer may have parts for your old Honda model. Just consult our friendly Service Advisors for assistance.
                                <br><br><a href="{{url('dealers')}}" target="_blank">Our Dealers</a>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- faq details end -->
                <!-- faq details start -->
                <div id="faq-warranty" class="faq-details">
                    <h2>WARRANTY</h2>
                    <div class="collapse-container">

                        <div class="more">What is the warranty period for Honda vehicles?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            Warranty period for your vehicle is stipulated in your Warranty and Service Booklet.<br>
                            Important notice: Warranty will only be applicable if regular preventive maintenance is performed as per required intervals by any Honda Authorised Dealer.
                            </div>
                        </div>

                        <div class="more">What are the items covered under warranty?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            For detailed Terms and Conditions, please refer to your Warranty and Service Booklet.
                            <br>Important notice: Warranty will only be applicable if regular preventive maintenance is performed as per required intervals by any Honda Authorised Dealer.
                            </div>
                        </div>

                        <div class="more">What is the warranty coverage for the 12V battery?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            For detailed Terms and Conditions, please refer to your Warranty and Service Booklet.
                            <br>Important notice: Warranty will only be applicable if regular preventive maintenance is performed as per required intervals by any Honda Authorised Dealer.
                            </div>
                        </div>

                        <div class="more">What is the warranty coverage for the IMA battery?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            For detailed Terms and Conditions, please refer to your Warranty and Service Booklet.
                            <br>Important notice: Warranty will only be applicable if regular preventive maintenance is performed as per required intervals by any Honda Authorised Dealer.
                            </div>
                        </div>

                        <div class="more">What is the warranty period for the replacement Spare Parts on my vehicle?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                <ul class="disc roman">
                                    <li>Parts - warranty period of 6 months / 10,000km whichever comes first.</li>
                                    <li>Batteries - warranty period of 12 months / 20,000km whichever comes first.</li>
                                </ul>
                                However, warranty is not applicable to consumption parts.
                            </div>
                        </div>

                        <div class="more">Will my warranty be void if I service my vehicle at a non-authorised dealer?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            Honda's warranty is only applicable when service maintenance and repairs are carried out by Honda Authorised Dealers as per the required intervals.
                            </div>
                        </div>

                        <div class="more">Do I have to send my vehicle for repairs under warranty at the dealership where it was originally purchased?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                Warranty repairs can be performed at any Honda Authorised Dealers.
                            </div>
                        </div>

                        <div class="more">Can I modify my vehicle without affecting its warranty coverage?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                Modification is not recommended as it may affect the performance of the vehicle and probably lead to safety issues. In addition, unauthorised modification on your vehicle may result in the warranty of your vehicle to be void.
                            </div>
                        </div>

                        <div class="more">Is the warranty coverage transferable between owners?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                Warranty coverage is transferable between owners and subjected to the following conditions:
                                <ul class="disc roman" style="list-style: lower-roman;">
                                    <li>The vehicle is still under warranty at the time of the sale.</li>
                                    <li>Regular service intervals are performed at any Honda Authorised Dealers.</li>
                                </ul>
                            </div>
                        </div>

                        <div class="more">I have lost my Warranty and Service Booklet manual. Where can I get a new one?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                You may request for a replacement through a <a href="{{url('dealers')}}" target="_blank">Honda Authorised Dealer</a> at a small fee.
                            </div>
                        </div>


                    </div>
                </div>
                <!-- faq details end -->
                <!-- faq details start -->
                <div id="faq-hybrid" class="faq-details">
                    <h2>HYBRID VEHICLE</h2>
                    <div class="collapse-container">

                        <div class="more">What is a Hybrid vehicle?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                Hybrid vehicle is a vehicle that is powered by an engine and assisted by an electric motor.
                            </div>
                        </div>

                        <div class="more">How does the Honda Hybrid work?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                The i-VTEC engine together with the Intelligent Dual Clutch Drive (i-DCD) or Intelligent Multi Mode Drive (i-MMD) give maximum power with minimum fuel consumption. It switches to EV mode in certain driving patterns and conditions.
                                <br><br><a href="{{url('technology/honda-sport-hybrid')}}" target="_blank">Honda Hybrid Technology</a>
                            </div>
                        </div>

                        <div class="more">What are the benefits of Honda Hybrid?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                It enables the vehicle to achieve better fuel efficiency and enhanced performance.
                            </div>
                        </div>

                        <div class="more">Where do I find a power plug or station to charge the electric motor?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                It doesn’t require a power plug or station. The Hybrid battery that powers the Electric Motor recharges itself whenever you brake during your drives. 
                            </div>
                        </div>

                        <div class="more">Which Hybrid models are entitled for the 8 years warranty extension?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            Civic Hybrid*, HR-V Hybrid, City/Jazz Hybrid, Insight and CR-Z models sold between January 2011 onwards are entitled for the extended Hybrid battery warranty of 8 years with unlimited mileage from the date of vehicle registration.
                            </div>
                            <div class="disclaimer-copy">*Selected models only.</div>
                        </div>

                        <div class="more">Is it expensive to maintain a Honda Hybrid?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            Maintaining a Honda Hybrid is no different from a regular petrol vehicle. 
                            </div>
                        </div>

                        <div class="more">Is there any additional maintenance procedure for a Honda Hybrid? Does it take a longer time to service?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            A Honda Hybrid requires the same maintenance procedure and time to service just like any other petrol vehicle.
                            </div>
                        </div>

                        <div class="more">Do I have to travel to a specialised service centre to service my Honda Hybrid?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            You may service your Honda Hybrid at any preferred <a href="{{url('dealers')}}" target="_blank">Honda Authorised Dealer</a>, nationwide.
                            </div>
                        </div>


                    </div>
                </div>
                <!-- faq details end -->
                <!-- faq details start -->
                <div id="faq-ima" class="faq-details">
                    <h2>HYBRID BATTERY</h2>
                    <div class="collapse-container">

                        <div class="more">Why did Honda Malaysia extend the Hybrid battery warranty?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            This extended warranty of up to 8 years with unlimited mileage is a testament of Honda’s confidence in our Hybrid battery and also to give assurance of the quality of our products to the customers.
                            </div>
                        </div>

                        <div class="more">May I know how long will the Hybrid battery last?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            The normal lifespan of a Hybrid Battery is 7 to 8 years. However, please take note that improper usage of the Hybrid Battery may shorten the life span of the battery.
                            </div>
                        </div>

                        <div class="more">How much does the Hybrid battery replacement cost?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                <ul class="disc roman">
                                    <li>There is a price reduction for Hybrid batteries from 43% to 52% depending on the type of Hybrid battery as it varies from one model to another</li>
                                    <li>As such, please refer to your <a href="{{url('dealers')}}" target="_blank">preferred dealer</a> to check the Hybrid battery type of your model whether the said battery falls under the discounted price entitlement.</li>
                                </ul>
                            </div>
                        </div>

                        <div class="more">Will my Hybrid battery warranty be void if I skip my vehicle’s service maintenance?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                <ul class="disc roman">
                                    <li>Hybrid battery warranty extension will only be applicable if regular preventive maintenance is performed as per required interval by any Honda Authorised Dealers during the warranty period</li>
                                    <li>As such, please ensure that you strictly adhere to the ‘Preventive Maintenance Service Schedule’ (PMSS) as stipulated in your ‘Warranty & Service Booklet’ to prevent unnecessary inconvenience in future</li>
                                </ul>
                            </div>
                        </div>

                        <div class="more">Do I still need to service at Honda Authorised Dealer in order to be entitled for the 8-year Hybrid battery warranty if my vehicle’s warranty period has ended?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                                <ul class="disc roman">
                                    <li>Hybrid battery warranty extension will only be applicable if regular preventive maintenance is performed as per required interval by any of Honda Authorised Dealers during the warranty period</li>
                                    <li>As such, please ensure that you strictly adhere to the ‘Preventive Maintenance Service Schedule’ (PMSS) as stipulated in your ‘Warranty & Service Booklet’ to prevent unnecessary inconvenience in the future</li>
                                </ul>
                            </div>
                        </div>

                        <div class="more">How to manually charge the Hybrid battery?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            When the vehicle is stored for an extended period, the expected life cycle of the Hybrid Battery may be affected. To reduce this possibility, the no-load charging procedure should be conducted at least once every 12 months of vehicle storage. The no-load charging should be conducted under the following conditions:<br><br>
                                <ul class="disc roman" style="list-style: lower-roman;">
                                    <li>Turn the engine off and lock the car (doors).<br><span class="disclaimer-copy">NOTE: Perform the following procedure within 60 seconds to start the engine in the maintenance mode.</span></li>
                                    <li>Turn on the car (PUSH START BUTTON) without stepping on the brake pedal.</li>
                                    <li>With the shift lever in P position/mode, press the accelerator pedal to the floor twice, then release it.</li>
                                    <li>Press the brake pedal and move the shift lever to N position/mode, then press the accelerator pedal to the floor twice, then release it.</li>
                                    <li>Press the brake pedal and move the shift lever to P position/mode, then press the accelerator pedal to the floor twice, then release it.</li>
                                    <li>Press the engine start/stop button while pressing down on the brake pedal. The vehicle is now in the maintenance mode and the engine will start.</li>
                                </ul>
                            </div>
                            <div class="disclaimer-copy">NOTE : <br>
                            - “Maintenance Mode” is displayed in the Multi-Information Display.<br>
                            -  To turn the engine OFF and cancel the maintenance mode, turn the vehicle to the OFF (LOCK) mode.</div>
                        </div>

                        <div class="more">Can I refuel from a different brand of petrol or do I have to stick to the same brand of petrol?</div>
                        <div class="expand-content" style="display: none;">
                            <div class="content-copy">
                            You may select any fuel brands of your choice.
                            </div>
                        </div>


                    </div>
                </div>
                <!-- faq details end -->
            </div>
        </div>

    </section>

    <section>
            <div class="contact-us-footer">
                <div class="contact-us-footer-row">
                    <div class="contact-us-footer-col">
                        <div class="details-content">
                            <img src="{{url('img/contact_us/cust_service/phone.png')}}">
                            <div class="contact-footer-copy">Call Us At</div>
                            <h2 class="left red-font">1800 88 2020</h2>
                            <div>Monday to Friday: 9am - 5pm<br>(Closed during weekends and public holidays)</div>
                        </div>
                    </div>
                    <div class="contact-us-footer-col">
                        <div class="details-content">
                            <img src="{{url('img/contact_us/cust_service/hip-icon.png')}}">
                            <div class="contact-footer-copy">24/7 HiP Emergency Assistance</div>
                            <h2 class="left red-font">1800 88 1177</h2>
                            <div>Contact 24/7 HiP Emergency Assistance for your vehicle breakdown and accident assistance services.</div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    {{-- MUST INCLUDE THIS FOR EVERY PAGE THAT UTILISE GLOBAL FORM ELEMENT --}}
    @include('form.script-style')

</div>

<style>
            .faq-maincontainer {max-width:1000px;margin:auto;}
            .search-bar-column {width:100%;padding-bottom: 30px; padding-top:15px;}
            .search-bar-column input {overflow: visible;background: url(/img/press_release/icon/search.png) no-repeat 9px;background-color: white;height: 55px;width:50%;border: solid 1px #cecece;padding: 0 10px 0 39px;}
            .center {text-align: center;}
            .left {text-align: left;}

            .faq-btn-col {float: left;width: 25%;padding: 10px;}
            .faq-btn-row:after { content: "";display: table;clear: both;}
            .faq-btn {padding: 20px; padding-right:30px; background-color: #fff; cursor: pointer; box-sizing: border-box; display: inline-flex; align-content: center; width:100%;}
            /* .faq-btn img {position: absolute;right: 15px;} */
            .faq-btn::after {content: url(img/interface/arrow-short-right-red.svg);position: absolute;right: 15px; top:calc(50% + 3px); transform:translateY(-50%);}
            .faq-btn span {display:block; top:50%; transform:translateY(-50%); height:fit-content;}

            .faq-details {margin-bottom:40px;}
            .faq-details-container {max-width: 780px;margin: auto;}
            .disclaimer-copy {font-style: italic; font-size: 12px;}

            .numcontainer{position: absolute;}
            .tcontainer{margin-left: 35px;}

            .desktop{display: block;}

            /* overwrite landing style */
            .content-inner {margin-top: 70px;background-color: unset;}
            .content-inner .expand-content {background: unset;margin-bottom: 10px;}
            .model-inner-container .intro .intro-title {max-width: 775px;}

            /* contact-us-footer */
            .contact-us-footer-col {float: left;width: 50%;padding: 50px;height: 270px;}
            .contact-us-footer-row:after { content: "";display: table;clear: both;}
            .details-content {margin: auto;width: 75%;}
            .red-font {color:#E01327;}
            .contact-footer-copy {padding: 20px 0px 10px;}

            .faq-details {display: none;}
            .faq-details.active {display: block;}
            ul.roman, ul.roman li {margin-left: 15px;margin-top: 5px;list-style: unset;}
            .expand-content {margin-left: 30px;}
            .content-inner .expand-content .content-copy {padding: 0px 20px 28px;color: #5e6063;}
            .faq-details a {text-decoration: underline; color: #00009a;}

            .search-status {font-size:.75em; margin-top:1em; color:red; display:none;}

            .desktop {display: block;}
            .mobile {display: none;}

            @media only screen and (max-width: 640px) {
                .desktop{display: none;}
                .mobile {display: block;}
                .faq-btn-col {width: 50%;}
                .faq-btn-- {height: 65px; height:unset;}

                .model-inner-container .intro .intro-title {padding:20px;}

               /* contact-us-footer */
                .contact-us-footer-col {width: 100%;}
                .details-content {width: unset;}
            }
</style>

<script>
    $(document).ready(function(){
        // TO APPEND NUMBER TO THE FAQ QUESTION AUTOMATICALLY - in case we need to shuffle questions, then no need to manually number it again
        var faqrunning=0;
        $('.collapse-container .more').each(function(){
            faqrunning++;
            $(this).html('<div class="numcontainer">'+faqrunning+'.</div><div class="tcontainer"> '+$(this).html()+'</div>')
        })

        // hide show faq details
        $('.faq-btn').on('click', function () {
            var faqdetailsID = $(this).attr('data-box');
            $(this).addClass('active').siblings().removeClass('active');
            $('#' + faqdetailsID).addClass('active').siblings().removeClass('active');
        })
        // hide show faq details - MOBILE
        

        // FAQ button autoheight
        var thebuttonheightthatneedcalculationlah;
        function recalculateFAQbuttons(){
            thebuttonheightthatneedcalculationlah=0;
            $('.faq-btn').each(function(){
                if($(this).innerHeight() > thebuttonheightthatneedcalculationlah){
                    thebuttonheightthatneedcalculationlah = $(this).innerHeight();
                }
            })
            $('.faq-btn').css('height', thebuttonheightthatneedcalculationlah);
        }
        $(window).resize(recalculateFAQbuttons);
        $(window).trigger('resize');

        // FAQ SEARCH

        $('.faq-search').on('change keyup', function(){
            var keyword = $(this).val().toLowerCase();
            $('.search-status').hide();
            if(keyword.length>2){
                var totalfound = 0;
                var sectionfound

                $('.faq-details').each(function(){
                    sectionfound = 0;
                    $(this).find('.content-copy').each(function(){
                        if($(this).html().toLowerCase().search(keyword)>-1){
                            //$(this).parent().show();
                            $(this).parent().prev('.more').show();
                            totalfound++;
                            sectionfound++;
                        } else {
                            $(this).parent().hide();
                            $(this).parent().prev('.more').hide();
                        }
                    });

                    if(sectionfound==0){
                        $(this).removeClass('active');
                    } else {
                        $(this).addClass('active');
                    }
                })
                $('.faq-btn-container').hide();
                $('.search-status').html('Displaying '+totalfound+' results').show();
            } else {
                $('.faq-details .more').show();
                $('.faq-details .expand-content').hide();
                $('.faq-btn-container').show();
                if(keyword.length>0){
                    $('.search-status').html('Please type more than 3-character keyword to search...').show();
                }
            }
        });

    })

</script>



@stop

