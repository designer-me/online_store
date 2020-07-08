<?php
include './config.php';
//session_start();
if(!isset($_SESSION['skyevo_id'])){
    header('Location:index.php'); 
}
$dis = '';
?>

                
<?php
if(isset($_GET['Edit'])){
    $edit_id = $_GET['Edit'];
    $sq = $mysqli->query("SELECT * FROM `skyevo_category` where id = '$edit_id'");
    $fe = mysqli_fetch_assoc($sq);
    $cat = $fe['category'];
}
?>

    
<?php  
if(isset($_GET['Delete'])){
$delete_id = $_GET['Delete'];
$sql11 = $mysqli->query("SELECT * FROM `skyevo_category` WHERE `id` = '$delete_id'");
$res  = mysqli_fetch_assoc($sql11);
$db->where("sub_category",$res['category']);
$db->delete("skyevo_category");
$sql = $mysqli->query("DELETE FROM `skyevo_category` WHERE id = '$delete_id'");
echo '<script>alert("Category has been deleted successfully");window.location.assign("category")</script>';
}

?>

<?php
if (isset($_POST['sub'])) {
    $cat = $_POST['cat'];
    $slug = createSlug($cat);
    if (isset($_GET['Edit'])) {
        $sql1 = $mysqli->query("SELECT * FROM `skyevo_category` WHERE `category` = '$cat'");
    }else{
        $sql1 = $mysqli->query("SELECT * FROM `skyevo_category` WHERE `category` = '$cat' ");
    }
    $count = mysqli_num_rows($sql1);
    if ($cat == '') {
        $_SESSION['msg'] = '<p class="alert alert-danger">You must provide category name.</p>';
        header("location:category");
    } elseif ($count > 0) {
        $_SESSION['msg'] = '<p class="alert alert-danger">' . $cat . ' already exists. Please Choose another category name.</p>';
        header("location:category");
    } else {
        $sql = "INSERT INTO `skyevo_category`(`category`,`slug_category`) VALUES ('$cat','$slug')";
        $_SESSION['msg'] = '<p class="alert alert-success">Category has been added successfully</p>';
        header("location:category");
        if (isset($_GET['Edit'])) {
            $sql = "update `skyevo_category` set category ='$cat',slug_category='$slug' where id = '$edit_id'";
            $_SESSION['msg'] = '<p class="alert alert-success">Category has been updated successfully</p>';
            header("location:category");
        }
        $mysqli->query($sql);
    }
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
<link href="datatable/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="datatable/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
<title>Admin | Category</title>

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
                    <li><a href="<?=$home_url?>" target="blank"><span class="fa fa-home" style="padding-right:6px;"></span>View Site</a></li>
                    <li><a href="category">Category</a></li>
                </ol> 
            </div>
            <!--BREADCRUMB-->

            <div class="col-lg-12 ">           
                <h2 class="text-center">Category Name</h2>
                <div class="col-lg-12">
                    <div class="row form-group">
                        <a href="sub-category" class="btn btn-primary pull-right" style="margin-right: 27px;">Add Sub Category</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-offset-3">
                    <?=@$_SESSION['msg']?>
                    <form method="post" action="category.php<?=((isset($_GET['Edit']))?'?Edit='.$edit_id:'')?>">
                        <?php if(!isset($_GET['Edit'])): ?>
                        <div class="form-group">
                            <label> <?=((isset($_GET['Edit']))?'Edit':'Add A');?> Category Name</label>
                            <input type="text" name="cat" class="form-control">
                        </div>
                        <?php endif; ?>
                        <?php if(isset($_GET['Edit'])): ?>
                        <div class="form-group">
                            <label> <?=((isset($_GET['Edit']))?'Edit':'Add A');?> Category Name</label>
                            <input type="text" name="cat" class="form-control" value="<?=$cat?>">
                        </div>
                        <?php endif; ?>
                        <div class="form-group" style="margin-top: 10px;">

                            <input type="submit" name="sub" class="btn btn-success pull-right" value="<?=((isset($_GET['Edit']))?'Edit':'Add');?> Category">
                              <?php if(isset($_GET['Edit'])): ?>
                            <a href="category" class="btn btn-default pull-right" style="margin-right: 5px;">Cancel</a>
                            <?php endif; ?>
                        </div>
                    </form>   
                </div>
                <?php
                    if(!isset($_POST['sub'])){
                        if(isset($_SESSION['msg'])){
                            unset($_SESSION['msg']);
                        }
                    }
                ?>
            </div>
            <!-- Fetch Data -->
            <div class="col-lg-12">
                <div class="col-lg-6 col-md-offset-3">
                    <table class="table table-bordered table-striped" id="example">
                        <thead><th></th><th>Category</th><th></th></thead>                                                                                  
                        <tbody>
                            <?php
                            $sql = $mysqli->query("SELECT * FROM skyevo_category where `sub_category`= '0' ORDER BY id desc");
                            while ($a = mysqli_fetch_assoc($sql)):
                                ?>
                                <tr>
                                    <td><a href="category?Edit=<?= $a['id']; ?>" data-toggle="tooltip" title="Edit Category" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-edit"></span></a></td>
                                    <td><?= $a['category']; ?></td>
                                    <td><a href="category?Delete=<?= $a['id']; ?>" data-toggle="tooltip" title="Delete Category" class="btn btn-xs btn-default" onclick="return confirm('Are you sure you want to delete this item?');"><span class="glyphicon glyphicon-remove"></span></a></td>
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
    <script src="js/jquery-ui.js.js"></script>
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
