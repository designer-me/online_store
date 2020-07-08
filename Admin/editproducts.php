<?php
require './config.php';
?>

<?php
if(isset($_GET['Edit'])){
    $Edit = $_GET['Edit'];
    $sql = $mysqli->query("select * from skyevo_product where id = '$Edit'");
    $r = mysqli_fetch_assoc($sql);
}
?>
<?php
$simg = $mysqli->query("select * from skyevo_product where id = '$Edit'");
$ft = mysqli_fetch_assoc($simg);
$img=$ft['pro_image']; 
?>
<?php
if(isset($_GET['delete_image'])){
    $del = $Edit;
    $s = $mysqli->query("select * from skyevo_product where id= '$del'");
    $fi = mysqli_fetch_assoc($s);
    $image_url = '../books_image/'.$fi['pro_image'];
    unlink($image_url);
    $mysqli->query("UPDATE skyevo_product set pro_image = '' where id = $del");
    ?>
    <script>
        var dd = '<?=$Edit?>';
        alert("Image deleted successfully.");window.location.assign("editproducts?Edit="+dd);
    </script>
    <?php
    
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link href="textediter/editor.css" rel="stylesheet" type="text/css"/>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="css/loading.css" rel="stylesheet" type="text/css"/>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">  
    <script src="js/jquery.loading.min.js" type="text/javascript"></script>
    <script src="js/moment.js" type="text/javascript"></script>      
    <title>Admin | Edit Product</title>
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
        <script>
            $(document).ready(function (){
                get_sub();
            });
            function get_sub(){
                var cat = '<?=$r['pro_category']?>';
                var sub = '<?=$r['pro_sub_cat']?>';
                var dataString = 'cat='+ cat+'&sub='+sub;
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
            }
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
                    <li><a href="">Edit Products</a></li>
                </ol> 
            </div>
            
            <div class="col-lg-12 ">
                <h2 class="text-center">Edit Products</h2><hr/>
                <div class="col-lg-12">
                    <div id="error"></div>
                </div>
                <form method="post" enctype="multipart/form-data" id="edit_product">
                    <div class="col-lg-12">
                        <div class="col-lg-4"> 
                            <input type="hidden" name="edit_id" value="<?=$Edit?>">
                            <label>Title Of Book <i class="text-danger">*</i></label>
                            <input type="text" name="title" class="form-control" value="<?=$r['pro_title']?>">
                        </div>
                        <div class="col-lg-4 form-group"> 
                            <label>Category <i class="text-danger">*</i></label> 
                            <select name="cate" class="cate form-control" id="cate" required="">
                            <option selected="selected">---Select Category---</option>
                                <?php   $sql = $mysqli->query("SELECT * FROM `skyevo_category` where `sub_category` = '0'"); 
                                        while($a=  mysqli_fetch_assoc($sql)) :
                                ?>
                                    <option value="<?php echo $a['category']; ?>" <?=(($r['pro_category']==$a['category'])?'selected':'')?>><?php echo $a['category']; ?></option>
                                <?php
                                    endwhile;
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-4 form-group">
                            <label>Sub Category</label>
                            <select name="subcate" class="subcate form-control">
                                <option selected="selected" value="">---Select Sub Category---</option>
                            </select>
                        </div>
                        <div class="col-lg-4 form-group">
                            <label>Brand<i class="text-danger">*</i></label>
                            <input type="text" name="brand" value="<?=$r['brand']?>" class="form-control" required="">
                        </div>
                        <div class="col-lg-4 form-group st-hide">
                            <label>Publisher <i class="text-danger">*</i></label>
                            <select class="form-control st-disable" name="pub" required="">                                  
                                <option value="">-----Select-----</option>
                                <?php
                                $sql = $mysqli->query("SELECT * FROM `skyevo_publishers`");
                                while ($a = mysqli_fetch_assoc($sql)) :
                                    ?>
                                    <option value="<?= $a['category']; ?>" <?=(($r['pro_publisher']==$a['category'])?'selected':'')?>><?= $a['category']; ?></option>
                                <?php endwhile; ?> 
                            </select>
                        </div>
                        <div class="col-lg-4 form-group st-hide">
                            <label>Board</label>
                            <select class="form-control st-disable" name="board">                                  
                                <option value="">-----Select-----</option>
                                <?php
                                $sql = $mysqli->query("SELECT * FROM `skyevo_board`");
                                while ($a = mysqli_fetch_assoc($sql)) :
                                    ?>
                                    <option value="<?= $a['board']; ?>" <?=(($r['pro_board']==$a['board'])?'selected':'')?>><?= $a['board']; ?></option>
                        <?php endwhile; ?> 
                            </select>
                        </div>
                        <div class="col-lg-4 form-group st-hide">
                            <label>Author Name <i class="text-danger">*</i></label>
                            <input type="text" name="author_name" placeholder="Author Name" value="<?=$r['pro_author']?>" class="form-control st-disable" required="">
                        </div>
                         
                        <div class="col-lg-4 form-group">
                            <label>Actual Price</label>
                            <input type="number" name="actutal_price" placeholder="Actual Price" value="<?=$r['pro_actual_price']?>" min="0" class="form-control">
                        </div>
                        <div class="col-lg-4 form-group">
                            <label>Selling price <i class="text-danger">*</i></label>
                            <input type="number" name="selling_price" placeholder="Selling price" value="<?=$r['pro_selling_price']?>" min="0" class="form-control" required="">
                        </div> 
                        <div class="col-lg-4 form-group">
                            <label>Quantity <i class="text-danger">*</i></label>
                            <input type="number" name="qun" placeholder="Quantity" min="0" value="<?=$r['pro_quant']?>" class="form-control " required=""> 
                        </div>
                        <div class="col-lg-4 form-group st-hide">
                            <label>Publication Year <i class="text-danger">*</i></label>
                            <input type="date" name="publication_year" placeholder="Pubication Year" value="<?=$r['pro_publication_year']?>" class="form-control st-disable" required="">
                        </div>
                        <div class="col-lg-4 form-group st-hide">
                            <label>Language</label>
                            <input type="text" name="language" placeholder="Language" value="<?=$r['pro_lanuage']?>" class="form-control st-disable">
                        </div>
                        <div class="col-lg-4 form-group st-hide">
                            <label>ISBN</label>
                            <input type="text" name="isbn" placeholder="ISBN" value="<?=$r['pro_isbn']?>" class="form-control st-disable">
                        </div>
                        <div class="col-lg-4 form-group st-hide">
                            <label>No. of Pages</label>
                            <input type="number" name="pages" placeholder="No. of Pages" min="0" class="form-control st-disable" value="<?=$r['pro_pages']?>">
                        </div>
                        <div class="col-lg-4 form-group st-hide">
                            <label>Seller</label>
                            <input type="text" name="seller" value="<?=$r['pro_seller']?>" placeholder="Seller" class="form-control st-disable">
                        </div>
                        <div class="col-lg-4 form-group st-hide">
                            <label>Binding</label>
                            <input type="text" name="binding" value="<?=$r['pro_binding']?>" placeholder="Binding" class="form-control st-disable">
                        </div>
                        <div class="col-lg-4 form-group st-hide">
                            <label>Genre</label>
                            <input type="text" name="genre" value="<?=$r['pro_genre']?>" placeholder="Genre" class="form-control st-disable">
                        </div>
                        <div class="col-lg-4 form-group">
                            <label>Rating</label>
                            <input type="text" name="rating" value="<?=$r['pro_rating']?>" placeholder="Rating" min="0" class="form-control">
                        </div>
                        <div class="col-lg-4 form-group">
                            <?php if($img!=''): ?>
                            <img src="../books_image/<?=$r['pro_image']?>" class="img-responsive" style="height: 180px; width: 170px; margin-top: 18px;" alt="saved"/>
                            <a href="editproducts?Edit=<?=$Edit?>&delete_image=1" class="text-danger" onclick="return confirm('Are you sure you want to delete this image?')">Delete Images</a>
                            <?php else: ?>
                            <label>Upload image</label>
                            <input type="file" name="file" class="form-control" required="">
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-12 form-group">
                            <label>Description</label>
                            <textarea class="form-control" id="textediter"></textarea>
                        </div>
                        <div class="col-lg-12 form-group ot-hide">
                            <label>Highlight</label>
                            <textarea class="form-control ot-disable" id="texteditor1"></textarea>
                        </div>
                        <div class="col-lg-12 form-group">
                            <input type="submit" value="Edit Product" class="btn btn-success pull-right">
                            <a href="fetchproducts.php" class="btn btn-default pull-right" style=" margin-right: 4px;">Cancel</a>     
                        </div>

                              
                    </div>    
                </form>
            </div> 
         </div> 
            <!--BREADCRUMB-->

        <!--RIGHT SECTION-->

    <!--FIRST ROW-->
    </div><br/>
    <!--FOOTER-->
    <div class="row">
        <?php include 'footer.php';?>
    </div>
    <!--FOOTER-->
    <script src="textediter/editor.js" type="text/javascript"></script>
    <script>
    $(document).ready(function(){
        if($('#cate').val()==="Stationery and Others"){
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
                // alert("ohter");
            }
        // $('.ot-hide').hide();
        // $(".ot-disable").prop('disabled', true);
        $('#cate').on('change',function(){
            if($('#cate').val()==="Stationery and Others"){
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
                // alert("ohter");
            }
        });

        // alert($('#cate').val());
    });
</script>
    <script>
        $(document).ready(function (){
            $("#textediter").Editor();
            var d = '<?=preg_replace("/'/", '',$r['description']);?>';
            $("#textediter").Editor('setText',d);

            $("#texteditor1").Editor();
            var d = '<?=preg_replace("/'/", '',$r['highlight']);?>';
            $("#texteditor1").Editor('setText',d);


        });
    </script>

    <script>
    $(document).ready(function(){ 
        $("#edit_product").submit(function(e){
            e.preventDefault();
            var des = $("#textediter").Editor("getText");
            var high = $("#texteditor1").Editor("getText");
            var data = new FormData(this);
            data.append('des',des);
            data.append('high',high);
            $.ajax({
                type: 'POST',
                url: "api/edit_product",
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
                        alert("Product has been updated successfully.");
                        location.reload();
                        
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
</div>
<!--MAIN BODY-->
</body>
</html>