<?php
include './config.php';
if(!isset($_SESSION['skyevo_id'])){
    header('Location:index.php'); 
}
?>
<?php
if(isset($_GET['Delete'])){
    $delete_id = $_GET['Delete'];
    $sq = $mysqli->query("UPDATE `skyevo_product` SET `status`= 0 where id = '$delete_id'");
    echo '<script>alert("Product has been disabled successfully");window.location.assign("fetchproducts")</script>';
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
    <link href="datatable/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="datatable/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">        
    <title>Admin | Show Product</title>
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
                        <li><a href="">All Products</a></li>
                    </ol> 
                </div>
                <!--BREADCRUMB-->
                <div class="col-lg-12 ">
                    <!--Modal-->
                    <h2 class="text-center">Products</h2>
                    <a href="addproducts" class="btn btn-success pull-right" id="add-product-btn">Add Product</a><div class="clearfix"></div>
                    <hr>                                   
                    <div class="col-lg-12">
                        <table class="table table-bordered table-condensed table-striped" id="example">
                            <thead>
                                <th>Action</th>
                                <th>Product</th>
                                <th>Selling Price</th>
                                <th>Category:Sub-Category</th>
                                <th>Brand</th>
                                <th>Board</th>
                                <th>Publisher</th>
                                <th>Date</th>
                            </thead>
                            <tbody>
                                <?php
                                $sql = $mysqli->query("select * from skyevo_product where status = '1' order by id desc");
                                while($product = mysqli_fetch_assoc($sql)):
                                ?>
                                <tr>
                                    <td>
                                        <span title="View Product" data-toggle="tooltip"><a class="btn btn-default btn-xs detail" id="detail-model" onclick="getProductid(<?=$product['id']?>);" title="Details" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i></a></span>
                                        <a href="editproducts?Edit=<?= $product['id']; ?>" data-toggle="tooltip" title="Edit Product" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
                                        <a href="fetchproducts?Delete=<?= $product['id']; ?>" data-toggle="tooltip" title="Disable Product" class="btn btn-xs btn-default" onclick="return confirm('Are you sure you want to disable this item?');"><span class="glyphicon glyphicon-remove"></span></a>
                                    </td>
                                    <td><?= $product['pro_title'] ?></td>
                                    <td>&#x20B9;&nbsp;<?= $product['pro_selling_price'] ?></td>
                                    
                                    <td><b><?= $product['pro_category']; ?></b>&nbsp; : &nbsp;<?= $product['pro_sub_cat']; ?></td>
                                    <td><?= $product['brand']; ?></td>
                                    
                                    <td><?= $product['pro_board']; ?></td>
                                    <td><?= $product['pro_publisher']; ?></td>
                                    <td><?= date("m-d-Y h:i A", strtotime($product['date'])); ?></td>
                                </tr>
                                <?php
                                endwhile;
                                ?>
                            </tbody>
                        </table>
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
                    url:"api/product_details",
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