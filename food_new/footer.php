<?php $getContentPageData = getAllDataWhere('food_content_pages','id',1);
          $getAboutUsData = $getContentPageData->fetch_assoc();
?>
        <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <h3><?php echo $getAboutUsData['title']; ?></h3>
               <p style="text-align:justify"><?php echo substr(strip_tags($getAboutUsData['description']), 0,200);?></p>
            </div>
             <div class="col-md-1 col-sm-1">
             </div>
            <div class="col-md-2 col-sm-2">
            <h3>Menu</h3>
                
                <ul>
                    <li><a href="about.php"><span class="glyphicon glyphicon-ok"></span> About us</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-ok"></span> Team</a></li>
                    <li><a href="careers.php"><span class="glyphicon glyphicon-ok"></span> Careers</a></li>
                     <li><a href="#"><span class="glyphicon glyphicon-ok"></span> Help & Support </a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-ok"></span> Privacy Policy </a></li>                 
                    <li><a href="#"><span class="glyphicon glyphicon-ok"></span> Offer Terms </a></li>                 
                    <li><a href="#"><span class="glyphicon glyphicon-ok"></span> Terms and conditions </a></li>                                      
                </ul>
        
            </div>
             <div class="col-md-3 col-sm-3">
                <h3>Contact us</h3>
               <p><span class="glyphicon glyphicon-map-marker"></span> <?php echo $getFoodSiteSettingsData['address']; ?></p>
               <p><span class="glyphicon glyphicon-phone-alt"></span> <a href="Tel:<?php echo $getFoodSiteSettingsData['mobile']; ?>"><?php echo $getFoodSiteSettingsData['mobile']; ?></a>  Toll Free (24*7) </p>


               <p><span class="glyphicon glyphicon-envelope"></span>  <a href="mailto::<?php echo $getFoodSiteSettingsData['email']; ?>"><?php echo $getFoodSiteSettingsData['email']; ?></a></p>
            </div>
            <div class="col-md-3 col-sm-3" id="newsletter">
                <h3>Newsletter</h3>
                <p>
                    Join our newsletter to keep be informed about offers and news.
                </p>
                <div id="message-newsletter_2">
                </div>
                <form method="post" action="" name="newsletter_2" id="newsletter_2">
                    <div class="form-group">
                        <input name="email" id="email" type="email" value="" placeholder="Your mail" class="form-control">
                    </div>
                    <input type="submit" value="Subscribe" class="btn_1" id="submit-newsletter_2">
                </form>
            </div>
         <!--   <div class="col-md-2 col-sm-3">
                <h3>Settings</h3>
                <div class="styled-select">
                    <select class="form-control" name="lang" id="lang">
                        <option value="English" selected>English</option>
                        <option value="French">French</option>
                        <option value="Spanish">Spanish</option>
                        <option value="Russian">Russian</option>
                    </select>
                </div>
                <div class="styled-select">
                    <select class="form-control" name="currency" id="currency">
                        <option value="USD" selected>USD</option>
                        <option value="EUR">EUR</option>
                        <option value="GBP">GBP</option>
                        <option value="RUB">RUB</option>
                    </select>
                </div>
            </div>-->
        </div><!-- End row -->
        <div class="row">
            <div class="col-md-12">
                <div id="social_footer">
                    <ul>
                        <li><a href="<?php echo $getFoodSiteSettingsData['fb_link']; ?>" target="_blank"><i class="icon-facebook"></i></a></li>
                        <li><a href="<?php echo $getFoodSiteSettingsData['twitter_link']; ?>" target="_blank"><i class="icon-twitter"></i></a></li>
                        <li><a href="<?php echo $getFoodSiteSettingsData['gplus_link']; ?>" target="_blank"><i class="icon-google"></i></a></li>
                        <li><a href="<?php echo $getFoodSiteSettingsData['inst_link']; ?>" target="_blank"><i class="icon-instagram"></i></a></li>
                        <!-- <li><a href="<?php echo $getFoodSiteSettingsData['email']; ?>"><i class="icon-pinterest"></i></a></li>
                        <li><a href="<?php echo $getFoodSiteSettingsData['email']; ?>"><i class="icon-vimeo"></i></a></li>
                        <li><a href="<?php echo $getFoodSiteSettingsData['email']; ?>"><i class="icon-youtube-play"></i></a></li> -->
                    </ul>
                    <p>
                        Designed By <a href="https://www.lanciussolutions.com" target="_blank"> Lancius IT Solutions</a>.
                    </p>
                </div>
            </div>
        </div><!-- End row -->
    </div><!-- End container -->