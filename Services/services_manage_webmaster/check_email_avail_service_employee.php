<?php
include_once('../admin_includes/config.php');
include_once('../admin_includes/common_functions.php');
if(isset($_POST['service_emp_email'])) {
	$email=$_POST['service_emp_email'];
	$checkdata="SELECT email FROM services_employee_registration WHERE email='$email' ";
	$query=$conn->query($checkdata);
	if($query->num_rows>0) {
	    echo "Email Already Exist";
	} else {
	}
exit();
}