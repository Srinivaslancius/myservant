<?php include_once 'admin_includes/main_header.php'; ?>
<?php $getVendorsData = getAllDataWithActiveRecent('food_vendors');$i=1; ?>
     <div class="site-content">
        <div class="panel panel-default panel-table">
          <div class="panel-heading">
            <a href="add_vendors.php" style="float:right">Add Vendors</a>
            <h3 class="m-t-0 m-b-5">Vendors</h3>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered dataTable" id="table-1">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Vendor Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Created Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = $getVendorsData->fetch_assoc()) { ?>
                  <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $row['vendor_name'];?></td>
                    <td><?php echo $row['vendor_email'];?></td>
                    <td><?php echo $row['vendor_mobile'];?></td>
                    <td><?php echo $row['created_at'];?></td>
                    <td><?php if ($row['lkp_status_id']==0) { echo "<span class='label label-outline-success check_active open_cursor' data-incId=".$row['id']." data-status=".$row['lkp_status_id']." data-tbname='vendors'>Active</span>" ;} else { echo "<span class='label label-outline-info check_active open_cursor' data-status=".$row['lkp_status_id']." data-incId=".$row['id']." data-tbname='vendors'>In Active</span>" ;} ?></td>
                   <td><a href="edit_vendors.php?bid=<?php echo $row['id']; ?>"><i class="zmdi zmdi-edit"></i></a></td>
                    
                  </tr>
                  <?php  $i++; } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
   <?php include_once 'admin_includes/footer.php'; ?>
   <script src="js/tables-datatables.min.js"></script>