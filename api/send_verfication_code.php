<?php
include '../config.php';
$mob = $_POST['mob'];



$email_id = strtolower($_POST['email_id']);
$db->where("mobile",$mob);
$count = $db->getone("skyevo_user","COUNT(*) as cnt");

$db->where("email",$email_id);
$count1 = $db->getone("skyevo_user","COUNT(*) as cnt");

if($count['cnt']=="0" && $count1['cnt']=="0"){
    $otp = rand("111111","999999");
    $msg = 'Hi user your OTP to verify your contact number on SKYEVO is '.$otp.''; 
        $authKey = "247318AE6HUFwy3EG5bebc87f";
        $mobileNumber = $mob;
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
    
    
    echo base64_encode($otp);
}else{
    echo '0';
}

