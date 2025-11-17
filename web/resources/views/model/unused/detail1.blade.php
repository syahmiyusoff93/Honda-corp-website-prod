
@extends('layouts.modelinner')


@section('inner-content')

<section class="model-inner-container stage-contained">
    <div class="intro first">
        <h2>STUNNING STYLE</h2>
        <div class="intro-title grey">The City makes a statement that you have arrived. Whether coming or going, the City has style that is set to stun.</div>
    </div>

    {{-- <p>STUN THEM ALL
        Be prepared for the stares. Now that the City is better than ever before, admiring glances are sure to follow.
        </p> --}}

    <div class="details-container">
        <ul class="flex">
            {{-- <li>
                <div class="photo"><img src="{{url('img/mock/2019_CITY_Features_Styling01.jpg')}}" alt=""></div>
                <div class="des">
                    <div class="sub-title">STUN THEM ALL</div>
                    <div class="body-copy">Be prepared for the stares. Now that the City is better than ever before, admiring glances are sure to follow.</div>
                </div>
            </li> --}}

            <li>
                <div class="photo"><img src="{{url('img/mock/2019_CITY_Features_Styling01.jpg')}}" alt=""></div>
                <div class="des">
                    <div class="sub-title">LED HEADLIGHTS* WITH LED DAYTIME RUNNING LIGHTS</div>
                    <div class="body-copy">The City's LED headlights are equipped with LED DRL for better energy efficiency and brightness. </div>
                </div>
            </li>

            <li>
                <div class="photo"><img src="{{url('img/mock/2019_CITY_Features_Styling02.jpg')}}" alt=""></div>
                <div class="des">
                    <div class="sub-title">LED TAILLIGHTS*</div>
                    <div class="body-copy">Perfected with sleek LED, the taillights make the City even more dazzling.</div>
                </div>
            </li>

            <li>
                <div class="photo"><img src="{{url('img/mock/2019_CITY_Features_Styling03.jpg')}}" alt=""></div>
                <div class="des">
                    <div class="sub-title">DUCKTAIL SPOILER WITH LED BRAKE LIGHT*</div>
                    <div class="body-copy">Striking even from the rear, the City is now enhanced with a Ducktail Spoiler with built-in brake light.</div>
                </div>
            </li>

            <li>
                <div class="photo"><img src="{{url('img/mock/2019_CITY_Features_Styling04.jpg')}}" alt=""></div>
                <div class="des">
                    <div class="sub-title">MULTI-ANGLE REVERSE CAMERA**</div>
                    <div class="body-copy">Choose from three angles to get a complete view of your surroundings when you reverse.</div>
                </div>
            </li>

            <li>
                <div class="photo"><img src="{{url('img/mock/2019_CITY_Features_Styling05.jpg')}}" alt=""></div>
                <div class="des">
                    <div class="sub-title">SHARK FIN ANTENNA</div>
                    <div class="body-copy">The Shark Fin Antenna ramps up the style of your City.</div>
                </div>
            </li>

            <li>
                <div class="photo"><img src="{{url('img/mock/2019_CITY_Features_Styling06.jpg')}}" alt=""></div>
                <div class="des">
                    <div class="sub-title">AUTO RETRACTABLE SIDE MIRRORS WITH TURNING LIGHTS**</div>
                    <div class="body-copy">Mirrors automatically fold when the car is locked or unlocked, and turning lights alert drivers to the car’s movements.</div>
                </div>
            </li>

            <li>
                <div class="photo"><img src="{{url('img/mock/2019_CITY_Features_Styling07.jpg')}}" alt=""></div>
                <div class="des">
                    <div class="sub-title">DUAL TONE ALLOY WHEELS</div>
                    <div class="body-copy">A stylish set of multi-spoke Alloy Wheels in a dual tone design captivate at first glance.</div>
                </div>
            </li>

            <li>
                <div class="photo"><img src="{{url('img/mock/2019_CITY_Features_Styling08.png')}}" alt=""></div>
                <div class="des">
                    <div class="sub-title">LED FRONT FOG LIGHTS*</div>
                    <div class="body-copy">When you need greater visibility, switch these on to light your way further.</div>
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
