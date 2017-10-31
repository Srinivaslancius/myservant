<?php
    
    //common function for SMS and Email Templates

    function sendMobileSMS($message,$user_mobile) {
        global $conn;
        $username = "*****";
        $password = "*****";
        $numbers = "$user_mobile"; // mobile number
        $sender = urlencode('*****'); // assigned Sender_ID
        // Message text required to deliver on mobile number
        $data = "username="."$username"."&password="."$password"."&to="."$numbers"."&from="."$sender"."&msg="."$message"."&type=1";
        $data = "https://www.smsstriker.com/API/sms.php?".$data;
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$data);
        $response = curl_exec($ch);        
    }

    function sendEmail($to,$subject,$message,$from) {
        //global $conn;        
        $headers = 'From: "'.$from.'"' . "\r\n" .            
            'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $message, $headers);

    }
    
?>
