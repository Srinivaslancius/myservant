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
		<div class="row">
			<img src="img/slides/slide_1.jpg" class="img-responsive">
		</div>
    </div>
		<div class="container margin_60">
		  <div class="main_title">
				<h2>Contact <span>Us</span></h2>				
			</div>
			<div class="row">
			
				<div class="col-md-8 col-sm-8">
						<div id="message-contact"></div>
						<form method="post" action="" id="contactform">
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>First Name</label>
										<input type="text" class="form-control" id="name_contact" name="name_contact" placeholder="Enter Name">
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>Last Name</label>
										<input type="text" class="form-control" id="lastname_contact" name="lastname_contact" placeholder="Enter Last Name">
									</div>
								</div>
							</div>
							<!-- End row -->
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>Email</label>
										<input type="email" id="email_contact" name="email_contact" class="form-control" placeholder="Enter Email">
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>Phone</label>
										<input type="text" id="phone_contact" name="phone_contact" class="form-control" placeholder="Enter Phone number">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Message</label>
										<textarea rows="5" id="message_contact" name="message_contact" class="form-control" placeholder="Write your message" style="height:200px;"></textarea>
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

				<div class="col-md-4 col-sm-4">
					<div class="box_style_1">
						<h3><span>Information</span></h3>
						 <p><span style="color:#f26226">Adress:</span> Madhapur, Hyderabad</p>
						  <p><span style="color:#f26226">Mobile:</span> +918897725019</p>
                        <p><span style="color:#f26226">Email:</span> info@myservant.com</p>
					</div>
				</div>
				
			</div>
			
			<!-- End row -->
		</div>	
		<!-- End container -->
		<div id="map_contact"></div>
		<!-- end map-->
		
	</main>
	<!-- End main -->

	<footer class="revealed">
            <?php include_once 'footer.php';?>
    </footer><!-- End footer -->

	
	<!-- Common scripts -->
	<div id="toTop"></div><!-- Back to top button -->
	
	<!-- Search Menu -->

	<!-- Common scripts -->
	<script src="js/common_scripts_min.js"></script>
	<script src="js/functions.js"></script>

	<!-- Specific scripts -->
	<script src="assets/validate.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js"></script>
	<script src="js/map_contact.js"></script>
	<script src="js/infobox.js"></script>

</body>

</html>