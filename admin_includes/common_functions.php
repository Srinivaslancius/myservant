<?php
    
    //common function for get all data with where clause

    function getAllData($table)  {
        global $conn;
        $sql="select * from `$table` ";
        $result = $conn->query($sql);        
        return $result;
    }

    function getAllDataWhere($table,$clause,$value)  {
        global $conn;
        echo $sql="select * from `$table` WHERE `$clause` = '$value' "; die;
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
