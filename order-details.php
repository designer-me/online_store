<?php
include './config.php';
if(!isset($_SESSION['user_id'])){
    header("location:login");
}
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <base href="<?=$home_url?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content=""/>
    <title>My Order Details</title>
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/color-1.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/transition.css">
    <link href='https://fonts.googleapis.com/css?family=Merriweather:300,300italic,400italic,400,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic,900italic,900,100italic,100' rel='stylesheet' type='text/css'>
    <script src="js/vendor/modernizr.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css" rel="stylesheet" type="text/css">
    <link href="css/login.css?v=1.0.0" rel="stylesheet" type="text/css"/>
</head>
<body>
<!--<div id="status">
    <div id="preloader">
        <div class="preloader position-center-center">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>-->
<div class="wrapper push-wrapper">
    <header id="header">
        <?php
        include './include/header.php';
        ?>
    </header>
    <div class="breadcrumb-holder white-bg">
        <div class="container">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li>My Order Details</li>
                </ul>
            </div>
        </div>
    </div>
    <main class="main-content" style="margin-top: -57px;">
        <div class="product-grid-holder tc-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <?php
                            include './include/sidebar_menu.php';
                        ?>
                    </div>
                    <div class="col-md-9">
                        <h2>My Order Details</h2>
                        <?php 
                          $db->where("ship_id",$_GET['order']);
                          $mypro = $db->get("skyevo_shipping");
                        ?>
                        <div class="table-responsive">
                            <h4 class="text-center">User Details</h4>
                             <table class="table table-bordered">
                                <?php 
                                  $db->where("id",$_SESSION['user_id']);
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
                            <tr><td>Transaction Id </td><td> <?=$pro['txn_id']?></td></tr>
                            <tr><td>Paid Amount</td><td><i class="fa fa-inr"></i> <?=$pro['amount']?>/-</td></tr>
                            <tr><td>Order Status</td><td><?=$pro['order_status']?></td></tr>
                            <tr><td>Payment Method</td><td><?=$pro['payment_method']?></td></tr>
                            <tr><td>Shipping Charge</td><td><i class="fa fa-inr"></i> <?=$pro['ship_charge']?>/-</td></tr>
                            <tr><td>Total Paid Amount</td><td><i class="fa fa-inr"></i> <?php echo  $pro['total_amount'] ?>/-</td></tr>
                            <tr><td>Payment Status</td><td> <?php if($pro['payment_status'] == "1"): ?><span class="text-success" style="font-weight: bold;">Paid</span><?php endif; ?></td></tr>
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
                            <tr><td>Product Name</td><td><a href="shop-detail/<?=$prod[0]['id']?>/<?=$prod[0]['pro_slug']?>"><?=$prod[0]['pro_title']?></a></td></tr>
                            <tr><td>Price</td><td><span class="fa fa-inr">&nbsp;<?=$cc['price']?>/-</span></td></tr>
                            <tr><td>Quantity</td><td><?=$cc['qty']?></td></tr>
                            <tr><td>Image</td><td><a href="shop-detail/<?=$prod[0]['id']?>/<?=$prod[0]['pro_slug']?>"><img src="books_image/<?=$prod[0]['pro_image']?>" style="height: 50px; width: 50px;"></a></td></tr>
                         </table>
                         <?php endforeach; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
        include './include/footer.php';
    ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
<script src="js/vendor/bootstrap.min.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="js/gmap3.min.js"></script>					
<script src="js/datepicker.js"></script>					
<script src="js/contact-form.js"></script>					
<script src="js/bigslide.js"></script>					
<script src="js/3d-book-showcase.js"></script>					
<script src="js/turn.js"></script>							
<script src="js/jquery-ui.js"></script>								
<script src="js/mcustom-scrollbar.js"></script>					
<script src="js/timeliner.js"></script>					
<script src="js/parallax.js"></script>			   	 
<script src="js/countdown.js"></script>	
<script src="js/countTo.js"></script>		
<script src="js/owl-carousel.js"></script>	
<script src="js/bxslider.js"></script>	
<script src="js/appear.js"></script>		 		
<script src="js/sticky.js"></script>			 		
<script src="js/prettyPhoto.js"></script>			
<script src="js/isotope.pkgd.js"></script>					 
<script src="js/wow-min.js"></script>			
<script src="js/classie.js"></script>					
<script src="js/main.js?v=1.0.0"></script>
</body>
</html>