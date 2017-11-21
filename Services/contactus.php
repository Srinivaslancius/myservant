<!DOCTYPE html>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php include_once 'meta.php';?>
	<?php $getContentPageData = getAllDataWhere('services_content_pages','id',8);
		  $getContactUsBanner = $getContentPageData->fetch_assoc();
	?>
	<?php

if(!empty($_POST['name_contact']) && !empty($_POST['lastname_contact']) && !empty($_POST['email_contact']) && !empty($_POST['phone_contact']) && !empty($_POST['message_contact']))  {
    
    $name_contact = $_POST['name_contact'];
    $lastname_contact = $_POST['lastname_contact'];
    $email_contact = $_POST['email_contact'];
    $phone_contact = $_POST['phone_contact'];
    $message_contact = $_POST['message_contact'];

$dataem = $getSiteSettingsData["email"];
//$to = "srinivas@lanciussolutions.com";
$to = "$dataem";
$subject = "Myservent - Contact Us ";
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

$message .= "<html><head><title>Myservent Contactus Form</title></head>
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
            <h3>Contact Us Information!</h3>
            <h4>First Name: </h4><p>".$name_contact."</p>
            <h4>Last Name: </h4><p>".$lastname_contact."</p>
            <h4>Email: </h4><p>".$email_contact."</p>
            <h4>Mobile: </h4><p>".$phone_contact."</p>
            <h4>Message: </h4><p>".$message_contact."</p>  
        </div>
        <div class='container footer'>
            <center>".$getSiteSettingsData['footer_text']."</center>
        </div>
    </body>
</html>";

//echo $message; die;
// Always set content-type when sending HTML email
//$headers = "MIME-Version: 1.0" . "\r\n";
//$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
//$headers .= 'From: '.$name_contact.'<'.$email_contact.'>'. "\r\n";
// $headers .= 'Cc: myboss@example.com' . "\r\n";
$sendMail = sendEmail($to,$subject,$message,$email_contact);
if($sendMail) {
	echo  "<script>alert('Thank You For Your feedback');window.location.href('contactus.php');</script>";
}

}
?>

	<!-- Favicons-->
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">
	
	<!-- Google web fonts -->
    <link href="https://fonts.googleapis.com/css?family=Gochi+Hand|Lato:300,400|Montserrat:400,400i,700,700i" rel="stylesheet">

	<!-- CSS -->
	<link href="css/base.css" rel="stylesheet">


</head>

<body>
	

	<div class="layer"></div>
	<!-- Mobile menu overlay mask -->

	<!-- Header================================================== -->
	<header>
		<?php include_once './top_header.php';?>
		<!-- End top line-->

		<div class="container">
                    <?php include_once './menu.php';?>
		</div>
		<!-- container -->
                
        </header>
	<!-- End Header -->

	<main>
	 <div class="container-fluid page-title">
		<?php  
		if(isset($getContactUsBanner['image'])) { ?> 	
				<div class="row">
					<img src="<?php echo $base_url . 'uploads/services_content_pages_images/'.$getContactUsBanner['image'] ?>" alt="<?php echo $getContactUsBanner['title'];?>" class="img-responsive">
				</div>
			<?php } else { ?>
				<div class="row">
					<img src="img/slides/slide_1.jpg" class="img-responsive">
				</div>
			<?php }?>
    </div>
		<div class="container margin_60">
		  <div class="main_title">
				<h2>Contact <span>Us</span></h2>				
			</div>
			<div class="row">
			
				<div class="col-md-8 col-sm-8">
						<div id="message-contact"></div>
						<form method="post" action="" id="contactform" name="contactform"> 
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>First Name</label>
										<input type="text" class="form-control" id="name_contact" name="name_contact" placeholder="Enter Name" required>
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>Last Name</label>
										<input type="text" class="form-control" id="lastname_contact" name="lastname_contact" placeholder="Enter Last Name" required> 
									</div>
								</div>
							</div>
							<!-- End row -->
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>Email</label>
										<input type="email" id="email_contact" name="email_contact" class="form-control" placeholder="Enter Email" required>
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>Phone</label>
										<input type="text" id="phone_contact" name="phone_contact" class="form-control" placeholder="Enter Phone number" maxlength="10" pattern="[0-9]{10}" onkeypress="return isNumberKey(event)" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Message</label>
										<textarea rows="5" id="message_contact" name="message_contact" class="form-control" placeholder="Write your message" style="height:200px;" ></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">									
									<input type="submit" value="Submit" class="btn_1" id="submit-contact">
								</div>
							</div>
						</form><br>
					
				</div>
				<!-- End col-md-8 -->
				<?php $getAllgetSiteSettingsData = getAllData('services_site_settings');
				
					$getSiteSettingsData = $getAllgetSiteSettingsData->fetch_assoc();
					/*echo $getSiteSettingsData; die;*/
					
				 ?> 
				 <div class="col-md-4 col-sm-4">
                    <div class="box_style_1">
                        <h3><span>Information</span></h3>
                         <p><span class=" icon-location" style="color:#f26226 ;"></span><?php echo $getSiteSettingsData['address']; ?></p>
                          <p><span class = "icon-mobile" style="color:#f26226 ;"></span><?php echo $getSiteSettingsData['mobile']; ?></p>
                        <p><span class=" icon-mail-alt" style="color:#f26226 ;"></span><?php echo $getSiteSettingsData['email']; ?></p>
                    </div>
                </div>
				
			</div>
			
			<!-- End row -->
		</div>	
		<!-- End container -->
		<script src="https://maps.google.com/maps/api/js?key=AIzaSyA04qekzxWtnZq6KLkabMN_4abcJt9nCDk" type="text/javascript"></script>
		<div class="container" style="margin-bottom:70px; width:100%">
        	<div id="map"></div>
        </div>
            <script type="text/javascript">
                            var locations = [
                              ['Lancius it solutions', 17.445913, 78.381229],
                              ['Maxcure Hospital', 17.446740, 78.380109],
                              ['Cyber Towers ', 17.450415, 78.381095],
                            ];

                            var map = new google.maps.Map(document.getElementById('map'), {
                              zoom: 14,
                              center: new google.maps.LatLng(17.448293, 78.391485),
                              mapTypeId: google.maps.MapTypeId.ROADMAP
                            });

                            var infowindow = new google.maps.InfoWindow();

                            var marker, i;

                            for (i = 0; i < locations.length; i++) {  
                              marker = new google.maps.Marker({
                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                map: map
                              });

                              google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                return function() {
                                  infowindow.setContent(locations[i][0]);
                                  infowindow.open(map, marker);
                                }
                              })(marker, i));
                            }
                          </script>
		<!-- end map-->
		
	</main>
	<!-- End main -->

	<footer class="revealed">
            <?php include_once 'footer.php';?>
    </footer><!-- End footer -->

	
	<!-- Common scripts -->
	<div id="toTop"></div><!-- Back to top button -->

		<!-- Common scripts -->
	<script src="../cdn-cgi/scripts/78d64697/cloudflare-static/email-decode.min.js"></script><script src="js/jquery-2.2.4.min.js"></script>
	<script src="js/common_scripts_min.js"></script>
	<script src="js/functions.js"></script>
	
	<!-- Validation purpose add scripts -->
	<?php include_once 'common_validations_scripts.php'; ?>	
	
	
</body>

</html>
<script type="text/javascript">
function isNumberKey(evt){
	    var charCode = (evt.which) ? evt.which : event.keyCode
	    if (charCode > 31 && (charCode < 48 || charCode > 57))
	        return false;
	    return true;
	}
</script>
<style type="text/css">
  .error {
    color: $errorMsgColor;
  }

</style>