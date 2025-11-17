<?php
$disp = [0=>'',1=>''];

//List bekommen
$res_m = $this->getInfo($CON,$folder,['fid','i']);
$i = 1;
while($item_m = $res_m->fetch_object()){ 
    $item = $this->itemInfo($item_m, $htt[0]); 
    $disp[0] .= $MNC[$folder['module']]->itemList($CON, $item, $i);
    $i ++;
    if( $i > 2 ) $i = 1;
} 
if($i == 2) {
    $disp[0] .= '<div class="item even" style="background-image: url()">
        <div class="wrapxp f"> </div>
    </div>';
}

echo '<section mn="'.$folder['module'].'" style="background-image: url('.$folder['bgurl'].');" da-id="'.$folder['id'].'" class="">
    <div class="container">'.$MAIN['title'].$MAIN['smr'].'</div>
    <div class="wrap"> 
        <div class="f owl-carousel itms" owl>'.$disp[0].'</div>
    </div>
</section>';

$a_l = file_get_contents('zata_da/mn/'.$folder['module'].'/arrow-l.svg');
$a_r = file_get_contents('zata_da/mn/'.$folder['module'].'/arrow-r.svg');
?>

<script>
    $(function() {
        let dot = `<?php echo $htt[0];?>`,
            mn = `<?php echo $folder['module'];?>`,
            id = `<?php echo $folder['id'];?>`,
            main = $(`[mn][da-id="${id}"]`),
            owl = $('.owl-carousel', main);
        
        function callback(das) {
            das.trigger('stop.owl.autoplay'); 

            return true;
        }
        let a_l = `<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="451.847px" height="451.847px" viewBox="0 0 451.847 451.847" style="enable-background:new 0 0 451.847 451.847;" xml:space="preserve"><g><path d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z"/></g></svg>`,
            a_r = `<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="451.846px" height="451.847px" viewBox="0 0 451.846 451.847" style="enable-background:new 0 0 451.846 451.847;" xml:space="preserve"> <g> <path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z"/> </g></svg>`;
        
        owl.each(function() {
            let das = $(this);
            das.owlCarousel({
                margin: 0,
                loop: true,
                center: false,
                nav: true,
                navText: [a_l, a_r],
                dots: false,
                autoplay: false,
                autoplayTimeout:  9000,
                smartSpeed: 200,
                autoplayHoverPause: false,
                mouseDrag: true,
                touchDrag: true,
                onDragged: callback(das),
                rewind: false,
                onTranslate: function(e) {
                    das.trigger('stop.owl.autoplay');
                },
                onTranslated: function(e) {
                    callback(das);
                },
                responsive: {
                    0: {
                        items: 1
                    },
                    575: {
                        items:3
                    },
                    1400: {
                        items:4
                    } 
                }
            });
            callback(das);
        });
        
 

    });
</script> 