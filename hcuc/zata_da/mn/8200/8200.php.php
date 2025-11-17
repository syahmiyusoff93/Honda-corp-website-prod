<?php
    $q_m = 'SELECT * FROM lists 
            WHERE list_fid = "'.$folder['id'].'" AND list_type = "i" AND list_status = "1"
            ORDER BY list_priority LIMIT 1
            ;';
    $res_m = $CON->query($q_m);
    $item = $this->itemInfo('', $htt[0]);
    while($item_m = $res_m->fetch_object()){
        $item = $this->itemInfo($item_m, $htt[0]);
    }
?>

<section mn="<?php echo $folder['module'];?>" style="background-image: url(<?php echo $folder['bgurl'];?>)" da-id="<?php echo $folder['id'];?>">
<div class="container">
   <h2>No Content Available</h2>
    <p>Content will be added soon. Please come back later. Thanks.</p>
</div>
</section>