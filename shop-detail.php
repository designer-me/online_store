<?php
include './config.php';

if(isset($_GET['product'])){
    $db->where("pro_title",$_GET['product']);
    $product = $db->get("skyevo_product");
}else{
    $ip = $_SERVER['REMOTE_ADDR'];
    $db->where("pro_id",$_GET['p']);
    $db->where("ip_address",$ip);
    $cnnt = $db->getone("skyevo_recently","COUNT(*) as cnnt");
    if($cnnt['cnnt']=="0"){
        $recent = array(
            "pro_id"=>$_GET['p'],
            "ip_address"=>$ip
        );
        $db->insert("skyevo_recently",$recent);
    }
    
//    echo $_GET['p'];
    $db->where("id",$_GET['p']);
    $product = $db->get("skyevo_product");
}

?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content=""/>
    <title><?=$product[0]['pro_title']?></title>
    <link rel="stylesheet" href="<?=$home_url;?>css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?=$home_url;?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=$home_url;?>css/animate.css">
    <link rel="stylesheet" href="<?=$home_url;?>css/icomoon.css">
    <link rel="stylesheet" href="<?=$home_url;?>css/main.css">
    <link rel="stylesheet" href="<?=$home_url;?>css/color-1.css">
    <link rel="stylesheet" href="<?=$home_url;?>style.css?v=1.0.0">
    <link rel="stylesheet" href="<?=$home_url;?>css/responsive.css">
    <link rel="stylesheet" href="<?=$home_url;?>css/transition.css">
    <link rel="stylesheet" id="skins" href="<?=$home_url;?>css/default.css" type="text/css" media="all">
    <link href='https://fonts.googleapis.com/css?family=Merriweather:300,300italic,400italic,400,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic,900italic,900,100italic,100' rel='stylesheet' type='text/css'>
    <script src="<?=$home_url;?>js/vendor/modernizr.js"></script>
    <link href="<?=$home_url;?>css/jquery-confirm.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?=$home_url;?>dist/css-loader.css">
    <style>
        @media(min-width:1200px){
            .widd{
                width: 20%;
            }
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
        <div class="parallax-window inner-banner tc-padding overlay-dark" data-parallax="scroll" data-image-src="<?=$home_url;?>images/bac_ban.jpg">
            <div class="container">
                <div class="inner-page-heading style-2 h-white">
                    <h2><?=$product[0]['pro_title']?></h2>
                </div>
            </div>
        </div>
    </header>
    <div class="breadcrumb-holder white-bg">
        <div class="container">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="<?=$home_url?>">Home</a></li>
                    <li><?=$product[0]['pro_title']?></li>
                </ul>
            </div>
        </div>
    </div>
    <main class="main-content">
        <div class="product-grid-holder">
            <div class="container">
                <div id="cod_msg">
                    
                </div>
<!--                <div class="add-cart-alert" >
                    <p><i class="fa fa-check-circle"></i>The Complete Book of Vegetables </p>
                    <a class="btn-1 sm pull-right shadow-0" href="my-cart">view cart</a>
                </div>-->
                <form method="post" id="addToCart">
                    <div class="single-product-detail">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="product-thumnbnail">
                                    <ul class="product-slider">
                                        <li>
                                            <img src="<?=$home_url;?>books_image/<?=$product[0]['pro_image']?>" alt="" style="width: 173px; height: 259px;">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-7">
                                <div class="single-product-detail">
                                    <span class="availability">Availability :<strong>Stock<i class="fa fa-check-circle"></i></strong></span>
                                    <h3><?=$product[0]['pro_title']?> </h3>
                                    <ul class="rating-stars">
                                        <?php
                                        if($product[0]['pro_rating'] == "0"){
                                        ?>
                                        <img src="<?=$home_url?>images/0.png">
                                        <?php
                                        }else if($product[0]['pro_rating'] == "1"){
                                        ?>
                                        <img src="<?=$home_url?>images/1.png">
                                        <?php
                                        }else if($product[0]['pro_rating'] == "2"){
                                        ?>
                                        <img src="<?=$home_url?>images/2.png">
                                        <?php
                                        }else if($product[0]['pro_rating'] == "3"){
                                        ?>
                                        <img src="<?=$home_url?>images/3.png">
                                        <?php
                                        }else if($product[0]['pro_rating'] == "4"){
                                        ?>
                                        <img src="<?=$home_url?>images/4.png">
                                        <?php
                                        }else if($product[0]['pro_rating'] == "5"){
                                        ?>
                                        <img src="<?=$home_url?>images/5.png">
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                    <div class="col-md-12" style="margin-top: -10px; margin-bottom: 5px;">
                                        <div class="row">
                                            <strong><span style="font-size: 22px; color: #FF851D;"><i class="fa fa-inr"></i> <?=$product[0]['pro_selling_price']?></span> <?=(($product[0]['pro_actual_price'] != "0")?'<span class="text-danger" style="font-size:14px; margin-left:10px;"><strike><i class="fa fa-inr"></i> '.$product[0]['pro_actual_price'].'</strike></span>':'')?></strong>
                                        </div>
                                    </div>
                                    <div class="book-info-list">
                                        <ul>
                                            <?php if($product[0]['pro_publisher']!=""){?>
                                                <li><span>Publisher: </span><?=$product[0]['pro_publisher']?></li>
                                            <?php }?>
                                            <?php if($product[0]['pro_author']!=""){?>
                                                <li><span>Author: </span><?=$product[0]['pro_author']?></li>
                                            <?php }?>
                                            <?php if($product[0]['pro_board']!=""){?>
                                                <li><span>Board: </span><?=$product[0]['pro_board']?></li>
                                            <?php }?>
                                            <?php if($product[0]['pro_publication_year']!=""){ ?>
                                                <li><span>Publication Year: </span><?=$product[0]['pro_publication_year']?></li>
                                            <?php }?>
                                            <?php if($product[0]['brand']!=""){ ?>
                                                <li><span>Brand: </span><?=$product[0]['brand']?></li>
                                            <?php }?>
                                            <?php if($product[0]['pro_lanuage']!=""){ ?>
                                                <li><span>Language: </span><?=$product[0]['pro_lanuage']?></li>
                                            <?php } ?>
                                            <?php if($product[0]['pro_isbn']!=""){ ?>
                                                <li><span>ISBN: </span><?=$product[0]['pro_isbn']?></li>
                                            <?php } ?>
                                            <?php if($product[0]['pro_pages']!=""){ ?>
                                                <li><span>No. of Pages: </span><?=$product[0]['pro_pages']?></li>
                                            <?php } ?>
                                            <?php if($product[0]['pro_binding']!=""){ ?>
                                                <li><span>Bindig: </span><?=$product[0]['pro_binding']?></li>
                                            <?php }?>
                                            <?php if($product[0]['pro_genre']!=""){ ?>
                                                <li><span>Genre: </span><?=$product[0]['pro_genre']?></li>
                                            <?php }?>
                                            <?php if($product[0]['highlight']!=""){?>
                                               <div id="tab-2">
                                                    <h4>Product Highlight</h4><hr/>
                                                    <div class="description">
                                                        <?=$product[0]['highlight']?>
                                                    </div>
                                                </div>
                                            <?php }?>
                                        </ul>
                                    </div><br/>
                                    <?php // if($product[0]['pro_quant']!=""){?>
                                    <div class="quantity-box">
                                        <label>Qty :</label>
                                        
                                        <div class="input-group widd">
                                            <span class="input-group-btn">
                                                <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                                                    <span class="glyphicon glyphicon-minus"></span>
                                                </button>
                                            </span>
                                            <input type="text" id="quantity" name="qty" class="quntity-input input-number" style="height: 35px;" value="1" maxlength="<?=$product[0]['pro_quant']?>" readonly="">
                                            <span class="input-group-btn">
                                                <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                                    <span class="glyphicon glyphicon-plus"></span>
                                                </button>
                                            </span>
                                        </div>
                                        <input type="hidden" value="<?=$product[0]['id']?>" name="pro_id">
                                        <input type="hidden" value="<?=$product[0]['pro_selling_price']?>" name="price">
                                    </div>
                                <?php // } ?>
                                    <ul class="btn-list">
                                        <li><button class="btn-1 sm shadow-0 " type="submit">add to cart</button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="disc-nd-reviews tc-padding-bottom">
                    <div class="row">
                        <div id="disc-reviews-tabs" class="disc-reviews-tabs">

                            <!-- Tabs Nav -->
                            <div class="col-lg-3 col-xs-12">
                                <div class="tabs-nav">
                                    <ul>
                                        <!--<li><a href="#tab-1">Reviews</a></li>-->
                                        <li><a href="#tab-2">Description</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Tabs Nav -->

                            <!-- Tabs Content -->
                            <div class="col-lg-9 col-xs-12">
                                <div class="tabs-content">
                                    <!-- Reviews -->
                                    <div id="tab-1">
                                        <div class="reviews">
                                            <!-- Related Products -->
                                            <div class="related-products">
                                                <h5>You May <span>also like this</span></h5>
                                                <div class="related-produst-slider">
                                                    <?php
                                                        $db->where("status","1");
                                                        $db->where("id",$product[0]['id'],'!=');
                                                        $db->where("pro_category",$product[0]['pro_category']);
                                                        $pro = $db->get("skyevo_product",3);
                                                        for($i=0;$i<sizeof($pro);$i++){
                                                            $desc = strip_tags($pro[$i]['description']);
                                                    ?>
                                                    <div class="item">
                                                        <div class="product-box">
                                                            <div class="product-img">
                                                                <img src="<?=$home_url;?>books_image/<?= $pro[$i]['pro_image'] ?>" alt="<?= $pro[$i]['pro_title'] ?>" title="<?= $pro[$i]['pro_title'] ?>" style="width: 132px; height: 197px;">
                                                                <ul class="product-cart-option position-center-x">
                                                                    <li><a href="<?=$home_url;?>shop-detail/<?= $pro[$i]['id'] ?>/<?= $pro[$i]['pro_slug'] ?>"><i class="fa fa-eye"></i></a></li>
                                                                    <li><a href="<?=$home_url;?>shop-detail/<?= $pro[$i]['id'] ?>/<?= $pro[$i]['pro_slug'] ?>"><i class="fa fa-cart-arrow-down"></i></a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="product-detail">
                                                                <h5><?= substr($pro[$i]['pro_title'], 0, 15) ?>...</h5>
                                                                <p><?= substr($desc, 0, 26) ?>...</p>
                                                                <div class="rating-nd-price">
                                                                    <strong><i class="fa fa-inr"></i> <?= $pro[$i]['pro_selling_price'] ?> <?= (($pro[$i]['pro_actual_price'] != "") ? '<span class="text-danger" style="font-size:14px;"><strike><i class="fa fa-inr"></i> ' . $pro[$i]['pro_actual_price'] . '</strike></span>' : '') ?></strong>
                                                                    <ul class="rating-stars">
                                                                        <?php
                                                                        if($pro[$i]['pro_rating'] == "0"){
                                                                        ?>
                                                                        <img src="<?=$home_url?>images/0.png">
                                                                        <?php
                                                                        }else if($pro[$i]['pro_rating'] == "1"){
                                                                        ?>
                                                                        <img src="<?=$home_url?>images/1.png">
                                                                        <?php
                                                                        }else if($pro[$i]['pro_rating'] == "2"){
                                                                        ?>
                                                                        <img src="<?=$home_url?>images/2.png">
                                                                        <?php
                                                                        }else if($pro[$i]['pro_rating'] == "3"){
                                                                        ?>
                                                                        <img src="<?=$home_url?>images/3.png">
                                                                        <?php
                                                                        }else if($pro[$i]['pro_rating'] == "4"){
                                                                        ?>
                                                                        <img src="<?=$home_url?>images/4.png">
                                                                        <?php
                                                                        }else if($pro[$i]['pro_rating'] == "5"){
                                                                        ?>
                                                                        <img src="<?=$home_url?>images/5.png">
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <!-- Related Products -->

                                        </div>
                                    </div>
                                    <br/>
                                    <div id="tab-2">
                                        <h3>Product Description</h3><hr/>
                                        <div class="description">
                                            <p><?=$product[0]['description']?></p>
                                        </div>
                                    </div>
                                    
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
<script src="<?=$home_url;?>js/vendor/jquery.js"></script>
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>   
<script src="<?=$home_url;?>js/vendor/bootstrap.min.js"></script>
<script src="<?=$home_url;?>js/gmap3.min.js"></script>					
<script src="<?=$home_url;?>js/datepicker.js"></script>					
<script src="<?=$home_url;?>js/contact-form.js"></script>					
<script src="<?=$home_url;?>js/bigslide.js"></script>					
<script src="<?=$home_url;?>js/3d-book-showcase.js"></script>					
<script src="<?=$home_url;?>js/turn.js"></script>							
<script src="<?=$home_url;?>js/jquery-ui.js"></script>								
<script src="<?=$home_url;?>js/mcustom-scrollbar.js"></script>					
<script src="<?=$home_url;?>js/timeliner.js"></script>					
<script src="<?=$home_url;?>js/parallax.js"></script>			   	 
<script src="<?=$home_url;?>js/countdown.js"></script>	
<script src="<?=$home_url;?>js/countTo.js"></script>		
<script src="<?=$home_url;?>js/owl-carousel.js"></script>	
<script src="<?=$home_url;?>js/bxslider.js"></script>	
<script src="<?=$home_url;?>js/appear.js"></script>		 		
<script src="<?=$home_url;?>js/sticky.js"></script>			 		
<script src="<?=$home_url;?>js/prettyPhoto.js"></script>			
<script src="<?=$home_url;?>js/isotope.pkgd.js"></script>					 
<script src="<?=$home_url;?>js/wow-min.js"></script>			
<script src="<?=$home_url;?>js/classie.js"></script>					
<script src="<?=$home_url;?>js/main.js"></script>
<script src="<?=$home_url;?>js/jquery-confirm.js"></script>
</body>
</html>
<script>
    $(document).ready(function(){

var quantitiy=0;
   $('.quantity-right-plus').click(function(e){
        
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        
        // If is not undefined
            
            $('#quantity').val(quantity + 1);

          
            // Increment
        
    });

     $('.quantity-left-minus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        
        // If is not undefined
      
            // Increment
            if(quantity>1){
            $('#quantity').val(quantity - 1);
            }
    });
    
});
</script>
<script>
    $(document).ready(function(){
        $("#addToCart").submit(function(e){
             e.preventDefault();
            var data = $(this).serialize();
            var link = '<?=$home_url?>';
            $.ajax({
                type: 'POST',
                data: data,
                url: link+"add-to-cart",
                beforeSend: function () {
                $("#loader").html('<div class="loader loader-default is-active"></div>');
                },
            success: function (res) {
                if(res == "0"){
                    $.confirm({
                        title: 'Alert!',
                        content: 'You have exceed max Quantity.',
                        type: 'red',
                        buttons: {
                            Okay: function () {
//                              location.reload();  
                            },
                        }
                    });
                }else{
                    $.confirm({
                        title: 'Success!',
                        content: 'Product Successfully Inserted in your cart.',
                        type: 'green',
                        buttons: {
                            Okay: function () {
                               window.location.href="<?=$home_url;?>my-cart";
                            },
                        }
                    });
                }
            },
            complete: function () {
                $("#loader").html('<div class="loader loader-default"></div>');
            }
            });
        });
    });
</script>