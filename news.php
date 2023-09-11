<?php 
  include "header.php";
?>


    <div class="app_container">
        <div class="cartegory-top row">
            <a href="index.php">
                <p>Trang chủ</p>
            </a><span>&#10230;</span>
            <p>Tin Tức</p> <span>&#10230;</span>
            <p>ƯU ĐÃI THÁNG 5: MUA 1 TẶNG 1 - NHẬN NGAY QUÀ TẶNG 0Đ</p>
        </div>
        <div class="row">
            <div class="grid__row app_content">
                <div class="grid__colum-2 new-grid_item">
                    <nav class="category">
                        <h3 class="category_heading">
                            <i class="category_heading-icon fa-solid fa-list"></i> Danh mục
                        </h3>
                        <ul class="category_list">
                            <li class="category_item category_item--active">
                                <a href="" class="category_item_link">Sự kiện thời trang </a>
                            </li>
                            <li class="category_item ">
                                <a href="" class="category_item_link">Hoặt động cộng đồng</a>
                            </li>
                            <li class="category_item ">
                                <a href="" class="category_item_link">Tin nội bộ</a>
                            </li>
                            <li class="category_item ">
                                <a href="" class="category_item_link">Blog chia sẻ</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="grid_new-10">
                    <div class="grid_new-6">
                        <div class="content-news">
                            <div class="news__title">
                                <h2>
                                    ƯU ĐÃI THÁNG 5: MUA 1 TẶNG 1 - NHẬN NGAY QUÀ TẶNG 0Đ
                                </h2>
                                <div class="time">06/05/2023</div>
                            </div>
                            <div class="news__content">
                                <p>Chào đón tháng 5 với hàng ngàn ưu đãi đặc biệt mà IVY Moda dành cho bạn. Đừng bỏ lỡ cơ hội tham gia chương trình MUA 1 TẶNG 1 để sở hữu những món quà 0đ đầy hấp dẫn.</p>

                                <p><img src="assets/img/sli2.jpg" alt=""></p>

                                <h3>Thông tin chương trình:</h3>

                                <p>Mua 1 sản phẩm nguyên giá - Tặng ngay 1 sản phẩm bất kỳ, có trong danh sách dưới đây:</p>

                                <p>- Sản phẩm chính: <a href="#">Danh sách sản phẩm nguyên giá</a></p>

                                <p>- Sản phẩm tặng kèm 0đ: <a href="#">Danh sách sản phẩm tặng kèm</a></p>

                                <h3>Hướng dẫn mua hàng:</h3>

                                <p>Bước 1: Tham khảo và chọn mua sản phẩm nguyên giá&nbsp;(có giá bán lẻ không khuyến mại)</p>

                                <p>Bước 2: Thêm ngay&nbsp;sản phẩm tặng kèm vào giỏ hàng, với điều kiện giá gốc sản phẩm tặng kèm có giá trị thấp hơn hoặc bằng&nbsp;sản phẩm chính.</p>

                                <p>Bước 3: Thanh toán&nbsp;cho sản phẩm nguyên giá và nhận sản phẩm tặng kèm miễn phí 0đ.</p>

                                <h3>Lưu ý:</h3>

                                <p>- Chương trình mua 1 tặng 1 <strong>áp dụng cho sản phẩm nguyên giá</strong> và không áp dụng cho các sản phẩm khác có giá khuyến mại.</p>

                                <p>- <strong>Giá gốc&nbsp;của&nbsp;sản phẩm tặng kèm&nbsp;có giá trị thấp hơn hoặc bằng</strong>&nbsp;giá sản phẩm chính đã chọn.</p>

                                <p>- <strong>Mua càng nhiều, ưu đãi càng lớn</strong>: Số lượng sản phẩm tặng kèm tương ứng với sản phẩm chính được mua</p>

                                <p>Hãy ghé ngay <a href="index.php">Website</a> của 36FULLZ để khám phá thêm về chương trình ưu đãi hấp dẫn này nhé!</p>
                            </div>

                        </div>
                    </div>
                    <div class="grid_new-4">
                        <section class="bg-before">
                            <a href="" alt="News Sale">
                                <img src="assets/img/sale1.png" alt="News Sale">
                            </a>
                        </section>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <section class="product-new">
        <div class="product-gallery-one row">
            <div class="row">
                <div class="product-gallery-one-content">
                    <div class="product-gallery-one-content-title product-gallery-two-block">
                        <h1 class="product-gallery-ones-h1"> NEW ARRIVAL - MUA 1 ĐƯỢC 2</h1>
                        <ul class="product_gallery-name">
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
        </div>
    </section>

    <?php 
    include "footer.php";
    ?>