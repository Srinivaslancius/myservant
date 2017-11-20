<!DOCTYPE html>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include_once 'meta.php';?>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">
    
    <!-- Google web fonts -->
    <link href="https://fonts.googleapis.com/css?family=Gochi+Hand|Lato:300,400|Montserrat:400,400i,700,700i" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="css/base.css" rel="stylesheet">
        <link href="site_launch/css/style.css" rel="stylesheet">

    <!-- REVOLUTION SLIDER CSS -->
    <link href="layerslider/css/layerslider.css" rel="stylesheet">

</head>
    <style type="text/css">
        .message {
            color: #FF0000;
            text-align: center;
            width: 100%;
        }
         body {
     background-color: #f1f3f6;
 }
 /*  bhoechie tab */
 
 div.bhoechie-tab-container {
     z-index: 10;
     /* background-color: #ffffff; */
     padding: 0 !important;
     border-radius: 4px;
     -moz-border-radius: 4px;
     /* border: 1px solid #ddd; */
     margin-top: 20px;
     margin-left: 50px;
     /* -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
            box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
            -moz-box-shadow: 0 6px 12px rgba(0, 0, 0, .175); */
     background-clip: padding-box;
     opacity: 0.97;
     filter: alpha(opacity=97);
 }
 
 div.bhoechie-tab-menu {
     padding-right: 0;
     padding-left: 0;
     padding-bottom: 0;
     min-height: 400px;
     background-color: white;
     border-radius: 4px;
     -webkit-box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .08);
     box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .08);
     -moz-box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .08);
 }
 
 div.bhoechie-tab-menu .list-group-item.sub p {
     margin-left: 32px;
 }
 
 div.bhoechie-tab-menu .list-group-item .fa {
     margin-right: 20px;
 }
 
 div.bhoechie-tab-menu div.list-group {
     margin-bottom: 0;
 }
 
 div.bhoechie-tab-menu div.list-group>a {
     color: rgb(99, 98, 98);
 }
 
 div.bhoechie-tab-menu div.list-group>a .glyphicon,
 div.bhoechie-tab-menu div.list-group>a .fa {
     color: #f26226;
 }
 
 div.bhoechie-tab-menu div.list-group>a:first-child {
     border-top-right-radius: 0;
     -moz-border-top-right-radius: 0;
 }
 
 div.bhoechie-tab-menu div.list-group>a:last-child {
     border-bottom-right-radius: 0;
     -moz-border-bottom-right-radius: 0;
 }
 
 div.bhoechie-tab-menu div.list-group>a.active,
 div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
 div.bhoechie-tab-menu div.list-group>a.active .fa {
     background-color: #f26226;
     background-image: #f26226;
     color: #ffffff;
 }
 
 div.bhoechie-tab-content {
     background-color: #ffffff;
     padding: 25px;
 }
 
 div.bhoechie-tab-content .panel .panel-heading p {
     color: rgb(71, 71, 71);
     font-size: 11px;
     font-weight: lighter;
     margin: 0;
 }
 
 div.bhoechie-tab div.bhoechie-tab-content {
     min-height: 400px;
     border-radius: 4px;
     -webkit-box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .08);
     box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .08);
     -moz-box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .08);
 }
 
 div.bhoechie-tab div.bhoechie-tab-content:not(.active) {
     display: none;
 }
 
 .has-float-label .form-control:placeholder-shown:not(:focus)+* {
     font-size: 110% !important;
     top: 0.6em !important;
 }
 .btn-default {
    color: #fff;
    background-color: #f26226;
    border-color: #f26226;
}
.list-group-item.active, .list-group-item.active:focus, .list-group-item.active:hover {
    z-index: 2 !important;
    color: #fff !important;
    background-color: #f26226 !important;
    border-color: #f26226 !important;
}
    </style>
</head>

<body>

<!--[if lte IE 8]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p>
<![endif]-->

    

    <div class="layer"></div>
    <!-- Mobile menu overlay mask -->

    <!-- Header================================================== -->
    <header>
        <?php include_once './top_header.php';?>
        <!-- End top line-->

        <div class="container">
                    <?php include_once './menu.php';?>
        </div>
        <!-- container -->
                
        </header>
    <!-- End Header -->
<?php 
    if(isset($_POST["submit"]) && $_POST["submit"]!="") {
        $uid = $_SESSION["user_login_session_id"];
        $changePass = "SELECT * FROM users WHERE id = '$uid'";
        $changePassword = $conn->query($changePass);
        $getUserPwd = $changePassword->fetch_assoc();

        if($_POST['currentPassword'] == decryptPassword($getUserPwd['user_password'])){
            $encNewPass = encryptPassword($_POST["confirmPassword"]);
            $sql1 = "UPDATE users SET user_password = '$encNewPass' WHERE  id = '$uid'";
            if($conn->query($sql1) === TRUE){                
                echo "<script type='text/javascript'>window.location='change_password.php?succ=log-success'</script>";
            }               
        } else {               
           header('Location: change_password.php?err=log-fail');
        }
    }
?>
<main>
    <div class="container-fluid page-title">
            <div class="row">
                <img src="img/slides/slide_1.jpg" class="img-responsive">
            </div>
    </div>
        <?php if(isset($_GET['succ']) && $_GET['succ'] == 'log-success' ) {  ?>
                <div class="col-sm-3"></div>
                <div class="col-sm-6 alert alert-success" style="top:10px; display:block">
                  <strong>Success!</strong> Your Password Changed Successfully.
                </div>
                <div class="col-sm-3"></div>
            <?php }?>
        <?php if(isset($_GET['err']) && $_GET['err'] == 'log-fail' ) {  ?>
                <div class="col-sm-3"></div>
                <div class="col-sm-6 alert alert-danger" style="top:10px; display:block">
                  <strong>Failed!</strong> Current Password Is Not Correct.
                </div>
                <div class="col-sm-3"></div>
        <?php }?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-xs-4">
                <div class="bhoechie-tab-menu">
                    <div class="list-group">
                        <a href="my_dashboard.php" class="list-group-item active">
                            <h5><b><i class="fa fa-first-order" aria-hidden="true"></i>MY ORDERS</b><i class="fa fa-chevron-right pull-right"></i></h5>
                        </a>
                        <a href="my_dashboard.php" class="list-group-item">
                            <h5><b><i class="fa fa-user-circle-o"></i>ACCOUNT SETTINGS</b></h5>
                        </a>
                        <a href="my_dashboard.php" class="list-group-item sub">
                            <p>Personal Information</p>
                        </a>
                        <a href="change_password.php" class="list-group-item sub"><p>Change Password</p></a>
                    </div>    
                </div>
            </div>
                <!-- Change password section -->
                <div class="bhoechie-tab-content">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4><b>Change Password</b></h4>
                                </div>
                                <div class="col-sm-12">
                                    <form autocomplete="off" method="POST">
                                        
                                        <div class="form-group has-float-label">
                                            <input type="password" name="currentPassword" required class="form-control" id="cur-password" placeholder="*******" autocomplete="off">
                                            <label for="cur-password">Current password</label>
                                        </div>
                                        <div class="form-group has-float-label">
                                            <input type="password" name="newPassword" required class="form-control" id="user_password" placeholder="*********" autocomplete="off">
                                            <label for="new-password">New password</label>
                                        </div>
                                        <div class="form-group has-float-label">
                                            <input type="password" name="confirmPassword" required class="form-control" id="confirm_password" placeholder="********" autocomplete="off"/ onChange="checkPasswordMatch();">
                                            <label for="new-repassword">Repeat password</label>
                                        </div>
                                        <div id="divCheckPasswordMatch" style="color:red"></div>
                                        <input type="submit" value="Submit" name="submit" class="btn btn-primary" style="background-color:#56529c">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </main>
    <!-- End main -->

    <footer class="revealed">
            <?php include_once 'footer.php';?>
    </footer><!-- End footer -->

        <!-- Search Menu -->
    
    <!-- Common scripts -->
    <script src="../cdn-cgi/scripts/78d64697/cloudflare-static/email-decode.min.js"></script><script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/common_scripts_min.js"></script>
    <script src="js/functions.js"></script>

    <!-- Specific scripts -->
    <script src="layerslider/js/greensock.js"></script>
    <script src="layerslider/js/layerslider.transitions.js"></script>
    <script src="layerslider/js/layerslider.kreaturamedia.jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            'use strict';
            $('#layerslider').layerSlider({
                autoStart: true,
                responsive: true,
                responsiveUnder: 1280,
                layersContainer: 1170,
                skinsPath: 'layerslider/skins/'
                    // Please make sure that you didn't forget to add a comma to the line endings
                    // except the last line!
            });
        });
    </script>
        <script type="text/javascript">
            function checkPasswordMatch() {
                var password = $("#user_password").val();
                var confirmPassword = $("#confirm_password").val();
                if (confirmPassword != password) {
                    $("#divCheckPasswordMatch").html("Passwords do not match!");
                    $("#user_password").val("");
                    $("#confirm_password").val("");
                } else {
                    $("#divCheckPasswordMatch").html("");
                }
            }
        </script>
</body>

</html>