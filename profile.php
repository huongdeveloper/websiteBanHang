<?php 
  include "header.php";
?>

<div class="profile_customers">
    <h3>Thông tin cá nhân</h3>
<table id="customers">
        <?php 
          $id = Session::get('register_id');
          $get_register = $index ->show_register($id);
          if($get_register){while($result = $get_register->fetch_assoc()){
        ?>
   <tr>
    <th>Name</th>
    <td><?php echo $result['name'] ?></td>
   </tr> 
   <tr>
    <th>Phone</th>
    <td><?php echo $result['phone'] ?></td>
   </tr>
   <tr>
    <th>Địa chỉ</th>
    <td><?php echo $result['address'] ?></td>
   </tr>
   <tr>
    <th>Email</th>
    <td><?php echo $result['email'] ?></td>
   </tr>
   <?php  
      }}
    ?>
</table>
<div class="update-profile"><a href="detail.php"><button> Cập nhật thông tin</button></a></div>
</div>




<?php 
    include "footer.php";
    ?>