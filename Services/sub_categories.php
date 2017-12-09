<?php include_once 'top_header.php'; ?>
<?php 
$id = $_GET['id'];
$getProjectsData = getDataFromTables('categories',$status=NULL,'id',$id,$activeStatus=NULL,$activeTop=NULL);
$getProjects  = $getProjectsData->fetch_assoc();
?>
<!-- Favicon -->
<link rel="shortcut icon" href="images/favicon.ico" />

<!-- bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<!--  Roboto font -->
<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet" />

<!-- mega menu -->
<link href="css/mega-menu/mega_menu.css" rel="stylesheet" type="text/css" />

<!-- font-awesome -->
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />

<!-- Flaticon -->
<link href="css/flaticon.css" rel="stylesheet" type="text/css" />

<!-- owl-carousel -->
<link href="css/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css" />

<!-- General style -->
<link href="css/general.css" rel="stylesheet" type="text/css" />

<!-- main style -->
<link href="css/style.css" rel="stylesheet" type="text/css" />

<!-- Style customizer -->
<link rel="stylesheet" type="text/css" href="#" data-style="styles" />
<link rel="stylesheet" type="text/css" href="css/style-customizer.css" />

</head>

<body>

<!--=================================
 preloader -->
 

<!--=================================
header -->

<header id="header" class="clean">
<div class="topbar dark">
 <?php include_once 'main_header.php'; ?>
</div>
 
<!--=================================
 mega menu -->

<div class="menu">  
  <!-- menu start -->
   <nav id="menu" class="mega-menu">
    <!-- menu list items container -->
    <section class="menu-list-items">
     <div class="container"> 
      <div class="row"> 
       <div class="col-lg-12 col-md-12"> 
        <!-- menu logo -->
       <?php include_once 'menu.php'; ?>
       </div>
      </div>
     </div>
    </section>
   </nav>
  <!-- menu end -->
 </div>
</header>

<!--=================================
 header -->


<!--=================================
 banner -->

<section class="inner-intro bg bg-fixed bg-overlay-black-70" style="background-image:url(<?php echo $base_url . 'uploads/category_images/'.$getProjects['category_image'] ?>);">
  <div class="container">
     <div class="row intro-title text-center">
           <div class="col-sm-12">
        <div class="section-title"><h1 class="title text-white"><?php echo $getProjects['category_name']?></h1></div>
           </div>
           <div class="col-sm-12">
             <ul class="page-breadcrumb">
                <li><a href="index.php"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-double-right"></i></li>
                <li><a href="javascript:void(0)">Projects</a> <i class="fa fa-angle-double-right"></i></li>
                <li><span><?php echo $getProjects['category_name']?></span> </li>
             </ul>
        </div>
     </div>
  </div>
</section>

<!--=================================
 banner -->



<!--=================================
 Page Section -->

<section class="content-box3 page-section-ptb pb-40">
      <?php 
      $subCat = "SELECT * FROM sub_categories WHERE category_id = '$id' AND status=0 ORDER BY id DESC";
      $res = $conn->query($subCat);
      $catNum = $res->num_rows;
      if($catNum!=0) {
        while($getSubCat = $res->fetch_assoc()){
      ?>
  <div class="container"><div class="row text-justify">
  <div class="col-sm-12"><div class="section-title text-center">
      <h2 class="title"><?php echo $getSubCat['sub_category_name']; ?></h2>
  </div></div>

   <?php /*$subCat = "SELECT * FROM sub_sub_categories WHERE sub_category_id = '".$getSubCat['id']."' AND category_id = '$id' ";
        $res1 = $conn->query($subCat);
      while($getSubSubCat = $res1->fetch_assoc()){*/
  ?>
  <!-- <div class="col-sm-12"><div class="section-title text-left">
    <h4 class="title"><?php echo $getSubSubCat['sub_sub_category_name']; ?></h4>
  </div></div> -->
  <?php 
        $getPro = "SELECT * FROM projects WHERE sub_category_id = '".$getSubCat['id']."' AND category_id = '".$id."' AND status = 0";
        $res2 = $conn->query($getPro);
        while($getProjects = $res2->fetch_assoc()){
        $lid= $getProjects['location_id'];
  ?>
  <div class="col-sm-3">
    <div class="about mb-40">
          <div class="about-image clearfix">

<a class="button link" href="display_project_view.php?id=<?php echo $getProjects['id'];?>&cid=<?php echo $id;?>"><img class="img-responsive" src="<?php echo $base_url . 'uploads/projects_images/'.$getProjects['images'] ?>" alt="" style="width:263px; height:185px"></a></div>
          <div class="about-details">
            
            <h5 class="title"><a href="display_project_view.php?id=<?php echo $getProjects['id'];?>&cid=<?php echo $id;?>"><?php echo $getProjects['project_name'];?>, 
              <small><?php $sql = "SELECT * FROM lkp_locations WHERE id = '$lid'";
              $result = $conn->query($sql);
              $row = $result->fetch_assoc(); echo $row['location_name'];?></small></a></h5>
            <div class="about-des"><?php echo substr($getProjects['description'], 0, 250);?></div>
             <a class="button link" href="display_project_view.php?id=<?php echo $getProjects['id'];?>&cid=<?php echo $id;?>"><span>Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></span></a> 
          </div>                
    </div>
  </div>
  <?php }  //}?>
  
</div></div>
<?php } }else { ?>
  <div><p style="text-align:center">No Projects Found</p></div>
<?php } ?>
</section>

<!--=================================
footer -->
 
 <footer class="footer dark-bg page-section-pt pb-0">
  <?php include_once 'footer.php'; ?>
 </footer>

 <!--=================================
footer -->

<!--=================================
Color Customizer --> 

<div id="back-to-top"><a class="top arrow" href="#top"><i class="fa fa-chevron-up"></i></a></div>

<!--=================================
 jquery -->


<!-- jquery  -->
<script type="text/javascript" src="js/jquery.min.js"></script>

<!-- bootstrap -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<!-- mega-menu -->
<script type="text/javascript" src="js/mega-menu/mega_menu.js"></script>

<!-- owl-carousel -->
<script type="text/javascript" src="js/owl-carousel/owl.carousel.min.js"></script>

<!-- style customizer  -->
<script type="text/javascript" src="js/style-customizer.js"></script>

<!-- custom -->
<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>