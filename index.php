<?php 
    include "header.php";
?>
   <div class="row">

        <section class="Slider">
            <div class="aspect-ratio-169 ">
                <?php
                    $show_slider_all = $index -> show_slider_all();
                    if ($show_slider_all ){while($result = $show_slider_all -> fetch_assoc()){
                ?>
                <?php if($result['type']== '1'){
                ?>
                    <a href=""> <img src="admin/uploads/<?php echo $result['slider_image'] ?>" alt=""></a> 
                <?php 
                    }else {
                ?>
                    <a href=""> <img src="admin/uploads/<?php echo $result['slider_image'] ?>" alt=""></a>
                <?php
                    }
                ?>
                
                <?php }}?>
            </div>
            <div class="dot-container">
                <div class="dot active"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
        </section>

        <section class="band">
            <div class="band-content-imgs">
                <a href=""> <img src="assets/img/bar1.jpg" alt=""></a>
            </div>
        </section>

        <section class="home-promote band">
           <div class="title-section">SALE HÈ GIẢI NHIỆT</div>
              <div class="list-promote d-flex">
                <div class="item-promote">
                    <a href="#">
                        <img src="assets/img/qwd1 (1).jpg" alt="Set đồ cá tính - phong cách" class="promote-image lazy">
                    </a>
                    <div class="title-promote">
                       <a href="#">Set đi chơi - style trẻ trung</a>
                   </div>
                </div>
                <div class="item-promote">
                    <a href="#">
                        <img src="assets/img/qwd3 (1).jpg" alt="Set đồ cá tính - phong cách" class="promote-image lazy">
                    </a>
                    <div class="title-promote">
                       <a href="#">Set đi tiệc - style sang trọng</a>
                   </div>
                </div>
                <div class="item-promote">
                    <a href="#">
                        <img src="assets/img/qwd4 (1).jpg" alt="Set đồ cá tính - phong cách" class="promote-image lazy">
                    </a>
                    <div class="title-promote">
                       <a href="#">Set đi làm - style thanh lịch</a>
                   </div>
                </div>
                <div class="item-promote">
                    <a href="#">
                        <img src="assets/img/qwd2 (1).jpg" alt="Set đồ cá tính - phong cách" class="promote-image lazy">
                    </a>
                    <div class="title-promote">
                       <a href="#">Set xuống phố - style hiện đại</a>
                   </div>
                </div>
            </div>
        </section>

         <section class="product-gallery-one">
            <div class="row">
                <div class="product-gallery-one-content">
                    <div class="product-gallery-one-content-title">
                        <h1 class="product-gallery-ones-h1"> NEW ARRIVAL</h1>
                        <ul>
                            <li class="tab-women"> GIRL</li>
                            <li class="tab-men"> MEN</li>
                            <li class="tab-kid"> KIDS</li>
                        </ul>
                    </div>
                    <div class="home-product ">
                        <div class="grid__row">
                            <?php
                            $show_product = $index ->show_product();
                            if($show_product){ while($resultB = $show_product ->fetch_assoc()){
                                if($resultB['sanpham_host']== 1){
                                    if($resultB['tinhtrang']== '1'){
                          ?>
                       
                            <div class="grid__colum-2-4">
                                <div class="home-product-item">
                                    <a  href="product.php?sanpham_id=<?php echo $resultB['sanpham_id']?>">
                                    <div class="home-product-item_img" style="background-image: url(admin/uploads/<?php echo $resultB['sanpham_anh']?>);"></div></a>
                                    <a href="product.php?sanpham_id=<?php echo $resultB['sanpham_id']?>">
                                    <h4 class="home-product-item_name"><?php echo $resultB['sanpham_tieude']?></h4></a>
                                    <div class="home-product-item_price">
                                        <p style="font-size: 1.4rem; margin: 0 8px;"> Giá:</p>
                                        <?php 
                                         if($resultB['giamgia'] > 0){ 
                                         $TGG = $resultB['sanpham_gia'] * ((100 - $resultB['giamgia'])/100) ?>
                                        <span class="home-product-item_price-old"> <?php $resultA = number_format($resultB['sanpham_gia']); echo $resultA?><sup>đ</sup></span>
                                        <span class="home-product-item_price-current"><?php $resultA = number_format($TGG); echo $resultA?><sup>đ</sup></span>
                                        <?php 
                                       }else { ?>
                                       <span class="home-product-item_price-current"><?php $resultA = number_format($resultB['sanpham_gia']); echo $resultA?><sup>đ</sup></span>
                                       <?php
                                        }
                                       ?>
                                    </div>
                                    <div class="home-product-item_action">
                                        <span class="home-product-item_like home-product-item_like-liked">
                                              <i class="home-product-item_like-icon fa-regular fa-heart"></i>
                                              <i class="home-product-item_like-icon-fill fa-solid fa-heart"></i>
                                        </span>
                                        <img class="home-product-item_img-alt" src="assets/img/hoatoc1.jpg" alt="">
                                    </div>
                                    <div class="home-product-item_origin">
                                         <span class="home-product-item_brand">36FULLZ</span>
                                        <span class="home-product-item_origin-name">Hà Nội</span> 
                                    </div>
                                    <div class="home-product-item_favourite">
                                        <i class="fa-solid fa-check"></i><span> Yêu thích</span>
                                    </div>
                                    <?php if($resultB['giamgia'] > 0){ ?>
                                     <div class="home-product-item_sale-off">
                                     <span class="home-product-item_sale-off-label">GIẢM</span>
                                        <span class="home-product-item_sale-off-percent"> <?php echo $resultB['giamgia']?>%</span>    
                                    </div>
                                    <?php 
                                   }else {
                                   echo '';
                                     }
                                     ?>
                                </div>
                            </div>
                            <?php
                                }}
                              }}
                            ?>
                        </div>
                        <div class="link-product">
                        </div>
                    </div>
                    <div class="home-product-pro">
                        <div class="grid__row">
                            
                            <?php
                            $show_product = $index ->show_product();
                            if($show_product){ while($resultB = $show_product ->fetch_assoc()){
                                if($resultB['sanpham_host']== 2){
                                    if($resultB['tinhtrang']== '1'){
                          ?>
                       
                            <div class="grid__colum-2-4">
                                <div class="home-product-item">
                                    <a  href="product.php?sanpham_id=<?php echo $resultB['sanpham_id']?>">
                                    <div class="home-product-item_img" style="background-image: url(admin/uploads/<?php echo $resultB['sanpham_anh']?>);"></div></a>
                                    <a href="product.php?sanpham_id=<?php echo $resultB['sanpham_id']?>">
                                    <h4 class="home-product-item_name"><?php echo $resultB['sanpham_tieude']?></h4></a>
                                    <div class="home-product-item_price">
                                        <p style="font-size: 1.4rem; margin: 0 8px;"> Giá:</p>
                                        <?php 
                                         if($resultB['giamgia'] > 0){ 
                                         $TGG = $resultB['sanpham_gia'] * ((100 - $resultB['giamgia'])/100) ?>
                                        <span class="home-product-item_price-old"> <?php $resultA = number_format($resultB['sanpham_gia']); echo $resultA?><sup>đ</sup></span>
                                        <span class="home-product-item_price-current"><?php $resultA = number_format($TGG); echo $resultA?><sup>đ</sup></span>
                                        <?php 
                                       }else { ?>
                                       <span class="home-product-item_price-current"><?php $resultA = number_format($resultB['sanpham_gia']); echo $resultA?><sup>đ</sup></span>
                                       <?php
                                        }
                                       ?>
                                    </div>
                                    <div class="home-product-item_action">
                                        <span class="home-product-item_like home-product-item_like-liked">
                                              <i class="home-product-item_like-icon fa-regular fa-heart"></i>
                                              <i class="home-product-item_like-icon-fill fa-solid fa-heart"></i>
                                        </span>
                                        <img class="home-product-item_img-alt" src="assets/img/hoatoc1.jpg" alt="">
                                    </div>
                                    <div class="home-product-item_origin">
                                         <span class="home-product-item_brand">36FULLZ</span>
                                        <span class="home-product-item_origin-name">Hà Nội</span> 
                                    </div>
                                    <div class="home-product-item_favourite">
                                        <i class="fa-solid fa-check"></i><span> Yêu thích</span>
                                    </div>
                                    <?php if($resultB['giamgia'] > 0){ ?>
                                     <div class="home-product-item_sale-off">
                                     <span class="home-product-item_sale-off-label">GIẢM</span>
                                        <span class="home-product-item_sale-off-percent"> <?php echo $resultB['giamgia']?>%</span>    
                                    </div>
                                    <?php 
                                   }else {
                                   echo '';
                                     }
                                     ?>
                                </div>
                            </div>
                            <?php
                                }}
                              }}
                            ?>
                        </div>
                        <div class="link-product">
                        </div>
                    </div>
                    
                     <div class="home-product-produ">
                        <div class="grid__row">
                            <?php
                            $show_product = $index ->show_product();
                            if($show_product){ while($resultB = $show_product ->fetch_assoc()){
                                if($resultB['sanpham_host']== 3){
                                    if($resultB['tinhtrang']== '1'){
                          ?>
                       
                            <div class="grid__colum-2-4">
                                <div class="home-product-item">
                                    <a  href="product.php?sanpham_id=<?php echo $resultB['sanpham_id']?>">
                                    <div class="home-product-item_img" style="background-image: url(admin/uploads/<?php echo $resultB['sanpham_anh']?>);"></div></a>
                                    <a href="product.php?sanpham_id=<?php echo $resultB['sanpham_id']?>">
                                    <h4 class="home-product-item_name"><?php echo $resultB['sanpham_tieude']?></h4></a>
                                    <div class="home-product-item_price">
                                        <p style="font-size: 1.4rem; margin: 0 8px;"> Giá:</p>
                                        <?php 
                                         if($resultB['giamgia'] > 0){ 
                                         $TGG = $resultB['sanpham_gia'] * ((100 - $resultB['giamgia'])/100) ?>
                                        <span class="home-product-item_price-old"> <?php $resultA = number_format($resultB['sanpham_gia']); echo $resultA?><sup>đ</sup></span>
                                        <span class="home-product-item_price-current"><?php $resultA = number_format($TGG); echo $resultA?><sup>đ</sup></span>
                                        <?php 
                                       }else { ?>
                                       <span class="home-product-item_price-current"><?php $resultA = number_format($resultB['sanpham_gia']); echo $resultA?><sup>đ</sup></span>
                                       <?php
                                        }
                                       ?>
                                    </div>
                                    <div class="home-product-item_action">
                                        <span class="home-product-item_like home-product-item_like-liked">
                                              <i class="home-product-item_like-icon fa-regular fa-heart"></i>
                                              <i class="home-product-item_like-icon-fill fa-solid fa-heart"></i>
                                        </span>
                                        <img class="home-product-item_img-alt" src="assets/img/hoatoc1.jpg" alt="">                                
                                    </div>
                                    <div class="home-product-item_origin">
                                         <span class="home-product-item_brand">36FULLZ</span>
                                        <span class="home-product-item_origin-name">Hà Nội</span> 
                                    </div>
                                    <div class="home-product-item_favourite">
                                        <i class="fa-solid fa-check"></i><span> Yêu thích</span>
                                    </div>
                                    <?php if($resultB['giamgia'] > 0){ ?>
                                     <div class="home-product-item_sale-off">
                                     <span class="home-product-item_sale-off-label">GIẢM</span>
                                        <span class="home-product-item_sale-off-percent"> <?php echo $resultB['giamgia']?>%</span>    
                                    </div>
                                    <?php 
                                   }else {
                                   echo '';
                                     }
                                     ?>
                                </div>
                            </div>
                            <?php
                                }}
                              }}
                            ?>
                        </div>
                        <div class="link-product">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php 
    include "footer.php";
?>