<?php
include "../admin_includes/config.php";
include "../admin_includes/common_functions.php";
//echo "<pre>"; print_r($_POST); die;
if(!empty($_POST['user_mobile']) && !empty($_POST['mobile_otp']))  {
	//echo "<pre>"; print_r($_POST); die;
	$mobile_otp = $_POST['mobile_otp'];
	$user_mobile = $_POST['user_mobile'];	
	$user_full_name = $_POST['user_name'];
	$user_email = $_POST['user_email'];
	$user_password = $_POST['user_password'];
	$created_at = date("Y-m-d h:i:s");

	$sql="SELECT * FROM user_mobile_otp WHERE user_mobile='$user_mobile' AND mobile_otp='$mobile_otp' ";
	$getCn = $conn->query($sql);
	$getnoRows = $getCn->num_rows;
	if($getnoRows > 0) {

		$saveUser = saveUser($user_full_name, $user_email, $user_mobile, $user_password,'','','','','','','');
		echo $getnoRows;
	} else {
		echo $getnoRows;
	}
}
?>