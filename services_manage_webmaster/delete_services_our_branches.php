<?php include_once 'admin_includes/main_header.php'; ?>
<?php
$id = $_GET['branchid'];
$qry = "DELETE FROM services_our_branches WHERE id ='$id'";
$result = $conn->query($qry);
if(isset($result)) {
   echo "<script>alert('Our Branch Deleted Successfully');window.location.href='services_our_branches.php';</script>";
} else {
   echo "<script>alert('Our Branch Not Deleted');window.location.href='services_our_branches.php';</script>";
}
?>