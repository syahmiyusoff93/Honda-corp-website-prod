<header id="mainheader">

    @php
        $APIPATH = config('global.APIPATH');
        $honda_api_context = config('global.APICONTEXT');
        $__menu = config('global.menus');
        $modelsData = file_get_contents($APIPATH.'models.json', false, $honda_api_context);
        $modelsData = json_decode($modelsData, true);
        $allmodels = collect($modelsData)->map(function($item) {
            return (object) $item;
        });
    @endphp

    <section id="mainmenu">
        <div class="logo">
            <a href="{{url('')}}"><img class="toplogo" src="{{url('img/interface/honda-logo-v5.png')}}" alt="Honda - The Power of Dreams"></a>
        </div>

        {{-- DESKTOP MENU ------------------------------------------------------------------------------------------  --}}
        <div class="for-desktop">
            <ul class="desktop-menu">
                <li class="hasdd models" data-dropdown="dd-models">Models<img src="{{url('img/interface/triangle-down-red.png')}}" alt=""></li>
                <li class="hasdd" data-dropdown="dd-aftersale">After Sales<img src="{{url('img/interface/triangle-down-red.png')}}" alt=""></li>
                <li><a href="{{url('happenings')}}" >Happenings</a></li>
                <li class="hasdd" data-dropdown="dd-discover">Discover<img src="{{url('img/interface/triangle-down-red.png')}}" alt=""></li>
                <li><a href="{{url('dealers')}}" class="text-red">Find a Dealer</a></li>
                <li><a href="https://prebook.honda.com.my" class="text-red"> New Car Pre-Booking</a></li>
            </ul>
            

            <div class="dd-content ddmodel" data-dropdown="dd-models">
                <ul class="model flex">
                    @foreach ($allmodels as $item)
                        <li>
                            <a href="{{url('model/'.$item->slug)}}">
                                <img class="model-img lazyload" data-src="{{$item->icon}}" alt="{{$item->name}}">
                                <div class="model-copy">
                                    <div class="model-name">{{$item->name}}</div>
                                    @if($item->price_start_at_display>0)
                                        <div class="model-detail">From RM {{$item->price_start_at_display}}</div>
                                    @endif
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>

                <div class="ddshopping">
                    <div class="ddshopping-title sub-title">SHOPPING TOOLS</div>
                    @include('components.shopping-tools')
                </div>
            </div>


            <div class="dd-content ddaftersale" data-dropdown="dd-aftersale">
                <ul>
                    @foreach ($__menu['aftersales'] as $item)
                      @if ( $item[1] == 'manuals'  )  
                        <li><a href="{{url($item[1])}}">{{$item[0]}}</a></li>
                      @else
                        <li><a href="{{url('aftersales/'.$item[1])}}">{{$item[0]}}</a></li>
                      @endif
                    
                    @endforeach
                </ul>
            </div>

            <div class="dd-content dddiscover" data-dropdown="dd-discover">
                <ul>
                    <ul>
                        @foreach ($__menu['discover'] as $item)
                            <li><a href="{{url('discover/'.$item[1])}}">{{$item[0]}}</a></li>
                        @endforeach
                       <li><a href="{{url('/hcuc')}}">Honda Certified Used Car</a></li> 
                    </ul>
                </ul>
            </div>
            
            <button class="animatehover honda-touch-btn" onclick = "hondatouchurl()"> 
                <img src="{{url('img/aftersales/honda-touch/landingbtn/HondaTouch.png')}}" alt="" class="honda-touch-img">
                <div class="honda-touch-arrow-img-div">
                    <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt="" class="header-arrow-img">
                </div>
            </button>
            
            <a class="cta-top-experience our-brand-cta" href="{{url('our-brand')}}">
                <div class="animate">
                    <span class="bigger resize-font">OUR BRAND</span>
                </div>
                <div class="animate">
                    <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt="" class="header-arrow-img">
                </div>
            </a>
        </div>

        {{-- MOBILE MENU ---------------------------------------------------------------------------------------------- --}}


        <div class="for-mobile">
        
            <button class="animatehover" onclick = "hondatouchurl()" style="position: fixed;right: 3%;margin: 23.5px 40px;background: none;border: none;cursor: pointer;">
                <img src="{{url('img/aftersales/honda-touch/landingbtn/HondaTouch.png')}}" alt="" style="width: 55px;">
                <div class="" style="float: right; padding:5px 15px 0px 10px;">
                    <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt="">
                </div>
            </button>
            
            <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
            <div class="dd-menu">
                <a class="cta-mobile-experience" href="{{url('our-brand')}}">
                   <div class="cta-copy"><span class="bigger">Our brand</span><img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                </a>

                <div class="mobile-menu">Models</div>
                <div class="dd-content ddmodel" data-dropdown="dd-models">

                    {{-- MODEL LIST --}}

                    <ul class="model">
                        @foreach ($allmodels as $item)
                            <li>
                                <a href="{{url('model/'.$item->slug)}}">
                                    <img class="model-img lazyload" data-src="{{$item->icon}}" alt="{{$item->name}}">
                                    <div class="model-copy">
                                        <div class="model-name">{{$item->name}}</div>
                                        @if($item->price_start_at_display>0)
                                            <div class="model-detail">From RM {{$item->price_start_at_display}}</div>
                                        @endif
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    {{-- SHOPPING TOOL --}}
                    <div class="ddshopping">
                        <div class="ddshopping-title sub-title">SHOPPING TOOLS</div>
                        @foreach ($__menu['shopping-tool'] as $item)
                            @if ($item[1] == "https://prebook.honda.com.my" )
                                <a href="{{url($item[1])}}" class="{{$item[3]}}">
                                    <div class="ddshopping-img"><img class="lazyload" data-src="{{versioned_asset('img/icon/'.$item[2])}}" alt="{{$item[0]}}" width="200" height="200" style="top: -33px;"></div>
                                    <div class="ddshopping-text"> {{$item[0]}}</div>
                                </a>
                            @else
                                <a href="{{url($item[1])}}" class="{{$item[3]}}">
                                    <div class="ddshopping-img"><img class="lazyload" data-src="{{versioned_asset('img/icon/'.$item[2])}}" alt="{{$item[0]}}"></div>
                                    <div class="ddshopping-text"> {{$item[0]}}</div>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>

                {{-- AFTER SALE --}}
                <div class="mobile-menu">After Sales</div>
                <div class="dd-content ddaftersale" data-dropdown="dd-aftersale">
                    <ul>
                        @foreach ($__menu['aftersales'] as $item)
                            @if ( $item[1] == 'manuals'  )  
                               <li><a href="{{url($item[1])}}">{{$item[0]}}</a></li>
                            @else 
                               <li><a href="{{url('aftersales/'.$item[1])}}">{{$item[0]}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>

                {{-- HAPPENINGS --}}
                <div class="mobile-menu-link"><a href="{{url('happenings')}}">Happenings</a></div>

                {{-- DISCOVER --}}
                <div class="mobile-menu">Discover</div>
                <div class="dd-content dddiscover" data-dropdown="dd-discover">
                    <ul>
                        @foreach ($__menu['discover'] as $item)
                            <li><a href="{{url('discover/'.$item[1])}}">{{$item[0]}}</a></li>
                        @endforeach
                        <li><a href="{{url('/hcuc')}}">Honda Certified Used Car</a></li> 
                    </ul>
                </div>

                {{-- DEALERS --}}
                <div class="mobile-menu-link"><a href="{{url('dealers')}}" class="text-red">Find a Dealer</a></div>

                {{-- New Car Pre-Booking --}}
                <div class="mobile-menu-link"><a href="https://prebook.honda.com.my" class="text-red">New Car Pre-Booking</a></div>

                {{-- Book A Test Drive --}}
                <div class="mobile-menu-link"><a href="https://prebook.honda.com.my/getintouch"">Book A Test Drive</a></div>

            </div>
        <a class="cta-top-experience" href="{{url('our-brand')}}">
                <div class="animate">
                    <span class="small">OUR</span><br/>
                    <span class="bigger">BRAND</span>
                </div>
                <div class="animate">
                    <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt="">
                </div>
            </a>


        </div>


    </section>
    <section id="secondmenu" class="stage-contained">
        <!-- secondary menu -->
    </section>

    <style>
        .animatehover:hover div:nth-of-type(1) {transition-duration: .2s; -moz-transition-duration: .2s;transform: translateX(30%);}
        </style>

        <script>

        function hondatouchurl() {
            var Android = /(android)/i.test(navigator.userAgent); 
            var iOS =  /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream; 
              
            if(Android) { 
                window.location = "https://play.google.com/store/apps/details?id=com.honda.HondaTouch.prod";
            } else if(iOS) {
                window.location = "https://apps.apple.com/us/app/id1528936599";
            } else {
                window.location = "https://hondatouch.honda.com.my/login";
            }
        }
        </script>

</header>

