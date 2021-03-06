<!DOCTYPE html>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php include_once 'meta.php';?>
	<?php $getContentPageData = getAllDataWhere('services_content_pages','id',5);
		  $getTestimonialsBanner = $getContentPageData->fetch_assoc();
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

	<!-- Radio and check inputs -->
	<link href="css/skins/square/grey.css" rel="stylesheet">

	<!-- Range slider -->
	<link href="css/ion.rangeSlider.css" rel="stylesheet">
	<link href="css/ion.rangeSlider.skinFlat.css" rel="stylesheet">

	<!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

</head>

<body>

	<!--[if lte IE 8]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p>
<![endif]-->
	<!-- End Preload -->

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
		if(!empty($getTestimonialsBanner['image'])) { ?> 	
				<div class="row">
					<img src="<?php echo $base_url . 'uploads/services_content_pages_images/'.$getTestimonialsBanner['image'] ?>" class="img-responsive">
				</div>
			<?php } else { ?>
				<div class="row">
					<img src="img/slides/slide_1.jpg" class="img-responsive">
				</div>
			<?php }?>
    </div>
		<!-- Position -->
		<div class="container margin_60">

			<div class="main_title">
				<h2>What <span>customers </span>says</h2>				
			</div>
			<div class="row">
				<?php $getTestominalsData = getAllDataWithStatusLimit('services_testimonials',0,'',''); ?>
                 <?php  while($getAllTestominalsData = $getTestominalsData->fetch_assoc()) { ?> 
				<div class="col-md-6">
					<div class="review_strip">
						<img src="<?php echo $base_url . 'uploads/services_testimonials_images/'.$getAllTestominalsData['image'] ?>" alt="<?php echo $getAllTestominalsData['title']; ?>" class="img-circle" style="width:75px; height:75px;">
						<h4><?php echo $getAllTestominalsData['title']; ?></h4>
						<p>
							<?php echo substr(strip_tags($getAllTestominalsData['description']), 0,200);?>
						</p>
						
					</div>
					<!-- End review strip -->
				</div>
				<?php } ?>
			</div>
			

			
			
			<!-- End row -->
		</div>
		<!-- End container -->
		<?php include_once 'our_associate_partners.php';?>	
	</main>
	
	<!-- End main -->
<footer>
            <?php include_once 'footer.php';?>
    </footer><!-- End footer -->

	<!-- End footer -->

	<div id="toTop"></div><!-- Back to top button -->
	
	<!-- Search Menu -->
	<!-- Common scripts -->
	<script src="../cdn-cgi/scripts/0e574bed/cloudflare-static/email-decode.min.js"></script><script src="js/jquery-2.2.4.min.js"></script>
	<script src="js/common_scripts_min.js"></script>
	<script src="js/functions.js"></script>

	<!-- Specific scripts -->
	<!-- Cat nav mobile -->
	<script src="js/cat_nav_mobile.js"></script>
	<script>
		$('#cat_nav').mobileMenu();
	</script>
	<!-- Check and radio inputs -->
	<script src="js/icheck.js"></script>
	<script>
		$('input').iCheck({
			checkboxClass: 'icheckbox_square-grey',
			radioClass: 'iradio_square-grey'
		});
	</script>
	<!-- Map -->
	<script src="http://maps.googleapis.com/maps/api/js"></script>
	<script src="js/map_restaurants.js"></script>
	<script src="js/infobox.js"></script>
</body>
</html>