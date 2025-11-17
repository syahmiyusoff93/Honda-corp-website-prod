<?php
class go_direct{
    public $pid = 1;
    
    public function generateUrl($res, $CON) {
        $urls = '';
        $id_chain = [];
        while ($url = $res->fetch_object()){
            $urls = $url->list_cleanurl;

            $url_id = $url->id;
            $url_fid = $url->list_fid;
            array_push($id_chain, $url_id, $url_fid);
            do {
                if($url_fid == 0){
                    break;
                }elseif($url_fid > 0){
                    $q = "SELECT * FROM lists WHERE id = '$url_fid' AND list_lang='$_SESSION[lang]';";
                    $res = $CON->query($q);
                    while ($url = $res->fetch_object()){
                        $seg = $url->list_cleanurl.'/';
                        $urls = $seg.$urls;
                        $url_fid = $url->list_fid;
                        array_push($id_chain, $url_fid);
                    }
                }
            }while ($url_fid > 0);
        }
        return [$urls, $id_chain];
    }
    public function pqueryString($query, $id){
        // If query contains a path (e.g. '/EN/home?pid=95'), extract only the
        // argument portion after the '?'. Otherwise use the whole string.
        $argsPart = $query;
        if (strpos($query, '?') !== false) {
            $parts = explode('?', $query, 2);
            // $parts[0] is path, $parts[1] is actual query string
            $argsPart = isset($parts[1]) ? $parts[1] : '';
        }

        // Remove the pid parameter from the args safely
        if ($argsPart === '') return '';

        // Split and filter
        $pairs = explode('&', $argsPart);
        $keep = [];
        foreach ($pairs as $p) {
            if ($p === '') continue;
            // remove any 'pid=<id>' occurrences
            if (preg_match('/^pid=' . preg_quote($id, '/') . '$/', $p)) continue;
            $keep[] = $p;
        }

        $newQuery = implode('&', $keep);
        return empty($newQuery) ? '' : "?$newQuery";
    }
    public function viaID($CON){
        include 'zata_da/class/base.php';
        
        $_SESSION['pquery'] = empty($_SERVER['QUERY_STRING'])?'':$_SERVER['QUERY_STRING'];
        $idN = $this->pid; 
        
        $stmt = mysqli_stmt_init($CON);
        $q = "SELECT * FROM lists WHERE id = ?;";
        mysqli_stmt_prepare($stmt, $q);
        mysqli_stmt_bind_param($stmt, 'i', $idN);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);

        $param = $this->pqueryString($_SESSION['pquery'], $idN);
        $urls = $this->generateUrl($res, $CON);
        $urls[0] = str_replace(strtolower($_SESSION['lang']).'/',"/",$urls[0]);
        $urlN = $base->host();
        $link = $urlN.$urls[0].$param;
        
        exit(header('Location: '.$link));
    }

    public function viaUrl($CON){
        include 'zata_da/class/base.php';
        include 'zata_da/class/cleanurl.class.php';
    
        $que = explode('&', $_SERVER['QUERY_STRING']);
        $first_segment = isset($que[0]) ? $que[0] : '';
        $que = $CURL->makeCleanUrl($first_segment);

        // Normalize the cleaned URL so appended param pairs like "-carid-110"
        // don't prevent a match against the DB-generated canonical URL.
        // We only strip trailing -key-value pairs for common param keys.
        $que = str_replace('/'.strtolower($_SESSION['lang']).'/', "/", $que);
        $que = strtolower($que);
        // remove trailing parameter pairs such as -carid-110 or -pid-95
        $que = preg_replace('/(-(?:carid|pid|vin|id|vid)-[^\/]+)+$/i', '', $que);
        $que = rtrim($que, '/');

        $queArr = explode('/', $que);
        $count = count($queArr);

        if($count > 1){
            $str = strtolower($queArr[1]);
            if($str == 'index.php' || $str == 'index'){
                exit($base->tohome());
            }elseif(!empty($str)){
                $cleanurl = end($queArr);

                $q = "SELECT * FROM lists WHERE list_cleanurl = '$cleanurl' AND list_lang='$_SESSION[lang]';";
                $res = $CON->query($q);
                $urls = $this->generateUrl($res, $CON);
                $idc = $urls[1];
                $urls = '/'.$urls[0];
                $urls = str_replace('/'.strtolower($_SESSION['lang']).'/',"/",$urls);
                $this->compareUrl($que, $urls, $base);
                
                $res = $CON->query($q);
                $ids = ''; $mod = ''; $clr = '';
                while ($id = $res->fetch_object()){
                    $ids = $id->id;
                    $mod = $id->list_module;
                    $clr = $id->list_cleanurl;
                }
                
                $q = "SELECT * FROM lists WHERE list_cleanurl = 'home' AND list_lang='$_SESSION[lang]';";
                $res = $CON->query($q);
                while ($id = $res->fetch_object()){
                    $hmn = $id->list_module;
                    $hid = $id->id;
                }

                return ['pid'=>$ids, 'idc'=>$idc, 'pmn'=>$mod, 'clr'=>$clr, 'hmn'=>$hmn, 'hid'=>$hid]; 
            }else{ 
                exit($base->tohome()); 
            }
        }else{ 
            exit($base->tohome()); 
        }
    }

    public function compareUrl($urlvonheader, $urlvondata, $base){
        if($urlvonheader != $urlvondata) 
            exit($base->tohome()); 
    }

}

$go_direct = new go_direct;