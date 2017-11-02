<?php include_once 'admin_includes/main_header.php'; ?>
<?php
$id = $_GET['gid'];
$qry = "DELETE FROM services_groups WHERE id ='$id'";
$result = $conn->query($qry);
if(isset($result)) {
   echo "<script>alert('Services Group Deleted Successfully');window.location.href='services_groups.php';</script>";
} else {
   echo "<script>alert('Services Group Not Deleted');window.location.href='services_groups.php';</script>";
}
?>