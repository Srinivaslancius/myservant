
<!DOCTYPE html>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

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

	<!-- SPECIFIC CSS -->
	<link href="css/shop.css" rel="stylesheet">

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

	<div id="preloader">
		<div class="sk-spinner sk-spinner-wave">
			<div class="sk-rect1"></div>
			<div class="sk-rect2"></div>
			<div class="sk-rect3"></div>
			<div class="sk-rect4"></div>
			<div class="sk-rect5"></div>
		</div>
	</div>
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
				<h1>Shopping cart</h1>
				<p>Ridiculus sociosqu cursus neque cursus curae ante scelerisque vehicula.</p>
			</div>
		</div>
	</section>
	<!-- End Section -->

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
		<!-- End Position -->

		<div class="container margin_60">
			<div class="checkout-page">

				<ul class="default-links">
					<li>Exisitng Customer? <a href="#">Click here to login</a>
					</li>
				</ul>

				<div class="row">
					<div class="col-md-7 col-sm-12 col-xs-12">

						<div class="billing-details">
							<div class="shop-form">
								<form method="post">
									<div class="default-title">
										<h2>Billing Details</h2>
									</div>
									<div class="row">
										<div class="form-group col-md-6 col-sm-6 col-xs-12">
											<label>First name <sup>*</sup>
											</label>
											<input type="text" name="field-name" value="" placeholder="" class="form-control">
										</div>
										<div class="form-group col-md-6 col-sm-6 col-xs-12">
											<label>Last name <sup>*</sup>
											</label>
											<input type="text" name="field-name" value="" placeholder="" class="form-control">
										</div>
										<div class="form-group col-md-12 col-sm-12 col-xs-12">
											<label>Company name</label>
											<input type="text" name="field-name" value="" placeholder="" class="form-control">
										</div>
										<div class="form-group col-md-6 col-sm-6 col-xs-12">
											<label>Email Address <sup>*</sup>
											</label>
											<input type="email" name="field-name" value="" placeholder="" class="form-control">
										</div>
										<div class="form-group col-md-6 col-sm-6 col-xs-12">
											<label>Phone <sup>*</sup>
											</label>
											<input type="text" name="field-name" value="" placeholder="" class="form-control">
										</div>
										<div class="form-group col-md-12 col-sm-12 col-xs-12">
											<label>Address <sup>*</sup>
											</label>
											<input type="text" name="field-name" value="" placeholder="" class="form-control">
										</div>
										<div class="form-group col-md-12 col-sm-12 col-xs-12">
											<label>Country <sup>*</sup>
											</label>
											<select name="country" class="form-control">
												<option>United Kingdom (UK)</option>
												<option>Pakistan</option>
												<option>USA</option>
												<option>CANADA</option>
												<option>INDIA</option>
											</select>
										</div>
										<div class="form-group col-md-6 col-sm-6 col-xs-12">
											<label>Zip / Postal Code</label>
											<input type="text" name="code" value="" placeholder="Zip / Postal Code" class="form-control">
										</div>
										<div class="form-group col-md-6 col-sm-6 col-xs-12">
											<label>City <sup>*</sup>
											</label>
											<select name="state" class="form-control">
												<option>City</option>
												<option>Maharshtra</option>
												<option>NY</option>
												<option>ALabama</option>
												<option>Mexico</option>
											</select>
										</div>
										<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="check-box">
												<input type="checkbox" name="shipping-option" id="account-option"> &ensp;
												<label for="account-option">Create an account?</label>
											</div>
										</div>
										<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<label>Order note</label>
											<textarea placeholder="Notes about your order, e.g. special notes for delivery" class="form-control"></textarea>
										</div>
									</div>
								</form>
							</div>
						</div>
						<!--End Billing Details-->
					</div>
					<!--End Col-->

					<div class="col-md-5 col-sm-12 col-xs-12">
						<div class="your-order">
							<div class="default-title">
								<h2>Your Order</h2>
							</div>
							<ul class="orders-table">
								<li class="table-header clearfix">
									<div class="col">
										<strong>Product</strong>
									</div>
									<div class="col">
										<strong>Total</strong>
									</div>
								</li>
								<li class="clearfix">
									<div class="col" style="text-transform:none;">
										 Home Deep Clening
									</div>
									<div class="col second">
										Rs. 3499
									</div>
								</li>
								<li class="clearfix">
									<div class="col" style="text-transform:none;">
										SubTotal
									</div>
									<div class="col second">
										Rs. 3499.00
									</div>
								</li>
								<li class="clearfix total">
									<div class="col">
										<strong>Order Total</strong>
									</div>
									<div class="col second">
										<strong>Rs. 3499.00</strong>
									</div>
								</li>
							</ul>
							<div class="coupon-code">
								<div class="form-group">
									<div class="field-group">
										<input type="text" name="code" value="" placeholder="Coupon Code" class="form-control">
									</div>
									<div class="field-group btn-field">
										<button type="submit" class="btn_cart_outine">Apply</button>
									</div>
								</div>
							</div>
						</div>
						<!--End Your Order-->

						<div class="place-order">
							<div class="default-title">
								<h2>Payment Method</h2>
							</div>
							<div class="payment-options">
								<ul>
									
									<li>
										<div class="radio-option">
											<input type="radio" name="payment-group" id="payment-2">
											<label for="payment-2">Online Payment</label>
										</div>
									</li>
									<li>
										<div class="radio-option">
											<input type="radio" name="payment-group" id="payment-3">
											<label for="payment-3">COD
											</label>
										</div>
									</li>
								</ul>
							</div>
							<button type="button" class="btn_full">Place Order <i class="icon-left"></i>
							</button>
						</div>
						<!--End Place Order-->

					</div>
				</div>
			</div>
		</div>
		<!-- End Container -->
	</main>
	<!-- End main -->

	<footer class="revealed">
            <?php include_once 'footer.php';?>
        </footer><!-- End footer -->

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

	<script>
		if ($('.prod-tabs .tab-btn').length) {
			$('.prod-tabs .tab-btn').on('click', function (e) {
				e.preventDefault();
				var target = $($(this).attr('href'));
				$('.prod-tabs .tab-btn').removeClass('active-btn');
				$(this).addClass('active-btn');
				$('.prod-tabs .tab').fadeOut(0);
				$('.prod-tabs .tab').removeClass('active-tab');
				$(target).fadeIn(500);
				$(target).addClass('active-tab');
			});

		}
	</script>

</body>

</html>