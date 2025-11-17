@include('brand.dropdown-menu')

    {{-- NOTE: MENU ITEM - only declare it once in the component file, then all related page that using it can just call it --}}
    @php
       
        $secondmenu[] = ['technology/honda-connect', 'Honda CONNECT'];
        $secondmenu[] = ['technology/honda-sensing', 'Honda SENSING'];
        $secondmenu[] = ['technology/honda-vtec-turbo', 'Honda VTEC TURBO'];
        // $secondmenu[] = ['technology/honda-sport-hybrid', 'Honda SPORT HYBRID i-DCD'];
    @endphp

    {{-- NOTE: MOBILE MENU --}}
    <div class="topnav" id="Topnav">
        {{-- NOTE: loop the menu item the FIRST time to pick current link to be the first item --}}
        @foreach ($secondmenu as $item)
            @if (str_contains($item[0], Request::path()))
                <a href="{{url($item[0])}}">{{ $item[1] }}</a>
            @endif

        @endforeach
        {{-- NOTE: loop the menu item SECOND time to add the rest item --}}
        @foreach ($secondmenu as $item)
            @if (!str_contains($item[0], Request::path()))
                <a href="{{url($item[0])}}">{{ $item[1] }}</a>
            @endif
        @endforeach
        <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
    </div>

    {{-- NOTE: DESKTOP TABBED MENU --}}
    <div class="service-tab-menu">
        <ul>
            @foreach ($secondmenu as $item)
                {{-- NOTE: also check if the url path is equal to the menu link, add class 'active' to it --}}
                <li class="{{ strpos($item[0], Request::path()) === 0 ? 'active' : '' }}"><a href="{{url($item[0])}}">{{ $item[1] }}</a></li>
            @endforeach
        </ul>
    </div>

    {{-- NOTE: STYLE OVERWRITE --}}
    <style>
        .service-tab-menu {background: #f5f5f5; margin-bottom: -15px;}
        .service-tab-menu ul li a {color: #000;}
        .service-tab-menu ul li.active {border-bottom: 3px solid #e32119;}

        @media only screen and (max-width: 640px) {
            .service-tab-menu {display: none;}
        }
    </style>
