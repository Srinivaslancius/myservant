<?php

if(!empty($_POST['name_contact']))  {
    
    $name_contact = $_POST['name_contact'];
    $lastname_contact = $_POST['lastname_contact'];
    $email_contact = $_POST['email_contact'];
    $phone_contact = $_POST['phone_contact'];
    $message_contact = $_POST['message_contact'];

$dataem = $getFoodSiteSettingsData["contact_email"];
//$to = "srinivas@lanciussolutions.com";
$to = $dataem;
$subject = "Myservent - News Letter ";
$message = '';      
$message .= '<body>
    <div class="container" style=" width:50%;border: 5px solid #fe6003;margin:0 auto">
    <header style="padding:0.8em;color: white;background-color: #fe6003;clear: left;text-align: center;">
     <center><img src='.$base_url . "uploads/logo/".$getFoodSiteSettingsData["logo"].' class="logo-responsive"></center>
    </header>
    <article style=" border-left: 1px solid gray;overflow: hidden;text-align:justify; word-spacing:0.1px;line-height:25px;padding:15px">
        <h1 style="color:#fe6003">User Feedback Information.</h1>
        <h4>First Name: </h4><p>'.$name_contact.'</p>
        <h4>Last Name: </h4><p>'.$lastname_contact.'</p>
        <h4>Email: </h4><p>'.$email_contact.'</p>
        <h4>Mobile: </h4><p>'.$phone_contact.'</p>
        <h4>Message: </h4><p>'.$message_contact.'</p>
    </article>
    <footer style="padding: 1em;color: white;background-color: #fe6003;clear: left;text-align: center;">'.$getFoodSiteSettingsData['footer_text'].'</footer>
    </div>

    </body>';

//echo $message; die;

//$sendMail = sendEmail($to,$subject,$message,$email_contact);
$name = "My Servant";
$from = $email_contact;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";  
$headers .= 'From: '.$name.'<'.$from.'>'. "\r\n";
if(mail($to, $subject, $message, $headers)) {
    echo  "<script>alert('Thank You For Your feedback');window.location.href('contactus.php');</script>";
}

}
?>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <h3>About Us</h3>
               <p style="text-align:justify">What is Myservant.com Myservant.com (A Unit of CMR Enterprises Pvt Ltd) is one of the largest online food and grocery store in Vijayawada. With over 3500 products and we deal with over 250 brands What is Myservant.com Myservant.com (A Unit of CMR Enterprises Pvt Ltd)</p>
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