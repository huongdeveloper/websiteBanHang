<?php
include "header.php";
include "leftside.php";
include "class/Data_class.php"; 
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
                              <a href="brandadd.php" class="btn btn-add btn-sm" title="Thêm"><i class="fas fa-plus"></i>
                                Tạo loại sản phẩm mới</a>
                            </div>
                          </div>

                          <?php
                          $brand = new data;
                          $show_brand = $brand -> show_brand()
                          ?>
                          <div>
                          <table id="customers">
                    <tr>
                        <th>STT</th>
                      <th>ID</th>        
                      <th>Danh mục</th>
                      <th>Loại sản phẩm</th>
                      <th>Chức năng</th>
                    </tr>
                    <?php
                    if($show_brand){$i=0; while($result= $show_brand->fetch_assoc()){
                        $i++
                   
                    ?>
                    <tr>
                    <td> <?php echo $i ?></td>
                        <td> <?php echo $result['loaisanpham_id'] ?></td>
                        <td> <?php echo $result['danhmuc_ten']  ?></td>
                        <td> <?php echo $result['loaisanpham_ten'] ?></td>
                      <td style="width: 25%;">
                      <a href="branddelete.php?loaisanpham_id=<?php echo $result['loaisanpham_id'] ?>" class="btn btn-edit" type="button" title="Xóa"><i class="fas fa-trash-alt"></i></a>
                          <a href="brandUpdate.php?loaisanpham_id=<?php echo $result['loaisanpham_id'] ?>" class="btn btn-delete" type="button" title="Sửa"><i class="fas fa-edit"></i></a>
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