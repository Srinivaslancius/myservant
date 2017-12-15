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

    function getSearchResults ($table,$searchParms) {
        global $conn;
        $sql= "SELECT * FROM `$table` WHERE lkp_status_id=0 AND (restaurant_address LIKE '$searchParms%' OR  pincode LIKE '$searchParms%') ";
        $result = $conn->query($sql);
        return $result;
    }

    function getFoodItemsByCategory($table,$clause1,$value1,$clause2,$value2)  {
        global $conn;        
        $sql="select * from `$table` WHERE `$clause1` = '$value1' AND `$clause2` = '$value2' AND lkp_status_id = '0' ";
        $result = $conn->query($sql);        
        return $result;
    }

    function getFoodCategoryByRestId($table,$clause1,$value1)  {
        global $conn;        
        $sql="select * from `$table` WHERE `$clause1` = '$value1' AND lkp_status_id = '0' GROUP BY category_id";
        $result = $conn->query($sql);        
        return $result;
    }

    function getProductsCountByCat($table,$field1,$value1,$field2,$value2)  {
        global $conn;
        $sql="SELECT * FROM `$table` WHERE `$field1` = '$value1' AND `$field2` = '$value2' AND lkp_status_id = 0";
        $result = $conn->query($sql);
        $noRows = $result->num_rows;
        return $noRows;
    }

?>
