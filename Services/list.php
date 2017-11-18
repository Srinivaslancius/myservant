
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

	<!-- Radio and check inputs -->
	<link href="css/skins/square/grey.css" rel="stylesheet">

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


	<section class="parallax-window" data-parallax="scroll" data-image-src="img/home_bg_1.jpg" data-natural-width="1400" data-natural-height="470">
		<div class="parallax-content-1">
			<div class="animated fadeInDown">
				<h1>Sample Heading</h1>
				<p>Sample text will be replaced with original text</p>
			</div>
		</div>
	</section>
	<!-- End section -->

	<main>
		<div id="position">
			<div class="container">
				<ul>
					<li><a href="#">Home</a>
					</li>
					<li><a href="#">Category</a>
					</li>
					<li>Page active</li>
				</ul>
			</div>
		</div>
		<!-- Position -->

		<div class="container margin_60">
			<div class="row">
				
				<!--End aside -->
				<div class="col-lg-7 col-md-7" id="faq">
					<h3 class="nomargin_top">Group Level</h3>

					<div class="panel-group" id="payment">
						<?php $catid = decryptPassword($_GET['key']); $subcatid = $_GET['subcatid']; 
						$getGroups = getAllDataWhereWithTWoConditions('services_groups','services_category_id',$catid,'services_sub_category_id',$subcatid); ?>
						<div class="panel panel-default">
							<?php while ($getGroupsData = $getGroups->fetch_assoc()) { ?>
							<div class="panel-heading">
								<h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#payment" href="#collapse_payment<?php echo $getGroupsData['id'];?>"><?php echo $getGroupsData['group_name'];?><i class="indicator icon-minus pull-right"></i></a>
                      </h4>
							</div>
							<?php $services_group_id = $getGroupsData['id'];
							$getServiceNames = getAllDataWhereWithThreeConditions('services_group_service_names','services_category_id',$catid,'services_sub_category_id',$subcatid,'services_group_id',$services_group_id); ?>
							<div id="collapse_payment<?php echo $getGroupsData['id'];?>" class="panel-collapse collapse  <?php if($getGroupsData['id']==1) { echo "in"; } ?>">
								<div class="panel-body">
                                    <table class="table table-striped cart-list shopping-cart">
                                        <thead>
                                            <tr>
                                                <th>Service</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php while ($getServiceNamesData = $getServiceNames->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?php echo $getServiceNamesData['group_service_name'];?></td>
                                                <td>Price After our Visit</td>
                                                <td><a href="" class="btn_full_outline wdth50">Add to Cart</a></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
								</div>
							</div>
                            <?php } ?>                         
						</div>
						
					</div>
					<!-- End panel-group -->


				</div>
				<!-- End col lg-9 -->
                                
                                <div class="col-lg-5 col-md-5">
                                    <?php include_once './left_sidebar_booking.php';?>
                                </div>
			</div>
			<!-- End row -->
		</div>
		<!-- End container -->
	</main>
	<!-- End main -->

	<footer class="revealed">
            <?php include_once 'footer.php';?>
    </footer><!-- End footer -->
	<!-- End footer -->

	<div id="toTop"></div><!-- Back to top button -->
	
	<!-- Search Menu -->
	<div class="search-overlay-menu">
		<span class="search-overlay-close"><i class="icon_set_1_icon-77"></i></span>
		<form role="search" id="searchform" method="get">
			<input value="" name="q" type="search" placeholder="Search..." />
			<button type="submit"><i class="icon_set_1_icon-78"></i>
			</button>
		</form>
	</div><!-- End Search Menu -->

	<!-- Common scripts -->
	<script src="/cdn-cgi/scripts/84a23a00/cloudflare-static/email-decode.min.js"></script><script src="js/jquery-2.2.4.min.js"></script>
	<script src="js/common_scripts_min.js"></script>
	<script src="js/functions.js"></script>

	<!-- Specific scripts -->
	<!-- Fixed sidebar -->
	<script src="js/theia-sticky-sidebar.js"></script>
	<script>
		jQuery('#sidebar').theiaStickySidebar({
			additionalMarginTop: 80
		});
	</script>
	<script>
	$('#faq_box a[href^="#"]').on('click', function (e) {
				e.preventDefault();
				var target = this.hash;
				var $target = $(target);
				$('html, body').stop().animate({
					'scrollTop': $target.offset().top - 120
				}, 900, 'swing', function () {
					window.location.hash = target;
				});
			});
	</script>

</body>

</html>