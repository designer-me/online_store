<?php
include './config.php';
////session_start();
if(!isset($_SESSION['skyevo_id'])){
    header('Location:index.php'); 
}
?>


<?php
//if(isset($_POST['sub']))
//{
    
//}
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="textediter/editor.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="css/loading.css" rel="stylesheet" type="text/css"/>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">  
    <script src="js/jquery.loading.min.js" type="text/javascript"></script>
    <script src="js/moment.js" type="text/javascript"></script>
    <title>Admin | Add Product</title>
    <style>
        .form-control{
            height: 34px !important;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function()
        {
                $("#loding1").hide();
                $("#loding2").hide();
                $(".cate").change(function()
                {
                        $("#loding1").show();
                        var id=$(this).val();
                        var dataString = 'id='+ id;
                        $(".subcate").find('option').remove();
                        $.ajax
                        ({
                                type: "POST",
                                url: "get_subcategory.php",
                                data: dataString,
                                cache: false,
                                success: function(html)
                                {
                                        $("#loding1").hide();
                                        $(".subcate").html(html);
                                } 
                        });
                });




        });
        </script>
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
                    <li><a href="<?=$home_url;?>" target="blank"><span class="fa fa-home" style="padding-right:6px;"></span>View Site</a></li>
                    <li><a href="addproducts">Add Products</a></li>
                </ol> 
            </div>
            <!--BREADCRUMB-->
             <div class="col-lg-12 ">
                <h2 class="text-center">A New Products</h2><hr/>
                <div class="col-lg-12">
                    <div id="error"></div>
                </div>
                <form method="post" enctype="multipart/form-data" id="add_product">
                    <div class="col-lg-12">
                        <div class="col-lg-4 form-group"> 
                            <label>Title<i class="text-danger">*</i></label>
                            <input type="text" name="title" placeholder="Title of Book" class="form-control" value="<?=@$title?>" required="">
                        </div>
                        <div class="col-lg-4 form-group"> 
                            <label>Category <i class="text-danger">*</i></label> 
                            <select name="cate" class="cate form-control" id="cate" required="">
                            <option selected="selected">---Select Category---</option>
                                <?php   $sql = $mysqli->query("SELECT * FROM `skyevo_category` where `sub_category` = '0'"); 
                                        while($a=  mysqli_fetch_assoc($sql)) :
                                ?>
                                    <option value="<?php echo $a['category']; ?>"><?php echo $a['category']; ?></option>
                                <?php
                                    endwhile;
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-4 form-group">
                            <label>Sub Category <i class="text-danger">*</i></label>
                            <select name="subcate" class="subcate form-control" required="">
                                <option selected="selected">---Select Sub Category---</option>
                            </select>
                        </div>
                        <div class="col-lg-4 form-group">
                            <label>Brand<i class="text-danger">*</i></label>
                            <input type="text" name="brand" placeholder="Brand Name" class="form-control" required="">
                        </div>
                        <div class="col-lg-4 form-group st-hide">
                            <label>Publisher <i class="text-danger">*</i></label>
                            <select class="form-control st-disable" name="pub" required="">                                  
                                <option value="">-----Select-----</option>
                                <?php   $sql = $mysqli->query("SELECT * FROM `skyevo_publishers`"); 
                                  while($a=  mysqli_fetch_assoc($sql)) :
                                ?>
                                <option value="<?=$a['category'];?>"><?=$a['category'];?></option>
                                <?php endwhile; ?> 
                            </select>
                        </div>
                        <div class="col-lg-4 form-group st-hide">
                            <label>Board </label>
                            <select class="form-control st-disable" name="board">                                  
                                <option value="">-----Select-----</option>
                                <?php   $sql = $mysqli->query("SELECT * FROM `skyevo_board`"); 
                                  while($a=  mysqli_fetch_assoc($sql)) :
                                ?>
                                <option value="<?=$a['board'];?>"><?=$a['board'];?></option>
                                <?php endwhile; ?> 
                            </select>
                        </div>
                        <div class="col-lg-4 form-group st-hide">
                            <label>Author Name <i class="text-danger">*</i></label>
                            <input type="text" name="author_name" placeholder="Author Name" class="form-control st-disable" required="">
                        </div>
                         
                        <div class="col-lg-4 form-group">
                            <label>Actual Price</label>
                            <input type="number" name="actutal_price" placeholder="Actual Price" min="0" class="form-control">
                        </div>
                        <div class="col-lg-4 form-group ">
                            <label>Selling price <i class="text-danger">*</i></label>
                            <input type="number" name="selling_price" placeholder="Selling price" min="0" class="form-control" required="">
                        </div> 
                        <div class="col-lg-4 form-group">
                            <label>Quantity <i class="text-danger">*</i></label>
                            <input type="number" name="qun" placeholder="Quantity" min="0" class="form-control " required=""> 
                        </div>
                        <div class="col-lg-4 form-group st-hide">
                            <label>Publication Year <i class="text-danger">*</i></label>
                            <input type="date" name="publication_year" placeholder="Pubication Year" min="0" class="form-control st-disable" required="">
                        </div>
                        <div class="col-lg-4 form-group st-hide">
                            <label>Language</label>
                            <input type="text" name="language" placeholder="Language" class="form-control st-disable">
                        </div>
                        <div class="col-lg-4 form-group st-hide">
                            <label>ISBN</label>
                            <input type="text" name="isbn" placeholder="ISBN" class="form-control st-disable">
                        </div>
                        <div class="col-lg-4 form-group st-hide">
                            <label>No. of Pages</label>
                            <input type="number" name="pages" placeholder="No. of Pages" min="0" class="form-control st-disable">
                        </div>
                        <div class="col-lg-4 form-group st-hide">
                            <label>Seller </label>
                            <input type="text" name="seller" placeholder="Seller" class="form-control st-disable" >
                        </div>
                        <div class="col-lg-4 form-group st-hide">
                            <label>Binding </label>
                            <input type="text" name="binding" placeholder="Binding" class="form-control st-disable" >
                        </div>
                        <div class="col-lg-4 form-group st-hide">
                            <label>Genre </label>
                            <input type="text" name="genre" placeholder="Genre" class="form-control st-disable">
                        </div>
                        <div class="col-lg-4 form-group">
                            <label>Rating </label>
                            <input type="text" name="rating" placeholder="Rating" min="0" class="form-control">
                        </div>
                        <div class="col-lg-4 form-group">
                            <label>Upload image <i class="text-danger">*</i></label>
                            <input type="file" name="file" class="form-control" required="">
                        </div>
                        <div class="col-lg-12 form-group">
                            <label>Description</label>
                            <textarea class="form-control" id="textediter"></textarea>
                        </div>
                        <div class="col-lg-12 form-group ot-hide">
                            <label>Highlight</label>
                            <textarea class="form-control ot-disable" id="texteditor1"></textarea>
                        </div>
                        <input type="submit" value="Submit" name="sub" class="btn btn-success pull-right" style="margin-top: 25px; margin-right:12px; ">
                        <a href="fetchproducts" class="btn btn-default pull-right" style="margin-top: 25px; margin-right: 4px;">Cancel</a>
                    </div>
                </form>
            </div> 
        <!--RIGHT SECTION-->
        </div>
    </div><br/>
    <!--FIRST ROW-->
    <!--FOOTER-->
    <div class="row">
        <?php include 'footer.php';?>
    </div>
    <!--FOOTER-->
</div>
<!--MAIN BODY-->
<script src="textediter/editor.js" type="text/javascript"></script>
<script>
    $(document).ready(function (){
        $("#textediter").Editor();
        $("#texteditor1").Editor();

    });
</script>
<script>
	$(document).ready(function(){
		$('.ot-hide').hide();
		$(".ot-disable").prop('disabled', true);
		$('#cate').on('change',function(){
						if($(this).val()==="Stationery and Others"){
				// alert("stationary");
				$('.st-hide').hide();
				$(".st-disable").prop('disabled', true);

				$('.ot-hide').show();
				$(".ot-disable").prop('disabled', false);
			}
			else{
				$('.st-hide').show();
				$(".st-disable").prop('disabled', false);
				$('.ot-hide').hide();
				$(".ot-disable").prop('disabled', true);

			}
		});
	});
</script>
<script>
$(document).ready(function(){ 
    $("#add_product").submit(function(e){
        e.preventDefault();
        var des = $("#textediter").Editor("getText");
        var high = $("#texteditor1").Editor("getText");
        var data = new FormData(this);
        data.append("des",des);
        data.append("high",high);
        $.ajax({
            type: 'POST',
            url: "api/add_product",
            data: data,
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function (data) {
                $.showLoading({name: 'circle-turn-scale',allowHide: false}); 
            },
            success: function (data) {
                if(data == "0"){
                    $("#error").fadeIn().html("<div class='alert alert-danger alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Only JPEG/JPG/PNG file acceptable.</div>");
                    setTimeout(function(){
                    $("#error").fadeOut("slow");
                    },4000);
                }else if(data == "1"){
                    $("#error").fadeIn().html("<div class='alert alert-success alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Product added successfully.</div>");
                    setTimeout(function(){
                    $("#error").fadeOut("slow");
                    },4000);
                    $("#textediter").Editor('setText',""); 
                    $("#texteditor1").Editor('setText',""); 
                    $("#add_product")[0].reset();
                }
            },
            complete:function (){
                $('body, html').animate({scrollTop:$('body').offset().top}, 'slow');
                $.hideLoading({name: 'circle-turn-scale',allowHide: false});
            },
            error: function () {

            }
        });
    }); 
});
</script>
</body>
</html>













