<?php
include "header.php";
include "leftside.php";
include "class/product_class.php";
include "helper/format.php";
$product = new product();
$fm = new Format();
?>
<?php
if (isset($_GET['binhluan_id'])|| $_GET['binhluan_id']!=NULL){
    $binhluan_id = $_GET['binhluan_id'];
    }
    $delete_brand = $product -> delete_binhluan($binhluan_id);
    header('Location:binhluanAll.php');
?>
