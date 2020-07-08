<?php
include './config.php';
//session_start();
if(!isset($_SESSION['skyevo_id'])){
    header('Location:index.php'); 
}
?>
<?php
    $db->where("status","1");
    $Active = $db->getOne("skyevo_product","count(*) as cnt");
    $activPro = $Active['cnt'];
    $db->where("status","0");
    $InActive = $db->getOne("skyevo_product","count(*) as cnt");
    $inactivPro = $InActive['cnt'];
    $db->where("order_status","Pending");
    $new = $db->getOne("skyevo_shipping","count(*) as cnt");
    $newOrder = $new['cnt'];
    $db->where("order_status","Delivered");
    $comp = $db->getOne("skyevo_shipping","count(*) as cnt");
    $complete = $comp['cnt'];
    $db->where("order_status","Received");
    $rece = $db->getOne("skyevo_shipping","count(*) as cnt");
    $received = $rece['cnt'];
?> 
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/AdminLTE.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">        
    <title>Welcome</title>
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
                    <li><a href="#" target="blank"><span class="fa fa-home" style="padding-right:6px;"></span>View Site</a></li>
                    <li><a href="AdminPage">Dashboard</a></li>
                </ol> 
            </div>
            <!--BREADCRUMB-->
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center">Welcome To Skyevo</h2>
                </div>
                <div class="col-md-6">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Total Products</h3>
                            <div>
                                <canvas id="myChart2" height="200" ></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Total Competed Orders</h3>
                            <div>
                                <canvas id="myChart3" height="200" ></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        <!--RIGHT SECTION-->
    </div>
    <!--FIRST ROW-->

    <!--FOOTER-->
    <div class="row">
        <?php include 'footer.php';?>
    </div>
    <!--FOOTER-->
    <script src="js/jquery-ui.js.js"></script>
</div>
<!--MAIN BODY-->
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">
    
    
    var ctx2 = document.getElementById("myChart2").getContext('2d');
    var myChart2 = new Chart(ctx2, {
      type: 'pie',
      data: {
        labels: ["Active", "Inactive"],
        datasets: [{
          backgroundColor: [
            "#00C0EF",
            "#F56954",
//            "#34495e"
          ],
          data: [<?=$activPro?>, <?=$inactivPro?>]
        }]
      }
    });
    
    
    
    var ctx3 = document.getElementById("myChart3").getContext('2d');
    var myChart3 = new Chart(ctx3, {
      type: 'pie',
      data: {
        labels: ["New","Ready","Complete"],
        datasets: [{
          backgroundColor: [
            "#F56954",
            "#34495e",
            "#00A65A"
          ],
          data: [<?=$newOrder?>, <?=$received?>, <?=$complete?>]
        }]
      }
    });
</script>
