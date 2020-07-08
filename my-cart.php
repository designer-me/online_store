<?php
include './config.php';
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content=""/>
    <title>My Cart</title>
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
    <link rel="stylesheet" href="<?=$home_url;?>dist/css-loader.css">
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
    </header>
    <div class="breadcrumb-holder white-bg">
        <div class="container">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li>My Cart</li>
                </ul>
            </div>
        </div>
    </div>
    <main class="main-content" style="margin-top: -57px;">
        <div class="product-grid-holder tc-padding">
            <div class="container">
                <div class="row">
                    <div class="myCart"></div>
<!--                    <div class="col-md-10 col-md-offset-1">
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
                <tr>
                    <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#">Product name</a></h4>
                                <h5 class="media-heading"> Athor <a href="#">Author name</a></h5>
                                <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                            </div>
                        </div>
                    </td>
                    <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="email" class="form-control" id="exampleInputEmail1" value="3">
                    </td>
                    <td class="col-sm-1 col-md-1 text-center"><strong>$4.87</strong></td>
                    <td class="col-sm-1 col-md-1 text-center"><strong>$14.61</strong></td>
                    <td class="col-sm-1 col-md-1">
                        <button type="button" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> Remove
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#">Product name</a></h4>
                                <h5 class="media-heading"> Athor <a href="#">Author name</a></h5>
                                <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                            </div>
                        </div>
                    </td>
                    <td class="col-md-1" style="text-align: center">
                        <input type="email" class="form-control" id="exampleInputEmail1" value="2">
                    </td>
                    <td class="col-md-1 text-center"><strong>$4.99</strong></td>
                    <td class="col-md-1 text-center"><strong>$9.98</strong></td>
                    <td class="col-md-1">
                        <button type="button" class="btn btn-danger">
                            <span class="fa fa-remove"></span> Remove
                        </button></td>
                </tr>
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td><h5>Subtotal</h5></td>
                    <td class="text-right"><h5><strong>$24.59</strong></h5></td>
                </tr>
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td><h5>Estimated shipping</h5></td>
                    <td class="text-right"><h5><strong>$6.94</strong></h5></td>
                </tr>
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td><h3>Total</h3></td>
                    <td class="text-right"><h3><strong>$31.53</strong></h3></td>
                </tr>
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td>
                        <button type="button" class="btn btn-default">
                            <span class="fa fa-shopping-cart"></span> Continue Shopping
                        </button></td>
                    <td>
                        <button type="button" class="btn btn-success">
                            Checkout <span class="fa fa-play"></span>
                        </button></td>
                </tr>
            </tbody>
        </table>
    </div>-->
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
<script src="js/jquery-confirm.js"></script>
<script>
    $(document).ready(function(){
        myCart();
        
    });
    function myCart()
        {
          $.ajax({
                type: 'POST',
                url: "myCart",
                success: function (data) {
                    $(".myCart").html(data);
                },
                error: function () {

                }

            });  
        }
    function update_cart(mode,pro_id)
        {
            var data = {"mode":mode,"pro_id":pro_id};
            $.ajax({
                type: 'POST',
                url: "update-cart",
                data: data,
                beforeSend: function (data) {
                    $("#loader").html('<div class="loader loader-default is-active"></div>'); 
                },
                success: function (data) {
                    if(data == "1"){
                        location.reload(); 
                    }
                },
                complete: function () {
                $("#loader").html('<div class="loader loader-default"></div>');
            }
            });
        }
        
        function delete_cart(delete_id){
        $.confirm({
        title: 'Confirm !',
        content: 'Are you sure you want to remove this Product from your cart ?',
        buttons: {
            confirm: function () {
        var data = {"delete_id" : delete_id};
        jQuery.ajax({
           url: "delete_cart",
           method:"post",
           data:data,
            beforeSend: function (data) {
                $("#loader").html('<div class="loader loader-default is-active"></div>');
            },
            success: function () {
                if(data == "1")
                {
                   location.reload(); 
                }
                else{
                     myCart();
                }
                
            },
            complete: function () {
                $("#loader").html('<div class="loader loader-default"></div>');
            }
            
        });
        },
            cancel: function () {
                $.alert('Canceled!');
            },
        }
   });
    }
</script>
</body>
</html>