
@extends('layouts.base')


@section('content')

<div class="body-wrapper">
<section class="content-inner cor-fleet-sales" id="cor-fleet-sales">
    <div class="hero-banner">
        <div class="text-container">
            <!-- <div class="cat">Corporate Fleet</div> -->
            <div class="header">CORPORATE FLEET SALES</div>
        </div>
    </div>

    <div class="inner-content-section content-area">
        <h2>Honda CORPORATE FLEET SALES PROGRAMME</h2>
        <div class="content-copy">
        <p style="padding-bottom:0px;">Drive your dreams with <strong>Honda Malaysia Corporate Fleet Sales Programme.</strong> We offer practical, economical and stylish models to suit your every purpose. From small and medium entrepreneurs to multinational giants, we are dedicated to take you through your Fleet ownership journey, which entitles you to enjoy an array of exclusive benefits.</p>
        <div class="row-corp">
            <div class="column-corp">
                <ul class="disc">
                    <li>Volume and loyalty programme.</li>
                    <li>Invitation to Honda Malaysia’s corporate events.</li>
                </ul>
            </div>
            <div class="column-corp">
                <ul class="disc">
                    <li>Nationwide vehicles delivery* and after sales services at our dealers.</li> 
                    <li>Customised fleet management to suit your specific needs*.</li>
                </ul>
            </div>
        </div>
        <p>With an extensive network of Dealers nationwide and an experienced Corporate Fleet Sales team, you can rely on the Honda Malaysia Corporate Fleet Sales Programme to provide the full network coverage and services that your business growth requires.</p>
        </div>

        <div class="inner-content-section content-area">
            <div class="collapse-container">

                <!-- <div class="more" style="font-weight:600;">Ownership Benefits</div>
                <div class="expand-content" style="display: none;">
                    <div class="content-copy">
                        <ul class="disc">
                            <li>Attractive corporate fleet purchase offerings such as volume and loyalty discounts.</li>
                            <li>Exclusive invitation to Honda Malaysia’s corporate event (Test Drive, New Model Launch & Factory Visits).</li>
                            <li>Nationwide vehicles deliveries* and aftersales services at our dealerships.</li>
                            <li>Individualized/Personalized fleet management and strategic advice to suit your specific needs*.</li>
                        </ul>
                        <br>
                        To be eligible for our corporate programme please refer below:
                    </div>
                </div> -->

                <div class="more" style="font-weight:600;">Eligibility</div>
                <div class="expand-content" style="display: none;">
                    <div class="content-copy">
                        <ul class="disc">
                            <li>Any Certified/Registered business in Malaysia (Multinational Company, University, Tourism Agency, Enterprise, Sendirian Berhad, Berhad, Government Linked Company)</li>
                            <li>Certified/Registered Association</li>
                            <li>Government - Federal/States, Local Authority (Pihak Berkuasa Tempatan), Statutory Body (Badan Berkanun) & University.</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

        <div class="clearfix"></div>

        <div class="btn-container">
            <a href="{{url('discover/corporate-fleet-sale/form')}}" class="prime-cta-black">
            <span>CONTACT US</span>
            <div class="overlay"></div>
            </a>
        </div>
    </div>

    <div class="" style="padding-bottom: 30px;">
        <div class="stage-contained">
            <div class="note-container" style="margin: 0px 20px 0px 20px;">
                <div class="note-title more long">DISCLAIMERS</div>
                <div class=" expand-content" style="display: none;">
                    <ul class="note">
                        <li>*Terms and conditions apply.</li>
                    </ul>
                </div>


            </div>
        </div>
    </div>

</section>


</div>

<style>
ul.disc li {list-style-type: none;}
ul.disc li::before {content: "\2022";color: #e32119;font-weight: 900;display: inline-block; width: 1em;margin-left: -1em;}

.note-container .more.long:after{left:unset;}

* {box-sizing: border-box;}
.row-corp {padding:20px;}
.column-corp { float: left; width: 50%; padding: 20px; text-align: left;}
.row-corp:after {content: "";display: table;clear: both;}

@media screen and (max-width: 600px) {
  .column-corp { width: 100%; padding-bottom: 0px;padding-top: 0px; }
}
</style>

@stop


