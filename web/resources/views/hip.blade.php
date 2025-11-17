
@extends('layouts.base')


@section('content')

<div class="body-wrapper">
<section class="content-inner innerpage hip">
    <div class="hero-banner hipbanner">
        <!-- <div class="text-container">
            <div class="cat">Honda Insurance Plus (HiP)</div>
            <div class="header">EXTENSIVE COVERAGE AND SAVINGS PLAN DESIGNED FOR YOU.</div>
        </div> -->
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
                    <li style="border-bottom: 3px solid #e32119;"><a href="{{url('discover/honda-insurance-plus')}}">Honda Insurance Plus</a></li>
                    {{-- <li><a href="{{url('discover/honda-insurance-plus/faq')}}">FAQ</a></li> --}}
                </ul>
        </div>
        <div class="clearfix"></div>
    </section>

    <div class="inner-content-section content-area">
        <h2 class="text-red b-600">The right insurance is when you have the best <br> people to get you back on the road safely.</h2>
        <div class="content-copy text-darker b-500">
            We assure you that our car parts are guaranteed and repairs are
            conducted by qualified technicians to meet the highest quality and
            safety standards. So you can drive with a greater peace of mind.
        </div>
        <div class="clearfix"></div>
        <div class="btn-container">
            <!-- <a href="#" class="prime-cta-black">
            <span>ENQUIRE QUOTATION</span>
            <div class="overlay"></div>
            </a> -->

            <a href="{{url('pdf/HiP Booklet 2024.pdf')}}" target="_blank" class="prime-cta-white">
            {{-- <a href="{{url('pdf/hip_booklet.pdf')}}" target="_blank" class="prime-cta-white"> --}}
            <span>DOWNLOAD BROCHURE</span>
            <div class="overlay"></div>
            </a>

            <a href="{{url('/discover/honda-insurance-plus/form')}}" class="prime-cta-white" style="background: black; color:white;">
            <span>RENEWAL ENQUIRY</span>
            <div class="overlay"></div>
            </a>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="" style="background-color: #f5f5f5;padding: 50px 0 50px 0;">
        <div class="" style="font-size: 1.5rem;font-weight: 500;text-align: center;max-width: 500px;margin: auto;">
        15 Reasons Why You Should Choose Honda Insurance Plus
        </div>
        <div class="" style="font-size: 1.5rem;font-weight: 500;text-align: center;color: #e30720;padding-top: 70px;padding-bottom: 20px;">RESCUE</div>
        <ul class="flex flex-child-50" style="justify-content: center;">
            <li class="card-section">
                <div class="icon new-icon"><img src="{{url('img/discover/hip/hip_icons/rescue-1.png')}}" alt=""> </div>
                <div class="card-section-desc">
                    <div class="title">24/7 Unlimited Towing Assistance</div>
                    <div class="content">No distance limitations on towing up to two times for accident, car breakdown or flood incident.</div>
                </div>
            </li>
            <li class="card-section">
                <div class="icon new-icon"><img src="{{url('img/discover/hip/hip_icons/rescue-2.png')}}" alt=""> </div>
                <div class="card-section-desc">
                    <div class="title">24/7 Roadside Repair Services </div>
                    <div class="content">
                        • Jump-start car battery <br>
                        • Change of flat tyre <br>
                        • Fuel refill <br> <br>
                        Free labour cost up to RM200 per event, not inclusive of spare parts. Fuel cost is borne by customer.
                    </div>
                </div>
            </li>
            <li class="card-section">
                <div class="icon new-icon"><img src="{{url('img/discover/hip/hip_icons/rescue-3.png')}}" alt=""> </div>
                <div class="card-section-desc">
                    <div class="title">Hassle-Free Claim Assistance</div>
                    <div class="content">
                        Our Honda Authorised Dealer will liaise with the
                        insurance company on your behalf and provide
                        assistance during your claim procedures.
                    </div>
                </div>
            </li>
        </ul>

        <div class="" style="font-size: 1.5rem;font-weight: 500;text-align: center;color: #e30720;padding-top: 70px;padding-bottom: 20px;">PROTECTION</div>
        <ul class="flex flex-child-50" style="justify-content: center;">
            <li class="card-section">
                <div class="icon new-icon"><img src="{{url('img/discover/hip/hip_icons/protection-1.png')}}" alt=""> </div>
                <div class="card-section-desc">
                    <div class="title">Trusted Honda Authorised Body &amp; Paint Centre</div>
                    <div class="content">
                        Quality workmanship on body and paint
                        repairs using state-of-the-art equipment to
                        keep your car in excellent condition.
                    </div>
                </div>
            </li>
            <li class="card-section">
                <div class="icon new-icon"><img src="{{url('img/discover/hip/hip_icons/protection-3.png')}}" alt=""> </div>
                <div class="card-section-desc">
                    <div class="title">100% Genuine Body &amp; Parts Replacement</div>
                    <div class="content">
                        With six months warranty or 10,000km mileage,
                        whichever comes first.
                    </div>
                </div>
            </li>
            <li class="card-section">
                <div class="icon new-icon"><img src="{{url('img/discover/hip/hip_icons/protection-2.png')}}" alt=""> </div>
                <div class="card-section-desc">
                    <div class="title">Personal Accident Coverage</div>
                    <div class="content">
                        Up to RM15,000 Personal Accident coverage in
                        the event of an Accidental Death or Permanent
                        Disability in a Named Vehicle Car accident.
                    </div>
                </div>
            </li>
            <li class="card-section">
                <div class="icon new-icon"><img src="{{url('img/discover/hip/hip_icons/protection-4.png')}}" alt=""> </div>
                <div class="card-section-desc">
                    <div class="title">Speedy Claims Approval</div>
                    <div class="content">
                        Get your car faster with pre-approved claims below RM30,000.
                    </div>
                </div>
            </li>

            <li class="card-section">
                <div class="icon new-icon"><img src="{{url('img/discover/hip/hip_icons/protection-6.png')}}" alt=""> </div>
                <div class="card-section-desc">
                    <div class="title">Personal Assistance</div>
                    <div class="content">• Return of children travelling with a HiP member<br> • Home assist services<br> • Legal matters<br> • Translator<br> • Visa, passport and vaccination requirements<br> • Location of lost items<br> • Alternative travel assistance<br> • Arrangement of flights</div>
                </div>
            </li>
            <li class="card-section">
                <div class="icon new-icon"><img src="{{url('img/discover/hip/hip_icons/protection-5.png')}}" alt=""> </div>
                <div class="card-section-desc">
                    <div class="title">Medical Assistance</div>
                    <div class="content">• Medical referral and arrangement of appointments <br>• Dispatch of medications which are not available locally <br>• Medical evacuation or repatriation</div>
                </div>
            </li>
        </ul>

        <div class="" style="font-size: 1.5rem;font-weight: 500;text-align: center;color: #e30720;padding-top: 70px;padding-bottom: 20px;">SAVINGS</div>
        <ul class="flex flex-child-50" style="justify-content: center;">
            <li class="card-section">
                <div class="icon new-icon"><img src="{{url('img/discover/hip/hip_icons/savings-1.png')}}" alt=""> </div>
                <div class="card-section-desc">
                    <div class="title">100% Payout on Agreed Value for Up to 15 Years</div>
                    <div class="content">If your car is stolen or severely damaged in an accident and is not repairable, HiP will reimburse 100% of the sum insured.</div>
                </div>
            </li>

            <li class="card-section">
                <div class="icon new-icon"><img src="{{url('img/discover/hip/hip_icons/savings-2.png')}}" alt=""> </div>
                <div class="card-section-desc">
                    <div class="title">100% Coverage on Accidental Repairs for Up to 13 Years</div>
                    <div class="content">Also known as No Betterment Fees, which means you don't have to pay additional charges for new parts to repair your damaged car.</div>
                </div>
            </li>

            <li class="card-section">
                <div class="icon new-icon"><img src="{{url('img/discover/hip/hip_icons/savings-3.png')}}" alt=""> </div>
                <div class="card-section-desc">
                    <div class="title">Flood Allowance</div>
                    <div class="content">Up to RM1,500 allowance when vehicle is damaged in a flood. </div>
                </div>
            </li>

            <li class="card-section">
                <div class="icon new-icon"><img src="{{url('img/discover/hip/hip_icons/savings-4.png')}}" alt=""> </div>
                <div class="card-section-desc">
                    <div class="title">Special Relief Allowance</div>
                    <div class="content">RM1,500 allowance in the event of car theft or total loss.</div>
                </div>
            </li>

            <li class="card-section">
                <div class="icon new-icon"><img src="{{url('img/discover/hip/hip_icons/savings-5.png')}}" alt=""> </div>
                <div class="card-section-desc">
                    <div class="title">Lost Key Reimbursement</div>
                    <div class="content">Up to RM1,000 reimbursement due to theft, robbery or house break-in.</div>
                </div>
            </li>
            
            <li class="card-section">
                <div class="icon new-icon"><img src="{{url('img/discover/hip/hip_icons/savings-6.png')}}" alt=""> </div>
                <div class="card-section-desc">
                    <div class="title">Unnamed Driver</div>
                    <div class="content">Covers all drivers under private registrations. No names required.</span> </div>
                </div>
            </li>

           

        </ul> 

        <div class="" style="text-align: center;padding-top: 70px;padding-bottom: 20px;">
            <img src="{{url('img/discover/hip/bevlogo2.png')}}" alt="BEV Logo" class="bev-logo">
        </div>
        <ul class="flex flex-child-50" style="justify-content: center;">
            <li class="card-section">
                <div class="icon new-icon"><img src="{{url('img/discover/hip/HiP-1-EV home wall charger.png')}}" alt=""> </div>
                <div class="card-section-desc">
                    <div class="title"><span style="color:#3F96D3;">Up to RM15,000 coverage for EV Home Wall Charger</span> <span style="font-weight:400;">against fire, lightning, theft or natural disasters.</span></div>
                    {{-- <div class="content">against fire, lightning, theft or natural disasters.</div> --}}
                </div>
            </li>

            <li class="card-section">
                <div class="icon new-icon"><img src="{{url('img/discover/hip/HiP-EV-2.png')}}" alt=""> </div>
                <div class="card-section-desc">
                    <div class="title"><span style="color:#3F96D3;">Up to RM5,000 Compassionate Cover</span> <span style="font-weight:400;">for damage or injury while using public EV Charger.</span></div>
                    {{-- <div class="content">for damage or injury while using public EV Charger</div> --}}
                </div>
            </li>

            <li class="card-section">
                <div class="icon new-icon"><img src="{{url('img/discover/hip/HiP-bev-towing.png')}}" alt=""> </div>
                <div class="card-section-desc">
                    <div class="title"><span style="color:#3F96D3;">24 Hours Towing</span> <span style="font-weight:400;">to the nearest charging stations or home if your vehicle is out of charge.</span></div>
                    {{-- <div class="content">to the nearest charging stations or home if your vehicle is out of charge </div> --}}
                </div>
            </li>

            <li class="card-section">
                <div class="icon new-icon"><img src="{{url('img/discover/hip/HiP-4-ev.png')}}" alt=""> </div>
                <div class="card-section-desc">
                    <div class="title"><span style="color:#3F96D3;">Up to RM50,000 Personal Liability Coverage</span> <span style="font-weight:400;">for death or bodily injury to third party, or damage to third party property arising from the use of EV Home Wall Charger.</span></div>
                    {{-- <div class="content">for death or bodily injury to third party, or damage to third party property arising from the use of EV Home Wall Charger</div> --}}
                </div>
            </li>

            <li class="card-section">
                <div class="icon new-icon"><img src="{{url('img/discover/hip/HiP-bev-wall-charger.png')}}" alt=""> </div>
                <div class="card-section-desc">
                    <div class="title"><span style="color:#3F96D3;">Up to RM2,000 coverage for loss or damage to the Portable Charging Cable</span> <span style="font-weight:400;">due to fire, theft, accidental collision and overturning.</span></div>
                    {{-- <div class="content">due to fire, theft, accidental collision and overturning.</div> --}}
                </div>
            </li>
           

        </ul> 
    </div>

    <div class="video-container" style="display: none;">
        <div class="embed-youtube"><iframe width="760" height="515" src="https://www.youtube.com/embed/aublyTyb0sM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
    </div>

    <div class="inner-content-section content-area" style="display: none;">
        <h2>GET COVERED WITH HiP TODAY</h2>
        <div class="content-copy" style="max-width: 439px;margin: auto;">Visit or Call any Honda Authorised Dealer to enquire for quotation and additional coverage.</div>
        <div class="clearfix"></div>
        <div class="btn-container">
            <a href="https://legacy.honda.com.my/dealers/dealers" target="_blank" class="prime-cta-white" style="background: black; color:white;">
            <span>FIND A DEALER</span>
            <div class="overlay"></div>
            </a>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="full-banner">
        <div class="content-area">
            <div class="banner-img"><img src="{{url('img/mock/banner-hip-img.png')}}" alt=""></div>
            <div class="banner-text">
                <div class="title-left title">HiP 24/7 Emergency Assistance</div>
                <div class="copy">Contact HiP 24/7 Emergency Assistance for your vehicle breakdown and accident assistance services.</div>
                <div class="cta"><a href="tel:1-800-18-1177">1-800-18-1177</a></div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="" style="background-color: #f5f5f5; padding-bottom: 30px;">
        <div class="stage-contained">
            <div class="note-container" style="margin: 0px 20px 0px 20px;">
                <div class="note-title more long">DISCLAIMERS</div>
                <div class=" expand-content" style="display: none;">
                    {{-- <ul class="note">
                        <li>*Terms and conditions apply.</li>
                        <li>**Applicable for private car for private use.</li>
                        <li>***Minimal fee applies.</li> 
                    </ul> --}}
                    <ul class="note">
                        <li>Terms and conditions apply.</li>
                        <li>The insurance provided
                            under the Honda Insurance
                            Plus is underwritten by the
                            panel of insurers.</li>
                    </ul>
                    <ol class="note note-custom">
                        <li>Applicable only to private registered
                            vehicles which are insured under
                            comprehensive motor coverage.</li>
                            <li>Customers are entitled to the first two
                                instances of free unlimited towing for
                                accidents, car breakdowns and floods.
                                For the third time onwards, HiP will
                                bear the towing cost up to RM200
                                (round trip) for accidents. As for flood
                                incidents and car breakdowns, HiP will
                                cover up to 450km (round trip) to the
                                nearest Honda Authorised Body &
                                Paint Centre.</li>

                        <li>In order to enjoy No Betterment,
                            Speedy Claims Approval and 100%
                            Genuine Body & Parts Replacement,
                            vehicle must be repaired at Honda
                            Authorised Body & Paint Centres or
                            Honda Panel Insurers’ Workshops.</li>
                        <li>HiP policy excludes the following: <br>
                            • Liability against claim from your passengers<br>
                            • Theft of, or damage to non-factory fitted vehicle accessories unless otherwise declared<br>
                            • Consequential losses, depreciation, wear & tear, mechanical or technical breakdown failures<br>
                            • Loss/damage arising from an act of nature<br>
                            Kindly refer to policy documents for more info.</li>
                        <li>
                            Waiver of compulsory excess is only
                        applicable to unnamed drivers. If the
                        driver is under the age of 21 or a
                        holder of a Provisional/Probation
                        Driving License, a compulsory
                        excess of RM400 is applicable in
                        the event of claim.
                        </li>
                        <li>
                            For cancellation of policy, a minimum
                            premium of RM50 is applicable, which
                            excludes stamp duty.
                        </li>
                        <li>
                            NCD entitlement (if any) will be
                        forfeited from your policy once Own
                        Damage or 3rd Party claim is made
                        on your policy.
                        </li>
                        <li>
                            Your motor insurance will only take
                        effect once premium due has been
                        paid (Cash before cover).
                        </li>
                        <li>
                            Determining the right Sum Insured
                        is important to avoid under insurance
                        and issues, in the event of claim.
                        Our dealers will be able to advise
                        you on the recommended Sum
                        Insured.
                        </li>
                        <li>
                            NCD is transferable from one vehicle
                        to another, provided the vehicles are
                        registered under the same name.
                        </li>
                        <li>
                            The benefits and services stated
                        are subject to eligibility and
                        acceptance by Honda’s panel of
                        licensed insurers. It will automatically
                        cease if the insurance policy lapses
                        for any reason whatsoever. The
                        benefits and services will also be
                        terminated if you are found by the
                        HiP Call Centre (in its sole discretion)
                        to be abusing its services.
                        </li>
                        <li>
                            General Exclusions include War
                        and related risks, government
                        regulations or acts of authorities,
                        suicide, self-inflicted injury or illness,
                        pregnancy, childbirth, physical or
                        mental defect or infirmity, AIDS,
                        AIDS-related complex or sexually
                        transmitted diseases, influence of
                        alcohol unless alcohol was not a factor
                        contributing to the happening of the
                        injury, vehicle used for racing,
                        speed-testing, hire, road rallying or
                        any other illegal business pursuit,
                        accidents outside the Territorial Limits,
                        driver who does not hold a valid
                        driver’s license, acts of terrorism.
                        </li>
                        <li>
                            Personal Accident coverage is only
                        applicable for private registration car.
                        </li>
                        <li>
                            The descriptions of cover are a
                        brief summary for quick and easy
                        reference. The precise terms and
                        conditions that apply are in the
                        Policy Document.
                        </li>
                        <li>
                            The Honda Insurance Plus is
                        arranged/underwritten by Honda’s
                        panel of licensed insurers. <br>
                        • MSIG Insurance (Malaysia) Bhd <br>
                        • Tokio Marine Insurans (Malaysia) Bhd <br> 
                        • Berjaya Sompo Insurance Berhad <br>
                        • Liberty General Insurance Berhad <br>
                        • Allianz General Insurance Company (Malaysia) Bhd <br> 
                        • Etiqa General Takaful Berhad <br>
                        • Zurich General Takaful Malaysia Berhad <br>
                        </li>
                        <li>
                            Toll cost to be borne by customer.
                        </li>
                        <li>
                            Honda Malaysia Sdn. Bhd.
                        reserves the right to amend any
                        of the benefits and services
                        related to HiP from time to time.
                        This booklet is only for reference
                        purposes. Please refer to the
                        latest information in Honda
                        website.
                        </li>
                        <li>
                            Refer to your insurance
                        policy schedule for eligibility of
                        the benefits.
                        </li>
                    </ol>
                    <ul class="note">
                        <li>Honda Insurance Plus (HiP) benefits
                            shall only be rendered to vehicle
                            insured with HiP policy. HiP and its
                            services provider shall not provide its
                            services in respect of or under the
                            following circumstances:</li>
                    </ul>
                    <ol class="note note-custom">
                        <li>
                            Services which are not organised by
                        HiP or pre-approved by HiP and its
                        service provider.
                        </li>
                        <li>
                            Cost of services which are claimable
                        under Motor Insurance Policy
                        (e.g. towing cost in the event of
                        an accident).
                        </li>
                        <li>Any cost of parts and cost of repairs at
                            Honda Body & Paint or Service
                            Centres that are not already covered
                            under the HiP benefits, whether or not
                            covered under the motor policy.</li>
                            <li>
                                Modified vehicle against the law or
                        participation in rally or racing or any
                        illegal activities.
                            </li>
                            <li>
                                Service provision outside the territorial stated.
                            </li>
                            <li>
                                Failure of the Insured/driver and/or
                        passengers of the vehicle to take
                        reasonable precautions or to follow
                        warning of any intended strike, riot or
                        civil commotion via the mass media.
                            </li>
                            <li>
                                Any illegal or unlawful act by the
                        Insured/driver and/or passengers
                        of the vehicle for any unlawful or
                        illegal purpose.
                            </li>
                            <li>Any commercial vehicle.</li>
                            <li>
                                When the car keys are not available or locked inside the vehicle.
                            </li>
                            <li>
                                When there is no mechanical part
                        in the vehicle, such as no engine
                        or transmission.
                            </li>
                            <li>Towing of a vehicle for the purpose of disposing the vehicle.</li>
                            <li>Towing of a vehicle for the purpose
                                of transferring the vehicle from one
                                workshop to another.</li>
                                <li>
                                    Failure to display valid road tax on the vehicle.
                                </li>
                                <li>Towing a stolen vehicle which has been discovered, abandoned or due to vandalism.</li>
                                <li>Vehicle that has been dismantled fully or partly in a workshop.</li>
                                <li>Towing a vehicle that is greater
                                    weight than for which it was
                                    designed as stated in manufacturer’s
                                    specification.</li>
                                <li>
                                    Towing a vehicle whose
                        registration number does not
                        match with the number registered
                        with HiP and its service provider.
                                </li>
                                <li>If the vehicle suffers a mechanical
                                    breakdown and is immobilised on
                                    an unpaved road surface or on a
                                    road that is not a gazetted road of
                                    the Malaysian, Singapore and/or
                                    Thailand Road System.</li>
                                    <li>If the vehicle requires the use
                                        of special equipment during
                                        the recovery.</li>
                                    <li>War, civil war, suicide, childbirth,
                                        miscarriage, insanity (unless
                                        caused solely and directly by
                                        accidental means to the driver
                                        and/or passengers while driving,
                                        riding, alighting or boarding the
                                        Vehicle), illness, under the influence
                                        of drugs, vehicle used for hire,
                                        racing, peace-making or illegal
                                        business pursuit and driver not
                                        holding a valid driving licence.
                                        Please refer to policy for full list
                                        of exclusions.</li>
                    </ol>
                </div>


            </div>
        </div>
    </div>

    {{--<div class="inner-content-section content-area hip-reason">
        <h2>9 Reasons Why You Should Choose <span class="block">Honda Insurance Plus</span></h2>
        <div class="collapse-container">
             <div class="more">My vehicle is involved in an accident, what should I do?</div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                    <ul class="number">
                        <li>Stay calm and contact Honda Insurance Plus (HiP 24 Hours Call Centre 1-800-18-1177) to have your vehicle towed to the nearest Honda's Authorised Body and Paint Panel.</li>
                        <li>Take note of the person's details involved in the accident such as vehicle registration number, name, ID or passport number and driving license number.</li>
                        <li>Finally lodge a report at the nearest police station within 24 hours.</li>
                    </ul>
                </div>
            </div>

            <div class="more">My vehicle can't start and all the indicator lights are on, what should I do?</div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">Please contact Honda Insurance Plus (HiP 24 Hours Call Centre 1-800-18-1177) to have your vehicle towed to the nearest Honda Authorised Dealers.</div>
            </div>

            <div class="more">My vehicle is overheating and smoke is emitting from the engine, what should I do?</div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                    <ul class="number">
                        <li>Stay calm and safely pull your vehicle to the side of the road.</li>
                        <li>Turn off transmission on "P" mode and set the parking brake. </li>
                        <li>Turn off the engine and turn on the hazard warming lights. </li>
                        <li>Contact Honda Insurance Plus (HiP 24 Hours Call Centre 1-800-18-1177) to have your vehicle towed to the nearest Honda's Authorised Dealer. </li>
                    </ul>
                </div>
            </div>

            <div class="more">What are the insurance companies listed under Honda Insurance Plus (HiP)?</div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                    The Honda Insurance Plus (HiP) panel insurers for conventional are:
                    <ul class="number">
                        <li>Tokio Marine</li>
                        <li>MSIG</li>
                        <li>Liberty Insurance</li>
                        <li>Berjaya Sompo</li>
                        <li>Allianz</li>
                        <li>AIG </li>
                    </ul>
                    <br/>
                    The Honda Insurance Plus (HiP) panel insurers for Takaful are:
                    <ul class="number">
                        <li>Etiqa Takaful</li>
                        <li>Zurich Takaful</li>
                    </ul>
                </div>
            </div>

            <div class="more">HiP Honda Insurance Plus </div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                    Enjoy the best value for an insurance plan that is exclusively for Honda owners.
                </div>
            </div>

            <div class="more">Roadside Repair Services </div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                    Free labour up to RM200 per event, not inclusive of spare parts.
                </div>
            </div>

            <div class="more">24 Hours Emergency Towing </div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                    Accident*, breakdown and flood up to 450km round trip to the nearest Honda Authorised Body & Paint Centre.
                </div>
            </div>

            <div class="more">Hassle-free Claim Assistance </div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                    Our Honda Authorised Dealer will follow-up with the insurance company and advise on the procedures.
                </div>
            </div>

            <div class="more">100% Genuine Body & Part Replacements  </div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                    With six months warranty or 10,000km service warranty.
                </div>
            </div>

            <div class="more">Speedy Claim Approval </div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                    Get your car faster with pre-approved claim below RM20,000 repaired at Honda Authorised Body & Paint Centres.
                </div>
            </div>

            <div class="more">Medical* and Personal Assistance*</div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                    From medical arrangement to legal and travel matters, we are here to assist you.
                </div>
            </div>

            <div class="more">100% Pay-out for Theft or Total Loss</div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                    On sum insured for the first 10 years.
                </div>
            </div>

            <div class="more">100% Coverage on Accidental Repairs</div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                    No excess clause up to 10 years.
                </div>
            </div>

            <div class="more">100% Coverage for Cars up to 10 years old</div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                    No hidden cost when you repair your car at Honda Authorised Body & Paint Centres (No betterment).
                </div>
            </div>

            <div class="more">How to become a HiP member?</div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                    <ul class="disc">
                        <li>Visit/Call any Honda Authorised Dealership</li>
                        <li>Enquire for quotation and additional coverage </li>
                        <li>Get covered with HiP</li>
                    </ul>
                </div>
            </div>

            <div class="more">My HiP has lapsed. On my next renewal, can I sign up for HiP?</div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                    Yes! Renew your car insurance at any Honda Authorised Dealer new you.
                </div>
            </div>

            <div class="more">To find out more: </div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                    Call 1-800-88-2020 (Honda Toll Free)
                </div>
            </div>

            <!-- <div class="more">For emergency </div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                    call 1-800-18-1177 (HiP 24/7 Emergency Assistance)
                </div>
            </div> -->

        </div>
    </div>--}}
</section>

</div>

<style>
    .title-left {text-align:left;}
    .hip.innerpage .icon {width:90px; height: 90px;}
    .note-container .more.long:after{left:unset;}
    .hip.innerpage ul.flex li {margin-bottom: 0px;}
    /* overwrite */
    .innerpage ul.flex li {width:26%;}

    .video-container {display: block;margin: 20px auto;width: 100%;max-width: 760px;padding: 0 10px;}

    .embed-youtube {padding-bottom: 56.25%;overflow: hidden;position: relative;width: 100%;height: 100%;cursor: pointer;}
    .embed-youtube iframe,
    .embed-youtube object,
    .embed-youtube embed { border: 0; position: absolute; top: 0; left: 0; width: 100%; height: 100%;}

    .text-darker { color: #282A2F !important; }
    .text-red { color: #e32119 !important; }

    .b-500 { font-weight: 500 !important; }
    .b-600 { font-weight: 600 !important;  }

    .content-inner .hipbanner{ background: url(../img/discover/hip/v3/HIP-banner-v2-desktop.png) no-repeat top center !important; background-size: cover !important; height: 405px;}

    .card-section-tnc { display: flex !important; justify-content: center; align-items: flex-start; }
    .card-section-tnc-desc { width: 84% !important; margin-left: 25px !important; margin-top: 9px; }
    .card-section-tnc-desc div { text-align: left !important; }

    .hip.innerpage .icon.new-icon-number {
        display: flex;
        justify-content: flex-start;
        align-items: flex-start;
        height: 100%;
    }

    .note.note-custom { padding-left: 0 !important; margin-left: 28px !important; }
    .note.note-custom li { list-style-type: auto !important; }

    .bev-logo {
        width: 10%;
    }

    @media only screen and (min-width: 1440px) {
        .content-inner .hipbanner {
            height: 54vh;
        }
    }

    @media only screen and (max-width: 1024px) {
        .flex-child-50-tnc li { flex: 50%; }

        .content-inner .hipbanner {
            height: 266px;
        }
    }

    @media only screen and (max-width: 820px) {
        .flex-child-50-tnc li { flex: 50%; }

        .content-inner .hipbanner {
            height: 190px;
            width: 100vw;
        }
    }

    @media only screen and (max-width: 640px) {
        .title-left {text-align:center;}

        .content-inner .hipbanner {
            background: url(../img/discover/hip/v3/HIP-banner-v2-banner.png) no-repeat top center !important;
            background-size: cover !important;
            height: 170px;
            width: 100vw;
        }

        .bev-logo{
            width: 26% !important;
        }
    }


</style>

@stop

