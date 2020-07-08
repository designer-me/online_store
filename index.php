<?php
include './config.php';
if(isset($_SESSION['shipId']))
{
    unset($_SESSION['shipId']);
}
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
       <meta charset="utf-8"/>
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />
     <meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes" />
    <title>Your Online Shop</title>
    <link rel="icon" href="images/icon.png">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/color-1.css">
    <link rel="stylesheet" href="style.css?v=1.0.5">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/transition.css">
    <link rel="stylesheet" href="css/owl.css">
    <link rel="stylesheet" id="skins" href="css/default.css" type="text/css" media="all">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link href='https://fonts.googleapis.com/css?family=Merriweather:300,300italic,400italic,400,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic,900italic,900,100italic,100' rel='stylesheet' type='text/css'>
    <script src="js/vendor/modernizr.js"></script>
    <link rel="stylesheet" href="dist/css-loader.css">
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
        <div id="main-slider" class="main-slider">
<!--
            <div class="item">
                <a href="https://skyevo.in/education/">
                    <img src="images/banner/banner1.jpg" alt="">
                </a>
            </div>
-->
            <div class="item">
                <a href="https://skyevo.in/education/our-program">
                    <img src="images/banner/book.jpg" alt="" >
                </a>
            </div>
            <div class="item">
                <a href="https://skyevo.in/education/employee-login">
                    <img src="images/banner/banner4.jpg" alt="">
                </a>
            </div>
<!--
            <div class="item">
                <a href="http://skyevo.in/">
                    <img src="images/banner/dis.jpg" alt="">
                </a>
            </div>
-->
        </div>

    <main class="main-content">
        <section class="upcoming-release">
            <div class="container-fluid p-0">
                <div class="release-heading pull-right h-white">
                    <h5>New Release</h5>
                </div>
            </div>
            <div class="upcoming-slider">
                <div class="container">
                    <div class="release-book-detail h-white p-white">
                        <div class="release-book-slider">
                            <?php
                                $db->where("status","1");
                                $db->orderby("id","desc");
                                $newBook = $db->get("skyevo_product",5);
                                for($new=0;$new<sizeof($newBook);$new++){
                                    $desc = strip_tags($newBook[$new]['description']);
                            ?>
                            <div class="item">
                                <div class="detail">
                                    <h5><a href="shop-detail/<?=$newBook[$new]['id']?>/<?=$newBook[$new]['pro_slug']?>"><?= substr($newBook[$new]['pro_title'],0,20)?>...</a></h5>
                                    <p><?=substr($desc,0,100)?>...</p>
                                    <span>Rs <?=$newBook[$new]['pro_selling_price'];?></span>
                                    <i class="fa fa-angle-double-right"></i>
                                </div>
                                <div class="detail-img">
                                    <img src="books_image/<?=$newBook[$new]['pro_image']?>" title="<?=$newBook[$new]['pro_title']?>" alt="<?=$newBook[$new]['pro_title']?>" style="width: 112px; height: 156px;">
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    <div class="release-thumb-holder">
                        <ul id="release-thumb" class="release-thumb">
                            <?php
                            $db->where("status","1");
                                $db->orderby("id","desc");
                                $newBook = $db->get("skyevo_product",5);
                                for($new=0;$new<sizeof($newBook);$new++){
                                    $desc = strip_tags($newBook[$new]['description']);
                            ?>
                            <li>
                                <a data-slide-index="<?=$new;?>" href="">
                                    <span><?= substr($newBook[$new]['pro_title'],0,6)?>...</span>
                                    <img src="books_image/<?=$newBook[$new]['pro_image']?>" title="<?=$newBook[$new]['pro_title']?>" alt="<?=$newBook[$new]['pro_title']?>" style="width: 94px; height: 122px; ">
                                    <img class="b-shadow" src="images/upcoming-release/b-shadow.png" alt="">
                                </a>
                            </li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
   
        


<section class="details">
    
            <div class="back-link">
                
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 400.004 400.004" style="enable-background:new 0 0 400.004 400.004;" fill="rgb(234,234,234)" xml:space="preserve">
            <g>
              <path d="M382.688,182.686H59.116l77.209-77.214c6.764-6.76,6.764-17.726,0-24.485c-6.764-6.764-17.73-6.764-24.484,0L5.073,187.757
                c-6.764,6.76-6.764,17.727,0,24.485l106.768,106.775c3.381,3.383,7.812,5.072,12.242,5.072c4.43,0,8.861-1.689,12.242-5.072
                c6.764-6.76,6.764-17.726,0-24.484l-77.209-77.218h323.572c9.562,0,17.316-7.753,17.316-17.315
                C400.004,190.438,392.251,182.686,382.688,182.686z"></path>
            </g>
            </svg>
    </div>
        </section>
 
      
          <section class="best-seller tc-padding">
        <div class="container">
             <div class="main-heading-holder">
                 <div class="main-heading style-1">
                        <h2>We <span class="theme-color">Serve Your</span> Need</h2>
                  
                 </div>
                    </div>
          
<div class="container">     
    <div class="row">
        <div class="row">
            <div class="col-md-9">
            <p> Lead your way towards management, satisfaction and perfection. We fulfil your necessity requirement quickly. Digital change tends to change the global trends. </p>
            </div>
            <div class="col-md-3">
                <!-- Controls -->
                <div class="controls pull-right hidden-xs">
                    <a class="left fa fa-chevron-left btn btn-primary" href="#carousel-example-generic"
                        data-slide="prev"></a><a class="right fa fa-chevron-right btn btn-primary" href="#carousel-example-generic"
                            data-slide="next"></a>
                </div>
           
            </div></div>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="images/final_banner/bookstore.jpg" class="img-responsive" alt="a" />
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-6">
                                            <h5>
                                                Bookstore</h5>
                                          <br>
                                        </div>
                                     
                                    </div>
                                 
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="images/final_banner/discusion1.jpg" class="img-responsive" alt="a" />
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-6">
                                            <h5>
                                                Discussion Forum</h5>
                                           <br>
                                        </div>
                                      
                                    </div>
                               
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="images/final_banner/emp.jpg" class="img-responsive" alt="a" />
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-6">
                                            <h5>
                                                Employee Management Syetem</h5>
                                        
                                        </div>
                                    
                                    </div>
                              
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="row">   
                 
                   
                        <div class="col-sm-4">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="images/final_banner/onlineclasses.jpg" class="img-responsive" alt="a" />
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-6">
                                            <h5>
                                                E-School</h5>
                                            <br>
                                        </div>
                                     
                                    </div>
                              
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>      
                        <div class="col-sm-4">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="images/final_banner/ONLINECOACHING.jpg" class="img-responsive" alt="a" />
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-6">
                                            <h5>
                                                E-Coaching</h5>
                                            <br>
                                        </div>
                                     
                                    </div>
                              
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>     
                        <div class="col-sm-4">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="images/final_banner/olym.jpg" class="img-responsive" alt="a" />
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-6">
                                            <h5>
                                                STSE</h5>
                                            <br>
                                        </div>
                                     
                                    </div>
                              
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>     
                <div class="item">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="images/final_banner/fashion.jpg" class="img-responsive" alt="a" />
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-6">
                                            <h5>
                                                Skyevo Fashion</h5>
                                           <br>
                                        </div>
                                      
                                    </div>
                               
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="images/final_banner/graphic.jpg" class="img-responsive" alt="a" />
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-6">
                                            <h5>
                                               Graphic Design</h5>
                                          <br>
                                        </div>
                                
                                    </div>
                                
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="images/final_banner/printings.jpg" class="img-responsive" alt="a" />
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-6">
                                            <h5>
                                                Printing</h5>
                                            <br>
                                        </div>
                                     
                                    </div>
                              
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>   
                     
             
                       
                     
                   
                    </div>
                </div>
                <div class="item">
                    <div class="row">
                 
                 
                        <div class="col-sm-4">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="images/final_banner/printings.jpg" class="img-responsive" alt="a" />
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-6">
                                            <h5>
                                                Printing</h5>
                                            <br>
                                        </div>
                                     
                                    </div>
                              
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>   
                   
                        <div class="col-sm-4">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="images/final_banner/schooldress.jpg" class="img-responsive" alt="a" />
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-6">
                                            <h5>
                                                Stationery</h5>
                                            <br>
                                        </div>
                                     
                                    </div>
                              
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>   
                       
                     
                   
                    </div>
                </div>
            </div>
        </div>
    </div>
            </div>
        
            </div>
        </section>
 <section class="add-banners-holder tc-padding-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="add-banner add-banner-1">
                            <div class="z-inedex-2 p-relative">
                                <h3>Free Delivery</h3>
                                <p>Now Delivery anything anywhere with lightning speed</p>
                                <hr>
<!--                                <strong class="font-merriweather">Buy Now 280.99 <sup><i class="fa fa-inr"></i> </sup></strong>-->
                            </div>
                            <img class="adds-book" src="images/add-banners/add-books/img-01.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="add-banner add-banner-2">
                            <div class="z-inedex-2 p-relative">
                                <strong>Look Books</strong>
                                <h3>Up to 20% off</h3>
                                <hr>
                                <p>of advance enternce exam Books</p>
                            </div>
                            <img class="adds-book" src="images/add-banners/add-books/img-02.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
          
<!--
        <section class="add-banners-holder tc-padding-bottom">
            <div class="container">
                   <div class="main-heading-holder">
                    <div class="main-heading style-1">
                        <h2>Discount <span class="theme-color">Banner</span></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                       

                    \

                            <img class="adds-book" src="images/discount.jpg" style="height:300px;widht:100%;border:1px solid black"alt="">
                        
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        


                            <img class="adds-book" src="images/free_delivery.jpg" style="height:300px;widht:100%;border:1px solid black"alt="">
                    
                    </div>
                </div>
            </div>
        </section>
-->
        <div class="recomended-products tc-padding">
            <div class="container">
                <div class="main-heading-holder">
                    <div class="main-heading">
                        <h2>Staff <span class="theme-color">Recomended </span> Books</h2>
                    </div>
                </div>
                <div class="recomend-slider">
                    <?php
                        $db->where("status","1");
                        $db->orderby("id","asc");
                        $staff = $db->get("skyevo_product",20);
                        for($s=0;$s<sizeof($staff);$s++){
                    ?>
                    <div class="item">
                        <a href="shop-detail/<?=$staff[$s]['id']?>/<?=$staff[$s]['pro_slug']?>"><img src="books_image/<?=$staff[$s]['pro_image']?>" title="<?=$staff[$s]['pro_title']?>" alt="<?=$staff[$s]['pro_title']?>" style="width: 109px; height: 150px; "></a>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
   
   <section class="book-collection">
            <div class="container">
                <div class="row">
                    <div id="book-collections-tabs">
                        <div class="col-lg-3 col-sm-12">
                            <div class="sidebar">
                                <h4>Top Catagories</h4>
                                <ul>
                                    <?php
                                        $db->orderby("category","asc");
                                        $db->where("sub_category","0","!=");
                                        $topCat = $db->get("skyevo_category",20);
                                        for($i=0; $i<sizeof($topCat);$i++){
                                    ?>
                                    <li><a href="#" onclick="cat_data('<?=$topCat[$i]['category']?>')"><?=$topCat[$i]['category']?></a></li>
                                    <?php
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9 col-sm-12">
                            <div class="collection">
                                <div class="sec-heading">
                                    <h3>Selling <span class="theme-color">Collection</span> </h3>
                                    <a class="view-all" href="#">View All<i class="fa fa-angle-double-right"></i></a>
                                </div>
                                <div class="collection-content">
                                    <ul>
                                        <div id="data_cat">
                                            <?php
                                                $db->where("status","1");
                                                $db->orderby("id","desc");
                                                $bookColl = $db->get("skyevo_product",10);
                                                for($i=0;$i<sizeof($bookColl);$i++){
                                            ?>
                                            <li>
                                                <div class="s-product">
                                                    <div class="s-product-img">
                                                        <img src="books_image/<?=$bookColl[$i]['pro_image']?>" alt="" style=" " class="img-responsive product_img" >
                                                        <div class="s-product-hover">
                                                            <div class="position-center-x">
                                                                <a href="shop-detail/<?=$bookColl[$i]['id']?>/<?=$bookColl[$i]['pro_slug']?>" class="plus-icon"><i class="fa fa-shopping-cart"></i></a>
                                                                    <!--<a class="btn-1 sm shadow-0" data-toggle="modal" data-target="#quick-view" href="#"></a>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h6><a href="shop-detail/<?=$bookColl[$i]['id']?>/<?=$bookColl[$i]['pro_slug']?>"><?= substr($bookColl[$i]['pro_title'],0,15)?>...</a></h6>
                                                    <span><?= substr($bookColl[$i]['pro_author'],0,15)?></span>
                                                </div>
                                            </li>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </ul>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
 
        
    </main>

    <?php
    include './include/footer.php';
    ?>
</div>
<script src="js/vendor/jquery.js"></script> 
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
<script src="js/main.js?v=1.0.2"></script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="js/revolution.extension.carousel.min.js"></script>
<script>
    function cat_data(cat){
        if (cat=="") {
            document.getElementById("data_cat").innerHTML="";
            return;
          } 
          if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
          } else { // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange=function() {
            if (this.readyState==4 && this.status==200) {
              document.getElementById("data_cat").innerHTML=this.responseText;
            }
          }
          xmlhttp.open("GET","api/sort_by_category?cat="+cat,true);
          xmlhttp.send();
    }
</script>
</body>
</html>
<script>
	  $(document).ready(function(){
            var submitIcon = $('.searchbox-icon');
            var inputBox = $('.searchbox-input');
            var searchBox = $('.searchbox');
            var isOpen = false;
            submitIcon.click(function(){
                if(isOpen == false){
                    searchBox.addClass('searchbox-open');
                    inputBox.focus();
                    isOpen = true;
                } else {
                    searchBox.removeClass('searchbox-open');
                    inputBox.focusout();
                    isOpen = false;
                }
            });  
             submitIcon.mouseup(function(){
                    return false;
                });
            searchBox.mouseup(function(){
                    return false;
                });
            $(document).mouseup(function(){
                    if(isOpen == true){
                        $('.searchbox-icon').css('display','block');
                        submitIcon.click();
                    }
                });
        });
            function buttonUp(){
                var inputVal = $('.searchbox-input').val();
                inputVal = $.trim(inputVal).length;
                if( inputVal !== 0){
                    $('.searchbox-icon').css('display','none');
                } else {
                    $('.searchbox-input').val('');
                    $('.searchbox-icon').css('display','block');
                }
            }
</script>
<script>
$(document).ready(function(){
$('.carousel[data-type="multi"] .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));
  
  for (var i=0;i<4;i++) {
    next=next.next();
    if (!next.length) {
        next = $(this).siblings(':first');
  	}
    
    next.children(':first-child').clone().appendTo($(this));
  }
});
});
</script>
