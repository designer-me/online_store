<?php
include '../config.php';
$title = @$_POST['title'];
$cate = @$_POST['cate'];
$subcate = @$_POST['subcate'];
$pub = @$_POST['pub'];
$brand = @$_POST['brand'];
$author_name = @$_POST['author_name'];
$actutal_price = @$_POST['actutal_price'];
$selling_price = @$_POST['selling_price'];
$board = @$_POST['board'];
$qun = @$_POST['qun'];
$publication_year = @$_POST['publication_year'];
$language = @$_POST['language'];
$isbn = @$_POST['isbn'];
$pages = @$_POST['pages'];
$seller = @$_POST['seller'];
$binding = @$_POST['binding'];
$genre = @$_POST['genre'];
$rating = @$_POST['rating'];
$slug = createSlug($title);
$des = @$_POST['des'];
$highlight = @$_POST['high'];
if(empty($_FILES['file']['name'])){
    $data = array(
        "pro_title"=>$title,
        "pro_category"=>$cate,
        "pro_sub_cat"=>$subcate,
        "brand"=>$brand,
        "pro_publisher"=>$pub,
        "pro_author"=>$author_name,
        "pro_actual_price"=>$actutal_price,
        "pro_selling_price"=>$selling_price,
        "pro_quant"=>$qun,
        "pro_publication_year"=>$publication_year,
        "pro_lanuage"=>$language,
        "pro_isbn"=>$isbn,
        "pro_pages"=>$pages,
        "description"=>$des,
        "highlight"=>$highlight,
        "date"=>$date,
        "pro_slug"=>$slug,
        "pro_board"=>$board,
        "pro_seller"=>$seller,
        "pro_binding"=>$binding,
        "pro_genre"=>$genre,
        "pro_rating"=>$rating
    );
    $db->where("id",$_POST['edit_id']);
    if($db->update("skyevo_product",$data)){
        echo '1';
    }
    
}else{
    $loc = '../../books_image/';
    $image = $_FILES['file']['name'];
    $rand = rand("1111111111","9999999999");
    $new = $rand.$_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $file_ext = $_FILES['file']['type'];
    if ($file_ext == 'image/jpeg' || $file_ext == 'image/jpg' || $file_ext == 'image/png') {
        move_uploaded_file($tmp_name , "$loc/$new");
        $data = array(
        "pro_title"=>$title,
        "pro_category"=>$cate,
        "pro_sub_cat"=>$subcate,
        "brand"=>$brand,
        "pro_publisher"=>$pub,
        "pro_author"=>$author_name,
        "pro_actual_price"=>$actutal_price,
        "pro_selling_price"=>$selling_price,
        "pro_quant"=>$qun,
        "pro_publication_year"=>$publication_year,
        "pro_lanuage"=>$language,
        "pro_isbn"=>$isbn,
        "pro_pages"=>$pages,
        "pro_image"=>$new,
        "description"=>$des,
        "highlight"=>$highlight,
        "date"=>$date,
        "pro_slug"=>$slug,
        "pro_board"=>$board,
        "pro_seller"=>$seller,
        "pro_binding"=>$binding,
        "pro_genre"=>$genre,
        "pro_rating"=>$rating
    );
    $db->where("id",$_POST['edit_id']);
    if($db->update("skyevo_product",$data)){
        echo '1';
    }
    }else{
        echo '0';
    }
}