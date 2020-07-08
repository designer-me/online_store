<?php
include './config.php';
$searchTerm = $_GET['term'];
$query = $mysqli->query("SELECT * FROM skyevo_product where pro_title LIKE '%".$searchTerm."%'");
//if(!$query){
//    echo 'insert failed: ' . $db->getLastError();
//}else{
//    echo 'yes';
//}
while ($row = mysqli_fetch_assoc($query)) {
    $data[] = $row['pro_title'];
}
if(empty($data)){
    $msg[] = "No Result Found";
    echo json_encode($msg);
}else{
echo json_encode($data);
}
?>