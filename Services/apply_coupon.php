<?php
include "../admin_includes/config.php";
include "../admin_includes/common_functions.php";
//echo "<pre>"; print_r($_POST); die;
if(!empty($_POST['coupon_code']) && !empty($_POST['cart_total']))  {
	//echo "<pre>"; print_r($_POST); die;
	$coupon_code = $_POST['coupon_code'];
	$cart_total = $_POST['cart_total'];
	if(isset($_SESSION['user_login_session_id']) && $_SESSION['user_login_session_id']!='') {
		$sql="SELECT * FROM services_coupons WHERE coupon_code='$coupon_code' AND lkp_status_id = 0";
		$getCouponPrice = $conn->query($sql);
		$getCouponPriceData = $getCouponPrice->fetch_assoc();
		if($getCouponPrice->num_rows > 0) {
			if($getCouponPriceData['price_type_id'] == 1) {
				$cartTotal = $cart_total - $getCouponPriceData['discount_price'];
			} else {
				$cartTotal = $cart_total - ( ($cart_total/100) * $getCouponPriceData['discount_price'] );
			}
			echo $cartTotal;
		} else {
			echo 1;
		}
	} else {
		echo 0;
	}
}
?>