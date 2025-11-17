<?php

 function versioned_asset($path, $secure = null)
    {
        $timestamp = @filemtime(public_path($path)) ?: 0;
        return asset($path, $secure) . '?ser=' . sha1($timestamp.'saiyusoff');
    }

function getRemotePDF($url, $fname){

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $output = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    //dd($code);

    if ($code == 200) {

        $response = response($output, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => "inline; filename=$fname; ",
        ]);

        return $response;
    } else {
        return false;
    }
}

function __processTabularOutput($out){
    if($out!=NULL)
        $out = trim($out);
    switch(strtolower($out)){
        case 'y':
        case 'yes':
            $out = '<img src="'.asset('img/interface/icn-tick-black.png').'">';
            break;
        case 'n':
        case 'no':
            $out = '-';
        case '':
        case NULL:
            $out = '';
            break;
    }
    return $out;
}

function sai_changeTHsup($str){
    $title_wtag = $str;
    $title_wtag = str_replace(['1st'], '1<sup>st</sup> ', $title_wtag);
    $title_wtag = str_replace(['2nd'], '2<sup>nd</sup> ', $title_wtag);
    $title_wtag = str_replace(['3rd'], '3<sup>rd</sup> ', $title_wtag);
    $title_wtag = str_replace(['4th'], '4<sup>th</sup> ', $title_wtag);
        $title_wtag = str_replace(['5th'], '5<sup>th</sup> ', $title_wtag);
            $title_wtag = str_replace(['6th'], '6<sup>th</sup> ', $title_wtag);
                $title_wtag = str_replace(['7th'], '7<sup>th</sup> ', $title_wtag);
                    $title_wtag = str_replace(['8th'], '8<sup>th</sup> ', $title_wtag);
                        $title_wtag = str_replace(['9th'], '9<sup>th</sup> ', $title_wtag);
                            $title_wtag = str_replace(['0th'], '0<sup>th</sup> ', $title_wtag);

    return $title_wtag;
}



?>
