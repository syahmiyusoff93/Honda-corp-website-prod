

<style>
    /* .model-inner-container .intro {margin-bottom:0;} */
    .colorpickerdisclaimer {font-size: 0.77rem;line-height: 1.5em;font-weight: 400;letter-spacing: 0.6px;margin: 20px 35px 20px 35px;max-width: unset;}
    .inner-color-container .color-name {text-align: center;}

    /* NEW SAI STYLE - 20200521 */
    .thestage {position:relative; background: none; transform: scale(1,1); margin: auto;}
    .canvascontainer {position: absolute; width: inherit; height: inherit;}
    .canvascontainer .canvasimg {position: absolute; display:none;}
    .acc-asset-holder {display: none;}

    .thecover {
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -o-user-select: none;
        user-select: none;
        background: rgba(0,0,0,0);
    }

    .model-indicator {max-width: 380px; position:absolute; bottom:0; padding:0 10px; left:50%; transform: translateX(-50%);}
    @media only screen and (max-width:540px){
        .model-indicator {width: 50%;}
    }
</style>

<script>
    var asset_url = '<?php echo env('AWS_CLOUDFRONT_URL'); ?>';
    var theapi = '{{url("/api/model/$model_slug/gallery/ext360")}}';
</script>
<script src="{{versioned_asset('js/page/model_ext360_local.js')}}"></script>


    <div class="inner-color-container">
        <div class="color-name sub-title ajax-cta-cname prime-title"></div>
        <div class="modelexterior">

            <img class="model-indicator" style="" src="{{url('img/mock/360indicator.png')}}" alt="" style="">

            <div class="exterior-holder thestage">

                <div class="thecar canvascontainer"></div>
                <div class="theacc canvascontainer"></div>
                <div class="thecover canvascontainer"></div>
            </div>
        </div>
        <div class="clearfix"></div>

    </div>
