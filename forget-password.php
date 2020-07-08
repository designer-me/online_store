<?php
    include './config.php';
    if(isset($_SESSION['user_id'])){
        header("location:user-dashboard");
    }
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content=""/>
    <title>Login My Account</title>
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
    <link rel="stylesheet" href="dist/css-loader.css">
    <link href="css/jquery-confirm.css" rel="stylesheet" type="text/css"/>
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
<!--        <div class="parallax-window inner-banner tc-padding overlay-dark" data-parallax="scroll" data-image-src="images/bac_ban.jpg">
            <div class="container">
                <div class="inner-page-heading style-2 h-white">
                    <h2>Shop</h2>
                </div>
            </div>
        </div>-->
    </header>
    <div class="breadcrumb-holder white-bg">
        <div class="container">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li>Login/Signup</li>
                </ul>
            </div>
        </div>
    </div>
    <main class="main-content" style="margin-top: -57px;" id="LoginForm">
        <div class="product-grid-holder tc-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="login-form">
                            <div class="main-div">
                                <div class="panel">
                                    <h2>Recover My Password</h2>
                                </div>
                                <form id="forget_pass" method="post">
                                    <div class="form-group">
                                        <input type="text" id="mobile" maxlength="10" name="mobile" class="form-control" placeholder="Enter Mobile No">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
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
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
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
<script src="js/script/login.js?v=1.0.1" type="text/javascript"></script>
<script>
    $("#forget_pass").submit(function (e){
    e.preventDefault();
    var mob = $("#mobile").val();
    
    if((mob).length=="10"){
        $.ajax({
            type: 'POST',
            data: {mob:mob},
            url: "api/forget_password",
            beforeSend: function () {
                $("#loader").html('<div class="loader loader-default is-active"></div>');
            },
            success: function (data) {
                if(data == "0"){
                    $.confirm({
                        title: 'Alert!',
                        content: 'This Mobile No does\'nt exist.',
                        type: 'red',
                        buttons: {
                            Okay: function () {
                                
                            },
                        }
                    });
                }else{
                    $.confirm({
                        title: 'Success!',
                        content: 'Your password has been sent on your registered mobile no.',
                        type: 'green',
                        buttons: {
                            Okay: function () {
                                
                            },
                        }
                    });
                }
            },
            complete: function () {
                $("#loader").html('<div class="loader loader-default"></div>');
            }
        });
    }
});
</script>
</body>
</html>