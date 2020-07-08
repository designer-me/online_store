<?php
include './config.php';
$del = $_POST['delete_id'];
$cartQ = $mysqli->query("SELECT * FROM `skyevo_cart` WHERE  id = '$cart_id'");
$result = mysqli_fetch_assoc($cartQ);
$items = json_decode($result['cart_item'],true);
$updated_items = array();
foreach ($items as $item){
if(($item['pro_id'] == $del)){
        $item['qty'] = 1-1;
        
    }
    if($item['qty']>0){
        $updated_items[] = $item;
        
    }
}
$json_update = json_encode($updated_items);
$s = $mysqli ->query("UPDATE `skyevo_cart` SET `cart_item` = '$json_update' where id = '$cart_id'");


if(empty($updated_items)){
//    echo 'delete';
    $del = $mysqli->query("delete from skyevo_cart where id = '{$cart_id}'");
    
    setcookie(CART_COOKIE,"",-CART_COOKIE_EXPIRE);
    echo "1";
}


?>