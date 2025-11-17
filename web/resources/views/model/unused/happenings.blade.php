<div class="container">
    <div class="for-desktop" >
        <div class="happening-wrapper">
            <?php for($i=0;$i<3;$i++) { ?>

            <div class="happening-card-container">
                <a class="happening-card happening" data-toggle="happen1" href="javascript:void(0)">
                    <div class="happening-img" style="display: none;background-image:url('../img/mock/happening1.jpg'); background-size: cover; background-position: center; display: block;"></div>
                    <div class="happening-details" style="display: none;">
                        <div class="sub-title red">WELCOME RAMADAN REWARDS</div>
                        <div class="body-copy black">Welcome the festive season with great rewards and a new Honda!<br><span class="cta-read-more">Read More</span></div>

                        @component('components.arrow-long-right')
                        @endcomponent
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </div>
            <?php } ?>
        </div>
        
        <div class="clearfix"></div>
        <div class="happening-cta">
            <a href="{{url('happenings')}}"> 
                <div class="cta">View MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div>
            </a>
        </div>
        
    </div>


    <!-- for mobile -->
    <div class="happening-wrapper owl-carousel owl-theme for-mobile" >
        <?php for($i=0;$i<3;$i++) { ?>
                <div class="happening-card-container">
                <a class="happening-card-mobile happening" data-toggle="happen1" href="javascript:void(0)">
                    <div class="happening-img" style="background-image:url('../img/mock/happening1.jpg'); background-size: cover; background-position: center; display: block;"></div>
                    <div class="happening-details" style="">
                        <div class="sub-title red">WELCOME RAMADAN REWARDS</div>
                        <div class="body-copy black">Welcome the festive season with great rewards and a new Honda!</div>
                        <div class="cta-read-more">Read More</div>

                        @component('components.arrow-long-right')
                        @endcomponent
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </a>

            </div>
        <?php } ?>

    </div>
    <!-- end -->

    <div class="clearfix"></div>

    <div class="happening-details-container">
        <div class="show" data-toggle="happen1" style="display:none;">
            <div class="content">
                <a href="#_" class="btn-close"></a>
                <div class="for-desktop">
                    <img src="{{url('img/mock/happening-desktop.jpg')}}" usemap="#MapD"/>
                    <map name="MapD">
                        <area shape="rect" coords="312,166,448,205" href="https://www.honda.com.my/model/pricing/city">
                    </map>
                </div>

                <div class="for-mobile">

                    <img src="{{url('img/mock/happening-mobile.jpg')}}" usemap="#MapM" />
                    <map name="MapM">
                        <area shape="rect" coords="244,183,397,226" href="https://m.honda.com.my/city#city_pricing">
                    </map>
                </div>

            </div>
        </div>

    </div>
</div>