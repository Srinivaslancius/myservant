<?php include_once 'admin_includes/main_header.php';?>
<?php $getServiceOrders = getAllData('services_orders'); $i=1; ?>
     <div class="site-content">
        <div class="panel panel-default panel-table">
          <div class="panel-heading">
            <h3 class="m-t-0 m-b-5">Service Orders</h3>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered dataTable" id="table-1">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Service Name</th>
                    <th>Order Id</th>
                    <th>Order Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = $getServiceOrders->fetch_assoc()) { ?>
                  <tr>
                    <td><?php echo $i;?></td>
                    <?php $getServicenames = getAllDataWhere('services_group_service_names','id',$row['service_id']); 
                    $getServicenamesData = $getServicenames->fetch_assoc();?>
                    <td><?php echo $getServicenamesData['group_service_name'];?></td>
                    <td><?php echo $row['order_sub_id'];?></td>
                    <td><?php echo $row['order_price'];?></td>
                   <td><?php if($row['lkp_order_status_id'] == 1) { echo "Pending" ;} elseif($row['lkp_order_status_id'] == 2) { echo "Completed" ;} else { echo "Cancelled" ;} ?></td>
                   <td><a href="assign_to.php?assign_id=<?php echo $row['id']; ?>&subcat_id=<?php echo $row['sub_category_id'] ?>">Assign To</a></td>
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