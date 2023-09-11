<?php
include "header.php";
include "leftside.php";
include "class/product_class.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// require_once(__ROOT__.'../admin/class/cartegory_class.php');
 ?>
<?php
$product = new product();
if (isset($_GET['sanpham_size_id'])|| $_GET['sanpham_size_id']!=NULL){
    $sanpham_size_id = $_GET['sanpham_size_id'];
    }
    $delete_size_sanpham = $product -> delete_size_sanpham($sanpham_size_id);
    header('Location:Sanphamlist.php?');
?>
