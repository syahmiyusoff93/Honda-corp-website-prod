@php
$APIPATH = config('global.APIPATH');
$honda_api_context = config('global.APICONTEXT');

$data = file_get_contents($APIPATH.'model_'.$model_slug.'_page_landing.json', false, $honda_api_context);
$data = json_decode($data);
$story = $data->payload;

if(isset($story->hero)){
        foreach($story->hero as $item){
            $_hero[$item->type] = $item->data;
        }
    }
@endphp

@extends('layouts.modelinner')

@section('page-title')
   Honda {{$model_info->name}}
@stop

@section('inner-content')

<script>
    $(document).ready(function(){
        console.log($('#hero-banner').outerHeight())

        let menuList = document.querySelector('#modelmenu ul');

        let accessoriesListItem = document.querySelector('.sai-navitem-accessories');
        if (accessoriesListItem) {
            menuList.removeChild(accessoriesListItem);
        }

        let specificationsListItem = document.querySelector('.sai-navitem-spec');
        if (specificationsListItem) {
            specificationsListItem.querySelector('a').textContent = 'Specifications and Price';
        }

        let mobileMenuList = document.querySelector('.for-mobile .menu-toggle ul');

        let mobileAccessoriesListItem = mobileMenuList.querySelector('.sai-navitem-accessories');
        if (mobileAccessoriesListItem) {
            mobileMenuList.removeChild(mobileAccessoriesListItem);
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
                <div class="model-name"><img src="/img/model/type-r/01_Logo/Logo_Civic-TypeR-black.png" alt=""></div>
                <img class="car-model" src="{{asset(@$_hero['hero_img'])}}" alt="">
                <div class="herocopyholder-1">
                    <div class="floating-paragraph-reverse">
                        <div class="m-title black upper new-font">{!!$_hero['hero_title']!!}</div>
                        <div class="intro-title" style="display:block;padding: 0 47px;">{!! $_hero['hero_copy'] !!}</div>
                    </div>

                    @if(@$_hero['hero_cta1']->label)
                        <a href="{{$_hero['hero_cta1']->link}}" class="prime-cta-black">
                            <span>{{$_hero['hero_cta1']->label}}</span>
                            <div class="overlay"></div>
                        </a>
                    @endif
                </div>

                {{-- @if(@$_hero['hero_cta1']->label)
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

    <section class="full-width-info custom-ml-v2" style="margin-top: 3%;">
        <img src="/img/model/type-r/00_Landing/03_Exterior/006.png" alt="">
    </section>

    <section class="divider for-desktop" style="height:200px;"></section>
    <section class="divider for-mobile" style="height:0;"></section>

    {{-- <section id="performance" class="container full-width-info">
        <div class="pretitle r-red">PERFORMANCE</div>
        <div class="maintitle">From Nürburgring, to your neighborhood</div>
        <div>Civic Type R promises heart-racing speed and agility, wherever you go.</div>
    </section> --}}

    {{-- <section class="full-width-info">
        <img class="mobile2x" src="/img/model/type-r/00_Landing/01_Performance/group-136.png" alt="">
        <img class="mobile2x" src="/img/model/type-r/00_Landing/01_Performance/Civic-TypeR_Performance.jpg" alt=""> comment this
    </section> --}}

    <section id="performance" class="full-width-info">
        <div class="negative-margin-bottom floating-paragraph">
            <div class="pretitle">PERFORMANCE</div>
            <div class="maintitle new-font">AD<span class="r-red">R</span>ENALINE EXHILA<span class="r-red">R</span>ATION</div>
            <div>Feel every sense come alive. Civic Type R unleashes a 2.0L VTEC Turbo Engine that grips you and never lets you go. Match your driving style to 4 Drive Modes including +R, Sport, Comfort and Individual.</div>
            {{-- <div class="maintitle"><span class="r-red">From</span> Nürburgring, to your neighborhood</div> --}}
            {{-- <div>Civic Type R promises heart-racing speed and agility, wherever you go.</div> --}}
        </div>

        <div class="interior-flex interior-image-layout">
            <div class="to-resize-v2 custom-ml custom-m-v3">
                <img class="custom-for-desktop-v2" src="/img/model/type-r/00_Landing/01_Performance/group-136.png" alt="">
                <img class="custom-for-mobile-v2" src="/img/model/type-r/00_Landing/01_Performance/group-135.png" alt="">
            </div>
            <div
                class=""
                style="
                color: white;
                display: flex;
                justify-content: end;
                align-items: center;
                flex-direction: column;
                padding: 0;"
            >
                <p class="maintitle fs-12" style="color: white;">2.0L VTEC TURBOCHARGED ENGINE</p>
                <p class="description fs-10"><span class="r-red">Effortless</span> acceleration. <span class="r-red">Thrilling</span> top speed.</p>
            </div>
            <div
                class="table-div black-image"
            >
                <table style="text-align: center; color: white; width: 88%;">
                    <tr>
                        <td class="new-font"><span class="r-red">319</span>PS</td>
                        <td class="new-font"><span class="r-red">420</span>Nm</td>
                    </tr>
                    <tr>
                        <td class=""><span style="color: #5E6063" class="fs-12">HORSEPOWER</span></td>
                        <td class=""><span style="color: #5E6063" class="fs-12">TORQUE</span></td>
                    </tr>
                    <tr>
                        <td class="new-font td-padding-t "><span class="r-red">5.5</span> Seconds</td>
                        <td class="new-font td-padding-t "><span class="r-red">272</span> Km/h</td>
                    </tr>
                    <tr>
                        <td><span style="color: #5E6063" class="fs-12 ">0-100KM/H</span></td>
                        <td><span style="color: #5E6063" class="fs-12 ">MAXIMUM SPEED</span></td>
                    </tr>
                </table>
                {{-- <div>
                    <div>
                        <span class="r-red">319</span>PS
                        <p>HORSEPOWER</p>
                    </div>
                    <div>
                        <span class="r-red">420</span>NM
                        <p>TORQUE</p>
                    </div>
                </div>
                <div>
                    <div>
                        <p><span class="r-red">5.5</span> Seconds</p>
                        <p>0-100KM/H</p>
                    </div>
                    <div>
                        <p><span class="r-red">272</span> Km/h</p>
                        <p>MAXIMUM SPEED</p>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    {{-- <section class="container full-width-info floating-paragraph">
        <div class="maintitle"><span class="r-red">Feel</span> every sense come alive. Civic Type R unleashes a 2.0L VTEC Turbo Engine that grips you and never lets you go.</div> --}}
        {{-- <div class="maintitle">2.0L VTEC TURBOCHARGED ENGINE</div> --}}
        {{-- <div style="color: #5E6063; padding-bottom: 50px;">Choose from 4 Drive Modes to suit your driving style.</div> --}}
        {{-- <div><span class="r-red">Effortless</span> acceleration. <span class="r-red">Thrilling</span> top speed.</div> --}}
    {{-- </section> --}}

    {{-- <section class="container usp-flex">
        <div>
            <ul>
                <li><span class="r-red">319</span>PS</li>
                <li><span class="r-red">310</span>PS</li> comment this part
                <li>HORSEPOWER</li>
            </ul>
        </div>

        <div>
            <ul>
                <li><span class="r-red">420</span>Nm</li>
                <li><span class="r-red">400</span>Nm</li> comment this part
                <li>TORQUE</li>
            </ul>
        </div>

        <div>
            <ul>
                <li><span class="r-red">5.5</span> Seconds</li>
                <li><span class="r-red">5.8</span> Seconds</li> comment this part
                <li>0-100KM/H</li>
            </ul>
        </div>

        <div>
            <ul>
                <li><span class="r-red">272</span> Km/h</li>
                <li>MAXIMUM SPEED</li>
            </ul>
        </div>
    </section> --}}

    <section class="full-width-info custom-ml-v2">
        <div style="margin-bottom: 5%;">
            <div class="maintitle new-font"><span class="r-red">+R</span> Meter Display</div>
            {{-- <div class="maintitle new-font"><span class="r-red">+R</span> MODE</div> --}}
            <div>Push Civic Type R to racing extremes.</div>
            {{-- <div>Three finely-tuned driving modes for the circuit, or city.</div> --}}
        </div>

        <img src="/img/model/type-r/00_Landing/02_Interior/036.png" alt="">
    </section>

    <section class="usp-flex-3">
        {{-- <div>
            <ul>
                <li class="r-red">+R MODE</li>
                <li>Flip to "<strong class="r-red">+R</strong>" for ultimate control in the circuit.</li>
            </ul>
        </div> --}}

        {{-- <div>

            <ul>
                <li class="r-red new-font">SPORT MODE</li>
                <li>Engage for high-performance driving.</li> --}}
                {{-- <li>Select "<strong class="r-red">Sport</strong>" for a more powerful and direct driving experience. </li> --}}
            {{-- </ul>

        </div> --}}

        {{-- <div>

            <ul>
                <li class="r-red new-font">COMFORT MODE</li>
                <li>Tuned for a more relaxed, everyday drive.</li> --}}
                {{-- <li>Choose "<strong class="r-red">Comfort</strong>" for an easy, smooth drive around the city.</li> --}}
            {{-- </ul>
        </div> --}}

        {{-- <div>

            <ul>
                <li class="r-red new-font">INDIVIDUAL MODE</li>
                <li>Choose from 486 customisable combinations.</li>
            </ul>
        </div> --}}
    </section>



    <section id="interior" class="full-width-info">
        <div class="negative-margin-bottom floating-paragraph">
            <div class="pretitle">INTERIOR</div>
            <div class="maintitle new-font">ADDICTIVE DRIVE</div>
            {{-- <div class="maintitle new-font"><span class="r-red">ADDICTIVE</span> DRIVE</div> --}}
            {{-- <div class="maintitle"><span class="r-red">Comfortable</span> and <span class="r-red">in control</span></div> --}}
            <div>Iconic red interior. Body-hugging sport seats. Performance-focused cockpit. Enter a zone where everything is pushed to the max.</div>
            {{-- <div>Iconic red interior. Body-hugging bucket seats. Performance-focused cockpit. Enter a zone where everything is pushed to the max.</div> --}}
            {{-- <div>From seat to steering, everything is designed for complete driver satisfaction. Even at top speed.</div> --}}
        </div>

        <div class="interior-flex">
            <div>
                {{-- <img class="for-desktop" src="/img/model/type-r/00_Landing/02_Interior/group-137.png" alt=""> --}}
                {{-- <img class="for-mobile" src="/img/model/type-r/00_Landing/02_Interior/INTERIOR_3.png" alt=""> --}}
            </div>
            {{-- <div>
                <p class="maintitle"><span class="r-red">CHAMPIONSHIP</span> RIDE AND HANDLING</p>
                <p class="description">Brace yourself for an agile, responsive ride. At top speed.</p>
            </div>
            <div>
                <p class="maintitle"><span class="r-red">TECH</span> CENTER CONSOLE</p>
                <p class="description">Alloy shift knob. Red illumination. Smartphone storage. Everything the tech-savvy racer needs.</p>
            </div> --}}
        </div>
    </section>

    <div class="full-width-info custom-ml" style="margin-bottom: 15%;">
        <img class="custom-for-desktop" src="/img/model/type-r/00_Landing/02_Interior/group-137.png" alt="">

        <div class="mobile-gallery custom-for-mobile">
            <div class="gallery-container-bottom">
                <ul class="owl-carousel owl-theme">
                    <li>
                        <a class="thumbnail gallery-img" href="/img/model/type-r/00_Landing/02_Interior/030.png">
                            <img class="img lazyload--" src="/img/model/type-r/00_Landing/02_Interior/030.png" alt="" style="background-image:url(/img/model/type-r/00_Landing/02_Interior/030.png);">
                        </a>
                    </li>
                    <li>
                        <a class="thumbnail gallery-img" href="/img/model/type-r/00_Landing/02_Interior/031.png">
                            <img class="img lazyload--" src="/img/model/type-r/00_Landing/02_Interior/031.png" alt="" style="background-image:url(/img/model/type-r/00_Landing/02_Interior/031.png);">
                        </a>
                    </li>
                    <li>
                        <a class="thumbnail gallery-img" href="/img/model/type-r/00_Landing/02_Interior/034.png">
                            <img class="img lazyload--" src="/img/model/type-r/00_Landing/02_Interior/034.png" alt="" style="background-image:url(/img/model/type-r/00_Landing/02_Interior/034.png);">
                        </a>
                    </li>
                    <li>
                        <a class="thumbnail gallery-img" href="/img/model/type-r/00_Landing/02_Interior/053.png">
                            <img class="img lazyload--" src="/img/model/type-r/00_Landing/02_Interior/053.png" alt="" style="background-image:url(/img/model/type-r/00_Landing/02_Interior/053.png);">
                        </a>
                    </li>
                    <li>
                        <a class="thumbnail gallery-img" href="/img/model/type-r/00_Landing/02_Interior/056.png">
                            <img class="img lazyload--" src="/img/model/type-r/00_Landing/02_Interior/056.png" alt="" style="background-image:url(/img/model/type-r/00_Landing/02_Interior/056.png);">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <section id="exterior" class="full-width-info floating-paragraph">
        <div>
        {{-- <div style="position:absolute; z-index:2; left:50%; transform:translateX(-50%);"> --}}
            <div class="pretitle">EXTERIOR</div>
            <div class="maintitle new-font">RACE INSPIRED</div>
            <div>Powerfully distinctive. Aerodynamically athletic. Civic Type R is precision crafted to stop you in your tracks.</div>
        </div>  
        {{-- <img class="heroimg mobile2x" src="/img/model/type-r/00_Landing/03_Exterior/group-138.png" alt=""> --}}
    </section>

    <div class="full-width-info custom-ml" style="margin-bottom: -5%;">
        <img class="custom-for-desktop" src="/img/model/type-r/00_Landing/03_Exterior/group-138.png" alt="">
        <img class="custom-for-mobile" src="/img/model/type-r/00_Landing/03_Exterior/group-134.png" alt="">
    </div>

    <section class="container full-width-info floating-paragraph" style="margin-top: 15%;
    margin-bottom: 10%;">
        <div class="pretitle">LOG R</div>
        <div class="maintitle new-font">TIME ATTACK</div>
        <div>Sharpen your skills. Shave off milliseconds. Log R enables you to track your performance, lap after lap.</div>
    </section>

    {{-- <div class="full-width-info" style="margin-bottom: 5%;">
        <img class="" src="/img/model/type-r/00_Landing/01_Performance/log-r.png" alt="">
        <img class="" src="/img/model/type-r/00_Landing/01_Performance/040.png" alt="">
    </div> --}}

    <div class="log-r-container" style="margin-bottom: 10%;">
        <div>
            <img class="" src="/img/model/type-r/00_Landing/01_Performance/040.png" alt="" style="width: 100%;">
            <section class="container full-width-info floating-paragraph-reverse" style="margin-top: 4%">
                <span class="r-red" style="font-size: 1.13rem; font-weight: 500; margin-bottom:1em;">PERFORMANCE MONITOR FUNCTION</span>
                <div style="font-size: 1.13rem; font-weight: 500; margin-bottom:1em;">View real-time information on your car's performance including tyre friction and force on your Advanced Display Audio.</div>
            </section>
        </div>
        <div>
            <img class="" src="/img/model/type-r/00_Landing/01_Performance/log-r.png" alt="" style="width: 100%;">
            <section class="container full-width-info floating-paragraph-reverse mb-30" style="margin-top: 4%;">
                <span class="r-red" style="font-size: 1.13rem; font-weight: 500; margin-bottom:1em;">AUTO SCORE FUNCTION</span>
                <div style="font-size: 1.13rem; font-weight: 500; margin-bottom:1em;">An algorithm generates a score for smooth driving based on your acceleration, braking and steering.</div>
            </section>
        </div>
    </div>

    {{-- <section class="container full-width-info floating-paragraph-reverse" style="margin-bottom: 15%">
        <span class="r-red" style="font-size: 1.13rem; font-weight: 500; margin-bottom:1em;">AUTO SCORE FUNCTION</span>
        <div style="font-size: 1.13rem; font-weight: 500; margin-bottom:1em;">An algorithm generates a score for smooth driving based on your acceleration, braking and steering.</div>
    </section> --}}

    <section class="container full-width-info" style="margin-bottom: 8%">
        <div class="negative-margin-bottom floating-paragraph">
            <div class="maintitle new-font">TECH FINESSE</div>
            <div>Expect nothing less than Honda's most advanced technology, <br> new to Civic Type R.</div>
        </div>
    </section>

    <div class="full-width-info custom-for-desktop custom-ml" style="margin-top: -20%;">
        <img class="" src="/img/model/type-r/00_Landing/03_Exterior/group-139.png" alt="">
    </div>

    <div class="full-width-info custom-for-mobile custom-m-v5">
        <img class="" src="/img/model/type-r/00_Landing/03_Exterior/group-141.png" alt="">
    </div>

    {{-- <div class="full-width-info custom-for-mobile-flex">
        <div>
          <img
            src="/img/model/type-r/00_Landing/03_Exterior/group-132.png"
            alt=""
            style="width: 100%"
          />
        </div>
        <div style="margin-top: 16px; margin-left: 4px">
          <a href="https://www.honda.com.my/technology/honda-sensing" target="_blank">
            <div style="text-align: left; margin-bottom: 9px">
              <img
                src="/img/model/type-r/00_Landing/03_Exterior/group-127.png"
                alt=""
                style="width: 100px"
              />
              <p style="font-size: 10px; line-height: 10px; margin: 0">
                Drive confidently with the assistance of up to 8 Honda SENSING
                features.
              </p>
            </div>
          </a>
          <a href="https://www.honda.com.my/technology/honda-connect" target="_blank">
            <div style="text-align: left">
              <img
                src="/img/model/type-r/00_Landing/03_Exterior/group-128.png"
                alt=""
                style="width: 100px"
              />
              <p style="font-size: 10px; line-height: 10px; margin-top: 0">
                Unlock a new world of safety, security and convenience, all from your
                smartphone.
              </p>
            </div>
          </a>
        </div>
    </div> --}}

    {{-- <section class="container full-width-info floating-paragraph" style="margin-top: 10%;">
        <div class="maintitle"><span class="r-red">AERODYNAMICS</span> THAT TAKE YOUR BREATH AWAY</div>
        <div>Every curve and line, designed for high-speed handling and stability.</div>
    </section> --}}

    <section id="gallery" class="section-gap-inner gallery" >
        <h2>GALLERY</h2>
        @include('components.model-gallery-wdata')
    </section>
      

    {{-- <section class="color-container section-gap-inner" id="colour-accessories"> --}}
        {{-- <h2>Colours &amp; accessories</h2> --}}
        {{-- <h2>ACCESSORIES</h2>
        @include('components.model-color-acc')
    </section> --}}


    {{-- <section class="spec-container section-gap-inner" id="spec-price">

            <h2>SPECIFICATIONS</h2>
            <div class="">
                <div class="tab-slider-nav">
                    <ul class="tab-slider-tabs body-copy">
                        <li class="tab-slider-trigger active" rel="tab--" style="color: #ffffff; background-color: #1e1e25;">2023 Honda Type R</li>
                    </ul>
                </div>
            </div>
            <div class="btn-container">
                <a href="{{url('model/type-r/spec')}}" class="prime-cta-white">
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

    <section class="shopping-tools body-copy grey container section-gap" id="shopping-tools" style="padding-top: 40px; margin-top: -40px;">
        @include('components.shopping-tools')
        <div class="clearfix"></div>
    </section>

    <div class="stage-contained">
        <div class="note-container">
            <div class="note-title more">Disclaimers</div>
            <div class=" expand-content" style="display: none;">
                <ul>
                    {{-- <li>Left-hand drive model shown.</li> --}}
                    <li>Advanced Display Audio can be change based on the listed languages available.</li>
                    <li>Actual model, features and specifications may vary in detail from image shown. Subject to change without prior notice.</li>
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

    .new-font{
        font-family: 'Libre Bodoni', serif !important;
    }
    /* <<<<<<< HEAD
    .typer-custom {width:100%; min-height: calc(100vh - 70px - 148px); background: #02070d; margin-top:70px; color:#8A8C8F; overflow-x: hidden;}
    ======= */
    .typer-custom {width:100%; min-height: calc(100vh - 70px - 148px); background: #ffffff; margin-top:70px; color:#5E6063; overflow-x: hidden;}
    /* .typer-custom {width:100%; min-height: calc(100vh - 70px - 148px); background: #02070d; margin-top:70px; color:#8A8C8F; overflow-x: hidden;} */
    /* >>>>>>> 14e2cd26d45bcdc5b9d87bc8c51f4fd550633c53 */

    .full-width-info { font-size: 1rem; color:#5E6063; padding:0px; text-align: center;}
    /* .full-width-info { font-size: 1rem; color:#8A8C8F; padding:0px; text-align: center;} */
    .full-width-info>div.negative-margin-bottom { margin:auto auto -125px auto;}
    .full-width-info>div { width:100%;max-width: 650px; margin:auto; line-height: 1.56em;}
    .full-width-info .maintitle {color:#000000; font-size: 1.65rem; margin: .8rem auto; font-weight: 500;}
    /* .full-width-info .maintitle {color:#fff; font-size: 1.65rem; margin: .8rem auto; font-weight: 500;} */
    .full-width-info .pretitle {color:#000000;}
    /* .full-width-info .pretitle {color:#fff;} */

    .usp-flex {display:flex; flex-flow: row nowrap; padding: 50px 0 80px 0;}
    .usp-flex>div {width:50%; text-align: center; border-left:1px solid rgba(255,255,255,.2);}
    .usp-flex>div:first-of-type {border-left:0;}
    .usp-flex li { font-size:1rem; letter-spacing: 2.5px; text-align: center;}
    .usp-flex li:first-of-type { font-size: 1.63rem;  margin-bottom:.5rem; color:#000000;}
    /* .usp-flex li:first-of-type { font-size: 1.63rem;  margin-bottom:.5rem; color:#fff;} */

    /* <<<<<<< HEAD
    .usp-flex-3 {flex-flow: row nowrap; padding: 50px 0 80px 0; width:100%; max-width: 1200px; margin:auto; display:flex; color:#8A8C8F; font-size:.8rem;}
    .usp-flex-3>div {width:50%; margin-left:40px; border-bottom:1px solid #ff1919; padding:30px 20px; line-height: 1.56em; font-size: .88rem; background-color: #0B0F15;}
    ======= */
    .usp-flex-3 {flex-flow: row nowrap; padding: 50px 0 80px 0; width:100%; max-width: 1200px; margin:auto; display:flex; color:##5E6063; font-size:.8rem;}
    /* .usp-flex-3 {flex-flow: row nowrap; padding: 50px 0 80px 0; width:100%; max-width: 1200px; margin:auto; display:flex; color:#8A8C8F; font-size:.8rem;} */
    .usp-flex-3>div {width:50%; margin-left:40px; text-align: center; padding:30px 20px; line-height: 1.56em; font-size: .88rem;}
    /* .usp-flex-3>div {width:50%; margin-left:40px; border-bottom:1px solid #ff1919; padding:30px 20px; line-height: 1.56em; font-size: .88rem; background-color: #0B0F15;} */
    /* >>>>>>> 14e2cd26d45bcdc5b9d87bc8c51f4fd550633c53 */
    .usp-flex-3>div:first-of-type {margin-left: 0;}
    .usp-flex-3 li:first-of-type { color:#000000; font-size: 1.13rem; font-weight: 500; margin-bottom:1em;}
    /* .usp-flex-3 li:first-of-type { color:#fff; font-size: 1.13rem; font-weight: 500; margin-bottom:1em;} */

    .full-width-info div.interior-flex {display:grid ; width: 100%; max-width: unset; margin-top:50px; margin-bottom:100px;
        grid-template-columns: 63% auto;
        grid-template-rows: 50% 50%;
        grid-gap: 0px;}

        .full-width-info>div.interior-flex img {width:100%; height: 100%; object-fit: cover;}
        .interior-flex>div {align-content: center;}
        /* .interior-flex>div {background-color: rgba(0,0,0,.7); align-content: center;} */
        .interior-flex>div:nth-of-type(1) { grid-row: 1 / span 2; grid-column: 1 / span 2;object-fit:cover;height: 100%;}
        .interior-flex>div:nth-of-type(2) {display:grid; grid-row: 1; grid-column: 2;padding:20px; padding-left:70px;}
        .interior-flex>div:nth-of-type(3){display:grid; grid-row: 2; grid-column: 2; padding:20px; padding-left:70px;/*background: rgba(230,236,255,0.1);*/}


        .interior-flex p {text-align: left !important; margin:unset !important;}
        .interior-flex p:first-of-type {align-content: flex-end;}

        .interior-flex .maintitle {font-size: 1.13rem;}
        .interior-flex .description {font-size: .88rem; max-width: 350px; line-height: 1.5em; padding-top:1em;}


    /* OVERIDERS */

    /* .model-selection-container .car-item {margin-top:-50px;} */

    .typer-custom .spec-container .tab-slider-nav {border-bottom-color: rgba(255,255,255,.2);}
    /* .typer-custom .spec-container .tab-slider-tabs {background-color: unset;} */

    .typer-custom .model-selection-container.half-bg{background: linear-gradient(to bottom,  rgba(0,0,0,0) 0%,  rgba(0,0,0,0) 65%,  #e9e9e9 35%,  #e9e9e9 100% )}

    /* .typer-custom .shopping-tools a {border:0;} */

    .typer-custom .model-service-badge {display: none;}

    /* .typer-custom .shopping-tools a {color:rgba(255,255,255,.75); border-left:1px solid rgba(255,255,255,.2); width:20%;}
    .typer-custom .shopping-tools a:first-of-type {border-left:0;}
    .typer-custom .shopping-tools a:hover {color: #ff1919;}
    .typer-custom .shopping-tools img {padding:10px;}
    .typer-custom .shopping-tools .st-text {min-height: unset;} */

    .typer-custom h2 {color:#282A2F;}

    .typer-custom .hero-container .car-model,
    .typer-custom .hero-container .hero-content-area {max-width: unset; width:100%;}

    .typer-custom .hero-container .herocopyholder-1 {position: absolute; top:85%; left:0; width:100%;}
    .typer-custom .hero-container .m-title {max-width: 700px; font-weight:500; color: #000; font-size: 2.13rem; letter-spacing: .0em; margin:auto;}
    .typer-custom .hero-container .intro-title {max-width: 700px; margin:1.5rem auto; }


    .typer-custom .full-width-info > img {width: 100%}

    #gallery * {border-color:#ffffff ;}
    /* #gallery * {border-color:#000;} */
    .owl-theme .owl-dots .owl-dot span, .owl-dot span {border-color:#bebebe !important;}

    .typer-custom .hero-container {position: relative;}
    .typer-custom .hero-container .model-name {position: absolute; top: 30px;  left:50%; }
    .typer-custom .hero-container .model-name img {opacity: 1; max-width: 500px; z-index: 2; transform: translateX(-60%);}

    /* .typer-custom .model-selection-container .car-item .car-model {display: unset;}
    .typer-custom .model-selection-container .car-item .car-model-grey {display: none;} */
    .typer-custom .happening-card {border:0;}
    .typer-custom .cta {margin-top:30px;}
    /* .typer-custom .cta {color:#ddd; margin-top:30px;} */

    .typer-custom a.prime-cta-white {border:0;}

    html{background-color: #02070d;}
    #mainstage section.model-landing-hero {padding-top: 70px;}

    .note-container {border-color:#d5d5d5;}
    /* .note-container .note-title {color: #fff;} */
    /* .note-container .expand-content li {color:#cacaca;} */

    @media only screen and (max-width:1000px){
        #performance {margin-top: 100px;}
    }

    @media only screen and (max-width:768px){
        .typer-custom .hero-container .herocopyholder-1 {position: relative;}
        /* hero image */
        .typer-custom .hero-container .car-model, img.mobile2x {margin-left:50%; margin-top:10%; transform: translateX(-50%);}
        /* .typer-custom .hero-container .car-model, img.mobile2x {width:200%; margin-left:50%; transform: translateX(-50%);} */
        img.mobile2x {width:165% !important; }
        .usp-flex-3 {flex-flow: column; padding: 20px 0;}
        .usp-flex-3 > div {width:calc(100% - 40px);padding: 50px; margin:20px !important;}

        .usp-flex {flex-flow: wrap;margin-top:20px;}
        .usp-flex > div {width:48%;  padding:20px; margin-bottom:50px;}
        .usp-flex > div:nth-child(2n-1) {border-left:0;}

        .full-width-info div.interior-flex {
            grid-template-columns: 100%;
            grid-template-rows: auto ;
            align-content: end;
        }
        .full-width-info div.interior-flex > div {flex-flow: wrap; width:calc(100% - 40px); margin: 0 20px; padding:30px; grid-column: 1; }

        .full-width-info div.interior-flex>div:nth-of-type(1) {padding:0; object-fit: contain;}
        .full-width-info div.interior-flex>div:nth-of-type(2) {grid-row: 2; bottom:0;}
        .full-width-info div.interior-flex>div:nth-of-type(3){ grid-row: 3 }

        .full-width-info .maintitle {padding:0 20px; font-size: 1.14rem;}
        .full-width-info .pretitle { font-size: .88rem;}

        #exterior .heroimg {margin-top:25%;}

        /* .typer-custom .shopping-tools a {width: 50%;padding:20px;font-size: 12px;}
        .typer-custom .shopping-tools a:nth-of-type(3) {border-left:0;}
        .typer-custom .shopping-tools a:nth-of-type(3),
        .typer-custom .shopping-tools a:nth-of-type(4) {border-top:1px solid rgba(255,255,255,.2);} */

        .spec-container .tab-slider-nav {border-bottom: 1px solid rgba(255,255,255,.2)}
        .spec-container .tab-slider-trigger.active { color: #e01327; border-bottom:3px solid #e01327;background-color: unset;}

        #interior {margin-top:50px;}
        .full-width-info p.maintitle {padding:0;}
        /* <<<<<<< HEAD
        ======= */

        .negative-margin-bottom{
            margin-bottom: 0 !important;
        }

        .custom-for-mobile-v2{
            display: block !important;
        }

        .custom-for-desktop-v2{
            display: none !important;
        }

        .black-image{
            background: url(/img/model/type-r/00_Landing/01_Performance/black-image.png);
            background-repeat: no-repeat;
            background-size: cover;
            width: 100% !important;
            margin-left: 3% !important;
        }
        .custom-m-v3{
            margin-left: 4% !important;
        }
        .custom-m-v4{
            margin-left: 4% !important;
            margin-right: 4% !important;
        }

        .to-resize-v2{
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

        .log-r-container{
            flex-direction: column
        }
        .log-r-container>div{
            padding: 15px !important;
        }

        .mb-30{
            margin-bottom: 30% !important;
        }
    }

    /* .usp-img{
        width: 100%
    >>>>>>> 14e2cd26d45bcdc5b9d87bc8c51f4fd550633c53
    } */

    @media only screen and (max-width:425px){

        .custom-for-desktop{
            display: none !important;
        }
        .custom-for-mobile{
            display: block !important;
        }

        .custom-for-mobile-flex{
            display: flex !important;
        }

        .to-resize{
            width: 100% !important;
            margin: 0 !important;
        }

        .custom-m-v5{
            margin-left: -7px !important;
            margin-right: 4%;
        }

    }

    @media only screen and (width: 820px){
        .td-padding-t{
            padding-top: 0px !important;
            height: unset !important;
        }
    }

    @media only screen and (max-width: 1100px) and  (min-width: 769px){
        .fs-10{
            font-size: 10px !important;
        }
        .fs-12{
            font-size: 12px !important;
        }

        .td-padding-t{
            padding-top: 0px !important;
            height: unset !important;
        }

        .table-div{
            padding-left: 0px !important;
            padding-top: 36px !important;
            justify-content: end;
        }

    }

    .table-div{
        display: flex !important;
        align-items: flex-start;
        justify-content: center;
        padding-left: 26px !important;
        padding-top: 60px !important;
    }

    .td-padding-t{
        padding-top: 76px;
    }

    .custom-for-desktop{
        display: block;
    }
    .custom-for-mobile{
        display: none;
    }

    .custom-for-desktop-v2{
        display: block;
    }

    .custom-for-mobile-v2{
        display: none;
    }

    .custom-for-mobile-flex{
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

    .log-r-container{
        margin-bottom: 15%;
        display: flex;
    }
    .log-r-container>div{
        padding: 35px;
    }

    .mb-30{
        margin-bottom: 0;
    }
</style>


@stop

