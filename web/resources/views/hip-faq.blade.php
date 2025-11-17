
@extends('layouts.base')

@section('content')

<div class="body-wrapper">

<section class="content-inner innerpage" style="margin-top: 30px;">
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
                </label>
                </div>
                <ul>
                    <li><a href="{{url('discover/honda-insurance-plus')}}">Honda Insurance Plus</a></li>
                    <li style="border-bottom: 3px solid #e32119;"><a href="{{url('discover/honda-insurance-plus-faq')}}">FAQ</a></li>
                </ul>
        </div>
        <div class="clearfix"></div>
    </section>

    <div class="inner-content-section content-area hip-reason">
        <h2>FREQUENTLY ASKED QUESTIONS</h2>
        <div class="collapse-container">

            <div class="more">My vehicle is involved in an accident, what should I do?</div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                    <ul class="disc roman">
                        <li>Stay calm and contact Honda Insurance Plus (HiP 24 Hours Call Centre 1-800-18-1177) to have your vehicle towed to the nearest Honda's Authorised Body and Paint Panel.</li>
                        <li>Take note of the person's details involved in the accident such as vehicle registration number, name, ID or passport number and driving license number.</li>
                        <li>Finally lodge a report at the nearest police station within 24 hours.</li>
                    </ul>
                 </div>
            </div>

            <div class="more">My vehicle can't start and all the indicator lights are on, what should I do?</div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                    Please contact Honda Insurance Plus (HiP 24 Hours Call Centre 1-800-18-1177) to have your vehicle towed to the nearest Honda Authorised Dealers.
                </div>
            </div>

            <div class="more">My vehicle is overheating and smoke is emitting from the engine, what should I do?</div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                    <ul class="disc roman">
                        <li>Stay calm and safely pull your vehicle to the side of the road.</li>
                        <li>Switch gear transmission to "P" mode and set the parking brake.</li>
                        <li>Turn off the engine and turn on the hazard warning lights.</li>
                        <li>Contact Honda Insurance Plus (HiP 24 Hours Call Centre 1-800-18-1177) to have your vehicle towed to the nearest Honda's Authorised Dealer.</li>
                    </ul>
                </div>
            </div>

            <div class="more">What are the insurance companies listed under Honda Insurance Plus (HiP)?</div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                    The Honda Insurance Plus (HiP) panel insurers for conventional are: 
                    <ul class="disc roman">
                        <li>Tokio Marine</li>
                        <li>MSIG </li>
                        <li>Liberty Insurance</li>
                        <li>Berjaya Sompo </li>
                        <li>Allianz </li>
                        <li>AIG</li>
                     </ul>
                     The Honda Insurance Plus (HiP) panel insurers for Takaful are: 
                    <ul class="disc roman">
                        <li>Etiqa Takaful</li>
                        <li>Zurich Takaful</li>
                     </ul>
                </div>
            </div>


        </div>
    </div>
    
    <div style="background-color: #f5f5f5;">
    <div class="inner-content-section content-area">
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

