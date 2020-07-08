<style>

    .autocomplete {
  /*the container must be positioned relative:*/
  position: relative;
  display: inline-block;
        width: 300px;
}
autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
    
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9; 
}

.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}

</style>
<style>
    @media(min-width:375px){
/*
        .search-bar.style-2 input {
            height: 43px;
            line-height: 43px;
            width: 250px;
            border: 1px solid #e6e6e6;
        }
        .search-bar.style-2 .sub-btn {
            position: absolute;
            top: 0;
            right: 0;
            border-radius: 0;
            height: 43px;
            line-height: 43px;
            padding: 0px 34px;
            width: auto;
        }
        .search-bar.style-2 {
            margin: 0;
            position: relative;
            width: 270px;
             padding-left: 121px; 
            margin-right: -132px;
            margin-left: 10px;
            margin-top: 10px;
        }
*/

    }
/*
    .online-option a{
      color:#fff !important;
    }
*/
</style>
 <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<div class="topbar">
        <div class="container">
            <div class="online-option">
<!--                <ul>
                    <li><a href="#">online store</a></li>
                    <li><a href="#">Payment</a></li>
                    <li><a href="#">shipping</a></li>
                    <li><a href="#">Return</a></li>
                </ul>-->
                <!-- <ul class="list-inline pull-left icon"> -->
                    <!-- <li> -->
                        <a href="#" style="color:white"><i class="icofont icofont-ui-call"></i>Email @ sky.talent@skyevo.in</a>
                    <!-- </li> -->
                    <!-- <li>
                        <a href=""><i class="icofont icofont-support-faq"></i>faq</a>
                    </li> -->
                <!-- </ul> -->
            </div>
            <div class="social-icons pull-right">
                <ul>
                    <li><a class="fa fa-facebook" href="#"></a></li>	
                    <li><a class="fa fa-twitter" href="#"></a></li>
                    <li><a class="fa fa-youtube-play" href="#"></a></li>
                    <li><a class="fa fa-google-plus" href="#"></a></li>
                </ul>
            </div>
			
            <div class="cart-option">
                <ul>
                    <div id="TopCart1">
                    <?php
                    if(!empty($cart_id)): 
                    $db->where("id",$cart_id);    
                    $cart = $db->get("skyevo_cart");
                    $array = json_decode($cart[0]['cart_item'],TRUE);
                    $size =  sizeof($array);
                    ?>
                    <li class="add-cart"><a href="<?=$home_url;?>my-cart"><i class="fa fa-shopping-bag"></i><span><?=$size?></span></a></li>
                    <?php else: ?>
                    <li class="add-cart"><a href="<?=$home_url;?>my-cart"><i class="fa fa-shopping-bag"></i><span>0</span></a></li>
                    <?php endif; ?>
                    </div>
                </ul>
            </div>
        </div>
    </div>
<header>

<!--
        <div class="row">
            <br/>
            <div class="col-md-12">
                <center>
                    <img src="images/header1.jpeg" class="img-responsive">
                </center>
            </div>
        </div>
-->
      
        <div class="row" style="">
            <div class="container">
                     <div class="col-md-1 col-sm-1 col-xs-12">
                <div class="logo">
                   <a href="index"><img src="./images/logo.png"></a>
                         </div>
            </div>
            <div class="col-md-11 col-sm-11 col-xs-12">
                <div id="menu" class="pull-left">	
                    <nav class="navbar">
                        <div class="navbar-header">
                            <span class="menutext visible-xs"><a href="index"><img src="./images/logo.png"></a></span>
                            <button data-target=".navbar-ex1-collapse" data-toggle="collapse" class="btn btn-navbar navbar-toggle" type="button">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse navbar-ex1-collapse padd0">
                            <ul class="nav navbar-nav sidenav">
                                <li>
                                    <a href="index"><i class="fa fa-home"></i> HOME</a>
                                </li>
                                <li class="dropdown-icon ">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-shopping-bag"></i> Categories</a>
                                         <div class="dropdown-menu repeating">
                                        <div class="dropdown-inner">
                                            <ul class="list-unstyled">
<!--
                                                <li>
                                                    <a href="about-us">About Us</a>
                                                </li>
                                                 <li>
                                                    <a href="our-vision">Our Vision</a>
                                                </li> 
-->
<!--
                                                <li>
                                                    <a href="our_mission">Our Mission </a>
                                                </li>
-->
                                        
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-icon"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-globe"></i> More</a>
                                    <div class="dropdown-menu repeating">
                                        <div class="dropdown-inner">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <a href="sell-with-us">Sell With Us</a>
                                                </li>
                                               <!--  <li>
                                                    <a href="our-vision">Our Vision</a>
                                                </li> -->
                                                <li>
                                                    <a href="our-program">Contact US</a>
                                                </li>
                                                
                                                <!-- <li>
                                                    <a href="stse-contact-us">Contact Us</a>
                                                </li> -->
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                
                        
                                 <li class="dropdown-icon"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-globe"></i> My Account</a>
                                    <div class="dropdown-menu repeating">
                                        <div class="dropdown-inner">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <a href="login">Login</a>/<a href="login">Sign-Up</a>
                                                </li>
                                               <!--  <li>
                                                    <a href="our-vision">Our Vision</a>
                                                </li> -->
<!--
                                                <li>
                                                    <a href="our-program">Contact US</a>
                                                </li>
-->
                                                
                                                <!-- <li>
                                                    <a href="stse-contact-us">Contact Us</a>
                                                </li> -->
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                             <li>
                            <form class="search-bar style-2" action="shop-detail">
                                <div class="autocomplete">
                                    <input type="text" name="product" id="myInput" class="form-control" autocomplete="off" required="required" placeholder="Type a search here...">
                                </div>
                                <button class="sub-btn fa fa-search"></button>
                            </form>
                        </li>
                          
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            </div>
        </div>
  
</header>
<script>
if ($(window).width() > 992) {
  $(window).scroll(function(){  
     if ($(this).scrollTop() > 40) {
        $('.nav-holder').addClass("fixed-top");
        // add padding top to show content behind navbar
        $('body').css('padding-top', $('.navbar').outerHeight() + 'px');
      }else{
        $('.nav-holder').removeClass("fixed-top");
         // remove padding top from body
        $('body').css('padding-top', '0');
      }   
  });
}
</script>
<!-- Slide Menu -->
<script>
    var city = [];
</script>
<?php
$pro = $db->get("skyevo_product");
foreach ($pro as $pro1){
?>
<script>
    city.push("<?=$pro1['pro_title']?>");
</script>
<?php
}
?>
<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
var countries = city;

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), countries);
</script>
