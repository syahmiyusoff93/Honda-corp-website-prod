@php
    if(isset($story->hero)){
        foreach($story->hero as $item){
            $_hero[$item->type] = $item->data;
        }
    }
@endphp

<div class="hero-container">
        <div class="hero-content-area">
            <div class="model-name"><img src="{{asset(@$model_info->name_img)}}" alt=""></div>
            <img class="car-model" src="{{asset(@$_hero['hero_img'])}}" alt="">
            <div class="m-title black upper">{{@$_hero['hero_title']}}</div>
            <div class="intro-title grey">{!!@$_hero['hero_copy']!!}</div>

            <div class="hero-cta-container">
                @if(@$_hero['hero_cta1']->label)
                    <a href="{{$_hero['hero_cta1']->link}}" class="prime-cta-black">
                        <span>{{$_hero['hero_cta1']->label}}</span>
                        <div class="overlay"></div>
                    </a>
                @endif

                @if(@$_hero['hero_cta2']->label)
                    <a href="{{$_hero['hero_cta2']->link}}" class="prime-cta-black">
                        <span>{{$_hero['hero_cta2']->label}}</span>
                        <div class="overlay"></div>
                    </a>
                @endif
            </div>
        </div>


        <div class="clearfix"></div>
        {{-- <div class="btn-arrow-down">

        <div id="scroll-down">
            <span class="arrow-down"><!-- css generated icon --></span>
            <span id="scroll-title"></span>
        </div>
        </div> --}}
    </div>

<style>
    /* Mobile styles for hero CTA buttons */
    @media only screen and (max-width: 768px) {
        .hero-cta-container {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin-top: 20px;
        }

        .hero-cta-container a {
            flex: 1;
            max-width: calc(50% - 5px);
            min-width: 120px;
        }
        a.prime-cta-black {
            height: 75px;
        }
        .hero-cta-container a:nth-of-type(2) span {
            vertical-align: sub;
        }
    }
    /* Desktop styles for hero CTA buttons */
    @media only screen and (min-width: 769px) {
        a.prime-cta-black {
            width: 261px;
            height: 56px;
        }
    }
</style>
