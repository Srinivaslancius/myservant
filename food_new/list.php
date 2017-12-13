
<!DOCTYPE html>
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include_once './meta_fav.php';?>
    
    <!-- GOOGLE WEB FONT -->
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,900,400italic,700italic,300,300italic' rel='stylesheet' type='text/css'>

    <!-- BASE CSS -->
    <link href="css/base.css" rel="stylesheet">
    
    <!-- Radio and check inputs -->
    <link href="css/skins/square/grey.css" rel="stylesheet">
    <link href="css/ion.rangeSlider.css" rel="stylesheet">
    <link href="css/ion.rangeSlider.skinFlat.css" rel="stylesheet" >

    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<?php

if(isset($_POST['searchFood'])) {
    $searchParms = $_POST['searchKey'];
    $getSearchResults = getSearchResults('food_vendors',$searchParms);
    $getResultsCount = $getSearchResults->num_rows;
}

?>
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
<section class="parallax-window" id="short" data-parallax="scroll" data-image-src="img/sub_header_short.jpg" data-natural-width="1400" data-natural-height="350">
    <div id="subheader">
	<div id="sub_content">
    	<h1>24 results in your zone</h1>
        <div><i class="icon_pin"></i> 135 Newtownards Road, Belfast, BT4 1AB</div>
    </div><!-- End sub_content -->
</div><!-- End subheader -->
</section><!-- End section -->
<!-- End SubHeader ============================================ -->

    <div id="position">
        <div class="container">
            <ul>
                <li><a href="#0">Home</a></li>
                <li><a href="#0">Category</a></li>
                <li>Page active</li>
            </ul>
             
        </div>
    </div><!-- Position -->
    
    <div class="collapse" id="collapseMap">
		<div id="map" class="map"></div>
	</div><!-- End Map -->

<?php if($getResultsCount > 0) { ?>
<!-- Content ================================================== -->
<div class="container margin_60_35">
	<div class="row">
            <div class="col-md-3">
                <?php include_once './filters.php';?>
            </div>
		
        
		<div class="col-md-9">
        
            <div id="tools">
				<div class="row">
					<div class="col-md-3 col-sm-3 col-xs-6 pull-right">
						<div class="styled-select">
							<select name="sort_rating" id="sort_rating">
								<option value="" selected>Sort by</option>
								<option value="lower">Relevance</option>
								<option value="higher">Delivery Time</option>
                                <option value="higher">Delivery Time</option>
                                <option value="higher">Restaurant Rating</option>
                                <option value="higher">Budget</option>
                            </select>
						</div>
					</div>          
				</div>
			</div><!--End tools -->
               
                <div class="col-md-6" id="faq-result">
                     <?php include('get_list.php'); ?> 
                </div>
                           
		</div><!-- End col-md-9-->
        
	</div><!-- End row -->
</div><!-- End container -->
<!-- End Content =============================================== -->
<?php } else { ?>
<div class="container margin_60_35">
    <div class="row">
        SORRY! No Restaurants Found.
    </div>
</div>
<?php } ?>

<!-- Footer ================================================== -->
	<footer>
            <?php include_once 'footer.php';?>
        </footer>
<!-- End Footer =============================================== -->

<div class="layer"></div><!-- Mobile menu overlay mask -->
      
<!-- COMMON SCRIPTS -->
<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/common_scripts_min.js"></script>
<script src="js/functions.js"></script>
<script src="assets/validate.js"></script>

<!-- SPECIFIC SCRIPTS -->
<script  src="js/cat_nav_mobile.js"></script>
<script>$('#cat_nav').mobileMenu();</script>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAs_JyKE9YfYLSQujbyFToZwZy-wc09w7s"></script>
<script src="js/map.js"></script>
<script src="js/infobox.js"></script>
<script src="js/ion.rangeSlider.js"></script>
<script>
    $(function () {
		 'use strict';
        $("#range").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 15,
            from: 0,
            to:5,
            type: 'double',
            step: 1,
            prefix: "Km ",
            grid: true
        });
    });
</script>
<script>
$(document).ready(function(){
    function getresult(url) {
        $.ajax({
            url: url,
            type: "GET",
            data:  {rowcount:$("#rowcount").val()},
            beforeSend: function(){
            $('#loader-icon').show();
            },
            complete: function(){
            $('#loader-icon').hide();
            },
            success: function(data){ 
            alert(data);               
            $("#faq-result").append(data);
            },
            error: function(){}             
       });
    }
    $(window).scroll(function(){
        if ($(window).scrollTop() == $(document).height() - $(window).height()){
            if($(".pagenum:last").val() <= $(".total-page").val()) {
                var pagenum = parseInt($(".pagenum:last").val()) + 1;                
                getresult('get_list.php?page='+pagenum);
            }
        }
    }); 
});
</script>
</body>
</html>