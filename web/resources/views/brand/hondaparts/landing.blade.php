
@extends('layouts.base')


@section('content')



<section>

    <!-- banner -->
    <div class="hondapart-banner">
        <div class="text-container">
            <div class="header">Honda PARTS</div>
        </div>
    </div>

    <section class="service-tab-menu">
        <div class="menu-toggle smooth-slide">
            <input type="checkbox" id="service-tab-menu-check">
                <div class="service-tab-menu-btn">
                <label for="service-tab-menu-check">
                    <span></span>
                    <!-- <span></span>
                    <span></span> -->
                </label>
                </div>
                <ul>
                    <li style="border-bottom: 3px solid #e32119;"><a href="{{url('aftersales/honda-parts')}}">Honda PARTS</a></li>
                    <li><a href="{{url('aftersales/honda-parts/faq')}}">FAQ</a></li>
                </ul>
        </div>
        <div class="clearfix"></div>
    </section>

    <!-- description -->
    <div class="desc-fold maxwidth783">
        <h2>BROWSE Honda’s PARTS</h2>
        <div class="desc-copy removetransform">All Honda parts are developed with the Honda vehicle and made to the highest quality standards to ensure the reliability of your vehicle.</div>
    </div>

</section>

<section class="maxw1200">
    {{-- THIS PROBABLY A NEW CONTENT TYPE FOR PAGE BUILDER --}}
        <div class="comp-tabbed-content">
            <div class="tab-nav top-line-gap">
                <ul class="body-copy">
                    <li class="thetab animate maintenance active" onclick="opentab(event, 'maintenance')">Maintenance</li>
                    <li class="thetab animate valueadded" onclick="opentab(event, 'valueAdded')">Value Added Products</li>
                </ul>
            </div>
            <div class="clearfix"></div>

            <div class="tab-content">

                <div id="maintenance" class="tab-body">
                    <div class="hondaparts-boxrow">
                        <div class="hondaparts-box">
                            <div class="img-sec img-sec-fullwidth centerdiv">
                                <img src="{{url('img/hondaParts/01_Parts_Landing_Maintenance/BrakePad_Shoe.png')}}" alt="">
                            </div>
                            <h2 class="h60 textalignleft" style="font-size:18px;letter-spacing: 0.57px;">Brake Pad & Shoe</h2>
                            <a href="{{url('aftersales/honda-parts/maintenance/bps')}}"><div class="cta textalignleft">LEARN MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div></a>
                        </div>
                        <div class="hondaparts-box">
                            <div class="img-sec img-sec-fullwidth centerdiv">
                                <img src="{{url('img/hondaParts/01_Parts_Landing_Maintenance/WiperBlades.png')}}" alt="">
                            </div>
                            <h2 class="h60 textalignleft" style="font-size:18px;letter-spacing: 0.57px;">Wiper Blades</h2>
                            <a href="{{url('aftersales/honda-parts/maintenance/wb')}}"><div class="cta textalignleft">LEARN MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div></a>
                        </div>
                        <div class="hondaparts-box">
                            <div class="img-sec img-sec-fullwidth centerdiv">
                                <img src="{{url('img/hondaParts/01_Parts_Landing_Maintenance/RecommendedBatteries.png')}}" alt="">
                            </div>
                            <h2 class="h60 textalignleft" style="font-size:18px;letter-spacing: 0.57px;">Recommended Batteries</h2>
                            <a href="{{url('aftersales/honda-parts/maintenance/rb')}}"><div class="cta textalignleft">LEARN MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div></a>
                        </div>
                        <div class="hondaparts-box">
                            <div class="img-sec img-sec-fullwidth centerdiv">
                                <img src="{{url('img/hondaParts/01_Parts_Landing_Maintenance/GenuineBatteries.png')}}" alt="">
                            </div>
                            <h2 class="h60 textalignleft" style="font-size:18px;letter-spacing: 0.57px;">Genuine Batteries</h2>
                            <a href="{{url('aftersales/honda-parts/maintenance/gb')}}"><div class="cta textalignleft">LEARN MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div></a>
                        </div>
                        <div class="hondaparts-box">
                            <div class="img-sec img-sec-fullwidth centerdiv">
                                <img src="{{url('img/hondaParts/01_Parts_Landing_Maintenance/RecommendedTyres.jpg')}}" alt="">
                            </div>
                            <h2 class="h60 textalignleft" style="font-size:18px;letter-spacing: 0.57px;">Genuine / Recommended Tyres</h2>
                            <a href="{{url('aftersales/honda-parts/maintenance/grt')}}"><div class="cta textalignleft">LEARN MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div></a>
                        </div>
                        <div class="hondaparts-box">
                            <div class="img-sec img-sec-fullwidth centerdiv">
                                <img src="{{url('img/hondaParts/01_Parts_Landing_Maintenance/gel_thumb.jpg')}}" alt="">
                            </div>
                            <h2 class="h60 textalignleft" style="font-size:18px;letter-spacing: 0.57px;">Genuine Engine Lubricant</h2> 
                            <a href="{{url('aftersales/honda-parts/maintenance/gel')}}"><div class="cta textalignleft">LEARN MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div></a>
                        </div>
                        <div class="hondaparts-box">
                            <div class="img-sec img-sec-fullwidth centerdiv">
                                <img src="{{url('img/hondaParts/01_Parts_Landing_Maintenance/GenuineOilFilter.png')}}" alt="">
                            </div>
                            <h2 class="h60 textalignleft" style="font-size:18px;letter-spacing: 0.57px;">Genuine Oil Filter</h2>
                            <a href="{{url('aftersales/honda-parts/maintenance/gof')}}"><div class="cta textalignleft">LEARN MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div></a>
                        </div>
                        <div class="hondaparts-box">
                            <div class="img-sec img-sec-fullwidth centerdiv">
                                <img src="{{url('img/hondaParts/01_Parts_Landing_Maintenance/GenuineLongLifeCoolant.png')}}" alt="">
                            </div>
                            <h2 class="h60 textalignleft" style="font-size:18px;letter-spacing: 0.57px;">Genuine Long-Life Coolant</h2>
                            <a href="{{url('aftersales/honda-parts/maintenance/llc')}}"><div class="cta textalignleft">LEARN MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div></a>
                        </div>
                        <div class="hondaparts-box">
                            <div class="img-sec img-sec-fullwidth centerdiv">
                                <img src="{{url('img/hondaParts/01_Parts_Landing_Maintenance/GenuineSparkPlugs.png')}}" alt="">
                            </div>
                            <h2 class="h60 textalignleft" style="font-size:18px;letter-spacing: 0.57px;">Genuine Spark Plugs</h2>
                            <a href="{{url('aftersales/honda-parts/maintenance/gsp')}}"><div class="cta textalignleft">LEARN MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div></a>
                        </div>
                        <div class="hondaparts-box">
                            <div class="img-sec img-sec-fullwidth centerdiv">
                                <img src="{{url('img/hondaParts/01_Parts_Landing_Maintenance/GenuineAirCleaner.png')}}" alt="">
                            </div>
                            <h2 class="h60 textalignleft" style="font-size:18px;letter-spacing: 0.57px;">Genuine Air Cleaner</h2>
                            <a href="{{url('aftersales/honda-parts/maintenance/gac')}}"><div class="cta textalignleft">LEARN MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div></a>
                        </div>
                        <div class="hondaparts-box">
                            <div class="img-sec img-sec-fullwidth centerdiv">
                                <img src="{{url('img/hondaParts/01_Parts_Landing_Maintenance/GenuineTransmissionFluids.png')}}" alt="">
                            </div>
                            <h2 class="h60 textalignleft" style="font-size:18px;letter-spacing: 0.57px;">Genuine Transmission Fluids</h2>
                            <a href="{{url('aftersales/honda-parts/maintenance/gtf')}}"><div class="cta textalignleft">LEARN MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div></a>
                        </div>
                    </div>
                </div>

                <div id="valueAdded" class="tab-body" style="display:none;">

                
                <div class="hondaparts-boxrow">   
                            <div class="hondaparts-box">
                                <div class="img-sec img-sec-fullwidth centerdiv">
                                  <img
                                    src="{{url('img/hondaParts/02_Parts_Landing_ValueAdded/High Performance Engine Cleaner.png')}}"
                                    alt=""
                                  />
                                </div>
                                <h2 class="h60 textalignleft" style="font-size: 18px; letter-spacing: 0.57px">
                                  High Performance Engine Cleaner
                                </h2>
                                <a href="{{url('aftersales/honda-parts/value-added-products/hpec')}}"
                                  ><div class="cta textalignleft">
                                    LEARN MORE<img
                                      src="{{url('img/interface/arrow-short-right-red.svg')}}"
                                    /></div
                                ></a>
                              </div>
                              <div class="hondaparts-box">
                                <div class="img-sec img-sec-fullwidth centerdiv">
                                  <img
                                    src="{{url('img/hondaParts/02_Parts_Landing_ValueAdded/Air-Cond Evaporator Cleaner.png')}}"
                                    alt=""
                                  />
                                </div>
                                <h2 class="h60 textalignleft" style="font-size: 18px; letter-spacing: 0.57px">
                                  Air-Cond Evaporator Cleaner
                                </h2>
                                <a href="{{url('aftersales/honda-parts/value-added-products/acec')}}"
                                  ><div class="cta textalignleft">
                                    LEARN MORE<img
                                      src="{{url('img/interface/arrow-short-right-red.svg')}}"
                                    /></div
                                ></a>
                              </div>
                              <div class="hondaparts-box">
                                <div class="img-sec img-sec-fullwidth centerdiv">
                                  <img
                                    src="{{url('img/hondaParts/02_Parts_Landing_ValueAdded/Charcoal Air Filter.png')}}"
                                    alt=""
                                  />
                                </div>
                                <h2 class="h60 textalignleft" style="font-size: 18px; letter-spacing: 0.57px">
                                  Charcoal Air Filter
                                </h2>
                                <a href="{{url('aftersales/honda-parts/value-added-products/caf')}}"
                                  ><div class="cta textalignleft">
                                    LEARN MORE<img
                                      src="{{url('img/interface/arrow-short-right-red.svg')}}"
                                    /></div
                                ></a>
                              </div>
                              <div class="hondaparts-box">
                                <div class="img-sec img-sec-fullwidth centerdiv">
                                  <img
                                    src="{{url('img/hondaParts/02_Parts_Landing_ValueAdded/Honda Authorised Window Tint Film no3m.png')}}"
                                    alt=""
                                  />
                                </div>
                                <h2 class="h60 textalignleft" style="font-size: 18px; letter-spacing: 0.57px">
                                  Honda Authorised Window Tint Film
                                </h2>
                                <a href="{{url('aftersales/honda-parts/value-added-products/ecotint')}}"
                                  ><div class="cta textalignleft">
                                    LEARN MORE<img
                                      src="{{url('img/interface/arrow-short-right-red.svg')}}"
                                    /></div
                                ></a>
                              </div>
                              <div class="hondaparts-box">
                                <div class="img-sec img-sec-fullwidth centerdiv">
                                  <img
                                    src="{{url('img/hondaParts/02_Parts_Landing_ValueAdded/Ultra Glass Body Coating.png')}}"
                                    alt=""
                                  />
                                </div>
                                <h2 class="h60 textalignleft" style="font-size: 18px; letter-spacing: 0.57px">
                                  Ultra Glass Body Coating
                                </h2>
                                <a href="{{url('aftersales/honda-parts/value-added-products/ugbc')}}"
                                  ><div class="cta textalignleft">
                                    LEARN MORE<img
                                      src="{{url('img/interface/arrow-short-right-red.svg')}}"
                                    /></div
                                ></a>
                              </div>
                              <div class="hondaparts-box">
                                <div class="img-sec img-sec-fullwidth centerdiv">
                                  <img
                                    src="{{url('img/hondaParts/02_Parts_Landing_ValueAdded/Ultra Window Coating .png')}}"
                                    alt=""
                                  />
                                </div>
                                <h2 class="h60 textalignleft" style="font-size: 18px; letter-spacing: 0.57px">
                                  Ultra Window Coating
                                </h2>
                                <a href="{{url('aftersales/honda-parts/value-added-products/uwc')}}"
                                  ><div class="cta textalignleft">
                                    LEARN MORE<img
                                      src="{{url('img/interface/arrow-short-right-red.svg')}}"
                                    /></div
                                ></a>
                              </div>
                              <div class="hondaparts-box">
                                <div class="img-sec img-sec-fullwidth centerdiv">
                                  <img
                                    src="{{url('img/hondaParts/02_Parts_Landing_ValueAdded/Wheel Lock Nut.png')}}"
                                    alt=""
                                  />
                                </div>
                                <h2 class="h60 textalignleft" style="font-size: 18px; letter-spacing: 0.57px">
                                  Wheel Lock Nut
                                </h2>
                                <a href="{{url('aftersales/honda-parts/value-added-products/wln')}}"
                                  ><div class="cta textalignleft">
                                    LEARN MORE<img
                                      src="{{url('img/interface/arrow-short-right-red.svg')}}"
                                    /></div
                                ></a>
                              </div>
                              <div class="hondaparts-box">
                                <div class="img-sec img-sec-fullwidth centerdiv">
                                  <img
                                    src="{{url('img/hondaParts/02_Parts_Landing_ValueAdded/Instant Tire Repair Kit.png')}}"
                                    alt=""
                                  />
                                </div>
                                <h2 class="h60 textalignleft" style="font-size: 18px; letter-spacing: 0.57px">
                                  Instant Tyre Repair Kit
                                </h2>
                                <a href="{{url('aftersales/honda-parts/value-added-products/itrk')}}"
                                  ><div class="cta textalignleft">
                                    LEARN MORE<img
                                      src="{{url('img/interface/arrow-short-right-red.svg')}}"
                                    /></div
                                ></a>
                              </div>
                              <div class="hondaparts-box">
                                <div class="img-sec img-sec-fullwidth centerdiv">
                                  <img
                                    src="{{url('img/hondaParts/02_Parts_Landing_ValueAdded/Digital Video Recorder.png')}}"
                                    alt=""
                                  />
                                </div>
                                <h2 class="h60 textalignleft" style="font-size: 18px; letter-spacing: 0.57px">
                                  Digital Video Recorder
                                </h2>
                                <a href="{{url('aftersales/honda-parts/value-added-products/dvr')}}"
                                  ><div class="cta textalignleft">
                                    LEARN MORE<img
                                      src="{{url('img/interface/arrow-short-right-red.svg')}}"
                                    /></div
                                ></a>
                              </div>
                              <div class="hondaparts-box">
                                <div class="img-sec img-sec-fullwidth centerdiv">
                                  <img
                                    src="{{url('img/hondaParts/02_Parts_Landing_ValueAdded/Engine Oil Treatment.png')}}"
                                    alt=""
                                  />
                                </div>
                                <h2 class="h60 textalignleft" style="font-size: 18px; letter-spacing: 0.57px">
                                  Engine Oil Treatment
                                </h2>
                                <a href="{{url('aftersales/honda-parts/value-added-products/eot')}}"
                                  ><div class="cta textalignleft">
                                    LEARN MORE<img
                                      src="{{url('img/interface/arrow-short-right-red.svg')}}"
                                    /></div
                                ></a>
                              </div>
                              <div class="hondaparts-box">
                                <div class="img-sec img-sec-fullwidth centerdiv">
                                  <img
                                    src="{{url('img/hondaParts/02_Parts_Landing_ValueAdded/aircondadditive-thumbnail.jpg')}}"
                                    alt=""
                                  />
                                </div>
                                <h2 class="h60 textalignleft" style="font-size: 18px; letter-spacing: 0.57px">
                                  Air-Cond Additive
                                </h2>
                                <a href="{{url('aftersales/honda-parts/value-added-products/air-con-additive')}}"
                                  ><div class="cta textalignleft">
                                    LEARN MORE<img
                                      src="{{url('img/interface/arrow-short-right-red.svg')}}"
                                    /></div
                                ></a>
                              </div>
                              <div class="hondaparts-box">
                                <div class="img-sec img-sec-fullwidth centerdiv">
                                  <img
                                    src="{{url('img/hondaParts/02_Parts_Landing_ValueAdded/vap-car-body-conditioner-thumbnail.png')}}"
                                    alt=""
                                  />
                                </div>
                                <h2 class="h60 textalignleft" style="font-size: 18px; letter-spacing: 0.57px">
                                  Car Body Conditioner
                                </h2>
                                <a href="{{url('aftersales/honda-parts/value-added-products/vap')}}"
                                  ><div class="cta textalignleft">
                                    LEARN MORE<img
                                      src="{{url('img/interface/arrow-short-right-red.svg')}}"
                                    /></div
                                ></a>
                              </div>
                              
                        </div>

                            <!-- <div class="hondaparts-box">
                                <div class="img-sec img-sec-fullwidth centerdiv">
                                    <img src="{{url('img/hondaParts/02_Parts_Landing_ValueAdded/Interior_Disinfectant.png')}}" alt="">
                                </div>
                                <h2 class="h60 textalignleft" style="font-size:18px;letter-spacing: 0.57px;">Car Interior Disinfectant (500ml) Spray Bottle</h2>
                                <a href="{{url('aftersales/honda-parts/value-added-products/hcid')}}"><div class="cta textalignleft">LEARN MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div></a>
                            </div>


                       

                        <div class="hondaparts-box">
                            <div class="img-sec img-sec-fullwidth centerdiv">
                                <img src="{{url('img/hondaParts/02_Parts_Landing_ValueAdded/High Performance Engine Cleaner.png')}}" alt="">
                            </div>
                            <h2 class="h60 textalignleft" style="font-size:18px;letter-spacing: 0.57px;">High Performance Engine Cleaner</h2>
                            <a href="{{url('aftersales/honda-parts/value-added-products/hpec')}}"><div class="cta textalignleft">LEARN MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div></a>
                        </div>
                        <div class="hondaparts-box">
                            <div class="img-sec img-sec-fullwidth centerdiv">
                                <img src="{{url('img/hondaParts/02_Parts_Landing_ValueAdded/Air-Cond Evaporator Cleaner.png')}}" alt="">
                            </div>
                            <h2 class="h60 textalignleft" style="font-size:18px;letter-spacing: 0.57px;">Air-Cond Evaporator Cleaner</h2>
                            <a href="{{url('aftersales/honda-parts/value-added-products/acec')}}"><div class="cta textalignleft">LEARN MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div></a>
                        </div>
                        <div class="hondaparts-box">
                            <div class="img-sec img-sec-fullwidth centerdiv">
                                <img src="{{url('img/hondaParts/02_Parts_Landing_ValueAdded/Charcoal Air Filter.png')}}" alt="">
                            </div>
                            <h2 class="h60 textalignleft" style="font-size:18px;letter-spacing: 0.57px;">Charcoal Air Filter</h2>
                            <a href="{{url('aftersales/honda-parts/value-added-products/caf')}}"><div class="cta textalignleft">LEARN MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div></a>
                        </div>
                        <div class="hondaparts-box">
                            <div class="img-sec img-sec-fullwidth centerdiv">
                                <img src="{{url('img/hondaParts/02_Parts_Landing_ValueAdded/Honda Authorised Window Tint Film no3m.png')}}" alt="">
                            </div>
                            <h2 class="h60 textalignleft" style="font-size:18px;letter-spacing: 0.57px;">Honda Authorised Window Tint Film</h2>
                            <a href="{{url('aftersales/honda-parts/value-added-products/ecotint')}}"><div class="cta textalignleft" style="float:left;padding-left:0px;margin-top: 5px;">ECOTINT<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div></a>
                        </div>
                        <div class="hondaparts-box">
                            <div class="img-sec img-sec-fullwidth centerdiv">
                                <img src="{{url('img/hondaParts/02_Parts_Landing_ValueAdded/Ultra Glass Body Coating.png')}}" alt="">
                            </div>
                            <h2 class="h60 textalignleft" style="font-size:18px;letter-spacing: 0.57px;">Ultra Glass Body Coating</h2>
                            <a href="{{url('aftersales/honda-parts/value-added-products/ugbc')}}"><div class="cta textalignleft">LEARN MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div></a>
                        </div>
                        <div class="hondaparts-box">
                            <div class="img-sec img-sec-fullwidth centerdiv">
                                <img src="{{url('img/hondaParts/02_Parts_Landing_ValueAdded/Ultra Window Coating .png')}}" alt="">
                            </div>
                            <h2 class="h60 textalignleft" style="font-size:18px;letter-spacing: 0.57px;">Ultra Window Coating </h2>
                            <a href="{{url('aftersales/honda-parts/value-added-products/uwc')}}"><div class="cta textalignleft">LEARN MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div></a>
                        </div>
                        <div class="hondaparts-box">
                            <div class="img-sec img-sec-fullwidth centerdiv">
                                <img src="{{url('img/hondaParts/02_Parts_Landing_ValueAdded/Wheel Lock Nut.png')}}" alt="">
                            </div>
                            <h2 class="h60 textalignleft" style="font-size:18px;letter-spacing: 0.57px;">Wheel Lock Nut</h2>
                            <a href="{{url('aftersales/honda-parts/value-added-products/wln')}}"><div class="cta textalignleft">LEARN MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div></a>
                        </div>
                        <div class="hondaparts-box">
                            <div class="img-sec img-sec-fullwidth centerdiv">
                                <img src="{{url('img/hondaParts/02_Parts_Landing_ValueAdded/Instant Tire Repair Kit.png')}}" alt="">
                            </div>
                            <h2 class="h60 textalignleft" style="font-size:18px;letter-spacing: 0.57px;">Instant Tyre Repair Kit</h2>
                            <a href="{{url('aftersales/honda-parts/value-added-products/itrk')}}"><div class="cta textalignleft">LEARN MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div></a>
                        </div>
                        <div class="hondaparts-box">
                            <div class="img-sec img-sec-fullwidth centerdiv">
                                <img src="{{url('img/hondaParts/02_Parts_Landing_ValueAdded/Digital Video Recorder.png')}}" alt="">
                            </div>
                            <h2 class="h60 textalignleft" style="font-size:18px;letter-spacing: 0.57px;">Digital Video Recorder</h2>
                            <a href="{{url('aftersales/honda-parts/value-added-products/dvr')}}"><div class="cta textalignleft">LEARN MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div></a>
                        </div>
                        <div class="hondaparts-box">
                            <div class="img-sec img-sec-fullwidth centerdiv">
                                <img src="{{url('img/hondaParts/02_Parts_Landing_ValueAdded/Engine Oil Treatment.png')}}" alt="">
                            </div>
                            <h2 class="h60 textalignleft" style="font-size:18px;letter-spacing: 0.57px;">Engine Oil Treatment</h2>
                            <a href="{{url('aftersales/honda-parts/value-added-products/eot')}}"><div class="cta textalignleft">LEARN MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div></a>
                        </div>
                        <div class="hondaparts-box">
                            <div class="img-sec img-sec-fullwidth centerdiv">
                                <img src="{{url('img/hondaParts/02_Parts_Landing_ValueAdded/aircondadditive-thumbnail.jpg')}}" alt="">
                            </div>
                            <h2 class="h60 textalignleft" style="font-size:18px;letter-spacing: 0.57px;">Air-Cond Additive</h2>
                            <a href="{{url('aftersales/honda-parts/value-added-products/air-con-additive')}}"><div class="cta textalignleft">LEARN MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div></a>
                        </div> -->
                    </div>
                </div>

            </div>

        </div>

        <script>
            function opentab(evt, datatarget) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tab-body");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("thetab");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(datatarget).style.display = "block";
                evt.currentTarget.className += " active";
            }


            $(document).ready(function(){

                $('.valueadded').click(function(e) {
                        $('li.valueadded').addClass('active');
                });

                // listen for deeplink
                
                var url = window.location.href
                var hash = url.split('#')[1];

                if(hash!=undefined){

                hash = hash.replace('/','');
                switch(hash) {
                    case 'valueadded':
                    $('.valueadded').trigger('click').addClass('active');
                    break;

                    default:
                    console.log('HASH: ' + hash)
                    console.log('URL: '+ url)
                }
                }
                
                
            })

        </script>

        <!-- <script>
                    $(document).ready(function(){
                        $('.comp-tabbed-content .thetab').click(function(){
                            $('.comp-tabbed-content .thetab').removeClass('active');
                            $('.comp-tabbed-content .tab-body').hide();
                            $(this).toggleClass('active');
                            $('#'+$(this).data('target')).show();

                            // mobile positioning
                            var ul = $(this).parent()
                            var ww = $(window).width();
                            var iw = ul.width();
                            console.log(ww,iw);
                            //
                            if(ww<iw){
                                ul.css('left', 0).css('transform', 'translate(0,0)');
                                ul.css('left', -$(this).offset().left + 50)
                            } else {
                                ul.css('left', '50%').css('transform', 'translate(-50%,0)');
                            }

                        })

                        $('.comp-tabbed-content .thetab:first-of-type').trigger('click');
                        $(window).resize(function(){
                            $('.comp-tabbed-content .thetab:first-of-type').trigger('click');
                        })
                    })
                </script> -->
    {{-- [END] --}}
    
        <div class="space"></div>
        <div class="space"></div>
        <h2 style="font-size: 20px;letter-spacing: 0.57px;padding: 0 10px;">SHOP SELECTED Honda PARTS AND ACCESSORIES</h2>
        <br>
        <div class="btn-container" style="text-align: center;">
            <a href="{{url('dealers')}}" class="prime-cta-white" style="background: black; color:white;">
                <span>LOCATE YOUR NEAREST DEALER</span>
                <div class="overlay"></div>
            </a>

            <a href="https://shopee.com.my/hondamalaysia.os" class="prime-cta-white" style="background: #f7432e; color:white;">
                <span>SHOP ON SHOPEE</span>
                <div class="overlay"></div>
            </a>
        </div>
        <div class="space"></div>
    <div class="space"></div>
</section>


@include('brand.hondaparts.hondaparts-style')

@stop


