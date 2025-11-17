
@extends('layouts.base')


@section('content')

<div class="body-wrapper">
<section class="content-inner hip">
    <div class="hero-banner">
        <div class="text-container">
            <div class="cat">Honda Insurance Plus</div>
            <div class="header">Cover that stands out</div>
        </div>
    </div>

    <div class="inner-content-section content-area">
        <h2>Peace Of Mind, For That Luxurious Indulgence</h2>
        <div class="content-copy">Now you can stay rest assured knowing that Volvo Car Insurance Plus policy provides you with the most convenient and widest range of valuable protection specifically tailored for your car and you. We take care of your every need, so you can enjoy a worry-free driving experience.</div>
        <div class="clearfix"></div>
        <div class="btn-container">
            <a href="#" class="prime-cta-black">
            <span>ENQUIRE QUOTATION</span>
            <div class="overlay"></div>
            </a>

            <a href="#" class="prime-cta-white">
            <span>DOWNLOAD BROCHURE </span>
            <div class="overlay"></div>
            </a>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="full-banner">
        <div class="content-area">
            <div class="banner-img"><img src="{{url('img/mock/banner-hip-img.png')}}" alt=""></div>
            <div class="banner-text">
                <div class="title">24/7 HIP Emergency Assistance</div>
                <div class="copy">Contact 24/7 HIP Emergency Assistance for your vehicle breakdown and accident assistance services.</div>
                <div class="cta"><a href="tel:1-800-18-1177">1-800-18-1177</a></div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="inner-content-section content-area hip-reason">
        <h2>9 Reasons Why You Should Choose <span class="block">Honda Insurance Plus</span></h2>
        <div class="collapse-container">
            <div class="more">100% pay-out for theft or total lost</div>
            <div class="expand-content" style="display: none;">
                Lorem ipsum
            </div>

            <div class="more">100% pay-out for theft or total lost</div>
            <div class="expand-content" style="display: none;">
                Lorem ipsum
            </div>

            <div class="more">100% pay-out for theft or total lost</div>
            <div class="expand-content" style="display: none;">
                Lorem ipsum
            </div>
        </div>
    </div>
</section>

<section class="content-inner cor-fleet-sales" id="cor-fleet-sales">
    <div class="hero-banner">
        <div class="text-container">
            <div class="cat">Corporate Fleet</div>
            <div class="header">Designed Around Your Business</div>
        </div>
    </div>

    <div class="inner-content-section content-area">
        <h2>Honda Corporate Fleet Sales Program</h2>
        <div class="content-copy">
        <p>As a premier Japanese automotive brand, Honda Malaysia is dedicated to provide the highest level of product quality and customer satisfaction to our Corporate Fleet customers.</p>
        <p>From small businesses to multinational companies, Government Agencies (Federal or State) and GLCs, Honda Malaysia promises the joy of buying to all – a promise that we have carried for generations.</p>
        <p>With an experienced Corporate Fleet Sales team and a vast network of dealers nationwide, you can rely on the Honda Corporate Fleet Sales Program to provide the full fleet network coverage and services that your business growth requires.</p>
        </div>
        <div class="clearfix"></div>
        <div class="btn-container">
            <a href="{{url('corporate-fleet-sales')}}" class="prime-cta-black">
            <span>CONTACT US</span>
            <div class="overlay"></div>
            </a>
        </div>
    </div>
</section>

<section class="content-inner ceo innerpage" id="ceo">
    <div class="hero-banner">
        <div class="text-container">
            <div class="cat">DEALER REWARD & RECOGNITION</div>
            <div class="header">recognition of outstanding performance</div>
        </div>
    </div>

    <div class="inner-content-section content-area">  
        <div class="ceo-img">
            <img src="{{url('img/mock/honda-ceo.png')}}" alt="">    
        </div>  
        <div class="content-copy">
            <p>We are proud to announce this year’s top achiever dealerships who have won the Honda CEO Award 2018. These dealerships have done exceptionally well over the past year to successfully establish relationships of trust and achieve a high standard of service for their customers. Thank you for your dedication and hard work.</p>
        </div>       
    </div>

    <div class="full-banner">
        <div class="stage-contained ">
            <ul class="flex ceo-list">
                <li>
                    <div class="awards-logo"></div>
                    <div class="title">Top Dealer</div>
                    <div class="details">Delima Kinta Sdn Bhd</div>
                </li>

                <li>
                    <div class="awards-logo"></div>
                    <div class="title">Gold Dealer</div>
                    <div class="details">Tian Siang Auto (Intan) Sdn Bhd</div>
                </li>

                <li>
                    <div class="awards-logo"></div>
                    <div class="title">Silver Dealer</div>
                    <div class="details">DMacinda Auto Sdn Bhd</div>
                </li>

                <li>
                    <div class="awards-logo"></div>
                    <div class="title">BRONZE Dealer</div>
                    <div class="details">Tian Siang Auto (Manjung) Sdn Bhd</div>
                </li>
            </ul>
        </div>
    </div>

    <div class="inner-content-section stage-contained awards-list">
        <h2>Elite Dealer</h2>
        <ul class="flex three-column">
            <li>
                <p>AutoWorld Asia Sdn Bhd</p>
                <p>Ban Chu Bee Sdn Bhd</p>
                <p>Ban Hoe Seng (Auto) Sdn Bhd</p>
                <p>Formula Venture Sdn Bhd</p>
                <p>Haslita Motor Sdn Bhd</p>
                <p>Jimisar Motors Sdn Bhd</p>
            </li>

            <li>
                <p>K M Lim Motor Sdn Bhd</p>
                <p>Kah Motor Co Sdn Bhd - Melaka</p>
                <p>Motoria Sdn Bhd</p>
                <p>New Era Sales (M) Sdn Bhd</p>
                <p>Sumber Auto Edaran Sdn Bhd</p>
                <p>Syarikat Labuan Automobile Sdn Bhd</p>
            </li> 

            <li>
                <p>Syarikat Motor G S Tay Sdn Bhd</p>
                <p>Syarikat Tan Eng Ann Sdn Bhd</p>
                <p>SYK RW Motor Sdn Bhd</p>
                <p>Unite Automobile Sdn Bhd</p>
                <p>Vermillion Autohaus Sdn Bhd</p>
                <p>Vimal Auto-Liner Sdn Bhd</p>
            </li>           
        </ul>
    </div>

    <div class="inner-content-section stage-contained awards-list">
        <h2>Quality Dealer</h2>
        <ul class="flex three-column">
            <li>
                <p>AutoWorld Asia Sdn Bhd</p>
                <p>Ban Chu Bee Sdn Bhd</p>
            </li>

            <li>
                <p>K M Lim Motor Sdn Bhd</p>
                <p>Kah Motor Co Sdn Bhd - Melaka</p>
            </li> 

            <li>
                <p>Syarikat Motor G S Tay Sdn Bhd</p>
            </li>           
        </ul>
    </div>



    <div class="awards-gallery">
        <div class="owl-carousel owl-theme"> 
            <a class="thumbnail gallery" href="{{url('img/mock/awards-gallery1.png')}}"><img class="img" src="{{url('img/mock/awards-gallery1.png')}}" alt="Caption"></a>

            <a class="thumbnail gallery" href="{{url('img/mock/awards-gallery2.png')}}"><img class="img" src="{{url('img/mock/awards-gallery2.png')}}" alt="Caption"></a>

            <a class="thumbnail gallery" href="{{url('img/mock/awards-gallery3.png')}}"><img class="img" src="{{url('img/mock/awards-gallery3.png')}}" alt="Caption"></a>

            <a class="thumbnail gallery" href="{{url('img/mock/awards-gallery3.png')}}"><img class="img" src="{{url('img/mock/awards-gallery3.png')}}" alt="Caption"></a>

            <a class="thumbnail gallery" href="{{url('img/mock/awards-gallery1.png')}}"><img class="img" src="{{url('img/mock/awards-gallery1.png')}}" alt="Caption"></a>

            <a class="thumbnail gallery" href="{{url('img/mock/awards-gallery3.png')}}"><img class="img" src="{{url('img/mock/awards-gallery3.png')}}" alt="Caption"> </a>
            </a>
        </div>
    </div>
</section>

<section class="content-inner honda-pride innerpage" id="honda-pride">
    <div class="hero-banner">
        <div class="text-container">
            <div class="cat">HONDA PRIDE</div>
            <div class="header">From quality maintenance & service to customer car experience, we got you covered.  </div>
        </div>
    </div>

    <div class="inner-content-section content-area">
        <h2>Why Honda Authorised Service Centre?</h2>
        <div class="content-copy">Honda Authorised Service Centres are equipped with the tools, expertise and parts that are tailored for every Honda, so that you get the quality and excellence you deserve.</div>       
    </div>

    <div class="stage-contained">
        <ul class="flex">
            <li>
                <div class="icon"><img src="{{url('img/mock/icn-hp1.png')}}" alt=""> </div>
                <div class="title">Preventive maintenance service schedule</div>
                <div class="content">Preventive maintenance service schedule</div>
            </li>

            <li>
                <div class="icon"><img src="{{url('img/mock/icn-hp2.png')}}" alt=""> </div>
                <div class="title">FREE labour service</div>
                <div class="content">FREE labour service</div>
            </li>

            <li>
                <div class="icon"><img src="{{url('img/mock/icn-hp3.png')}}" alt=""> </div>
                <div class="title">Minimum 15% parts discount</div>
                <div class="content">Genuine Honda parts at wallet-friendly prices helps to reduce maintenance costs</div>
            </li>

            <li>
                <div class="icon"><img src="{{url('img/mock/icn-hp4.png')}}" alt=""> </div>
                <div class="title">Skilled technicians</div>
                <div class="content">Specialised training for Honda technicians guarantees quality service</div>
            </li>

            <li>
                <div class="icon"><img src="{{url('img/mock/icn-hp5.png')}}" alt=""> </div>
                <div class="title">Bulk oil system</div>
                <div class="content">Reduces wastage and ensures you only pay for the oil you need</div>
            </li>

            <li>
                <div class="icon"><img src="{{url('img/mock/icn-hp6.png')}}" alt=""> </div>
                <div class="title">Honda Insurance Package</div>
                <div class="content">Comprehensive coverage for the best care</div>
            </li>

            <li>
                <div class="icon"><img src="{{url('img/mock/icn-hp7.png')}}" alt=""> </div>
                <div class="title">10,000km service interval</div>
                <div class="content">Longer intervals between service helps to save your time and money</div>
            </li>

            <li>
                <div class="icon"><img src="{{url('img/mock/icn-hp8.png')}}" alt=""> </div>
                <div class="title">5-Year warranty with unlimited mileage</div>
                <div class="content">For peace of mind</div>
            </li>

            <li>
                <div class="icon"><img src="{{url('img/mock/icn-hp9.png')}}" alt=""> </div>
                <div class="title">Genuine parts</div>
                <div class="content">Extend the life of your car with quality parts which are available with having to wait for days</div>
            </li>

            <li>
                <div class="icon"><img src="{{url('img/mock/icn-hp10.png')}}" alt=""> </div>
                <div class="title">Special tools</div>
                <div class="content">DST-i ensures accurate vehicle diagnostics</div>
            </li>

            <li>
                <div class="icon"><img src="{{url('img/mock/icn-hp11.png')}}" alt=""> </div>
                <div class="title">Quality fuel strainer and pollen filter</div>
                <div class="content">A longer lifespan for these parts gives greater value for money</div>
            </li>

            <li>
                <div class="icon"><img src="{{url('img/mock/icn-hp12.png')}}" alt=""> </div>
                <div class="title">Customer comfort</div>
                <div class="content">Comfortable lounges, complimentary F&B, Wi-Fi and kids’ corners are in all Service Centres </div>
            </li>
        </ul>
    </div>

    <div class="stage-contained">       
        <div class="note">
            <span class="body-copy">Terms and conditions apply.</span>
            <ul class="number">
                <li>Free Labour Service: Applicable up to 5 or 6 times only within the first 100,000km or 	5 years of ownership, whichever comes first. Terms may vary according to model. </li>
                <li>Bulk Oil System: Only applies to the recommended SN OW-20 (Honda Low Viscosity 	Engine Oil).</li>
                <li>10,000KM Service Interval: Applicable for Full Model Change Honda models 	purchased from July 2012 onwards only. </li>
                <li>Genuine Parts: Applicable for parts changed in accordance with the Preventive 	Maintenance Service Schedule only. </li>
                <li>5-Year Warranty with Unlimited Mileage: Applicable for Honda models purchased 	from June 2012 onwards. </li>
                <li>Honda reserves the right to change these terms and conditions at any time 	without prior notice. </li>
            </ul>
        </div>       
    </div>

</section>



</div>

@stop

