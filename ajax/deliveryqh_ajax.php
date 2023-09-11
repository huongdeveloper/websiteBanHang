<?php
include "../class/index_class.php";
$index = new index;
if(isset($_GET['tinh_id']))
{
    $tinh = $_GET['tinh_id'];
  
}
?>

 <option value="#">Chọn Quận/Huyện</option>
 <?php
 $show_diachi_qh = $index -> show_diachi_qh($tinh);
if($show_diachi_qh){while($result = $show_diachi_qh->fetch_assoc()){
 ?>
    <option value="<?php echo $result['ma_qh'] ?>"><?php echo $result['quan_huyen'] ?></option>
<?php
}}
?>