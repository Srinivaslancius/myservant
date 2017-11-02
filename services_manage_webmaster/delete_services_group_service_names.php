<?php include_once 'admin_includes/main_header.php'; ?>
<?php
$id = $_GET['gsnid'];
$qry = "DELETE FROM services_group_service_names WHERE id ='$id'";
$result = $conn->query($qry);
if(isset($result)) {
   echo "<script>alert('Services Group Name Deleted Successfully');window.location.href='services_group_service_names.php';</script>";
} else {
   echo "<script>alert('Services Group Name Not Deleted');window.location.href='services_group_service_names.php';</script>";
}
?>