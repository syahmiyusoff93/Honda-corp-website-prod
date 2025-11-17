<header id="mainheader">

    @php
        $__menu = config('global.menus');
    @endphp

    <section id="mainmenu">
        <div class="logo">
            <a href="{{url('')}}"><img class="toplogo" src="{{url('img/interface/honda-logo-v6.png')}}" style="margin: 15px 5px !important;height: 34px;" alt="Honda - The Power of Dreams"></a>
        </div>

        <style>
            #mainmenu {background-color: #191616; border-bottom:2px solid #191616;}
            #mainmenu li {padding: 0 10px;}
            .desktop-menu > li, .desktop-menu > li>a {color: #fff !important;}
            .cta-top-experience { width: 230px; height:70px;}

            #mainmenu .menu-icon .navicon.open {background: rgba(0,0,0,0);}
            #mainmenu .menu-icon .navicon:before, #mainmenu .menu-icon .navicon:after {background-color: #fff;}

        </style>

        {{-- DESKTOP MENU ------------------------------------------------------------------------------------------  --}}
        <div class="for-desktop">
            <ul class="desktop-menu">

                <li class="hasdd" data-dropdown="dd-aboutus">About Us<img src="{{url('img/interface/triangle-down-red.png')}}" alt=""></li>
                <li class="hasdd" data-dropdown="dd-technology">Technology<img src="{{url('img/interface/triangle-down-red.png')}}" alt=""></li>
                <li><a href="{{url('press-release')}}" >Press Release</a></li>
                <li class="hasdd" data-dropdown="dd-contactus">Contact Us<img src="{{url('img/interface/triangle-down-red.png')}}" alt=""></li>
                {{-- <li><a href="{{url('contact-us')}}" >Contact Us</a></li> --}}
                <li><a href="{{url('dealers')}}" class="text-red">Find a Dealer</a></li>

            </ul>

            <div class="dd-content ddmaingeneric" data-dropdown="dd-aboutus" style="width: 230px; left: 200px;">
                <ul class="">
                    @foreach ($__menu['aboutus'] as $item)
                        <li><a href="{{url($item[1])}}">{{$item[0]}}</a></li>
                    @endforeach
                </ul>
            </div>


            <div class="dd-content ddmaingeneric" data-dropdown="dd-technology"style="width: 203px; left: 344px;">
                <ul>
                    @foreach ($__menu['technology'] as $item)
                        <li><a href="{{url($item[1])}}">{{$item[0]}}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="dd-content ddmaingeneric" data-dropdown="dd-contactus"style="width: 203px; left: 837px;">
                <ul>
                    @foreach ($__menu['contactus'] as $item)
                        <li><a href="{{url($item[1])}}">{{$item[0]}}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="dd-content dddiscover" data-dropdown="dd-discover">
                <ul>
                    <ul>
                        @foreach ($__menu['discover'] as $item)
                            <li><a href="{{url('discover/'.$item[1])}}">{{$item[0]}}</a></li>
                        @endforeach
                    </ul>
                </ul>
            </div>

            <a class="cta-top-experience" href="{{url('our-products')}}">
                <div class="animate">
                    <!-- <span class="small">OUR</span><br/> -->
                    <span class="bigger">OUR PRODUCTS</span>
                </div>
                <div class="animate">
                    <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt="">
                </div>
            </a>
        </div>

        {{-- MOBILE MENU ---------------------------------------------------------------------------------------------- --}}


        <div class="for-mobile">
            <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
            <div class="dd-menu">
                <a class="cta-mobile-experience" href="{{url('our-products')}}">
                   <div class="cta-copy"><!--<span class="small">Our </span>--><span class="bigger">Our Products</span><img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                </a>

                <div class="mobile-menu">About Us</div>
                <div class="dd-content ddmaingeneric" data-dropdown="dd-models">

                    <ul class="">
                        @foreach ($__menu['aboutus'] as $item)
                            <li><a href="{{url($item[1])}}">{{$item[0]}}</a></li>
                        @endforeach
                    </ul>
                </div>

                {{-- TECH --}}
                <div class="mobile-menu">Technology</div>
                <div class="dd-content ddmaingeneric" data-dropdown="dd-aftersale">
                    <ul>
                        @foreach ($__menu['technology'] as $item)
                            <li><a href="{{url($item[1])}}">{{$item[0]}}</a></li>
                        @endforeach
                    </ul>
                </div>

                {{-- PRESS RELEASE --}}
                <div class="mobile-menu-link"><a href="{{url('press-release')}}">Press Release</a></div>

                {{-- Contact Us 
                <div class="mobile-menu-link"><a href="{{url('contact-us')}}">Contact Us</a></div> --}}
                <div class="mobile-menu">Contact Us</div>
                <div class="dd-content ddmaingeneric" data-dropdown="dd-contactus">

                    <ul class="">
                        @foreach ($__menu['contactus'] as $item)
                            <li><a href="{{url($item[1])}}">{{$item[0]}}</a></li>
                        @endforeach
                    </ul>
                </div>

                {{-- DEALERS --}}
                <div class="mobile-menu-link"><a href="{{url('dealers')}}" class="text-red">Find a Dealer</a></div>

            </div>
        </div>


    </section>
</header>

