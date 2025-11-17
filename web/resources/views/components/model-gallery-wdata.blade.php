@php
    $APIPATH = config('global.APIPATH');
    $honda_api_context = config('global.APICONTEXT');

    $data = file_get_contents($APIPATH.'model_'.$model_slug.'_gallery.json', false, $honda_api_context);
    $data = json_decode($data, true);
    //dd($data);
    $gallery = $data['payload']['gallery'];

    $_url = '';
@endphp


@if($gallery && count($gallery )>=4)
<div class="desktop-gallery">
        <div class="gallery-container-top" data-featherlight-gallery >
            <div class="half-column">

                <div class="half-column">
                    <a class="thumbnail gallery-img" href="{{ $_url.$gallery[0]['filepath'] }}">
                        <div class="gallery1 img" alt="img1" style="background-image:url({{ $_url.$gallery[0]['filepath'] }});">
                            <img class="reactive lazyload--" src="{{ $_url.$gallery[0]['filepath'] }}">
                        </div>
                    </a>
                </div>
                <div class="half-column">
                    <a class="thumbnail gallery-img" href="{{ $_url.$gallery[1]['filepath'] }}">
                        <div class="gallery2 img" alt="img2" style="background-image:url({{ $_url.$gallery[1]['filepath'] }});">
                            <img class="reactive lazyload--" src="{{ $_url.$gallery[1]['filepath'] }}">
                        </div>
                    </a>

                    <a class="thumbnail gallery-img" href="{{ $_url.$gallery[2]['filepath'] }}">
                        <div class="gallery3 img" alt="img3" style="background-image:url({{ $_url.$gallery[2]['filepath'] }});">
                            <img class="reactive lazyload--" src="{{ $_url.$gallery[2]['filepath'] }}">
                        </div>
                    </a>
                </div>
            </div>
            <div class="half-column">
                <a class="thumbnail gallery-img" href="{{ $_url.$gallery[3]['filepath'] }}">
                    <div class="gallery4 img" alt="img3" style="background-image:url({{ $_url.$gallery[3]['filepath'] }});">
                        <img class="reactive lazyload--" src="{{ $_url.$gallery[3]['filepath'] }}">
                    </div>
                </a>

                <style>

                </style>

                {{--  <a class="thumbnail gallery-img"
                href="{{ url('vr/'.$model_slug.'/interior') }}"
                data-featherlight-iframe-height="100%"
                data-featherlight-iframe-width="100%"
                data-featherlight="iframe">
                    <div class="view-column gallery4 img" alt="img4" style="background-image:url({{ $_url.$gallery[3]['filepath'] }});">
                        <img class="icon" src="{{url('img/mock/gallery_360_icon.png')}}" alt="">
                    </div>
                </a>  --}}

            </div>
            <div class="clearfix"></div>
        </div>
        <div class="gallery-container-bottom">
            <ul class="owl-carousel owl-theme">
                @for($i=4; $i < count($gallery); $i++)
                    <li>
                        <a class="thumbnail gallery-img" href="{{ $_url.$gallery[$i]['filepath'] }}">
                            <img class="img lazyload--" src="{{ $_url.$gallery[$i]['filepath'] }}" alt="" style="background-image:url({{ $_url.$gallery[$i]['filepath'] }});">
                        </a>
                    </li>
                @endfor
            </ul>
        </div>
    </div>

    <div class="mobile-gallery">
        <div class="m-gallery-container" data-featherlight-gallery >
            <div class="full-img">
                <a class="gallery-img" href="{{ $_url.$gallery[0]['filepath'] }}">
                    <div class="gallery1 img" alt="img1" style="background-image:url({{ $_url.$gallery[0]['filepath'] }});"></div>
                </a>
            </div>
            <div class="half-img">
                <div class="left">

                    {{-- <a class="thumbnail gallery-img"  href="{{ $_url.$gallery[3]['filepath'] }}">
                        <div class="view-column gallery4 img" alt="img4" style="background-image:url({{ $_url.$gallery[3]['filepath'] }});"> --}}
                            {{-- <img class="icon" src="{{url('img/mock/gallery_360_icon.png')}}" alt=""> --}}
                        {{-- </div>
                    </a> --}}

                    <a class="gallery-img" href="{{ $_url.$gallery[1]['filepath'] }}">
                        <div class="img gallery2" alt="img2" style="background-image:url({{ $_url.$gallery[1]['filepath'] }});"></div>
                    </a>
                </div>
                <div class=right>
                    {{-- <a class="gallery-img" href="{{ $_url.$gallery[1]['filepath'] }}">
                        <div class="img gallery2" alt="img2" style="background-image:url({{ $_url.$gallery[1]['filepath'] }});"></div>
                    </a> --}}

                    <a class="gallery-img" href="{{ $_url.$gallery[2]['filepath'] }}">
                        <div class="img gallery3" alt="img3" style="background-image:url({{ $_url.$gallery[2]['filepath'] }});"></div>
                    </a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="full-img">
                <a class="thumbnail gallery-img"  href="{{ $_url.$gallery[3]['filepath'] }}">
                    <div class="view-column gallery4 img" alt="img4" style="background-image:url({{ $_url.$gallery[3]['filepath'] }});">
                        {{-- <img class="icon" src="{{url('img/mock/gallery_360_icon.png')}}" alt=""> --}}
                    </div>
                </a>

                {{-- <a class="gallery-img" href="{{ $_url.$gallery[2]['filepath'] }}">
                    <div class="img gallery3" alt="img3" style="background-image:url({{ $_url.$gallery[2]['filepath'] }});"></div>
                </a> --}}
            </div>

        </div>
        <div class="gallery-container-bottom">
            <ul class="owl-carousel owl-theme">
                @for($i=4; $i < count($gallery); $i++)
                    <li>
                        <a class="thumbnail gallery-img" href="{{ $_url.$gallery[$i]['filepath'] }}">
                            <img class="img lazyload--" src="{{ $_url.$gallery[$i]['filepath'] }}" alt="" style="background-image:url({{ $_url.$gallery[$i]['filepath'] }});">
                        </a>
                    </li>
                @endfor
            </ul>
        </div>
    </div>
@endif
