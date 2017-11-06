<?php
    
    //common function for web / android /ios user registration
     function saveUser($name, $email, $mobile, $otp, $password,$lkp_register_device_type_id,$mobile_token,$mobile_imei_address) {
        //Save data into users table
        global $conn;
        $created_at = date("Y-m-d h:i:s");
        $sqlIns = "INSERT INTO users (user_name,user_email,user_mobile,user_address,user_password,mobile_token,mobile_imei_address,created_at) VALUES ('$name','$email','$mobile','$address', '$password','$mobile_token','$mobile_imei_address','$created_at')";
        if ($conn->query($sqlIns) === TRUE) {
            return 1;
        } else {
            return 0;
        }
    }

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
        global $conn;        
        $headers = 'From: "'.$from.'"' . "\r\n" .            
            'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $message, $headers);

    }

    function getAllData($table)  {
        global $conn;
        $sql="select * from `$table` ";
        $result = $conn->query($sql);        
        return $result;
    }

    function getAllDataWhere($table,$clause,$value)  {
        global $conn;
        $sql="select * from `$table` WHERE `$clause` = '$value' ";
        $result = $conn->query($sql);        
        return $result;
    }

    function getAllDataWithStatus($table,$status)  {
        global $conn;
        $sql="select * from `$table` WHERE `lkp_status_id` = '$status' ";
        $result = $conn->query($sql); 
        return $result;
    }    
    
    function getRowsCount($table)  {
        global $conn;
        $sql="select * from `$table` ";
        $result = $conn->query($sql);
        $noRows = $result->num_rows;
        return $noRows;
    }

    /* encrypt and decrypt password */
     function encryptPassword($pwd) {
        $key = "123";
        $admin_pwd = bin2hex(openssl_encrypt($pwd,'AES-128-CBC', $key));
        return $admin_pwd;
    }

    function decryptPassword($admin_password) {
        $key = "123";
        $admin_pwd = openssl_decrypt(hex2bin($admin_password),'AES-128-CBC',$key);
        return $admin_pwd;
    }

    function getImageUnlink($val,$table,$clause,$id,$target_dir) {
        global $conn;
        $getBanner = "SELECT $val FROM $table WHERE $clause='$id' ";
        $getRes = $conn->query($getBanner);
        $row = $getRes->fetch_assoc();
        $img = $row[$val];
        $path = $target_dir.$img.'';
        chown($path, 666);
        if (unlink($path)) {
            return 1;
        } else {
            return 0;
        }
    }
?>
