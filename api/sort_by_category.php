<?php
include '../config.php';
$cat = $_GET['cat'];
$db->where("status","1");
$db->where("pro_sub_cat",$cat);
$db->orderby("id","desc");
$bookColl = $db->get("skyevo_product",10);
for($i=0;$i<sizeof($bookColl);$i++){
    ?>
    <li>
        <div class="s-product">
            <div class="s-product-img">
                <img src="books_image/<?=$bookColl[$i]['pro_image']?>" alt="" style="width: 151px; height: 218px;">
                <div class="s-product-hover">
                    <div class="position-center-x">
                        <a href="shop-detail/<?=$bookColl[$i]['id']?>/<?=$bookColl[$i]['pro_slug']?>" class="plus-icon"><i class="fa fa-shopping-cart"></i></a>
                            <!--<a class="btn-1 sm shadow-0" data-toggle="modal" data-target="#quick-view" href="#"></a>-->
                    </div>
                </div>
            </div>
            <h6><a href="shop-detail/<?=$bookColl[$i]['id']?>/<?=$bookColl[$i]['pro_slug']?>"><?= substr($bookColl[$i]['pro_title'],0,15)?>...</a></h6>
            <span><?= substr($bookColl[$i]['pro_author'],0,15)?></span>
        </div>
    </li>
    <?php
}