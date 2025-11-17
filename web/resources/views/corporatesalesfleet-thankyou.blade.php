
@extends('layouts.base')


@section('content')

<div class="body-wrapper">
<section class="content-inner innerpage">

    <div class="inner-content-section content-area">
    <div class="icon"><img src="{{url('img/discover/Icon_Success.png')}}" alt=""> </div>
        <h2>SUCCESSFULLY SUBMITTED</h2>
        <div class="content-copy" style="max-width: 439px;margin: auto;">If you do not receive any response within 5 working days, you can alternatively reach out to us at:</div>
        <div class="row">
            <div class="column" style="background-color:#f5f5f5;">
                <div class="contact-title">Email</div>
                <div class="contact-details">corporate@honda.net.my</div>
            </div>
            <div class="column2" style="background-color:#fff;">
                <div>Or</div>
            </div>
            <div class="column" style="background-color:#f5f5f5;">
                <div class="contact-title">General Line</div>
                <div class="contact-details">+603 7953 2400</div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="btn-container">
            <a href="{{url('discover/corporate-fleet-sale')}}" target="_blank" class="prime-cta-white" style="background: black; color:white;">
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
    .contact-details {color:#E01327;}
    .contact-title{color:#5E6063;}

    @media screen and (max-width: 480px) {
    .column {width: 100%;}
    }
</style>

</div>

@stop

