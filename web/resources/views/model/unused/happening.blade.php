@extends('layouts.base')


@section('content')
<div class="body-wrapper">
<section class="happenings-landing stage-contained innerpage">
    <div class="intro">
        <h2>Happenings</h2>
        <div class="intro-title grey">Our latest news and events including articles, press releases, and information about our upcoming events.</div>
    </div>

    <div class="details-container">
        <ul class="flex">
            <li>                              
                <div class="photo">
                    <a href="{{url('happening-details')}}">
                        <img src="{{url('img/mock/happening1.jpg')}}" alt="">
                    </a>            
                </div>
                <div class="des">
                    <div class="sub-title">Amazing Rewards Up For Grabs!</div>
                    <div class="body-copy">Amazing Rewards Up For Grabs! <br>Enjoy incredible deals and great savings with your new Honda.</div>
                    <a href="{{url('happening-details')}}"> 
                        <div class="cta">READ MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div>
                    </a>
                </div> 
            </li>

            <li>                              
                <div class="photo">
                    <a href="{{url('happening-details')}}">
                        <img src="{{url('img/mock/happening2.jpg')}}" alt="">
                    </a>
                </div>
                <div class="des">
                    <div class="sub-title">Amazing Rewards Up For Grabs!</div>
                    <div class="body-copy">Amazing Rewards Up For Grabs! <br>Enjoy incredible deals and great savings with your new Honda.</div>
                    <a href="{{url('happening-details')}}"> 
                        <div class="cta">READ MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div>
                    </a>
                </div> 
            </li>

            <li>                              
                <div class="photo">
                    <a href="{{url('happening-details')}}">
                        <img src="{{url('img/mock/happening1.jpg')}}" alt="">
                    </a>
                </div>
                <div class="des">
                    <div class="sub-title">Amazing Rewards Up For Grabs!</div>
                    <div class="body-copy">Amazing Rewards Up For Grabs! <br>Enjoy incredible deals and great savings with your new Honda.</div>
                    <a href="{{url('happening-details')}}"> 
                        <div class="cta">READ MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div>
                    </a>
                </div> 
            </li>

            <li>                              
                <div class="photo">
                    <a href="{{url('happening-details')}}">
                        <img src="{{url('img/mock/happening2.jpg')}}" alt="">
                    </a>
                </div>
                <div class="des">
                    <div class="sub-title">Amazing Rewards Up For Grabs!</div>
                    <div class="body-copy">Amazing Rewards Up For Grabs! <br>Enjoy incredible deals and great savings with your new Honda.</div>
                    <a href="{{url('happening-details')}}"> 
                        <div class="cta">READ MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div>
                    </a>
                </div> 
            </li>
            
        </ul>
    </div>


    <!--<div class="details-container">
        <ul class="flex">
            <li class="happening" data-toggle="happen1">
               
                <div class="photo"><img src="{{url('img/mock/happening1.jpg')}}" alt=""></div>
                <div class="des">
                    <div class="sub-title">Amazing Rewards Up For Grabs!</div>
                    <div class="body-copy">Amazing Rewards Up For Grabs! <br>Enjoy incredible deals and great savings with your new Honda.</div>
                    <div class="cta">READ MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div>
                </div>                
                
            </li>

            <li class="happening" data-toggle="happen2">
                
                <div class="photo"><img src="{{url('img/mock/happening2.jpg')}}" alt=""></div>
                <div class="des">
                    <div class="sub-title">Amazing Rewards Up For Grabs!</div>
                    <div class="body-copy">Amazing Rewards Up For Grabs! <br>Enjoy incredible deals and great savings with your new Honda.</div>
                    <div class="cta">READ MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div>
                </div>
                
            </li>

            <li class="happening" data-toggle="happen3">
               
                <div class="photo"><img src="{{url('img/mock/happening1.jpg')}}" alt=""></div>
                <div class="des">
                    <div class="sub-title">Amazing Rewards Up For Grabs!</div>
                    <div class="body-copy">Amazing Rewards Up For Grabs! <br>Enjoy incredible deals and great savings with your new Honda.</div>
                    <div class="cta">READ MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div>
                </div>
                
            </li>

            <li class="happening" data-toggle="happen2">
                
                <div class="photo"><img src="{{url('img/mock/happening2.jpg')}}" alt=""></div>
                <div class="des">
                    <div class="sub-title">Amazing Rewards Up For Grabs!</div>
                    <div class="body-copy">Amazing Rewards Up For Grabs! <br>Enjoy incredible deals and great savings with your new Honda.</div>
                    <div class="cta">READ MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div>
                </div>
                
            </li>
            
        </ul>
    </div>

    <div class="happening-details">
        <div class="show" data-toggle="happen1" style="display:none;">
            <div class="content">
                <a href="#_" class="btn-close"></a>
                <img src="{{url('img/mock/happening1-detail.jpg')}}">
            </div>    
        </div>

        <div class="show" data-toggle="happen2" style="display:none;">
            <div class="content">
                <a href="#_" class="btn-close"></a>
                <img src="{{url('img/mock/happening2-detail.jpg')}}">
            </div>    
        </div>

        <div class="show" data-toggle="happen3" style="display:none;">
            <div class="content">
                <a href="#_" class="btn-close"></a>
                <img src="{{url('img/mock/happening1-detail.jpg')}}">
            </div>    
        </div>
    </div> -->

    
</section>
</div>
@stop
