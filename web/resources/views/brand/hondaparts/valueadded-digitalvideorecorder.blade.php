
@extends('layouts.base')
@section('content')

<style>
     .desc-copy {
        text-align: center;
        font-size: 1rem;
        color: #5e6063;
        letter-spacing: 0.25px;
        line-height: 1.75rem;
        font-weight: 400;
        max-width: 780px;
        margin: auto;
    }

    .desc-copy.bold { color:#000000 !important; font-weight: bold; }

    .line-breaker {
        width: 785px;
        height: 1px;
        opacity: 0.7;
        background-color: #d8d8d8;
        margin: auto;
    }

    .hondaparts-box {
        float: left;
        /* width: 25%; */
        padding: 20px;
    }

    .hondaparts-box.w50perc {
        width: 50%;
        float: left;
    }

    .hondaparts-boxrow:after {
        content: "";
        display: table;
        clear: both;
    }

    .desc-copy.dvrfooter { 
        font-size: 14px;
        color: #000000;
       /* text-align: left;*/
       text-align: center;
     }
    .desc-copy.tnc {
        font-size: 12px;
        /* text-align: right;*/
        text-align: center;
    }

    .hondaparts-box img {
        margin: auto ;
        max-width: 140px;
    }

    .one-img-size img {
         /*max-width: 148px;*/
         margin: auto;
         padding-bottom: 20px;
    }

    .hcid-footer-img  {
        padding-top: 30px;
        text-align: center;
    }

    .hcid-footer-img img {
        margin: auto;
        max-width: 660px;
        width: 100%;
    }

    .showmobile {
        display: none;
    }

    .hondaparts-box-tnc {
            padding-top: 0px  !important;
     }

     .hondaparts-box-dvrfooter {
             padding-bottom: 0px !important;
     }

     .hondaparts-box .desc-copy {
        line-height: 1.571em;
        letter-spacing: 0.6px;
    }


    @media  only screen and (max-width: 480px) {
        .one-img-size img {
             max-width: 100px;
             
        }

        .desc-copy.dvrfooter {
           font-size: 24px;
           text-align: center;
           padding-bottom: 0px;
           font-weight: 500;

        }
        .desc-copy.tnc {
            font-size: 12px;
            text-align: center;
            padding-top: 0px;
             max-width: 290px;
             font-weight: 500;
        }

        .hondaparts-box-tnc {
            padding-top: 0px  !important;
        }

        .hondaparts-box-dvrfooter {
             padding-bottom: 0px !important;
        }

        .hidemobile {
            display: none;
        }

        .showmobile {
            display: block;
        }
    }

</style>

<div style="height: 50px;background: #191616;">
        <a href="{{url('aftersales/honda-parts')}}" class="">
            <div style="padding: 15px 30px;font-size: 12px;">
                <img src="{{url('img/interface/back-icon.svg')}}" alt="Back link">
                <span class="backtocopy" style="color: #fff;padding: 0 5px;width:unset;bottom:3px;">BACK TO Honda PARTS</span>
            </div>
        </a>
</div>
<section class="maxw1200">
    <div class="space"></div>
    <div class="img-sec one-img-size centerdiv">
        <img src="https://honda.com.my/img/hondaParts/04_ValueAdded/Digital_Video_Recorder/DigitalVideoRecorder.png" alt="">
    </div>
    <h2 class="bold" style="margin-bottom:0;">DIGITAL VIDEO RECORDER</h2>
    <div class="space"></div>
    <div class="line-breaker"></div>
    <div class="space"></div>
    <div class="maxwidth785">
        <h2>Capture Videos of Your<br class="showmobile"> Journey for Safety and Emergency&nbsp;Purposes</h2>
        
        <div class="space hidemobile"></div>

        <div class="hondaparts-boxrow" style="max-width: 600px;margin: auto;">
            <div class="hondaparts-box w50perc">
                <div class="img-sec img-sec-fullwidth centerdiv">
                    <img src="https://honda.com.my/img/hondaParts/04_ValueAdded/Digital_Video_Recorder/IMG01.png" alt="">
                </div>
                <div class="desc-copy bold">High Definition (1080p)</div>
            </div>
            
            <div class="hondaparts-box w50perc">
                <div class="img-sec img-sec-fullwidth centerdiv">
                    <img src="https://www.honda.com.my/img/hondaParts/04_ValueAdded/Digital_Video_Recorder/IMG02.png" alt="">
                </div>
                <div class="desc-copy bold">Emergency Video <br>Auto Locking</div>
            </div>

            <div class="hondaparts-box w50perc">
                <div class="img-sec img-sec-fullwidth centerdiv">
                    <img src="https://www.honda.com.my/img/hondaParts/04_ValueAdded/Digital_Video_Recorder/IMG03.png" alt="">
                </div>
                <div class="desc-copy bold">Capture Scenic View On<br>Your Journey</div>
            </div>
            
            

            <div class="hondaparts-box w50perc">
                <div class="img-sec img-sec-fullwidth centerdiv">
                    <img src="https://www.honda.com.my/img/hondaParts/04_ValueAdded/Digital_Video_Recorder/IMG04.png" alt="">
                </div>
                <div class="desc-copy bold">HD Photography<br>&nbsp;</div>
            </div>

            <div class="hondaparts-box w50perc">
                <div class="img-sec img-sec-fullwidth centerdiv">
                    <img src="https://www.honda.com.my/img/hondaParts/04_ValueAdded/Digital_Video_Recorder/IMG05.png" alt="">
                </div>
                <div class="desc-copy bold">Phone Connectivity<br>Through App</div>
            </div>

            <div class="hondaparts-box w50perc">
                <div class="img-sec img-sec-fullwidth centerdiv">
                    <img src="https://www.honda.com.my/img/hondaParts/04_ValueAdded/Digital_Video_Recorder/IMG06.png" alt="">
                </div>
                <div class="desc-copy bold">Audio Recording<br>&nbsp;</div>
            </div>

            <div class="hondaparts-box w50perc">
                <div class="img-sec img-sec-fullwidth centerdiv">
                    <img src="https://www.honda.com.my/img/hondaParts/04_ValueAdded/Digital_Video_Recorder/IMG07.png" alt="">
                </div>
                <div class="desc-copy bold">24/7<br>Standby Mode</div>
            </div><div class="hondaparts-box w50perc">
                <div class="img-sec img-sec-fullwidth centerdiv">
                    <img src="https://www.honda.com.my/img/hondaParts/04_ValueAdded/Digital_Video_Recorder/IMG08.png" alt="">
                </div>
                <div class="desc-copy bold">3 Years Warranty or<br> 100,000km Mileage</div>
            </div>
        </div>
    </div>
    <div class="space"></div>
    <div class="maxwidth785">
            <br>
            <div class="line-breaker"></div>
            <br>
            <br class="hidemobile">
            <div class="hondaparts-boxrow">
                <div class="hondaparts-box hondaparts-box-dvrfooter w70perc" style="width:100%">
                     <div class="desc-copy dvrfooter">Available for all Honda&nbsp;car&nbsp;models.</div>
                </div>
                <div class="hondaparts-box hondaparts-box-tnc w30perc" style="width:100%">
                      <div class="desc-copy tnc"><br>Installation of this accessory will not affect your car warranty as it is done by a Honda&nbsp;Authorised&nbsp;Dealer. <br class="showmobile"><br class="showmobile">The&nbsp;warranty&nbsp;for this accessory is subject to Honda's authorised suppliers' terms&nbsp;and&nbsp;conditions. <br class="showmobile"><br class="showmobile">Kindly&nbsp;contact&nbsp;the&nbsp;nearest Honda Authorised Dealer for warranty&nbsp;information.</div>
                <br><br><br>
                </div>
            </div>
       </div>
    
</section>


@include('brand.hondaparts.hondaparts-style')

@stop


