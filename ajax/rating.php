<?php
define('__ROOT__', dirname(dirname(__FILE__))); 
require_once(__ROOT__.'/lib/database.php');

$db = new Database();
if(isset($_POST['index'])){
    $index = $_POST['index'];
    $sanpham_id =  $_POST['sanpham_id'];
    $register_id = $_POST['register_id'];

    $query = "INSERT INTO tbl_rating (sanpham_id,register_id,rating) VALUES ('$sanpham_id','$register_id','$index')";
    $result =$db ->insert($query);
}
?>

