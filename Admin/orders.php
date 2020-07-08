<?php
//include './config.php';
//session_start();
include './config.php';
if(!$_SESSION['skyevo_id']){
    header('Location:index.php'); 
}
?>

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
        <title>Admin | Orders</title>
        <link href="datatable/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="datatable/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <!--MAIN BODY-->
        <div class="container-fluid">
            
            <!--NAVIGATION-->
            <div class="row">
                <?php include 'navigation.php';?>
            </div>
            <!--NAVIGATION-->
            
            <div class="row" style="margin-top:-21px;">
                <!--LEFT SECTION-->
                <div class="col-lg-2">
                    <?php include 'verticalmenu.php';?>
                </div>
                
            <!--FIRST ROW-->
                <!--LEFT SECTION-->
                
                <!--RIGHT SECTION-->
                <div class="col-lg-10">
                    <!--BREADCRUMB-->
                    <div class="row" style="border-top: 1px solid black;">
                        <ol class="breadcrumb">
                            <li><a href="#" target="blank"><span class="fa fa-home" style="padding-right:6px;"></span>View Site</a></li>
                            <li><a href="">Orders</a></li>
                        </ol> 
                    </div>
                    <!--BREADCRUMB-->
                    <div class="col-lg-12 ">
                    <h2>My Order</h2>
                    <table class="table table-bordered" id="example">
                            <thead>
                                <th>Details</th>
                                <th>Order Id</th>
                                <th>Paid Amount</th>
                                <th>Payment Method</th>
                                <th>Payment Status</th>
                                <th>Order Status</th>
                                <th>Transaction Id</th>
                            </thead>
                            <?php 
//                                $db->where("payment_status","1");
                                $db->orderby("ship_id","DESC");
//                                $db->where("user_id",$_SESSION['user_id']);
                                $getOrder = $db->get("skyevo_shipping");
                            ?>
                            <tbody>
                                <?php foreach ($getOrder as $ord): ?>
                                <tr>
                                    <td><a href="order-details.php?order=<?=$ord['ship_id']?>" class="btn btn-default btn-xs"><i class="fa fa-eye"></i></a></td>
                                    <td><?=$ord['ship_id']?></td>
                                    <td><i class="fa fa-inr"></i> <?=$ord['total_amount']?></td>
                                    <td><?=$ord['payment_method']?></td>
                                    <?php if($ord['payment_status'] == "1"): ?>
                                    <td class="text-success text-bold" style="font-weight: bold;">Paid</td>
                                    <?php else: ?>
                                    <td>Unpaid</td>
                                    <?php endif; ?>
                                    <td><?=$ord['order_status']?></td>
                                    
                                        
                                        <? //date('d-M-Y',strtotime($ord['paid_on']))?>
                                    <td><?=$ord['txn_id']?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
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
            <script src="datatable/jquery.dataTables.min.js" type="text/javascript"></script>
            <script src="datatable/dataTables.bootstrap.min.js" type="text/javascript"></script>
            <script src="datatable/buttons.html5.min.js" type="text/javascript"></script>
            <script src="datatable/dataTables.buttons.min.js" type="text/javascript"></script>
            <script src="datatable/buttons.bootstrap.min.js" type="text/javascript"></script>
            <script src="datatable/jszip.min.js" type="text/javascript"></script>
            <script src="datatable/pdfmake.min.js" type="text/javascript"></script>
            <script src="datatable/vfs_fonts.js" type="text/javascript"></script>
            <script>
            $(document).ready(function() {
                $('#example').DataTable( { dom: 'Bfrtip', buttons: [],"bSort" : false } ); 
            });
            </script>
            <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip(); 
            });
            </script>
        </div>
        <!--MAIN BODY-->
    </body>
</html>


