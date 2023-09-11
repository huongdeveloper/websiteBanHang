<?php
include "header.php";
include "leftside.php";
include "class/product_class.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// include "class/product_class.php";
// require_once(__ROOT__.'../admin/class/product_class.php');
 ?>
<?php
$product = new product();
if (!isset($_GET['sanpham_id'])|| $_GET['sanpham_id']==NULL){
    echo "<script>window.location = 'productlist.php'</script>";
	 }
else {$sanpham_id = $_GET['sanpham_id'];
    }
    $delete_product = $product  -> delete_product($sanpham_id);
    $delete_product_anh =  $product -> delete_product_anh($sanpham_id);
    header('Location:Sanphamlist.php');
?>