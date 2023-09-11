<?php
include "header.php";
include "leftside.php";
include "class/product_class.php"; 
// define('__ROOT__', dirname(dirname(__FILE__)));
?>

      <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="Sanphamlist.php"><b>DS sản phẩm</b></a></li>
                <li class="breadcrumb-item active"><a href="cartegorylist.php"><b>DS danh mục</b></a></li>
                <li class="breadcrumb-item active"><a href="brandlist.php"><b>DS loại sản phẩm</b></a></li>
                <li class="breadcrumb-item active"><a href="colorlist.php"><b>DS màu sắc</b></a></li>
                <li class="breadcrumb-item active"><a href="anhSPlist.php"><b>DS ảnh sản phẩm</b></a></li>
                <li class="breadcrumb-item"><a href="sizeSPlist.php"><b> DS size sản phẩm</b></a></li>
                
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                            <div class="col-sm-2">
                              <!-- <a href="Sanphamlist.php" class="btn btn-add btn-sm" title="Thêm"><i class="fa-solid fa-chevrons-left"></i>
                                Trở lại</a> -->
                            </div>
                          </div>

                          <?php
                          $product = new product();
                          if (isset($_GET['sanpham_id'])|| $_GET['sanpham_id']!=NULL){
                            $sanpham_id = $_GET['sanpham_id'];
                            }
                            $get_size = $product -> get_size($sanpham_id);
                          ?>
                          <div>
                          <table id="customers">
                    <tr>
                        <th>STT</th>
                      <th>ID</th>        
                      <th>ID Sản phẩm</th>
                      <th>Mã Sản phẩm</th>
                      <th>Size Sản phẩm</th>
                      <th>Chức năng</th>
                    </tr>
                    <?php
                   if($get_size){$i=0; while($result= $get_size->fetch_assoc()){
                    $i++
                   
                    ?>
                    <tr>
                    <td> <?php echo $i ?></td>
                        <td> <?php echo $result['sanpham_size_id'] ?></td>
                        <td> <?php echo $result['sanpham_id'] ?></td>
                        <td> <?php echo $result['sanpham_ma']  ?></td>
                        <td> <?php echo $result['sanpham_size']  ?></td>
                      <td style="width: 25%;">
                          <a href="sizesanphamdelete.php?sanpham_size_id=<?php echo $result['sanpham_size_id'] ?>" class="btn btn-edit" type="button" title="Xóa"><i class="fas fa-trash-alt"></i></a>
                         
                      </td>
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
<script src="js/main.js"></script>
</html>