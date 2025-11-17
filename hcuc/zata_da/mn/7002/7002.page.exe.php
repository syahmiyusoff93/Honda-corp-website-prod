<?php 
$lim = 6;
$disp = array(0=>'',1=>'');
$page = $_POST['page'];
$off = $lim * ($page - 1);
//List bekommen
$q = "SELECT * FROM lists
      WHERE list_fid = '".$mnid."' AND list_type = 'i' AND list_status = '1'
      ORDER BY list_priority LIMIT $off, $lim;";
$res = $CON->query($q);
while($item = $res->fetch_object()){
    $info = $INFOEXT->itemInfo($item, $dot);
    $disp[0] .= $MNC7001->itemList($info);
}
echo $disp[0];
?>

<script>
    $(function() {
        let dot = `<?php echo $dot;?>`,
            mn = `<?php echo $mn;?>`,
            mnid = `<?php echo $mnid;?>`,
            cid = `<?php echo $id;?>`,
            main = $(`[mn][da-id="${mnid}"]`),
            dispPG = $('.cat-disp > div', main),
            as = $('.eles a', main);

        as.each(function(){
            let a = $(this),
                temp = $('template', a).html(),
                html = `<section><div class="container main"><div class="wrap"><div class="close-pop-w ccl"></div><span class="ccl"></span>${temp}</div></div></section>`;
            
            uilichtEins('Video', a, html)
        });
    });
</script>