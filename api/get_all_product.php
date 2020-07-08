<?php
include '../config.php';
$item_per_page = 9;
if(isset($_POST["page"])){
        $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
        if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
        $page_number = 1;
}
$position = (($page_number-1) * $item_per_page);
$db->orderby("id","desc");
$db->where("status","1");
$pro = $db->withTotalCount()->get('skyevo_product', Array ($position, $item_per_page));
for($i=0; $i<sizeof($pro); $i++){
    $desc = strip_tags($pro[$i]['description']);
?>
<div class="col-lg-4 col-xs-6 r-full-width">
    <div class="product-box">
        <div class="product-img">
            <img src="books_image/<?=$pro[$i]['pro_image']?>" alt="<?=$pro[$i]['pro_title']?>" title="<?=$pro[$i]['pro_title']?>" style="width: 132px; height: 197px;">
            <ul class="product-cart-option position-center-x">
                <li><a href="shop-detail/<?=$pro[$i]['id']?>/<?=$pro[$i]['pro_slug']?>"><i class="fa fa-eye"></i></a></li>
                <li><a href="shop-detail/<?=$pro[$i]['id']?>/<?=$pro[$i]['pro_slug']?>"><i class="fa fa-cart-arrow-down"></i></a></li>
            </ul>
        </div>
        <div class="product-detail">
            <h5><?=substr($pro[$i]['pro_title'],0,15)?>...</h5>
            <p><?=substr($desc,0,26)?>...</p>
            <div class="rating-nd-price">
                <strong><i class="fa fa-inr"></i> <?=$pro[$i]['pro_selling_price']?> <?=(($pro[$i]['pro_actual_price'] != "")?'<span class="text-danger" style="font-size:14px;"><strike><i class="fa fa-inr"></i> '.$pro[$i]['pro_actual_price'].'</strike></span>':'')?></strong>
                <ul class="rating-stars">
                    <?php
                    if($pro[$i]['pro_rating'] == "0"){
                    ?>
                    <img src="<?=$home_url?>images/0.png">
                    <?php
                    }else if($pro[$i]['pro_rating'] == "1"){
                    ?>
                    <img src="<?=$home_url?>images/1.png">
                    <?php
                    }else if($pro[$i]['pro_rating'] == "2"){
                    ?>
                    <img src="<?=$home_url?>images/2.png">
                    <?php
                    }else if($pro[$i]['pro_rating'] == "3"){
                    ?>
                    <img src="<?=$home_url?>images/3.png">
                    <?php
                    }else if($pro[$i]['pro_rating'] == "4"){
                    ?>
                    <img src="<?=$home_url?>images/4.png">
                    <?php
                    }else if($pro[$i]['pro_rating'] == "5"){
                    ?>
                    <img src="<?=$home_url?>images/5.png">
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php
}
?>