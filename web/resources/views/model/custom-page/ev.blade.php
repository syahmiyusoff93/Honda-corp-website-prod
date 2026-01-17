@php
    $APIPATH = config('global.APIPATH');
    $honda_api_context = config('global.APICONTEXT');

    $data = file_get_contents($APIPATH . 'model_' . $model_slug . '_page_landing.json', false, $honda_api_context);
    $data = json_decode($data);
    $story = $data->payload;

    if (isset($story->hero)) {
        foreach ($story->hero as $item) {
            $_hero[$item->type] = $item->data;
        }
    }
@endphp

@extends('layouts.modelinner')

@section('page-title')
    Honda {{ $model_info->name }}
@stop

@section('inner-content')

    <script>
        $(document).ready(function() {
            console.log($('#hero-banner').outerHeight())

            let menuList = document.querySelector('#modelmenu ul');

            // let accessoriesListItem = document.querySelector('.sai-navitem-accessories');
            // if (accessoriesListItem) {
            //     menuList.removeChild(accessoriesListItem);
            // }

            // let accessoriesListItem = document.querySelector('.sai-navitem-accessories');
            // if (accessoriesListItem) {
            //     accessoriesListItem.querySelector('a').href = '{{ url('model/' . $model_slug . '/accessories') }}';
            // }

            let galleryListItem = document.querySelector('.sai-navitem-gallery');
            if (galleryListItem) {
                menuList.removeChild(galleryListItem);
            }

            let specificationsListItem = document.querySelector('.sai-navitem-spec');
            if (specificationsListItem) {
                specificationsListItem.querySelector('a').textContent = 'Specifications and Price';
            }

            let mobileMenuList = document.querySelector('.for-mobile .menu-toggle ul');

            // let mobileAccessoriesListItem = mobileMenuList.querySelector('.sai-navitem-accessories');
            // if (mobileAccessoriesListItem) {
            //     mobileMenuList.removeChild(mobileAccessoriesListItem);
            // }

            let mobileGalleryListItem = mobileMenuList.querySelector('.sai-navitem-gallery');
            if (mobileGalleryListItem) {
                mobileMenuList.removeChild(mobileGalleryListItem);
            }

            let mobileSpecificationsListItem = mobileMenuList.querySelector('.sai-navitem-spec');
            if (mobileSpecificationsListItem) {
                mobileSpecificationsListItem.querySelector('a').textContent = 'Specifications and Price';
            }
        })

        function reveal() {
            let reveals = document.querySelectorAll(".floating-paragraph");
            let reveals_reverse = document.querySelectorAll(".floating-paragraph-reverse");

            for (let i = 0; i < reveals.length; i++) {
                let windowHeight = window.innerHeight;
                let elementTop = reveals[i].getBoundingClientRect().top;
                let elementVisible = 150;

                if (elementTop < windowHeight - elementVisible) {
                    reveals[i].classList.add("active");
                } else {
                    reveals[i].classList.remove("active");
                }
            }

            for (let i = 0; i < reveals_reverse.length; i++) {
                let windowHeight = window.innerHeight;
                let elementTop = reveals_reverse[i].getBoundingClientRect().top;
                let elementVisible = 150;

                if (elementTop < windowHeight - elementVisible) {
                    reveals_reverse[i].classList.add("active");
                } else {
                    reveals_reverse[i].classList.remove("active");
                }
            }
        }

        window.addEventListener("scroll", reveal);
    </script>

    <div class="typer-custom">

        <section class="model-landing-hero" id="hero-banner">
            <div class="hero-container">
                <div class="hero-content-area">
                    <div class="model-name"><img src="/img/model/bev/01_Logo/bev4.png" alt=""></div>
                    <img class="car-model" src="{{ asset(@$_hero['hero_img']) }}" alt="">
                    <div class="herocopyholder-1">
                        <div class="floating-paragraph-reverse">
                            <div class="m-title black upper new-font">{!! $_hero['hero_title'] !!}</div>
                            <div class="intro-title" style="display:block;padding: 0 47px;">{!! $_hero['hero_copy'] !!}</div>
                        </div>

                        @if (@$_hero['hero_cta1']->label)
                            <a href="{{ $_hero['hero_cta1']->link }}" class="prime-cta-black">
                                <span>{{ $_hero['hero_cta1']->label }}</span>
                                <div class="overlay"></div>
                            </a>
                        @endif
                    </div>

                    {{-- @if (@$_hero['hero_cta1']->label)
                    <a href="{{$_hero['hero_cta1']->link}}" class="prime-cta-black">
                        <span>{{$_hero['hero_cta1']->label}}</span>
                        <div class="overlay"></div>
                    </a>
                @endif --}}
                </div>
            </div>
        </section>

        <section class="divider for-desktop" style="height:200px;"></section>
        <section class="divider for-mobile" style="height:130px;"></section>

        <section class="divider for-desktop" style="height:200px;"></section>
        <section class="divider for-mobile" style="height:0;"></section>

        <section id="" class="full-width-info">
            <fieldset class="filedset-bev-style">
                <legend class="new-font font-title-size">POWERED BY Honda's LEGACY</legend>
                <div>
                    <p class="font-description-size"> Honda Malaysia's FIRST BEV, powered by a long legacy of innovation
                        designed
                        to move you with style and confidence. This is where electric meets iconic.</p>
                    <img src="/img/model/bev/02_Powered/newen-1-web-images-new.jpg" alt="" class="powered-img">
                </div>
            </fieldset>
        </section>

        <section id="exterior" class="full-width-info design-wrapper">
            <fieldset class="filedset-bev-style">
                <legend class="new-font font-title-size">DESIGN POWERED BY LEGACY</legend>
                <div>
                    <p class="font-description-size">Every curve, every line is meticulously designed to convey modernity
                        and motion.</p>
                    <div class="design-desc-container">
                        <img src="/img/model/bev/03_Design/en-1-web-images-02.png" alt="" class="design-img">
                        <h3 class="new-font fs-12-mobile">AUTO LED HEADLIGHTS</h3>
                        <p class="fs-10-mobile">Sleek and sophisticated front profile with a confident presence.</p>
                    </div>
                    <div class="design-desc-container">
                        <img src="/img/model/bev/03_Design/en-1-web-images-03.png" alt="" class="design-img">
                        <h3 class="new-font fs-12-mobile">REAR LED COMBI LIGHTS</h3>
                        <p class="fs-10-mobile">Striking LED taillights with a seamless and sharp design.</p>
                    </div>
                </div>
            </fieldset>
        </section>

        <section id="performance" class="full-width-info performance-wrapper">
            <fieldset class="filedset-bev-style">
                <legend class="new-font font-title-size">PERFORMANCE POWERED BY LEGACY</legend>
                <div>
                    <p class="font-description-size"> A perfect balance of performance and efficiency, delivering a refined
                        yet dynamic drive every time. </p>
                    <img src="/img/model/bev/04_Performance/en-1-web-images-04.png" alt="" class="performance-img">
                    <div class="performance-icon-wrapper show-desktop">
                        <div class="performance-icon-container">
                            <img src="/img/model/bev/04_Performance/EN-1 Brouchure_5_5_D3_RGB_Outline-10.png"
                                alt="">
                            <div>
                                <h4 class="new-font">BATTERY CAPACITY</h4>
                                <p>68.8 kWh</p>
                            </div>
                        </div>
                        <div class="performance-icon-container">
                            <img src="/img/model/bev/04_Performance/icon-2-bev.png" alt="">
                            <div>
                                <h4 class="new-font">DRIVING RANGE (NEDC)</h4>
                                <p>Up to 500 km <br> Per Charge</p>
                            </div>
                        </div>
                        <div class="performance-icon-container">
                            <img src="/img/model/bev/04_Performance/icon-3-bev.png" alt="">
                            <div>
                                <h4 class="new-font">MOTOR MAXIMUM POWER</h4>
                                <p>150 kW</p>
                            </div>
                        </div>
                        <div class="performance-icon-container">
                            <img src="/img/model/bev/04_Performance/icon-4-bev.png" alt="">
                            <div>
                                <h4 class="new-font">MAXIMUM TORQUE</h4>
                                <p>310 Nm</p>
                            </div>
                        </div>
                    </div>

                    <div class="performance-icon-wrapper show-mobile">
                        <div style="display: flex;">
                            <div class="performance-icon-container">
                                <img src="/img/model/bev/04_Performance/EN-1 Brouchure_5_5_D3_RGB_Outline-10.png"
                                    alt="">
                                <div>
                                    <h4 class="new-font">BATTERY CAPACITY</h4>
                                    <p>68.8 kWh</p>
                                </div>
                            </div>
                            <div class="performance-icon-container">
                                <img src="/img/model/bev/04_Performance/icon-2-bev.png" alt="">
                                <div>
                                    <h4 class="new-font">DRIVING RANGE (NEDC)</h4>
                                    <p>Up to 500 km Per Charge</p>
                                </div>
                            </div>
                        </div>
                        <div style="display: flex;">
                            <div class="performance-icon-container">
                                <img src="/img/model/bev/04_Performance/icon-3-bev.png" alt="">
                                <div>
                                    <h4 class="new-font">MOTOR MAXIMUM POWER</h4>
                                    <p>150 kW</p>
                                </div>
                            </div>
                            <div class="performance-icon-container">
                                <img src="/img/model/bev/04_Performance/icon-4-bev.png" alt="">
                                <div>
                                    <h4 class="new-font">MAXIMUM TORQUE</h4>
                                    <p>310 Nm</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
        </section>

        <section id="interior" class="full-width-info comfort-wrapper">
            <fieldset class="filedset-bev-style">
                <legend class="new-font font-title-size">COMFORT AND CONNECTIVITY <br>
                    POWERED BY LEGACY</legend>
                <div>
                    <p class="font-description-size"> A spacious cabin experience with intuitive technology and seamless
                        connectivity at its heart.</p>
                    <div class="comfort-container">
                        <img src="/img/model/bev/05_Interior/en-1-web-images-05.png" alt=""
                            class="comfort-img-1">
                        <div>
                            <img src="/img/model/bev/05_Interior/en-1-web-images-06.png" alt=""
                                class="comfort-img-2">
                            <h3 class="new-font fs-12-mobile">ADVANCED DISPLAY AUDIO</h3>
                            <p class="fs-8-mobile">Control everything seamlessly with three integrated infotainment system.
                                Stay
                                connected via Android Auto<sup>TM</sup> and Wireless Apple CarPlay<sup>TM</sup>, while
                                managing
                                air conditioning, vehicle settings and more from one screen.</p>
                        </div>
                    </div>
                </div>
            </fieldset>
        </section>

        <section id="safety" class="full-width-info safety-wrapper">
            <fieldset class="filedset-bev-style">
                <legend class="new-font font-title-size">SAFETY POWERED BY LEGACY</legend>
                <div>
                    <p class="font-description-size"> Honda's uncompromising commitment to safety safeguards every journey.
                    </p>
                    <img src="/img/model/bev/06_Safety/en-1-web-images-07.png" alt="" class="safety-img">
                    <div class="safety-container">
                        <div>
                            <div class="honda-sensing-container">
                                <img src="/img/model/bev/sensing3.png" alt="">
                                <p class="fs-8-mobile fs-tablet">Equipped with the Honda SENSING suite that
                                    offers intelligent driver&#8209;assistive features.</p>
                            </div>
                            <div>
                                <h3 class="new-font mt-responsive fs-10-mobile fs-tablet2">FRONT AND
                                    REVERSE SENSORS</h3>
                                <p class="fs-8-mobile fs-tablet">Enjoy peace of mind with front and
                                    reverse sensors that detect obstacles and
                                    make tight spaces easy to manoeuvre.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
        </section>

        <section id="safety" class="full-width-info safety-wrapper">
            <fieldset class="filedset-bev-style">
                <legend class="new-font font-title-size">PERSONALISED ACCESSORIES <br> POWERED BY LEGACY</legend>
                <div>
                    <img src="/img/model/bev/07_Personalised/accessories-EN-1 Brouchure_5_5_D3_RGB_Outline.png"
                        alt="" class="personalised-img">
                    <section class="color-container section-gap-inner" id="colour-accessories"
                        style="    margin-top: -2%;
    margin-bottom: 5%;">
                        @include('components.model-color-acc')
                    </section>
                </div>
            </fieldset>
        </section>

        {{-- <section class="usp-flex-3">
            <div>
                <ul>
                    <li class="r-red">+R MODE</li>
                    <li>Flip to "<strong class="r-red">+R</strong>" for ultimate control in the circuit.</li>
                </ul>
            </div>
        </section> --}}

        {{-- <section id="gallery" class="section-gap-inner gallery">
            <h2>GALLERY</h2>
            @include('components.model-gallery-wdata')
        </section> --}}


        {{-- <section class="color-container section-gap-inner" id="colour-accessories">
            <h2>Colours &amp; accessories</h2>
            <h2>ACCESSORIES</h2>
            @include('components.model-color-acc')
        </section> --}}


        {{-- <section class="spec-container section-gap-inner" id="spec-price">

            <h2>SPECIFICATIONS</h2>
            <div class="">
                <div class="tab-slider-nav">
                    <ul class="tab-slider-tabs body-copy">
                        <li class="tab-slider-trigger active" rel="tab--"
                            style="color: #ffffff; background-color: #1e1e25;">2023 Honda Type R</li>
                    </ul>
                </div>
            </div>
            <div class="btn-container">
                <a href="{{ url('model/type-r/spec') }}" class="prime-cta-white">
                    <span>specifications</span>
                    <div class="overlay"></div>
                </a>
                <div class="clearfix"></div>
            </div>


        </section> --}}

        <section class="spec-container section-gap-inner" id="spec-price">
            <div class="container">
                <h2 class="spec-price">SPECIFICATIONS &amp; PRICING</h2>

                @include('components.model-pricing-section')
            </div>
        </section>

        <section class="section-gap"></section>

        {{-- <section class="shopping-tools body-copy grey container section-gap" id="shopping-tools">
            @include('components.shopping-tools')
            <div class="clearfix"></div>
        </section> --}}

        <section class="shopping-tools body-copy grey container section-gap" id="shopping-tools"
            style="padding-top: 40px; margin-top: -40px;">
            @include('components.shopping-tools')
            <div class="clearfix"></div>
        </section>

        <div class="stage-contained">
            <div class="note-container">
                <div class="note-title more">Disclaimers</div>
                <div class=" expand-content" style="display: none;">
                    <ul>
                        {{-- <li>Advanced Display Audio can be change based on the listed languages available.</li> --}}
                        <li>Actual model, features and specifications may vary in detail from image shown. Subject to change
                            without prior notice.</li>
                    </ul>
                </div>
            </div>
        </div>

        <section class="happenings">
            <h2>HAPPENINGS</h2>
            @include('components.happenings-wdata')
        </section>

        <div class="clearfix"></div>

        <section class="divider" style="height:120px;"></section>
        <section class="model-selection">
            <h2>EXPLORE ALL MODELS</h2>
            @include('components.model-carousel')
        </section>


    </div>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Catamaran:wght@300;500&family=Libre+Bodoni:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap');

        @font-face {
            font-family: 'Conthrax';
            src: url('/css/fonts/Conthrax-SemiBold.otf') format('opentype');
            font-weight: 600;
            font-style: normal;
        }

        .new-font {
            font-family: 'Conthrax', serif !important;
        }

        .powered-img,
        .performance-img,
        .safety-img,
        .personalised-img {
            width: 95%;
            margin: 1% 0;
        }

        .font-title-size {
            font-size: 38px;
            color: #000000;
        }

        .font-description-size {
            font-size: 18px;
            padding: 2% 10%;
            color: #000000;
        }

        .filedset-bev-style {
            border: 5px solid #9abdce;
            margin: 0 2%;
        }

        .design-wrapper,
        .performance-wrapper,
        .comfort-wrapper,
        .safety-wrapper {
            margin-top: 10%;
        }

        .design-desc-container {
            margin: 1% 2% 2% 2%;
        }

        .design-img {
            margin: 0% 0;
            width: 100%;
        }

        .design-desc-container p,
        .design-desc-container h3 {
            text-align: right;
            color: #000000;
        }

        .design-desc-container h3 {
            margin-bottom: 0
        }

        .design-desc-container p {
            margin-top: 0
        }

        .comfort-container {
            display: flex;
            justify-content: center;
            margin: 1% 2% 2% 2%;
        }

        .comfort-container p,
        .comfort-container h3 {
            text-align: left;
            color: #000000;
        }

        .comfort-img-1 {
            width: 50%;
            margin-right: 4%;
        }

        .comfort-img-2 {
            width: 100%;
        }

        .safety-container {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: left;
            hyphens: none;
            margin-bottom: 5%;
            margin-top: 5%;
        }

        .mt-responsive{
                margin-top: 4px;
        }

        .safety-container>div {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            width: 62%;
            color: #000000;
        }

        .honda-sensing-container {
            margin-right: 6%;
            border-right: 1px solid #9abdce;
            padding-right: 40px;
        }

        .honda-sensing-container img {
            width: 100%;
        }

        .performance-icon-wrapper {
            width: 100%;
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            padding: 0 2%;
            margin-left: 1%;
            margin-top: 3%;
        }

        .performance-icon-container {
            display: flex;
            justify-content: center;
            text-align: left;
            align-items: flex-start;
            width: 100%;
            margin-bottom: 5%;
        }

        .performance-icon-container img {
            margin-right: 12px;
            width: 25%;
        }

        .performance-icon-container div h4 {
            color: #000000;
            margin-bottom: 0;
            margin-top: 0;
        }

        .performance-icon-container div p {
            font-size: 20px;
            margin: 5% 0 0 0;
        }

        .show-desktop {
            display: flex;
        }

        .show-mobile {
            display: none;
        }


        @media only screen and (max-width: 900px) {
            .performance-icon-container img {
                width: 35% !important;
            }

            .performance-icon-container div h4 {
                font-size: 10px !important;
            }

            .performance-icon-container div p {
                font-size: 13px !important;
            }

            .fs-tablet{
                font-size: 8px !important;
            }

            .fs-tablet2{
                font-size: 12px !important;
            }
        }

        @media only screen and (max-width: 600px) {
            .font-title-size {
                font-size: 20px !important;
            }

            .font-description-size {
                font-size: 8px !important;
            }

            .fs-12-mobile {
                font-size: 12px !important;
            }

            .fs-10-mobile {
                font-size: 10px !important;
            }

            .fs-8-mobile {
                font-size: 8px !important;
            }

            .honda-sensing-container img {
                width: 44vw !important;
            }

            .safety-container>div {
                width: 92% !important;
            }

            .honda-sensing-container {
                padding-right: 2px !important;
            }

            .show-desktop {
                display: none !important;
            }

            .show-mobile {
                display: block !important;
            }
        }


        /* <<<<<<< HEAD
                                                                                                                                                                                                                                                                                                    .typer-custom {width:100%; min-height: calc(100vh - 70px - 148px); background: #02070d; margin-top:70px; color:#8A8C8F; overflow-x: hidden;}
                                                                                                                                                                                                                                                                                                ======= */
        .typer-custom {
            width: 100%;
            min-height: calc(100vh - 70px - 148px);
            background: #ffffff;
            margin-top: 70px;
            color: #5E6063;
            overflow-x: hidden;
        }

        /* .typer-custom {width:100%; min-height: calc(100vh - 70px - 148px); background: #02070d; margin-top:70px; color:#8A8C8F; overflow-x: hidden;} */
        /* >>>>>>> 14e2cd26d45bcdc5b9d87bc8c51f4fd550633c53 */

        .full-width-info {
            font-size: 1rem;
            color: #5E6063;
            padding: 0px;
            text-align: center;
        }

        /* .full-width-info { font-size: 1rem; color:#8A8C8F; padding:0px; text-align: center;} */
        .full-width-info>div.negative-margin-bottom {
            margin: auto auto -125px auto;
        }

        .full-width-info>div {
            width: 100%;
            max-width: 650px;
            margin: auto;
            line-height: 1.56em;
        }

        .full-width-info .maintitle {
            color: #000000;
            font-size: 1.65rem;
            margin: .8rem auto;
            font-weight: 500;
        }

        /* .full-width-info .maintitle {color:#fff; font-size: 1.65rem; margin: .8rem auto; font-weight: 500;} */
        .full-width-info .pretitle {
            color: #000000;
        }

        /* .full-width-info .pretitle {color:#fff;} */

        .usp-flex {
            display: flex;
            flex-flow: row nowrap;
            padding: 50px 0 80px 0;
        }

        .usp-flex>div {
            width: 50%;
            text-align: center;
            border-left: 1px solid rgba(255, 255, 255, .2);
        }

        .usp-flex>div:first-of-type {
            border-left: 0;
        }

        .usp-flex li {
            font-size: 1rem;
            letter-spacing: 2.5px;
            text-align: center;
        }

        .usp-flex li:first-of-type {
            font-size: 1.63rem;
            margin-bottom: .5rem;
            color: #000000;
        }

        /* .usp-flex li:first-of-type { font-size: 1.63rem;  margin-bottom:.5rem; color:#fff;} */

        /* <<<<<<< HEAD
                                                                                                                                                                                                                                                                                                    .usp-flex-3 {flex-flow: row nowrap; padding: 50px 0 80px 0; width:100%; max-width: 1200px; margin:auto; display:flex; color:#8A8C8F; font-size:.8rem;}
                                                                                                                                                                                                                                                                                                    .usp-flex-3>div {width:50%; margin-left:40px; border-bottom:1px solid #ff1919; padding:30px 20px; line-height: 1.56em; font-size: .88rem; background-color: #0B0F15;}
                                                                                                                                                                                                                                                                                                ======= */
        .usp-flex-3 {
            flex-flow: row nowrap;
            padding: 50px 0 80px 0;
            width: 100%;
            max-width: 1200px;
            margin: auto;
            display: flex;
            color: ##5E6063;
            font-size: .8rem;
        }

        /* .usp-flex-3 {flex-flow: row nowrap; padding: 50px 0 80px 0; width:100%; max-width: 1200px; margin:auto; display:flex; color:#8A8C8F; font-size:.8rem;} */
        .usp-flex-3>div {
            width: 50%;
            margin-left: 40px;
            text-align: center;
            padding: 30px 20px;
            line-height: 1.56em;
            font-size: .88rem;
        }

        /* .usp-flex-3>div {width:50%; margin-left:40px; border-bottom:1px solid #ff1919; padding:30px 20px; line-height: 1.56em; font-size: .88rem; background-color: #0B0F15;} */
        /* >>>>>>> 14e2cd26d45bcdc5b9d87bc8c51f4fd550633c53 */
        .usp-flex-3>div:first-of-type {
            margin-left: 0;
        }

        .usp-flex-3 li:first-of-type {
            color: #000000;
            font-size: 1.13rem;
            font-weight: 500;
            margin-bottom: 1em;
        }

        /* .usp-flex-3 li:first-of-type { color:#fff; font-size: 1.13rem; font-weight: 500; margin-bottom:1em;} */

        .full-width-info div.interior-flex {
            display: grid;
            width: 100%;
            max-width: unset;
            margin-top: 50px;
            margin-bottom: 100px;
            grid-template-columns: 63% auto;
            grid-template-rows: 50% 50%;
            grid-gap: 0px;
        }

        .full-width-info>div.interior-flex img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .interior-flex>div {
            align-content: center;
        }

        /* .interior-flex>div {background-color: rgba(0,0,0,.7); align-content: center;} */
        .interior-flex>div:nth-of-type(1) {
            grid-row: 1 / span 2;
            grid-column: 1 / span 2;
            object-fit: cover;
            height: 100%;
        }

        .interior-flex>div:nth-of-type(2) {
            display: grid;
            grid-row: 1;
            grid-column: 2;
            padding: 20px;
            padding-left: 70px;
        }

        .interior-flex>div:nth-of-type(3) {
            display: grid;
            grid-row: 2;
            grid-column: 2;
            padding: 20px;
            padding-left: 70px;
            /*background: rgba(230,236,255,0.1);*/
        }


        .interior-flex p {
            text-align: left !important;
            margin: unset !important;
        }

        .interior-flex p:first-of-type {
            align-content: flex-end;
        }

        .interior-flex .maintitle {
            font-size: 1.13rem;
        }

        .interior-flex .description {
            font-size: .88rem;
            max-width: 350px;
            line-height: 1.5em;
            padding-top: 1em;
        }


        /* OVERIDERS */

        /* .model-selection-container .car-item {margin-top:-50px;} */

        .typer-custom .spec-container .tab-slider-nav {
            border-bottom-color: rgba(255, 255, 255, .2);
        }

        /* .typer-custom .spec-container .tab-slider-tabs {background-color: unset;} */

        .typer-custom .model-selection-container.half-bg {
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 65%, #e9e9e9 35%, #e9e9e9 100%)
        }

        /* .typer-custom .shopping-tools a {border:0;} */

        /* .typer-custom .model-service-badge {
                                display: none;
                            } */

        /* .typer-custom .shopping-tools a {color:rgba(255,255,255,.75); border-left:1px solid rgba(255,255,255,.2); width:20%;}
                                                                                                                                                                                                                                                                                                    .typer-custom .shopping-tools a:first-of-type {border-left:0;}
                                                                                                                                                                                                                                                                                                    .typer-custom .shopping-tools a:hover {color: #ff1919;}
                                                                                                                                                                                                                                                                                                    .typer-custom .shopping-tools img {padding:10px;}
                                                                                                                                                                                                                                                                                                    .typer-custom .shopping-tools .st-text {min-height: unset;} */

        .typer-custom h2 {
            color: #282A2F;
        }

        .typer-custom .hero-container .car-model,
        .typer-custom .hero-container .hero-content-area {
            max-width: unset;
            width: 100%;
        }

        .typer-custom .hero-container .herocopyholder-1 {
            position: absolute;
            top: 85%;
            left: 0;
            width: 100%;
        }

        .typer-custom .hero-container .m-title {
            max-width: 700px;
            font-weight: 500;
            color: #000;
            font-size: 2.13rem;
            letter-spacing: .0em;
            margin: auto;
        }

        .typer-custom .hero-container .intro-title {
            max-width: 700px;
            margin: 1.5rem auto;
        }


        .typer-custom .full-width-info>img {
            width: 100%
        }

        #gallery * {
            border-color: #ffffff;
        }

        /* #gallery * {border-color:#000;} */
        .owl-theme .owl-dots .owl-dot span,
        .owl-dot span {
            border-color: #bebebe !important;
        }

        .typer-custom .hero-container {
            position: relative;
        }

        .typer-custom .hero-container .model-name {
            position: absolute;
            top: 30px;
            left: 50%;
        }

        .typer-custom .hero-container .model-name img {
            opacity: 1;
            max-width: 500px;
            z-index: 2;
            transform: translateX(-60%);
        }

        /* .typer-custom .model-selection-container .car-item .car-model {display: unset;}
                                                                                                                                                                                                                                                                                                    .typer-custom .model-selection-container .car-item .car-model-grey {display: none;} */
        .typer-custom .happening-card {
            border: 0;
        }

        .typer-custom .cta {
            margin-top: 30px;
        }

        /* .typer-custom .cta {color:#ddd; margin-top:30px;} */

        .typer-custom a.prime-cta-white {
            border: 0;
        }

        html {
            background-color: #02070d;
        }

        #mainstage section.model-landing-hero {
            padding-top: 70px;
        }

        .note-container {
            border-color: #d5d5d5;
        }

        /* .note-container .note-title {color: #fff;} */
        /* .note-container .expand-content li {color:#cacaca;} */

        @media only screen and (max-width:1000px) {
            #performance {
                margin-top: 100px;
            }
        }

        @media only screen and (min-width: 769px) {
            a.prime-cta-black {
                width: 261px;
                height: 56px;
            }
        }

        @media only screen and (max-width: 768px) {
            a.prime-cta-black {
                height: 56px;
                width: 261px;
            }
        }

        @media only screen and (max-width:768px) {
            .typer-custom .hero-container .herocopyholder-1 {
                position: relative;
            }

            /* hero image */
            .typer-custom .hero-container .car-model,
            img.mobile2x {
                margin-left: 50%;
                margin-top: 10%;
                transform: translateX(-50%);
            }

            /* .typer-custom .hero-container .car-model, img.mobile2x {width:200%; margin-left:50%; transform: translateX(-50%);} */
            img.mobile2x {
                width: 165% !important;
            }

            .usp-flex-3 {
                flex-flow: column;
                padding: 20px 0;
            }

            .usp-flex-3>div {
                width: calc(100% - 40px);
                padding: 50px;
                margin: 20px !important;
            }

            .usp-flex {
                flex-flow: wrap;
                margin-top: 20px;
            }

            .usp-flex>div {
                width: 48%;
                padding: 20px;
                margin-bottom: 50px;
            }

            .usp-flex>div:nth-child(2n-1) {
                border-left: 0;
            }

            .full-width-info div.interior-flex {
                grid-template-columns: 100%;
                grid-template-rows: auto;
                align-content: end;
            }

            .full-width-info div.interior-flex>div {
                flex-flow: wrap;
                width: calc(100% - 40px);
                margin: 0 20px;
                padding: 30px;
                grid-column: 1;
            }

            .full-width-info div.interior-flex>div:nth-of-type(1) {
                padding: 0;
                object-fit: contain;
            }

            .full-width-info div.interior-flex>div:nth-of-type(2) {
                grid-row: 2;
                bottom: 0;
            }

            .full-width-info div.interior-flex>div:nth-of-type(3) {
                grid-row: 3
            }

            .full-width-info .maintitle {
                padding: 0 20px;
                font-size: 1.14rem;
            }

            .full-width-info .pretitle {
                font-size: .88rem;
            }

            #exterior .heroimg {
                margin-top: 25%;
            }

            /* .typer-custom .shopping-tools a {width: 50%;padding:20px;font-size: 12px;}
                                                                                                                                                                                                                                                                                                        .typer-custom .shopping-tools a:nth-of-type(3) {border-left:0;}
                                                                                                                                                                                                                                                                                                        .typer-custom .shopping-tools a:nth-of-type(3),
                                                                                                                                                                                                                                                                                                        .typer-custom .shopping-tools a:nth-of-type(4) {border-top:1px solid rgba(255,255,255,.2);} */

            .spec-container .tab-slider-nav {
                border-bottom: 1px solid rgba(255, 255, 255, .2)
            }

            .spec-container .tab-slider-trigger.active {
                color: #e01327;
                border-bottom: 3px solid #e01327;
                background-color: unset;
            }

            #interior {
                margin-top: 50px;
            }

            .full-width-info p.maintitle {
                padding: 0;
            }

            /* <<<<<<< HEAD
                                                                                                                                                                                                                                                                                                        ======= */

            .negative-margin-bottom {
                margin-bottom: 0 !important;
            }

            .custom-for-mobile-v2 {
                display: block !important;
            }

            .custom-for-desktop-v2 {
                display: none !important;
            }

            .black-image {
                background: url(/img/model/type-r/00_Landing/01_Performance/black-image.png);
                background-repeat: no-repeat;
                background-size: cover;
                width: 100% !important;
                margin-left: 3% !important;
            }

            .custom-m-v3 {
                margin-left: 4% !important;
            }

            .custom-m-v4 {
                margin-left: 4% !important;
                margin-right: 4% !important;
            }

            .to-resize-v2 {
                width: 100% !important;
                margin: 0 !important;
            }

            /* .custom-ml {
                                                                                                                                                                                                                                                                                                            margin-left: 0 !important;
                                                                                                                                                                                                                                                                                                        }

                                                                                                                                                                                                                                                                                                        .custom-ml-v2 {
                                                                                                                                                                                                                                                                                                            margin-left: 0 !important;
                                                                                                                                                                                                                                                                                                            margin-right: 0 !important;
                                                                                                                                                                                                                                                                                                        } */

            .log-r-container {
                flex-direction: column
            }

            .log-r-container>div {
                padding: 15px !important;
            }

            .mb-30 {
                margin-bottom: 30% !important;
            }
        }

        /* .usp-img{
                                                                                                                                                                                                                                                                                                        width: 100%
                                                                                                                                                                                                                                                                                                    >>>>>>> 14e2cd26d45bcdc5b9d87bc8c51f4fd550633c53
                                                                                                                                                                                                                                                                                                    } */

        @media only screen and (max-width:425px) {

            .custom-for-desktop {
                display: none !important;
            }

            .custom-for-mobile {
                display: block !important;
            }

            .custom-for-mobile-flex {
                display: flex !important;
            }

            .to-resize {
                width: 100% !important;
                margin: 0 !important;
            }

            .custom-m-v5 {
                margin-left: -7px !important;
                margin-right: 4%;
            }

        }

        @media only screen and (width: 820px) {
            .td-padding-t {
                padding-top: 0px !important;
                height: unset !important;
            }
        }

        @media only screen and (max-width: 1100px) and (min-width: 769px) {
            .fs-10 {
                font-size: 10px !important;
            }

            .fs-12 {
                font-size: 12px !important;
            }

            .td-padding-t {
                padding-top: 0px !important;
                height: unset !important;
            }

            .table-div {
                padding-left: 0px !important;
                padding-top: 36px !important;
                justify-content: end;
            }

        }

        .table-div {
            display: flex !important;
            align-items: flex-start;
            justify-content: center;
            padding-left: 26px !important;
            padding-top: 60px !important;
        }

        .td-padding-t {
            padding-top: 76px;
        }

        .custom-for-desktop {
            display: block;
        }

        .custom-for-mobile {
            display: none;
        }

        .custom-for-desktop-v2 {
            display: block;
        }

        .custom-for-mobile-v2 {
            display: none;
        }

        .custom-for-mobile-flex {
            display: none;
        }

        .floating-paragraph {
            transform: translateY(150px);
            opacity: 0;
            transition: 1s all ease;
        }

        .floating-paragraph.active {
            transform: translateY(0);
            opacity: 1;
        }

        .floating-paragraph-reverse {
            transform: translateY(-150px);
            opacity: 0;
            transition: 1s all ease;
        }

        .floating-paragraph-reverse.active {
            transform: translateY(0);
            opacity: 1;
        }

        .custom-ml {
            margin-left: 3% !important;
        }

        .custom-ml-v2 {
            margin-left: 3% !important;
            margin-right: 3% !important;
        }

        .log-r-container {
            margin-bottom: 15%;
            display: flex;
        }

        .log-r-container>div {
            padding: 35px;
        }

        .mb-30 {
            margin-bottom: 0;
        }
    </style>


@stop
