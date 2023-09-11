<?php
include "header.php";
include "leftside.php";
include "class/product_class.php";
include "helper/format.php";
$product = new product();
$fm = new Format();
if (isset($_GET['blog_id'])){
    $blog_id = $_GET['blog_id'];
    $update_binhluan = $product -> update_binhluan($blog_id);
  
    }
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
                           
                            <td> <a href="?blog_id=0"><span class="badge bg-danger">Chưa xử lý</span></a> 
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
</html>