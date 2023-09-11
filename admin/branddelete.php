<?php
include "header.php";
include "leftside.php";
include "class/Data_class.php";
 ?>
<?php
$brand = new data;
if (isset($_GET['loaisanpham_id'])|| $_GET['loaisanpham_id']!=NULL){
    $loaisanpham_id = $_GET['loaisanpham_id'];
    }
    $delete_brand = $brand -> delete_brand($loaisanpham_id);
    header('Location:brandlist.php');
?>
