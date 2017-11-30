<?php include_once 'admin_includes/main_header.php';?>
<?php $getServiceOrderData = getAllData('services_orders'); $i=1; ?>
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
                    <th>Name</th>
                    <th>Service Name</th>
                    <th>Service Price</th>
                    <th>Address</th>
                    <td>Status</td>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = $getServiceOrderData->fetch_assoc()) { ?>
                  <?php $getServicenamesData = getAllDataWhereWithActive('services_group_service_names','id',$row['service_id']); 
                  $getServicenames = $getServicenamesData->fetch_assoc();?>                  
                  <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $row['order_id'];?></td>
                    <td><?php echo $row['first_name'];?></td>
                    <td><?php echo $getServicenames['group_service_name'];?></td>
                    <td><?php echo $row['service_price'];?></td>
                    <td><?php echo $row['address'];?></td>
                    <td><?php if ($row['lkp_status_id']==0) { echo "<span class='label label-outline-success check_active open_cursor' data-incId=".$row['id']." data-status=".$row['lkp_status_id']." data-tbname='services_orders'>Active</span>" ;} else { echo "<span class='label label-outline-info check_active open_cursor' data-status=".$row['lkp_status_id']." data-incId=".$row['id']." data-tbname='services_orders'>In Active</span>" ;} ?></td>
                    <td> <a href="edit_services_orders.php?order_id=<?php echo $row['id']; ?>"><i class="zmdi zmdi-edit"></i></a> &nbsp;<a href="#"><i class="zmdi zmdi-eye zmdi-hc-fw" data-toggle="modal" data-target="#<?php echo $row['id']; ?>" class=""></i></a></td>
                    <!-- Open Modal Box  here -->
                    <div id="<?php echo $row['id']; ?>" class="modal fade" tabindex="-1" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content animated flipInX">
                          <div class="modal-header bg-success">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">
                                <i class="zmdi zmdi-close"></i>
                              </span>
                            </button>
                            <center><h4 class="modal-title">Order Information</h4></center>
                          </div>
                          <div class="modal-body" id="modal_body">
                            <div class="row">
                              <div class="col-sm-2"></div>
                              <div class="col-sm-4">Name:</div>
                              <div class="col-sm-6"><?php echo $row['first_name'];?></div>
                            </div>
                            <div class="row">
                              <div class="col-sm-2"></div>
                              <div class="col-sm-4">Last Name:</div>
                              <div class="col-sm-6"><?php echo $row['last_name'];?></div>
                            </div>
                            <div class="row">
                              <div class="col-sm-2"></div>
                              <div class="col-sm-4">Date:</div>
                              <div class="col-sm-6"><?php echo $row['created_at'];?></div>
                            </div>
                            <div class="row">
                              <div class="col-sm-2"></div>
                              <div class="col-sm-4">Order ID</div>
                              <div class="col-sm-6"><?php echo $row['order_id'];?></div>
                            </div>
                            <div class="row">
                              <div class="col-sm-2"></div>
                              <div class="col-sm-4">Admin User Type:</div>
                              <div class="col-sm-6"><?php echo $getServicenames['group_service_name'];?></div>
                            </div>
                            <div class="row">
                              <div class="col-sm-2"></div>
                              <div class="col-sm-4">Status:</div>
                              <div class="col-sm-6"><?php if($row['lkp_status_id'] == 0 ){ echo "Active";} else{ echo "InActive";}?></div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-success">Close</button>
                            <style>
                              #modal_body{
                                font-size:14px;
                                padding-top:30px;
                                padding-left: 0px;
                                font-family:Roboto,sans-serif;
                              }
                            </style>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- End Modal Box  here -->
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