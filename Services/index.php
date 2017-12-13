<!DOCTYPE html>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html lang="en" style="overflow-x:hidden">
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

	<!-- REVOLUTION SLIDER CSS -->
	<link href="layerslider/css/layerslider.css" rel="stylesheet">
	<!-- For brands slider -->
	<script src="../cdn-cgi/scripts/78d64697/cloudflare-static/email-decode.min.js"></script><script src="js/jquery-2.2.4.min.js"></script>
<style>
	marquee span { 
   margin-right: 0%; 
	-moz-margin-right: 0%; 
    }
    marquee p { 
    white-space:nowrap;
    margin-right: 1000px; 
    } 
</style>
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
            <section id="hero">
			        <div id="search_bar_container">
			            <div class="container">
			            <form method="post" action="sub_categories.php">
			                <div class="search_bar">
			                <span class="nav-facade-active" id="nav-search-in">
			                    <span id="nav-search-in-content">Services Sub Category</span>
			                    <span class="nav-down-arrow nav-sprite"></span>
			                    <select name="id" class="searchSelect" id="searchDropdownBox">
			                    <?php $getCategoriesData = getAllDataWithStatusLimit('services_sub_category','0','0','6'); ?>
			                    <option value="0">Service Category</option>
			                    <?php while($row = $getCategoriesData->fetch_assoc()) {  ?>
		                          <option value="<?php echo $row['id']; ?>" ><?php echo $row['sub_category_name']; ?></option>
		                       <?php } ?>                                    
			                    </select>
			                    </span>
			                    <div class="nav-searchfield-outer">
			                    <input type="text" autocomplete="off" name="sub_category_name" placeholder="Search your related service" id="twotabsearchtextbox">
			                    </div>
			                   <div class="nav-submit-button">
		                            <button type="submit" class="btn btn-default" name="search" style="height:30px;border-radius: 1px;border-color:#f26226;"><span class="icon icon-search pull-right"></span></button>
		                       </div>

			                </div>
			            </form>
			            
			            </div>
			        </div>
			    </section>
        </header>
	<!-- End Header -->

	<main>
		<!-- Slider -->
		<?php $getAllContentPageData = getAllDataWhere('services_content_pages','id',13);
		  $getSliderTextData = $getAllContentPageData->fetch_assoc();
		?>
		<div id="full-slider-wrapper">
                    <?php include_once './slider.php';?>
		</div>
		<!-- End layerslider -->
            <div class="container-fluid marg10 search_back">
                    <div class="row">
					<marquee scrollamount="10" style="color:white;font-size:15px"><span><?php echo strip_tags($getSliderTextData['description']);?></span>
					</marquee> 
                </div>
                </div>
		<div class="container margin_60">

			<div class="main_title">
				<h2>Our <span>Services</span> Categories</h2>
				
			</div>
			<?php $getCategoriesData = getAllDataWithStatusLimit('services_category',0,'0','12'); ?>
			<div class="row">
                 <?php  while($getAllCategoriesData = $getCategoriesData->fetch_assoc()) { ?> 
				<div class="col-md-2 col-sm-6 wow zoomIn" data-wow-delay="0.1s">
					<a href="sub_categories.php?key=<?php echo encryptPassword($getAllCategoriesData['id']); ?>">
					<div class="tour_container" style="height:180px">
						<div class="ribbon_3 popular"><!-- <span>Popular</span> --></div>
						<div class="img_container padd15">
                           <img src="<?php echo $base_url . 'uploads/services_category_images/'.$getAllCategoriesData['category_image'] ?>" class="img-responsive" alt="<?php echo $getAllCategoriesData['category_name']; ?>" style="width:64px; height:64px;">
						</div>
						<div class="tour_title">
							<h3><?php echo $getAllCategoriesData['category_name']; ?></h3>
						</div>
					</div>
					</a>
					<!-- End box tour -->
				</div>
                  <?php } ?>  
			</div>
			<!-- End row -->
			<p class="text-center add_bottom_30">
				<a href="services.php" class="btn_1 medium"><i class="icon-eye-7"></i>View all our Services</a>
			</p>

			<hr>

			

      <div class="main_title">
        <h2>Our <span>Associate</span> Partners</h2>
        
      </div>

      <div class="row">
        <?php $getServiceProvider =  getServicesProviderDataLimit('1','6'); ?>
                <?php  while($getAllgetServiceProvider = $getServiceProvider->fetch_assoc()) { ?>
        <div class="col-md-6 wow fadeIn" data-wow-delay="0.3s">
          <div class="feature">
          <div class="row">
          <div class="col-sm-2">
            <center><img src="<?php echo $base_url . 'uploads/service_provider_business_logo/'.$getAllgetServiceProvider['logo'] ?>" class="img-responsive" alt="<?php echo $getAllgetServiceProvider['company_name']; ?>" style="width:65px; height:65px;"></center>
            </div>
            <div class="col-sm-10">
            <h3><?php echo $getAllgetServiceProvider['company_name']; ?></h3>
            <p>
              <?php echo substr(strip_tags($getAllgetServiceProvider['description']), 0,150);?>
            </p>
          </div>
          </div>
          
          </div>
        </div>
                <?php } ?>
      </div>
			<!-- End row -->
			<!-- End row -->
			<p class="text-center nopadding">
				<a href="partners.php" class="btn_1 medium"><i class="icon-eye-7"></i>View all</a>
			</p>
		</div>
		<!-- End container -->

		<?php include_once 'our_associate_partners.php';?>

		<!-- Brnds Start here -->
		<div class="container margin_0">
			<div class="main_title">
				<h2>Our <span>Brands</span></h2>				
			</div>
			  <?php include_once 'brands.php';?>
		</div><br><br>
		<!-- End Brnds here -->

	</main>
	<!-- End main -->

	<footer>
            <?php include_once 'footer.php';?>
    </footer><!-- End footer -->

	<div id="toTop"></div><!-- Back to top button -->
	
	<!-- Search Menu -->
	
	<!-- Common scripts -->
	
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
	<script>
(function(){
  // setup your carousels as you normally would using JS
  // or via data attributes according to the documentation
  // https://getbootstrap.com/javascript/#carousel
  $('#carousel123').carousel({ interval: 2000 });
  $('#carouselABC').carousel({ interval: 3600 });
}());

(function(){
  $('.carousel-showmanymoveone .item').each(function(){
    var itemToClone = $(this);

    for (var i=1;i<6;i++) {
      itemToClone = itemToClone.next();

      // wrap around if at end of item collection
      if (!itemToClone.length) {
        itemToClone = $(this).siblings(':first');
      }

      // grab item, clone, add marker class, add to collection
      itemToClone.children(':first-child').clone()
        .addClass("cloneditem-"+(i))
        .appendTo($(this));
    }
  });
}());
</script>
<script>
//Search bar
$(function () {
$("#searchDropdownBox").change(function(){
	var Search_Str = $(this).find('option:selected').text();	
    //var Search_Str = $(this).val();
    //replace search str in span value
    $("#nav-search-in-content").text(Search_Str);
  });
});
</script>

</body>

</html>