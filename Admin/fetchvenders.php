<?php
include('config.php');
if(isset($_GET['Delete']))
{
    $delete_id = $_GET['Delete'];
    $sq = $conn->query("DELETE FROM `skyevo_sell_with_us` WHERE id = '$delete_id'");
    echo '<script>alert("Item has been deleted successfully");window.location.assign("fetchvenders")</script>';
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
        <script src="js/main.js"></script>
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">        
        <title>Sell With Us</title>
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
                            <li><a href="<?=$home_url;?>" target="blank"><span class="fa fa-home" style="padding-right:6px;"></span>View Site</a></li>
                            <li><a href="fetchvenders">Sell With Us</a></li>
                        </ol> 
                    </div>
                    <!--BREADCRUMB-->
                    <h2 class="text-center">Sell With Us</h2><hr/>
                    <?php
                    $sql = $mysqli->query("SELECT * FROM `skyevo_sell_with_us` order by id desc"); ?>
                    <table class="table table-bordered table-striped" id="example" style="margin-top: 30px;">
                        <thead><th>Action</th><th>Company Name</th><th>Email</th><th>Contact</th><th>Date</th></thead>
                  <?php  while($ven = mysqli_fetch_assoc($sql)): ?>
                                <tr>
                                    
                                    <td>
                                        <span title="View Details" data-toggle="tooltip"><a class="btn btn-default btn-xs detail" id="detail-model" onclick="getProductid(<?=$ven['id']?>);" title="Details" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i></a></span>
                                        <a href="fetchvenders?Delete=<?=$ven['id'];?>" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-remove "></span></a>
                                    </td>
                                    <td><?=$ven['comp_name'];?></td>
                                    <td><?=$ven['email_id']?></td>
                                    <td><?=$ven['contact_num1']?></td>
                                    <td><?=$ven['date']?></td>
                                    
                                <tr>
                    <?php 
                    endwhile;
                    ?>
                        </table>
                    
                    
                    
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
            <script>
                function getProductid(id){
                    var data = {"id":id};
                    $.ajax({
                        type: 'POST',
                        data: data,
                        url:"api/sell_with_us",
                        success: function (data) {
                           jQuery('body').append(data);
                           jQuery('#myModal').modal({
                               backdrop:'static',
                               keyboard:'false'
                           });
                         },
                         error: function () {

                         }
                    });

                }
            </script>
        </div>
        <!--MAIN BODY-->
    </body>
</html>
