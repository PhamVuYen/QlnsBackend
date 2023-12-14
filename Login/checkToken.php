<?php

    include '../Connect.php';
    include 'responseLogin1.php';


    function jwt_valid($jwt, $key = 'key'){

        $Token = explode('.', $jwt);
        $header = base64_decode($Token[0]);
        $payload = base64_decode($Token[1]);
        $signature_provided = $Token[2];

        //
        $base64Url_header = base64UrlEncode($header);
        $base64Url_payload = base64UrlEncode($payload);
        $signature = hash_hmac('SHA256', "$base64Url_header. "." .$base64Url_payload", $key, true);
        $base64Url_signature = base64UrlEncode($signature);

        $is_signature_valid = ($base64Url_signature === $signature_provided);
        echo $base64Url_payload;
        if(!$base64Url_payload){
            echo "error";
        }else{
            
            echo $base64Url_payload;
            echo "done";
        }
    }

?>