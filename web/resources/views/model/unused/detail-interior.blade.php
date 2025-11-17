
@extends('layouts.modelinner')


@section('inner-content')

<section class="model-inner-container stage-contained">
    <div class="intro first">
        <h2>STUNNING SPACE</h2>
        <div class="intro-title grey">The City's spacious cabin is designed for the ultimate comfort for both the driver and passengers.</div>
    </div>

    <div class="details-container">
        <div class="photo-full"><img src="{{url('img/mock/2019_CITY_Features_Comfort01.png')}}" alt=""></div>
    </div>

    <div class="details-container">
        <ul class="flex">
            <li>
                <div class="photo"><img src="{{url('img/mock/2019_CITY_Features_Comfort02.jpg')}}" alt=""></div>
                <div class="des">
                    <div class="sub-title">60:40 FOLDABLE SEATS</div>
                    <div class="body-copy">Extend your luggage area with rear seats which can be folded into a 60:40 split.</div>
                </div>
            </li>

            <li>
                <div class="photo"><img src="{{url('img/mock/2019_CITY_Features_Comfort03.jpg')}}" alt=""></div>
                <div class="des">
                    <div class="sub-title">8 CUP HOLDERS</div>
                    <div class="body-copy">Keep beverages within easy reach of every passenger.</div>
                </div>
            </li>

            <li>
                <div class="photo"><img src="{{url('img/mock/2019_CITY_Features_Comfort04.jpg')}}" alt=""></div>
                <div class="des">
                    <div class="sub-title">536L TRUNK SPACE</div>
                    <div class="body-copy">Boasting the biggest trunk in its class, the City easily fits everything you need to carry.</div>
                </div>
            </li>

            <li>
                <div class="photo"><img src="{{url('img/mock/2019_CITY_Features_Comfort05.jpg')}}" alt=""></div>
                <div class="des">
                    <div class="sub-title">LEATHER SEATS*</div>
                    <div class="body-copy">The first-class experience is yours every day with Leather Seats featuring fine contrast stitching.</div>
                </div>
            </li>           
        </ul>
    </div>

    <div class="stage-contained">
        <div class="note-container">
            <div class="note-title more">DISCLAIMERS</div>
            <div class=" expand-content" style="display: none;">
                <ul class="note number">
                    <li>*V variant only. Actual model may vary in detail from image shown.</li>
                    <li>Specifications may vary in detail from images shown and are subject to change without prior notice. Features also vary according to the different variants available.</li>
                </ul>
            </div>
            
            
        </div>
    </div>

</section>

@stop
