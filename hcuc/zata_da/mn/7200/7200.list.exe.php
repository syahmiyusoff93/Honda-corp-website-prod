<?php
    $q_m = 'SELECT * FROM lists WHERE list_fid = "'.$id.'" AND '.TIS1sql.OBLPsql.';';
    $disp = [0=>'',1=>''];
    $item = $INFOEXT->itemInfo('', $dot);

    $res_m = $CON->query($q_m);

    while($item_m = $res_m->fetch_object()){
        $item = $INFOEXT->itemInfo($item_m, $dot);
        $disp[1].=$MNC7000->itemList($item);
    }
    if(empty($disp[1]))
        $disp[1] = '<p>No Information Available</p>';
    echo $disp[1];
?>
<script>
$(()=>{
    let dot = `<?php echo $dot;?>`,
        mn = `<?php echo $mn;?>`,
        mnid = `<?php echo $mnid;?>`,
        main = $(`[mn][da-id="${mnid}"]`);
    $('.itm > div', main).each(function(){
        let btn=$(this),
            temp = $('template', btn).html(),
            html = `<section><div class="container main"><span class="ccl"></span><div class="close-pop-w ccl"></div><div class="wrap">${temp}</div></div></section>`;
        uilichtEins(mn, btn, html);
    });
});
</script>