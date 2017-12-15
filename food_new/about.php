 <!DOCTYPE html>
<html style="overflow-x:hidden">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include_once './meta_fav.php';?>
    <!-- GOOGLE WEB FONT -->
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,900,400italic,700italic,300,300italic' rel='stylesheet' type='text/css'>

    <!-- BASE CSS -->
    <link href="css/base.css" rel="stylesheet">

		
    
    <!-- SPECIFIC CSS -->
    <link href="layerslider/css/layerslider.css" rel="stylesheet">

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
        <div class="sk-spinner sk-spinner-wave" id="status">
            <div class="sk-rect1"></div>
            <div class="sk-rect2"></div>
            <div class="sk-rect3"></div>
            <div class="sk-rect4"></div>
            <div class="sk-rect5"></div>
        </div>
    </div><!-- End Preload -->

    <!-- Header ================================================== -->
    <header>
	  <?php include_once './header.php';?>
        </header>
    <!-- End Header =============================================== -->

<!-- SubHeader =============================================== -->
<section class="parallax-window" id="short" data-parallax="scroll" data-image-src="img/sub_header_home.jpg" data-natural-width="1400" data-natural-height="350">
    <div id="subheader">
    	<div id="sub_content">
    	 <h1>About us</h1>
         <p>One Stop Shop for all your food needs.</p>
         <p></p>
        </div><!-- End sub_content -->
	</div><!-- End subheader -->
</section><!-- End section -->
<!-- End SubHeader ============================================ -->

    <div id="position">
        <div class="container">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li>About Us</li>
               
            </ul>
            <a href="#0" class="search-overlay-menu-btn"><i class="icon-search-6"></i> Search</a>
        </div>
    </div><!-- Position -->
<?php $getAllAboutusData = getAllDataWhere('food_content_pages','id',6);
          $getAboutusData = $getAllAboutusData->fetch_assoc();
?>
<!-- Content ================================================== -->
<div class="container margin_60_35">
	<div class="row">
		<div class="col-md-12">
		<center> <h2 class="nomargin_top">About US</h2></center>
			<?php echo $getAboutusData
			['description']; ?>
				
				</ul>
		</div>
	<!--	<div class="col-md-7 col-md-offset-1 text-right hidden-sm hidden-xs">
			<img src="img/devices.jpg" alt="" class="img-responsive">
		</div>-->
	</div><!-- End row -->
	<hr class="more_margin">
    <div class="main_title">
            <h2 class="nomargin_top">Quick food quality feautures</h2>
        <!--    <p>
                Cum doctus civibus efficiantur in imperdiet deterruisset.
            </p>-->
        </div>
	<div class="row">
		<div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
			<div class="feature">
				<i class="icon_building"></i>
				<h3 style="margin-left:100px"><span>+ 1000</span> Restaurants</h3>
				<p style="margin-left:100px;text-align:justify">
					Delhiites, ever had a meal at that exorbitant restaurant you love without emptying your wallet? Now’s the
					time to eat your heart at over 1000+ restaurants across 8 cities, is here to save your pockets!
				</p>
			</div>
		</div>
		<div class="col-md-6 wow fadeIn" data-wow-delay="0.2s">
			<div class="feature mrgin">
				<i class="icon_documents_alt"></i>
				<h3 style="margin-left:100px"><span>+1000</span> Food Menu</h3>
				<p style="margin-left:100px;text-align:justify">
					Delhiites, ever had a meal at that exorbitant restaurant you love without emptying your wallet? Now’s the time to eat your heart at<br>over 1000+ restaurants across 8 cities, is here to save your pockets!
				</p>
			</div>
		</div>
	</div><!-- End row -->
	<div class="row">
		<div class="col-md-6 wow fadeIn" data-wow-delay="0.3s">
			<div class="feature mrgin">
				<i class="icon_bag_alt"></i>
				<h3 style="margin-left:100px"><span>Delivery</span> or Takeaway</h3>
				<p style="margin-left:100px;text-align:justify">
					Delhiites, ever had a meal at that exorbitant restaurant you love without emptying your wallet? Now’s the time to eat your heart at<br>over 1000+ restaurants across 8 cities, is here to save your pockets!
				</p>
			</div>
		</div>
		<div class="col-md-6 wow fadeIn" data-wow-delay="0.4s">
			<div class="feature mrgin">
				<i class="icon_mobile"></i>
				<h3 style="margin-left:100px"><span>Mobile</span> support</h3>
				<p style="margin-left:100px;text-align:justify">
					Delhiites, ever had a meal at that exorbitant restaurant you love without emptying your wallet? Now’s the time to eat your heart at<br>over 1000+ restaurants across 8 cities, is here to save your pockets!
				</p>
			</div>
		</div>
	</div><!-- End row -->
	<div class="row">
		<div class="col-md-6 wow fadeIn" data-wow-delay="0.5s">
			<div class="feature mrgin">
				<i class="icon_wallet"></i>
				<h3 style="margin-left:100px"><span>Cash</span> payment</h3>
				<p style="margin-left:100px;text-align:justify">
					Delhiites, ever had a meal at that exorbitant restaurant you love without emptying your wallet? Now’s the time to eat your heart at<br>over 1000+ restaurants across 8 cities, is here to save your pockets!
				</p>
			</div>
		</div>
		<div class="col-md-6 wow fadeIn" data-wow-delay="0.6s">
			<div class="feature mrgin">
				<i class="icon_creditcard"></i>
				<h3 style="margin-left:100px"><span>Secure card</span> payment</h3>
				<p style="margin-left:100px;text-align:justify">
					Delhiites, ever had a meal at that exorbitant restaurant you love without emptying your wallet? Now’s the time to eat your heart at<br>over 1000+ restaurants across 8 cities, is here to save your pockets!
				</p>
			</div>
		</div>
	</div><!-- End row -->
</div><!-- End container -->

<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 nopadding features-intro-img">
			<div class="features-bg" class="img-responsive">
				<div class="features-img">
				</div>
			</div>
		</div>
		<div class="col-md-6 nopadding">
			<div class="features-content">
				<h3>"Founders"</h3><br>
				<p style="text-align:justify">
					"Myservant is a food ordering and delivery company based out of Bangalore, India. Myservant was inspired by the thought of providing a complete food ordering and delivery solution from the best neighbourhood restaurants to the urban foodie. A single window for ordering from a wide range of restaurants, we have our own exclusive fleet of delivery personnel to pickup orders from restaurants and deliver it to customers .<br>Having our own fleet gives us the flexibility to offer customers a no minimum order policy on any restaurant and accept online payments for all partner restaurants that we work with.
				</p>
			</div>
		</div>
	</div>
</div><!-- End container-fluid  -->
<!-- End Content =============================================== -->

<!-- Footer ================================================== -->
	<footer>
         <?php include_once 'footer.php'; ?>
		 </footer>
<!-- End Footer =============================================== -->

<div class="layer"></div><!-- Mobile menu overlay mask -->

<!-- Login modal -->   


     <!-- Search Menu -->
	<div class="search-overlay-menu">
		<span class="search-overlay-close"><i class="icon_close"></i></span>
		<form role="search" id="searchform" method="get">
			<input value="" name="q" type="search" placeholder="Search..." />
			<button type="submit"><i class="icon-search-6"></i>
			</button>
		</form>
	</div>
	<!-- End Search Menu -->
    
<!-- COMMON SCRIPTS -->
<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/common_scripts_min.js"></script>
<script src="js/functions.js"></script>
<script src="assets/validate.js"></script>

</body>
</html>