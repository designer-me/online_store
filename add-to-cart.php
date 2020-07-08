<?php
include './config.php';
$chk2 = "";
$proid = $_POST['pro_id'];
$qty = (int)$_POST['qty'];
$price = $_POST['price'];
$db->where("id",$proid);
$proDel = $db->get("skyevo_product");
$proQty = (int)$proDel[0]['pro_quant'];
$title = $proDel[0]['pro_title'];
if (($qty > $proQty)){
echo '0';
//    echo '<div class="add-cart-alert" >
//                    <p class="text-danger"><i class="fa fa-close"></i>You have exceed max Quantity.</p>
//                    <a class="btn-1 sm pull-right shadow-0" href="'.$home_url.'my-cart">view cart</a>
//                </div>';
} 
else{
$item[] = array("pro_id"=>"$proid",
    "qty"=>"$qty",
    "price"=>"$price",
    ); 


    if(!empty($cart_id))
    {
        $cart = $mysqli->query("SELECT * FROM `skyevo_cart` WHERE `id` = '$cart_id'");
        $cart_item = mysqli_fetch_assoc($cart);
        $previous_items = json_decode($cart_item['cart_item'],TRUE);
        $item_match = 0;
        $itm_avail = "";
//        $chk_q = "";
        $new_item = array();
        foreach($previous_items as $pitem){
            //echo $it =  $item[0]['pro_id'];
            if($item[0]['pro_id']==$pitem['pro_id']){
               $pitem1 = $pitem['qty'];
               $pitem['qty']=$pitem['qty']+$item[0]['qty']; 
               $item_match = "1";
//                    echo $avail."avail";
//                    echo $pitem1."pitem";
                if($proQty > $pitem1){
                    $itm_avail = 'true'; 
                    $chk = "x";
                }
                if($chk != "x")
                    {
                     $itm_avail = 'false';  
                    }
//                else{
//                 $itm_avail = 'false';
//                }
                $chk2 = "y";
            }
            
            if($chk2 != "y")
            {
               $itm_avail = 'true';
            }
//            else{
//                echo "no match";
//                echo $itm_avail = 'true';
//                }
            
            $new_items[]=$pitem;
        }
        if($item_match !=1){
            $new_items =  array_merge($item,$previous_items);
        }
        $items_json =  json_encode($new_items);
        if($itm_avail == "true"){
            $cart_expire=date("Y-m-d H:i:s",  strtotime("+5 days"));
            $up_query = $mysqli->query("UPDATE `skyevo_cart` SET `cart_item`='$items_json',`cart_expiry`='$cart_expire',`cart_added_at`='$date' WHERE `id` = '$cart_id'");
            //echo '<div class="alert alert-success text-center success_time"><p style="font-weight:bold;">Successfully Inserted '.$title.' to cart.</p></div>';
            echo '1';
            
        }else{
//            echo '<div class="alert alert-danger text-center text-danger success_time"><p style="font-weight:bold;">You have exceed max quantity.</p></div>';
                echo '0'; 
            
        }
        
    }
else{
    $items_json = json_encode($item);
    $cart_expire=  date("Y-m-d H:i:s",  strtotime("+5 days"));
    $ins_cart = $mysqli->query("INSERT INTO `skyevo_cart`(`cart_item`, `cart_expiry`, `cart_added_at`) VALUES ('$items_json','$cart_expire','$date')");
    $cart_id=$mysqli->insert_id;
    setcookie(CART_COOKIE,$cart_id,CART_COOKIE_EXPIRE);
    $success_msg = "<div class='bg-success'><p class='text-success text-center'>$title was added to your cart.</p></div>";
//    echo '<div class="alert alert-success text-center success_time"><p style="font-weight:bold;">Successfully Inserted '.$title.' to cart.</p></div>';
    echo '1';
}

}


?>