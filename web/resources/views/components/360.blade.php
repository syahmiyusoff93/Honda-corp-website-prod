<script src="{{url('js/spritespin.js')}}"></script>
<script src="{{url('js/pano2vr_player.js')}}"></script>

<script>
// 360 exterior
var frames = [
            "{{asset("img/model/city/exterior/1.png")}}",
            "{{asset("img/model/city/exterior/2.png")}}",
            "{{asset("img/model/city/exterior/3.png")}}",
            "{{asset("img/model/city/exterior/4.png")}}",
            "{{asset("img/model/city/exterior/5.png")}}",
            "{{asset("img/model/city/exterior/6.png")}}",
            "{{asset("img/model/city/exterior/7.png")}}",
            "{{asset("img/model/city/exterior/8.png")}}",
            "{{asset("img/model/city/exterior/9.png")}}",
            "{{asset("img/model/city/exterior/10.png")}}",
            "{{asset("img/model/city/exterior/11.png")}}",
            "{{asset("img/model/city/exterior/12.png")}}",
            "{{asset("img/model/city/exterior/13.png")}}",
            "{{asset("img/model/city/exterior/14.png")}}",
            "{{asset("img/model/city/exterior/15.png")}}",
            "{{asset("img/model/city/exterior/16.png")}}",
            "{{asset("img/model/city/exterior/17.png")}}",
            "{{asset("img/model/city/exterior/18.png")}}",
            "{{asset("img/model/city/exterior/19.png")}}",
            "{{asset("img/model/city/exterior/20.png")}}",
            "{{asset("img/model/city/exterior/21.png")}}",
            "{{asset("img/model/city/exterior/22.png")}}",
            "{{asset("img/model/city/exterior/23.png")}}",
            "{{asset("img/model/city/exterior/24.png")}}",
            "{{asset("img/model/city/exterior/25.png")}}",
            "{{asset("img/model/city/exterior/26.png")}}",
            "{{asset("img/model/city/exterior/27.png")}}",
            "{{asset("img/model/city/exterior/28.png")}}",
            "{{asset("img/model/city/exterior/29.png")}}",
            "{{asset("img/model/city/exterior/30.png")}}",
            "{{asset("img/model/city/exterior/31.png")}}",
            "{{asset("img/model/city/exterior/32.png")}}",
            "{{asset("img/model/city/exterior/33.png")}}",
            "{{asset("img/model/city/exterior/34.png")}}",
            "{{asset("img/model/city/exterior/35.png")}}",
            "{{asset("img/model/city/exterior/36.png")}}"
			];

			$("#threesixtyframes").spritespin({
			width : 623,
			height: 415 ,
			frames: frames.length,
			behavior: "drag", // "hold"
			module: "360",
			sense : -1,
			source: frames,
			animate : true,
			loop: false,
			frameWrap : true,
			frameStep : 1,
			frameTime : 80,
            enableCanvas : true
			});
            // 360exterior end

            // 360interior
            // create the panorama player with the container
            // pano=new pano2vrPlayer("container");
            // pano.readConfigUrl("img/interior.xml");
            // hide the URL bar on the iPhone

            //360interior end
        
        </script>