<?php
include '../config.php';
$old_pass = $_POST['old_pass'];
$new_pass = $_POST['new_pass'];
$db->where("id",$_SESSION['user_id']);
$user = $db->get("skyevo_user");
if($user[0]['password']==$old_pass){
    $data = array(
        "password"=>$new_pass
    );
    $db->where("id",$_SESSION['user_id']);
    if($db->update("skyevo_user",$data)){
        echo '1';
    }
}else{
    echo '0';
}