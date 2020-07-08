<?php
include './config.php';
$item_per_page = 9;
$results = $db->getone("skyevo_product","COUNT(*) as cnt");
$pages = ceil($results['cnt']/$item_per_page); 
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content=""/>
    <title>Shop</title>
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/color-1.css?v=1.0.0">
    <link rel="stylesheet" href="style.css?v=1.0.0">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/transition.css">
    <link href='https://fonts.googleapis.com/css?family=Merriweather:300,300italic,400italic,400,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic,900italic,900,100italic,100' rel='stylesheet' type='text/css'>
    <script src="js/vendor/modernizr.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="dist/css-loader.css">
    <style>
        .aside-widget img{
            margin-top: -13px !important;
        }
        .rev .pretty{
            margin-top: 10px;
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
                    <li>Shop</li>
                </ul>
            </div>
        </div>
    </div>
    <main class="main-content" style="margin-top: -80px;">
        <div class="product-grid-holder tc-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-8 pull-right pull-none">
                        <div class="filter_data">
                            <div class="row">
                                <div id="results"></div>
                            </div>
                            <div class="pagination-holder">
                                <div class="pagination"></div>
                            </div>
                        </div>
                    </div>
                    <aside class="col-lg-3 col-md-4 pull-left pull-none">
                        <div class="aside-widget">
                            <h6>Search by Category</h6>
                            <div style="max-height: 300px; overflow: auto;">
                                <?php
                                    $db->orderby("category","asc");
                                    $db->where("sub_category","0","=");
                                    $topCat = $db->get("skyevo_category");
                                    for($i=0; $i<sizeof($topCat);$i++){
                                ?>
                                <div class="pretty p-svg p-curve">
                                    <input type="checkbox" value="<?=$topCat[$i]['category']?>" class="common_selector cat"/>
                                    <div class="state p-success">
                                        <!-- svg path -->
                                        <svg class="svg svg-icon" viewBox="0 0 20 20">
                                            <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,
                                                  0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,
                                                  0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                        </svg>
                                        <label><?=$topCat[$i]['category']?></label>
                                    </div>
                                </div><br/>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="aside-widget">
                            <h6>Search by Sub Category</h6>
                            <div style="max-height: 300px; overflow: auto;">
                                <?php
                                    $db->orderby("category","asc");
                                    $db->where("sub_category","0","!=");
                                    $topCat = $db->get("skyevo_category");
                                    for($i=0; $i<sizeof($topCat);$i++){
                                ?>
                                <div class="pretty p-svg p-curve">
                                    <input type="checkbox" value="<?=$topCat[$i]['category']?>" class="common_selector sub_cat"/>
                                    <div class="state p-success">
                                        <!-- svg path -->
                                        <svg class="svg svg-icon" viewBox="0 0 20 20">
                                            <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,
                                                  0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,
                                                  0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                        </svg>
                                        <label><?=$topCat[$i]['category']?></label>
                                    </div>
                                </div><br/>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="aside-widget">
                            <h6>Sort by Reviews</h6>
                            <div class="rev">
                                <div class="pretty p-svg p-curve">
                                    <input type="checkbox" class="common_selector review" value="1"/>
                                    <div class="state p-success">
                                        <svg class="svg svg-icon" viewBox="0 0 20 20">
                                            <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,
                                                  0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,
                                                  0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                        </svg>
                                        <label><img src="<?=$home_url?>images/1.png" class="chk"></label>
                                    </div>
                                </div><br/>
                                <div class="pretty p-svg p-curve">
                                    <input type="checkbox" class="common_selector review"  value="2"/>
                                    <div class="state p-success">
                                        <svg class="svg svg-icon" viewBox="0 0 20 20">
                                            <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,
                                                  0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,
                                                  0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                        </svg>
                                        <label><img src="<?=$home_url?>images/2.png"></label>
                                    </div>
                                </div><br/>
                                <div class="pretty p-svg p-curve">
                                    <input type="checkbox" class="common_selector review" value="3"/>
                                    <div class="state p-success">
                                        <svg class="svg svg-icon" viewBox="0 0 20 20">
                                            <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,
                                                  0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,
                                                  0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                        </svg>
                                        <label><img src="<?=$home_url?>images/3.png" class="chk"></label>
                                    </div>
                                </div><br/>
                                <div class="pretty p-svg p-curve">
                                    <input type="checkbox" class="common_selector review" value="4"/>
                                    <div class="state p-success">
                                        <svg class="svg svg-icon" viewBox="0 0 20 20">
                                            <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,
                                                  0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,
                                                  0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                        </svg>
                                        <label><img src="<?=$home_url?>images/4.png" class="chk"></label>
                                    </div>
                                </div><br/>
                                <div class="pretty p-svg p-curve">
                                    <input type="checkbox" class="common_selector review" value="5"/>
                                    <div class="state p-success">
                                        <svg class="svg svg-icon" viewBox="0 0 20 20">
                                            <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,
                                                  0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,
                                                  0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                                        </svg>
                                        <label><img src="<?=$home_url?>images/5.png" class="chk"></label>
                                    </div>
                                </div><br/>
                            </div>
                        </div>
                        <div class="aside-widet">
                            <h4>Filter by Price</h4>
                            <div class="pricing-slider">
                                <!--<span id="price_show">0 - 300</span>-->
                                <div id="slider-range"></div>
                                <p>
                                    <input type="hidden" id="hidden_minimum_price" value="0" />
                                    <input type="hidden" id="hidden_maximum_price" value="100000" />
                                    <input type="text" id="amount" readonly>
                                </p>
                                
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </main>
    <?php
        include './include/footer.php';
    ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--<script src="js/vendor/jquery.js"></script>-->        
<script src="js/vendor/bootstrap.min.js"></script>
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
<script src="js/main.js?v=1.0.3"></script>
<script src="jquery.bootpag.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function() {
    
	$("#results").load("api/get_all_product");  //initial page number to load
	$(".pagination").bootpag({
            total: <?php echo $pages; ?>,
            page: 1,
            maxVisible: 5 ,
            wrapClass: 'pagination',
            activeClass: 'active',
            disabledClass: 'disabled',
            nextClass: 'next',
            prevClass: 'prev',
            lastClass: 'last',
            firstClass: 'first'
	}).on("page", function(e, num){
		e.preventDefault();
		$("#results").prepend('<div class="loading-indication"><img src="ajax-loader.gif" /> Loading...</div>');
		$("#results").load("api/get_all_product", {'page':num});
                $('body, html').animate({scrollTop:$('body').offset().top}, 'slow');
	});
});
</script>
</body>
</html>