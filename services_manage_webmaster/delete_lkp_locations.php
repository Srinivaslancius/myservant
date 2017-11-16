<?php include_once 'admin_includes/main_header.php'; ?>
<?php
$cityid = $_GET['cityid'];
$locationid = $_GET['locationid'];
$qry = "DELETE FROM lkp_locations WHERE lkp_city_id ='$cityid' AND id ='$locationid'";
$result = $conn->query($qry);
if(isset($result)) {
   echo "<script>alert('Data Deleted Successfully');window.location.href='lkp_locations.php';</script>";
} else {
   echo "<script>alert('Data Not Deleted');window.location.href='lkp_locations.php';</script>";
}
?>