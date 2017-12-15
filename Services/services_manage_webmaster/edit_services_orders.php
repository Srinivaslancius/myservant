<?php
include_once '../../admin_includes/config.php';
if (!isset($_POST['assign'])) {
  //If fail
    echo "fail";
} else {
    //If success
  $id = $_POST['id'];
  $order_id = $_POST['order_id'];
  $order_price = $_POST['order_price'];
  $lkp_order_status_id = $_POST['lkp_order_status_id'];
  $lkp_payment_status_id = $_POST['lkp_payment_status_id'];
  $order_total = $_POST['order_total'];
  $delivery_date = date("Y-m-d h:i:s");
  $assign_service_provider_id = $_POST['assign_service_provider_id'];

  if($_POST['service_price_type_id'] == 1) {
    $order_total = $_POST['order_total'];
  } else {
    $order_total = $_POST['order_total']+$order_price;
  }

  $updateTotal = "UPDATE `services_orders` SET order_total = '$order_total' WHERE order_id = '$order_id'";
  $updateOrdertotal = $conn->query($updateTotal);
  
  $sql = "UPDATE `services_orders` SET assign_service_provider_id = '$assign_service_provider_id', order_price = '$order_price',order_total = '$order_total',lkp_order_status_id='$lkp_order_status_id', lkp_payment_status_id='$lkp_payment_status_id', delivery_date ='$delivery_date' WHERE id = '$id'";
  $res = $conn->query($sql);
  header("Location:order_invoice.php?id=".$id."");
  // if($conn->query($sql) === TRUE){
  //    echo "<script type='text/javascript'>window.location='services_orders.php?msg=success'</script>";
  // } else {
  //    echo "<script type='text/javascript'>window.location='services_orders.php?msg=fail'</script>";
  // }
}   
?>