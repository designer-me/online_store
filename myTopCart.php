<?php
include './config.php';


?>
<?php
if(!empty($cart_id)): 
$db->where("id",$cart_id);    
$cart = $db->get("skyevo_cart");
$array = json_decode($cart[0]['cart_item'],TRUE);
$size =  sizeof($array);
?>
<li class="add-cart"><a href="my-cart"><i class="fa fa-shopping-bag"></i><span><?=$size?></span></a></li>
<?php else: ?>
<li class="add-cart"><a href="my-cart"><i class="fa fa-shopping-bag"></i><span>0</span></a></li>
<?php endif; ?>
