@php
    $_s = json_encode(@$story->story);
    $_s = json_decode(@$_s,true);
    //dd(var_dump($_s));
    foreach (@$_s as $key=>$item){
        $it = explode('-', $key);
        $item['shortkey'] = $it[1];
        if($key=='page-hybrid' && $model_info->got_hybrid!=1){
            unset($item);
        }
    }
@endphp

   

    @foreach (@$_s as $key=>$item)

    <section class="feature" id="{{explode('-', $key)[1]}}">
        <div class="">
            <div class="container">
                <a href="{{url('model/'.$model_info->slug.'/'.strtolower($item['section_label']))}}" class="column-row">
                    <div class="img-section f-{{$item['image_side']}}">
                        <img class="lazyload--" src="{{$item['image']}}" alt="{{$item['section_label']}} feature picture">
                    </div>
                    <div class="content-section f-{{$item['image_side']}}">
                        <div class="details-container">
                            <div class="details">
                                <div class="small-title body-copy">{{$item['section_label']}}</div>
                                <div class="inner-title">{{$item['title']}}</div>
                                <div class="intro-title">{{$item['copy']}}</div>
                                <div class="red-arrow"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="clearfix"></div>
                </a>
            </div>
        </div>
    </section>

    @endforeach


     @if (($model_slug == "city") || ($model_slug == "city-hatchback") || ($model_slug == "civic-modulo") || ($model_slug == "civic") || ($model_slug == "crv") || ($model_slug == "hrv")  )

        <div id="connect-container">
            <a target="_blank" href="/technology/honda-connect">
                <div class="container">
                        
                        

                        <div class="img-sec float-left">
                            @if ($model_slug == "city")
                            <img src="https://www.honda.com.my/img/technology/05_connect/hand_connect_01.jpg" alt="" >
                            @elseif ($model_slug == "crv")
                            <img src="https://www.honda.com.my/img/technology/05_connect/honda-connect-main.jpg" alt="" >
                            @elseif ($model_slug == "city-hatchback")
                            <img src="https://www.honda.com.my/img/technology/05_connect/hand_connect_01.jpg" alt="" >
                            @elseif ($model_slug == "civic")
                            <img src="https://www.honda.com.my/img/technology/05_connect/Civic_safety21.png" alt="" >
                            @elseif ($model_slug == "hrv")
                            <img src="https://www.honda.com.my/img/technology/05_connect/Honda-connect-hrv.jpg" alt="" >
                            @else
                            <img src="https://www.honda.com.my/img/technology/05_connect/connect-thumbnail.jpg" alt="" >
                            @endif
                        </div>

                        <div class="content-sec float-left">
                            <div class="detail-content">
                               <div class="inner-title" style="color: #282a2f; margin-bottom: 10px;">Honda CONNECT</div>
                                @if ($model_slug == "city")
                                <div class="intro-title" style="text-align: left;font-size: 1rem;color: #5e6063;letter-spacing: 0.25px;line-height: 1.5em;font-weight: 400;">Experience our new innovation that puts safety, security and convenience in your hands.</div>
                                @elseif ($model_slug == "crv")
                                <div class="intro-title" style="text-align: left;font-size: 1rem;color: #5e6063;letter-spacing: 0.25px;line-height: 1.5em;font-weight: 400;">Safer and enjoyable journey with advanced remote connectivity technology via your smartphone.</div>
                                @elseif ($model_slug == "hrv")
                                <div class="intro-title" style="text-align: left;font-size: 1rem;color: #5e6063;letter-spacing: 0.25px;line-height: 1.5em;font-weight: 400;">Meet our innovative app that lets you enjoy a host of convenient, security and safety features to stay connected to your vehicle from your phone.</div>
                                @elseif ($model_slug == "city-hatchback")
                                <div class="intro-title" style="text-align: left;font-size: 1rem;color: #5e6063;letter-spacing: 0.25px;line-height: 1.5em;font-weight: 400;">Don't miss out on this cool innovation featuring a host of safety, security and convenient features right from your smartphone.</div>
                                @else
                                <div class="intro-title" style="text-align: left;font-size: 1rem;color: #5e6063;letter-spacing: 0.25px;line-height: 1.5em;font-weight: 400;">Control your car remotely, check on its status from your phone, and allow it to get help in an emergency on its own with Honda CONNECT: The next step in Honda advanced technology that completely changes your safety, security and convenience on the road.</div>
                                @endif
                               {{-- <div class="inner-title" style="color: #282a2f; margin-bottom: 10px;">Honda CONNECT</div>
                                @if ($model_slug != "city")
                                <div class="intro-title" style="text-align: left;font-size: 1rem;color: #5e6063;letter-spacing: 0.25px;line-height: 1.5em;font-weight: 400;">Control your car remotely, check on its status from your phone, and allow it to get help in an emergency on its own with Honda CONNECT: The next step in Honda advanced technology that completely changes your safety, security and convenience on the road.</div>
                                @else
                                <div class="intro-title" style="text-align: left;font-size: 1rem;color: #5e6063;letter-spacing: 0.25px;line-height: 1.5em;font-weight: 400;">Experience our new innovation that puts safety, security and convenience in your hands.</div>
                                @endif --}}
                                <div class="red-arrow"></div>
                            </div>
                        </div>


                        

                    <div class="clearfix"></div>
                </div>

            </a>
        </div>

    @endif






    {{-- <section class="feature" id="exterior">
        <div class="">
            <div class="container">
                <a href="{{url('model/city/exterior')}}" class="column-row">
                    <div class="img-section f-right">
                        <img src="{{url('img/mock/city-exterior.png')}}" alt="">
                    </div>
                    <div class="content-section f-right">
                        <div class="details">
                            <div class="small-title body-copy">Exterior</div>
                            <div class="inner-title">Leave a stunning impression</div>
                            <div class="intro-title">The perfected detail of the City, both on the inside and out is sure to make a statement to the driver and passengers alike. </div>
                            <div class="red-arrow"></div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </a>
            </div>
        </div>
    </section>

    <section class="feature" id="interior">
        <div class="">
            <div class="container">
                <a href="{{url('model/city/interior')}}" class="column-row">
                    <div class="img-section f-left">
                        <img src="{{url('img/mock/city-interior.png')}}" alt="">
                    </div>

                    <div class="content-section f-left">
                        <div class="details">
                            <div class="small-title body-copy">Interior</div>
                            <div class="inner-title">Fitted technology for your full enjoyment</div>
                            <div class="intro-title">Aim to give you the ultimate pleasure and convenience, get stunned by a host of innovative features that comes with the City. </div>
                            <div class="red-arrow"></div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </a>
            </div>
        </div>
    </section>

    <section class="feature" id="performance">
        <div class="">
            <div class="container">
                <a href="{{url('model/city/performance')}}" class="column-row">
                    <div class="img-section f-right">
                        <img src="{{url('img/mock/city-performance.png')}}" alt="">
                    </div>
                    <div class="content-section f-right">
                        <div class="details">
                            <div class="small-title body-copy">PERFORMANCE</div>
                            <div class="inner-title">Experience masterful engineering</div>
                            <div class="intro-title">Designed to deliver the performance you need, the City is set to stun with range of features.</div>
                            <div class="red-arrow"></div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </a>
            </div>
        </div>
    </section>

    <section class="feature" id="safety">
        <div class="">
            <div class="container">
                <a href="{{url('model/city/safety')}}" class="column-row">
                    <div class="img-section f-left">
                        <img src="{{url('img/mock/city-safety.png')}}" alt="">
                    </div>

                    <div class="content-section f-left">
                        <div class="details">
                            <div class="small-title body-copy">SAFETY</div>
                            <div class="inner-title">Integrated with top-notch safety standards</div>
                            <div class="intro-title">From stabilising your ride to your children’s safety, the City has it all to keep you always protected. </div>
                            <div class="red-arrow"></div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </a>
            </div>
        </div>
    </section>

    <section class="feature" id="hybrid">
        <div class="">
            <div class="container">
                <a href="{{url('model/city/hybrid')}}" class="column-row">
                    <div class="img-section f-right">
                        <img src="{{url('img/mock/city-performance.png')}}" alt="">
                    </div>
                    <div class="content-section f-right">
                        <div class="details">
                            <div class="small-title body-copy">Hybrid</div>
                            <div class="inner-title">Hybrid</div>
                            <div class="intro-title">Hybrid</div>
                            <div class="red-arrow"></div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </a>
            </div>
        </div>
    </section> --}}


    <section class="feature section-gap" id="feature" style="display: none;" >
        <div class="for-mobile" >
            <div class="container two-column">

            <div class="feature-content owl-carousel owl-theme">

                @foreach (@$_s as $key=>$item)
                <a href="{{url('model/city/exterior')}}" class="column-row target" id="{{explode('-', $key)[1]}}">
                    <div class="img-section f-{{$item['image_side']}}">
                            <img src="{{$item['image']}}" alt="{{$item['section_label']}} feature picture">
                    </div>
                    <div class="content-section f-{{$item['image_side']}}">
                        <div class="details">
                            <div class="small-title body-copy">{{$item['section_label']}}</div>
                            <div class="inner-title">{{$item['title']}}</div>
                            <div class="intro-title">{{$item['copy']}}</div>
                            <div class="red-arrow"></div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </a>
                @endforeach

{{--
                <a href="{{url('model/city/interior')}}" class="column-row target" id="interior">
                    <div class="img-section f-left">
                        <img src="{{url('img/mock/city-interior.png')}}" alt="">
                    </div>

                    <div class="content-section f-left">
                        <div class="details">
                            <div class="small-title body-copy">Interior</div>
                            <div class="inner-title">Fitted technology for your full enjoyment</div>
                            <div class="intro-title">Aim to give you the ultimate pleasure and convenience, get stunned by a host of innovative features that comes with the City. </div>
                            <div class="red-arrow"></div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </a>

                <a href="{{url('model/city/performance')}}" class="column-row target" id="performance">
                    <div class="img-section f-right">
                        <img src="{{url('img/mock/city-performance.png')}}" alt="">
                    </div>
                    <div class="content-section f-right">
                        <div class="details">
                            <div class="small-title body-copy">PERFORMANCE</div>
                            <div class="inner-title">Experience masterful engineering</div>
                            <div class="intro-title">Designed to deliver the performance you need, the City is set to stun with range of features.</div>
                            <div class="red-arrow"></div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </a>

                <a href="{{url('model/city/safety')}}" class="column-row target" id="safety">
                    <div class="img-section f-left">
                        <img src="{{url('img/mock/city-safety.png')}}" alt="">
                    </div>

                    <div class="content-section f-left">
                        <div class="details">
                            <div class="small-title body-copy">SAFETY</div>
                            <div class="inner-title">Integrated with top-notch safety standards</div>
                            <div class="intro-title">From stabilising your ride to your children’s safety, the City has it all to keep you always protected. </div>
                            <div class="red-arrow"></div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </a> --}}
            </div>
        </div>
        </div>
    </section>
