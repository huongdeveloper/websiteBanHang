<?php 
  include "header.php";
  $session_id = session_id();
?>
    <section class="payment">
        <div class="row">
            <div class="payment-top-wrap">
                 <div class="payment-top">
                     <div class="delivery-top-delivery payment-top-item">
                         <i class="fas fa-shopping-cart"></i>
                     </div>
                     <div class=" payment-top-item">
                         <i class="fas fa-map-marker-alt"></i>
                     </div>
                     <div class="delivery-top-payment payment-top-item">
                     <i class="fa-solid fa-check"></i>
                     </div>
                 </div>
            </div>
        </div>
        <section class="success">
            <div class="success-top">
                <p>ĐẶT HÀNG THÀNH CÔNG </p>
            </div>
            <?php 
                $id = Session::get('register_id');
                $get_register = $index ->show_register($id);
                if($get_register){while($results = $get_register->fetch_assoc()){
            ?>
            <div class="success-text">
            <?php
               $show_cartC = $index -> show_carta($session_id);
               if($show_cartC){while($result = $show_cartC->fetch_assoc()){
            ?> 

                <p>Chào <span style="font-size: 20px; color: #378000;"><?php echo $results['name'] ?></span>, đơn hàng của bạn với mã <span style="font-size: 20px; color: #378000;"><?php $ma = substr($session_id,0,8); echo $ma   ?></span> đã được đặt thành công. <br> Đơn hàng của bạn đã được xác nhận tự động.
                    <br>
                    <span style="font-weight: bold;">Hiện tại do đang trong Chương trình Sale lớn, đơn hàng của quý khách sẽ giao nhanh trong 2 ngày tới. Rất mong quý khách để ý điện thoại nhân viên giao hàng sẽ giao trong 2 ngày tới !</span><br>
                    <span style="color: red;">(Lưu ý: 36FULLZ đơn hàng đươc xử lý tự động và sẽ giao cho bạn trong thời sớm nhất)</span><br> Cảm ơn <span style="font-size: 20px; color: #378000;"><?php echo $results['name'] ?></span> đã tin dùng
                    sản phẩm của 36FULLZ.</p>
            <?php
               }}
            ?>

            </div>
            <?php
               }}
            ?>
            <div class="success-button">
                <a href="detaill.php"><button class="btn-a_success">XEM CHI TIẾT ĐƠN HÀNG</button></a>
                <a href="index.php"><button>TIẾP TỤC MUA SẮM</button></a>
            </div>
            <p class="detail-footer">Mọi thắc mắc quý khách vui lòng liên hệ hotline <span style="font-size: 20px; color: red;">0973 999 949 </span> hoặc chat với kênh hỗ trợ trên website để được hỗ trợ nhanh nhất.</p>
        </section>
    </section>

    
    <?php 
    include "footer.php";
    ?>