<?php
    
    function getFoodHomeBanners() {
        global $conn;
        $sql="SELECT * FROM `food_banners` AS fb, `food_category` fc WHERE fc.`lkp_status_id` = '0' AND  fb.`lkp_status_id` = '0 '  ";
        $result = $conn->query($sql);        
        return $result;
    }

      function getUsersRowsCount($table,$field,$value)  {
        global $conn;
        $sql="SELECT * FROM `users` WHERE `$field` = '$value' ";
        $result = $conn->query($sql);
        $noRows = $result->num_rows;
        return $noRows;
    }

?>
