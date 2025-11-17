
@extends('layouts.base')


@section('content')

<div class="body-wrapper">
<section class="content-inner innerpage hip">

    <div class="inner-content-section content-area">
    <div class="success-icon"><img src="{{url('img/discover/Icon_Success.png')}}" alt=""> </div>
        <h2>SUCCESSFULLY SUBMITTED</h2>
        <div class="content-copy" style="max-width: 439px;margin: auto;">Thank you for your interest in <br>Honda Insurance Plus. You will be contacted by our Authorised Dealer within 14 days.</div>
        <div class="clearfix"></div>
        <div class="btn-container">
            <a href="{{url('discover/honda-insurance-plus')}}" class="prime-cta-white" style="background: black; color:white;">
            <span>BACK TO Honda INSURANCE PLUS</span>
            <div class="overlay"></div>
            </a>
            <div class="clearfix"></div>
        </div>
    </div>

</section>

<style>
    .success-icon {width: 100px;height: 110px;margin: auto;}
    .success-icon img {width:100%;}
    a.prime-cta-black, a.prime-cta-white {padding: 20px 60px;font-size: 0.875rem;text-transform: none;}

    @media screen and (max-width: 480px) {
    a.prime-cta-black, a.prime-cta-white {padding: 20px 0px;font-size: 0.8rem;}
    }
</style>

</div>

@stop

