<?php
include "../class/index_class.php";
$index = new index;
if(isset($_GET['quan_huyen_id']))
{
    $quan_huyen_id = $_GET['quan_huyen_id'];
  
}
?>

 <option value="#">Chọn Phường/Xã</option>
 <?php
 $show_diachi_px = $index -> show_diachi_px($quan_huyen_id);
if($show_diachi_px){while($result = $show_diachi_px->fetch_assoc()){
 ?>
    <option value="<?php echo $result['ma_px'] ?>"><?php echo $result['phuong_xa'] ?></option>
<?php
}}
?>