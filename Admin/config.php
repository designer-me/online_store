<?php
session_start();
session_name('skyevo-admin');
require_once ('MysqliDb.php');
$mysqli = new mysqli ('localhost', 'capthron_user', 'capthrone@123', 'capthron_skyevo_bookstore');
$mysqli->query("set sql_mode = '' ") or die(mysqli_error());
$db = new MysqliDb ($mysqli);
date_default_timezone_set("Asia/Kolkata");
$date = date("Y-m-d H:i:s");
function createSlug($slug)
{
    $lettersNumbersSpacesHypens = '/[^\-\s\pN\pL]+/u';
    $spacesDuiplicateHypens = '/[\-\s]+/';
    $slug = preg_replace($lettersNumbersSpacesHypens, '', $slug); 
    $slug = preg_replace($spacesDuiplicateHypens, '-', $slug);
    $slug = trim($slug,'-');
    return $slug;
}
?>