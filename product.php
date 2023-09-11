<?php
include "header.php";
?>
<?php
if (isset($_GET['sanpham_id'])|| $_GET['sanpham_id']!=NULL){
    $sanpham_id = $_GET['sanpham_id'];
    }
if (isset($_POST['binhluan_submit'])){
    $today = date("d/m/Y");
    $binhluan_insert = $index -> insert_binhluan($today);
}
$register_id = Session::get('register_id');
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['wishlist'])){
    $sanpham_id = $_POST['sanpham_id'];
	$insert_wishlist = $index ->insert_wishlist($sanpham_id,$register_id );
}
   
?>
 <section class="product">
       <div class="container">
            <div class="product-top git">
                <?php
                     $get_sanpham = $index -> get_sanpham($sanpham_id);
                     if ($get_sanpham ){$resultE = $get_sanpham -> fetch_assoc();}
                ?>
                <p><a href="index.php">Trang chủ</a></p> <span>&#8594;</span> 
                <p><?php echo $resultE['danhmuc_ten']  ?></p><span>&#8594;</span>
                <p><?php echo $resultE['loaisanpham_ten'] ?></p><span>&#8594;</span>
                <p><?php echo $resultE['sanpham_tieude'] ?></p>
            </div>
            <div class="product-content git">
                <?php
                     $get_sanpham = $index -> get_sanpham($sanpham_id);
                     if ($get_sanpham ){while($result = $get_sanpham -> fetch_assoc()){
                ?>
                
                <div class="product-content-left git">
                    <div class="product-content-left-big-img">
                    <img  src="admin/uploads/<?php echo $result['sanpham_anh'] ?>" alt="">
                        <div class="product-content-left-gioithieu">
                            <h3> Thông tin giới thiệu sản phẩm:</h3>
                            <?php echo $result['sanpham_gioithieu'] ?>
                        </div>
                    </div>
                    <div class="product-content-left-small-img">
                        <?php
                            $sanpham_id = $result['sanpham_id'];
                            $get_anh = $index -> get_anh($sanpham_id);
                            if ($get_anh ){while($resultA = $get_anh -> fetch_assoc()){
                        ?>
                           <img src="admin/uploads/<?php echo $resultA['sanpham_anh'] ?>" alt="">
                        <?php
                            }}
                        ?>
                            
                    </div>
                </div>
                <div class="product-content-right">
                    <div class="product-content-right-product-name">
                             <input class="session_id" type="hidden" value="<?php echo session_id() ?>">
                             <input class="sanpham_id" type="hidden" value="<?php echo $result['sanpham_id'] ?>">
                        <h1 class="sanpham_tieude"><?php echo $result['sanpham_tieude'] ?></h1> 
                        <div class="product-content-right-p">SKU: <span class="sanpham_ma"> <?php echo $result['sanpham_ma'] ?></span> 
                    <ul class="product-content-right-rating">
                            <?php
                        if(Session::get('register_id')){
                                $register_id = Session::get('register_id');
                                $get_star = $index -> get_star($sanpham_id,$register_id);
                                if($get_star){
                                    $tongsao = 0;
                                    $trungbinhsao = 0;
                                    $solan = 0;
                                    while ($result_star = $get_star->fetch_assoc()){
                                        $tongsao += $result_star['rating'];
                                        $solan +=1;
                                        $trungbinhsao =  $tongsao/$solan;
                                    }
                                }
                           

                             ?>
                             <?php
                            if($get_star){
                             for ($count =1;$count <=5; $count++ ){
                                if($count<= round($trungbinhsao)){
                                    $color = 'color:#ffcc00;';  
                                }else {
                                    $color = 'color:#ccc;';  
                                }
                             ?>
                                <li class="rating" style="cursor: pointer; font-size: 25px;<?php echo $color ?>"
                                 id="<?php echo $result['sanpham_id'] ?>-<?php echo $count ?>"
                                 data-sanpham_id = "<?php echo $result['sanpham_id'] ?>"
                                 data-rating = "<?php echo $count ?>"
                                 data-index = "<?php echo $count ?>"
                                 data-register_id = "<?php echo Session::get('register_id') ?>"
                                > &#9733;</li>
                                
                              <?php
                              }
                             ?>
                             </ul>
                              <span class="product-content-right-p-span">( <?php echo round($trungbinhsao) ?>/5 đánh giá)</span>
                            <?php 
                            }else {
                              for ($count =1;$count <=5; $count++ ){
                                if($count<= 0){
                                    $color = 'color:#ffcc00;';  
                                }else {
                                    $color = 'color:#ccc;';  
                                }
                          
                              ?>
                                <li class="rating" style="cursor: pointer; font-size: 25px;<?php echo $color ?>"
                                 id="<?php echo $result['sanpham_id'] ?>-<?php echo $count ?>"
                                 data-sanpham_id = "<?php echo $result['sanpham_id'] ?>"
                                 data-rating = "<?php echo $count ?>"
                                 data-index = "<?php echo $count ?>"
                                 data-register_id = "<?php echo Session::get('register_id') ?>"
                                > &#9733;</li>
                                
                               <?php
                               }
                               ?>
                              </ul>
                              <span class="product-content-right-p-span">(0/5 đánh giá)</span>
                        
                            <?php
                            }?>

                        <?php
                        }else{
                            for ($count =1;$count <=5; $count++ ){
                                if($count<= 0){
                                    $color = 'color:#ffcc00;';  
                                }else {
                                    $color = 'color:#ccc;'; 
                                }
                            
                            ?>
                                <li class="rating_login" style="cursor: pointer; font-size: 25px; color:#ffcc00;"
                                 > &#9733;</li>
                            <?php
                             }
                            ?>
                    </ul>
                           <span class="product-content-right-p-span">(0/5 đánh giá)</span>
                        
                        <?php
                        }
                        ?>


                    </div>
                    <div class="product-content-right-product-price">
                        <?php $TGG = $result['sanpham_gia'] * ((100 - $result['giamgia'])/100) ?>
                        <span ><?php $resultC = number_format($TGG); echo $resultC ?></span><sup>đ</sup>
                        <input class="sanpham_gia" type="hidden" value="<?php echo $TGG ?>">
                        <?php if($result['giamgia'] > 0){  ?>
                        <div class="product-detail__price-sale"><?php echo $result['giamgia'] ?><span>%</span></div>
                        <?php 
                            }else {
                                echo '';
                            }
                        ?>
                    </div>
                    <div class="product-content-right-product-color">
                        <p><span style="font-weight: bold;">Màu sắc: </span> <?php echo $result['color_ten'] ?> <span style="color: red;">*</span></p>
                       <div class="product-content-right-product-color-IMG">
                        <img class="anh_color" src="admin/uploads/<?php echo $result['color_anh'] ?>" alt="">
                        <img class="sanpham_anh" style="display: none;" src="admin/uploads/<?php echo $result['sanpham_anh'] ?>" alt="">

                       </div>                      
                    </div>
                    <form action=""></form>
                    <div class="product-content-right-product-size">
                        <p style="font-weight: bold"> Size: </p>
                        <div class="size">
                          <?php
                            $sanpham_id = $result['sanpham_id'];
                            $get_size = $index -> get_size($sanpham_id);
                            if ($get_size ){while($resultV = $get_size -> fetch_assoc()){
                           ?>
                            <div class="size-item">
                                <input  class="size-item-input" value="<?php echo $resultV['sanpham_size']?>" name="size-item" type="radio">
                                <span><?php echo $resultV['sanpham_size'] ?></span>
                            </div>
                           <?php
                            }}
                            ?>
                            </div>
                        <div class="quantity">
                            <p style="font-weight: bold"> Số lượng: </p>
                            <input class="soluong_sp" type="hidden" value="<?php echo $result['soluong'] ?>">
                            <input class="quantitys" type="number" min="0" value="1">
                        </div>
                        <p class="alert_soluong" style="color: red;"></p>
                        <p class="size-alert" style="color: red;"></p>
                    </div>
                    <div class="product-content-right-product-button">
                        <button> <i class="fas fa-shopping-cart"></i> <p>THÊM GIỎ HÀNG</p></button>
                        <button class="add-cart-btn"><p>MUA HÀNG</p></button>
                        <form action="" method="POST">
                        <input  type="hidden" value="<?php echo  $sanpham_id ?>"  name="sanpham_id">
                        <?php 
                        $id = Session::get('register_login');
                        if ($id) {
                            echo '<button class="like_button" name="wishlist"><i class="like-i-button fa-regular fa-heart"></i></i>
                            </button>';
                        }else {
                            echo '';
                        }
                        ?>
                        <?php
                        if (isset($insert_wishlist)){
                            echo $insert_wishlist ;
                        }
                        ?>
                        
                        </form>
                    </div>
                    <div class="product-content-right-bottom">
                       <div class="product-content-right-bottom-top">
                        &#8744;
                       </div> 
                       <div class="product-content-right-bottom-content-big">
                            <div class="product-content-right-bottom-title">
                                <div class="product-content-right-bottom-title-item chitiet">
                                    <p>Chi tiết</p>
                                </div>
                                <div class="product-content-right-bottom-title-item baoquan">
                                    <p>Bảo quản</p>
                                </div>
                               
                             </div>
                             <div class="product-content-right-bottom-content">
                                <div class="product-content-right-bottom-content-chitiet">
                                    <?php echo $result['sanpham_chitiet'] ?>
                                </div>
                                <div class="product-content-right-bottom-content-baoquan">
                                    <?php echo $result['sanpham_baoquan'] ?>
                                </div>
                            </div>
                       </div>
                      
                    </div>
                </div>
               
                <?php
                }}
                ?>   
             </div>
       </div>
    </section>>
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
    <?php 
      if (isset($binhluan_insert)){
        echo $binhluan_insert;
      }
    ?>
    <div class="row">
        <div class="container-list">
       
        <h4 class="comment-list-h4">Ý kiến bình luận sản phẩm</h4>
        <form action="#" method="POST">
            <p><input  type="hidden" value="<?php echo  $sanpham_id ?>"  name="sanpham_id_binhluan"></p>
            <p><input class="comment-list-input" type="text" placeholder="Điền tên" required name="tenbinhluan"></p>
            <p><textarea class="comment-list-tetarea" name="binhluan" id="" cols="30" rows="10" placeholder=" Mời bạn bình luận hoặc đặt câu hỏi "></textarea></p>
            <button name="binhluan_submit" class="comment-list-button" >Gửi bình luận</button>
        </form>
        <?php
            $show_binhluan = $index  -> show_binhluan();
            if($show_binhluan){$i=0;while($result = $show_binhluan->fetch_assoc()){$i++;
        ?>  
        <ul class="comment-list">
            <div class="cmt-top">
                <p class="cmt-top-name"><?php echo $result['binhluan_ten'] ?></p>
            </div>
           
            <div class="cmt-content">
                <p class="cmt-txt"><?php echo $result['binhluan']?></p>
            </div>
            <div class="cmt-command">
                <p class="cmtl dot-circle-ava"><i class="fa-regular fa-thumbs-up"></i> thích </p>
                     <span class="cmtd dot-circle-ava"><?php echo $result['binhluan_date']?></span>   
            </div>
            <li class="cmt-command-li"><p class="cmttl">Trả lời</p>
                    <ul>
                         <form action="#" method="POST">
                           <p><input  type="hidden" value="<?php echo  $sanpham_id ?>"  name="sanpham_id_binhluan"></p>
                           <p><input class="form-binhluan-input" type="text" placeholder="Điền tên" name="tenbinhluan"></p>
                           <p><textarea class="form-binhluan-tetarea" name="binhluan" id="" cols="30" rows="10" placeholder=" Mời bạn bình luận hoặc đặt câu hỏi "></textarea></p>
                           <button name="binhluan_submit" class="form-binhluan-button" >Gửi bình luận</button>
                        </form>
                   </ul>
            </li>
        </ul>
        <?php
             }}
        ?>
        </div>
    </div>
    
        
<script >
 $(document).ready(function(){

    var s = ''
   
        $('.size-item-input').each(function(index){
                        $(this).change(function(){
                        s = $(this).val()

                         })
                              
        });
        $('.add-cart-btn').click(function(){
                if (s=="") {
                $('.size-alert').text('Vui lòng chọn size*')
                  
                }
                else {
                var x = $(this).parent().parent().find('.sanpham_tieude').text()
                var se = $(this).parent().parent().find('.session_id').val() 
                var ma = $(this).parent().parent().find('.sanpham_ma').text() 
                var sp = $(this).parent().parent().find('.sanpham_id').val() 
                var y = $(this).parent().parent().parent().find('.sanpham_anh').attr('src')
                var z = $(this).parent().parent().find('.sanpham_gia').val() 
                var c = $(this).parent().parent().find('.anh_color').attr('src')
                var q = $(this).parent().parent().find('.quantitys').val() 
                var h = $(this).parent().parent().find('.soluong_sp').val() 
                if(q <= h){
                $.ajax({
                    url: "ajax/cart_ajax.php",
                    method: "POST",
                    data: {session_id:se,sanpham_id:sp,sanpham_tieude:x,sanpham_anh:y,sanpham_gia:z,color_anh:c,quantitys:q,sanpham_size:s},
                    success:function(data){}
                })
            
                $(location).attr('href','cart.php') 
               }else {
                $('.alert_soluong').text('Số lượng đặt hàng phải nhỏ hơn số lượng tồn kho*')
               }
            
            }
               
               
               
        })  
              








})
    </script>
<script>
const itembinhluan = document.querySelectorAll(".cmt-command-li")
console.log(itembinhluan);
itembinhluan.forEach(function(menu,index){
    menu.addEventListener("click",function(){
        menu.classList.toggle("block")
    })
})
</script>
<?php 
    include "footer.php";
    ?>