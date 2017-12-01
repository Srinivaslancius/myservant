
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

	<link href="css/date_time_picker.css" rel="stylesheet">
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
				<p></p>
			</div>
		</div>
	</section>
	<!-- End Section -->

	<main>
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

		<div class="container margin_60">
			<div class="cart-section">
				 <?php if($cartItems->num_rows > 0) { ?>
				<table class="table table-striped cart-list shopping-cart">
					<thead>
						<tr>
							<th>
								Particulars
							</th>
							<th>
								Price
							</th>
							<th>
								Date
							</th>
                            <th>
                                Time
                            </th>
                             <th>
								Quantity
							</th> 
                                                        
							<th>
								Total
							</th> 
							<th>
								Remove
							</th>
						</tr>
					</thead>
					<form name="cart_form" method="post" action="update_cart.php">
					<tbody>
						<?php $cartTotal = 0;  
                              while ($getCartItems = $cartItems->fetch_assoc()) { 
                        ?>
                         <input type="hidden" name="cart_id[]" value="<?php echo $getCartItems['id']; ?>">
						<tr>
						<?php $getSerName= getIndividualDetails('services_group_service_names','id',$getCartItems['service_id']); ?>
                        <td><?php echo $getSerName['group_service_name']; ?></td>
                        <?php if($getSerName['service_price_type_id'] == 1) {
                             $cartTotal += $getSerName['service_price']*$getCartItems['service_quantity'];
                         ?>
                            <td><?php echo $getSerName['service_price']; ?></td>
                        <?php } elseif($getSerName['price_after_visit_type_id'] == 1) { ?>
                            <td><?php echo "Price After our Visit"; ?></td>
                        <?php } else { ?>
                            <td><?php echo $getSerName['service_min_price']; ?> - <?php echo $getSerName['service_max_price']; ?></td>
                        <?php } ?>
                        <?php 
                        if($getCartItems['service_selected_date'] != '0000-00-00') {
                        	$service_selected_date1 = date('m/d/Y', strtotime($getCartItems['service_selected_date']));
                        } else {
                        	$service_selected_date1 = date('m/d/Y');
                        }
                        
                        ?> 
                        <?php 

                        if($getCartItems['service_selected_time'] != '00:00:00') {
                        	$service_visit_time1 = date('H:i:s A', strtotime($getCartItems['service_selected_time']));
                        } else {
                        	$getCurDate = date('Y-m-d H:i:s A');
                        	$service_visit_time1 = date('H:i:s A', strtotime($getCurDate));
                        }

                        ?>
                        <td><input class="date-pick form-control" type="text" name="service_visit_date[]" value="<?php echo $service_selected_date1; ?>"></td>
                        <td><input class="time-pick form-control" type="text" name="service_visit_time[]" value="<?php echo $service_visit_time1; ?>"></td>
                         <td>
                            <div class="">
                               <input type="number" name="service_quantity[]" min="1" max="5" value="<?php echo $getCartItems['service_quantity'];?>">
                            </div>
                        </td> 
                        <td>Rs. <?php echo $getSerName['service_price']*$getCartItems['service_quantity']; ?> /-</td>
							<td class="options">
								<a <a class="delete_cart_item" data-cart-id ="<?php echo $getCartItems['id']; ?>"><i class=" icon-trash"></i></a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>

				<div class="cart-options clearfix">
					<!-- <div class="pull-left">
						<div class="apply-coupon">
							<div class="form-group">
								<input type="text" name="coupon_code" id="coupon_code" value="" placeholder="Your Coupon Code" class="form-control">
							</div>
							<div class="form-group">
								<div id="remove_icon"></div>
							</div>
							<div class="form-group">
								<button type="button" class="btn_cart_outine coupon">Apply Coupon</button>
							</div>
						</div>
					</div> -->
					<div class="pull-right fix_mobile">
						<input type="submit" class="btn_cart_outine" value="Update Cart" name="submit">
					</div>
				</div>
				<div class="row">
					<div class="column pull-right col-md-4 col-sm-6 col-xs-12">
						<ul class="totals-table">
							<li class="clearfix"><span class="col">Sub Total</span><span class="col" id="cart_total">Rs. <?php echo $cartTotal; ?></span>
							</li>
							<li class="clearfix total"><span class="col">Order Total</span><span class="col">Rs. <?php echo $cartTotal; ?>/-</span>
							</li>
						</ul>
						<?php if(!isset($_SESSION['user_login_session_id'])) { ?>
						<a href="login.php?cart_id=<?php echo encryptPassword(1);?>" class="btn_full">Proceed to Checkout <i class="icon-left"></i></a>
						<?php } else { ?>
                        <a href="checkout.php" class="btn_full">Proceed to Checkout <i class="icon-left"></i></a>
                        <?php } ?>
					</div>
				</div>
				</form>
				<?php }  else { ?>
        			<p style="text-align:center; color:#e04f67">No Services In Your Cart</p>
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
			<button type="submit"><i class="icon_set_1_icon-78"></i>
			</button>
		</form>
	</div><!-- End Search Menu -->

	<!-- Common scripts -->
	<script src="/cdn-cgi/scripts/84a23a00/cloudflare-static/email-decode.min.js"></script><script src="js/jquery-2.2.4.min.js"></script>
	<script src="js/common_scripts_min.js"></script>
	<script src="js/functions.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-timepicker.js"></script>
        <script>
		$('input.date-pick').datepicker();
		$('input.time-pick').timepicker({
			minuteStep: 15,
			showInpunts: false
		})
	</script>

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
	<script type="text/javascript">
        $(".delete_cart_item").click(function(){
            var element = $(this);
            var del_id = element.attr("data-cart-id");
            var info = 'cart_id=' + del_id;
            if(confirm('Are You Sure You Want to Delete ?', 'You Want to Delete Cart Item', function(input){var str = input === true ? 'Ok' : 'Cancel'; 
                if(str == 'Ok') {
                    $.ajax({
                       type: "POST",
                       url: "delete_cart_items.php",
                       data: info,
                       success: function(result){
                        if(result == 1) {
                            alert('Cart Item Deleted Successfully');
                            setTimeout(function() {
                                location.reload();
                            }, 600);
                           
                        } else {
                            alert('Cart Item Not Deleted');
                            return false;
                        }
                     }
                    });
                }
            }))  
            return false;
        });
        </script>
        <script type="text/javascript">
	        $(".coupon").click(function(){
	            var coupon_code = $("#coupon_code").val();
	            var cart_total = $('#cart_total').html();
	            $.ajax({
	               type: "POST",
	               url: "apply_coupon.php",
	               data: "coupon_code="+coupon_code+"&cart_total="+cart_total,
	               success: function(result){
	               		if(result == 0) {
	               			alert('Please Login');
	               			$("#coupon_code").val('');
	               		} else if(result == 1) {
	               			alert('Enter Valid Coupon');
	               			$("#coupon_code").val('');
	               		} else{
		               		$('#cart_total').html(result);
		               		$("#remove_icon").html("<span class='close'>&times;</span>");
		               	}
	            	}
	            });
	            $("#remove_icon").click(function(){
		            $("#coupon_code").val('');
		            $(".close").html('');
		            $('#cart_total').html(cart_total);
		        });
	        });
        </script>

</body>

</html>