<?php
$lim = 8;
$disp = array(0=>'',1=>'');

//Limit bekommen
$q = "SELECT * FROM lists
      WHERE list_fid = '".$id."' AND list_type = 'i' AND list_status = '1'";
$res = $CON->query($q);
$count = mysqli_num_rows($res)/$lim;
$count = is_int($count)?$count-0.1:$count;
$pgEtks = floor($count) + 1;
for($i=0;$i<$pgEtks;$i++){
    $k = $i + 1;
    $disp[1] .= '<li>
                    <a da-pgnum="'.$k.'">'.$k.'</a>
                </li>';
}

//List bekommen
$q = "SELECT * FROM lists
      WHERE list_fid = '".$id."' AND list_type = 'i' AND list_status = '1'
      ORDER BY list_priority LIMIT $lim;";
$res = $CON->query($q);
while($item = $res->fetch_object()){
    $info = $INFOEXT->itemInfo($item, $dot);
    $disp[0] .= $MNC7001->itemList($info);
}

echo '<div class="cat-disp">
        <div class="frid eles f-a-fs f-j-c">
            '.$disp[0].'
        </div>
      </div>
      <ul class="grid pg-num">
        '.$disp[1].'
      </ul>';
?>

<script>
    $(function() {
        let dot = `<?php echo $dot;?>`,
            mn = `<?php echo $mn;?>`,
            mnid = `<?php echo $mnid;?>`,
            cid = `<?php echo $id;?>`,
            main = $(`[mn][da-id="${mnid}"]`),
            disp = $('.cat-disp > div', main),
            pgs = $(`[da-pgnum]`, main);

        pgs.each(function(){
            let p = $(this),
                pg = p.attr('da-pgnum'),
                exe = `${dot}zata_da/mn/mn.exe.php?mn=${mn}&cid=${cid}&dot=${dot}&mnid=${mnid}&page=${pg}&sel=page`;
            p.click(function(){
                disp.load(exe);
            });
        });
    });
</script>