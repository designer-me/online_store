<?php
include '../config.php';
$mobile = $_POST['mob'];
$db->where("mobile",$mobile);
$count = $db->getone("skyevo_user","COUNT(*) as cnt");
if($count['cnt'] == "0"){
    echo '0';
}else{
    $db->where("mobile",$mobile);
    $Getmobile = $db->get("skyevo_user");
    $getPassword = $Getmobile[0]['password'];
    
    $msg = 'Hi user your Password for SKYEVO account is '.$getPassword.''; 
        $authKey = "247318AE6HUFwy3EG5bebc87f";
        $mobileNumber = $mobile;
        $senderId = "SKYEVO";
        $message = urlencode($msg);
        $route = "4";
        $postData = array(
            'authkey' => $authKey,
            'mobiles' => $mobileNumber,
            'message' => $message,
            'sender' => $senderId,
            'route' => $route
        );
        $url = "http://api.msg91.com/api/sendhttp.php";
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData
                //,CURLOPT_FOLLOWLOCATION => true
        ));
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $output = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'error:' . curl_error($ch);
        }
        curl_close($ch);
    
}