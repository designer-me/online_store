<?php 
include './config.php';
if(@$_POST['id']){
    $id = $_POST['id'];
    $s = "select * from skyevo_category where `sub_category` = '$id'";
    $q = $mysqli->query($s);
    ?>
    <option selected="selected" value="">---Select Sub Category---</option>
    <?php while($r = mysqli_fetch_assoc($q)): ?>
    <option value="<?=$r['category']?>"><?=$r['category'];?></option>
    <?php endwhile; ?>
    <?php
}else{
    $s = "select * from skyevo_category where `sub_category` = '$_POST[cat]'";
    $q = $mysqli->query($s);
    
    ?>
    <option selected="selected" value="">---Select Sub Category---</option>
    <?php while($r = mysqli_fetch_assoc($q)): ?>
    <option value="<?=$r['category']?>" <?=(($_POST['sub']==$r['category'])?'selected':'')?>><?=$r['category'];?></option>
    <?php endwhile; ?>
    <?php
}
?>