<?php
include '../config.php';
if(!isset($_SESSION['user_id']))
{
	header('Location:../index');
}
$db->where("ship_id",$_SESSION['shipId']);
$getAmount = $db->get("skyevo_shipping");
$db->where("id",$_SESSION['user_id']);
$getuser = $db->get("skyevo_user");
//print_r($getuser);
$amount = $getAmount[0]['total_amount'];
$name = $getuser[0]['name'];
$email = $getuser[0]['email'];
$contact = $getuser[0]['mobile'];
//$package = $getuser[0]['Package'];


//session_unset($_SESSION['alogged']);
//session_unset($_SESSION['mlogged']);
//session_destroy();

$_SESSION['alogged']=0;
$_SESSION['mlogged']=0;

//$name = $email = $phno = $amount = $pur = "";
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
function submitForm() {
var payuForm = document.forms.payuForm;
payuForm.submit();
}
</script>
<!DOCTYPE HTML>  

<html>
<head>

  <style>
 .error {color: #FF0000;}
  </style>

</head>
<body onLoad="submitForm()" style="display:none;" >  

<h2>Payment Information</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="mojo.php" name="payuForm" id="redirect">  
  Name: <input type="text" name="name" value="<?=$name?>">
  <span class="error">*</span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?=$email?>">
  <span class="error">*</span>
  <br><br>
  Phone number: +91 <input type="text" name="phno" value="<?=$contact?>">
  <span class="error">*</span>
  <br><br>
  Amount: <input type="text" name="amount" value="<?=$amount?>">
  <span class="error">*</span>
  <br><br>
  <input type="submit" value="Submit" /> 
</form>
<script>
    $(document).ready(function(){
		//alert("yes");
     $('#redirect').submit(function(){return true;});
    });
</script>
</body>
</html>