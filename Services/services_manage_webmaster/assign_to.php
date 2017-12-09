<?php include_once 'admin_includes/main_header.php'; ?>
<?php  
$assign_id = $_GET['assign_id'];
$subcat_id = $_GET['subcat_id'];
if (!isset($_POST['submit'])) {
  //If fail
    echo "fail";
} else {
    //If success            
  $assign_service_provider_id = $_POST['assign_service_provider_id'];
  $order_price = $_POST['order_price'];
  $lkp_order_status_id = $_POST['lkp_order_status_id'];
  $lkp_payment_status_id = $_POST['lkp_payment_status_id'];
  $order_total = $_POST['order_total'];
  $delivery_date = date("Y-m-d h:i:s");;

  if($_POST['service_price_type_id'] == 1) {
    $order_total = $_POST['order_total'];
  } else {
    $order_total = $_POST['order_total']+$order_price;
  }
  
  $sql = "UPDATE `services_orders` SET assign_service_provider_id = '$assign_service_provider_id',order_price = '$order_price',order_total = '$order_total',lkp_order_status_id='$lkp_order_status_id', lkp_payment_status_id='$lkp_payment_status_id', delivery_date ='$delivery_date' WHERE id = '$assign_id' AND sub_category_id = '$subcat_id'";
  if($conn->query($sql) === TRUE){
     echo "<script type='text/javascript'>window.location='services_orders.php?msg=success'</script>";
  } else {
     echo "<script type='text/javascript'>window.location='services_orders.php?msg=fail'</script>";
  }
}   
?>
 <div class="site-content">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="m-y-0">Service Orders</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <?php $getServiceOrders1 = "SELECT * FROM services_orders WHERE id = '$assign_id' AND sub_category_id = '$subcat_id'"; $getServiceOrders = $conn->query($getServiceOrders1);
              $getServiceOrdersData = $getServiceOrders->fetch_assoc(); 
              ?>
              <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <form data-toggle="validator" method="POST" autocomplete="off" enctype="multipart/form-data">
                  <input type="hidden" name="order_total" value="<?php echo $getServiceOrdersData['order_total'];?>">
                  <input type="hidden" name="service_price_type_id" value="<?php echo $getServiceOrdersData['service_price_type_id'];?>">
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose Service Provider</label>
                    <select name="assign_service_provider_id" class="custom-select" data-error="This field is required." required>
                      <option value="">Select Service Provider</option>
                      <?php $getServiceProvider = "SELECT spr.id,spr.name,spr.lkp_status_id FROM service_provider_registration spr LEFT JOIN service_provider_business_registration spb ON spr.id = spb.service_provider_registration_id LEFT JOIN service_provider_personal_registration spp ON spr.id = spp.service_provider_registration_id WHERE spr.lkp_status_id=0 AND ( spb.sub_category_id = '$subcat_id' OR spp.sub_category_id = '$subcat_id'  )";
                      $getServiceProviderNames = $conn->query($getServiceProvider); 
                      while($getServiceProviderData = $getServiceProviderNames->fetch_assoc()) { ?>
                      <option <?php if($getServiceProviderData['id'] == $getServiceOrdersData['assign_service_provider_id']) { echo "Selected"; } ?> value="<?php echo $getServiceProviderData['id']; ?>"><?php echo $getServiceProviderData['name']; ?></option>
                      <?php } ?>
                    </select>
                    <div class="help-block with-errors"></div>
                  </div>

                  <?php if($getServiceOrdersData['service_price_type_id'] == 1) { ?>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Order Price</label>
                    <input type="text" readonly name="order_price" class="form-control" id="form-control-2" placeholder="Service Price" data-error="Please enter Service Price." required value="<?php echo $getServiceOrdersData['order_price'];?>">
                    <div class="help-block with-errors"></div>
                  </div>
                  <?php } else { ?>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Order Price</label>
                    <input type="text" name="order_price" class="form-control valid_price_dec" id="form-control-2" placeholder="Service Price" data-error="Please enter Service Price." required value="<?php echo $getServiceOrdersData['order_price'];?>">
                    <div class="help-block with-errors"></div>
                  </div>
                  <?php } ?>

                  <?php $getPaymentStatus = getAllData('lkp_payment_status');?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose your Payment status</label>
                    <select id="form-control-3" name="lkp_payment_status_id" class="custom-select" data-error="This field is required." required>
                      <option value="">Select Payment status</option>
                      <?php while($row = $getPaymentStatus->fetch_assoc()) {  ?>
                      <option <?php if($row['id'] == $getServiceOrdersData['lkp_payment_status_id']) { echo "Selected"; } ?> value="<?php echo $row['id']; ?>"><?php echo $row['payment_status']; ?></option>
                      <?php } ?>
                   </select>
                    <div class="help-block with-errors"></div>
                  </div>
                  
                  <?php $getStatus = getAllData('lkp_order_status');?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose your status</label>
                    <select id="form-control-3" name="lkp_order_status_id" class="custom-select" data-error="This field is required." required>
                      <option value="">Select Payment status</option>
                      <?php while($row = $getStatus->fetch_assoc()) {  ?>
                          <option <?php if($row['id'] == $getServiceOrdersData['lkp_order_status_id']) { echo "Selected"; } ?> value="<?php echo $row['id']; ?>"><?php echo $row['order_status']; ?></option>
                      <?php } ?>
                   </select>
                    <div class="help-block with-errors"></div>
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
              </div>
            </div>
            <hr>
          </div>
        </div>
      </div>
<?php include_once 'admin_includes/footer.php'; ?>