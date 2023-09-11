<?php 
  include "header.php";
?>
<?php
$id = Session::get('register_id');
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])){
	$update_detail = $index ->update_register($_POST,$id );
    header('Location:profile.php');
}
?>

<div class="profile_customers">
    <div class="profile_customers-item">
    <a href="profile.php"><i class="fa-solid fa-arrow-left"></i></a>
    <h3>Cập nhật thông tin cá nhân</h3>
</div>
<form action="" method="POST">
<table id="customers">
        <?php 
          $id = Session::get('register_id');
          $get_register = $index ->show_register($id);
          if($get_register){while($result = $get_register->fetch_assoc()){
        ?>
   <tr>
    <th>Name</th>
    <td><input class="profile_input-item" type="text" name="name" value="<?php echo $result['name'] ?>"></td>
   </tr> 
   <tr>
    <th>Phone</th>
    <td><input class="profile_input-item" type="text" name="phone" value="<?php echo $result['phone'] ?>"></td>
   </tr>
   <tr>
    <th>Địa chỉ</th>
    <td><input class="profile_input-item" type="text" name="address" value="<?php echo $result['address'] ?>"></td>
   </tr>
   <tr>
    <th>Email</th>
    <td><input class="profile_input-item" type="text" name="email" value="<?php echo $result['email'] ?>"></td>
   </tr>
   <?php  
      }}
    ?>
</table>
<div class="update-profile"><a href="detail.php"><button name="update"> Cập nhật</button></a></div>
</form>
</div>




<?php 
    include "footer.php";
    ?>