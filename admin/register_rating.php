<?php
include "header.php";
include "leftside.php";
include "class/product_class.php";
include "helper/format.php";
$product = new product();
$fm = new Format();

?>
?>

      <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b></b></a></li>
                
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                           <h3>Thông tin khách hàng:</h3>
                        </div>
                        <div>
                            <?php 
                            if(!isset($_GET['registerid']) || $_GET['registerid'] == NULL){
                                echo "";
                            }else {
                                $id = $_GET['registerid'];
                            }
                              $get_register = $product ->show_register($id);
                              if($get_register){while($result = $get_register->fetch_assoc()){
                            ?>
                        <form action="" method="POST">
                          <table id="customers">
       
                            <tr>
                              <th class="profile_th-item" >Name</th>
                              <td class="profile_input-item"><?php echo $result['name'] ?></td>
                            </tr> 
                            <tr>
                              <th>Phone</th>
                              <td class="profile_input-item"><?php echo $result['phone'] ?></td>
                            </tr>
                            <tr>
                              <th>Địa chỉ</th>
                              <td class="profile_input-item"><?php echo $result['address'] ?></td>
                            </tr>
                            <tr>
                              <th>Email</th>
                              <td class="profile_input-item"><?php echo $result['email'] ?></td>
                            </tr>
   
                          </table>
                        </form>
                         <div class="update-profile"><a href="rating.php"><button> Thoát</button></a></div>
                        
                        <?php  
                               }}
                             ?>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
</html>