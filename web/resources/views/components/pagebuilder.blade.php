{{--

    SAI: REQUIRE $pagedata from controller/parent

    Pagebuilder functions declared in app/Helpers/CommonFunctions.php

    --}}



<section class="model-inner-container stage-contained">

    @php
        // output special contents before the page contents - sai 20191112

        switch($inner_section){
            case 'exterior':
                    @endphp

                    <script>
                        var canvas360_enable_accessories = false;
                        var color_viewtype='exterior';
                    </script>


                    <div class="intro first-ext-int">
                        @if(config('global.STAGE')=='live' || true)
                            @include('model.component.exterior-360')
                        @else
                            @include('model.component.exterior-360-local')
                        @endif

                    </div>

                    <style>
                        /* re-layout for accessories 360 */

                        .model-inner-container .inner-color-container {margin-top: 120px; text-align: unset;}
                        /* .exterior-holder, .modelexterior {float:right;right:20%;margin-top: -2%;} */
                        .modelexterior {left: unset; width: unset; height: unset;}
                        .color-option-holder {margin-top: 20px;}
                        .colorpickerdisclaimer {text-align: center;}
                        .packages-title-page {margin-top: 80px;margin-bottom: -10px;}
                        .secondary-title {display: none;}
                    </style>

                    @php
                break;

            case 'interior':
                @endphp
                @if ($model_slug!='')
                    @if($model_slug!='crv' && $model_slug!='city-hatchback' && $model_slug!='civic' && $model_slug!='hrv')
                    <div class="intro first-ext-int">
                            <iframe src="{{ url('vr/'.$model_slug.'/interior') }}" frameborder="0" width="100%" height="500"></iframe>
                    </div>
                    @endif
                @endif

                @php
            break;

        }

        // then go ahead generate the content rows

        foreach($pagedata as $item){
            //dd($item);

            switch(@$item->content_type){

                case 'shortcode':
                    echo ($item);
                    break;

                case 'headercopy':
                    echo __generate_html_header($item);
                    break;

                case 'img-full':
                    echo __generate_html_fullwidthimg($item);
                    break;

                case 'img-card-3col':
                case 'img-card':
                    echo __generate_html_3colcards($item);
                    break;

                case 'footnote':
                    echo __generate_html_footnote($item);
                    break;
                case 'code':
                    echo __generate_html_code($item);
                    break;
            }
        }

    @endphp

    {{--  <div class="intro first">
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
    </div>  --}}

</section>
