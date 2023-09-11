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
                              <a class="btn btn-add btn-sm" href="Sanphamadd.php" title="Thêm"><i class="fas fa-plus"></i>
                                Tạo mới sản phẩm</a>
                            </div>
                          </div>
                        <div>
                          <table id="customers">
                            <tr>
                              <th>Mã sản phẩm</th>
                              <th>Tên sản phẩm</th>
                              <th>Danh mục</th>
                              <th>Loại sản phẩm</th>
                              <th>Màu </th>
                              <th>Giá tiền</th>
                              <th>Giảm giá</th>
                              <th>Số lượng</th>
                              <th>Ảnh sản phẩm</th>
                              <th>Ảnh mô tả</th>
                              <th>Size sản phẩm</th>
                              <th>Tình trạng</th>
                              <th>Sản phẩm host</th>
                              <th>Sắp xếp SP</th>
                              <th>Chức năng</th>
                            </tr>
                            <?php
                                $show_product = $product ->show_product();
                                if($show_product){$i=0; while($result = $show_product ->fetch_assoc()){$i++;

                              ?>
                          <tr>
                              <td width="10"><?php echo $result['sanpham_ma'] ?></td>
                              <td><p class="item-name-add">
                                <?php echo $fm -> textShorten($result['sanpham_tieude'],$limit = 30) ;?></p> 
                              </td>
                              <td><?php echo $result['danhmuc_ten'] ?></td>
                              <td> <?php echo $result['loaisanpham_ten']  ?></td>
                              <td><?php echo $result['color_ten'] ?></td>
                              <td><?php echo $result['sanpham_gia'] ?></td>
                              <td><?php echo $result['giamgia'] ?></td>
                              <td><?php echo $result['soluong'] ?></td>
                              <td><img src="uploads/<?php echo $result['sanpham_anh'] ?>" alt="" width="100px;"></td>
                              <td class="td-list"><a href="anhsanphamlist.php?sanpham_id=<?php echo $result['sanpham_id'] ?>"> Xem </a></td>
                              <td class="td-list"><a href="sizesanphamlist.php?sanpham_id=<?php echo $result['sanpham_id'] ?>"> Xem </a></td>
                              <td> <?php if($result['tinhtrang']==1){
                                           echo '<span class="badge bg-success">Còn hàng</span>';
                                          }else{
                                            echo '<span class="badge bg-danger">Hết hàng</span>';
                                          }
                                   ?>
                              </td>
                              <td> <?php if($result['sanpham_host']==1){
                                            echo '<span class="badge bg-daner">GIRL</span>';
                                          }elseif($result['sanpham_host']==2){
                                            echo '<span class="badge bg-suces">MEN</span>';
                                          }elseif($result['sanpham_host']==3){
                                            echo '<span class="badge bg-confirmid">KIDS</span>';
                                          }else {
                                            echo '<span class="badge bg-confi">Khác</span>';
                                          }
                                   ?>
                              </td>
                              <td> <?php if($result['sapxepsp']==0){
                                            echo '<span class="badge bg-danfi">Mới nhất</span>';
                                          }else {
                                            echo '<span class="badge bg-confile">Bán chạy</span>';
                                          }
                                   ?>
                              </td>
                              <td><a href="Sanphamdelete.php?sanpham_id=<?php echo $result['sanpham_id'] ?>" class="btn btn-edit" type="button" title="Xóa">
                                <i class="fas fa-trash-alt"></i> 
                                  </a>
                                  <a href="SanphamUpdate.php?sanpham_id=<?php echo $result['sanpham_id'] ?>" class="btn btn-delete" type="button" title="Sửa">
                                    <i class="fas fa-edit"></i></a>
                              </td>
                          </tr>
                          <?php
                           }}
                           ?> 
                          </table>
                        </div>

                        <!-- Các nút chuyển trang cuối SP -->
                    <ul class="pagination home-product_pagination">
                        <?php 
                           $product_All = $product ->show_All_product();
                           $product_count = mysqli_num_rows($product_All);
                           $product_button = ceil($product_count/10);
                           $i = 1;
                           echo '<li class="pagination-item">
                           <a href="" class="pagination-item_link">
                               <i class="pagination-item_icon fa-solid fa-chevron-left" style="padding: 5px;"></i>
                           </a>
                       </li>';
                          for ($i = 1; $i <= $product_button; $i++){
                            echo '<li class="pagination-item ">
                            <a href="Sanphamlist.php?trang= '.$i.'" class="pagination-item_link">'.$i.'</a>
                        </li>';
                          }
                          echo ' <li class="pagination-item">
                          <a href="" class="pagination-item_link">
                              <i class="pagination-item_icon fa-solid fa-chevron-right" style="padding: 5px;"></i>
                          </a>
                      </li>';
                        ?>
                    </ul>

                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
</html>