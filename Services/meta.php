<?php
include "../admin_includes/config.php";
include "../admin_includes/common_functions.php";
$getSiteSettings = getAllDataWhere('services_site_settings','id','1'); 
$getSiteSettingsData = $getSiteSettings->fetch_assoc();

?>

<!-- Cart items add services script with custom alerts -->
<script type="text/javascript" src="js/modernAlert.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="description" content="">
	<meta name="author" content="">
        <title>My Service</title>