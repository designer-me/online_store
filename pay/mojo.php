<?php 
include '../config.php';
session_start();
?>

<!DOCTYPE HTML>  

<html>
<head>
</head>
<body>  

<?php

    $result = $long = $res = $part = $longu = "";

    $_SESSION['name']=$_POST['name'];
    $_SESSION['email']=$_POST['email'];
    $_SESSION['phno']=$_POST['phno'];
    $_SESSION['amount']=$_POST['amount'];
    
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phno=$_POST['phno'];
    $amount=$_POST['amount'];


  if (empty($_POST["name"])) {
     ?>
     <script>
     alert("Please enter a name");
     window.location="index.php";
     </script>
     <?php
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
     ?>
     <script>
     alert("Only letters and white space allowed");
     window.location="index.php";
     </script>
     <?php
    }
  }
  
  if (empty($_POST["email"])) {
     ?>
     <script>
     alert("Email is required");
     window.location="index.php";
     </script>
     <?php
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     ?>
     <script>
     alert("Invalid email format");
     window.location="index.php";
     </script>
     <?php 
    }
  }
    
 
  if (empty($_POST["phno"])) {
     ?>
     <script>
     alert("Please enter a phone number");
     window.location="index.php";
     </script>
     <?php 
  } else if(!is_numeric($_POST["phno"])) {
     ?>
     <script>
     alert("Please enter a valid phone number");
     window.location="index.php";
     </script>
    <?php 
  } else if(strlen($_POST["phno"]) != 10) {
     ?>
     <script>
     alert("Please enter a valid phone number");
     window.location="index.php";
     </script>
          <?php 
  } else {
}

  if (empty($_POST["amount"])) {
     ?>
     <script>
     alert("Please enter a valid amount");
     window.location="index.php";
     </script>
    <?php 
  } else {
    $amount = test_input($_POST["amount"]);
    if (($_POST["phno"]) < 8) {
     ?>
     <script>
     alert("The Minimum amount that is required for the transaction is Rs 9");
     window.location="index.php";
     </script>
    <?php 
    }
  }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$ch = curl_init();

//curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');  //This is the Test API endpoint
curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');  //This is the Live API endpoint
curl_setopt($ch, CURLOPT_HEADER, FALSE);               
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,array("X-Api-Key:b403d9484e863dbe0958ad515434dae9", "X-Auth-Token:b26aabdbda2b799ed1b13c299a2f9faa"));
//curl_setopt($ch, CURLOPT_HTTPHEADER,array("X-Api-Key:test_b74df689cdbd017a1297998eef2", "X-Auth-Token:test_c948a1bdcd3c8bb75d5aba2e305"));

$payload = Array(
    'purpose' => 'Purchase on SKYEVO',
    'amount' => $amount,
    'phone' => $phno,
    'buyer_name' => $name,
    'redirect_url' => $home_url.'pay/display.php', 
    'webhook' => '', 
    'send_email' => false,
    'send_sms' => false,
    'email' => $email,
    'allow_repeated_payments' => false
);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 

print $response;
echo '<br>';

$myArray = array(json_decode($response, true));

echo '<br>';
print_r($myArray);
echo '<br>';

$longu = $myArray[0]["payment_request"]["longurl"];        //Extracting the Payment link from the JSON response

echo '<br>';
echo $longu;
header('Location:' .$longu);                               //Redirecting the user to the Payment link. You can comment this line to see the JSON response on your screen.
                        
?>
</body>
</html>