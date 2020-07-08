<?php
include'./config.php';
function display_errors($errors){
    $display='<ul class="bg-danger">';
    foreach($errors as $error){
            $display.='<li class="text-danger">'.$error.'</li>';
    }
    $display.='</ul>';
    return $display;
}

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css"> 
        <title>Administrator Login</title>
        <script type='text/javascript'>
            function refreshCaptcha(){
                    var img = document.images['captchaimg'];
                    img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
            }
        </script>
        <style>
            body{
                background-image: url("images/zenbg-1.png"), url("images/zenbg-2.png");
                background-repeat: repeat-x, repeat;
            }
        </style>
		
    </head>
    <body>
        <div class="container-fluid">
            <div class="container" style="margin-top:150px;">
                <div class="col-lg-4"></div> 
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="font-size: 16px;"><span class="fa fa-lock" style="padding-right:10px;"></span>Administrator login</div>
                        <div class="panel-body">
                            <?php
                            if (isset($_POST['login'])) {
                                $admin_id = $_POST['admin'];
                                $password = $_POST['password'];
                                if (empty($admin_id) || empty($password)) {
                                    $errors[] = 'You must provide user id and password.';
                                } else {
                                    $sql = "select * from skyevo_admin where skyevo_user = '$admin_id'";
                                    $query = $mysqli->query($sql);
                                    $usercount = mysqli_num_rows($query);
                                    if ($usercount < 1) {
                                        $errors[] = 'This Id dosen/t exist.';
                                    }
                                }



                                //session_start();
                                if (empty($_SESSION['captcha_code']) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0) {
                                    $errors[] = 'The Validation code does not match.';
                                } else {
                                    $user = $mysqli->query("select * from skyevo_admin where skyevo_user = '$admin_id' AND skyevo_pass = '$password'");
                                    $ad_login = mysqli_fetch_assoc($user);
                                    if ($ad_login['skyevo_user'] == $admin_id || $ad_login['skyevo_pass'] == $password) {
                                        $_SESSION['skyevo_id'] = $ad_login['skyevo_id'];
                                        header('Location:AdminPage.php');
                                    } else {
                                        $errors[] = 'The Password dosen/t match.';
                                    }
                                }
                                if (!empty($errors)) {
                                    echo display_errors($errors);
                                }
                            }
                            ?>   
                            <form  method="post">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon"><span class="fa fa-user" style="font-size: 14px;"></span></span>
                                    <input type="text" name="admin" value="<?=@$_POST['admin']?>" class="form-control" placeholder="User Id">
                                    <span class="input-group-addon"><span class="fa fa-question"></span></span>
                                </div>
                                <div class="input-group input-group-sm" style="margin-top:5px;">
                                    <span class="input-group-addon"><span class="fa fa-lock" style="font-size: 16px;"></span></span>
                                    <input type="Password" name="password" class="form-control" placeholder="Password">
                                    <span class="input-group-addon"><span class="fa fa-question"></span></span>
                                </div>  
                                <div class="input group input-group-sm" style="margin-top:5px;">
                                <img src="captcha.php?rand=<?php echo rand();?>" id='captchaimg'><br/><br/>
                                <input name="captcha_code" type="text" class="form-control" placeholder="Enter code here">
                                </div>
                                <br>
                                Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh.
                                <div class="form-group" style="margin-top: 10px;">
                                <div class="form-group" style="margin-top:5px;">
                                    <input type="submit" name="login"  class="btn btn-success" style="height: 30px; line-height: 8px;" value="Login">
                                </div>
                            </form>
                        </div>
                    </div>                    
                </div>
                <div class="col-lg-4">

                </div>
            </div>
        </div>
    </body>
</html>
