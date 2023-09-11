<?php
include "header.php";
include "leftside.php";
include "class/product_class.php";
include "helper/format.php";
$product = new product();
$fm = new Format();
if (isset($_GET['order_ma'])|| $_GET['order_ma']!=NULL){
    $order_ma = $_GET['order_ma'];
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
                           <h3>Chi tiết đơn hàng:</h3>
                        </div>
                        <div>
                          <table id="customers">
                            <tr>
                              <th>STT</th>
                              <th>Mã đơn hàng</th>
                              <th>Tên sản phẩm</th>
                              <th>Ảnh</th>
                              <th>Số lượng</th>
                              <th>Màu</th>
                              <th>Đơn giá</th>
                              <th>Thành tiền</th>
                            </tr>
                            <?php
                                $TT = 0;
                                $show_order_detail = $product  -> show_order_detail($order_ma);
                                if($show_order_detail){$i=0;while($result = $show_order_detail->fetch_assoc()){$i++;
                            ?>
                          <tr>
                              <td> <?php echo $i ?></td>
                              <td> <?php $ma = substr($result['session_idA'],0,8); echo $ma   ?></td>
                              <td> <?php echo $result['sanpham_tieude']?></td>
                              <td> <img style="width:50px" src="../<?php echo $result['sanpham_anh'] ?>" alt=""></td>
                              <td> <?php echo $result['quantitys']  ?></td>
                              <td> <img style="width:30px" src="../<?php echo $result['color_anh'] ?>" alt=""></td>
                              <td> <?php $c = number_format($result['sanpham_gia']); echo $c  ?><sup>đ</sup></td>    
                              <td><?php $a = (int)$result['sanpham_gia']; $b = (int)$result['quantitys']; $TTA = $a*$b; $f = number_format($TTA); echo $f  ?> <sup>đ</sup></td>
                          </tr>
                            <?php
                                 $TT =  $TT  + $TTA ;
                               }}
                            ?>
                            <tr>
                           <td style="font-weight: bold;" colspan="7" >Tổng tiền</td>
                           <td><?php $k = number_format($TT); echo $k ?> <sup>đ</sup></td>
                           </tr>
                          
                          </table>
                          <div class="update-profile"><a href="orderlistall.php"><button> Thoát</button></a></div>
                        </div>

                        <!-- Các nút chuyển trang cuối SP -->
                    
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
</html>