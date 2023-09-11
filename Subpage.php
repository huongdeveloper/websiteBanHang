<?php
  include "header.php";
  include "leftside.php";
?>
<?php
 $param = "";
 $orderConditon = "";
 $orderField = isset($_GET['field']) ? $_GET['field'] : "";
 $orderSort = isset($_GET['sort']) ? $_GET['sort'] : "";
 if(!empty($orderField)
     && !empty($orderSort)){
     $orderConditon = "ORDER BY `tbl_sanpham`.`".$orderField."` ".$orderSort;
     $param .= "field=".$orderField."&sort=".$orderSort."&";
 }
 

if (isset($_GET['loaisanpham_id'])|| $_GET['loaisanpham_id']!=NULL){
    $loaisanpham_id = $_GET['loaisanpham_id'];
    }
    $get_loaisanpham = $index -> get_loaisanpham($loaisanpham_id,$orderConditon);
    
  
?>

   

                <div class="grid__colum-10">
                    <div class="home-filter">
                        <span class="home-filter_label">Sắp xếp theo</span>
                        <button class="home-filter_btn btn tab-women">Phổ biến</button>
                        <button class="home-filter_btn btn btn--primary tab-men">Mới nhất</button>
                        <button class="home-filter_btn btn tab-kid">Bán chạy</button>
                        <select class="select-input_label" id="sort-box" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                        <?php
                             $show_product = $index ->get_Subpage($loaisanpham_id);
                             if($show_product){ $resultj = $show_product ->fetch_assoc()
                          ?> 
                        <option value="">Sắp xếp giá</option>
                        <option <?php if(isset($_GET['sort']) && $_GET['sort'] == "asc") { ?> selected <?php } ?> value="Subpage.php?loaisanpham_id=<?php echo $resultj['loaisanpham_id'] ?>&field=sanpham_gia&sort=asc" >Thấp đến Cao</option>
                        <option <?php if(isset($_GET['sort']) && $_GET['sort'] == "desc") { ?> selected <?php } ?> value="Subpage.php?loaisanpham_id=<?php echo $resultj['loaisanpham_id'] ?>&field=sanpham_gia&sort=desc">Cao đến Thấp</option>
                        <?php 
                            }
                        ?>
                        </select>    
                    </div>

                    <div class="home-product">
                        <div class="grid__row">
                            <?php
                       if($get_loaisanpham){while($resultB = $get_loaisanpham ->fetch_assoc()){
                       if($resultB['tinhtrang']== '1'){
                        ?>
                            <div class="grid__colum-2-4 grid__colum-fileOne">
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
                       }
                        }}
                        ?>


                        </div>
                    </div>
                    <div class="home-product-pro">
                        <div class="grid__row">
                            <?php
                             $show_product = $index ->get_Subpage($loaisanpham_id);
                             if($show_product){ while($resultR = $show_product ->fetch_assoc()){
                                if($resultR['sapxepsp']== 0){
                          ?>
                       
                            <div class="grid__colum-2-4 grid__colum-fileOne">
                                <div class="home-product-item">
                                    <a  href="product.php?sanpham_id=<?php echo $resultR['sanpham_id']?>">
                                    <div class="home-product-item_img" style="background-image: url(admin/uploads/<?php echo $resultR['sanpham_anh']?>);"></div></a>
                                    <a href="product.php?sanpham_id=<?php echo $resultR['sanpham_id']?>">
                                    <h4 class="home-product-item_name"><?php echo $resultR['sanpham_tieude']?></h4></a>
                                    <div class="home-product-item_price">
                                        <p style="font-size: 1.4rem; margin: 0 8px;"> Giá:</p>
                                        <?php 
                                         if($resultR['giamgia'] > 0){ 
                                         $TGG = $resultR['sanpham_gia'] * ((100 - $resultR['giamgia'])/100) ?>
                                        <span class="home-product-item_price-old"> <?php $resultA = number_format($resultR['sanpham_gia']); echo $resultA?><sup>đ</sup></span>
                                        <span class="home-product-item_price-current"><?php $resultA = number_format($TGG); echo $resultA?><sup>đ</sup></span>
                                        <?php 
                                       }else { ?>
                                       <span class="home-product-item_price-current"><?php $resultA = number_format($resultR['sanpham_gia']); echo $resultA?><sup>đ</sup></span>
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
                                    <?php if($resultR['giamgia'] > 0){ ?>
                                     <div class="home-product-item_sale-off">
                                     <span class="home-product-item_sale-off-label">GIẢM</span>
                                        <span class="home-product-item_sale-off-percent"> <?php echo $resultR['giamgia']?>%</span>    
                                    </div>
                                    <?php 
                                   }else {
                                   echo '';
                                     }
                                     ?>
                                </div>
                            </div>
                            <?php
                                }
                              }}
                            ?>
                        </div>
                    </div>
                     <div class="home-product-produ">
                        <div class="grid__row">
                            <?php
                            $show_product = $index ->get_Subpage($loaisanpham_id);
                            if($show_product){ while($resultR = $show_product ->fetch_assoc()){
                                if($resultR['sapxepsp']== 1){
                          ?>
                       
                            <div class="grid__colum-2-4 grid__colum-fileOne">
                                <div class="home-product-item">
                                    <a  href="product.php?sanpham_id=<?php echo $resultR['sanpham_id']?>">
                                    <div class="home-product-item_img" style="background-image: url(admin/uploads/<?php echo $resultR['sanpham_anh']?>);"></div></a>
                                    <a href="product.php?sanpham_id=<?php echo $resultR['sanpham_id']?>">
                                    <h4 class="home-product-item_name"><?php echo $resultR['sanpham_tieude']?></h4></a>
                                    <div class="home-product-item_price">
                                        <p style="font-size: 1.4rem; margin: 0 8px;"> Giá:</p>
                                        <?php 
                                         if($resultR['giamgia'] > 0){ 
                                         $TGG = $resultR['sanpham_gia'] * ((100 - $resultR['giamgia'])/100) ?>
                                        <span class="home-product-item_price-old"> <?php $resultA = number_format($resultR['sanpham_gia']); echo $resultA?><sup>đ</sup></span>
                                        <span class="home-product-item_price-current"><?php $resultA = number_format($TGG); echo $resultA?><sup>đ</sup></span>
                                        <?php 
                                       }else { ?>
                                       <span class="home-product-item_price-current"><?php $resultA = number_format($resultR['sanpham_gia']); echo $resultA?><sup>đ</sup></span>
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
                                    <?php if($resultR['giamgia'] > 0){ ?>
                                     <div class="home-product-item_sale-off">
                                     <span class="home-product-item_sale-off-label">GIẢM</span>
                                        <span class="home-product-item_sale-off-percent"> <?php echo $resultR['giamgia']?>%</span>    
                                    </div>
                                    <?php 
                                   }else {
                                   echo '';
                                     }
                                     ?>
                                </div>
                            </div>
                            <?php
                                }
                              }}
                            ?>
                        </div>
                    </div>
                     <ul class="pagination home-product_pagination">
                        <?php 
                       if($get_loaisanpham) {
                           $product_All = $index ->show_All_product($loaisanpham_id,$orderConditon);
                           $product_count = mysqli_num_rows($product_All);
                           $product_button = ceil($product_count/10);
                           
                           echo '<li class="pagination-item">
                           <a href="" class="pagination-item_link">
                               <i class="pagination-item_icon fa-solid fa-chevron-left" style="padding: 5px;"></i>
                           </a>
                       </li>';
                          for ($i = 1; $i <= $product_button; $i++){
                            ?>
                             <?php
                             $show_product = $index ->get_Subpage($loaisanpham_id);
                             if($show_product){ $resultj = $show_product ->fetch_assoc()
                          ?> 
                            <li class="pagination-item ">
                            <a href="Subpage.php?loaisanpham_id=<?php echo $resultj['loaisanpham_id'] ?>&<?=$param?>trang=<?php echo $i ?>" class="pagination-item_link" ><?php echo $i ?></a>
                        </li>
                        <?php
                             }}
                          echo ' <li class="pagination-item">
                          <a href="" class="pagination-item_link">
                              <i class="pagination-item_icon fa-solid fa-chevron-right" style="padding: 5px;"></i>
                          </a>
                      </li>';
                            }
                        ?>
                    </ul>

                </div>
            </div>

        </div>

    </div>

    <?php 
    include "footer.php";
    ?>