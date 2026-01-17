@php
$APIPATH = config('global.APIPATH');
$honda_api_context = config('global.APICONTEXT');

$data = file_get_contents($APIPATH.'conceptscreen.json', false, $honda_api_context);
$data = json_decode($data);
$cscreeens = $data->payload;

$data = file_get_contents($APIPATH.'snippets.json', false, $honda_api_context);
$data = json_decode($data);
$news = $data->payload;

function __cleanupURL($text){
    $text = str_replace('[[SITE]]/', url('').'/', $text);
    $text = str_replace('[[SITE]]', url(''), $text);
    return $text;
}

@endphp

<div class="landing-hero owl-carousel owl-theme">

    @foreach ($cscreeens as $i=>$item)
        <div class="hero-copy coverbg hero-{{$i}}">
            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==" alt="honda" data-navipicture="{{($item->img_desktop)}}">
            <div class="hero-title white punchline">{{$item->title}}</div>
            <div class="intro-title white">{!!@$item->desc!!}</div>

            {{-- <div class="btn-container">
                <a href="{{url('model/city')}}" class="prime-cta-black">
                    <span>Explore City</span>
                    <div class="overlay"></div>
                </a>
            </div> --}}
            <div class="btn-container">
                @if ($item->cta1->label)
                    <a href="{{__cleanupURL($item->cta1->link)}}" class="prime-cta-black">
                        <span>{{$item->cta1->label}}</span>
                        <div class="overlay"></div>
                    </a>
                @endif

                @if ($item->cta2->label)
                    <a href="{{__cleanupURL($item->cta2->link)}}" class="prime-cta-white">
                        <span>{{$item->cta2->label}}</span>
                        <div class="overlay"></div>
                    </a>
                @endif

            </div>
            <style>
                .hero-{{$i}} {background-image: url('{{($item->img_desktop)}}');}
                @media only screen and (orientation:portrait){
                    .hero-{{$i}} {background-image: url('{{($item->img_mobile)}}');}
                }
            </style>

        </div>

    @endforeach

</div>


<div class="ticker-box note white">
    <ul class="newslist">
        @foreach ($news as $item)
            <li>{{$item->data}}</li>
        @endforeach
    </ul>
</div>


<div class="btn-banner navNext nextbtn">
    <div class="thumbnail">
        <span><img class="banner-thumb" src="{{$cscreeens[1]->img_thumb}}"  alt=""></span>
    </div>
    <div class="arrow">
        <a href="" class="prime-cta-black">
        <span><div class="white-arrow"></div></span>
        <div class="overlay"></div>
        </a>
    </div>
</div>

<div class="btn-banner navPrev prevbtn">
    <div class="thumbnail">
        <span><img class="banner-thumb" src="{{$cscreeens[count($cscreeens)-1]->img_thumb}}"  alt=""></span>
    </div>
    <div class="arrow">
        <a href="" class="prime-cta-black">
        <span><div class="white-arrow"></div></span>
        <div class="overlay"></div>
        </a>
    </div>
</div>

<style>
    /* Hide pagination (dots) by default for desktop */
    .landing-hero.owl-carousel .owl-dots {
        display: none;
    }

    @media only screen and (max-width: 480px) {
        .landing-hero.owl-carousel .owl-dots {
            display: flex;
            justify-content: center;
            padding: 15px 0;
            position: relative;
            z-index: 100;
        }

        .landing-hero.owl-carousel .owl-dots span{
            display: none;
        }
        
        .landing-hero.owl-carousel .owl-dots .owl-dot {
            width: 10px;
            height: 10px;
            margin: 0 5px;
            border-radius: 50%;
            background-color: rgb(255 255 255);
            border: none;
            outline: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .landing-hero.owl-carousel .owl-dots .owl-dot.active{
            background-color: #E01327 !important;
        }
        
        .landing-hero.owl-carousel .owl-dots .owl-dot.active {
            background-color: rgba(255, 255, 255, 1);
            transform: scale(1.2);
        }
        
        .landing-hero.owl-carousel .owl-dots .owl-dot:hover {
            background-color: rgba(255, 255, 255, 0.8);
        }
        
        .owl-theme .owl-nav.disabled+.owl-dots {
            bottom: 110px;
        }
    }

    @media only screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape) {
        /* For landscape layouts only */
        .owl-carousel {background: white;}
        .owl-carousel {margin-top:-50px;}
        .coverbg {background-size:contain; background-position-y: calc(50% - 40px);}
    }

    @media only screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait) {
    /* For portrait layouts only */
        .owl-carousel {margin-top:-50px;}
        .coverbg {background-size:contain; }
    }

     @media only screen and (max-width: 767px) {
        .navNext{
            display: none !important;
        }
        .navPrev{
            display: none !important;
        }
    }

    
    @media only screen and (min-width: 768px) {

        .btn-container {
            display: flex;
            flex-direction: row;
            justify-content: center;
            gap: 10px;
            align-items: center;
        }

        .btn-container a {
            flex: 1;
            max-width: calc(50% - 300px);
            min-width: 120px;
        }

        /* Position nav buttons and thumbnails. Keep HTML structure unchanged.
        - navPrev is on the left, thumbnail shown on the left
        - navNext is on the right, thumbnail shown on the right
        On hover the arrow moves slightly toward the center to reveal thumbnail. */
        .btn-banner {
            position: absolute;
            z-index: 1000;
            display: flex;
            align-items: center;
            pointer-events: auto;
        }

    
        /* Left (previous) button */
        .navPrev {
            left: -103px;
            justify-content: flex-start;
            display: flex;
        }

        /* Right (next) button - keep thumbnail on the right by reversing direction */
        .navNext {
            display: flex;
            right: -103px;
            justify-content: flex-end;
            flex-direction: row-reverse;
        }

        /* Thumbnail hidden by default, fades in on hover */
        .btn-banner .thumbnail {
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.25s ease, visibility 0.25s ease;
            max-width: 140px;
            display: flex;
            align-items: center;
        }

        /* Arrow movement transition */
        .btn-banner .arrow {
            transition: transform 0.25s ease;
            display: flex;
            align-items: center;
            padding: 8px;
        }

        /* Hover states: reveal thumbnail and nudge arrow toward center */
        .navPrev:hover .thumbnail {
            opacity: 1;
            visibility: visible;
            margin-right: 8px;
            right: -105px;
        }
        .navPrev:hover .arrow {
            transform: translateX(100px);
        }

        .navNext:hover .thumbnail {
            opacity: 1;
            visibility: visible;
            margin-left: 8px;
            left: -105px;
        }
        .navNext:hover .arrow {
            transform: translateX(-100px);
        }
            
    }

</style>
