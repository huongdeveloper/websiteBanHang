<?php
include "../class/product_class.php";
include "../lib/database.php";

$product = new product;
$danhmuc_id = $_GET['danhmuc_id']
?>

<option value="">--Chọn--</option>
<?php
 $show_loaisanpham_ajax = $product -> show_loaisanpham_ajax($danhmuc_id);
   if($show_loaisanpham_ajax){while ($result = $show_loaisanpham_ajax ->fetch_assoc()) {
  ?>
<option value="<?php echo $result['loaisanpham_id']  ?>"><?php echo $result['loaisanpham_ten']  ?></option>
<?php
}}
?>