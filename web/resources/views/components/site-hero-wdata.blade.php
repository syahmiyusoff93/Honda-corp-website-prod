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
    <div class="arrow">
        <a href="" class="prime-cta-black">
        <span><div class="white-arrow"></div></span>
        <div class="overlay"></div>
        </a>
    </div>
    <div class="thumbnail">
        <span><img class="banner-thumb" src="{{$cscreeens[1]->img_thumb}}"  alt=""></span>
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
    @media only screen and (device-width: 768px) {
        /* For general iPad layouts */

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

    /* Mobile styles - make buttons side by side */
    @media only screen and (max-width: 480px) {
        .btn-container {
            display: flex;
            flex-direction: row;
            justify-content: center;
            gap: 10px;
            align-items: center;
        }

        .btn-container a {
            flex: 1;
            max-width: calc(50% - 5px);
            min-width: 120px;
        }
    }

</style>
