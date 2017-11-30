<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div id="top_line">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-3 col-sm-3 col-xs-3">
					<ul id="top_links">

					 <li><span class="icon-location" data-toggle="popover" data-placement="bottom" data-content="TOP SEARCHED: <br> Vijayawada, Hyderabad, Karimnagar, Chennai, Warangal, Pune, Bangalore" style="cursor:pointer">Vijayawada</span></li>

					 <li><form>
					 <select class="language" style="cursor:pointer">
			            <option value="" style="color:black">English</option>
			            <option value="" style="color:black">Hindi</option>
			            <option value="" style="color:black">Telugu</option>
			        </select>
					</form></li>
					</ul>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-3">
					</div>
					<div class="col-md-5 col-sm-5 col-xs-5">
						<ul id="top_links">
						<i class="icon-phone"></i><strong><a href="Tel:<?php echo $getSiteSettingsData['mobile']; ?>" style="color:white;"><?php echo $getSiteSettingsData['mobile']; ?></a></strong>
							<li>
								<?php if(isset($_SESSION['user_login_session_id']) && $_SESSION['user_login_session_id']!='') { ?>
									<a href="my_dashboard.php"><?php echo $_SESSION['user_login_session_name']; ?> </a> &nbsp;|&nbsp;<a href="logout.php"> Logout </a>
								<?php } else { ?>
					                <a href="login.php" >Sign in</a>
					        </li>
                            <li><a href="login.php" id="access_link">Register</a></li>
								<?php } ?>
						</ul>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-1">
					</div>
				</div>
				<!-- End row -->
			</div>
			<!-- End container-->
		</div>
		
		<script type="text/javascript">
$(document).ready(function(){
    $('[data-toggle="popover"]').popover({
        html: true,
        template: '<div class="popover"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-body"><div class="form-group"><input type="text" class="form-control" id="email" placeholder="ENTER YOUR CITY" style="height:30px" required></div></div><div class="popover-content"></div><div class="popover-footer"><a href="index.php" class="btn btn-info btn-sm">Submit</a></div></div>'
    });
    
    // Custom jQuery to hide popover on click of the close button
    $(document).on("click", ".popover-footer .btn" , function(){
        $(this).parents(".popover").popover('hide');
    });
});
</script>
<script type="text/javascript">
$(".language").change(function(){
	window.location = "index.php";   
});
</script>