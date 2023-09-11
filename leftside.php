<?php
if (isset($_GET['loaisanpham_id'])|| $_GET['loaisanpham_id']!=NULL){
    $loaisanpham_id = $_GET['loaisanpham_id'];
    }
  
?>
 <div class="app_container">
        <div class="cartegory-top row">
                <?php  
                   $get_loaisanphamA = $index -> get_loaisanphamA($loaisanpham_id);
                   if($get_loaisanphamA){$result = $get_loaisanphamA ->fetch_assoc();} 
                ?>
            <p><a href="index.php">Trang chủ</a></p> <span>&#8594;</span>
            <p><?php if(isset($result['danhmuc_ten'])){echo $result['danhmuc_ten'];} else {echo "Vui lòng thêm danh mục";}?></p> <span>&#10230;</span>
            <p><?php if(isset($result['loaisanpham_ten'])){echo $result['loaisanpham_ten'];}else {echo "Vui lòng thêm loại sản phẩm";}?></p>
        </div>
        <div class="row">
            <div class="grid__row app_content">
                <div class="grid__colum-2">
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
                