<?php
    include './config.php';
    $db->where("ship_id",$_SESSION['shipId']);
    $getShip = $db->get("skyevo_shipping");
    $txn = substr(hash('sha256', mt_rand() . microtime()), 0, 16);
    $staArray = array("txn_id"=>"$txn","paid_on"=>"$date","order_status"=>"Pending");
    $db->where("ship_id",$_SESSION['shipId']);
    $upd = $db->update("skyevo_shipping",$staArray);
    setcookie(CART_COOKIE,"",-CART_COOKIE_EXPIRE);
    $db->where("id",$_SESSION['user_id']);
    $userData = $db->get("skyevo_user");
    $mobile = $userData[0]['mobile'];
    
    
    $msg = 'Hi! You have successfully Placed your Order at SKYEVO of Rs. '.$getShip[0]['total_amount'].'. Your Order id is '.$getShip[0]['ship_id'].''; 
    $authKey = "247318AE6HUFwy3EG5bebc87f";
    $mobileNumber = $mobile;
    $senderId = "SKYEVO";
    $message = urlencode($msg);
    $route = "4";
    $postData = array(
        'authkey' => $authKey,
        'mobiles' => $mobileNumber,
        'message' => $message,
        'sender' => $senderId,
        'route' => $route
    );
    $url = "http://api.msg91.com/api/sendhttp.php";
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postData
            //,CURLOPT_FOLLOWLOCATION => true
    ));
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $output = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'error:' . curl_error($ch);
    }
    curl_close($ch);
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content=""/>
    <title>Shipping Details</title>
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
    <link rel="stylesheet" href="dist/css-loader.css">
    <link href="css/login.css?v=1.0.0" rel="stylesheet" type="text/css"/>
    <link href="css/jquery-confirm.css" rel="stylesheet" type="text/css"/>
    <style>
        #LoginForm{
            background-image: none;
            background-color: #ede8e8;
        }
    </style>
</head>
<body>
<div id="loader"></div>
<div id="status">
    <div id="preloader">
        <div class="preloader position-center-center">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>
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
                    <li>Thank You</li>
                </ul>
            </div>
        </div>
    </div>
    <main class="main-content" style="margin-top: -57px;" id="LoginForm">
        <div class="product-grid-holder tc-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="login-form">
                            <div class="main-div">
                                <div class="panel">
                                    <h3 class="text-center">Thank You</h3><br/>
                                    <h5 class="text-center">You have successfully Placed your Order !<br/><br/> payment of <span style="color:blue;">Rs.<?=$getShip[0]['total_amount']?> </span>. 
                                        your Order Id is <span style="color: red;"><?=$getShip[0]['ship_id']?></span>.<br/> We Will Contact you soon.</h5>
                                    <br/>
                                    <center><a href="index" class="btn btn-success">Go To Home</a></center>
                                    <br/><br/>
                                    <br/><br/>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </main>
    <?php
        include './include/footer.php';
    ?>
</div>
<script src="js/vendor/jquery.js"></script>        
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
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
<script src="js/jquery-confirm.js"></script>
<script src="js/jquery.base64.min.js" type="text/javascript"></script>
<script src="js/script/login.js?v=1.0.0" type="text/javascript"></script>
</body>
</html>