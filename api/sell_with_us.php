<?php
include '../config.php';
$comp_name = $_POST['comp_name'];
$year_estab = $_POST['year_estab'];
$industry_type = $_POST['industry_type'];
$pan_number = $_POST['pan_number'];
$shop_number = $_POST['shop_number'];
$representative_name = $_POST['representative_name'];
$designation_name = $_POST['designation_name'];
$product_details = $_POST['product_details'];
$contact_num1 = $_POST['contact_num1'];
$contact_num2 = $_POST['contact_num2'];
$contact_repres1 = $_POST['contact_repres1'];
$contact_repres2 = $_POST['contact_repres2'];
$email_id = $_POST['email_id'];
$address = $_POST['address'];
$city = $_POST['city'];
$district = $_POST['district'];
$state = $_POST['state'];
$pin_code = $_POST['pin_code'];
$folder = "../seller_document";
//file 1
$file1 = $_FILES['pan_card']['name'];
$type1 = $_FILES['pan_card']['type'];
$tmp_name1 = $_FILES['pan_card']['tmp_name'];
$nameArray1=explode('.',$file1);
$fileName1=$nameArray1[0];
$fileExt1=$nameArray1[1];
$uploadName1=md5(microtime()).'.'.$fileExt1;
//file 2
$file2 = $_FILES['pan_card_vendor']['name'];
$type2 = $_FILES['pan_card_vendor']['type'];
$tmp_name2 = $_FILES['pan_card_vendor']['tmp_name'];
$nameArray2=explode('.',$file2);
$fileName2=$nameArray2[0];
$fileExt2=$nameArray2[1];
$uploadName2=md5(microtime()).'.'.$fileExt2;
//file 3
$file3 = $_FILES['passbook_statement']['name'];
$type3 = $_FILES['passbook_statement']['type'];
$tmp_name3 = $_FILES['passbook_statement']['tmp_name'];
$nameArray3=explode('.',$file3);
$fileName3=$nameArray3[0];
$fileExt3=$nameArray3[1];
$uploadName3=md5(microtime()).'.'.$fileExt3;
//file 4
$file4 = $_FILES['address_proof']['name'];
$type4 = $_FILES['address_proof']['type'];
$tmp_name4 = $_FILES['address_proof']['tmp_name'];
$nameArray4=explode('.',$file4);
$fileName4=$nameArray4[0];
$fileExt4=$nameArray4[1];
$uploadName4=md5(microtime()).'.'.$fileExt4;
//file 5
$file5 = $_FILES['photo_vendor']['name'];
$type5 = $_FILES['photo_vendor']['type'];
$tmp_name5 = $_FILES['photo_vendor']['tmp_name'];
$nameArray5=explode('.',$file5);
$fileName5=$nameArray5[0];
$fileExt5=$nameArray5[1];
$uploadName5=md5(microtime()).'.'.$fileExt5;
if(($type1 == "image/jpeg") || ($type1 == "image/jpg") || ($type1 == "image/png") && ($type2 == "image/jpeg") || ($type2 == "image/jpg") || ($type2 == "image/png") && ($type3 == "image/jpeg") || ($type3== "image/jpg") || ($type3 == "image/png") && ($type4 == "image/jpeg") || ($type4 == "image/jpg") || ($type4 == "image/png") && ($type5 == "image/jpeg") || ($type5 == "image/jpg") || ($type5 == "image/png")){
    move_uploaded_file("$tmp_name1", "$folder/$uploadName1"); 
    move_uploaded_file("$tmp_name2", "$folder/$uploadName2"); 
    move_uploaded_file("$tmp_name3", "$folder/$uploadName3"); 
    move_uploaded_file("$tmp_name4", "$folder/$uploadName4"); 
    move_uploaded_file("$tmp_name5", "$folder/$uploadName5"); 
    $data = array(
        "comp_name"=>$comp_name,
        "year_estab"=>$year_estab,
        "industry_type"=>$industry_type,
        "pan_number"=>$pan_number,
        "shop_number"=>$shop_number,
        "representative_name"=>$representative_name,
        "designation_name"=>$designation_name,
        "product_details"=>$product_details,
        "contact_num1"=>$contact_num1,
        "contact_num2"=>$contact_num2,
        "contact_repres1"=>$contact_repres1,
        "contact_repres2"=>$contact_repres2,
        "email_id"=>$email_id,
        "address"=>$address,
        "city"=>$city,
        "district"=>$district,
        "state"=>$state,
        "pin_code"=>$pin_code,
        "pan_card"=>$uploadName1,
        "pan_card_vendor"=>$uploadName2,
        "passbook_statement"=>$uploadName3,
        "address_proof"=>$uploadName4,
        "photo_vendor"=>$uploadName5,
        "date"=>$date
    );
    if($db->insert("skyevo_sell_with_us",$data)){
        echo '1';
    }
}else{
    echo '0';
}