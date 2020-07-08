<?php
include './config.php';
//session_start();
if(!isset($_SESSION['skyevo_id'])){
    header('Location:index'); 
}
$dis='';
?>
<?php
//include'../config.php';
function display_errors($errors){
	$display='<ul class="bg-danger">';
	foreach($errors as $error){
		$display.='<li class="text-danger">'.$error.'</li>';
	}
	$display.='</ul>';
	return $display;
}
?>

<?php
$sql="select * from skyevo_category where `sub_category`='0'";
$result=$mysqli->query($sql);
$errors=array();
$category='';
$post_parent='';
//edit category
if(isset($_GET['edit'])&& !empty($_GET['edit'])){
	$edit_id=$_GET['edit'];
	//$edit_id=sanitize($edit_id);
	$edit_sql="select * from skyevo_category where id='$edit_id'";
	$edit_result=$mysqli->query($edit_sql);
	$edit_category=mysqli_fetch_assoc($edit_result);
}
//delete category
if(isset($_GET['delete'])&& !empty($_GET['delete'])){
	$delete_id=$_GET['delete'];
	//$delete_id=sanitize($delete_id);
	$sql="select * from skyevo_category where id='$delete_id'";
	$result=$mysqli->query($sql);
	$category=mysqli_fetch_assoc($result);
	if($category['sub_category']==0){
		$sql="delete from skyevo_category where sub_category='$delete_id'";
		$mysqli->query($sql);
	}
	$dsql="delete from skyevo_category where id='$delete_id'";
	$mysqli->query($dsql);
        echo '<script>alert("Sub category has been deleted successfully");window.location.assign("sub-category")</script>';
}
//Process Form
if(isset($_POST)&& !empty($_POST)){
	 $post_parent=$_POST['parent'];
	 $category=$_POST['category'];
         $slug = createSlug($category);
	 $sqlform="select * from skyevo_category where `category` = '$category' AND `sub_category`='$post_parent'";
	 if(isset($_GET['edit'])){
		 $id=$edit_category['id'];
		 $sqlform="select * from skyevo_category where category='$category' and sub_category='$post_parent' and id!='$id'";
	 }
	 $fresult=$mysqli->query($sqlform);
	 $count=mysqli_num_rows($fresult);
	 //if category is blank
	 if($category==''){
             echo '<li class="bg-danger text-danger text-center">you must provide category name.</li>';
	 }

	 //if exists in the database
	 if($count>0){
             $_SESSION['msg'] = '<p class="alert alert-danger">'.$category.' alerdy exists. Please choose a new category.</p>';
            
	 }
	 //Display Errors or update database
	 if($count=="0"){
		 //update database
		 $updatesql="INSERT INTO skyevo_category(category,sub_category,slug_category) VALUES ('$category','$post_parent','$slug')";
                 $_SESSION['msg'] = '<p class="alert alert-success">Sub Category has been added successfully.</p>';
		 if(isset($_GET['edit'])){
			 $updatesql="update skyevo_category set category='$category',sub_category='$post_parent',`slug_category`='$slug' where id = '$edit_id'";
                         $_SESSION['msg'] = '<p class="alert alert-success">Sub Category has been updated successfully.</p>';
		 }
		 $mysqli->query($updatesql);
		 header('location: sub-category');
		 	 }
}
$category_value='';
$parent_value=0;
if(isset($_GET['edit'])){
	$category_value=$edit_category['category'];
	$parent_value=$edit_category['sub_category'];
}else{
	if(isset($_POST)){
		$category_value=$category;
		$parent_value=$post_parent;
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
    <script src="js/main.js"></script>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">  
    <link href="datatable/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="datatable/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <title>Admin | Category</title>
</head>
<body>
<!--MAIN BODY-->
<div class="container-fluid">
    <div class="row">
        <?php include 'navigation.php'; ?>
    </div>
    <div class="row" style="margin-top:-21px;">
        <!--LEFT SECTION-->
        <div class="col-lg-2">
            <?php include 'verticalmenu.php'; ?>
        </div>
        <!--LEFT SECTION-->

        <!--RIGHT SECTION-->
        <div class="col-lg-10">
            <!--BREADCRUMB-->
            <div class="row" style="border-top: 1px solid black;">
                <ol class="breadcrumb">
                    <li><a href="<?= $home_url; ?>" target="blank"><span class="fa fa-home" style="padding-right:6px;"></span>View Site</a></li>
                    <li><a href="sub-category">Sub Category</a></li>
                </ol> 
            </div>
            <!--BREADCRUMB-->
            <?php
            echo $dis;
            ?>
            <h2 class="text-center">Sub Categories</h2><hr />
            <div class="row">

                <!-- form-->
                <div class="col-md-6">
                    <form class="form" action="sub-category<?= ((isset($_GET['edit'])) ? '?edit=' . $edit_id : ''); ?>" method="post">
                        <?=@$_SESSION['msg']?>
                        <legend><?= ((isset($_GET['edit'])) ? 'Edit' : 'Add A'); ?> Sub Category</legend>
                        <div id="errors"></div>
                        <div class="form-group">
                            <label for="parent">Category</label>
                            <select class="form-control" name="parent" id="parent" required="">
                                <option value="">---Select Category---</option>
                                <?php while ($parent = mysqli_fetch_assoc($result)): ?>
                                    <option value="<?= $parent['category'] ?>"<?= (($parent_value == $parent['category']) ? 'selected="selected"' : '') ?>><?= $parent['category']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category">Sub Category</label>
                            <input type="text" class="form-control" id="category" name="category" value="<?= $category_value; ?>" required=""/>
                        </div>
                        <div class="form-gorup">
                            <input type="submit" value="<?= ((isset($_GET['edit'])) ? 'Edit' : 'Add') ?> Category" class="btn btn-success"/>
                        </div>
                    </form>
                </div>
                <?php
                if (empty($_POST)) {
                    if (isset($_SESSION['msg'])) {
                        unset($_SESSION['msg']);
                    }
                }
                ?>
                <!-- category table-->
                <div class="col-md-6">
                    <table class="table table-bordered" id="example">
                        <thead>
                        <th>Sub Category</th><th>Category</th><th></th>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "select * from skyevo_category where `sub_category`='0'";
                            $result = $mysqli->query($sql);
                            while ($parent = mysqli_fetch_assoc($result)):
                                $parent_id = $parent['category'];
                                //echo $parent_id;
                                $sql2 = "select * from skyevo_category where sub_category='$parent_id'";
                                $cresult = $mysqli->query($sql2);
                                ?>
                                <tr class="bg-primary">
                                    <td><?= $parent['category']; ?></td>
                                    <td>Category</td>
                                    <td></td>
                                </tr>
                                <?php while ($child = mysqli_fetch_assoc($cresult)): ?>
                                    <tr class="bg-info">
                                        <td><?= $child['category']; ?></td>
                                        <td><?= $parent['category']; ?></td>
                                        <td>
                                            <a href="sub-category?edit=<?= $child['id']; ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
                                            <a href="sub-category?delete=<?= $child['id']; ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove-sign"></span></a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>






        </div>
    </div>
    <div class="row">
        <?php include 'footer.php'; ?>
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
</div>
    <!--MAIN BODY-->
</body>
</html>