<?php 
include_once 'meta.php';
//echo "<pre>"; print_r($_POST); die;
//Order id generating using sessions

if(isset($_POST["submit"]) && $_POST["submit"]!="") {

	$first_name = $_POST["first_name"];
	$last_name = $_POST["last_name"];
	$company_name = $_POST["company_name"];
	$email = $_POST["email"];
	$mobile = $_POST["mobile"];
	$address = $_POST["address"];
	$country = $_POST["country"];
	$postal_code=$_POST["postal_code"];
	$city = $_POST["city"];
	$order_note = $_POST["order_note"];
	$sub_total = $_POST["sub_total"];
	$order_total = $_POST["order_total"];
	$coupon_code = $_POST["coupon_code"];
	$coupon_code_type = $_POST["coupon_code_type"];
	$discount_money = $_POST["discount_money"];
	$payment_group = $_POST["payment_group"];
	$order_date = date("Y-m-d h:i:s");
	$string1 = str_shuffle('abcdefghijklmnopqrstuvwxyz');
	$random1 = substr($string1,0,3);
	$string2 = str_shuffle('1234567890');
	$random2 = substr($string2,0,3);
	$contstr = "MYSER-SERVICES";
	$order_id = $contstr.$random1.$random2;
	$service_tax = $_POST["service_tax"];
	$servicesCount = count($_POST["service_id"]);
	//Saving user id and coupon id
	$user_id = $_SESSION['user_login_session_id'];
	$payment_status = 2; //In progress
	
	for($i=0;$i<$servicesCount;$i++) {
		//Generate sub randon id
		$string1 = str_shuffle('abcdefghijklmnopqrstuvwxyz');
		$random1 = substr($string1,0,3);
		$string2 = str_shuffle('1234567890');
		$random2 = substr($string2,0,3);
		$contstr = "MYSER-SERVICES";
		$sub_order_id = $contstr.$random1.$random2;
		$orders = "INSERT INTO services_orders (`user_id`,`first_name`, `last_name`, `company_name`, `email`, `mobile`, `address`, `country`, `postal_code`, `city`, `order_note`, `category_id`, `sub_category_id`,  `group_id`, `service_id`, `service_price_type_id`,`service_price`,`order_price`,`service_quantity`, `service_selected_date`, `service_selected_time`, `sub_total`, `order_total`, `coupon_code`, `coupon_code_type`, `discount_money`, `payment_method`,`lkp_payment_status_id`,`service_tax`, `order_id`,`order_sub_id`, `created_at`) VALUES ('$user_id','$first_name','$last_name', '$company_name','$email','$mobile','$address','$country','$postal_code','$city','$order_note','" . $_POST["category_id"][$i] . "','" . $_POST["sub_cat_id"][$i] . "','" . $_POST["group_id"][$i] . "','" . $_POST["service_id"][$i] . "','" . $_POST["service_price_type_id"][$i] . "','" . $_POST["service_price"][$i] . "','" . $_POST["service_price"][$i] . "','" . $_POST["service_quantity"][$i] . "','" . $_POST["service_selected_date"][$i] . "','" . $_POST["service_selected_time"][$i] . "','$sub_total','$order_total','$coupon_code','$coupon_code_type','$discount_money','$payment_group','$payment_status','$service_tax', '$order_id','$sub_order_id','$order_date')";
		$servicesOrders = $conn->query($orders);
	}


	if($_POST['payment_group'] == "1") {
		//payemnt group 1 means COD		
		//after placing order that item will delete in cart
		if($_SESSION['CART_TEMP_RANDOM'] == "") {
	        $_SESSION['CART_TEMP_RANDOM'] = rand(10, 10).sha1(crypt(time())).time();
	    }
	    $session_cart_id = $_SESSION['CART_TEMP_RANDOM'];
		$delCart ="DELETE FROM services_cart WHERE user_id = '$user_id' OR session_cart_id='$session_cart_id' ";
		$conn->query($delCart);
		header("Location: thankyou.php?odi=".$order_id."");
	} else {
		//Online
		header("Location: hdfc_form.php?odi=".$order_id."&user_id=".$user_id."");
	}
		
	
}
?>
