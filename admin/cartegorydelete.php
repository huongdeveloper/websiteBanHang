<?php
include "header.php";
include "leftside.php";
include "class/Data_class.php";
// define('__ROOT__', dirname(dirname(__FILE__))); 
// require_once(__ROOT__.'../admin/class/cartegory_class.php');
 ?>
<?php
$cartegory = new data();
if (!isset($_GET['danhmuc_id'])|| $_GET['danhmuc_id']==NULL){
    echo "<script>window.location = 'cartegorylist.php'</script>";
	 }
else {$danhmuc_id = $_GET['danhmuc_id'];
    }
    $delete_cartegory = $cartegory  -> delete_cartegory($danhmuc_id);
    header('Location:cartegorylist.php');
?>