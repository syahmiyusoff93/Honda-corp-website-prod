<?php
if(!class_exists('BOOKING')){
class BOOKING {
    public function saveData($CON, $POST) { 
        $DATA = [];
        // $que = explode('($$)', $POST['que']);
        // $c = count($que);

        // for($i=0;$i<$c;$i++){
        //     $info = empty($POST[$que[$i]])?'':$POST[$que[$i]];
        //     $key = str_replace('%', ' ', $que[$i]);
        //     $DATA[$key] = $info;
        // }

        // $doc_data = json_encode($DATA, true);
        $doc_data = json_encode($POST, true);
        $doc_date = '';

        $stmt = $CON->stmt_init();
        $stmt -> prepare("INSERT INTO book (_data, _date) VALUES (?, NOW());");
        $stmt -> bind_param('s',  $doc_data);
        if(!$stmt -> execute()) exit('Data not saved.');
    }
}
}
$BOOKING = new BOOKING();