<?php
include '../config.php';
$email = strtolower($_POST['email']);
$password = $_POST['password'];
$db->where("email",$email);
$count_email = $db->getone("skyevo_user","COUNT(*) as cnt");

$db->where("mobile",$email);
$count_mobile = $db->getone("skyevo_user","COUNT(*) as cnt");

if($count_email['cnt'] == "1"){
    $db->where("email",$email);
    $email = $db->get("skyevo_user");
    if($email[0]['password']==$password){
        $_SESSION['user_id'] = $email[0]['id'];
        echo '1';
    }else{
        echo '00';
    }
}else if($count_mobile['cnt'] == "1"){
    $db->where("mobile",$email);
    $mobile = $db->get("skyevo_user");
    if($mobile[0]['password']==$password){
        $_SESSION['user_id'] = $mobile[0]['id'];
        echo '1';
    }else{
        echo '00';
    }
}else{
    echo '0';
}