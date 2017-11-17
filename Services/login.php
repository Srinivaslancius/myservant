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

           	<div class="col-sm-12 alert alert-success" style="top:90px; display:block">
		      <strong>Success!</strong> Your Registration Successfully Completed.
		    </div>

		    <div class="col-sm-12 alert alert-danger" style="top:90px; display:block">
		      <strong>Failed!</strong> Your Registration Failed.
		    </div>
<div class="col-sm-1">
				</div>
		   <div class="col-sm-5">		   
			    
	        	<div id="login">
	            		<div class="text-center"><h2><span>Login</span></h2></div>
	                    <hr>
	                    <form>
	                    <div class="row">
	                    <div class="col-md-6 col-sm-6 login_social">
	                        <a href="#" class="btn btn-primary btn-block"><i class="icon-facebook"></i> Facebook</a>
	                    </div>
	                    <div class="col-md-6 col-sm-6 login_social">
	                        <a href="#" class="btn btn-info btn-block "><i class="icon-twitter"></i>Twitter</a>
	                    </div>
	                    </div> <!-- end row -->
	                    <div class="login-or"><hr class="hr-or"><span class="span-or">or</span></div>
	               
	                        <div class="form-group">
	                            <label>Username</label>
	                            <input type="text" class=" form-control " placeholder="Username">
	                        </div>
	                        <div class="form-group">
	                            <label>Password</label>
	                            <input type="password" class=" form-control" placeholder="Password">
	                        </div>
	                        <p class="small">
	                            <a href="#">Forgot Password?</a>
	                        </p>
	                        <a href="#" class="btn_full">Sign in</a>
	                        
	                    </form>
	                </div>
                </div>
				
			<div class="col-sm-5">
                	<div id="login">
                    		<div class="text-center"><h2><span>Register</span></h2></div>
                            <hr>
                           <form>
                                <div class="form-group">
                                	<label>Username</label>
                                    <input type="text" class=" form-control"  placeholder="Username">
                                </div>
                                <div class="form-group">
                                	<label>Email</label>
                                    <input type="email" class=" form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                	<label>Password</label>
                                    <input type="password" class=" form-control" id="password1" placeholder="Password">
                                </div>
                                <div class="form-group">
                                	<label>Confirm password</label>
                                    <input type="password" class=" form-control" id="password2" placeholder="Confirm password">
                                </div>
                                <div id="pass-info" class="clearfix"></div>
                                <button class="btn_full">Create an account</button>
                            </form>
                        </div>
                </div>
				<div class="col-sm-1">
				</div>
				
		   </div>
			
  </div>
  
	</main>
	<!-- End main -->

	<footer class="revealed">
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