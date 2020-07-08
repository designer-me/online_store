<?php
session_name('skyevo-front');
session_start();

//$home_url = "http://localhost/bookstore/";
$home_url = "https://skyevo.in/";
//ini_set('upload_max_filesize', '600000');
require_once ('MysqliDb.php');
$mysqli = new mysqli ('localhost', 'root', '', 'skyevo');
$mysqli->query("set sql_mode = '' ") or die(mysqli_error());
$db = new MysqliDb ($mysqli);
//if($db){
//    echo 'connect';
//}
date_default_timezone_set("Asia/Kolkata");
$date = date("Y-m-d H:i:s");

define("CART_COOKIE","skyevo_product_cart");
define('CART_COOKIE_EXPIRE',time()+(86400));
$cart_id='';
if(isset($_COOKIE[CART_COOKIE])){
    $cart_id=  $_COOKIE[CART_COOKIE];
}
?>