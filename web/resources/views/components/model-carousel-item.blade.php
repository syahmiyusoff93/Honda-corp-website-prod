<div class="car-item">
    <a href="{{url('model/'.$item->slug)}}">
        <div class="car-model-grey">
            <img class="lazyload" data-src="{{$item->name_img}}" alt="{{$item->name}} brand name">
            {{-- <img src="img/mock/city-black.png" alt=""> --}}
        </div>
        <div class="model-car">
            <img class="lazyload" data-src="{{$item->icon}}" alt="{{$item->name}}">
            {{-- <img src="img/mock/city.png" alt=""> --}}
        </div>

        <div class="hover-effect">
            <div class="car-model">
                <img class="lazyload" src="{{$item->name_img_hover}}" alt="{{$item->name}} brand name">
                {{-- <img src="img/mock/city-white.png" alt=""> --}}
            </div>

            <div class="car-cta">
                <!-- <div class="model-name">{{$item->name}}</div> -->
                <div class="model-name">
                    Explore 
                    @if ($item->name == "e:N1")
                        <span style="text-transform: none;">e:N1</span>
                    @else
                        {{ $item->name }}       
                    @endif
                </div>
                <img class="desktop lazyload" data-src="{{url('img/interface/arrow-long-right-white.svg')}}" alt="">
                <img class="mobile lazyload" data-src="{{url('img/interface/arrow-long-right-red.svg')}}" alt="">
            </div>
            <div class="hover-bg">
                <div class="hover-bg1"></div>
                <div class="hover-bg2"></div>
            </div>
        </div>
    </a>
</div>
