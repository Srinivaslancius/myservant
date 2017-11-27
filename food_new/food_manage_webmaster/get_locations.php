<?php
include_once('../../admin_includes/config.php');
include_once('../../admin_includes/common_functions.php');
if(!empty($_POST["lkp_city_id"])) {
	$query ="SELECT * FROM lkp_locations WHERE lkp_status_id = 0 AND lkp_city_id = '" . $_POST["lkp_city_id"] . "'";
	$results = $conn->query($query);
?>
	<option value="">Select City</option>
<?php
	foreach($results as $locations) {
?>
	<option value="<?php echo $locations["id"]; ?>"><?php echo $locations["location_name"]; ?>&nbsp;-&nbsp;<?php echo $locations["location_pincode"]; ?></option>
<?php
	}
}
?>
