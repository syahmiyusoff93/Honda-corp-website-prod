<footer id="footer-wrapper">
    <section class="cta-announcement">
        <div class="ann-title">PRODUCT UPDATE</div>
        <a href="<?php echo env('APP_URL').'/productrecall'; ?>" target="_blank" class="ann-body">
            <span class="ann-copy">Check if your vehicle requires a Product Update (Recall) here.</span>
            <span class="ann-more text-middle">more</span>
            <img class="animate text-middle" src="{{url('img/interface/arrow-short-right-yellow.svg')}}">
        </a>
    </section>

    <section id="footer" class="">
        <div class="footer-menu">
            <ul>
            </ul>
        </div>
        <div class="footer-logo">
            {{-- <img src="{{url('img/interface/honda-logo.svg')}}" alt="Honda logo"> --}}
        </div>

        <div class="footer-social">
            <a href="{{config('global.webconfig')->fb_link}}" target="_blank"><img src="{{url('img/interface/icn-fb.png')}}"></a>
            <a href="{{config('global.webconfig')->instagram_link}}" target="_blank"><img src="{{url('img/interface/icn-insta.png')}}"></a>
            <a href="{{config('global.webconfig')->youtube_link}}"  target="_blank"><img src="{{url('img/interface/icn-youtube.png')}}"></a>
        </div>
        <div class="footer-links">
        <!-- temporary link to legacy site -->
            <ul class="legacy-links">
            {{-- <li style="width:65px;"><a href="{{url('about-us')}}"> About Us</a></li>
                 <li style="width:95px;"><a href="{{url('press-release')}}"> Press Release</a></li> 
                <li style="width:55px;"><a href="{{url('career')}}"> Career</a></li>
                <li style="width:80px;"><a href="{{url('locate-us')}}"> Contact Us</a></li>--}}
                <li style="width:39px;"><a href="{{url('customer-service')}}"> FAQ</a></li>
                <li style="width:80px;"><a href="{{url('/newsletter/subscribe')}}"> Newsletter</a></li>
                
            </ul>
            <style>
            .legacy-links li:before {content: ""; padding-left: 2px;}
            .legacy-links li {padding: 10px 0px 10px 0px; font-size: 14px;}
            </style>
            <!-- end -->
            <span>&copy; {{date("Y")}} Honda Malaysia Sdn. Bhd. [200001029513] [532120-D] All Rights Reserved.</span>
            <ul>
                <li><a href="{{url('terms')}}"> Terms&nbsp;&amp;&nbsp;Conditions</a></li>
                <li><a href="{{url('privacy')}}"> Privacy Notice</a></li>
                <li><a href="{{url('code-of-conduct')}}"> Code of Conduct</a></li>
            </ul>
        </div>

    </section>
</footer>
