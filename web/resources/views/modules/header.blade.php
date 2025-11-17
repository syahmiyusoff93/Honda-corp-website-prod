<header id="mainheader">

    @php
        $__menu = config('global.menus');
    @endphp

    <section id="mainmenu">
        <div class="logo">
            <a href="{{url('')}}"><img class="toplogo" src="{{url('img/interface/honda-logo-v5.png')}}" alt="Honda - The Power of Dreams"></a>
            {{-- <a href="{{url('')}}"><img class="toplogo" src="{{url('img/interface/honda-logo-pod2png.png')}}" alt="Honda - The Power of Dreams"></a> --}}
            {{-- <a href="{{url('')}}"><img class="toplogo" src="{{url('img/interface/honda-logo-pod2.svg')}}" alt="Honda - The Power of Dreams"></a> --}}
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
                    @foreach (config('global.allmodels') as $item)
                        <li>
                            <a href="{{url('model/'.$item->slug)}}">
                                <img class="model-img lazyload" data-src="{{$item->icon}}" alt="{{$item->name}}">
                                <div class="model-copy">
                                    @if ($item->slug == "en1")
                                        <div class="model-name" style="text-transform: initial;">e:N1</div>
                                        @else
                                        <div class="model-name">{{$item->name}}</div>
                                        @endif
                                    {{-- <div class="model-name">{{$item->name}}</div> --}}
                                    {{-- @if( $item->slug =='crv')
                                        <div class="model-detail">From RM 159,900.00</div>
                                    @endif --}}
                                    @if($item->price_start_at_display>0 )
                                        @if( $item->slug =='hrv')
                                            <div class="model-detail">From RM 115,900.00</div>
                                        @elseif( $item->slug =='city')
                                            <div class="model-detail">From RM 84,900.00</div>

                                        @elseif( $item->slug =='city-hatchback')
                                            <div class="model-detail">From RM 85,900.00</div>
                                        @else
                                             <div class="model-detail">From RM {{$item->price_start_at_display}}</div>
                                        @endif
                                    @endif
                                    {{-- hide text from model dropdown (because client want hybrid tab to be appear at model page but remove the copy in model dropdown)
                                        upd: only jazz remain
                                    @if($item->got_hybrid && $item->slug =='jazz')
                                        <div class="note">Hybrid Available</div>
                                    @endif
                                    --}}

                                    {{-- SAI 20200806: Hide Type-R temporarily because out of stock oredi --}}
                                    @if ($item->slug =='type-r')
                                        {{-- <div class="note" style="color:#999;">Temporarily Unavailable</div> --}}
                                    @endif

                                    {{-- NAT 20210716: Hide Odyssey temporarily because out of stock oredi --}}
                                    @if ($item->slug =='odyssey')
                                        <div class="note" style="color:#999;">Temporarily Unavailable</div>
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
            
            <!-- hondatouch button -->
            {{--
            <!-- <a class="animatehover" href="{{url('https://hondatouch.honda.com.my/login')}}" style="position: absolute;top: 32%;right: 15%;">
                <img src="{{url('img/aftersales/honda-touch/landingbtn/HondaTouch.png')}}" alt="" style="width: 70px;">
                <div class="" style="float: right; padding:5px 15px 0px 10px;">
                    <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt="">
                </div>
            </a> -->
            --}}
            {{-- <button class="animatehover" onclick = "hondatouchurl()" style="position: absolute;top: 32%;right: 13%;background: none;border: none;cursor: pointer;">  --}}
            <button class="animatehover honda-touch-btn" onclick = "hondatouchurl()"> 
            {{-- <button class="animatehover" onclick = "hondatouchurl()" style="position: absolute;top: 32%;right: 15%;background: none;border: none;cursor: pointer;">  --}}
                <img src="{{url('img/aftersales/honda-touch/landingbtn/HondaTouch.png')}}" alt="" class="honda-touch-img">
                {{-- <img src="{{url('img/aftersales/honda-touch/landingbtn/HondaTouch.png')}}" alt="" style="width: 73px;margin-top: -3px;"> --}}
                <div class="honda-touch-arrow-img-div">
                    <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt="" class="header-arrow-img">
                    {{-- <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""> --}}
                </div>
            </button> 
            <!--  -->
            
            <a class="cta-top-experience our-brand-cta" href="{{url('our-brand')}}">
                <div class="animate">
                    <!-- <span class="small">OUR</span><br/> -->
                    <span class="bigger resize-font">OUR BRAND</span>
                </div>
                <div class="animate">
                    <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt="" class="header-arrow-img">
                    {{-- <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""> --}}
                </div>
            </a>
        </div>

        {{-- MOBILE MENU ---------------------------------------------------------------------------------------------- --}}


        <div class="for-mobile">
        
            <!-- hondatouch button -->
            {{--
            <!-- <a class="animatehover" href="{{url('https://hondatouch.honda.com.my/login')}}" style="position: fixed;right: 3%;margin: 23.5px 40px;">
                <img src="{{url('img/aftersales/honda-touch/landingbtn/HondaTouch.png')}}" alt="" style="width: 55px;">
                <div class="" style="float: right; padding:5px 15px 0px 10px;">
                    <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt="">
                </div>
            </a> -->
            --}}
            <button class="animatehover" onclick = "hondatouchurl()" style="position: fixed;right: 3%;margin: 23.5px 40px;background: none;border: none;cursor: pointer;">
                <img src="{{url('img/aftersales/honda-touch/landingbtn/HondaTouch.png')}}" alt="" style="width: 55px;">
                <div class="" style="float: right; padding:5px 15px 0px 10px;">
                    <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt="">
                </div>
            </button>
            <!--  -->
            
            <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
            <div class="dd-menu">
                <a class="cta-mobile-experience" href="{{url('our-brand')}}">
                   <div class="cta-copy"><!--<span class="small">Our </span>--><span class="bigger">Our brand</span><img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                </a>

                <div class="mobile-menu">Models</div>
                <div class="dd-content ddmodel" data-dropdown="dd-models">

                    {{-- MODEL LIST --}}

                    <ul class="model">
                        @foreach (config('global.allmodels') as $item)
                            <li>
                                <a href="{{url('model/'.$item->slug)}}">
                                    <img class="model-img lazyload" data-src="{{$item->icon}}" alt="{{$item->name}}">
                                    <div class="model-copy">
                                        @if ($item->slug == "en1")
                                        <div class="model-name" style="text-transform: initial;">e:N1</div>
                                        @else
                                        <div class="model-name">{{$item->name}}</div>
                                        @endif
                                        {{-- <div class="model-name">{{$item->name}}</div> --}}
                                        {{-- @if( $item->slug =='crv')
                                            <div class="model-detail">From RM 159,900.00</div>
                                        @endif --}}
                                        @if($item->price_start_at_display>0)
                                            
                                            @if( $item->slug =='hrv')
                                            <div class="model-detail">From RM 115,900.00</div>
                                            @elseif( $item->slug =='city')
                                            <div class="model-detail">From RM 84,900.00</div>
                                            @elseif( $item->slug =='city-hatchback')
                                            <div class="model-detail">From RM 85,900.00</div>
                                            @else
                                            <div class="model-detail">From RM {{$item->price_start_at_display}}</div>
                                            @endif

                                        @endif                                        
                                        {{-- NAT 20200806: Hide Type-R temporarily because out of stock oredi --}}
                                        @if ($item->slug =='type-r')
                                            {{-- <div class="note" style="color:#999;">Temporarily Unavailable</div> --}}
                                        @endif

                                        {{-- NAT 20210716: Hide Odyssey temporarily because out of stock oredi --}}
                                        @if ($item->slug =='odyssey')
                                            <div class="note" style="color:#999;">Temporarily Unavailable</div>
                                        @endif
                                        
                                        {{-- hide text from model dropdown (because client want hybrid tab to be appear at model page but remove the copy in model dropdown)
                                        upd: only jazz remain
                                        @if($item->got_hybrid && $item->slug =='jazz')
                                        <div class="note">Hybrid Available</div>
                                        @endif
                                        --}}
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    {{-- SHOPPING TOOL --}}
                    <div class="ddshopping">
                        <div class="ddshopping-title sub-title">SHOPPING TOOLS</div>
                        @foreach ($__menu['shopping-tool'] as $item)
                            @if ($item[1] == "https://prebook.honda.com.my")
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
                <div class="mobile-menu-link"><a href="https://prebook.honda.com.my"">Book A Test Drive</a></div>

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
              
            // window.location = "https://hondatouch.honda.com.my/login";
        }
        </script>

</header>

