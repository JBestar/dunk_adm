<?php

function getCurlRequest($url, $headers = null, $post = null){
    
    $timeout = 5;

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);

    if (!is_null($post)) {
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
    }
    if (!is_null($headers)) {
        curl_setopt($curl, CURLOPT_HEADER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    }
    curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);

    $response = curl_exec($curl);

    $result['error'] = "";
    if (curl_errno($curl)) {        
        $result['error'] = curl_error($curl);
        return "";            
    }

    $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
    $result['header'] = substr($response, 0, $header_size);
    $result['body'] = substr( $response, $header_size );

    curl_close($curl);

    return $result['body'];


}


function writeLog($contenet){ 
    
    if(!LOG_WRITE)
        return;

    $tmNow = time() ;
    $nHour = date("G",$tmNow);
    $nMin = date("i",$tmNow);
    $nSec = date("s",$tmNow);

    $sDate = date( 'Y-m-d', $tmNow);
    $fLog = fopen(LOG_FILE.$sDate, "a") ;

    $tContent = "[".$nHour.":".$nMin.":".$nSec."] ".$contenet."\r\n";

    fputs($fLog, $tContent);
    fclose($fLog);
}

?>