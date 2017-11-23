<?php 
    $currentFile = $_SERVER["PHP_SELF"];
    $parts = Explode('/', $currentFile);
    $page_name = $parts[count($parts) - 1];
?>
<style type="text/css">
.check_page {
    color:#f26226 !important;
}
</style>
<div class="row">
                <div class="col-md-3 col-sm-3 col-xs-3">
                    <div id="logo_home">
                        <h1><a href="index.php" title="My Servant">My Servant</a></h1>
                    </div>
                </div>
                <nav class="col-md-9 col-sm-9 col-xs-9">
                    <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
                    <div class="main-menu">
                        <div id="header_menu">
                            <img src="img/logo.png" width="160" height="34" alt="My Servant" data-retina="true">
                        </div>
                        <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                        <ul>
                            <li class="active"><a href="index.php" <?php if($page_name == 'index.php') {  ?> class="check_page" <?php } ?>>Home</a></li>
                            <li class="active"><a href="about.php" <?php if($page_name == 'about.php') {  ?> class="check_page" <?php } ?>>About US</a></li>
                            <li class="active"><a href="services.php" <?php if($page_name == 'services.php') {  ?> class="check_page" <?php } ?>>Services</a></li>
                            <li class="active"><a href="testimonials.php" <?php if($page_name == 'testimonials.php') {  ?> class="check_page" <?php } ?>>Testimonials</a></li>
                            <li class="active"><a href="partners.php" <?php if($page_name == 'partners.php') {  ?> class="check_page" <?php } ?>>Partners</a></li>
                            <li class="active"><a href="all_brands.php" <?php if($page_name == 'all_brands.php') {  ?> class="check_page" <?php } ?>>Brands</a></li>
                            <li class="active"><a href="contactus.php" <?php if($page_name == 'contactus.php') {  ?> class="check_page" <?php } ?>>Contact Us</a></li>
                        </ul>
                         
                    </div><!-- End main-menu -->
                    <ul id="top_tools">
                       
                        <li>
                            <div class="dropdown dropdown-cart">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class=" icon-basket-1"></i>Cart (0) </a>
                                <ul class="dropdown-menu" id="cart_items">
                                    
                                </ul>
                            </div><!-- End dropdown-cart-->
                        </li>
                    </ul>
                </nav>
            </div>