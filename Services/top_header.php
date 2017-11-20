<div id="top_line">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-6"><i class="icon-phone"></i><strong><a href="Tel:<?php echo $getSiteSettingsData['mobile']; ?>" style="color:white;"><?php echo $getSiteSettingsData['mobile']; ?></a></strong>
					</div>

					<div class="col-md-6 col-sm-6 col-xs-6">
						<ul id="top_links">
							<li>
								<?php if(isset($_SESSION['user_login_session_id']) && $_SESSION['user_login_session_id']!='') { ?>
									<a href="my_dashboard.php"><?php echo $_SESSION['user_login_session_name']; ?> </a> &nbsp;|&nbsp;<a href="logout.php"> Logout </a>
								<?php } else { ?>
					                <a href="login.php" id="access_link">Sign in</a>
					        </li>
                            <li><a href="login.php" id="wishlist_link">Register</a></li>
								<?php } ?>
						</ul>
					</div>
				</div>
				<!-- End row -->
			</div>
			<!-- End container-->
		</div>