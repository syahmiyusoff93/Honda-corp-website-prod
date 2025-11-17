
@extends('layouts.base')

@section('page-title')
Backing Out Support
@endsection

@section('content')

<style>
    .tech-banner {background: url(../img/technology/00_landing/banner2.png)no-repeat top center;background-size: cover;height: 420px;color: #fff;}
    .text-container {top: 50%;transform: translate(0, -50%);text-align: center;}
    .text-container .header {font-size: 2.25rem;font-weight: 400;line-height: 54px;letter-spacing: 7.2px;text-shadow: 0px 2px 24px rgba(0,0,0,0.5);margin-top: 15px;max-width: 1200px;margin-left: auto;margin-right: auto;}

    .desc-fold {padding: 70px 20px;}
    .desc-copy {text-align: center;font-size: 1rem;color: #5e6063;letter-spacing: 0.25px;line-height: 1.75rem;font-weight: 400;max-width: 780px;margin: auto;}

    .content-copy {text-align: center;font-size: 1rem;color: #5e6063;letter-spacing: 0.25px;line-height: 1.75rem;font-weight: 400;}


    .container {width: 100%;max-width: 1200px;margin: auto;padding: 70px 10px;position: relative;}
    .img-sec.float-right {text-align: right; overflow: hidden;}
    .img-sec {width: calc(50% - 25px);}

    .img-sec img {transition: all 1s;display: block;width: 100%;height: auto;transform: scale(1);image-rendering: auto;}
    .content-sec {width: 50%;margin-right: 25px;position: absolute;top: 50%;position: absolute;transform: translate(0, -50%);-webkit-transform: translate(0, -50%);height: 100%;}

    .float-right {float: right;}
    .float-left {float: left;}

    .content-sec.float-left {padding-left: calc(2.5% + 25px);position: absolute;left: 50%;}

    .detail-content {top: 50%;position: absolute;transform: translate(0, -50%);-webkit-transform: translate(0, -50%);}
    .rightpadding {padding-right:90px;}
    .centerdiv {margin:auto;margin-top: 20px;margin-bottom: 20px;}
    .maxwidth783 {margin: auto; max-width: 783px;}
    .maxwidth800 {margin: auto; max-width: 800px;}
    .grey {background: #f7f7f7;}
    /* overwrite */
    .spec-container .tab-slider-tabs, .comp-tabbed-content .tab-nav ul {background: unset;}
    .img-sec {width: calc(50% - 25px);}
    .img-sec-fullwidth {width: calc(100% - 0px);}
    .w718 {width:718px;}
    .w579 {width:579px;}

    .vtecturbocol {float: left;width: 50%;padding: 45px;}
    .vtecturborow:after {content: "";display: table;clear: both;}

    @media only screen and (max-width: 768px) {
        .tech-banner {background: url(../img/technology/00_landing/banner2.png)no-repeat left;background-size: cover;height: 170px;}
        .text-container .header {font-size: 1.25rem;letter-spacing: 1.2px;}


        .container {padding: 35px 10px;}
        .desc-copy {font-size: 0.9rem;}

        .float-right {float: none;}
        .float-left {float: none;}
        .img-sec {width:100%;}
        .content-sec {width: 100%;position:relative;top: unset;transform: unset;-webkit-transform: unset;padding-top: 20px;}
        .detail-content {top: unset;position: unset;transform:unset;-webkit-transform:unset;}
        .rightpadding {padding-right:0px;}

        .content-sec.float-left {padding-left: unset;position: unset;left: unset;}
        .vtecturbocol {width: 100%;}
    }
</style>

<section>
    <div style="height: 50px;background: #ececec;margin-bottom: -15px;">
        <a href="{{url('technology/honda-sensing')}}" class="">
            <div style="padding: 15px 30px;font-size: 12px;">
                <img src="{{url('img/interface/back-icon.svg')}}" alt="Back link">
                <span class="backtocopy" style="color: #565656;padding: 0 5px;width:unset;bottom:3px;">BACK TO Honda SENSING™</span>
            </div>
        </a>
    </div>

    <!-- description -->
    <div class="desc-fold maxwidth800">
        <div class="desc-copy">INCREASING FIELD OF VISION, DECREASING BLIND SPOTS</div>
        <h2>BACKING OUT SUPPORT</h2>
        <div class="desc-copy">During the backing out of a parking space, radar sensors mounted in the rear bumper* detect vehicles approaching from the side, and alerts drivers by sound and Navigation screen display. The system also alerts the driver by vibrating the accelerator pedal**.</div>
        <div class="img-sec img-sec-fullwidth centerdiv">
            <img src="{{url('img/technology/02_sensing/03_Image/08_BackingOut.jpg')}}" alt="">
        </div>

    </div>

</section>

<section>
    <div class="" style="padding-bottom: 30px;">
        <div class="stage-contained">
            <div class="note-container" style="margin: 0px 20px 0px 20px;">
                <div class="note-title more long">DISCLAIMERS</div>
                <div class=" expand-content" style="display: none;">
                    <ul class="note">
                        <li>* Detection method differs according to model.<br>(BSI radar / Rear camera / MVC Rear Camera</li>
                        <li>** Accelerator pedal vibration available on select models.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <style>
        .note-container .more.long:after {left:unset;}
    </style>
</section>

<section class="grey">

            <div class="sensing-footer">
                <div class="sensing-footer-row">
                    <div class="sensing-footer-col">
                        <a href="{{url('technology/honda-sensing/parking-sensor')}}">
                            <div class="details-content">
                                <h2 class="left red-font">Previous</h2>
                                <div>Parking Sensor System</div>
                            </div>
                        </a>
                    </div>
                    <div class="sensing-footer-col">
                        <a href="{{url('technology/honda-sensing')}}">
                            <div class="details-content">
                                <h2 class="right red-font">Back</h2>
                                <div class="right">Honda SENSING™</div>
                            </div>
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

    <style>
        /* sensing-footer */
        .sensing-footer-col {float: left;width: 50%;padding: 50px;}
        .sensing-footer-row:after { content: "";display: table;clear: both;}
        .details-content {margin: auto;width: 75%;}
        .red-font {color:#E01327;}
        .contact-footer-copy {padding: 20px 0px 10px;}
        .right {text-align: right;}

        @media only screen and (max-width: 640px) {
               /* sensing-footer */
                .sensing-footer {margin-bottom:50px;}
                .sensing-footer-col {width: 50%;padding: 20px;}
                .details-content {width: unset;}

        }
    </style>
</section>




@stop


