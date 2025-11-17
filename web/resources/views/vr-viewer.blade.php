

        @php
        $APIPATH = config('global.APIPATH');
        $honda_api_context = config('global.APICONTEXT');

        $data = file_get_contents($APIPATH.'model_'.$model_slug.'_gallery_int360.json', false, $honda_api_context);
        $data = json_decode($data, true);
        $files = $data['payload']['interior360'];

        $assetlist = [];
        foreach($files as $key=>$i){
            if(substr($i['filepath'],0,3)=='htt'){
                $assetlist[] = $i['filepath'].'?new='.rand();
            } else {
                $assetlist[] = $data['meta']['asset_url'].'/'.$i['filepath'].'?new='.rand();
            }
        }
        $assetlist = implode(',', $assetlist);

        @endphp

        <link rel="stylesheet" href="{{asset('css/pannellum.css')}}"/>
        <script type="text/javascript" src="{{asset('js/pannellum.js')}}"></script>
        <style>
            html,body, #panorama {padding:0; margin:0; width:100%; height:100%;}
        #panorama {
            width: 100%;
            height: 100%;
        }
        .moveicon {position:absolute;width:59px;right:0; z-index:3; padding:15px;}
        </style>

<div id="panorama"><img src="{{url('img/mock/gallery_360_icon.png')}}" alt="" class="moveicon"></div>
<script>
    var _asset = '{{$assetlist}}';
    var _asset_arr = _asset.split(',');

    pannellum.viewer('panorama', {
        "showZoomCtrl ":false,
        "autoLoad": true,
        "type": "cubemap",
        "cubeMap": _asset_arr,
        pitch: -20
    });
</script>


