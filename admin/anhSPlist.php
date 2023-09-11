<?php
include "header.php";
include "leftside.php";
include "class/product_class.php"; 
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
                              <a href="anhSPadd.php" class="btn btn-add btn-sm" title="Thêm"><i class="fas fa-plus"></i>
                                Tạo ảnh sản phẩm mô tả mới</a>
                            </div>
                          </div>

                          <?php
                          $product = new product();
                          $get_all_anh = $product -> get_all_anh();
                          ?>
                          <div>
                          <table id="customers">
                    <tr>
                        <th>STT</th>
                      <th>ID</th>        
                      <th>ID Sản phẩm</th>
                      <th>Mã Sản phẩm</th>
                      <th>Ảnh mô tả</th>
                      <th>Chức năng</th>
                    </tr>
                    <?php
                    if($get_all_anh){$i=0; while($result= $get_all_anh->fetch_assoc()){
                        $i++
                   
                    ?>
                    <tr>
                        <td> <?php echo $i ?></td>
                        <td> <?php echo $result['sanpham_anh_id'] ?></td>
                        <td> <?php echo $result['sanpham_id']  ?></td>
                        <td> <?php echo $result['sanpham_ma']  ?></td>
                        <td> <img style="width: 100px; height: 100px" src="uploads/<?php echo $result['sanpham_anh'] ?>" alt=""></td>
                      <td style="width: 25%;">
                          <a href="anhSPdelete.php?sanpham_anh_id=<?php echo $result['sanpham_anh_id'] ?>" class="btn btn-edit" type="button" title="Xóa"><i class="fas fa-trash-alt"></i></a>
                          
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

<?php 
// include "cartegoryadd.php";
?>
</body>
<script src="js/main.js"></script>
</html>