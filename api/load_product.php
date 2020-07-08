<?php
include '../config.php';
if(isset($_POST["action"]))
{
    
    $query = "
		SELECT * FROM skyevo_product WHERE status = '1' 
    ";
    if(isset($_POST["minimum_price"], $_POST["maximum_price"]))
    {
        
            $query .= "
             AND `pro_selling_price` BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
            ";
    }
    if(isset($_POST["cat"]))
    {
            $cat = implode("','", $_POST["cat"]);
            $query .= "
             AND pro_category IN('".$cat."')
            ";
    }
    if(isset($_POST["sub_cat"]))
    {
            $ram_filter = implode("','", $_POST["sub_cat"]);
            $query .= "
             AND pro_sub_cat IN('".$ram_filter."')
            ";
    }
    if(isset($_POST["review"]))
    {
            $review = implode("','", $_POST["review"]);
            $query .= "
             AND pro_rating IN('".$review."')
            ";
    }
    
    $statement = $mysqli->query($query);
    $count = mysqli_num_rows($statement);
    if($count != "0"){
        while($pro = mysqli_fetch_assoc($statement)){
            $desc = strip_tags($pro['description']);
        ?>
        <div class="col-lg-4 col-xs-6 r-full-width">
            <div class="product-box">
                <div class="product-img">
                    <img src="books_image/<?=$pro['pro_image']?>" alt="<?=$pro['pro_title']?>" title="<?=$pro['pro_title']?>" style="width: 132px; height: 197px;">
                    <ul class="product-cart-option position-center-x">
                        <li><a href="shop-detail/<?=$pro['id']?>/<?=$pro['pro_slug']?>"><i class="fa fa-eye"></i></a></li>
                        <li><a href="shop-detail/<?=$pro['id']?>/<?=$pro['pro_slug']?>"><i class="fa fa-cart-arrow-down"></i></a></li>
                    </ul>
                </div>
                <div class="product-detail">
                    <h5><?=substr($pro['pro_title'],0,15)?>...</h5>
                    <p><?=substr($desc,0,26)?>...</p>
                    <div class="rating-nd-price">
                        <strong><i class="fa fa-inr"></i> <?=$pro['pro_selling_price']?> <?=(($pro['pro_actual_price'] != "")?'<span class="text-danger" style="font-size:14px;"><strike><i class="fa fa-inr"></i> '.$pro['pro_actual_price'].'</strike></span>':'')?></strong>
                        <ul class="rating-stars">
                            <?php
                            if($pro['pro_rating'] == "0"){
                            ?>
                            <img src="<?=$home_url?>images/0.png">
                            <?php
                            }else if($pro['pro_rating'] == "1"){
                            ?>
                            <img src="<?=$home_url?>images/1.png">
                            <?php
                            }else if($pro['pro_rating'] == "2"){
                            ?>
                            <img src="<?=$home_url?>images/2.png">
                            <?php
                            }else if($pro['pro_rating'] == "3"){
                            ?>
                            <img src="<?=$home_url?>images/3.png">
                            <?php
                            }else if($pro['pro_rating'] == "4"){
                            ?>
                            <img src="<?=$home_url?>images/4.png">
                            <?php
                            }else if($pro['pro_rating'] == "5"){
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
    <?php
    }else{
        echo '<h4 class="alert alert-danger text-center">No Product Found.</h4>';
    }
}
?>