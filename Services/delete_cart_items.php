<?php
include_once 'meta.php';
$cart_id = $_GET['cart_id'];
$qry = "DELETE FROM services_cart WHERE id ='$cart_id'";
$result = $conn->query($qry);
if(isset($result)) {
   echo "<script>alert('Cart Item Deleted Successfully');history.go(-1);</script>";
} else {
   echo "<script>alert('Cart Item Not Deleted');history.go(-1);</script>";
}
?>