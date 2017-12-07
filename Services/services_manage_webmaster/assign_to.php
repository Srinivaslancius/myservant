<?php include_once 'admin_includes/main_header.php'; ?>
<?php  
$assign_id = $_GET['assign_id'];
$subcat_id = $_GET['subcat_id'];
if (!isset($_POST['submit'])) {
  //If fail
    echo "fail";
} else {
    //If success            
  $service_provider = $_POST['service_provider'];
  $lkp_order_status_id = $_POST['lkp_order_status_id'];
  $sql = "UPDATE `services_orders` SET name = '$service_provider',lkp_order_status_id='$lkp_order_status_id' WHERE id = '$assign_id' AND sub_category_id = '$subcat_id'";
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
              $getServiceOrdersData = $getServiceOrders->fetch_assoc(); ?>
              <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <form data-toggle="validator" method="POST" autocomplete="off" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose Service Provider</label>
                    <select name="service_provider_registration_id" class="custom-select" data-error="This field is required.">
                      <option value="">Select Service Provider</option>
                      <?php $getServiceProvider = "SELECT * FROM service_provider_registration AS sp, service_provider_business_registration AS spb, service_provider_personal_registration AS spp, services_orders AS so WHERE spb.sub_category_id = '$subcat_id' OR spp.sub_category_id = '$subcat_id' ";
                      $getServiceProviderNames = $conn->query($getServiceProvider); ?>
                      <?php while($getServiceProviderData = $getServiceProviderNames->fetch_assoc()) { ?>
                          <option value="<?php echo $getServiceProviderData['id']; ?>"><?php echo $getServiceProviderData['name']; ?></option>
                      <?php } ?>
                   </select>
                    <div class="help-block with-errors"></div>
                  </div>
                  
                  <?php $getStatus = getAllData('lkp_order_status');?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose your status</label>
                    <select id="form-control-3" name="lkp_order_status_id" class="custom-select" data-error="This field is required." required>
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