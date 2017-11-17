<?php 
error_reporting(1);
if(isset($_POST['sign_in']))  { 
    //Login here
    $user_email = $_POST['login_email'];
    $user_password = encryptPassword($_POST['login_password']);
    $getLoginData = userLogin($user_email,$user_mobile,$user_password);
    //Set variable for session
    if($getLoggedInDetails = $getLoginData->fetch_assoc()) {
        $_SESSION['user_login_session_id'] =  $getLoggedInDetails['id'];
        $_SESSION['user_login_session_name'] = $getLoggedInDetails['user_full_name'];
        $_SESSION['user_login_session_email'] = $getLoggedInDetails['user_email'];
        header('Location: index.php');
    } else {
    	echo "<script>alert('invalid username/password.  Please try again');window.location='index.php';</script>";
    }
}
?>
<div id="top_line">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-6"><i class="icon-phone"></i><strong><a href="Tel:<?php echo $getSiteSettingsData['mobile']; ?>" style="color:white;"><?php echo $getSiteSettingsData['mobile']; ?></a></strong>
					</div>

					<div class="col-md-6 col-sm-6 col-xs-6">
						<ul id="top_links">
							<li>
							<div class="dropdown dropdown-access">
								<?php if(isset($_SESSION['user_login_session_id']) && $_SESSION['user_login_session_id']!='') { ?>
									<a href="index.php"><?php echo $_SESSION['user_login_session_name']; ?> </a> &nbsp;|&nbsp;<a href="logout.php"> Logout </a>
								<?php } else { ?>
					                <a href="login.php" class="dropdown-toggle" data-toggle="dropdown" id="access_link">Sign in</a>
					                
					        </li>
                            <li><a href="login.php" id="wishlist_link">Register</a></li>
										<?php } ?>
								</div>
								<!-- End Dropdown access -->
							
                                                        
						</ul>
					</div>
				</div>
				<!-- End row -->
			</div>
			<!-- End container-->
		</div>