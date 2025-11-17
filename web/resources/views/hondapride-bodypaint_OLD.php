
@extends('layouts.base')


@section('content')

<div class="body-wrapper">

<section class="content-inner honda-pride innerpage" id="honda-pride">
    <div class="hero-banner hondapride">
        <!-- <div class="text-container">
            <div class="cat">Honda Pride</div>
            <div class="header">FROM QUALITY MAINTENANCE & SERVICE TO CUSTOMER CAR EXPERIENCE, WE GOT YOU COVERED.  </div>
        </div> -->
    </div>

    <section class="service-tab-menu">
        <div class="menu-toggle smooth-slide">
            <input type="checkbox" id="service-tab-menu-check">
                <div class="service-tab-menu-btn">
                <label for="service-tab-menu-check">
                    <span></span>
                </label>
                </div>
                <ul>
                    <li><a href="{{url('aftersales/honda-pride')}}">Honda PRIDE</a></li>
                    <li style="border-bottom: 3px solid #e32119;"><a href="{{url('aftersales/honda-body-paint')}}">BODY &amp; PAINT</a></li>
                </ul>
        </div>
        <div class="clearfix"></div>
    </section>

    <div class="inner-content-section content-area">
        <h2>3 REASONS WHY YOU SHOULD GO TO Honda BODY &amp; PAINT CENTRE</h2>
        <div class="content-copy">Wonder why you should choose Honda Body & Paint?<br>Watch the video to find out.<br><br>
            <div class="embed-youtube"><iframe src="//www.youtube.com/embed/aCOsM-4NEKs" width="620" height="348"></iframe></div>
        </div>       
    </div>

</section>

</div>

<style>
.embed-youtube {
    position: relative;
    padding-bottom: 56.25%; /* - 16:9 aspect ratio (most common) */
    /* padding-bottom: 62.5%; - 16:10 aspect ratio */
    /* padding-bottom: 75%; - 4:3 aspect ratio */
    padding-top: 30px;
    height: 0;
    overflow: hidden;
}

.embed-youtube iframe,
.embed-youtube object,
.embed-youtube embed {
    border: 0;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
</style>

@stop

