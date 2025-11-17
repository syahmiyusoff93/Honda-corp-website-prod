<?php
echo '<link rel="shortcut icon" href="'.$comp['imgfav'].'?'.mt_rand().'"/>';

$da_jscs = json_decode(file_get_contents("zata_da/json/header.json"), true); 
$LISTING->JSCS($da_jscs['css']['plugin'], 'css', 0, $htt[0].'zata_da/plug-in/'); 
$LISTING->JSCS($da_jscs['css']['local'], 'css', 0, $htt[0].'zata_da/css/'); 
$LISTING->JSCS($da_jscs['js']['plugin'], 'js', 0, $htt[0].'zata_da/plug-in/'); 
$LISTING->JSCS($da_jscs['js']['local'], 'js', 0, $htt[0].'zata_da/js/');

if(isset($da_jscs['api']['jslink']))
    foreach($da_jscs['api']['jslink'] as $key => $apilink){
        echo "<script src='$apilink'></script>";
    }
?>
<script>
const DOT = `<?php echo $htt[0];?>`;
</script>