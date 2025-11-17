<?php
$disp = [0=>'',1=>'',2=>''];
$regis = empty($comp['cRegis'])?'':' ('.$comp['cRegis'].')'; 

echo '<section mn="'.$folder['module'].'" da-id="'.$folder['id'].'" style="background-image: url('.$folder['bgurl'].')">
    <div class="container copyright">
        <div class="wrap">Copyright © '.date("Y").'. '.$comp['cName'].$regis.' - All Rights Reserved</div>
    </div>
</section>';
