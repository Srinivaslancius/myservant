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
    $cusine_type_id = implode(',',$_POST["cusine_type_id"]);
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
    $created_at = date("Y-m-d h:i:s");   

      if($_FILES["fileToUpload"]["name"]!='' || $_FILES["fileToUpload1"]["name"]!='') {

              $fileToUpload = uniqid().$_FILES['fileToUpload']['name'];
              $target_dir = "../../uploads/food_vendor_logo/";
              $target_file = $target_dir . basename($fileToUpload);
              $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
              $getImgUnlink = getImageUnlink('logo','food_vendors','id',$id,$target_dir);

              $fileToUpload1 = uniqid().$_FILES['fileToUpload1']['name'];
              $target_dir1 = "../../uploads/food_vendor_Banner/";
              $target_file1 = $target_dir1 . basename($fileToUpload1);
              $imageFileType1 = pathinfo($target_file1,PATHINFO_EXTENSION);
              $getImgUnlink1 = getImageUnlink('vendor_banner','food_vendors','id',$id,$target_dir1);
                //Send parameters for img val,tablename,clause,id,imgpath for image ubnlink from folder
              if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $sql = "UPDATE food_vendors SET vendor_name = '$vendor_name', vendor_email = '$vendor_email', vendor_mobile = '$vendor_mobile',description = '$description', password = '$password',working_timings = '$working_timings',min_delivery_time = '$min_delivery_time',lkp_state_id = '$lkp_state_id',lkp_district_id = '$lkp_district_id',lkp_city_id = '$lkp_city_id',location = '$location', logo = '$fileToUpload',restaurant_address = '$restaurant_address',pincode = '$pincode', delivery_type_id ='$delivery_type_id', meta_title ='$meta_title', meta_desc= '$meta_desc',meta_keywords='$meta_keywords' , restaurant_name ='$restaurant_name',cusine_type_id= '$cusine_type_id'  WHERE id = '$id' ";
                    $conn->query($sql);
              }
              elseif (move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file1)) {
                  $sql = "UPDATE food_vendors SET vendor_name = '$vendor_name', vendor_email = '$vendor_email', vendor_mobile = '$vendor_mobile',description = '$description', password = '$password',working_timings = '$working_timings',min_delivery_time = '$min_delivery_time',lkp_state_id = '$lkp_state_id',lkp_district_id = '$lkp_district_id',lkp_city_id = '$lkp_city_id',location = '$location', vendor_banner = '$fileToUpload1',restaurant_address = '$restaurant_address',pincode = '$pincode', delivery_type_id ='$delivery_type_id', meta_title ='$meta_title', meta_desc= '$meta_desc',meta_keywords='$meta_keywords' , restaurant_name ='$restaurant_name',cusine_type_id= '$cusine_type_id'  WHERE id = '$id' ";
                  $conn->query($sql);
              }

              else {

                $sql = "UPDATE food_vendors SET vendor_name = '$vendor_name', vendor_email = '$vendor_email', vendor_mobile = '$vendor_mobile',description = '$description', password = '$password',working_timings = '$working_timings',min_delivery_time = '$min_delivery_time',lkp_state_id = '$lkp_state_id',lkp_district_id = '$lkp_district_id',lkp_city_id = '$lkp_city_id',location = '$location', restaurant_address = '$restaurant_address',pincode = '$pincode', delivery_type_id ='$delivery_type_id', meta_title ='$meta_title', meta_desc= '$meta_desc',meta_keywords='$meta_keywords' , restaurant_name ='$restaurant_name',cusine_type_id= '$cusine_type_id'  WHERE id = '$id' ";
              }
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
              <?php
                  $getCusineTypeId = explode(',',$getVendorsData['cusine_type_id']);
                  $getCusineTypes = getAllDataWithStatus('food_cusine_types','0');
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
                  <?php error_reporting(1)?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose Food Cusine Type</label>
                    <select name="cusine_type_id[]" class="custom-select" multiple="multiple" data-error="This field is required." required>
                      <option value="">Select Food Cusine Type</option>
                      <?php while($row1 = $getCusineTypes->fetch_assoc()) {  ?>
                          <option value="<?php echo $row1['id']; ?>" <?php if($row1['id'] == in_array($row1['id'], $getCusineTypeId)) { echo "selected=selected"; } ?> ><?php echo $row1['title']; ?></option>
                      <?php } ?>
                   </select>
                    <div class="help-block with-errors"></div>
                  </div>
                  
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Email</label>
                    <input type="email" name="vendor_email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" id="user_input" placeholder="Email" data-error="Please enter a valid email address." required value="<?php echo $getVendorsData['vendor_email'];?>" onkeyup="checkUserAvailTest()">
                    <span id="input_status" style="color: red;"></span>
                    <div class="help-block with-errors"></div>
                    <input type="hidden" id="table_name" value="food_vendors">
                    <input type="hidden" id="column_name" value="vendor_email">
            
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
                    <input type="password" name="password" id="password" minlength="8" data-error="Please Enter Minimum 8 characters."  class="form-control" id="form-control-2" placeholder="Password" data-error="Please enter Password." required value="<?php echo decryptPassword($getVendorsData['password']);?>">
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" id="form-control-2" placeholder="Confirm Password" onChange="checkPasswordMatch();" required >
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
                    <label for="form-control-2" class="control-label">Pincode</label>
                    <input type="text" name="pincode" class="form-control" id="form-control-2" placeholder="Pincode" data-error="Please enter Pincode." required maxlength="6"  onkeypress="return isNumberKey(event)" required value="<?php echo $getVendorsData['pincode'];?>" >
                    <div class="help-block with-errors"></div>
                  </div>
                    <div class="form-group">
                    <label for="form-control-4" class="control-label">logo</label>
                    <img src="<?php echo $base_url . 'uploads/food_vendor_logo/'.$getVendorsData['logo'] ?>"  id="output" height="100" width="100"/ required>
                    <label class="btn btn-default file-upload-btn">
                        Choose file...
                        <input id="form-control-22" class="file-upload-input" type="file" accept="image/*" name="fileToUpload" id="fileToUpload"  onchange="loadFile(event)"  multiple="multiple" required>
                      </label>
                  </div>
                  <div class="form-group">
                    <label for="form-control-4" class="control-label">Banner</label>
                    <img src="<?php echo $base_url . 'uploads/food_vendor_Banner/'.$getVendorsData['vendor_banner'] ?>"  id="output1" height="100" width="100"/>
                    <img id="output1" height="100" width="100"/>
                    <label class="btn btn-default file-upload-btn">
                      Choose file...
                        <input id="form-control-22" class="file-upload-input" type="file" accept="image/*" name="fileToUpload1" id="fileToUpload1"  onchange="loadFile1(event)"  multiple="multiple" >
                      </label>
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
        var confirmPassword = $("#confirm_password").val();
        if (confirmPassword != password) {
            $("#divCheckPasswordMatch").html("Passwords do not match!");
            $("#confirm_password").val("");
        } else {
            $("#divCheckPasswordMatch").html("");
        }
    }
    </script>