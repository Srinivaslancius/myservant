<?php
include "../admin_includes/config.php";
include "../admin_includes/common_functions.php";
//echo "<pre>"; print_r($_POST); die;
if(!empty($_POST['user_mobile']) && !empty($_POST['mobile_otp']))  {
	//echo "<pre>"; print_r($_POST); die;
	$mobile_otp = $_POST['mobile_otp'];
		
	$user_full_name = $_POST['user_name'];
	$user_email = $_POST['user_email'];
	$user_mobile = $_POST['user_mobile'];
	$user_password = $_POST['user_password'];	
	$lkp_status_id = 0; //0-active, 1- inactive
	$login_count = 1;
	$last_login_visit = date("Y-m-d h:i:s");
	$lkp_register_device_type_id=1; //1- web, 2- android, 3-ios
	$user_login_type = 1; //1-Normal, 2-Facebook,3-twitter
	$created_at = date("Y-m-d h:i:s");

	$sql="SELECT * FROM user_mobile_otp WHERE user_mobile='$user_mobile' AND mobile_otp='$mobile_otp' ";
	$getCn = $conn->query($sql);
	$getnoRows = $getCn->num_rows;
	if($getnoRows > 0) {		
		$saveUser = saveUser($user_full_name, $user_email, $user_mobile, $user_password,$lkp_status_id,$login_count,$last_login_visit,$lkp_register_device_type_id,$user_login_type,'',$created_at);
		$getUserData = userLogin($user_email,$user_password);
		$getLoggedInDetails = $getUserData->fetch_assoc();
		$_SESSION['user_login_session_id'] =  $getLoggedInDetails['id'];
        $_SESSION['user_login_session_name'] = $getLoggedInDetails['user_full_name'];
        $_SESSION['user_login_session_email'] = $getLoggedInDetails['user_email'];
        $_SESSION['timestamp'] = time();

		echo $getnoRows;
	} else {
		echo $getnoRows;
	}
}
?>