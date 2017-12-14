
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
			</div>
		</div>
	</section>
	<!-- End Section -->

	<main>
		<?php
	    if($_SESSION['user_login_session_id'] == '') {
	        header ("Location: logout.php");
	    } 
	    ?>
		<div class="container margin_60">
			<div class="checkout-page">

				<?php
				$id = $_SESSION['user_login_session_id'];
				$getUserData = getAllDataWhere('users','id',$id);
				$getUser = $getUserData->fetch_assoc();?>
				<form method="post" action="save_order.php" name="form">
				<div class="row">
					<div class="col-md-7 col-sm-12 col-xs-12">

						<div class="billing-details">
							<div class="shop-form">
								<div class="default-title">
									<h2>Billing Details</h2>
								</div>
								<div class="row">
									<div class="form-group col-md-6 col-sm-6 col-xs-12">
										<label>First name <sup>*</sup>
										</label>
										<input type="text" name="first_name" id="name_contact" value="<?php echo $getUser['user_full_name']; ?>" placeholder="" class="form-control" required>
									</div>
									<div class="form-group col-md-6 col-sm-6 col-xs-12">
										<label>Last name <sup>*</sup>
										</label>
										<input type="text" name="last_name" id="lastname_contact" value="" placeholder="" class="form-control" required>
									</div>
									<div class="form-group col-md-12 col-sm-12 col-xs-12">
										<label>Company name</label>
										<input type="text" name="company_name" value="" placeholder="" class="form-control">
									</div>
									<div class="form-group col-md-6 col-sm-6 col-xs-12">
										<label>Email Address <sup>*</sup>
										</label>
										<input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" id="email_contact" value="<?php echo $getUser['user_email']; ?>" placeholder="" class="form-control" required>
									</div>
									<div class="form-group col-md-6 col-sm-6 col-xs-12">
										<label>Phone <sup>*</sup>
										</label>
										<input type="tel" name="mobile" id="phone_contact" value="<?php echo $getUser['user_mobile']; ?>" placeholder="" maxlength="10" pattern="[0-9]{10}" class="form-control valid_mobile_num" required>
									</div>
									<div class="form-group col-md-12 col-sm-12 col-xs-12">
										<label>Address <sup>*</sup>
										</label>
										<input type="text" name="address" value="" placeholder="" class="form-control" required>
									</div>
									<?php $getCountriesData = getAllDataWithActiveRecent('lkp_countries'); ?>
									<div class="form-group col-md-12 col-sm-12 col-xs-12">
										<label>Country <sup>*</sup>
										</label>
										<select name="country" id="lkp_country_id" class="form-control" onChange="getCities(this.value);" required>
											<option value="99">India</option>
										</select>
									</div>
									<div class="form-group col-md-6 col-sm-6 col-xs-12">
										<label>Zip / Postal Code  <sup>*</sup></label>
										<input type="tel" name="postal_code" value="" placeholder="Zip / Postal Code" class="form-control valid_mobile_num" maxlength="6" required>
									</div>
									<?php $getCitiesData = getAllDataWhere('lkp_cities','lkp_status_id',0); ?>
									<div class="form-group col-md-6 col-sm-6 col-xs-12">
										<label>City <sup>*</sup>
										</label>
										<select name="city" id="lkp_city_id" class="form-control" required>
											<option value="">Select City</option>
											<?php while($getCities = $getCitiesData->fetch_assoc()) { ?>
											<option value="<?php echo $getCities['id'];?>"><?php echo $getCities['city_name'];?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<label>Order note</label>
										<textarea id="order_note" name="order_note" placeholder="Notes about your order, e.g. special notes for delivery" class="form-control"></textarea>
									</div>
								</div>
							</div>
						</div>
						<!--End Billing Details-->
					</div>
					<!--End Col-->

					<?php
					    if($_SESSION['CART_TEMP_RANDOM'] == "") {
					        $_SESSION['CART_TEMP_RANDOM'] = rand(10, 10).sha1(crypt(time())).time();
					    }
					    $session_cart_id = $_SESSION['CART_TEMP_RANDOM'];
					    if(isset($_SESSION['user_login_session_id']) && $_SESSION['user_login_session_id']!='') {
					        $user_session_id = $_SESSION['user_login_session_id'];
					        $cartItems1 = "SELECT * FROM services_cart WHERE user_id = '$user_session_id' OR session_cart_id='$session_cart_id' ";
        					$cartItems = $conn->query($cartItems1);
					    } else {                                       
					        $cartItems = getAllDataWhere('services_cart','session_cart_id',$session_cart_id);
					    } 
					?>
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
								<?php $cartTotal = 0;  
                              		while ($getCartItems = $cartItems->fetch_assoc()) { 
                               		$getSerName= getIndividualDetails('services_group_service_names','id',$getCartItems['service_id']); ?>

                               	<input type="hidden" name="category_id[]" value="<?php echo $getCartItems['service_category_id']; ?>">
                                <input type="hidden" name="sub_cat_id[]" value="<?php echo $getCartItems['service_sub_category_id']; ?>">
                                <input type="hidden" name="group_id[]" value="<?php echo $getCartItems['group_id']; ?>">
                                <input type="hidden" name="service_id[]" value="<?php echo $getCartItems['service_id']; ?>">
                                <input type="hidden" name="service_quantity[]" value="<?php echo $getCartItems['service_quantity']; ?>">
                                <input type="hidden" name="service_price_type_id[]" value="<?php echo $getSerName['service_price_type_id']; ?>">
                                	<?php if($getSerName['service_price_type_id'] == 1) {
			                            $cartTotal1 += $getSerName['service_price']*$getCartItems['service_quantity'];
			                        ?>
									<input type="hidden" name="service_price[]" value="<?php echo $getSerName['service_price']; ?>">
									<?php } elseif($getSerName['price_after_visit_type_id'] == 1) { 
										$cartTotal1 = $cartTotal;
									?>
									<input type="hidden" name="service_price[]" value="<?php echo $getSerName['price_after_visiting']; ?>">
									<?php } else { 
										$cartTotal1 = $cartTotal;
									?>
									<input type="hidden" name="service_price[]" value="<?php echo $getSerName['service_min_price']; ?> - <?php echo $getSerName['service_max_price']; ?>">
									<?php } ?>
                                <input type="hidden" name="service_selected_date[]" value="<?php echo $getCartItems['service_selected_date']; ?>">
                                <input type="hidden" name="service_selected_time[]" value="<?php echo $getCartItems['service_selected_time']; ?>">

								<li class="clearfix">
									<div class="col" style="text-transform:none;">
										<?php echo $getSerName['group_service_name']; ?>
									</div>
									<?php if($getSerName['service_price_type_id'] == 1) {
			                            $cartTotal += $getSerName['service_price']*$getCartItems['service_quantity'];
			                        ?>
									<div class="col second">
										Rs. <?php echo $getSerName['service_price']; ?> * <?php echo $getCartItems['service_quantity'];?>
									</div>
									<?php } elseif($getSerName['price_after_visit_type_id'] == 1) { ?>
									<div class="col second">
										<?php echo $getSerName['price_after_visiting']; ?>
									</div>
									<?php } else { ?>
									<div class="col second">
										Rs. <?php echo $getSerName['service_min_price']; ?> - <?php echo $getSerName['service_max_price']; ?>
									</div>
									<?php } ?>
								</li>
								<?php } ?>
								<input type="hidden" name="sub_total" id="sub_total" value="<?php echo $cartTotal1; ?>">
								<input type="hidden" name="coupon_code_type" id="coupon_code_type" value="">
								<input type="hidden" name="discount_money" id="discount_money" value="">
                                <input type="hidden" name="order_total" id="order_total" value="<?php echo $cartTotal1+$getSiteSettingsData['service_tax']; ?>">
								<li class="clearfix">
									<div class="col" style="text-transform:none;">
										SubTotal
									</div>
									<div class="col second">
										Rs. <?php echo $cartTotal; ?>
									</div>
								</li>
								<li class="clearfix" id="discount_price">
									<div class="col" style="text-transform:none;">
										Discount Price<span style="color:green">(Coupon Applied Successfully.)</span>
									</div>
									<div class="col second" id="discount_price1">
									</div>
								</li>
								<li class="clearfix">
									<div class="col" style="text-transform:none;">
										Service Tax
									</div>
									<div class="col second" >
										Rs. <?php echo $getSiteSettingsData['service_tax']; ?>
										<input type="hidden" name="service_tax" id="service_tax" value="<?php echo $getSiteSettingsData['service_tax']; ?>">
									</div>
								</li>
								<li class="clearfix total">
									<div class="col">
										<strong>Order Total</strong>
									</div>
									<div class="col second" id="cart_total2">
										<strong>Rs. <?php echo $cartTotal+$getSiteSettingsData['service_tax']; ?></strong>
									</div>
								</li>
							</ul>
							<div class="coupon-code">
								<?php if($cartTotal != 0) { ?>
								<div class="form-group">
									<div class="field-group has-feedback has-clear">
								      <input type="text" name="coupon_code" style="text-transform:uppercase" id="coupon_code" value="" placeholder="Coupon Code" class="form-control">
								      <span class="form-control-clear icon-cancel-1 form-control-feedback hidden"></span>
								    </div>
									<div class="field-group btn-field">
										<button type="button" class="btn_cart_outine apply_coupon">Apply</button>
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
						<!--End Your Order-->
						<?php
							$getPriceType = "SELECT * FROM services_cart WHERE (services_price_type_id=2) AND (user_id = '$user_session_id' OR session_cart_id='$session_cart_id') ";
        					$getCount = $conn->query($getPriceType);  
						?>
						<div class="place-order">
							<div class="default-title">
								<h2>Payment Method</h2>
							</div>
							<div class="payment-options">
								<ul>
									<?php if($getCount->num_rows == 0) { ?>
									<li>
										<div class="radio-option">
											<input type="radio" name="payment_group" id="payment-2" value="2" required>
											<label for="payment-2">Online Payment</label>
										</div>
									</li>
									<?php } ?>
									<li>
										<div class="radio-option">
											<input type="radio" name="payment_group" id="payment-3" value="1" required>
											<label for="payment-3">COD
											</label>
										</div>
									</li>
								</ul>
							</div>
							<div id="divId">
								<input type="submit" name="submit" class="btn_full" value="Place Order"></i>
							</div>
						</div>
						<!--End Place Order-->

					</div>
				</div>
				</form>
				<?php if(!isset($_SESSION['user_login_session_id'])) { ?>
				<script type="text/javascript">document.getElementById('divId').style.display = 'none';</script>
				<?php } ?>
			</div>
		</div>
		<!-- End Container -->
	</main>
	<!-- End main -->

	<footer>
            <?php include_once 'footer.php';?>
        </footer><!-- End footer -->

	<div id="toTop"></div><!-- Back to top button -->
	
	<!-- Search Menu -->
	<div class="search-overlay-menu">
		<span class="search-overlay-close"><i class="icon_set_1_icon-77"></i></span>
		<form role="search" id="searchform" method="get">
			<input value="" name="q" type="search" placeholder="Search..." />
			<button type="button"><i class="icon_set_1_icon-78"></i>
			</button>
		</form>
	</div><!-- End Search Menu -->

	<!-- Common scripts -->
	<script src="/cdn-cgi/scripts/84a23a00/cloudflare-static/email-decode.min.js"></script><script src="js/jquery-2.2.4.min.js"></script>
	<!-- Validation purpose add scripts -->
	<?php include_once 'common_validations_scripts.php'; ?>
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
	<!-- Script to get Cities -->
    <script type="text/javascript">
    function getCities(val) { 
        $.ajax({
        type: "POST",
        url: "get_cities.php",
        data:'lkp_country_id='+val,
        success: function(data){
            $("#lkp_city_id").html(data);
        }
        });
    }
    </script>
    <script type="text/javascript">
    $('#discount_price').hide();
        $(".apply_coupon").click(function(){
            var coupon_code = $("#coupon_code").val();
            var cart_total = $('#sub_total').val();
            var order_total = $('#order_total').val();
            var service_tax = $('#service_tax').val();
            $.ajax({
               type: "POST",
               url: "apply_coupon.php",
               data: "coupon_code="+coupon_code+"&cart_total="+cart_total+"&service_tax="+service_tax,
               success: function(value){
               		if(value == 0) {
               			alert('Please Enter Valid Coupon');
               			$("#coupon_code").val('');
               			$(".form-control-clear").html('');
               		} else if(value == 1) {
               			alert('Enter Coupon is not valid for this Service');
               			$("#coupon_code").val('');
               			$(".form-control-clear").html('');
               		} else{
               			var data = value.split(",");
		          		$('#cart_total2').html(data[0]);
			            $('#order_total').val(data[0]);
	               		$('#discount_price').show();
	               		$('#discount_price1').html(data[1]);
	               		$('#discount_money').val(data[2]);
	               		$('#coupon_code_type').val(data[3]);
	               	}
            	}
            });
            $('.has-clear input[type="text"]').on('input propertychange', function() {
			  var $this = $(this);
			  var visible = Boolean($this.val());
			  $this.siblings('.form-control-clear').toggleClass('hidden', !visible);
			}).trigger('propertychange');

			$('.form-control-clear').click(function() {
			  $(this).siblings('input[type="text"]').val('')
			    .trigger('propertychange').focus();
			    $('#cart_total2').html(order_total);
				$('#order_total').val(order_total);
				$('#discount_price').hide();
				$('#discount_money').val('');
	            $('#coupon_code_type').val('');
			});
		});
	</script>
	<style type="text/css">
	  .error {
	    color: $errorMsgColor;
	  }

	</style>
	<style>
	::-ms-clear {
	  display: none;
	}

	.form-control-clear {
	  z-index: 10;
	  pointer-events: auto;
	  cursor: pointer;
	}
	</style>
</body>

</html>