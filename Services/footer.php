<?php include_once('../admin_includes/config.php');
	include_once('../admin_includes/common_functions.php');
	$getSiteSettings = getAllDataWhere('services_site_settings','id','1'); 
    $getSiteSettingsData = $getSiteSettings->fetch_assoc();
?>
<div class="container">
            
            <div class="row">
                <div class="col-md-12">
                    <p><?php echo $getSiteSettingsData['footer_text'];?><span class="pull-right">Designed & Developed by : <a href="https://lanciussolutions.com/" target="_blank"> Lancius IT Solutions</a></span></p>
                </div>
            </div><!-- End row -->
        </div><!-- End container -->