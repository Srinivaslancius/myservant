<?php include_once 'admin_includes/main_header.php'; ?>
<?php  
$id = $_GET['bid'];

if (!isset($_POST['submit'])) {
      //If fail
        echo "fail";
    } else {
    //If success            
    $vendor_name = $_POST['vendor_name'];
    $restaurant_name = $_POST['restaurant_name'];
    $restaurant_address = $_POST['restaurant_address'];
    $pincode = $_POST['pincode'];
    $delivery_type_id = implode(',',$_POST["delivery_type_id"]);
    $meta_title = $_POST['meta_title'];
    $meta_keywords = $_POST['meta_keywords'];
    $meta_desc = $_POST['meta_desc'];
    $vendor_email = $_POST['vendor_email'];
    $vendor_mobile = $_POST['vendor_mobile'];
    $description = $_POST['description'];
    $password = encryptPassword($_POST['password']);
    $working_timings = $_POST['working_timings'];
    $min_delivery_time = $_POST['min_delivery_time'];
    $lkp_state_id = $_POST['lkp_state_id'];
    $lkp_district_id = $_POST['lkp_district_id'];
    $lkp_city_id = $_POST['lkp_city_id'];
    $location = $_POST['location'];
    $lkp_status_id = $_POST['lkp_status_id'];
    $created_at = date("Y-m-d h:i:s");
    $fileToUpload = uniqid().$_FILES['fileToUpload']['name'];

      if($_FILES["fileToUpload"]["name"]!='') {

              $fileToUpload = uniqid().$_FILES['fileToUpload']['name'];
              $target_dir = "../../uploads/food_vendor_logo/";
              $target_file = $target_dir . basename($fileToUpload);
              $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
              $getImgUnlink = getImageUnlink('logo','food_vendors','id',$id,$target_dir);
                //Send parameters for img val,tablename,clause,id,imgpath for image ubnlink from folder
              if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $sql = "UPDATE food_vendors SET vendor_name = '$vendor_name', vendor_email = '$vendor_email', vendor_mobile = '$vendor_mobile',description = '$description', password = '$password',working_timings = '$working_timings',min_delivery_time = '$min_delivery_time',lkp_state_id = '$lkp_state_id',lkp_district_id = '$lkp_district_id',lkp_city_id = '$lkp_city_id',location = '$location', logo = '$fileToUpload',restaurant_address = '$restaurant_address',pincode = '$pincode', delivery_type_id ='$delivery_type_id', meta_title ='$meta_title', meta_desc= '$meta_desc',meta_keywords='$meta_keywords' , restaurant_name ='$restaurant_name'  WHERE id = '$id' ";
                    if($conn->query($sql) === TRUE){
                       echo "<script type='text/javascript'>window.location='vendors.php?msg=success'</script>";
                    } else {
                       echo "<script type='text/javascript'>window.location='vendors.php?msg=fail'</script>";
                    }
                    //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
      } else {

          $sql = "UPDATE food_vendors SET vendor_name = '$vendor_name', vendor_email = '$vendor_email', vendor_mobile = '$vendor_mobile',description = '$description', password = '$password',working_timings = '$working_timings',min_delivery_time = '$min_delivery_time',lkp_state_id = '$lkp_state_id',lkp_district_id = '$lkp_district_id',lkp_city_id = '$lkp_city_id',location = '$location', restaurant_address = '$restaurant_address',pincode = '$pincode', delivery_type_id ='$delivery_type_id', meta_title ='$meta_title', meta_desc= '$meta_desc',meta_keywords='$meta_keywords' , restaurant_name ='$restaurant_name'  WHERE id = '$id' ";
          if($conn->query($sql) === TRUE){
             echo "<script type='text/javascript'>window.location='vendors.php?msg=success'</script>";
          } else {
             echo "<script type='text/javascript'>window.location='vendors.php?msg=fail'</script>";
          }

      }
  }   
?>
      <div class="site-content">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="m-y-0">Vendors</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <?php $getAllVendorsData = getAllDataWhere('food_vendors','id',$id);
              $getVendorsData = $getAllVendorsData->fetch_assoc(); ?> 
              <?php
                  $getDeliveryTypeId = explode(',',$getVendorsData['delivery_type_id']);
                  $getDeliveryTypes = getAllDataWithStatus('food_product_delivery_type','0');
                    ?> 
              <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <form data-toggle="validator" method="POST" autocomplete="off" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Vendor Name</label>
                    <input type="text" name="vendor_name" class="form-control" id="form-control-2" placeholder="Vendor Name" data-error="Please enter Vendor Name" required value="<?php echo $getVendorsData['vendor_name'];?>">
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Restaurant Name</label>
                    <input type="text" name="restaurant_name" class="form-control" id="form-control-2" placeholder="Restaurant Name" data-error="Please enter restaurant name" required value="<?php echo $getVendorsData['restaurant_name'];?>">
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Restaurent Address</label>
                    <textarea name="restaurant_address" id="restaurant_address" class="form-control"  placeholder="Restuarent Address" data-error="This field is required." required><?php echo $getVendorsData['restaurant_address'];?></textarea>
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose your Delivery Type</label>
                    <select name="delivery_type_id[]" class="custom-select" multiple="multiple" data-error="This field is required." required>
                      <option value="">Select Delivery Type</option>
                      <?php while($row = $getDeliveryTypes->fetch_assoc()) {  ?>
                          <option value="<?php echo $row['id']; ?>" <?php if($row['id'] == in_array($row['id'], $getDeliveryTypeId)) { echo "selected=selected"; }?> ><?php echo $row['delivery_type']; ?></option>
                      <?php } ?>
                   </select>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" id="form-control-2" placeholder="Meta Title" data-error="Please enter meta title" required value="<?php echo $getVendorsData['meta_title'];?>">
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Meta Keywords</label>
                    <input type="text" name="meta_keywords" class="form-control" id="form-control-2" placeholder="Meta Keywords" data-error="Please enter Meta Keywords" required value="<?php echo $getVendorsData['meta_keywords'];?>">
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label"> Meta Description</label>
                    <textarea name="meta_desc" class="form-control" id="meta_desc" placeholder="Description" data-error="This field is required." required ><?php echo $getVendorsData['meta_desc'];?></textarea>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Pincode</label>
                    <input type="text" name="pincode" class="form-control" id="form-control-2" placeholder="Pincode" data-error="Please enter Pincode." required maxlength="6"  required value="<?php echo $getVendorsData['pincode'];?>" >
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Email</label>
                    <input type="email" name="vendor_email" class="form-control" id="form-control-2" placeholder="Email" data-error="Please enter a valid email address." required value="<?php echo $getVendorsData['vendor_email'];?>">
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Mobile</label>
                    <input type="text" name="vendor_mobile" class="form-control" id="form-control-2" placeholder="Mobile" data-error="Please enter Correct Mobile Number." required maxlength="10" pattern="[0-9]{10}" onkeypress="return isNumberKey(event)" value="<?php echo $getVendorsData['vendor_mobile'];?>">
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Description</label>
                    <textarea name="description" class="form-control" id="description" data-error="Please enter a valid email address." required><?php echo $getVendorsData['description'];?></textarea>
                    <div class="help-block with-errors"></div>
                  </div>
      
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" id="form-control-2" placeholder="Password" data-error="Please enter Password." required value="<?php echo decryptPassword($getVendorsData['password']);?>">
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" id="form-control-2" placeholder="Confirm Password" data-error="Please enter Confirm Password." required value="<?php echo decryptPassword($getVendorsData['confirm_pass']); ?>">
                    <div class="help-block with-errors"></div>
                  </div>
                  <div id="divCheckPasswordMatch" style="color:red"></div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Working Timings</label>
                    <input type="text" name="working_timings" class="form-control" id="form-control-2" placeholder="Working Timings" data-error="Please enter Working Timings" required  value="<?php echo $getVendorsData['working_timings'];?>">
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Minimum Delivery Time</label>
                    <input type="text" name="min_delivery_time" class="form-control" id="form-control-2" placeholder="Minimum Delivery Time" data-error="Please enter Minimum Delivery Time" required  value="<?php echo $getVendorsData['min_delivery_time'];?>">
                    <div class="help-block with-errors"></div>
                  </div>
                
                   <?php $getStates = getAllDataWithStatus('lkp_states','0');?>

                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose your State</label>
                    <select name="lkp_state_id" class="custom-select" data-error="This field is required." required onChange="getDistricts(this.value);">
                      <option value="">Select State</option>
                      <?php while($row = $getStates->fetch_assoc()) {  ?>
                          <option <?php if($row['id'] == $getVendorsData['lkp_state_id']) { echo "Selected"; } ?> value="<?php echo $row['id']; ?>"><?php echo $row['state_name']; ?></option>
                      <?php } ?>
                   </select>
                    <div class="help-block with-errors"></div>
                  </div>
                  <?php $getDistrcits = getAllDataWithStatus('lkp_districts','0');?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose your District</label>
                    <select id="lkp_district_id" name="lkp_district_id" class="custom-select" data-error="This field is required." required onChange="getCities(this.value);">
                      <option value="">Select District</option>
                      <?php while($row = $getDistrcits->fetch_assoc()) {  ?>
                          <option <?php if($row['id'] == $getVendorsData['lkp_district_id']) { echo "Selected"; } ?> value="<?php echo $row['id']; ?>"><?php echo $row['district_name']; ?></option>
                      <?php } ?>
                    </select>
                    <div class="help-block with-errors"></div>
                  </div>
                   <?php $getCities = getAllDataWithStatus('lkp_cities','0');?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose your City</label>
                    <select id="lkp_city_id" name="lkp_city_id" class="custom-select" data-error="This field is required." required>
                      <option value="">Select City</option>
                      <?php while($row = $getCities->fetch_assoc()) {  ?>
                          <option <?php if($row['id'] == $getVendorsData['lkp_city_id']) { echo "Selected"; } ?> value="<?php echo $row['id']; ?>"><?php echo $row['city_name']; ?></option>
                      <?php } ?>
                    </select>
                    <div class="help-block with-errors"></div>
                  </div>
                   <div class="form-group">
                    <label for="form-control-2" class="control-label">Location</label>
                    <input type="text" name="location" class="form-control" id="form-control-2" placeholder="Location Name" data-error="Please enter Location" required value="<?php echo $getVendorsData['location'];?>">
                    <div class="help-block with-errors"></div>
                  </div>
                    <div class="form-group">
                    <label for="form-control-4" class="control-label">logo</label>
                    <img src="<?php echo $base_url . 'uploads/food_vendor_logo/'.$getVendorsData['logo'] ?>"  id="output" height="100" width="100"/>
                    <label class="btn btn-default file-upload-btn">
                        Choose file...
                        <input id="form-control-22" class="file-upload-input" type="file" accept="image/*" name="fileToUpload" id="fileToUpload"  onchange="loadFile(event)"  multiple="multiple" >
                      </label>
                  </div>
                  <?php $getStatus = getAllData('lkp_status');?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose your status</label>
                    <select id="form-control-3" name="lkp_status_id" class="custom-select" data-error="This field is required." required>
                      <option value="">Select Status</option>
                      <?php while($row = $getStatus->fetch_assoc()) {  ?>
                          <option <?php if($row['id'] == $getVendorsData['lkp_status_id']) { echo "Selected"; } ?> value="<?php echo $row['id']; ?>"><?php echo $row['status']; ?></option>
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

<script src="//cdn.ckeditor.com/4.7.0/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'description' );
    CKEDITOR.replace( 'meta_desc' );

</script>
<style type="text/css">
    .cke_top, .cke_contents, .cke_bottom {
        border: 1px solid #333;
    }
</style>
<script type="text/javascript">
      
      function checkPasswordMatch() {
        var password = $("#password").val();
        var confirmPassword = $("#confirm_pass").val();
        if (confirmPassword != password) {
            $("#divCheckPasswordMatch").html("Passwords do not match!");
            $("#confirm_password").val("");
        } else {
            $("#divCheckPasswordMatch").html("");
        }
    }
    </script>