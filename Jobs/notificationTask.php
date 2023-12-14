<?php
    function sendFCM(){
        $url = 'https://fcm.googleapis.com/fcm/send';
        $apiKey = 'AAAAS3yMUis:APA91bEvhkdb4n5hGXeZOVgRKhRk5j8jnJkpIuwaUDq9ToBN5kNw07abBV3grh52Pptc_eu3AZMKs2qqaF9_NMv3eCy9ubfYuIkTqRSCMBwnNPRxggvp0lSJFlMFhLTVRl7Q6npOk_z7';

        $headers = array(
            'Authorization:key='.$apiKey,
            'Content-Type:application/json'
        );
        $notiData = [
            'title' => 'Title push notification',
            'body' => 'body of notification demo'
        ];

        $dataPayload =[
            'to' => 'VIP',
            'date' => '2012',
            'other_data' => 'abcd'
        ];

        //create api body
        $notiBody = [
            'notificatoin' => $notiData,
            'data' =>$dataPayload,
            'time_to_live' => 3600,
            'to' => 'topics/newoffer'
        ];

        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, $url);
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $notiBody ) );
        $result = curl_exec($ch );
        echo($result);
        curl_close( $ch );
    }
    sendFCM();
?>