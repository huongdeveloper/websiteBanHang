<?php
include "header.php";
include "leftside.php";
include "class/product_class.php";
include "helper/format.php";
$product = new product();
$fm = new Format();
?>

      <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>DS khách hàng</b></a></li>   
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                           <h3>Tất cả các khách hàng:</h3>
                        </div>
                        <div>
                          <table id="customers">
                            <tr>
                              <th>STT</th>
                              <th>Name</th>
                              <th>Address</th>
                              <th>Phone</th>
                              <th>Email</th>
                              <th>Chức năng</th>
                            </tr>
                            <?php
                            $show_registerKH = $product  -> show_registerKH();
                             if($show_registerKH){$i=0;while($result = $show_registerKH->fetch_assoc()){$i++;
                            ?>
                          <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $result['name']?></td>
                            <td><?php echo $result['address']?></td>
                            <td><?php echo $result['phone']?></td>
                            <td><?php echo $result['email']?></td> 
                            <td><a href="registerKHdelete.php?id=<?php echo $result['id'] ?>" onclick="return confirm('Thông tin khách hàng sẽ bị xóa vĩnh viễn, bạn có chắc muốn tiếp tục không?');" class="btn btn-edit" type="button" title="Xóa"><i class="fas fa-trash-alt"></i></a></td>
                          </tr>
                          <?php
                            }}
                          ?>
                          </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
</html>