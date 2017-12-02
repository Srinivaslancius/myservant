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
	$payment_group = $_POST["payment_group"];
	$order_date = date("Y-m-d h:i:s");
	$string1 = str_shuffle('abcdefghijklmnopqrstuvwxyz');
	$random1 = substr($string1,0,3);
	$string2 = str_shuffle('1234567890');
	$random2 = substr($string2,0,3);
	$contstr = "MYSER";
	$order_id = $contstr.$random1.$random2;

	$servicesCount = count($_POST["service_id"]);

	//Saving user id and coupon id
	$user_id = $_SESSION['user_login_session_id'];
	//$appliedCupons="INSERT INTO services_applied_coupons(`user_id`,`coupon_code`,`created_at`) VALUES ('$user_id', '$coupon_code', '$order_date')";
	//$appliedCupons1 = $conn->query($appliedCupons);

	if($_POST['payment_group'] == "COD") {
		for($i=0;$i<$servicesCount;$i++) {
			$orders = "INSERT INTO services_orders (`first_name`, `last_name`, `company_name`, `email`, `mobile`, `address`, `country`, `postal_code`, `city`, `order_note`, `group_id`, `service_id`, `service_price`, `service_selected_date`, `service_selected_time`, `sub_total`, `order_total`, `coupon_code`, `payment_method`, `order_id`, `created_at`) VALUES ('$first_name','$last_name', '$company_name','$email','$mobile','$address','$country','$postal_code','$city','$order_note','" . $_POST["group_id"][$i] . "','" . $_POST["service_id"][$i] . "','" . $_POST["service_price"][$i] . "','" . $_POST["service_selected_date"][$i] . "','" . $_POST["service_selected_time"][$i] . "','$sub_total','$order_total','$coupon_code','$payment_group','$order_id','$order_date')";
			$servicesOrders = $conn->query($orders);
		}
		$dataem = $_POST["email"];
		//$to = "srinivas@lanciussolutions.com";
		$to = "$dataem";
		$from = $getSiteSettingsData["email"];
		$subject = "Myservent - Services ";
		$message = '';
		$message .= '<body>
			<div class="container" style=" width:50%;border: 5px solid #fe6003;margin:0 auto">
			<header style="padding:0.8em;color: white;background-color: #fe6003;clear: left;text-align: center;">
			 <center><img src='.$base_url . "uploads/logo/".$getSiteSettingsData["logo"].' class="logo-responsive"></center>
			</header>
			<article style=" border-left: 1px solid gray;overflow: hidden;text-align:justify; word-spacing:0.1px;line-height:25px;padding:15px">
			  <h1 style="color:#fe6003">Greetings From Myservant</h1>
			  <p>Dear <span style="color:#fe6003;">'.$first_name.'</span>, Thank you for Ordering myservant.com!</p>
				<p>Your Order Number is: <span style="color:#fe6003;">'.$order_id.'</span></p>
				<p>Your Order Total: Rs. <span style="color:#fe6003;">'.$order_total.'</span></p>
				<p>We hope you enjoy your stay at myservant.com, if you have any problems, questions, opinions, praise, comments, suggestions, please free to contact us at any time.</p>
				<p>Warm Regards,<br>The Myservant Team </p>
			</article>
			<footer style="padding: 1em;color: white;background-color: #fe6003;clear: left;text-align: center;">'.$getSiteSettingsData['footer_text'].'</footer>
			</div>

			</body>';

		//echo $message; die;
		//$sendMail = sendEmail($to,$subject,$message,$from);
		$name = "My Servant";
		$from = "info@myservant.com";
		$headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";  
        $headers .= 'From: '.$name.'<'.$from.'>'. "\r\n";
        mail($to, $subject, $message, $headers);            

		//after placing order that item will delete in cart
		if($_SESSION['CART_TEMP_RANDOM'] == "") {
	        $_SESSION['CART_TEMP_RANDOM'] = rand(10, 10).sha1(crypt(time())).time();
	    }
	    $session_cart_id = $_SESSION['CART_TEMP_RANDOM'];
		$delCart ="DELETE FROM services_cart WHERE user_id = '$user_id' OR session_cart_id='$session_cart_id' ";
		$conn->query($delCart);

		header("Location: thankyou.php?odi=".$order_id."");
	} else {
		echo "<script>alert('Online Payment Method is Not avaliable');window.location='checkout.php';</script>";
	}
}
?>
