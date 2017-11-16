<?php 
error_reporting(1);
if(isset($_POST['sign_in']))  { 
    //Login here
    $user_email = $_POST['login_email'];
    $user_password = encryptPassword($_POST['login_password']);
    $sql = "SELECT * FROM users WHERE (user_email = '$user_email' OR user_mobile = '$user_email') AND user_password = '$user_password'";
    $result = $conn->query($sql);
    //Set variable for session
    if($row = $result->fetch_assoc()) {
        $_SESSION['user_login_session_id'] =  $row['id'];
        $_SESSION['user_login_session_name'] = $row['user_full_name'];
        $_SESSION['user_login_session_email'] = $row['user_email'];
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
					                <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="access_link">Sign in</a>
					                <div class="dropdown-menu">
										<div class="row">
											<div class="col-md-6 col-sm-6 col-xs-6">
												<a href="#" class="bt_facebook">
													<i class="icon-facebook"></i>Facebook </a>
											</div>
											<div class="col-md-6 col-sm-6 col-xs-6">
												<a href="#" class="bt_paypal">
													<i class="icon-google"></i>Google</a>
											</div>
										</div>
										<div class="login-or">
											<hr class="hr-or">
											<span class="span-or">or</span>
										</div>
										<form action="" method="post">
										<div class="form-group">
											<input type="text" name="login_email" class="form-control" id="inputUsernameEmail" placeholder="Email or Phone" required>
										</div>
										<div class="form-group">
											<input type="password" name="login_password" class="form-control" id="inputPassword" placeholder="Password"required>
										</div>
										<a id="forgot_pw" href="#">Forgot password?</a>
										<input type="submit" name="sign_in" value="Sign in" id="Sign_in" class="button_drop">
										<input type="submit" name="Sign_up" value="Sign up" id="Sign_up" class="button_drop outline">
										</form>
									</div>
					        </li>
                            <li><a href="#" id="wishlist_link">Register</a></li>
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