
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

        
    
    <!-- SPECIFIC CSS -->
    <link href="layerslider/css/layerslider.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

</head>
  


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
    <div id="full-slider-wrapper">
    <div id="layerslider" style="width:100%;height:600px;">
        <!-- first slide -->
        <?php $getFoodBanners = getFoodHomeBanners(); ?>
        <?php while($getFoodhomeBanners = $getFoodBanners->fetch_assoc()) { ?>
        <div class="ls-slide" data-ls="slidedelay: 5000; transition2d:5;">
            <img src="<?php echo $base_url . 'uploads/food_banner_images/'.$getFoodhomeBanners['banner'] ?>" class="ls-bg" alt="Slide background" alt="<?php echo $getFoodhomeBanners['title'];?>">
            <h3 class="ls-l slide_typo" style="top: 44%; left: 50%;" data-ls="offsetxin:0;durationin:2000;delayin:1000;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotatexout:90;transformoriginout:50% bottom 0;" ><strong>Enjoy</strong> a quick friends dinner</h3>           
            <?php if($getFoodhomeBanners['lkp_banner_type_id']==1) { ?>
            <p class="ls-l" style="top:64%; left:50%;" data-ls="durationin:2000;delayin:1300;easingin:easeOutElastic;" ><a href="list_page.php" class="button_intro">Read more</a> </p>
            <?php } ?>
        </div>
       <?php } ?>
    
        <div id="count" class="hidden-xs">
            <ul>
                <li><span class="number">2650</span> Restaurant</li>
                <li><span class="number">5350</span> People Served</li>
                <li><span class="number"><?php echo getUsersRowsCount('users','lkp_admin_service_type_id','2'); ?></span> Registered Users</li>
            </ul>
        </div>
    </div>
    
    </div><!-- End layerslider -->
    
    
    <!-- Content ================================================== -->
         <div class="container margin_10">
        
         <div class="main_title">
            <h2 class="nomargin_top" style="padding-top:0">How it works</h2>
            <p>
                Cum doctus civibus efficiantur in imperdiet deterruisset.
            </p>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="box_home" id="one">
                    <span>1</span>
                    <h3>Search by address</h3>
                    <p>
                        Find all restaurants available in your zone.
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box_home" id="two">
                    <span>2</span>
                    <h3>Choose a restaurant</h3>
                    <p>
                        We have more than 1000s of menus online.
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box_home" id="three">
                    <span>3</span>
                    <h3>Pay by card or cash</h3>
                    <p>
                        It's quick, easy and totally secure.
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box_home" id="four">
                    <span>4</span>
                    <h3>Delivery or takeaway</h3>
                    <p>
                        You are lazy? Are you backing home?
                    </p>
                </div>
            </div>
        </div><!-- End row -->
        
        
        </div><!-- End container -->
            
    <div class="white_bg">
    <div class="container margin_60">
        
        <div class="main_title">
            <h2 class="nomargin_top">Choose from Most Popular</h2>
            <p>
                Cum doctus civibus efficiantur in imperdiet deterruisset.
            </p>
        </div>
        
        <div class="row">
            <?php for($i=0; $i<6; $i++) {?>
            <div class="col-md-6">
               
                <a href="menu.php" class="strip_list">
                    <div class="ribbon_1">Popular</div>
                    <div class="desc">
                        <div class="thumb_strip">
                            <img src="img/thumb_restaurant.jpg" alt="">
                        </div>
                        <div class="rating">
                            <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                        </div>
                        <h3>Taco Mexican</h3>
                        <div class="type">
                            Mexican / American
                        </div>
                        <div class="location">
                            135 Newtownards Road, Belfast, BT4. <span class="opening">Opens at 17:00</span>
                        </div>
                        <ul>
                            <li>Take away<i class="icon_check_alt2 ok"></i></li>
                            <li>Delivery<i class="icon_check_alt2 ok"></i></li>
                        </ul>
                    </div><!-- End desc-->
                </a><!-- End strip_list-->
              
            </div><!-- End col-md-6-->
             <?php } ?>
        </div><!-- End row -->   
        
        </div><!-- End container -->
        </div><!-- End white_bg -->
        
       <div class="high_light">
        <div class="container">
            <h3>Choose from over 2,000 Restaurants</h3>
            <p>Ridiculus sociosqu cursus neque cursus curae ante scelerisque vehicula.</p>
            <a href="list_page.html">View all Restaurants</a>
        </div><!-- End container -->
      </div><!-- End hight_light -->
            
    
    <!-- End Content =============================================== -->
    
    
    
    <!-- Footer ================================================== -->
    <footer>
        <?php include_once 'footer.php';?>
    </footer>
    <!-- End Footer =============================================== -->

<div class="layer"></div><!-- Mobile menu overlay mask -->

<!-- Login modal -->   
<div class="modal fade" id="login_2" tabindex="-1" role="dialog" aria-labelledby="myLogin" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-popup">
                <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
                <form action="#" class="popup-form" id="myLogin">
                    <div class="login_icon"><i class="icon_lock_alt"></i></div>
                    <input type="text" class="form-control form-white" placeholder="Username">
                    <input type="text" class="form-control form-white" placeholder="Password">
                    <div class="text-left">
                        <a href="#">Forgot Password?</a>
                    </div>
                    <button type="submit" class="btn btn-submit">Submit</button>
                </form>
            </div>
        </div>
    </div><!-- End modal -->   
    
<!-- Register modal -->   
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myRegister" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-popup">
                <a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
                <form action="#" class="popup-form" id="myRegister">
                    <div class="login_icon"><i class="icon_lock_alt"></i></div>
                    <input type="text" class="form-control form-white" placeholder="Name">
                    <input type="text" class="form-control form-white" placeholder="Last Name">
                    <input type="email" class="form-control form-white" placeholder="Email">
                    <input type="text" class="form-control form-white" placeholder="Password"  id="password1">
                    <input type="text" class="form-control form-white" placeholder="Confirm password"  id="password2">
                    <div id="pass-info" class="clearfix"></div>
                    <div class="checkbox-holder text-left">
                        <div class="checkbox">
                            <input type="checkbox" value="accept_2" id="check_2" name="check_2" />
                            <label for="check_2"><span>I Agree to the <strong>Terms &amp; Conditions</strong></span></label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-submit">Register</button>
                </form>
            </div>
        </div>
    </div><!-- End Register modal -->
    
<!-- COMMON SCRIPTS -->
<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/common_scripts_min.js"></script>
<script src="js/functions.js"></script>
<script src="assets/validate.js"></script>


<!-- SPECIFIC SCRIPTS -->
<script src="layerslider/js/greensock.js"></script>
<script src="layerslider/js/layerslider.transitions.js"></script>
<script src="layerslider/js/layerslider.kreaturamedia.jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        'use strict';
        $('#layerslider').layerSlider({
            autoStart: true,
            responsive: true,
            responsiveUnder: 1280,
            layersContainer: 1170,
            navButtons:false,
            showCircleTimer:false,
            navStartStop:false,
            skinsPath: 'layerslider/skins/'
            // Please make sure that you didn't forget to add a comma to the line endings
            // except the last line!
        });
    });
</script>

    <!-- Auto complete home page search -->           
    <script type="text/javascript">   
    // AJAX call for autocomplete 
    $(document).ready(function(){
        $("#search-box").keyup(function(){
            $.ajax({
            type: "POST",
            url: "get_address_results.php",
            data:'keyword='+$(this).val(),
            beforeSend: function(){
                $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
            },
            success: function(data){
                $("#suggesstion-box").show();
                $("#suggesstion-box").html(data);
                $("#search-box").css("background","#FFF");
            }
            });
        });
    });
    //To select country name
    function selectCountry(val) {
        $("#search-box").val(val);
        $("#suggesstion-box").hide();
    }
    </script>
<style>
#country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}
</style>

    <!-- End home page search -->

</html>