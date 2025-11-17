
@extends('layouts.base')

@section('page-title')
    360 HD Camera
@stop

@section('content')

    <style>

    .centerdiv {
        margin: auto;
        margin-top: 20px;
        margin-bottom: 20px;
        text-align: center;
    }

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

    .line-breaker {
        width: 785px;
        height: 1px;
        opacity: 0.7;
        background-color: #d8d8d8;
        margin: auto;
    }

    .maxwidth785 {
        max-width: 785px;
        margin: auto;
    }

    .desc-copy.bold { color:#000000 !important; font-weight: bold; }

    .desc-copy.cam360footer { 
        font-size: 24px;
        color: #282A2F;
        /* text-align: left; */
        text-align: center;
        padding-bottom: 25px;
        font-weight: 500;
        letter-spacing: 2.88px;
    
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

     .hondaparts-box-cam360footer {
             padding-bottom: 0px !important;
     }


     .hondaparts-box.w50perc {
        width: 50%;
    }

    .hondaparts-box {
        float: left;
        padding: 20px;
    }

    .hondaparts-boxrow:after {
        content: "";
        display: table;
        clear: both;
    }

    .hondaparts-box .desc-copy {
        line-height: 1.571em;
        letter-spacing: 0.6px;
    }

    @media    only screen and (max-width: 480px) {
        .one-img-size img {
             max-width: 330px;
             
        }

        .desc-copy.cam360footer {
           font-size: 24px;
           text-align: center;
           padding-bottom: 0px;
           font-weight: 500;
           line-height: 35px;


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

        .hondaparts-box-cam360footer {
             padding-bottom: 0px !important;
        }

        .hidemobile {
            display: none;
        }

        .showmobile {
            display: block;
        }

        .hondaparts-box.w50perc {
            width: 100%;
        }
    }

</style>



<section class="maxw1200">
    <div class="space"></div>
    <div class="img-sec one-img-size centerdiv">
        <img class="hidemobile" src="https://www.honda.com.my/img/accessories/360hdcam/header-desktop.jpg" alt="">
        <img class="showmobile" src="https://www.honda.com.my/img/accessories/360hdcam/header-mobile.jpg" alt="">
    </div>
    <h2 class="bold" style="margin-bottom:0;">ADVANCED 360° HD CAMERA</h2>
    <div class="space"></div>
    <div class="line-breaker"></div>
    <div class="space"></div>
    <div class="maxwidth785">
        <h2>Experience Ultimate <br class="showmobile">Surround Vision When <br>Parking In Tight Spaces</h2>
        
        <div class="space hidemobile"></div>

        <div class="hondaparts-boxrow" style="max-width: 600px;margin: auto;">
            <div class="hondaparts-box w50perc">
                <div class="img-sec img-sec-fullwidth centerdiv">
                    <img src="https://www.honda.com.my/img/accessories/360hdcam/IMG01.png" alt="">
                </div>
                <div class="desc-copy bold">Bird's Eye<br>View Monitoring</div>
            </div>
            
            <div class="hondaparts-box w50perc">
                <div class="img-sec img-sec-fullwidth centerdiv">
                    <img src="https://www.honda.com.my/img/accessories/360hdcam/IMG02.png" alt="">
                </div>
                <div class="desc-copy bold">Capture Blind<br>Spots Easily</div>
            </div>

            <div class="hondaparts-box w50perc">
                <div class="img-sec img-sec-fullwidth centerdiv">
                    <img src="https://www.honda.com.my/img/accessories/360hdcam/IMG03.png" alt="">
                </div>
                <div class="desc-copy bold">Comes With<br>Pre-fitted Casing</div>
            </div>
            
            

            <div class="hondaparts-box w50perc">
                <div class="img-sec img-sec-fullwidth centerdiv">
                    <img src="https://www.honda.com.my/img/accessories/360hdcam/IMG04.png" alt="">
                </div>
                <div class="desc-copy bold">3D Panoramic View<br>&nbsp;</div>
            </div>

            <div class="hondaparts-box w50perc">
                <div class="img-sec img-sec-fullwidth centerdiv">
                    <img src="https://www.honda.com.my/img/accessories/360hdcam/IMG05.png" alt="">
                </div>
                <div class="desc-copy bold">Clear Night Vision<br></div>
            </div>

            <div class="hondaparts-box w50perc">
                <div class="img-sec img-sec-fullwidth centerdiv">
                    <img src="https://www.honda.com.my/img/accessories/360hdcam/IMG06.png" alt="">
                </div>

<div class="desc-copy bold">3 Years Warranty or<br>100,000km Mileage</div>
                
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
                <div class="desc-copy cam360footer">AVAILABLE FOR <br class="showmobile"><img src="https://www.honda.com.my/img/accessories/360hdcam/hr-v.png" alt="" style="top: 6px;">AND <img src="https://www.honda.com.my/img/accessories/360hdcam/br-v.png" alt="" style="top: 6px;"> ONLY</div><br class="showmobile">
                <div class="hondaparts-box hondaparts-box-tnc w30perc" style="width:100%">
                      <div class="desc-copy tnc"><br>Installation of this accessory will not affect your car warranty as it is done by a Honda&nbsp;Authorised&nbsp;Dealer. <br class="showmobile"><br class="showmobile">The&nbsp;warranty&nbsp;for this accessory is subject to Honda's authorised suppliers' terms&nbsp;and&nbsp;conditions. <br class="showmobile"><br class="showmobile">Kindly&nbsp;contact&nbsp;the&nbsp;nearest Honda Authorised Dealer for warranty&nbsp;information.</div>
                <br><br><br>
                </div>
            </div>
       </div>
    
</section>




@stop
