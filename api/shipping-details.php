<?php
include '../config.php';
$p = 0;
$db->where("id",$_POST['cart_id']);
$getCartData = $db->get("skyevo_cart");
$cartItem = $getCartData[0]['cart_item'];
$item1 = json_decode($cartItem,TRUE); 
foreach ($item1 as $allItem):
    $price =   $allItem['price']*$allItem['qty'];
    $p = $p+$price;
endforeach;
$total = $p;
if($total < 500):
    $ship = 50;
else:
    $ship = 0; 
endif;
$gTotal = $total+$ship;
$name = $_POST['full_name'];
$email = $_POST['email'];
$mobile_no = $_POST['mobile_no'];
$address = $_POST['address'];
$landmark = $_POST['landmark'];
$pincode = $_POST['pincode'];
$city = $_POST['city'];
$state = $_POST['state'];
$payment_method = $_POST['paymethod'];

$ShipData = array("user_id"=>$_SESSION['user_id'],
    "cart_id"=>$_POST['cart_id'],
    "ship_name"=>"$name",
    "ship_email"=>"$email",
    "ship_contact"=>"$mobile_no",
    "ship_address"=>"$address",
    "ship_landmark"=>"$landmark",
    "ship_pincode"=>"$pincode",
    "ship_city"=>"$city",
    "ship_state"=>"$state",
    "added_date"=>"$date",
    "amount"=>"$total",
    "ship_charge"=>"$ship",
    "total_amount"=>"$gTotal",
    "payment_method"=>$payment_method,
    );

$ins = $db->insert("skyevo_shipping",$ShipData);
if($ins)
{
    $id = $mysqli->insert_id;
    $_SESSION['shipId'] = $id;
    if($payment_method == "COD")
    {
       echo "2"; 
    }
    else{
       echo "1"; 
    }
    
}


?>