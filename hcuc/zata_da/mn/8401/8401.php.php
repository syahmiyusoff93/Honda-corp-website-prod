<?php
$disp=[0=>'',1=>'',2=>'',3=>'',4=>'']; 
$regis = empty($comp['cRegis'])?'':' '.$comp['cRegis'].' ';
 
$res_m = $this->getInfo($CON,$folder,['fid','i','1', '5']);
while($item_m = $res_m->fetch_object()){
    $item = $this->itemInfo($item_m, $htt[0]);
    $disp[0] .= $MNC[$folder['module']]->media($item);
} 

$res_m = $this->getInfo($CON,$folder,['fid','i','2', '5']);
while($item_m = $res_m->fetch_object()){
    $item = $this->itemInfo($item_m, $htt[0]);
    $disp[1] .= $MNC[$folder['module']]->redLink($item);
} 

$res_m = $this->getInfo($CON,$folder,['fid','i','3', '5']);
while($item_m = $res_m->fetch_object()){
    $item = $this->itemInfo($item_m, $htt[0]);
    $disp[2] .= $MNC[$folder['module']]->redLink($item);
} 
  

echo '<div mn="'.$folder['module'].'" style="background-image: url('.$folder['bgurl'].')" da-id="'.$folder['id'].'" class=" "> 
    <div class="container-fluid copyright">
        <div class="lr-w f f-a-c">
            <div class="l">
            <div class="wrap top">'.$disp[1].'</div>
            <div class="wrap btm"> <div class="a-w"><a>Copyright © '.date("Y").'. '.$comp['cName'].$regis.' - All Rights Reserved</a></div> '.$disp[2].'</div>
            </div>
            <div class="r followus">
                <div class="med"><div class="f f-j-fe">'.$disp[0].'</div></div>
            </div>
        </div>
    </div>
</div>';
?>
 
<script>
$(()=>{
    let mnid = `<?php echo $folder['id']; ?>`,
        main = $(`[mn][da-id="${mnid}"]`),
        form = $('form',main); 
});
</script>
 