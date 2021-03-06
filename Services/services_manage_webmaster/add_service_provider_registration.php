<?php include_once 'admin_includes/main_header.php'; ?>
<?php  
error_reporting(1);
if (!isset($_POST['submit']))  {
  //If fail
  echo "fail";
}else  {
  //If success
  //echo "<pre>";print_r($_POST);exit;
  $name = $_POST['name'];
  $email = $_POST['email'];
  $mobile_number = $_POST['mobile_number'];
  $address = $_POST['address'];
  $service_provider_type_id = $_POST['service_provider_type_id'];
  $company_name = $_POST['company_name'];
  $est_year = $_POST['est_year'];
  $total_no_of_emp = $_POST['total_no_of_emp'];
  $description = $_POST['description'];
  $certification = $_POST['certification'];
  $working_hours = $_POST['working_hours'];
  $working_hours1 = $_POST['working_hours1'];
  $contact_numbers = $_POST['contact_numbers'];
  $email_id = $_POST['email_id'];
  $sub_category_id = $_POST['sub_category_id'];
  $sub_category_id1 = $_POST['sub_category_id1'];
  $associate_or_not = $_POST['associate_or_not'];
  $experience = $_POST['experience'];
  $created_at = date("Y-m-d h:i:s");
  $fileToUpload = $_FILES["fileToUpload"]["name"];
  $fileToUpload1 = $_FILES["fileToUpload1"]["name"];
  if($sub_category_id == 0) {
    $specialization_name = $_POST['specialization_name'];
  } else {
    $specialization_name = 0;
  }
  if($sub_category_id1 == 0) {
    $specialization_name1 = $_POST['specialization_name1'];
  } else {
    $specialization_name1 = 0;
  }
  
  $service_provider = "INSERT INTO service_provider_registration (`name`, `email`, `mobile_number`, `address`,`service_provider_type_id`,`created_at`) VALUES ('$name', '$email', '$mobile_number', '$address','$service_provider_type_id', '$created_at')";
  $result1 = $conn->query($service_provider);
  $last_id = $conn->insert_id;

  if($service_provider_type_id == 1) {

    if($fileToUpload!='') {

      $target_dir = "../../uploads/service_provider_business_logo/";
      $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          $sql = "INSERT INTO service_provider_business_registration (`service_provider_registration_id`,`service_provider_type_id`, `company_name`,`est_year`, `total_no_of_emp`, `description`, `certification`, `working_hours`, `contact_numbers`, `email_id`, `sub_category_id`, `specialization_name`, `associate_or_not`,`logo`) VALUES ('$last_id','$service_provider_type_id', '$company_name', '$est_year', '$total_no_of_emp', '$description', '$certification', '$working_hours', '$contact_numbers', '$email_id','$sub_category_id', '$specialization_name', '$associate_or_not','$fileToUpload')"; 
          $res = $conn->query($sql);
      }
    }
  } else {

    if($fileToUpload1!='') {

      $target_dir1 = "../../uploads/service_provider_personal_iamge/";
      $target_file1 = $target_dir1 . basename($_FILES["fileToUpload1"]["name"]);
      $imageFileType = pathinfo($target_file1,PATHINFO_EXTENSION);

      if (move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file1)) {
          $sql1 = "INSERT INTO service_provider_personal_registration (`service_provider_registration_id`,`service_provider_type_id`, `experience`,`image`, `working_hours`, `sub_category_id`, `specialization_name`) VALUES ('$last_id','$service_provider_type_id', '$experience', '$fileToUpload1', '$working_hours1','$sub_category_id1', '$specialization_name1')"; 
          $res = $conn->query($sql1);
      }
    }
  }
 
  if($result1 == 1) {
    echo "<script type='text/javascript'>window.location='service_provider_registration.php?msg=success'</script>";
  } else {
    echo "<script type='text/javascript'>window.location='service_provider_registration.php?msg=fail'</script>";
  }
}
?>
      <div class="site-content">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="m-y-0">Service Provider Registrations</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <form autocomplete="off" data-toggle="validator" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Name</label>
                    <input type="text" name="name" class="form-control" id="form-control-2" placeholder="Name" data-error="Please enter Name" required>
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Email</label>
                    <input type="email" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" id="user_input" placeholder="email" data-error="Please enter Valid Email Address" onkeyup="checkUserAvailTest()" required>
                    <span id="input_status" style="color: red;"></span>
                    <div class="help-block with-errors"></div>
                    <input type="hidden" id="table_name" value="service_provider_registration">
                    <input type="hidden" id="column_name" value="email">
                  </div>

                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Mobile Number</label>
                    <input type="text" name="mobile_number" class="form-control valid_mobile_num" id="form-control-2" placeholder="Mobile Number" data-error="Please enter mobile number." required maxlength="10" pattern="[0-9]{10}">
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Address</label>
                    <textarea name="address" class="form-control" id="category_description" placeholder="Address" data-error="Please enter Address." required></textarea>
                    <div class="help-block with-errors"></div>
                  </div>

                  <?php $getServiceProviderTypes = getAllDataWithStatus('service_provider_types','0');?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose your Service Provider</label>
                    <select name="service_provider_type_id" class="custom-select service_provider_type_id" id="service_provider_type_id" data-error="This field is required." required>
                      <option value="">Select Service Provider</option>
                      <?php while($row = $getServiceProviderTypes->fetch_assoc()) {  ?>
                          <option value="<?php echo $row['id']; ?>" ><?php echo $row['service_provider_type']; ?></option>
                      <?php } ?>
                   </select>
                    <div class="help-block with-errors"></div>
                  </div>

                  <div id="service_provider_business_type">
                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Company Name</label>
                    <input type="text" name="company_name" class="form-control service_provider_business" id="form-control-2" placeholder="Company Name" data-error="Please enter Company Name">
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Years</label>
                    <input type="text" name="est_year" class="form-control service_provider_business valid_mobile_num" id="form-control-2" placeholder="Years" data-error="Please enter Years">
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Total Number of Employees</label>
                    <input type="text" name="total_no_of_emp" class="form-control service_provider_business valid_mobile_num" id="form-control-2" placeholder="Total Number of Employees" data-error="Please enter Total Number of Employees">
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-4" class="control-label">Logo</label>
                    <img id="output" height="100" width="100"/>
                    <label class="btn btn-default file-upload-btn">
                      Choose file...
                        <input id="form-control-22" class="file-upload-input service_provider_business" type="file" accept="image/*" name="fileToUpload" id="fileToUpload"  onchange="loadFile(event)"  multiple="multiple" >
                      </label>
                  </div>

                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Description</label>
                    <textarea name="description" class="form-control" id="meta_desc" placeholder="Description" data-error="Please enter Description."></textarea>
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Certification</label>
                    <input type="text" name="certification" class="form-control service_provider_business" id="form-control-2" placeholder="Certification" data-error="Please enter Certification">
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Working Hours</label>
                    <input type="text" name="working_hours" class="form-control service_provider_business valid_mobile_num" id="form-control-2" placeholder="Working Hours" data-error="Please enter Working Hours">
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Contact Numbers</label>
                    <input type="text" name="contact_numbers" class="form-control service_provider_business valid_mobile_num" id="form-control-2" placeholder="Contact Numbers" data-error="Please enter Contact Numbers." maxlength="10" pattern="[0-9]{10}">
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Email id</label>
                    <input type="email" name="email_id" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" class="form-control service_provider_business" id="email" placeholder="email" data-error="Please enter Valid Email Address">
                    <span id="email_status" style="color: red;"></span>
                    <div class="help-block with-errors"></div>
                  </div>

                  <?php $getSubCategories = getAllDataWithStatus('services_sub_category','0');?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose your Specialization</label>
                    <select name="sub_category_id" class="custom-select service_provider_business" id="sub_category_id" data-error="This field is required.">
                      <option value="">Select Specialization</option>
                      <?php while($row = $getSubCategories->fetch_assoc()) {  ?>
                          <option value="<?php echo $row['id']; ?>" ><?php echo $row['sub_category_name']; ?></option>
                      <?php } ?>
                      <option value="0">Others</option>
                   </select>
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group" id="specialization_name">
                    <label for="form-control-2" class="control-label">Specialization Name</label>
                    <input type="text" name="specialization_name" class="form-control specialization_name" id="form-control-2" placeholder="Specialization" data-error="Please enter Specialization">
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                      <!--- //if associate value = 0 (Yes) & if associate value = 1 (No) -->
                        <h4>Associate With Us</h4>
                        <label>
                          <input type="radio" value="0" name="associate_or_not" />&nbsp;Yes</label>&nbsp;&nbsp;
                        <label>
                          <input type="radio" value="1" name="associate_or_not"/>&nbsp;No</label>
                        <label>
                  </div>
                  </div>
                   
                  <div id="service_provider_personal_type">
                    <div class="form-group">
                    <label for="form-control-2" class="control-label">Working Hours</label>
                    <input type="text" name="working_hours1" class="form-control service_provider_personal valid_mobile_num" id="form-control-2" placeholder="Working Hours" data-error="Please enter Working Hours">
                    <div class="help-block with-errors"></div>
                  </div>

                  <?php $getSubCategories = getAllDataWithStatus('services_sub_category','0');?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose your Specialization</label>
                    <select name="sub_category_id1" class="custom-select service_provider_personal" id="sub_category_id1" data-error="This field is required.">
                      <option value="">Select Specialization</option>
                      <?php while($row = $getSubCategories->fetch_assoc()) {  ?>
                          <option value="<?php echo $row['id']; ?>" ><?php echo $row['sub_category_name']; ?></option>
                      <?php } ?>
                      <option value="0">Others</option>
                   </select>
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group" id="specialization_name1">
                    <label for="form-control-2" class="control-label">Specialization Name</label>
                    <input type="text" name="specialization_name1" class="form-control specialization_name1" id="form-control-2" placeholder="Specialization" data-error="Please enter Specialization">
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Experience</label>
                    <input type="text" name="experience" class="form-control service_provider_personal valid_mobile_num" id="form-control-2" placeholder="Experience" data-error="Please enter Experience">
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-4" class="control-label">image</label>
                    <img id="output1" height="100" width="100"/>
                    <label class="btn btn-default file-upload-btn">
                      Choose file...
                        <input id="form-control-22" class="file-upload-input service_provider_personal" type="file" accept="image/*" name="fileToUpload1" id="fileToUpload1"  onchange="loadFile1(event)"  multiple="multiple" >
                      </label>
                  </div>
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
<!-- Script for Service Probiders -->
<script type="text/javascript">
  $(document).ready(function () { 
    $('#service_provider_business_type, #service_provider_personal_type,#specialization_name,#specialization_name1').hide();
    $('.service_provider_type_id').change(function() {

      if($(this).val() == 1) {
        $('#service_provider_business_type').show();
        $('.service_provider_business').val('');
        $('#output1').removeAttr('src');
        $('#service_provider_personal_type').hide();
        $(".service_provider_business").attr("required", "true");
        $(".service_provider_personal").removeAttr('required');
      } else if($(this).val() == 2) {
        $('#output').removeAttr('src');
        $('#service_provider_business_type').hide();
        $('.service_provider_personal').val("");
        $('#service_provider_personal_type').show();
        $(".service_provider_personal").attr("required", "true");
        $(".service_provider_business").removeAttr('required');
      }  
    });
    $('#sub_category_id').change(function() {

      if($(this).val() == 0) {
        $('#specialization_name').show();
        $('.specialization_name').val("");
        $(".specialization_name").attr("required", "true");
      } else{
        $('#specialization_name').hide();
        $(".specialization_name").removeAttr('required');
      }
    });
    $('#sub_category_id1').change(function() {

      if($(this).val() == 0) {
        $('#specialization_name1').show();
        $('.specialization_name1').val("");
        $(".specialization_name1").attr("required", "true");
      } else{
        $('#specialization_name1').hide();
        $(".specialization_name1").removeAttr('required');
      }
    });
  });  
</script>
<script type="text/javascript">
    $("input:checkbox").on('click', function() {
  // in the handler, 'this' refers to the box clicked on
  var $box = $(this);
  if ($box.is(":checked")) {
    // the name of the box is retrieved using the .attr() method
    // as it is assumed and expected to be immutable
    var group = "input:checkbox[name='" + $box.attr("name") + "']";
    // the checked state of the group/box on the other hand will change
    // and the current value is retrieved using .prop() method
    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
});
</script>