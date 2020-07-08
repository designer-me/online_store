<?php
include './config.php';
if(!empty($cart_id)): 
$db->where("id",$cart_id);
$getCartData = $db->get("skyevo_cart");
$cartItem = $getCartData[0]['cart_item'];
$item1 = json_decode($cartItem,TRUE);    
?>

<div class="col-md-10 col-md-offset-1">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Total</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($item1 as $allItem):
                $db->where("id",$allItem['pro_id']);
                $getPro = $db->get("skyevo_product");
                $available = $getPro[0]['pro_quant'];
                
                foreach ($getPro as $Product):
                ?>
                <tr>
                    <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="shop-detail/<?=$getPro[0]['id']?>/<?=$getPro[0]['pro_slug']?>"> <img class="media-object" src="books_image/<?=$getPro[0]['pro_image']?>" style="width: 72px; height: 85px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#"><?=$Product['pro_title']?></a></h4>
                                <h5 class="media-heading"> Author <a href="#"><?=$Product['pro_author']?></a></h5>
                                <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                            </div>
                        </div>
                    </td>
                    <td class="col-sm-1 col-md-1" style="text-align: center">
                            <div class="buttons-added">
                                
                                <?php 
                                if($allItem['qty'] < $available): 
                                ?>
                                <a onclick="update_cart('addone','<?=$allItem['pro_id'];?>');" type="button" class="sign plus"><i class="fa fa-plus"></i></a>
                                <?php else: ?>
                                <span class="text-danger">Max</span>
                                <?php endif; ?>
                                <input type="text" value="<?=$allItem['qty']?>" title="Qty" readonly="" class="input-text qty text" size="1">
                                <a onclick="update_cart('removeone','<?=$allItem['pro_id'];?>');" type="button" class="sign minus"><i class="fa fa-minus"></i></a>
                            </div>
                        <!--<input type="email" class="form-control" id="exampleInputEmail1" value="<$allItem['qty']?>">-->
                    </td>
                    <td class="col-sm-1 col-md-1 text-center"><strong><i class="fa fa-inr"></i> <?=$allItem['price']?></strong></td>
                    <td class="col-sm-1 col-md-1 text-center"><strong><i class="fa fa-inr"></i> <?=$allItem['qty'] * $allItem['price']?></strong></td>
                    <td class="col-sm-1 col-md-1">
                        <button type="button" onclick="delete_cart('<?=$allItem['pro_id'];?>')" class="btn btn-danger">
                            <span class="fa fa-remove"></span> Remove
                        </button>
                    </td>
                </tr>
                <?php @$total += $allItem['price']*$allItem['qty']; ?>
                <?php 
                endforeach; 
                endforeach;
                ?>
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td><h5>Subtotal</h5></td>
                    <td class="text-right"><h5><strong><i class="fa fa-inr"></i> <?=$total?></strong></h5></td>
                </tr>
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td><h5>Estimated shipping</h5></td>
                    <?php
                    if($total < 500):
                        $ship = 50;
                    else:
                        $ship = 0; 
                    endif;
                    
                    ?>
                    <td class="text-right"><h5><strong><i class="fa fa-inr"></i> <?=$ship?></strong></h5></td>
                </tr>
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td><h3>Total</h3></td>
                    <td class="text-right"><h3><strong><i class="fa fa-inr"></i> <?=$grandTotal = $total+$ship;?></strong></h3></td>
                </tr>
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td>
                        <a type="button" href="index" class="btn btn-default">
                            <span class="fa fa-shopping-cart"></span> Continue Shopping
                        </a>
                    </td>
                    <?php
                        if(!isset($_SESSION['user_id'])){
                            $_SESSION['page_url'] = "my-cart";
                    ?>
                    <td>
                        <a type="button" href="login" class="btn btn-success">
                            Checkout <span class="fa fa-play"></span>
                        </a>
                    </td>
                    <?php
                        }else{
                    ?>
                    <td>
                        <a type="button" href="shipping-details" class="btn btn-success">
                            Checkout <span class="fa fa-play"></span>
                        </a>
                    </td>
                    <?php
                        }
                    ?>
                </tr>
            </tbody>
        </table>
    </div>
<?php else: ?>
<h3 class="text-center text-danger">Your cart is empty.</h3>
<?php endif; ?>