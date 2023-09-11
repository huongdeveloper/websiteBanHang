<?php
include "header.php";
include "leftside.php";
include "class/product_class.php";
include "helper/format.php";
$product = new product();
$fm = new Format();
if (isset($_GET['status'])){
    $status = $_GET['status'];
    $session_idA = $_GET['session_idA'];
    $update_order = $product -> update_order($status,$session_idA);

    }
?>

      <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="orderlistall.php"><b>DS đơn hàng</b></a></li>
                <li class="breadcrumb-item active"><a href="orderlistdone.php"><b>Đã hoàn thành</b></a></li>
                <li class="breadcrumb-item active"><a href="orderlist.php"><b>Chưa hoàn thành</b></a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                           <h3>Các đơn hàng chưa hoàn thành:</h3>
                        </div>
                        <div>
                          <table id="customers">
                            <tr>
                              <th>STT</th>
                              <th>Mã đơn hàng</th>
                              <th>Ngày đặt hàng</th>
                              <th>ID khách hàng</th>
                              <th>Thông tin khách hàng</th>
                              <th>Giao hàng</th>
                              <th>Thanh toán</th>
                              <th>Chi tiết đơn hàng</th>
                              <th>Tình trạng</th>
                              <th>Chức năng</th>
                            </tr>
                            <?php
                            $show_orderAll = $product  -> show_orderAll();
                             if($show_orderAll){$i=0;while($result = $show_orderAll->fetch_assoc()){$i++;
                            ?>
                          <tr>
                            <td><?php echo $i ?></td>
                            <td><?php $ma = substr($result['session_idA'],0,8); echo $ma   ?></td>
                            <td><?php echo $result['order_date']?></td>
                            <td><?php echo $result['register_id']?></td>
                            <td class="td-list"><a href="register.php?registerid=<?php echo $result['register_id'] ?>"> Xem </a></td>
                            <td><?php echo $result['giaohang']  ?></td>
                            <td><?php echo $result['thanhtoan']  ?></td>
                            <td class="td-list"><a href="orderdetail.php?order_ma=<?php echo $result['session_idA'] ?>"> Xem </a></td>
                            <td> <a href="statisticalAdd.php?status=1&session_idA=<?php echo $result['session_idA'] ?>"><span class="badge bg-success">Đã xử lý</span></a> 
                              </td>
                            <td><a href="orderdelete.php?session_idA=<?php echo $result['session_idA'] ?>" class="btn btn-edit" type="button" title="Xóa" onclick="return confirm('Đơn hàng sẽ bị xóa vĩnh viễn, bạn có chắc muốn tiếp tục không?');"><i class="fas fa-trash-alt"></i></a></td>
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