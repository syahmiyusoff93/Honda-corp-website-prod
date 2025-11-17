
@extends('layouts.base')


@section('content')

<style>
    .desc-copy.bold { color:#000000 !important;  }

    .desc-copy.shopee { 
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
        max-width: 101px;
    }

    .one-img-size img {
         max-width: 148px;
         margin: auto;
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

     .hondaparts-box-shopee {
             padding-bottom: 0px !important;
     }

    @media only screen and (max-width: 480px) {
        .one-img-size img {
             max-width: 100px;
             
        }

        .desc-copy.shopee {
           font-size: 12px;
           text-align: center;
           padding-bottom: 0px;

        }
        .desc-copy.tnc {
            font-size: 10px;
            text-align: center;
            padding-top: 0px;
        }

        .hondaparts-box-tnc {
            padding-top: 0px  !important;
        }

        .hondaparts-box-shopee {
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
        <img src="{{url('img/hondaParts/04_ValueAdded/Disinfectant/IMG00.png')}}" alt="">
    </div>
    <h2 class="bold" style="margin-bottom:0;">CAR INTERIOR <br class="showmobile">DISINFECTANT (500ml) <br class="showmobile">SPRAY BOTTLE</h2>

    
    <div class="space"></div>
    <div class="line-breaker"></div>
    <div class="space"></div>
    
    
    <div class="maxwidth785">
        <h2>Sanitise Your Drive</h2>
        <div class="desc-copy">Your car is home to hundreds of germs you&nbsp;cannot&nbsp;see.</div>
        <div class="space hidemobile"></div>

        <div class="hondaparts-boxrow">
            <div class="hondaparts-box w50perc">
                <div class="img-sec img-sec-fullwidth centerdiv">
                    <img src="{{url('img/hondaParts/04_ValueAdded/Disinfectant/IMG01.png')}}" alt="">
                </div>
                <div class="desc-copy bold">Kills Bacteria, Viruses,<br> Fungi & Algae</div>
            </div>
            
            <div class="hondaparts-box w50perc">
                <div class="img-sec img-sec-fullwidth centerdiv">
                    <img src="{{url('img/hondaParts/04_ValueAdded/Disinfectant/IMG02.png')}}" alt="">
                </div>
                <div class="desc-copy bold">Non-alcohol, Water-based,<br>Eco-friendly Formula</div>
            </div>

            <div class="hondaparts-box w50perc">
                <div class="img-sec img-sec-fullwidth centerdiv">
                    <img src="{{url('img/hondaParts/04_ValueAdded/Disinfectant/IMG03.png')}}" alt="">
                </div>
                <div class="desc-copy bold">Effective on<br>Multiple Surfaces</div>
            </div>
            
            <div class="hondaparts-box w50perc">
                <div class="img-sec img-sec-fullwidth centerdiv">
                    <img src="{{url('img/hondaParts/04_ValueAdded/Disinfectant/IMG04.png')}}" alt="">
                </div>
                <div class="desc-copy bold">Easy Spray &<br>Wipe Application</div>
            </div>
        </div>
        

    </div>
    <div class="space"></div>
    <div class="maxwidth785">

            <div class="desc-copy">Safe and effective for your car!</div> <br><br>

            <div class="line-breaker"></div>
            <br><br>
            <h2>Buy & Save in a value&nbsp;package</h2>
            <div class="hcid-footer-img">
                <img src="{{url('img/hondaParts/04_ValueAdded/Disinfectant/IMG05.png')}}" alt="">
            </div>
            <br>
            <br class="hidemobile">
            <br class="hidemobile">
            <br class="hidemobile">

            <div class="hondaparts-boxrow">
                <div class="hondaparts-box hondaparts-box-shopee w70perc" style="width:100%">
                     <div class="desc-copy shopee" >Shop on Shopee or visit a <br class="showmobile">Honda Authorised Dealer <br class="showmobile">to find out more!</div>
                </div>
                <div class="hondaparts-box hondaparts-box-tnc w30perc" style="width:100%">
                      <div class="desc-copy tnc"  ><br>Terms and conditions apply.</div>
                </div>
            </div>
       </div>
    
</section>


@include('brand.hondaparts.hondaparts-style')

@stop


