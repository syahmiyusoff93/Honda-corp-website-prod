
@extends('layouts.base')


@section('content')

<div class="body-wrapper">

<section class="content-inner ceo innerpage" id="ceo">
    <div class="hero-banner">
        <div class="text-container">
            {{-- <div class="cat">DEALER REWARD & RECOGNITION</div> --}}
            <div class="header">Honda DEALER AWARDS & RECOGNITION</div>
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

</div>

@stop

