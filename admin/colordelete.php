<?php
include "header.php";
include "leftside.php";
include "class/Data_class.php";
$brand = new data;
if (isset($_GET['color_id'])|| $_GET['color_id']!=NULL){
    $color_id = $_GET['color_id'];
    }
    $delete_color = $brand -> delete_color($color_id);
    header('Location:colorlist.php');
?>
