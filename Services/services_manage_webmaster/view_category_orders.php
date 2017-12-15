<?php include_once 'admin_includes/main_header.php';
$order_id = $_GET['order_id'];
    $serviceOrders = "SELECT * FROM services_orders WHERE order_id = '$order_id' GROUP BY category_id ORDER BY id DESC"; 
    $getServiceOrderData = $conn->query($serviceOrders);
    $i=1;
?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  p{
  font-size:13px;
  line-height:17px;
 }
 .body1{
  padding-left: 30px;
 }
  .row{
  margin-bottom:20px !important;}
  </style>
     <div class="site-content">
        <div class="row">
          <div class="col-md-12">
            <?php  while ($row = $getServiceOrderData->fetch_assoc()) { ?>
            <div class="panel-group" id="<?php echo $row['category_id']; ?>" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#<?php echo $row['category_id']; ?>" href="#accordion-<?php echo $row['category_id']; ?>" aria-expanded="true">
                      <i class="zmdi zmdi-chevron-down"></i> <?php $getCatname = getIndividualDetails('services_category','id',$row['category_id']); echo $getCatname['category_name']; ?>
                    </a>
                  </h4>
                </div>
                <div id="accordion-<?php echo $row['category_id']; ?>" class="panel-collapse collapse <?php if($i==1){ echo "in"; } ?>" role="tabpanel">
                  <div class="panel-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered dataTable" id="table-3">
                        <thead>
                          <tr>
                            <th>Cart Id</th>                           
                            <!-- <th>User Name</th> -->
                            <th>Service Name</th>
                            <th>Order Price</th> 
                            <th>Order Status</th>
                            <th>Payment Status</th>
                            <th>Order Date</th>
                            <th>Assign To</th>
                            <th>Order Created</th>                            
                          </tr>
                        </thead>
                        <tbody>
                          <?php $category_id = $row['category_id']; 
                                $getServiceOrders1 = "SELECT * FROM services_orders WHERE order_id = '$order_id' AND category_id = '$category_id' AND lkp_payment_status_id != 3 AND lkp_order_status_id != 3 ORDER BY id DESC";
                            $getServiceOrders = $conn->query($getServiceOrders1); 
                          ?>
                            <?php while ($row = $getServiceOrders->fetch_assoc()) { ?>
                                <tr>
                                  <?php $getServicenames = getAllDataWhere('services_group_service_names','id',$row['service_id']); 
                                    $getServicenamesData = $getServicenames->fetch_assoc();?>
                                  <td><?php echo $row['order_sub_id'];?></a></td>
                                  <!-- <td><?php echo $row['first_name'] . $row['last_name'];?></td>-->
                                  <td><?php echo $getServicenamesData['group_service_name'];?></td>
                                   <td><?php echo $row['order_price'];?></td>
                                  <td><?php $orderStatus = getIndividualDetails('lkp_order_status','id',$row['lkp_order_status_id']); echo $orderStatus['order_status']; ?></td>
                                  <td><?php $orderPaymentStatus = getIndividualDetails('lkp_payment_status','id',$row['lkp_payment_status_id']); echo $orderPaymentStatus['payment_status']; ?></td>
                                  <td><?php echo $row['created_at'];?></td> 
                                  <td><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#<?php echo $row['id'];?>">Assign To</button></td>
                                 <?php if($row['lkp_order_status_id'] == 2 && $row['lkp_payment_status_id'] == 1) { ?>
                                 <td><a href="../../uploads/generate_invoice/<?php echo $row['order_sub_id']; ?>.pdf" target="_blank"><i class="zmdi zmdi-local-printshop"></i></a></td>
                                 <?php } else { ?>
                                  <td>--</td>
                                  <?php } ?>

                                  <!-- Modal -->
                                  <div class="modal fade" id="<?php echo $row['id']?>" role="dialog">
                                    <div class="modal-dialog modal-lg" style="width:80%">
                                      <!-- Modal content-->
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title" style="text-align:center">Service Orders</h4>
                                        </div>
                                        <div class="body1">
                                          <div class="row">
                                            <div class="col-sm-3">
                                              <p>Name: <?php echo $row['first_name'];?></p>
                                              <p>Email: <?php echo $row['email'];?></p>
                                              <p>Mobile: <?php echo $row['mobile'];?></p>
                                              <p>Address: <?php echo $row['address'];?></p>
                                            </div>
                                            <div class="col-sm-3">
                                              <?php $getCategories = getAllDataWhere('services_category','id',$row['category_id']); 
                                              $getCategoriesData = $getCategories->fetch_assoc();?>
                                              <p>Category: <?php echo $getCategoriesData['category_name']; ?> </p>
                                              <?php $getSubCategories = getAllDataWhere('services_sub_category','id',$row['sub_category_id']); 
                                              $getSubCategoriesData = $getSubCategories->fetch_assoc();?>
                                              <p>Sub Category: <?php echo $getSubCategoriesData['sub_category_name']; ?></p>
                                              <?php $getGroups = getAllDataWhere('services_groups','id',$row['group_id']); 
                                              $getGroupsData = $getGroups->fetch_assoc();?>
                                              <p>Group: <?php echo $getGroupsData['group_name']; ?> </p>
                                              <?php $getServiceNames = getAllDataWhere('services_group_service_names','id',$row['service_id']); 
                                              $getServiceNamesData = $getServiceNames->fetch_assoc();?>
                                              <p>Service: <?php echo $getServiceNamesData['group_service_name']; ?></p>
                                            </div>
                                            <div class="col-sm-3">
                                              <p>Service price: <?php echo $row['service_price']; ?></p>
                                              <p>Service Quantity: <?php echo $row['service_quantity']; ?></p>
                                              <p>Service Selected Date: <?php echo $row['service_selected_date']; ?></p>
                                              <?php $getPaymentMethod = getAllDataWhere('lkp_payment_types','id',$row['payment_method']); 
                                              $getPaymentMethodData = $getPaymentMethod->fetch_assoc();?>
                                              <p>Payment Method: <?php echo $getPaymentMethodData['status']; ?></p>
                                            </div>
                                            <div class="col-sm-3">
                                              <p>Order Id: <?php echo $row['order_id']; ?></p>
                                              <p>Sub Order Id: <?php echo $row['order_sub_id']; ?></p>
                                              <?php $getorderStatus = getAllDataWhere('lkp_order_status','id',$row['lkp_order_status_id']); 
                                              $getorderStatusData = $getorderStatus->fetch_assoc();?>
                                              <p>Order Status: <?php echo $getorderStatusData['order_status']; ?></p>
                                              <?php $getPaymentStatus = getAllDataWhere('lkp_payment_status','id',$row['lkp_payment_status_id']); 
                                              $getPaymentStatusData = $getPaymentStatus->fetch_assoc();?>
                                              <p>Payment Status: <?php echo $getPaymentStatusData['payment_status']; ?></p>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <form method="post" action="edit_services_orders.php">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-6">
                                              <div class="form-group">
                                                <input type="hidden" name="id" value="<?php echo $row['id'];?>" >
                                                <input type="hidden" name="order_id" value="<?php echo $row['order_id'];?>" >
                                                <input type="hidden" name="order_total" value="<?php echo $row['order_total'];?>">
                                                <input type="hidden" name="service_price_type_id" value="<?php echo $row['service_price_type_id'];?>">
                                                <label for="sel1">Choose Service Provider</label>
                                                <?php $getServiceOrdersData1 = "SELECT * FROM services_orders WHERE id = '".$row['id']."' AND sub_category_id = '".$row['sub_category_id']."'"; $getServiceOrdersData2 = $conn->query($getServiceOrdersData1);
                                                  $getServiceOrdersData3 = $getServiceOrdersData2->fetch_assoc(); 
                                                ?>
                                                <select name="assign_service_provider_id" class="custom-select" data-error="This field is required." required>
                                                  <option value="">Select Service Provider</option>
                                                  <?php $getServiceProvider = "SELECT spr.id,spr.name,spr.lkp_status_id FROM service_provider_registration spr LEFT JOIN service_provider_business_registration spb ON spr.id = spb.service_provider_registration_id LEFT JOIN service_provider_personal_registration spp ON spr.id = spp.service_provider_registration_id WHERE spr.lkp_status_id=0 AND ( spb.sub_category_id = '".$row['sub_category_id']."' OR spp.sub_category_id = '".$row['sub_category_id']."'  )";
                                                  $getServiceProviderNames = $conn->query($getServiceProvider); 
                                                  while($getServiceProviderData = $getServiceProviderNames->fetch_assoc()) { ?>
                                                  <option <?php if($getServiceProviderData['id'] == $getServiceOrdersData3['assign_service_provider_id']) { echo "Selected"; } ?> value="<?php echo $getServiceProviderData['id']; ?>"><?php echo $getServiceProviderData['name']; ?></option>
                                                  <?php } ?>
                                                </select>
                                                <?php if($getServiceOrdersData3['service_price_type_id'] == 1) { ?>
                                                <label for="usr">Order Price</label>
                                                <input type="text" readonly name="order_price" class="form-control" id="form-control-2" placeholder="Service Price" data-error="Please enter Service Price." value="<?php echo $getServiceOrdersData3['order_price'];?>">
                                                <?php } else { ?>
                                                <label for="usr">Order Price</label>
                                                <input type="text" name="order_price" class="form-control valid_price_dec" id="form-control-2" placeholder="Service Price" data-error="Please enter Service Price." required value="<?php echo $getServiceOrdersData3['order_price'];?>">
                                                <?php } ?>

                                                <?php $getPaymentStatus = getAllData('lkp_payment_status');?>
                                                <label for="sel1">Choose Your Payment Status</label>
                                                <select id="form-control-3" name="lkp_payment_status_id" class="custom-select" data-error="This field is required." required>
                                                  <option value="">Select Payment status</option>
                                                  <?php while($row = $getPaymentStatus->fetch_assoc()) {  ?>
                                                  <option <?php if($row['id'] == $getServiceOrdersData3['lkp_payment_status_id']) { echo "Selected"; } ?> value="<?php echo $row['id']; ?>"><?php echo $row['payment_status']; ?></option>
                                                  <?php } ?>
                                                </select>

                                                <?php $getStatus = getAllData('lkp_order_status');?>
                                                <label for="sel1">Choose Your Order Status</label>
                                                <select id="form-control-3" name="lkp_order_status_id" class="custom-select" data-error="This field is required." required>
                                                  <option value="">Select Order status</option>
                                                  <?php while($row = $getStatus->fetch_assoc()) {  ?>
                                                      <option <?php if($row['id'] == $getServiceOrdersData3['lkp_order_status_id']) { echo "Selected"; } ?> value="<?php echo $row['id']; ?>"><?php echo $row['order_status']; ?></option>
                                                  <?php } ?>
                                                </select>
                                              </div>
                                              <button type="submit" name="assign" class="btn btn-primary btn-block">Submit</button>
                                            </div>
                                            <div class="col-sm-3"></div>
                                            </form>
                                          </div>
                                        </div>
                                        <div class="modal-footer"></div>
                                      </div>
                                    </div>
                                  </div>
                                </tr>
                            <?php } ?>
                        </tbody>
                
                      </table>
                    </div>
                  </div>
                </div>
              </div>              
            </div>
            <?php $i++; }  ?>
             
          </div>
          
        </div>
      </div>
   <?php include_once 'admin_includes/footer.php'; ?>
   <script src="js/tables-datatables.min.js"></script>