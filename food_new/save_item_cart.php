<?php
include "../admin_includes/config.php";
include "../admin_includes/common_functions.php";
include "../admin_includes/food_common_functions.php";

if (isset($_POST['item_id']) && isset($_POST['item_price'])){

    $ProductId = $_POST['item_id'];
    $ProductPrice = $_POST['item_price'];

    if($_SESSION['CART_TEMP_RANDOM'] == "") {

        $_SESSION['CART_TEMP_RANDOM'] = rand(10, 10).sha1(crypt(time())).time();
    }
    if($_SESSION['user_login_session_id'] == "") {

        $user_id = 0;
    } else {
        $user_id = $_SESSION['user_login_session_id'];
    }

    $session_cart_id = $_SESSION['CART_TEMP_RANDOM'];
    
    $checkCartItems = "SELECT * FROM food_cart WHERE food_item_id = '$ProductId' AND item_price='$ProductPrice' AND session_cart_id = '$session_cart_id'";
    $getCartCount = $conn->query($checkCartItems);

    $getCartQuantity = $getCartCount->fetch_assoc();
    $itemPrevQuan = $getCartQuantity['item_quantity'];
    $getTotalCount = $getCartCount->num_rows;
    if($getTotalCount > 0) {
        //echo $getTotalCount;
        $itemPrevQuantity = $itemPrevQuan+1;
        $updateItems = "UPDATE food_cart SET item_quantity = '$itemPrevQuantity' WHERE food_item_id = '$ProductId' AND item_price='$ProductPrice' AND session_cart_id = '$session_cart_id'";
        $upCart = $conn->query($updateItems);
    } else {
        $itemPrevQuantity = 1;
        $saveItems = "INSERT INTO `food_cart`(`session_cart_id`, `food_item_id`, `item_price`, `item_quantity`) VALUES ('$session_cart_id','$ProductId','$ProductPrice','$itemPrevQuantity')";
        $saveCart = $conn->query($saveItems);
        //echo $getTotalCount;
    }

    $getAddData = "SELECT * FROM food_cart WHERE session_cart_id = '$session_cart_id'";
    $getSelData = $conn->query($getAddData);

    while($cartItems = $getSelData->fetch_assoc() ) {
    $getProductsName = getIndividualDetails('food_products','id',$cartItems['food_item_id']);    
    echo '<tr>
        <td>
          <a href="#0" class="remove_item"><i class="icon_plus_alt inc_cart_quan" data-key='.$cartItems['id'].'></i></a> <strong>'.$cartItems['item_quantity'].'x</strong> <a href="#0" class="remove_item"><i class="icon_minus_alt"></i></a> '.$getProductsName['product_name'].'
        </td>
        <td>
          <strong class="pull-right">Rs. '.$cartItems['item_price'] * $cartItems['item_quantity'].' </strong>
        </td>
      </tr>';
    }
}
?>