<?php
include "header.php";

?>
<?php

if (isset($_GET['cart_id'])|| $_GET['cart_id']!=NULL){
    $cart_id = $_GET['cart_id'];
    }
    $delete_cart = $index -> delete_cart($cart_id);
    header('Location:cart.php?');
?>
