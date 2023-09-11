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
            <li class="breadcrumb-item active"><a href="#"><b>DS sản phẩm yêu thích</b></a></li>   
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                           <h3>Tất cả sản phẩm yêu thích:</h3>
                        </div>
                        <div>
                          <table id="customers">
                            <tr>
                              <th>STT</th>
                              <th>ID khách hàng</th>
                              <th>Thông tin khách hàng</th>
                              <th>Ảnh sản phẩm yêu thích</th>
                              <th>Tên sản phẩm</th>
                              <th>Giá sản phẩm</th>
                              <th>Chức năng</th>
                            </tr>
                            <?php
                            $show_wishlist = $product  -> show_wishlist();
                             if($show_wishlist){$i=0;while($result = $show_wishlist->fetch_assoc()){$i++;
                            ?>
                          <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $result['register_id']?></td>
                            <td class="td-list"><a href="register_wishlist.php?registerid=<?php echo $result['register_id'] ?>"> Xem </a></td>
                            <td><img src="uploads/<?php echo $result['sanpham_anh'] ?>" alt="" width="100px;"></td>
                            <td><p class="item-name-add">
                                <?php echo $fm -> textShorten($result['sanpham_tieude'],$limit = 30) ;?></p> 
                              </td>
                              <td> <?php $c = number_format($result['sanpham_gia']); echo $c  ?><sup>đ</sup></td>  
                            <td><a href="wishlistdelete.php?id=<?php echo $result['id'] ?>" onclick="return confirm('Sản phẩm yêu thích sẽ bị xóa vĩnh viễn, bạn có chắc muốn tiếp tục không?');" class="btn btn-edit" type="button" title="Xóa"><i class="fas fa-trash-alt"></i></a></td>
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