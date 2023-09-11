<?php 
  include "header.php";
?>
    <section class="delivery">
        <div class="row">
            <div class="delivery-top-wrap">
                <div class="delivery-top">
                    <div class="delivery-top-delivery delivery-top-item">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="delivery-top-adress delivery-top-item">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="delivery-top-payment delivery-top-item">
                        <i class="fas fa-money-check-alt"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
        <?php 
            $session_id  = session_id();
            $show_cart = $index -> show_cart($session_id);
            if($show_cart) 
            {
            
        ?>
            <form action="Xulypay.php" method="POST">
                <div class="delivery-content git">
                    <div class="delivery-content-left">
                        <h2>Thông tin thanh toán và địa chỉ giao hàng :</h2>
                        <div class="delivery-content-left-input-top git">
                        <?php 
                           $id = Session::get('register_id');
                           $get_register = $index ->show_register($id);
                          if($get_register){while($result = $get_register->fetch_assoc()){
                        ?>
                            <div class="delivery-content-left-input-top-item">
                                <label for="">Họ tên <span style="color: red;">*</span></label>
                                <input name="customer_name" type="text" value="<?php echo $result['name'] ?>">
                            </div>
                            <div class="delivery-content-left-input-top-item">
                                <label for="">Điện thoại <span style="color: red;">*</span></label>
                                <input name="customer_phone" type="text"  value="<?php echo $result['phone'] ?>">
                            </div>
                            <div class="delivery-content-left-input-top-item">
                                <label for="">Email <span style="color: red;">*</span></label>
                                <input name="customer_email" type="text" value="<?php echo $result['email'] ?>">
                            </div>
                            <div class="delivery-content-left-input-top-item">
                                <label for="">Địa chỉ <span style="color: red;">*</span></label>
                                <input name="customer_address" type="text"  value="<?php echo $result['address'] ?>">
                            </div>
                            <?php  
                               }}
                             ?>
                            <div class="row">
                                <div class="delivery-content-left-cart">
                                    <table>
                                        <tr>
                                            <th>Tên sản phẩm</th>
                                            <th>Đơn giá</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                        <?php
                                           $session_id = session_id();
                                           $SL = 0;
                                           $TT = 0;
                                           $show_cartB = $index -> show_cartB($session_id);
                                           if($show_cartB){while($result = $show_cartB->fetch_assoc()){
                    
                                        ?> 

                                        <tr>
                                           <td><?php  echo $result['sanpham_tieude'] ?></td>
                                           <td><?php $a = number_format($result['sanpham_gia']); echo $a  ?></td>
                                           <td><?php echo $result['quantitys'] ?></td>
                                           <td><p><?php $Sum = $result['sanpham_gia']*$result['quantitys']; $b = number_format($Sum); echo $b ?><sup>đ</sup></p></td>    
                                        </tr>
                                        <?php
                                         }}
                                         ?>
                                        <tr style="border-top: 2px solid red">

                                            <td style="font-weight: bold;border-top: 2px solid #dddddd" colspan="3">Tổng</td>
                                            <td style="font-weight: bold;border-top: 2px solid #dddddd">
                                                <p><?php if(Session::get('TT'))  {echo Session::get('TT'); } ?><sup>đ</sup></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;" colspan="3">Tổng tiền hàng</td>
                                            <input type="hidden" name="total_congthanhtoan" value="<?php echo $Sum ?>">
                                            <td style="font-weight: bold;">
                                                <p><?php if(Session::get('TT'))  {echo Session::get('TT'); } ?><sup>đ</sup></p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="delivery-content-right">
                        <div class="payment-content-left-method-delivery">
                            <h2>Phương thức giao hàng :</h2> <br>
                            <div class="payment-content-left-method-delivery-item">
                                <input name="deliver-method" value="Giao hàng chuyển phát nhanh" checked type="radio">
                                <label for="">Giao hàng chuyển phát nhanh</label>
                            </div>
                        </div>
                        <br>
                        <div class="payment-content-left-method-payment">
                            <h2>Phương thức thanh toán :</h2><br>
                            <p>Mọi giao dịch đều được bảo mật và mã hóa. Thông tin thẻ tín dụng sẽ không bao giờ được lưu lại.</p> <br>
                            <div class="payment-content-left-method-payment-item">
                                <input name="paymentS" type="radio" value="VNPAY">
                                <label for="">Thanh toán bằng thẻ tín dụng ( VNPAY )</label>
                            </div>
                            <div class="payment-content-left-method-payment-item-img">
                                <img src="assets/img/visa.png" alt="">
                            </div>
                            <div class="payment-content-left-method-payment-item">
                                <input name="paymentS" type="radio" value="VNPAY">
                                <label for="">Thanh toán bằng thẻ ATM ( VNPAY )</label>
                            </div>
                            <div class="payment-content-left-method-payment-item-img">
                                <img class="img_payment-left" src="assets/img/vcb.png" alt="">
                            </div>
                            <div class="payment-content-left-method-payment-item">
                                <input name="paymentS" type="radio" value="Momo">
                                <label for="">Thanh toán Momo</label>
                            </div>
                            <div class="payment-content-left-method-payment-item-img">
                                <img src="assets/img/momo.png" alt="">
                            </div>
                            <div class="payment-content-left-method-payment-item">
                                <input value="tienmat" checked name="paymentS" type="radio">
                                <label for="">Thu tiền tận nơi</label>
                            </div>
                        </div>
                    </div>
                    <div class="delivery-content-left-button git">
                      <a href="cart.php"><span> &#8810;</span><p>Quay lại giỏ hàng</p></a>
                      <a href="#"><button type="submit" name="redirect"><p style="font-weight: bold;">THANH TOÁN VÀ GIAO HÀNG</p></button></a>
                    </div>
                </div>
            </form>
          <?php 
            } else {echo '<p class="p-cart-hang git"> Bạn vẫn chưa thêm sản phẩm nào vào giỏ hàng, Vui lòng chọn sản phẩm nhé!</p>';}
          ?>
        </div>
    </section>
    <?php 
    include "footer.php";
    ?>