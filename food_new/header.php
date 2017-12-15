<div class="container-fluid">
    <div class="row myservant_topheader">
            <div class="col-md-12">              
                <div class="col-md-2 col-xs-12">
                    <p>Email: <a href="mailto::<?php echo $getFoodSiteSettingsData['email']; ?>"><?php echo $getFoodSiteSettingsData['email']; ?></a></p>
                </div>
                <div class="col-md-9 col-xs-12">
                    <p>Customer Care: <a href="Tel:<?php echo $getFoodSiteSettingsData['mobile']; ?>"><?php echo $getFoodSiteSettingsData['mobile']; ?></a> Toll Free (24*7)</p>
                </div>
                <div class="col-md-1 col-xs-12">
                    <p><a href="#">Login</a></p>
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
            <div class="col--md-3 col-sm-3 col-xs-12">
                <a href="index.php" id="logo">
                <img src="<?php echo $base_url . 'uploads/logo/'.$getFoodSiteSettingsData['logo'] ?>" alt="<?php echo $getFoodSiteSettingsData['admin_title']; ?>" data-retina="true" class="hidden-xs myservanrlogo">
                
                </a>
            </div>
            <div class="col-md-6 col-xs-9">
                <form method="post" action="list.php" autocomplete="off">
                    <div id="custom-search-input">
                        <div class="input-group">
                            <input type="text" class=" search-query" placeholder="Your Address or postal code" required name="searchKey" id="search-box">
                            <div id="suggesstion-box"></div>
                            <span class="input-group-btn">
                            <input type="submit" class="btn_search" value="submit" name="searchFood">
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3 col-xs-3">
                <img src="img/cart.png" width="40" height="40" class="img-responsive pull-right" alt=""></div>
            </div>
        </div><!-- End row -->
    </div><!-- End container -->