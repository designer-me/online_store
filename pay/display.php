<?php
include '../config.php';
if(!isset($_SESSION['user_id']))
 {
     header('Location:../index');
 }
?>
<!DOCTYPE HTML>  

<html>
<head>
</head>
<body>  

<?php

$var1 = $_GET['payment_id'];
$var2 = $_GET['payment_request_id'];

$ch = curl_init();

//curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/'.$var2);	//This is the Test API endpoint
curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/'.$var2);  //This is the Live API endpoint
curl_setopt($ch, CURLOPT_HEADER, FALSE);               
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,array("X-Api-Key:b403d9484e863dbe0958ad515434dae9", "X-Auth-Token:b26aabdbda2b799ed1b13c299a2f9faa"));
//curl_setopt($ch, CURLOPT_HTTPHEADER,array("X-Api-Key:test_b74df689cdbd017a1297998eef2", "X-Auth-Token:test_c948a1bdcd3c8bb75d5aba2e305"));
// eg: curl_setopt($ch, CURLOPT_HTTPHEADER,array("X-Api-Key:test_e92f2f1b554813ba81572a4ffh5", "X-Auth-Token:test_e9daf6854265ecd67d274k91t064"));
$response = curl_exec($ch);
curl_close($ch); 

$myArray = array(json_decode($response, true));

//echo '<br>';
//print($response);
//echo '<br>';

//echo '<br>';
//print_r($myArray);
//echo '<br>';

$payment_id = $myArray[0]["payment_request"]['payments'][0]['payment_id'];
//$amount = $myArray[0]["payment"]["amount"];
//$buyer_name = $myArray[0]["payment"]["buyer_name"];
//$buyer_phone = $myArray[0]["payment"]["buyer_phone"];
//$buyer_email = $myArray[0]["payment"]["buyer_email"];
$status = $myArray[0]["payment_request"]["status"];                 //The status that confirms your Payment. Credit = Successful transaction, Failed = Failed transaction.  

/*echo "<br>Buyer name: ".$buyer_name;
echo "<br>Buyer_phone: ".$buyer_phone;
echo "<br>Buyer_email: ".$buyer_email;
echo "<br>Amount: ".$amount;
echo "<br>Payment ID: ".$payment_id;
echo "<br>Status: ".$status;*/
//echo "<br>Status: ".$status;
//echo $payment_id;
if($status == "Completed"){
	//echo "<br/>";
	//echo "1";
$db->where("ship_id",$_SESSION['shipId']);
$getAmount = $db->get("skyevo_shipping");
$db->where("id",$_SESSION['user_id']);
$getuser = $db->get("skyevo_user");
$amountt = $getAmount[0]['amount'];
$name = $getuser[0]['name'];
$useremail = $getuser[0]['email'];
$contact = $getuser[0]['mobile'];

//$arrayPay = array("paid_status"=>"1","paid_on"=>"$date","txn_id"=>"$payment_id",);
$arrayPay = array("payment_status"=>"1","txn_id"=>"$payment_id","paid_on"=>"$date","order_status"=>"Pending");
$db->where("ship_id",$_SESSION['shipId']);
$upd = $db->update("skyevo_shipping",$arrayPay);

//$message1='<html>
//    <body>
//        <p>Hello Admin</p><br/>
//
//           <p>Hi Admin, A new order have placed on Skyevo.</p><br/>
//
//    <p>Thank You</p>
//    <p>Skyevo</p>
//    </body>   
//    </html>';
//    $headers  = "MIME-Version: 1.0\r\n";
//    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
//
//    $to = 'test@capthronetechnologies.com';
//    $from = 'noreply@capthronetechnologies.com';
//    $headers .= 'From: Skyevo<'.$from.'>'."\r\n".
//        'X-Mailer: PHP/' . phpversion();
//    $subject = 'Skyevo : Order Placed';
//
//    if(mail($to, $subject, $message1, $headers, "-f$from")){ 
//        //echo "1";
//       
//    }
//    
//    $message2='<html>
//    <body>
//        <p>Hello '.$name.'</p><br/>
//
//           <p>Hi, You have successfully placed an order on SKYEVO.  We have Received a payment of Rs '.$amountt.'.your transaction id is '.$payment_id.'</p><br/>
//
//    <p>Thank You</p>
//    <p>SKYEVO</p>
//    </body>   
//    </html>';
//    $headers  = "MIME-Version: 1.0\r\n";
//    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
//
//    $to = $useremail;
//    $from = 'noreply@goodcaterers.in';
//    $headers .= 'From: SKYEVO<'.$from.'>'."\r\n".
//        'X-Mailer: PHP/' . phpversion();
//    $subject = 'SKYEVO : Order Placed';
//
//    if(mail($to, $subject, $message2, $headers, "-f$from")){ 
//        //echo "1";
//       
//    }
	header('Location:../thank-you');
}
?>
</body>
</html>