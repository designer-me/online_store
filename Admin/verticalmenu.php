<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">
        <style> 

        .panel {
          border: 1px solid transparent;
          border-radius:0px;
          -webkit-box-shadow:none;
                  box-shadow:none;
        }

        .panel-default{
            margin: 0px;
          background-color: red;
        }
        .panel-body {
          padding-top:0px;
          padding-bottom: 0px;
        }
        .panel-heading {
          padding: 10px 15px;
          height: 40px;
          border-bottom:none;
          border-top-left-radius:0px;
          border-top-right-radius:0px;
        }
        .panel-title {
          margin-top: 0;
          margin-bottom: 0;
          font-size: 16px;
          color: inherit;
        }
        .panel-title > a,
        .panel-title > small,
        .panel-title > .small,
        .panel-title > small > a,
        .panel-title > .small > a {
          color: inherit;
          text-decoration:none;
        }

        .panel-group {
          margin-bottom:0px;
        }
        .panel-group .panel {
          margin-bottom: 0;
          border-radius:0px;
        }
        .panel-group .panel + .panel {
          margin-top:0px;
        }
        .panel-group .panel-heading {
          border-bottom: 0;
        }
        .panel-group .panel-heading + .panel-collapse > .panel-body,
        .panel-group .panel-heading + .panel-collapse > .list-group {
          border-top:none;
        }
        .panel-group .panel-footer {
          border-top: 0;
        }
        .panel-group .panel-footer + .panel-collapse .panel-body {
          border-bottom:none;
        }

        .nav-pills > li {
          float: left;
          border-bottom: 1px solid black;
          background-color: rgb(118, 207, 252);
          border-top: 1px solid black;
        }
        .nav-pills > li > a {
          border-radius: 0px;
          
          padding-left: 40px;
          background-color:rgb(118, 207, 252);
          color: black;
        }
        .nav-pills > li:hover,
        .nav-pills > li:focus{
            background-color:rgb(118, 207, 252);
        }
        .nav-pills > li + li {
          margin-left: 2px;
        }
        .nav-pills > li.active > a,
        .nav-pills > li.active > a:hover,
        .nav-pills > li.active > a:focus {
          color: #fff;
          background-color:rgb(118, 207, 252);
        }
        .nav-stacked > li {
          float: none;
        }
        .nav-stacked > li + li {
          margin-top:0px;
          margin-left: 0;
        }
        </style>        
        <title></title>
    </head>
<body>
<div class="row">
    <div class="panel-group" id="accordion">
        <div class="panel panel-default" style="background-color: black;">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="AdminPage">
                        <span class="glyphicon glyphicon-dashboard" style="padding-right: 10px;"></span>Dashboard 
                    </a>
                </h4>
            </div>
        </div>
<!--        <div class="panel panel-default" style="background-color: black;">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="shipinfo.php">
                        <span class="fa fa-shopping-bag" style="padding-right: 10px;"></span>Shipping Information 
                    </a>

                </h4>
            </div>
        </div>
        <div class="panel panel-default" style="background-color: black;">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="contactus.php">
                        <span class="fa fa-envelope-o" style="padding-right: 10px;"></span>Messages 
                    </a>
                </h4>
            </div>
        </div>  
        <div class="panel panel-default" style="background-color: black;">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#accordionOne1">
                        <span class="fa fa-cog" style="padding-right: 8px;"></span> Report <span class="fa fa-chevron-down pull-right"></span>
                    </a>
                </h4>
            </div>
            <div id="accordionOne1" class="panel-collapse collapse">
                <div class="panel-body">
                    <ul class="row nav nav-pills nav-stacked">
                        <li><a href="order_report.php"><span class="fa fa-file-text" style="padding-right: 8px;"></span>Order Report</a></li>
                    </ul>                           
                </div>
            </div>
        </div>
-->        <div class="panel panel-default" style="background-color: black;">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#accordionOne">
                        <span class="glyphicon glyphicon-credit-card" style="padding-right: 8px;"></span> Orders <span class="fa fa-chevron-down pull-right"></span>
                    </a>
                </h4>
            </div>
            <div id="accordionOne" class="panel-collapse collapse">
                <div class="panel-body">
                    <ul class="row nav nav-pills nav-stacked">
                        <li><a href="orders.php"><span class="fa fa-file-text" style="padding-right: 8px;"></span>All Orders</a></li>
<!--                        <li><a href="deliver.php"><span class="fa fa-file-text" style="padding-right: 8px;"></span>Delivered</a></li>
                        <li><a href="pending.php"><span class="fa fa-file-text" style="padding-right: 8px;"></span>Pending</a></li>
                        <li><a href="return.php"><span class="fa fa-file-text" style="padding-right: 8px;"></span>Return</a></li>-->
                    </ul>                           
                </div>
            </div>
        </div>
        <div class="panel panel-default" style="background-color: black;">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="category">
                        <span class="glyphicon glyphicon-grain" style="padding-right: 10px;"></span>Category 
                    </a>
                </h4>
            </div>
        </div> 
        <div class="panel panel-default" style="background-color: black;">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="board">
                        <span class="glyphicon glyphicon-education" style="padding-right: 10px;"></span>Board
                    </a>

                </h4>
            </div>
        </div>  
        <div class="panel panel-default" style="background-color: black;">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="publishers">
                        <span class="glyphicon glyphicon-leaf" style="padding-right: 10px;"></span>Publisher
                    </a>
                </h4>
            </div>
        </div>  
<!--        <div class="panel panel-default" style="background-color: black;">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="writing.php">
                        <span class="glyphicon glyphicon-edit" style="padding-right: 10px;"></span>Writing
                    </a>

                </h4>
            </div>
        </div> -->
        <div class="panel panel-default" style="background-color: black;">
            <div class="panel-heading"> 
                <h4 class="panel-title">

                    <a href="fetchproducts">
                        <span class="fa fa-product-hunt" style="padding-right: 10px;"></span>Products
                    </a>

                </h4>
            </div>
        </div>
        <div class="panel panel-default" style="background-color: black;">
            <div class="panel-heading">
                <h4 class="panel-title">

                    <a href="fetchvenders">
                        <span class="glyphicon glyphicon-gift" style="padding-right: 10px;"></span>Sell With Us
                    </a>

                </h4>
            </div>
        </div><!--
-->        <div class="panel panel-default" style="background-color: black;">
            <div class="panel-heading">
                <h4 class="panel-title">

                    <a href="fetchusers.php">
                        <span class="glyphicon glyphicon-user" style="padding-right: 10px;"></span>Users
                    </a>
                </h4>
            </div>
        </div> <!--
        <div class="panel panel-default" style="background-color: black;">
            <div class="panel-heading">
                <h4 class="panel-title">               
                    <a href="search.php">
                        <span class="glyphicon glyphicon-search" style="padding-right: 10px;"></span>Search
                    </a>     
                </h4>
            </div>
        </div>
-->        <div class="panel panel-default" style="background-color: black;">
            <div class="panel-heading"> 
                <h4 class="panel-title">
                    <a href="archive.php">
                        <span class="fa fa-archive" style="padding-right: 10px;"></span>Disable Products
                    </a>     
                </h4>
            </div>
        </div>
    </div>
</div>
</body>
</html>


