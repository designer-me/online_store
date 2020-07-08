<?php
include '../config.php';
$full_name = $_POST['full_name'];
$mobile_no = $_POST['mobile_no'];
$email = strtolower($_POST['email']);
$password = $_POST['password'];

$db->where("mobile",$mobile_no);
$count = $db->getone("skyevo_user","COUNT(*) as cnt");

$db->where("email",$email);
$count1 = $db->getone("skyevo_user","COUNT(*) as cnt");

if($count['cnt']=="0" && $count1['cnt']=="0"){
    $data = array(
        "name"=>$full_name,
        "email"=>$email,
        "mobile"=>$mobile_no,
        "password"=>$password,
        "date"=>$date
    );
    if($db->insert("skyevo_user",$data)){
        echo '1';
    }
}else{
    echo '0';
}
