
@extends('layouts.base')


@section('content')

<div class="body-wrapper">
<section class="content-inner innerpage">

    <div class="inner-content-section content-area">
    <div class="success-icon"><img src="{{url('img/discover/Icon_Success.png')}}" alt=""> </div>
        <h2>SUCCESSFULLY SUBMITTED</h2>
        <div class="content-copy" style="max-width: 439px;margin: auto;">If you do not receive any response within 5 working days, you can alternatively reach out to us at:</div>
        <div class="row">
            <div class="column" style="background-color:#f5f5f5;">
                <div class="contact-title">Email</div>
                <a href="mailto:corporate@honda.net.my"><div class="contact-details">corporate@honda.net.my</div></a>
            </div>
            <div class="column col-center" style="background-color:#fff; width:10%;">
                <div>Or</div>
            </div>
            <div class="column" style="background-color:#f5f5f5;">
                <div class="contact-title">General Line</div>
                <a href="tel:+60379532400"><div class="contact-details">+603 7953 2400</div></a>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="btn-container">
            <a href="{{url('discover/corporate-fleet-sale')}}" class="prime-cta-white" style="background: black; color:white;">
            <span>BACK To Corporate Fleet Sales</span>
            <div class="overlay"></div>
            </a>
            <div class="clearfix"></div>
        </div>
    </div>

</section>

<style>
    .column {float: left;width: 45%;padding: 55px 0;height: 150px; text-align:center;}
    .row:after {content: "";display: table;clear: both;}
    .contact-details {color:#E01327; margin-top: 10px;}
    .contact-title{color:#5E6063;}
    .row {padding-top: 30px;}
    .success-icon {width: 100px;height: 110px;margin: auto;}
    .success-icon img {width:100%;}
    .col-center {left: 0%;}
    a.prime-cta-black, a.prime-cta-white {padding: 20px 60px;font-size: 0.875rem;}

    @media screen and (max-width: 480px) {
    .column {width: 100%;}
    .col-center {left: 45%;}
    a.prime-cta-black, a.prime-cta-white {padding: 20px 0px;font-size: 0.8rem;}
    }
</style>

</div>

@stop

