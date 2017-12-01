<!DOCTYPE html>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php include_once 'meta.php';?>	

	<!-- Favicons-->
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">
	
	<!-- Google web fonts -->
    <link href="https://fonts.googleapis.com/css?family=Gochi+Hand|Lato:300,400|Montserrat:400,400i,700,700i" rel="stylesheet">

	<!-- BASE CSS -->
	<link href="css/base.css" rel="stylesheet">
        <link href="site_launch/css/style.css" rel="stylesheet">
	<link href="layerslider/css/layerslider.css" rel="stylesheet">
	<!-- REVOLUTION SLIDER CSS -->
</head>

<body>

<?php 
		error_reporting(0);
		 if(isset($_POST['submit']))  { 
		    //Login here
		    $user_email = $_POST['login_email'];
		    $getUserForgotData = forgotPassword($user_email);
		    //Set variable for session
		    if($getUserForgotPassword = $getUserForgotData->fetch_assoc()) {

		    	$pwd = decryptPassword($getUserForgotPassword['user_password']);
	            $to = $user_email;
	            $subject =  "User Forgot Password";
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
				            <h3>You have a new password!</h3>
				            <h4>Dear: ".$getUserForgotPassword['user_full_name']."</h4>
				            <h4>Your New Password is: ".$pwd." .</h4>  
				        </div>
				        <div class='container footer'>
				            <center>".$getSiteSettingsData['footer_text']."</center>
				        </div>
				    </body>
				</html>";

				//echo $message; die;
	            $name = "My Servant";
				$from = "info@myservant.com";
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";  
				$headers .= 'From: '.$name.'<'.$from.'>'. "\r\n";
	            mail($to, $subject, $message, $headers);

			        echo  "<script>alert('Password Sent To Your Email,Please Check.');window.location='login.php';</script>";
			    } else {
		    	echo "<script>alert('Your Entered Email Not Found');</script>";
		    }
		}
	?>


	<!--[if lte IE 8]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p>
<![endif]-->

	

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
		<!-- Slider -->
		 <div class="container-fluid page-title">
		<div class="row">
			<img src="img/slides/slide_3.jpg" class="img-responsive">
		</div>
    </div>
		<div class="container" style="margin-top:-70px">		

           <div class="row">
           	

		    
           	<div class="col-sm-3"></div>
		   <div class="col-sm-6">


                	<div id="login">
                    		<div class="text-center"><h2><span>Forgot Password</span></h2></div>
                            <hr>
                            <form method="POST">                      
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class=" form-control " name="login_email" placeholder="Email" required>
                                </div>
                                <button type="submit" name="submit" class="btn_full">Submit</button>
                                
                            </form>
                        </div>

                </div>
			<div class="col-sm-3"></div>	
			
				<div class="col-sm-1">
				</div>
				
		   </div>
			
  </div>
  
	</main>
	<!-- End main -->

	<footer>
            <?php include_once 'footer.php';?>
    </footer><!-- End footer -->

	<div id="toTop"></div><!-- Back to top button -->
	
	<!-- Search Menu -->
	
	<!-- Common scripts -->
	<script src="../cdn-cgi/scripts/78d64697/cloudflare-static/email-decode.min.js"></script><script src="js/jquery-2.2.4.min.js"></script>
	<script src="js/common_scripts_min.js"></script>
	<script src="js/functions.js"></script>

	<!-- Specific scripts -->
	<script src="layerslider/js/greensock.js"></script>
	<script src="layerslider/js/layerslider.transitions.js"></script>
	<script src="layerslider/js/layerslider.kreaturamedia.jquery.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function () {
			'use strict';
			$('#layerslider').layerSlider({
				autoStart: true,
				responsive: true,
				responsiveUnder: 1280,
				layersContainer: 1170,
				skinsPath: 'layerslider/skins/'
					// Please make sure that you didn't forget to add a comma to the line endings
					// except the last line!
			});
		});
	</script>

</body>

</html>