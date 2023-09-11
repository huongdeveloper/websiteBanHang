<?php
include "header.php";
include "leftside.php";
include "class/product_class.php";
include "helper/format.php";
$product = new product();
$fm = new Format();
?>
<?php
$product = new product();
if (!isset($_GET['session_idA'])|| $_GET['session_idA']==NULL){
    echo "<script>window.location = 'orderlistall.php'</script>";
	 }
else {$session_idA = $_GET['session_idA'];
    }
    $delete_payment = $product  -> delete_payment($session_idA);
    $delete_order =  $product -> delete_order($register_id);
    $delete_cart =  $product -> delete_cart($session_idA);

    header('Location:orderlistall.php');
?>