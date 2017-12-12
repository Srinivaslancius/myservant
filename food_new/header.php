<div class="container-fluid">
    <div class="row myservant_topheader">
            <div class="col-md-12">
                
                <div class="col-md-2">
                    <p>Email: <a href="mailto::<?php echo $getFoodSiteSettingsData['email']; ?>"><?php echo $getFoodSiteSettingsData['email']; ?></a></p>
                </div>
                <div class="col-md-3">
                    <p>Customer Care: <a href="Tel:<?php echo $getFoodSiteSettingsData['mobile']; ?>"><?php echo $getFoodSiteSettingsData['mobile']; ?></a> Toll Free (24 * 7)</p>
                </div>
                <div class="col-md-3 pull-right">
                    <p class="pull-right"><a href="#">Login</a></p>
                </div>
            </div> 
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                   
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
        <div class="row myseranr_header">
            <div class="col--md-3 col-sm-3 col-xs-3">
                <a href="index.php" id="logo">
                <img src="img/logo.png" alt="" data-retina="true" class="hidden-xs myservanrlogo">
                <img src="img/logo-mobile.png"  alt="" data-retina="true" class="hidden-lg hidden-md hidden-sm">
                </a>
            </div>
            <div class="col-md-6">
                <form method="post" action="list.php" autocomplete="off">
                    <div id="custom-search-input">
                        <div class="input-group ">
                            <input type="text" class="search-query" placeholder="Your Address or postal code" required name="searchKey" id="searchKey">
                            <span class="input-group-btn">
                            <input type="submit" class="btn_search" value="submit" name="searchFood">
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3">
                <img src="img/cart.png" width="40" height="40" class="img-responsive pull-right" alt=""></div>
            </div>
        </div><!-- End row -->
    </div><!-- End container -->