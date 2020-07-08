<?php
include './config.php';
//session_start();
if(!isset($_SESSION['skyevo_id'])){
    header('Location:index.php'); 
}
?>

<?php 
//include '../config.php'; 
if(isset($_POST['sub'])){
    $old = $_POST['old'];
    $new = $_POST['new'];
    $conf = $_POST['conf'];
    $sql = $mysqli->query("SELECT * FROM `skyevo_admin` where skyevo_id = '$_SESSION[skyevo_id]'");
    $q = mysqli_fetch_assoc($sql);
    $password = $q['skyevo_pass'];
    if($password != $old){
        $_SESSION['msg'] = '<p class="alert alert-danger">Old Password is incorrect.</p>';
        header('Location:profile.php');
    }
    else if($new != $conf){
        $_SESSION['msg'] = '<p class="alert alert-danger">Confirm password is incorrect.</p>';
        header('Location:profile.php');
    }
    else{
        $sq = $mysqli->query("UPDATE `skyevo_admin` SET `skyevo_pass`='$new' WHERE skyevo_id = '$_SESSION[skyevo_id]'");
        $_SESSION['msg'] = '<p class="alert alert-success">Password has been successfully changed.</p>';
        header('Location:profile.php');
    }
}

if(isset($_POST['sub1'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sq = $mysqli->query("UPDATE `skyevo_admin` SET `skyevo_name`='$name',`skyevo_email`='$email' WHERE skyevo_id = '$_SESSION[skyevo_id]'");
    $_SESSION['msg1'] = '<p class="alert alert-success">Profile has been successfully updated.</p>';
    header('Location:profile.php');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">        
        <title>Admin | Profile</title>

    </head>
    <body>
        <!--MAIN BODY-->
        <div class="container-fluid">
            
            <!--NAVIGATION-->
            <div class="row">
                <?php include 'navigation.php';?>
            </div>
            <!--NAVIGATION-->
            
            <!--FIRST ROW-->
            <div class="row" style="margin-top:-21px;">
                <!--LEFT SECTION-->
                <div class="col-lg-2">
                    <?php include 'verticalmenu.php';?>
                </div>
                <!--LEFT SECTION-->
                
                <!--RIGHT SECTION-->
                <div class="col-lg-10">
                    <!--BREADCRUMB-->
                    <div class="row" style="border-top: 1px solid black;">
                        <ol class="breadcrumb">
                            <li><a href="<?=$home_url?>" target="blank"><span class="fa fa-home" style="padding-right:6px;"></span>View Site</a></li>
                            <li><a href="profile">Profile</a></li>
                        </ol> 
                        <h2 class="text-center">My Account</h2>
                        <div class="col-lg-12">
                            <div class="col-lg-6">
                                <h3 class="text-center">Change Password</h3>
                                <?=@$_SESSION['msg']?>
                                <form method="post">
                                    <div class="form-group">
                                        <label>Old Password:</label>
                                        <input type="password" name="old" class="form-control" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" name="new" class="form-control" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" name="conf" class="form-control" required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="sub" value="Update" class="btn btn-info pull-right">
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6">
                                <?php
                                    $sql = $mysqli->query("select * from skyevo_admin where skyevo_id = '$_SESSION[skyevo_id]'");
                                    $fetch = mysqli_fetch_assoc($sql);
                                ?>
                                <h3 class="text-center">My Profile</h3>
                                <?=@$_SESSION['msg1']?>
                                <form method="post">
                                    <div class="form-group">
                                        <label>Name:</label>
                                        <input type="text" name="name" value="<?=$fetch['skyevo_name'];?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>User Id</label>
                                        <input type="text" value="<?=$fetch['skyevo_user'];?>" readonly="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <input type="text" name="email" value="<?=$fetch['skyevo_email'];?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="sub1" value="Update" class="btn btn-info pull-right">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php
                        if(!isset($_POST['sub'])){
                            if(isset($_SESSION['msg'])){
                                unset($_SESSION['msg']);
                            }
                        }
                        if(!isset($_POST['sub1'])){
                            if(isset($_SESSION['msg1'])){
                                unset($_SESSION['msg1']);
                            }
                        }
                        ?>
                    </div>
                    <!--BREADCRUMB-->
                
                </div>  
                <!--RIGHT SECTION-->
            </div>
            <!--FIRST ROW-->
            
            <!--FOOTER-->
            <div class="row">
                <?php include 'footer.php';?>
            </div>
            <!--FOOTER-->
            <!--<script src="js/jquery-ui.js.js"></script>-->
        </div>
        <!--MAIN BODY-->
    </body>
</html>
