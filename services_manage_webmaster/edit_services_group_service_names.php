<?php include_once 'admin_includes/main_header.php'; ?>
<?php  
$id = $_GET['gsnid'];
if (!isset($_POST['submit'])) {
      //If fail
        echo "fail";
    } else {
    //If success            
    $services_category_id = $_POST['services_category_id'];
    $services_sub_category_id = $_POST['services_sub_category_id'];
    $services_group_id = $_POST['services_group_id'];
    $group_service_name = $_POST['group_service_name'];
    $group_service_description = $_POST['group_service_description'];
    $service_price_type_id = $_POST['service_price_type_id'];
    $service_price = $_POST['service_price'];
    $price_after_visit_type_id = $_POST['price_after_visit_type_id'];
    $service_min_price = $_POST['service_min_price'];
    $service_max_price = $_POST['service_max_price'];
    $lkp_status_id = $_POST['lkp_status_id'];

      $sql = "UPDATE `services_group_service_names` SET services_category_id = '$services_category_id', services_sub_category_id = '$services_sub_category_id', services_group_id = '$services_group_id', group_service_name = '$group_service_name',group_service_description = '$group_service_description',service_price_type_id = '$service_price_type_id',service_price = '$service_price',price_after_visit_type_id = '$price_after_visit_type_id',service_min_price = '$service_min_price',service_max_price = '$service_max_price', lkp_status_id='$lkp_status_id' WHERE id = '$id' ";
      if($conn->query($sql) === TRUE){
         echo "<script type='text/javascript'>window.location='services_group_service_names.php?msg=success'</script>";
      } else {
         echo "<script type='text/javascript'>window.location='services_group_service_names.php?msg=fail'</script>";
      }
        
    }   
?>
      <div class="site-content">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="m-y-0">Group Names</h3>
          </div>
          <div class="panel-body">            
            <div class="row">
              <?php $getGroupNames = getAllDataWhere('services_group_service_names','id',$id);
              $getGroupNamesData = $getGroupNames->fetch_assoc(); ?>   
              <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <form data-toggle="validator" method="POST" enctype="multipart/form-data">
                  <?php $getServicesCategories = getAllDataWithStatus('services_category','0');?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose your Services Categories</label>
                    <select id="form-control-3" name="services_category_id" class="custom-select" data-error="This field is required." required>
                      <option value="">Select Services Categories</option>
                      <?php while($row = $getServicesCategories->fetch_assoc()) {  ?>
                          <option <?php if($row['id'] == $getGroupNamesData['services_category_id']) { echo "Selected"; } ?> value="<?php echo $row['id']; ?>"><?php echo $row['category_name']; ?></option>
                      <?php } ?>
                    </select>
                    <div class="help-block with-errors"></div>
                  </div>
                  <?php $getServicesSubCategories = getAllDataWithStatus('services_sub_category','0');?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose your Services Sub Categories</label>
                    <select id="form-control-3" name="services_sub_category_id" class="custom-select" data-error="This field is required." required>
                      <option value="">Select Services Sub Categories</option>
                      <?php while($row = $getServicesSubCategories->fetch_assoc()) {  ?>
                          <option <?php if($row['id'] == $getGroupNamesData['services_sub_category_id']) { echo "Selected"; } ?> value="<?php echo $row['id']; ?>"><?php echo $row['sub_category_name']; ?></option>
                      <?php } ?>
                    </select>
                    <div class="help-block with-errors"></div>
                  </div>
                  <?php $getGroup = getAllDataWithStatus('services_groups','0');?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose your Services Group</label>
                    <select id="form-control-3" name="services_group_id" class="custom-select" data-error="This field is required." required>
                      <option value="">Select Services Group</option>
                      <?php while($row = $getGroup->fetch_assoc()) {  ?>
                          <option <?php if($row['id'] == $getGroupNamesData['services_group_id']) { echo "Selected"; } ?> value="<?php echo $row['id']; ?>"><?php echo $row['group_name']; ?></option>
                      <?php } ?>
                    </select>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Group Service Name</label>
                    <input type="text" name="group_service_name" class="form-control" id="form-control-2" data-error="Please enter a Group Name" required value="<?php echo $getGroupNamesData['group_service_name'];?>">
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Gropu Description</label>
                    <textarea name="group_service_description" class="form-control" id="category_description" data-error="This field is required." required><?php echo $getGroupNamesData['group_service_description'];?></textarea>
                    <div class="help-block with-errors"></div>
                  </div>
                  <?php $getPriceTypes = getAllDataWithStatus('service_price_types','0');?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose your Price Types</label>
                      <div class="radio">
                        <?php while($getPriceTypes1 = $getPriceTypes->fetch_assoc()) {  ?>
                        <label>
                          <input name="service_price_type_id" id="service_price_type_id" value="<?php echo $getPriceTypes1['id']; ?>" type="radio" <?php if($getGroupNamesData['service_price_type_id']  == $getPriceTypes1['id']){ echo "checked=checked"; }?> required><?php echo $getPriceTypes1['price_type']; ?>
                        </label>
                        <?php } ?>
                      </div>
                    <div class="help-block with-errors"></div>
                  </div>
                  <?php if($getGroupNamesData['service_price_type_id'] == 1) {?>
                  <div class="form-group" id="service_price">
                    <label for="form-control-2" class="control-label">Service Price</label>
                    <input type="text" name="service_price" class="form-control" id="form-control-2" value="<?php echo $getGroupNamesData['service_price'];?>">
                    <div class="help-block with-errors"></div>
                  </div>
                  <?php } ?>
                  <?php if($getGroupNamesData['service_price_type_id'] == 2) {?>
                  <?php $getPriceAfterVisitTypes = getAllDataWithStatus('price_after_visit_types','0');?>
                  <div class="form-group" id="price_after_visit_type_id1">
                    <label for="form-control-3" class="control-label">Choose your Price After Visit Types</label>
                      <div class="radio">
                        <?php while($getPriceAfterVisitTypes1 = $getPriceAfterVisitTypes->fetch_assoc()) {  ?>
                        <label>
                          <input name="price_after_visit_type_id" id="price_after_visit_type_id" value="<?php echo $getPriceAfterVisitTypes1['id']; ?>" type="radio" <?php if($getGroupNamesData['price_after_visit_type_id']  == $getPriceAfterVisitTypes1['id']){ echo "checked=checked"; }?> ><?php echo $getPriceAfterVisitTypes1['price_after_visit_type']; ?>
                        </label>
                        <?php } ?>
                      </div>
                    <div class="help-block with-errors"></div>
                  </div>
                  <?php } ?>
                  <?php if($getGroupNamesData['service_price_type_id'] == 2 && $getGroupNamesData['price_after_visit_type_id'] == 2) {?>
                  <div class="form-group" id="service_min_price">
                    <label for="form-control-2" class="control-label">Service Min Price</label>
                    <input type="text" name="service_min_price" class="form-control" id="form-control-2"  value="<?php echo $getGroupNamesData['service_min_price'];?>">
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group" id="service_max_price">
                    <label for="form-control-2" class="control-label">Service Max Price</label>
                    <input type="text" name="service_max_price" class="form-control" id="form-control-2" value="<?php echo $getGroupNamesData['service_max_price'];?>">
                    <div class="help-block with-errors"></div>
                  </div>
                  <?php } ?>
                  <?php $getStatus = getAllData('lkp_status');?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose your status</label>
                    <select id="form-control-3" name="lkp_status_id" class="custom-select" data-error="This field is required." required>
                      <option value="">Select Status</option>
                      <?php while($row = $getStatus->fetch_assoc()) {  ?>
                          <option <?php if($row['id'] == $getGroupNamesData['lkp_status_id']) { echo "Selected"; } ?> value="<?php echo $row['id']; ?>"><?php echo $row['status']; ?></option>
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
<!-- Script for display Price Type -->
<script type="text/javascript">
  $(document).ready(function () {
    $("input[name='service_price_type_id']").click(function () {
      if ($("#service_price_type_id").is(":checked")) {
          $("#service_price").show();
      } else {
          $("#service_price").hide();
          $("#price_after_visit_type_id1").show();
      }
    });
  });
</script>
  <!-- Script to display price after visit type -->
  <script type="text/javascript">
  $(document).ready(function () {
    $("input[name='price_after_visit_type_id']").click(function () {
      if ($("#price_after_visit_type_id").is(":checked")) {
          $("#price_after_visit_type_id").val("Yes");
      } else {
          $("#service_min_price").show();
          $("#service_max_price").show();
      }
    });
  });
</script>
