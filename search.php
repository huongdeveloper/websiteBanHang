<?php
  include "header.php";
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $tukhoa = $_POST['tukhoa'];
	$search_product = $index ->search_product($tukhoa);


}
?>
<div class="app_container">
        <div class="cartegory-top row">
            <p><a href="index.php">Trang chủ</a></p> <span>&#8594;</span>
            <p>Sản phẩm tìm kiếm</p> <span>&#10230;</span>
            <p><?php echo $tukhoa ?></p> 
        </div>
        <div class="row">
            <div class="grid__row app_content">
                <div class="grid__colum-2 bell_li">
                    <nav class="category">
                        <h3 class="category_heading">
                            <i class="category_heading-icon fa-solid fa-list"></i> Danh mục
                        </h3>
                        <ul class="category_list">
                        <?php
                        $show_danhmuc = $index ->show_danhmuc();
                        if($show_danhmuc){while($result = $show_danhmuc ->fetch_assoc()) {
                        ?>
                            <li class="category_item cartegory-left-li">
                                <a href="#" class="category_item_link"><?php echo $result['danhmuc_ten'] ?></a>
                                <ul>
                                <?php
                                      $danhmuc_id = $result['danhmuc_id'];
                                      $show_loaisanpham = $index ->show_loaisanpham($danhmuc_id);
                                      if($show_loaisanpham){while($result = $show_loaisanpham ->fetch_assoc()) {
                                    ?>
                                   <li class="category-li-items"><a href="Subpage.php?loaisanpham_id=<?php echo $result['loaisanpham_id'] ?>"><?php echo $result['loaisanpham_ten'] ?></a></li>
                                   <?php
                                     } }
                                    ?>
                                </ul>
                            </li>
                            <?php
                        } }
                        ?>  
                        </ul>
                    </nav>
                </div>
                <div class="grid__colum-10 grid__colum-6">
                    <div class="home-filter">
                        <span class="home-filter_label">Sắp xếp theo</span>
                        <button class="home-filter_btn btn">Phổ biến</button>
                        <button class="home-filter_btn btn btn--primary">Mới nhất</button>
                        <button class="home-filter_btn btn">Bán chạy</button>

                        <div class="select-input">
                            <span class="select-input_label">Giá</span>
                            <i class="select-input_icon fa-solid fa-angle-down"></i>
                            <ul class="select-input_list">
                                <li class="select-input_item">
                                    <a href="#" class="select-input_link">Giá: Thấp đến Cao</a>
                                </li>
                                <li class="select-input_item">
                                    <a href="#" class="select-input_link">Giá: Cao đến Thấp</a>
                                </li>
                            </ul>
                        </div>
                        
                    </div>

                    <div class="home-product">
                        <div class="grid__row">
                            <?php
                       if($search_product){while($resultB = $search_product ->fetch_assoc()){
                        ?>
                            <div class="grid__colum-2-4 active_gitd-seach">
                                <div class="home-product-item">
                                    <a  href="product.php?sanpham_id=<?php echo $resultB['sanpham_id']?>">
                                    <div class="home-product-item_img" style="background-image: url(admin/uploads/<?php echo $resultB['sanpham_anh']?>);"></div></a>
                                    <a href="product.php?sanpham_id=<?php echo $resultB['sanpham_id']?>">
                                    <h4 class="home-product-item_name"><?php echo $resultB['sanpham_tieude']?></h4></a>
                                    <div class="home-product-item_price">
                                    <p style="font-size: 1.4rem; margin-left: 8px;"> Giá:</p>
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
                                        <div class="home-product-item_rating">
                                            <i class="home-product-item_star-gold fa-solid fa-star"></i>
                                            <i class="home-product-item_star-gold fa-solid fa-star"></i>
                                            <i class="home-product-item_star-gold fa-solid fa-star"></i>
                                            <i class="home-product-item_star-gold fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                        <div class="home-product-item_sold">0 đã bán</div>
                                    </div>
                                    <div class="home-product-item_origin">
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
                            ?>


                        </div>
                    </div>
                    <ul class="pagination home-product_pagination">
                        <li class="pagination-item">
                            <a href="" class="pagination-item_link">
                                <i class="pagination-item_icon fa-solid fa-chevron-left"></i>
                            </a>
                        </li>
                        <li class="pagination-item pagination-item-active">
                            <a href="" class="pagination-item_link">1</a>
                        </li>
                        <li class="pagination-item">
                            <a href="" class="pagination-item_link">2</a>
                        </li>
                        <li class="pagination-item">
                            <a href="" class="pagination-item_link">3</a>
                        </li>
                        <li class="pagination-item">
                            <a href="" class="pagination-item_link">4</a>
                        </li>
                        <li class="pagination-item">
                            <a href="" class="pagination-item_link">...</a>
                        </li>
                        <li class="pagination-item">
                            <a href="" class="pagination-item_link">9</a>
                        </li>

                        <li class="pagination-item">
                            <a href="" class="pagination-item_link">
                                <i class="pagination-item_icon fa-solid fa-chevron-right"></i>
                            </a>
                        </li>
                    </ul>

                   
                </div>
            </div>

        </div>

    </div>

    <?php 
    include "footer.php";
    ?>