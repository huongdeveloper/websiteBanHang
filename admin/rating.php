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
            <li class="breadcrumb-item active"><a href="#"><b>DS sản phẩm đánh giá</b></a></li>   
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                           <h3>Tất cả sản phẩm đánh giá:</h3>
                        </div>
                        <div>
                          <table id="customers">
                            <tr>
                              <th>STT</th>
                              <th>ID khách hàng</th>
                              <th>Thông tin khách hàng</th>
                              <th>Sản phẩm đánh giá</th>
                              <th>Số lượng đánh giá</th>
                              <th>Chức năng</th>
                            </tr>
                            <?php
                            $show_rating = $product  -> show_rating();
                             if($show_rating){$i=0;while($result = $show_rating->fetch_assoc()){$i++;
                            ?>
                          <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $result['register_id']?></td>
                            <td class="td-list"><a href="register_rating.php?registerid=<?php echo $result['register_id'] ?>"> Xem </a></td>
                            <td><?php echo $result['sanpham_tieude'] ?></td>
                            <td><?php echo $result['rating'] ?> <span style="color:#ffcc00; font-size: 1.3rem;">&#9733;</span></td>
                            <td><a href="ratingdelete.php?id=<?php echo $result['id'] ?>" onclick="return confirm('Đánh giá sản phẩm sẽ bị xóa vĩnh viễn, bạn có chắc muốn tiếp tục không?');" class="btn btn-edit" type="button" title="Xóa"><i class="fas fa-trash-alt"></i></a></td>
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