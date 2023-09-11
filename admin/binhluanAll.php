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
            <li class="breadcrumb-item active"><a href="binhluanAll.php"><b>DS khách hàng bình luận</b></a></li>
                <li class="breadcrumb-item active"><a href="binhluandone.php"><b>Đã kiểm tra</b></a></li>
                <li class="breadcrumb-item active"><a href="binhluanlist.php"><b>Chưa kiểm tra</b></a></li>
                
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                           <h3>Tất cả các Bình Luận:</h3>
                        </div>
                        <div>
                          <table id="customers">
                            <tr>
                              <th>STT</th>
                              <th>Tên khách hàng bình luận</th>
                              <th>Ngày bình luận</th>
                              <th>Thông tin bình luận</th>
                              <th>Bình luận Mã sản phẩm</th>
                              <th>Tình trạng</th>
                              <th>Chức năng</th>
                            </tr>
                            <?php
                            $show_binhluan = $product  -> show_binhluan();
                             if($show_binhluan){$i=0;while($result = $show_binhluan->fetch_assoc()){$i++;
                            ?>
                          <tr>
                            <td> <?php echo $i ?></td>
                            <td><?php echo $result['binhluan_ten'] ?></td>
                            <td><?php echo $result['binhluan_date']?></td>
                            <td><?php echo $result['binhluan']?></td>
                            <td><?php echo $result['sanpham_ma']?></td>
                           
                            <td> <?php if($result['blog_id']== 1){
                                            echo '<span class="badge bg-success">Đã xử lý</span>';
                                          }else {
                                            echo '<span class="badge bg-danger">Chưa xử lý</span>';
                                        }
                                   ?>
                              </td>
                            <td><a href="binhluandelete.php?binhluan_id=<?php echo $result['binhluan_id'] ?>" onclick="return confirm('Bình luận sản phẩm sẽ bị xóa vĩnh viễn, bạn có chắc muốn tiếp tục không?');" class="btn btn-edit" type="button" title="Xóa"><i class="fas fa-trash-alt"></i></a></td>
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