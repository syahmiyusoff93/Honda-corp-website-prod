<?php
$disp = [0=>'',1=>''];
$item = ['id'=>$id];
$disp[1].=$MNC4001->itemsList($CON, $item, $dot);
echo $disp[1];
?>
<script>
$(()=>{
    let dot = `<?php echo $dot;?>`,
        mn = `<?php echo $mn;?>`,
        mnid = `<?php echo $mnid;?>`,
        main = $(`[mn][da-id="${mnid}"]`);
    $('.itm span', main).each(function(){
        let btn=$(this),
            temp = $('+template', btn).html(),
            html = `<section><div class="container main"><span class="ccl"></span><div class="close-pop-w ccl"></div><div class="wrap">${temp}</div></div></section>`;
        uilichtEins(mn, btn, html);
    });
});
</script>