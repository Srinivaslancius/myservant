<?php
error_reporting(0);
include_once('../../admin_includes/config.php');
include_once('../../admin_includes/common_functions.php');

$id = $_GET['id'];

$getOrders = "SELECT * FROM services_orders WHERE id='$id'";
$getOrdersData = $conn->query($getOrders);
$getOrdersData1 = $getOrdersData->fetch_assoc();

$getServiceNames = getAllDataWhere('services_group_service_names','id',$getOrdersData1['service_id']); 
$getServiceNamesData = $getServiceNames->fetch_assoc();

$getPaymentMethod = getAllDataWhere('lkp_payment_types','id',$getOrdersData1['payment_method']); 
$getPaymentMethodData = $getPaymentMethod->fetch_assoc();

if($getOrdersData1['lkp_order_status_id'] == 2 && $getOrdersData1['lkp_payment_status_id'] == 1) {

$content ='';

if($getOrdersData1['coupon_code'] == '') {
	$discount_money = 0;
} else {
	$discount_money = $getOrdersData1['discount_money'];
}

$content .='<!DOCTYPE html>
<html lang="en">
<head>
  <title>Invoice</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container" style="margin-top:20px;width:1000px;">         
  <table class="table" style="border:1px solid gray">
    <thead>
      <tr style="background-color:#f2f2f2">
        <th colspan="2"></th>
        <th colspan="2" style="padding-bottom:40px;padding-left:120px"><img src="img/logo2.png" class="logo-responsive" width="210px" height="100px;"></th>
		<th></th>
		<th colspan="2"><h3 style="color:#f26226">Invoice</h3>
		<p>Oreder Id: '.$getOrdersData1['order_sub_id'].'</p>
		<p>Created Date:  '.$getOrdersData1['delivery_date'].'</p>
		</th>	
      </tr>
    </thead>
    <tbody>
      <tr>     
        <td colspan="2"></td>
        <td colspan="2" style="padding-left:150px"><h4 style="color:#f26226">Order Details</h4></td>
		<td colspan="3"></td>
      </tr>
      <tr  style="border-top:0px">
        <td></td>
        <td colspan="2"><p style="color:#f26226">Billing Address</p>
		<p>'.$getOrdersData1['first_name'].'</p>
		<p>'.$getOrdersData1['email'].'</p>
		<p>'.$getOrdersData1['mobile'].'</p>
		<p>'.$getOrdersData1['address'].'</p>
		<p>'.$getOrdersData1['postal_code'].'</p>
		<p style="color:#f26226">Payment Information</p>
		<p>'.$getPaymentMethodData['status'].'</p>
		</td>
		<td></td>
        <td colspan="2"><p style="color:#f26226">Shipping Address</p>
		<p>'.$getOrdersData1['first_name'].'</p>
		<p>'.$getOrdersData1['email'].'</p>
		<p>'.$getOrdersData1['mobile'].'</p>
		<p>'.$getOrdersData1['address'].'</p>
		<p>'.$getOrdersData1['postal_code'].'</p>
		<p style="color:#f26226">Order Price</p>
		<p>'.$getOrdersData1['order_price'].'</p>
		</td>
		<td></td>
      </tr>
      <tr style="color:#f26226;text-align:center">
        <td colspan="2">Service Name</td>
        <td>Price</td>
        <td>Quantity</td>
		<td>Selected Date</td>
		<td>Selected Time</td>
		<td>SUBTOTAL</td>
      </tr>
	   <tr style="text-align:center">
        <td colspan="2">'.$getServiceNamesData['group_service_name'].'</td>
        <td>Rs. '.$getOrdersData1['order_price'].'</td>
        <td>'.$getOrdersData1['service_quantity'].'</td>
		<td>'.$getOrdersData1['service_selected_date'].'</td>
		<td>'.$getOrdersData1['service_selected_time'].'</td>
		<td>Rs. '.$getOrdersData1['sub_total'].'</td>
      </tr>
	   <tr style="background-color:#f2f2f2">
        <td colspan="5"></td>
		<td>
		<p>Subtotal:</p>
		<p>Discount Money:</p>
		<p>Service Tax:</p>
		<p style="color:#f26226">Grand Total:</p>
		</td>
		<td style="color:#f26226"><p>Rs. '.$getOrdersData1['sub_total'].'</p>
		<p>Rs.'.$discount_money.'</p>
		<p>Rs.'.$getOrdersData1['service_tax'].'</p>
		<p>Rs. '.$getOrdersData1['order_total'].'</p></td>
      </tr>
    </tbody>
  </table>
</div>

</body>
</html>';

//echo $content; die;

require_once('html2pdf/html2pdf.class.php');


$html2pdf = new HTML2PDF('P', 'A3', 'fr');
$html2pdf->setDefaultFont('Arial');
$html2pdf->writeHTML($content, isset($_GET['vuehtml']));

$html2pdf = new HTML2PDF('P', 'A3', 'fr');
$html2pdf->WriteHTML($content);
$html2pdf->Output('../../uploads/generate_invoice/'.$getOrdersData1['order_sub_id'].'.pdf', 'F');

// Email attachment to user
$to = $getOrdersData1['email'];
$from = $getSitesettingsDeatils['from_email'];
$subject = "MY SERVANT ORDER INVOICE";

$message = "<p>Dear ". $getOrdersData1['first_name'] . ", <br /><br />Please see the MY SERVANT Service Details attachment.</p><br /><br />Thank You<br/>MY SERVANT. ";
$separator = md5(time());
$eol = PHP_EOL;
$filename = "../../uploads/generate_invoice/".$getOrdersData1['order_sub_id'].".pdf";
$pdfdoc = $html2pdf->Output('', 'S');
$attachment = chunk_split(base64_encode($pdfdoc));

$headers = "From: " . $from . $eol;
$headers .= "MIME-Version: 1.0" . $eol;
$headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol . $eol;

$body = '';

$body .= "Content-Transfer-Encoding: 7bit" . $eol;
$body .= "This is a MIME encoded message." . $eol; //had one more .$eol

$body .= "--" . $separator . $eol;
$body .= "Content-Type: text/html; charset=\"iso-8859-1\"" . $eol;
$body .= "Content-Transfer-Encoding: 8bit" . $eol . $eol;
$body .= $message . $eol;

$body .= "--" . $separator . $eol;
$body .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;
$body .= "Content-Transfer-Encoding: base64" . $eol;
$body .= "Content-Disposition: attachment" . $eol . $eol;
$body .= $attachment . $eol;
$body .= "--" . $separator . "--";

if (mail($to, $subject, $body, $headers)) {

    $msgsuccess = 'Mail Send Successfully';
} else {

    $msgerror = 'Main not send';
}

//Email Attachment to admin
$getAdminData = $orderStatus = getIndividualDetails('admin_users','id',$_SESSION['services_admin_user_id']);

$to = $getAdminData['admin_email'];
$from = $getSitesettingsDeatils['from_email'];
$subject = "MY SERVANT ORDER INVOICE";

$message = "<p>Dear Admin, <br /><br />Please see the MY SERVANT Service Details attachment.</p><br /><br />Thank You<br/>MY SERVANT. ";
$separator = md5(time());
$eol = PHP_EOL;
$filename = "../../uploads/generate_invoice/".$getOrdersData1['order_sub_id'].".pdf";
$pdfdoc = $html2pdf->Output('', 'S');
$attachment = chunk_split(base64_encode($pdfdoc));

$headers = "From: " . $from . $eol;
$headers .= "MIME-Version: 1.0" . $eol;
$headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol . $eol;

$body = '';

$body .= "Content-Transfer-Encoding: 7bit" . $eol;
$body .= "This is a MIME encoded message." . $eol; //had one more .$eol

$body .= "--" . $separator . $eol;
$body .= "Content-Type: text/html; charset=\"iso-8859-1\"" . $eol;
$body .= "Content-Transfer-Encoding: 8bit" . $eol . $eol;
$body .= $message . $eol;

$body .= "--" . $separator . $eol;
$body .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;
$body .= "Content-Transfer-Encoding: base64" . $eol;
$body .= "Content-Disposition: attachment" . $eol . $eol;
$body .= $attachment . $eol;
$body .= "--" . $separator . "--";

if (mail($to, $subject, $body, $headers)) {

    $msgsuccess = 'Mail Send Successfully';
} else {

    $msgerror = 'Main not send';
}

echo "Message has been sent";
}
header("Location: view_category_orders.php?order_id=".$getOrdersData1['order_id']."&msg=success");
?>