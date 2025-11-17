
@extends('layouts.base')

@section('content')

<div class="body-wrapper">
<!-- banner -->
<div class="hondapart-banner">
    <div class="text-container">
        <div class="header">Honda PARTS</div>
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
                <li><a href="{{url('aftersales/honda-parts')}}">Honda PARTS</a></li>
                <li style="border-bottom: 3px solid #e32119;"><a href="{{url('aftersales/honda-parts/faq')}}">FAQ</a></li>
            </ul>
    </div>
    <div class="clearfix"></div>
</section>
<section class="content-inner innerpage" style="margin-top: 30px;">

    <div class="inner-content-section content-area hip-reason">
        <h2>FREQUENTLY ASKED QUESTIONS</h2>
        <div class="collapse-container">

            <div class="more">Why are Honda Genuine Parts usually higher-priced than non-genuine ones?</div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                Every genuine part is a product of continuous research and development to ensure utmost reliability for your Honda. Unlike non-genuine parts, genuine parts come with better quality and warranty from Honda (Malaysia). Every genuine part offers the best value for your car. 
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
                All parts purchased at Honda Authorised Dealer come with a 6-month / 10,000km warranty and 12-month / 20,000km warranty for batteries (whichever comes first). However, warranty is not applicable to consumption parts.
                </div>
            </div>

            <div class="more">Is there a way to tell if the part is genuine or non-genuine?</div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                Some non-genuine parts are made and imitated exactly as per genuine parts which is hard to tell with the naked eye. The best way to avoid purchasing non-genuine parts is to get them and have them installed at Honda Authorised Dealer itself.
                </div>
            </div>

            <div class="more">How will I know if a particular spare part needs changing?</div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                Your Service Advisor will be able to inform you beforehand if a part needs to be replaced. You may also refer to your Owner’s Manual or Quick Guide Book or consult our friendly Service Advisors for more details.
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
                Honda Genuine Parts can be purchased from our Honda Authorised Dealers.  
                </div>
            </div>

            <div class="more">Can I purchase the spare parts directly from Honda (Malaysia)? </div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                Honda Genuine Parts can only be purchased from our Honda Authorised Dealers. 
                </div>
            </div>

            <div class="more">Can I purchase the spare parts from an outside distributor?</div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                Honda Genuine Parts can only be purchased from our Honda Authorised Dealers. 
                </div>
            </div>

            <div class="more">I'm driving an old Honda model. Does Honda Authorised Dealer carry parts for older model?</div>
            <div class="expand-content" style="display: none;">
                <div class="content-copy">
                Honda Authorised Dealer may have parts for your old Honda model. Just consult our friendly Service Advisors for assistance.  
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

@include('brand.hondaparts.hondaparts-style')
<style>
     ul.roman, ul.roman li {list-style:lower-roman;}
     .content-inner .expand-content {margin: 0 45px; margin-bottom:10px;}

     .content-inner .numcontainer {width:25px; display: inline-block; vertical-align: text-top; }
     .content-inner .tcontainer {width:calc(100% - 28px); display:inline-block;vertical-align: text-top;}
</style>

@stop

