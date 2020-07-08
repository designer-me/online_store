<?php
include './config.php';
$mode = $_POST['mode'];
$pro_id = $_POST['pro_id'];
$cartData = $mysqli->query("SELECT * FROM `skyevo_cart` where id = '$cart_id'");
$result = mysqli_fetch_assoc($cartData);
$cartItem = json_decode($result['cart_item'],TRUE);

$updated_items = array();
if($mode == 'removeone'){
    foreach ($cartItem as $item){
        if($item['pro_id'] == $pro_id){
            $item['qty'] = $item['qty']-1;
        }
        if($item['qty']>0){
            $updated_items[] = $item;
        }
    }
}
if($mode == 'addone'){
    foreach ($cartItem as $item){
        if($item['pro_id'] == $pro_id){
            $item['qty'] = $item['qty']+1;
        }
        $updated_items[] = $item;
    }
}
if(!empty($updated_items)){
    $json_update = json_encode($updated_items);
    $s = $mysqli ->query("UPDATE `skyevo_cart` SET `cart_item` = '$json_update' where id = '$cart_id'");
//    echo '<div class="alert alert-success text-center success_time"><p style="font-weight:bold;">Successfully Updated to cart.</p></div>';
     echo "1";
}

if(empty($updated_items)){
    $del = $mysqli->query("DELETE FROM `cart_item` WHERE  id = '{$cart_id}'");
    setcookie(CART_COOKIE,"",-CART_COOKIE_EXPIRE);
    echo "1";
}
?>