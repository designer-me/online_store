<?php
    include '../config.php';
    //ob_start(); 
    $db->where("id",$_POST['id']);
    $data = $db->get("skyevo_product");
    foreach($data as $val){
  ?>
<div class="container">
    <!-- Trigger the modal with a button -->
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" onclick="closeModal()" aria-label="Close"> 
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="modal-title text-center"><?= $val['pro_title'] ?></h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 table-responsive">
                            <table class="table table-bordered">
                                <?php if($val['pro_title']!= ""){?>
                                <tr><td><b>Product-Title</b></td><td><?= $val['pro_title'] ?></td></tr>
                                <?php }?>
                                <?php if($val['pro_category']!= "" && $val['pro_sub_cat'] != ""){?>
                                <tr><td><b>Category / Sub-Category</b></td><td><?= $val['pro_category'] ?> / <?= $val['pro_sub_cat'] ?></td></tr>
                                <?php }?>
                                <?php if($val['pro_quant']!= ""){?>
                                <tr><td><b>Qty</b></td><td><?= $val['pro_quant'] ?></td></tr>
                                <?php }?>
                                <?php if($val['brand']!= ""){?>
                                <tr><td><b>Brand</b></td><td><?= $val['brand'] ?></td></tr>
                                <?php }?>
                                <?php if($val['pro_publisher']!= ""){?>
                                    <tr><td><b>Publisher</b></td><td><?= $val['pro_publisher'] ?></td></tr>
                                <?php }?>
                                <?php if($val['pro_author']!= ""){?>
                                <tr><td><b>Author</b></td><td><?= $val['pro_author'] ?></td></tr>
                                <?php }?>
                                <?php if($val['pro_lanuage']!= ""){?>
                                <tr><td><b>Language</b></td><td><?= $val['pro_lanuage'] ?></td></tr>
                                <?php }?>
                                <?php if($val['pro_binding']!= ""){?>
                                <tr><td><b>Binding</b></td><td><?= $val['pro_binding'] ?></td></tr>
                                <?php }?>
                                <?php if($val['pro_genre']!= ""){?>
                                    <tr><td><b>Genre</b></td><td><?= $val['pro_genre'] ?></td></tr>
                                <?php }?>
                            </table>
                        </div>
                        <div class="col-lg-6 table-responsive">
                            <table class="table table-bordered">
                                <?php if($val['pro_publication_year']!= ""){?>
                                <tr><td><b>Publication Year</b></td><td><?= $val['pro_publication_year'] ?></td></tr>
                                <?php }?>
                                <?php if($val['pro_isbn']!= ""){?>
                                <tr><td><b>ISBN</b></td><td><?= $val['pro_isbn'] ?></td></tr>
                                <?php }?>
                                <?php if($val['pro_pages']!= ""){?>
                                <tr><td><b>Pages</b></td><td><?= $val['pro_pages'] ?></td></tr>
                                <?php }?>
                                <?php if($val['pro_board']!= ""){?>
                                <tr><td><b>Board</b></td><td><?= $val['pro_board'] ?></td></tr>
                                <?php }?>
                                <?php if($val['pro_actual_price']!= ""){?>
                                <tr><td><b>Selling Price</b></td><td><i class="fa fa-inr"></i>&nbsp;<?= $val['pro_actual_price'] ?></td></tr>
                                <?php }?>
                                <?php if($val['pro_selling_price']!= ""){?>
                                <tr><td><b>Accutal Price</b></td><td><i class="fa fa-inr"></i>&nbsp;<strike><?= $val['pro_selling_price'] ?></strike></td></tr>
                                <?php }?>
                                <?php if($val['pro_seller']!= ""){?>
                                <tr><td><b>Seller</b></td><td><?= $val['pro_seller'] ?></td></tr>
                                <?php }?>
                                <?php if($val['pro_rating']!= ""){?>
                                <tr><td><b>Rating</b></td><td><?= $val['pro_rating'] ?></td></tr>
                                <?php }?>
                            </table>
                        </div>
                        <?php if($val['description']!= ""){?>
                            <div class="col-md-12">
                                <h4><b>Description</b></h4>
                                <p><?= $val['description'] ?></p>
                            </div>
                        <?php }?>
                        <?php if($val['highlight']!= ""){?>
                            <div class="col-md-12">
                                <h4><b>Highlight</b></h4>
                                <p><?= $val['highlight'] ?></p>
                            </div>
                        <?php }?>

                        <div class="col-md-12 text-center">    
                            <img src="../books_image/<?= $val['pro_image']; ?>" style="height: 250px; width: 220px;">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-default" onclick="closeModal()">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<script>
   function closeModal(){
       jQuery('#myModal').modal('hide');
            setTimeout(function(){
            jQuery('#myModal').remove();
            jQuery('modal-backdrop').remove();
            },500);
  } 
</script>
<?php //echo ob_get_clean();  ?>