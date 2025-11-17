<?php 
$DATA = []; 
$DATA['data'] = $_POST;
$DATA['info'] = [];

$stmt = $CON->stmt_init();
$stmt -> prepare("SELECT * FROM lists WHERE list_fid=? AND list_trash IS NULL;");
$stmt -> bind_param("i", $id);
$stmt -> execute();
$res = $stmt->get_result();
while($info = $res->fetch_object()){
    $info = $INFOEXT->itemInfo($info, $dot);
    
    $ttl = explode('=>', $info['title']);
    $ttl[0] = isset($ttl[0]) ? $ttl[0] : '' ;
    $ttl[1] = isset($ttl[1]) ? $ttl[1] : '' ;
     
    $DATA['info'][] = ["id"=>$info['id'], 
                        "title"=>$info['title'], 
                        "bgurl"=>$info['bgurl'],
                        "bildurl"=>$info['bildurl'],
                        "docurl"=>$info['docurl'],
                        "content"=>$info['content'],
                        "link"=>$info['link']['redir'],
                        "title"=>$ttl[0],
                        "code"=>$ttl[1]];
}


echo json_encode($DATA, true);