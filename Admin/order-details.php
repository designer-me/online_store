<?php
//include './config.php';
//session_start();
include './config.php';
if(!$_SESSION['skyevo_id']){
    header('Location:index.php'); 
}
?>
<?php
if(isset($_POST['changeStatus']))
{
    $orderStatus = $_POST['orderStatus'];
    $araryUpd = array("order_status"=>"$orderStatus");
    $db->where("ship_id",$_GET['order']);
    $upd = $db->update("skyevo_shipping",$araryUpd);
    if($upd)
    {
        ?>
        <script>
            alert("Status updated successfully.");
            window.location.assign("order-details?order=<?=$_GET['order']?>");
        </script>
 <?php   }
}
?>
        <?php
if(isset($_POST['changePaymentStatus']))
{
    $str = str_shuffle("qwertyuioplkjhgfdsazxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM");
    $txn = substr($str, 0,16);
    $orderStatus = $_POST['payStatus'];
    $araryUpd = array("payment_status"=>"$orderStatus","txn_id"=>$txn);
    $db->where("ship_id",$_GET['order']);
    $upd = $db->update("skyevo_shipping",$araryUpd);
    if($upd)
    {
        ?>
        <script>
            alert("Payment Status updated successfully.");
            window.location.assign("order-details?order=<?=$_GET['order']?>");
        </script>
 <?php   }
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">        
        <title>Admin | Orders</title>
        
    </head>
    <body>
        <!--MAIN BODY-->
        <div class="container-fluid">
            
            <!--NAVIGATION-->
            <div class="row">
                <?php include 'navigation.php';?>
            </div>
            <!--NAVIGATION-->
            
            <div class="row" style="margin-top:-21px;">
                <!--LEFT SECTION-->
                <div class="col-lg-2">
                    <?php include 'verticalmenu.php';?>
                </div>
                
            <!--FIRST ROW-->
                <!--LEFT SECTION-->
                
                <!--RIGHT SECTION-->
                <div class="col-lg-10">
                    <!--BREADCRUMB-->
                    <div class="row" style="border-top: 1px solid black;">
                        <ol class="breadcrumb">
                            <li><a href="#" target="blank"><span class="fa fa-home" style="padding-right:6px;"></span>View Site</a></li>
                            <li><a href="">Orders</a></li>
                        </ol> 
                    </div>
                    <!--BREADCRUMB-->
                    <div class="col-lg-12 ">
                        <h2>Order Details</h2>
                        <?php 
                          $db->where("ship_id",$_GET['order']);
                          $mypro = $db->get("skyevo_shipping");
                        ?>
                        <div class="table-responsive">
                            <h4 class="text-center">User Details</h4>
                             <table class="table table-bordered">
                                <?php 
                                  $db->where("id",$mypro[0]['user_id']);
                                  $user = $db->get("skyevo_user");
                                ?>
                                <tr><td>User Name</td><td><?=$user[0]['name']?></td></tr>
                                <tr><td>User Email</td><td><?=$user[0]['email']?></td></tr>
                                <tr><td>User Contact</td><td><?=$user[0]['mobile']?></td></tr>
                             </table>
                        </div>
                        <h4 class="text-center">Shipping/Billing Address</h4>
                         <?php foreach ($mypro as $pro): ?>
                         <table class="table table-bordered">
                            <tr><td>Name</td><td><?=$pro['ship_name']?></td></tr>
                            <tr><td>Contact</td><td><?=$pro['ship_contact']?></td></tr>
                            <tr><td>Email</td><td><?=$pro['ship_email']?></td></tr>
                            <tr><td>Address</td><td><?=$pro['ship_address']?>&nbsp;&nbsp;LandMark : <?=$pro['ship_landmark']?>&nbsp;&nbsp;Pincode : <?=$pro['ship_pincode']?></td></tr>
                            <tr><td>City</td><td><?=$pro['ship_city']?>&nbsp;<?=$pro['ship_state']?></td></tr>
                         </table>
                            <h4 class="text-center">Payment Detail</h4>
                         <table class="table table-bordered">
                             <tr><td>Order Status </td><td class="text-danger" style="font-weight: bold;"> <?=$pro['order_status']?></td></tr>
                            <tr><td>Transaction Id </td><td> <?=$pro['txn_id']?></td></tr>
                            <tr><td>Paid Amount</td><td><i class="fa fa-inr"></i> <?=$pro['amount']?>/-</td></tr>
                            <tr><td>Shipping Charge</td><td><i class="fa fa-inr"></i> <?=$pro['ship_charge']?>/-</td></tr>
                            <tr><td>Total Paid Amount</td><td><i class="fa fa-inr"></i> <?php echo  $pro['total_amount'] ?>/-</td></tr>
                            <tr><td>Payment Method</td><td><?=$pro['payment_method']?></td></tr>
                            <tr><td>Payment Status</td><td> <?php if($pro['payment_status'] == "1"): ?><span class="text-success" style="font-weight: bold;">Paid</span><?php else: ?><span class="text-danger" style="font-weight: bold;">Unpaid</span><?php endif; ?></td></tr>
                            <tr><td>Order Date</td><td><?=date("d-m-Y h:i A", strtotime($pro['paid_on']))?></td></tr>
                         </table>
                        
                            <h4 class="text-center">Product Details</h4>
                         <?php 
                           $db->where("id",$pro['cart_id']); 
                           $cart = $db->get("skyevo_cart");
                           $cartItem = json_decode($cart[0]['cart_item'],TRUE);
                           foreach ($cartItem as $cc):
                           $db->where("id",$cc['pro_id']);
                           $prod = $db->get("skyevo_product");
                         ?>
                         <table class="table table-bordered">
                            <tr><td>Product Name</td><td><a href="../shop-detail/<?=$prod[0]['id']?>/<?=$prod[0]['pro_slug']?>"><?=$prod[0]['pro_title']?></a></td></tr>
                            <tr><td>Price</td><td><span class="fa fa-inr">&nbsp;<?=$cc['price']?>/-</span></td></tr>
                            <tr><td>Quantity</td><td><?=$cc['qty']?></td></tr>
                            <tr><td>Image</td><td><a href="../shop-detail/<?=$prod[0]['id']?>/<?=$prod[0]['pro_slug']?>"><img src="../books_image/<?=$prod[0]['pro_image']?>" style="height: 50px; width: 50px;"></a></td></tr>
                         </table>
                         <?php endforeach; ?>
                        <?php endforeach; ?>
                        <h4 class="text-center">Change Order Status</h4>    
                        <form method="post">
                            <div class="form-group"> 
                                <label>Order Status</label>
                                <select name="orderStatus" required="" class="form-control">
                                    <option value="">-----Select Status-----</option>
                                    <option value="Order Received">Order Received</option>
                                    <option value="Dispatched">Dispatched</option>
                                    <option value="Delivered">Delivered</option>
                                    <option value="Canceled">Canceled</option>
                                </select>  
                            </div>
                            <div class="form-group"> 
                                <input type="submit" name="changeStatus" class="btn btn-success">
                            </div>
                        </form>
                        <?php if(($pro['payment_method'] == "COD") && ($pro['payment_status'] == "0")): ?>
                        <h4 class="text-center">Change Payment Status</h4>    
                        <form method="post">
                            <div class="form-group"> 
                                <label>Payment Status</label>
                                <select name="payStatus" required="" class="form-control">
                                    <option value="">-----Select Status-----</option>
                                    <option value="1">Paid</option>
                                </select>  
                            </div>
                            <div class="form-group"> 
                                <input type="submit" name="changePaymentStatus" class="btn btn-success">
                            </div>
                        </form>
                        <?php endif; ?>
                    </div> 
                </div>   
                <!--RIGHT SECTION-->
            </div>
            <!--FIRST ROW-->
            
            <!--FOOTER-->
            <div class="row">
                <?php include 'footer.php';?>
            </div>
            <!--FOOTER-->
            <script src="js/jquery-ui.js.js"></script>
        </div>
        <!--MAIN BODY-->
    </body>
</html>


