<?php
function referer($file) {
    if(isset($_SERVER['HTTP_REFERER'])){
        $refer = $_SERVER['HTTP_REFERER'];
        $arr = explode('/', $refer);
        $count = count($arr);
        if($arr[$count - 2] == $file){
            exit('Alert: Hacker log recorded.');
        }
    }else{
        exit('Hacker log recorded.');
    }
}referer('mn');
$UNIT=''; $MSG=''; $FEED = ''; $IDN = '';$TXT='';
$THKtxt=''; $THKttl=''; $MLtxt=''; $MLttl='';
$INFO = [];

include_once '../config.php';
require '../class/media.class.php';
require '../class/minify.class.php';
//=================================
//=================================
if(isset($_POST['mnid'])){
    $mnid = $_POST['mnid'];
    $q = "SELECT * FROM lists WHERE list_fid='$mnid' AND list_type='i' AND list_module='1' LIMIT 1;";
    $res = $CON->query($q);
    while($info=$res->fetch_object()){
        $THKtxt = $MIN->html($info->list_content);
        
        $THKttl = '<h2>'.strip_tags($info->list_title).'</h2>';
    }
    
    $q = "SELECT * FROM lists WHERE list_fid='$mnid' AND list_type='i' AND list_module='2' LIMIT 1;";
    $res = $CON->query($q);
    while($info=$res->fetch_object()){
        $MLtxt = $MIN->html($info->list_content);
        
        $MLttl = strip_tags($info->list_title);
    }
}

if(empty($THKtxt))
    $THKtxt="<p class='text-center'>Thank you for your participation</p>";

if(empty($THKttl))
    $THKttl = '<h2>Information Received.</h2>';

if(empty($MLtxt))
    $MLtxt = "<p>Dear Customer,</p>
              <p>Thank you for your participation. Please be informed that your mail is received.</p>
              <p>Good Day,<br>AEON Wellness</p>";

if(empty($MLttl))
    $MLttl = 'Thank You For Your Participation!';

//=================================
//=================================

if(isset($_POST['formid'])){
    //prepare data
    $que = explode('($$)', $_POST['que']);
    $formid = $_POST['formid'];
    for($i=0;$i<count($que);$i++){
        if(!empty($_FILES[$que[$i]]['name'])){
            $LOC='../src/form/';
            $TYP=$_FILES[$que[$i]]['type'];
            
            if (!file_exists($LOC)) 
                exit('directory not found.');
            
            if(!is_dir($LOC.$formid))
                if(!mkdir($LOC.$formid))
                    exit('Failed Create Media Folder.');
            
            $INFO[$que[$i]]=$MEDIA->uploadimg($_FILES[$que[$i]], $LOC.$formid.'/');
            
            if (preg_match('/image/', $TYP))
                $MEDIA->imgResize($LOC.$formid.'/'.$INFO[$que[$i]], 0.5);
        }else{
            $INFO[$que[$i]] = empty($_POST[$que[$i]])?'':$_POST[$que[$i]];
            if(is_array($INFO[$que[$i]])){ $INFO[$que[$i]] = join(', ', $INFO[$que[$i]]); }
        }
    }
    
    $info = json_encode($INFO, true);
    
    $q = "INSERT INTO col (col_fuid, col_json, col_cdate) VALUES (?, ?, NOW());"; 
    $stmt = mysqli_stmt_init($CON);
    mysqli_stmt_prepare($stmt, $q);
    mysqli_stmt_bind_param($stmt, 'ss', $formid, $info);
    if(mysqli_stmt_execute($stmt)){
         $IDN = $CON->lastInsertId();
         $FEED='400'; $MSG='<h2>Mail Not Sent</h2>';
    }else{$FEED='400'; $MSG='<h2>Failed Submission</h2>';}
    
    if(isset($_POST['mailto'])){
        $mailto = $_POST['mailto'];
        for($i=0;$i<count($mailto);$i++){
            $subject = $MLttl;

            $message = "<html>
                        <head>
                        <title>HTML email</title>
                        </head>
                        <body>
                        $MLtxt
                        </body>
                        </html>
                        ";
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= "From: AEON Wellness <autoozly@automisch.com>" . "\r\n".
                        "Reply-To: no-reply@wellness.com\r\n";
            //$headers .= 'Cc: '.$comp['cMail'] . "\r\n";

            if(mail($_POST[$mailto[$i]],$subject,$message,$headers)){
                //echo 'success';
                $FEED='200'; $MSG=$THKttl.$THKtxt;
            }else{
                $FEED='400'; $MSG='<h2>Failed Submission</h2>';
            }
        }
    }else{
        $FEED='200'; $MSG=$THKttl.$THKtxt;
    }
    
}else{ $FEED='400'; $MSG='Invalid Access'; }

$DATA = ['feed'=>$FEED, 'msg'=>$MSG, 'unit'=>$UNIT, 'uid'=>$IDN, 'txt'=>$TXT];
$DATA = json_encode($DATA);
echo $DATA;