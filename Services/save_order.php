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
	$appliedCupons="INSERT INTO services_applied_coupons(`user_id`,`coupon_code`,`created_at`) VALUES ('$user_id', '$coupon_code', '$order_date')";
	$appliedCupons1 = $conn->query($appliedCupons);

	if($_POST['payment_group'] == "COD") {
		for($i=0;$i<$servicesCount;$i++) {
			$orders = "INSERT INTO services_orders (`first_name`, `last_name`, `company_name`, `email`, `mobile`, `address`, `country`, `postal_code`, `city`, `order_note`, `category_id`, `sub_category_id`, `group_id`, `service_id`, `service_price`, `service_selected_date`, `service_selected_time`, `sub_total`, `order_total`, `coupon_code`, `payment_method`, `order_id`, `created_at`) VALUES ('$first_name','$last_name', '$company_name','$email','$mobile','$address','$country','$postal_code','$city','$order_note','" . $_POST["category_id"][$i] . "','" . $_POST["sub_cat_id"][$i] . "','" . $_POST["group_id"][$i] . "','" . $_POST["service_id"][$i] . "','" . $_POST["service_price"][$i] . "','" . $_POST["service_selected_date"][$i] . "','" . $_POST["service_selected_time"][$i] . "','$sub_total','$order_total','$coupon_code','$payment_group','$order_id','$order_date')";
			$servicesOrders = $conn->query($orders);
		}
		$dataem = $_POST["email"];
		//$to = "srinivas@lanciussolutions.com";
		$to = "$dataem";
		$from = $getSiteSettingsData["email"];
		$subject = "Myservent - Services ";
		$message = "";
		$message .= "<style>
		        .body{
		    width:100% !important; 
		    margin:0 !important; 
		    padding:0 !important; 
		    -webkit-text-size-adjust:none;
		    -ms-text-size-adjust:none; 
		    background-color:#FFFFFF;
		    font-style:normal;
		    }
		    .header{
		    background-color:#c90000;
		    color:white;
		    width:100%;
		    }
		    .content{
		    background-color:#FBFCFC;
		    color:#17202A;
		    width:100%;
		    padding-top:15px;
		    padding-bottom;15px;
		    text-align:justify;
		    font-size:14px;
		    line-height:18px;
		    font-style:normal;
		    }
		    h3{
		    color: #c90000;}
		    .footer{
		    background-color:#c90000;
		    color:white;
		    width:100%;
		    padding-top:9px;
		    padding-bottom:5px;
		    }
		    .logo-responsive{
		    max-width: 100%;
		    height: auto !important;
		    }
		    @media screen and (min-width: 480px) {
		        .content{
		        width:50%;
		        }
		        .header{
		        width:50%;
		        }
		        .footer{
		        width:50%;
		        }
		        .logo-responsive{
		        max-width: 100%;
		        height: auto !important;
		        }
		    }
		    </style>";

		$message .= "<html><head><title>Myservent Services</title></head>
		<body>
		        <div class='container header'>
		            <div class='row'>
		                <div class='col-lg-2 col-md-2 col-sm-2'>
		                </div>
		                <div class='col-lg-8 col-md-8 col-sm-8'>
		                <center><h2>".$getSiteSettingsData['admin_title']."</h2></center>
		                </div>
		                <div class='col-lg-2 col-md-2 col-sm-2'>
		                    
		                </div>
		            </div>
		        </div>
		        <div class='container content'>
		            <h3>Greetings From My Servant</h3>
		            <h4>Dear: ".$first_name."</h4>
		            <h4>Thank You for Ordering My Seravnt . Your Order Number is: ".$order_id.", Order Total: Rs. ".$order_total."</h4>  
		        </div>
		        <div class='container footer'>
		            <center>".$getSiteSettingsData['footer_text']."</center>
		        </div>
		    </body>
		</html>";

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
