@php
    $APIPATH = config('global.APIPATH');
    $honda_api_context = config('global.APICONTEXT');

    $data = file_get_contents($APIPATH.'happenings.json', false, $honda_api_context);
    $data = json_decode($data);
    $hdata = $data->payload;
@endphp
<div class="container">
    <div class="for-desktop" >
        <div class="happening-wrapper">
            <?php for($i=0;$i<3;$i++) { ?>

            <div class="happening-card-container">
                <a class="happening-card happening" data-toggle="happen{{$i}}" href="{{url('/happening/'.$hdata[$i]->id.'/'.$hdata[$i]->slug)}}">
                    <div class="happening-img" style="display: none;background-image:url('{{$hdata[$i]->thumb}}'); background-size: cover; background-position: center; display: block;"></div>
                    <div class="happening-details" style="display: none;">
                        <div class="sub-title red">{{$hdata[$i]->title}}</div>
                        <div class="body-copy black">{{$hdata[$i]->short_desc}}<br><span class="cta-read-more">Read More</span></div>

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
    <style type="text/css">
        @media only screen and (max-width: 768px) {
            .happening-img {
                height: 520px;
            }
        }
        @media only screen and (max-width: 480px) {
            .happening-img {
                height: 324px;
            }
        }
    </style>
    <div class="happening-wrapper owl-carousel owl-theme for-mobile" >
        <?php for($i=0;$i<3;$i++) { ?>
                <div class="happening-card-container">
                <a class="happening-card-mobile happening" data-toggle="happen{{$i}}" href="{{url('/happening/'.$hdata[$i]->id.'/'.$hdata[$i]->slug)}}">
                    <div class="happening-img" style="background-image:url('{{$hdata[$i]->thumb}}'); background-size: cover; background-position: center; display: block;"></div>
                    <div class="happening-details" style="">
                        <div class="sub-title red">{!!$hdata[$i]->title!!}</div>
                        <div class="body-copy black">{!!$hdata[$i]->short_desc!!}</div>
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
</div>
<script>
    $("document").ready(function(){
        document.querySelectorAll('a.happening-card').forEach(a => {
        if (a.href.includes('/95/')) {
            const subtitle = a.querySelector('.sub-title');
            if (subtitle) {
            subtitle.textContent = 'The Results Are In!';
            }
        }
        });
    })    
</script>
