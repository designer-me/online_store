<?php
include './config.php';
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content=""/>
    <title>Sell With Us</title>
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/color-1.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/transition.css">
    <link rel="stylesheet" id="skins" href="css/default.css" type="text/css" media="all">
    <link href='https://fonts.googleapis.com/css?family=Merriweather:300,300italic,400italic,400,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic,900italic,900,100italic,100' rel='stylesheet' type='text/css'>
    <script src="js/vendor/modernizr.js"></script>
    <link rel="stylesheet" href="dist/css-loader.css">
    <link href="css/jquery-confirm.css" rel="stylesheet" type="text/css"/>
    <style>
        .sell_with .from-group{
            margin-bottom: 10px;
        }
        .sell_with label{
            margin-bottom: 5px;
            font-weight: 600;
            font-size: 14px;
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
    <?php
        include './include/header.php';
    ?>
    <div class="breadcrumb-holder white-bg">
        <div class="container">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li>Sell With Us</li>
                </ul>
            </div>
        </div>
    </div>
    <main class="main-content">
        <h3 class="text-center" style="margin-bottom: -20px;">Sell With Us</h3>
        <div class="tc-padding">
            <div class="container">
                <div class="tc-padding-bottom">
                    <div class="row">
                        <div class="col-md-10 sell_with col-md-offset-1">
                            <form method="post" id="sell_with_us">
                                <div class="col-md-12 from-group">
                                    <label>Company/Firm name <i class="text-danger">*</i></label>
                                    <input type="text" name="comp_name" class="form-control" required="">
                                </div>
                                <div class="col-md-6 from-group">
                                    <label>Year of Establishment <i class="text-danger">*</i></label>
                                    <input type="date" name="year_estab" class="form-control" required="">
                                </div>
                                <div class="col-md-6 from-group">
                                    <label>Industry Type <i class="text-danger">*</i></label>
                                    <input type="text" name="industry_type" class="form-control" required="">
                                </div>
                                <div class="col-md-12 from-group">
                                    <label>PAN Number <i class="text-danger">*</i></label>
                                    <input type="text" name="pan_number" class="form-control" required="">
                                </div>
                                <div class="col-md-12 from-group">
                                    <label>Shop/Registration No <i class="text-danger">*</i></label>
                                    <input type="text" name="shop_number" class="form-control" required="">
                                </div>
                                <div class="col-md-12 from-group">
                                    <label>Representative name <i class="text-danger">*</i></label>
                                    <input type="text" name="representative_name" class="form-control" required="">
                                </div>
                                <div class="col-md-12 from-group">
                                    <label>Designation <i class="text-danger">*</i></label>
                                    <input type="text" name="designation_name" class="form-control" required="">
                                </div>
                                <div class="col-md-12 from-group">
                                    <label>Product Details <i class="text-danger">*</i></label>
                                    <textarea name="product_details" class="form-control" required=""></textarea>
                                </div>
                                
                                <div class="col-md-12 from-group">
                                    <br/>
                                    <h4>Contact Details</h4><hr/>
                                </div>
                                <div class="col-md-6 from-group">
                                    <label>Contact Number 1 (Shop/Office) <i class="text-danger">*</i></label>
                                    <input type="text" name="contact_num1" class="form-control" required="">
                                </div>
                                <div class="col-md-6 from-group">
                                    <label>Contact Number 2 (Shop/Office)</label>
                                    <input type="text" name="contact_num2" class="form-control">
                                </div>
                                <div class="col-md-6 from-group">
                                    <label>Contact Number 1 (Representative) <i class="text-danger">*</i></label>
                                    <input type="text" name="contact_repres1" class="form-control" required="">
                                </div>
                                <div class="col-md-6 from-group">
                                    <label>Contact Number 2 (Representative)</label>
                                    <input type="text" name="contact_repres2" class="form-control">
                                </div>
                                <div class="col-md-12 from-group">
                                    <label>Email Id <i class="text-danger">*</i></label>
                                    <input type="text" name="email_id" class="form-control" required="">
                                </div>
                                <div class="col-md-12 from-group">
                                    <label>Address <i class="text-danger">*</i></label>
                                    <textarea name="address" class="form-control" required=""></textarea>
                                </div>
                                <div class="col-md-6 from-group">
                                    <label>City <i class="text-danger">*</i></label>
                                    <input type="text" name="city" class="form-control" required="">
                                </div>
                                <div class="col-md-6 from-group">
                                    <label>District <i class="text-danger">*</i></label>
                                    <input type="text" name="district" class="form-control" required="">
                                </div>
                                <div class="col-md-6 from-group">
                                    <label>State <i class="text-danger">*</i></label>
                                    <input type="text" name="state" class="form-control" required="">
                                </div>
                                <div class="col-md-6 from-group">
                                    <label>Pin code <i class="text-danger">*</i></label>
                                    <input type="text" name="pin_code" class="form-control" required="">
                                </div>
                                <div class="col-md-12 from-group">
                                    <br/>
                                    <h4>Documents Required</h4>
                                    <p class="text-danger"><b>Note:- </b>Only JPG,JPEG,PNG File Acceptable</p>
                                    <hr/>
                                </div>
                                <div class="col-md-6 from-group">
                                    <label>Pan Card (Company/Firm) <i class="text-danger">*</i></label>
                                    <input type="file" name="pan_card" class="form-control" required="">
                                </div>
                                <div class="col-md-6 from-group">
                                    <label>Pan Card (Vendor) <i class="text-danger">*</i></label>
                                    <input type="file" name="pan_card_vendor" class="form-control" required="">
                                </div>
                                <div class="col-md-6 from-group">
                                    <label>Passbook/E-Statement (Company/Firm Account) <i class="text-danger">*</i></label>
                                    <input type="file" name="passbook_statement" class="form-control" required="">
                                </div>
                                <div class="col-md-6 from-group">
                                    <label>Address Proof <i class="text-danger">*</i></label>
                                    <input type="file" name="address_proof" class="form-control" required="">
                                </div>
                                <div class="col-md-6 from-group">
                                    <label>Photo (Vendor) <i class="text-danger">*</i></label>
                                    <input type="file" name="photo_vendor" class="form-control" required="">
                                </div>
                                <div class="col-md-12 from-group">
                                    <input type="submit" class="btn btn-primary" value="Send Enquiry">
                                </div>
                            </form>
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
<script src="js/jquery-confirm.js"></script>
<script src="js/wow-min.js"></script>			
<script src="js/classie.js"></script>					
<script src="js/main.js"></script>
<script>
    $(document).ready(function (){
        $("#sell_with_us").submit(function (e){
            e.preventDefault();
            var data = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "api/sell_with_us",
                data: data,
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function (data) {
                    $("#loader").html('<div class="loader loader-default is-active"></div>');
                },
                success: function (data) {
                    if(data == "0"){
                        $.confirm({
                            title: 'Alert!',
                            content: 'Only jpg, jpeg, png file acceptable.',
                            type: 'red',
                            buttons: {
                                Okay: function () {

                                },
                            }
                        });
                    }else if(data == "1"){
                        $.confirm({
                            title: 'Success!',
                            content: 'Your query has been sent successfully. we will contact you shortly',
                            type: 'green',
                            buttons: {
                                Okay: function () {
                                    $("#sell_with_us")[0].reset();
                                },
                            }
                        });
                    }
                },
                complete:function (){
                    $("#loader").html('<div class="loader loader-default"></div>');
                },
            });
        });
    });
</script>
</body>
</html>