<?php
include('config.php');
if(!isset($_SESSION['skyevo_id'])){
    header('Location:index.php'); 
}
if(isset($_GET['Delete']))
{
    $delete_id = $_GET['Delete'];
    $sq = $conn->query("DELETE FROM `skyevo_user` WHERE id = '$delete_id'");
    echo '<script>alert("User has been deleted successfully");window.location.assign("fetchusers")</script>';
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
        <title>Registered User</title>
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
                            <li><a href="fetchusers">Registered User</a></li>
                        </ol> 
                    </div>
                    <!--BREADCRUMB-->
                    <h2 class="text-center">Registered Users</h2><hr/>

                    <div class="col-lg-12">
                        <table class="table table-bordered table-striped" id="example">
                            <thead><th>Action</th><th>Name</th><th>Email</th><th>Mobile</th><th>Joining Date</th></thead>
                            <?php 
                                $sql = $mysqli->query("SELECT * FROM `skyevo_user` order by id desc");
                                while ($user = mysqli_fetch_assoc($sql)): 
                            ?>
                                    <tr>
                                        <td><a href="fetchusers?Delete=<?= $user['id']; ?>" data-toggle="tooltip" title="Delete User" class="btn btn-default btn-xs" onclick="return confirm('Are you sure you want to delete this user?');"><span class="glyphicon glyphicon-remove "></span></a></td>
                                        <td><?= $user['name']; ?></td>
                                        <td><?= $user['email'] ?></td>
                                        <td><?= $user['mobile'] ?></td>
                                        <td><?= $user['date'] ?></td>

                                    </tr>
                                <?php
                            endwhile;
                            ?>
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
