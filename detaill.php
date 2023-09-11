<?php 
  include "header.php";
  if (isset($_GET['status'])){
    $status = $_GET['status'];
    $session_idA = $_GET['session_idA'];
    $update_order = $index -> update_order($status,$session_idA);

    }
?>
    <section class="detail">
        <div class="rowB">
            <div class="detail-top">
                <h3>CHI TIẾT ĐƠN HÀNG</h3>
            </div>
            <h1>Mã đơn hàng:<span style="font-size: 20px; color: #378000;"><?php $ma = substr($session_id,0,8); echo $ma   ?></span></h1>
            <div class="detail-text">
                <div class="detail-text-left-content">
                    <p><span style="font-weight: bold; color:red">Thông tin giao hàng</span></p>
                    <br>
                    <?php 
                           $id = Session::get('register_id');
                           $get_register = $index ->show_register($id);
                          if($get_register){while($result = $get_register->fetch_assoc()){
                        ?>
                    <p><span style="font-weight: bold;">Họ và tên</span>: <?php echo $result['name'] ?></p>
                    <p><span style="font-weight: bold;">Số ĐT</span>: <?php echo $result['phone'] ?></p>
                    <p><span style="font-weight: bold;">Địa chỉ</span>: <?php echo $result['address'] ?></p>
                    <?php
                      }}
                    ?>
                    <?php
                      $show_payment = $index -> show_payment($session_id);
                      if($show_payment){while($result = $show_payment->fetch_assoc()){
                    ?>
                    <p><span style="font-weight: bold;">Phương thức giao hàng</span>: <?php echo $result['giaohang']  ?></p>
                    <p><span style="font-weight: bold;">Phương thức thanh toán</span>: <?php echo $result['thanhtoan']  ?></p>
                    <p><span style="font-weight: bold;">Tình trạng đơn hàng của bạn</span>: 
                    <?php if($result['statusA']== '0'){
                                echo 'Đang xử lý';
                            }elseif($result['statusA']== 1){
                    ?>
                        <a href="?status=2&session_idA=<?php echo $result['session_idA'] ?>">Đang giao hàng</a> 
                    <?php 
                            }else {
                                echo 'Đã nhận hàng';
                            }
                    ?></p>
                    <?php
                      }}
                    ?>
                </div>  
                <div class="detail-text-right-content">
                    <p><span style="font-weight: bold;color:red">Thông tin đơn hàng hàng</span></p>
                    <br>
                    <div class="detail-text-right">
                        <table>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Màu</th>
                                <th>Size</th>
                                <th>SL</th>
                                <th>Giá</th>
                            </tr>
                            <?php
                          
                               $SL = 0;
                               $TT = 0;
                               $show_carta = $index -> show_Cart_detaill($session_id);
                               if($show_carta){while($result = $show_carta->fetch_assoc()){
                            ?>   
                            <tr>
                               <td><img src="<?php echo $result['sanpham_anh'] ?>" alt=""></td>
                               <td><p><?php echo $result['sanpham_tieude'] ?></p></td>
                               <td><img src="<?php echo $result['color_anh'] ?>" alt=""></td>
                               <td><p><?php echo $result['sanpham_size'] ?></p></td>
                               <td><span><?php echo $result['quantitys'] ?></span></td>
                               <td><p><?php $resultC = number_format($result['sanpham_gia']); echo $resultC ?><sup>đ</sup></p></td>
                               <?php $a = (int)$result['sanpham_gia']; $b = (int)$result['quantitys']; $TTA = $a*$b;   ?>
                           </tr>
                          <?php
                           $SL = $SL + $result['quantitys'];
                           $TT =  $TT  + $TTA ;
                           
                               }}
                          ?>

                        </table>
                    </div>
                    <div class="detail-content-right-bottom">
                        <table>
                            <tr>
                                <th colspan="2">
                                    <p>TỔNG TIỀN GIỎ HÀNG</p>
                                </th>
                            </tr>
                            <tr>
                                <td>TỔNG SẢN PHẨM</td>
                                <td><?php $resultC = number_format($SL); echo $resultC ?></td>
                            </tr>
                            <tr>
                                <td>TỔNG TIỀN HÀNG</td>
                                <td>
                                    <p><?php $resultC = number_format($TT); echo $resultC ?><sup>đ</sup></p>
                                </td>
                            </tr>
                            <tr>
                                <td>THÀNH TIỀN</td>
                                <td>
                                    <p><?php $resultD = number_format($TT); echo $resultD; ?><sup>đ</sup></p>
                                </td>
                            </tr>
                            <tr>
                                <td>TẠM TÍNH</td>
                                <td>
                                    <p style="font-weight: bold; color: black;"><?php $resultC = number_format($TT); echo $resultC ?><sup>đ</sup></p>
                                </td>
                            </tr>
                        </table>
                    </div>

                </div>

            </div>
            <div class="success-button">
                <a href="index.php"><button>TIẾP TỤC MUA SẮM</button></a>
            </div>
            <br>
            <p class="detail-footer">Mọi thắc mắc quý khách vui lòng liên hệ hotline <span style="font-size: 20px; color: red;">0973 999 949 </span> hoặc chat với kênh hỗ trợ trên website để được hỗ trợ nhanh nhất.</p>
        </div>
    </section>

    <?php 
    include "footer.php";
    ?>