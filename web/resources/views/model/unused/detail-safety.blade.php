
@extends('layouts.modelinner')


@section('inner-content')

<section class="model-inner-container stage-contained">
    <div class="intro first">
        <h2>STUNNING SAFETY </h2>
        <div class="intro-title grey">Safeguarded with a host of safety features, the City leaves you free to fully enjoy the drive.</div>
    </div>    

    <div class="details-container">
        <ul class="flex">
            <li>
                <div class="photo"><img src="{{url('img/mock/2019_CITY_Features_Safety01.jpg')}}" alt=""></div>
                <div class="des">
                    <div class="sub-title">VEHICLE STABILITY ASSIST (VSA)</div>
                    <div class="body-copy">When taking sharp corners, the VSA system stabilises the vehicle by reducing under or oversteer.</div>
                </div>
            </li>

            <li>
                <div class="photo"><img src="{{url('img/mock/2019_CITY_Features_Safety02.jpg')}}" alt=""></div>
                <div class="des">
                    <div class="sub-title">6 AIRBAGS*</div>
                    <div class="body-copy">All-round protection comes from Dual Front Airbags, Side Airbags and Side Curtain Airbags.</div>
                </div>
            </li>

            <li>
                <div class="photo"><img src="{{url('img/mock/2019_CITY_Features_Safety03.jpg')}}" alt=""></div>
                <div class="des">
                    <div class="sub-title">G-FORCE CONTROL (G-CON) </div>
                    <div class="body-copy">Honda's advanced technology creates a body frame which absorbs impacts to minimise injuries to passengers during a collision.</div>
                </div>
            </li>

            <li>
                <div class="photo"><img src="{{url('img/mock/2019_CITY_Features_Safety04.jpg')}}" alt=""></div>
                <div class="des">
                    <div class="sub-title">ANTI-LOCK BRAKING SYSTEM (ABS)</div>
                    <div class="body-copy">Prevents the wheels from locking up during emergency braking situations for better vehicle control.</div>
                </div>
            </li>

            <li>
                <div class="photo"><img src="{{url('img/mock/2019_CITY_Features_Safety05.jpg')}}" alt=""></div>
                <div class="des">
                    <div class="sub-title">HILL START ASSIST (HSA)</div>
                    <div class="body-copy">Helps to prevent the car from rolling backwards when the brakes are released on an incline.</div>
                </div>
            </li>

            <li>
                <div class="photo"><img src="{{url('img/mock/2019_CITY_Features_Safety06.jpg')}}" alt=""></div>
                <div class="des">
                    <div class="sub-title">EMERGENCY STOP SIGNAL (ESS)</div>
                    <div class="body-copy">Sudden braking activates the flashing of hazard lights as a warning to other drivers.</div>
                </div>
            </li>

            <li>
                <div class="photo"><img src="{{url('img/mock/2019_CITY_Features_Safety07.jpg')}}" alt=""></div>
                <div class="des">
                    <div class="sub-title">ISO FIX</div>
                    <div class="body-copy">Safely install child car seats with ISO Fix, the global standard for child car seat safety.</div>
                </div>
            </li>

            <li>
                <div class="photo"><img src="{{url('img/mock/2019_CITY_Features_Safety08.jpg')}}" alt=""></div>
                <div class="des">
                    <div class="sub-title">3-POINT ELR SEAT BELTS</div>
                    <div class="body-copy">Seat belt pretensioner prevents forward motion while load limiters reduce pressure on the chest.</div>
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
