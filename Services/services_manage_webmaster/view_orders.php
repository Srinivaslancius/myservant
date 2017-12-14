<?php include_once 'admin_includes/main_header.php';
    $serviceOrders = "SELECT * FROM services_orders GROUP BY order_id ORDER BY id DESC"; 
    $getServiceOrderData = $conn->query($serviceOrders);
    $i=1;
?>
     <div class="site-content">
        <div class="panel panel-default panel-table">
          <div class="panel-heading">
            <h3 class="m-t-0 m-b-5">Orders</h3>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered dataTable" id="table-1">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Order ID</th>
                    <th>User Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Order Total</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = $getServiceOrderData->fetch_assoc()) { ?>              
                  <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $row['order_id'];?></td>
                    <td><?php echo $row['first_name'];?></td>
                    <td><?php echo $row['mobile'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['order_total'];?></td>
                    <td><a href="view_sub_orders.php?order_id=<?php echo $row['order_id']; ?>"><i class="zmdi zmdi-eye zmdi-hc-fw"  class=""></i></a></td>
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