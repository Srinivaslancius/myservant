<?php 
include "../admin_includes/config.php";
include "../admin_includes/common_functions.php";

if(isset($_POST["submit"]) && $_POST["submit"]!="") {	

	$cartCount = count($_POST["service_visit_date"]);	

	for($i=0;$i<$cartCount;$i++) {

		$serviceDate=date_create($_POST["service_visit_date"][$i]);
		$getServiceDate=date_format($serviceDate,"Y-m-d");

		$service_visit_time1 = date('H:i:s', strtotime($_POST["service_visit_time"][$i]));

		$updateq = "UPDATE services_cart SET service_selected_date = '" . $getServiceDate . "',service_selected_time ='" . $service_visit_time1 . "' WHERE id = '" . $_POST["cart_id"][$i] . "'";
		$result = $conn->query($updateq);
	}
	
	header('Location: cart.php?suc=1');
}

?>