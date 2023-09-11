<?php
include "header.php";
include "leftside.php";
include "class/product_class.php";
$product = new product();
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $sanpham_id = $_POST['sanpham_id'];
    $file_name = $_FILES['sanpham_anh']['name'];
    $file_temp = $_FILES['sanpham_anh']['tmp_name'];
    $div = explode('.',$file_name);
    $file_ext = strtolower(end($div));
    $sp_anh = substr(md5(time()),0,10).'.'.$file_ext;
    $upload_image = "uploads/".$sp_anh;
    move_uploaded_file( $file_temp,$upload_image);
	$insert_anhsp =$product ->insert_anhsp($sanpham_id,$sp_anh);

}
?>
<!-- ================= Thêm danh mục ======================== -->
      <main class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                   <h3 class="title-h3">Tạo ảnh mới</h3>
                    <div class="tile-body">
                          <div class="admin-content-right">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="product-add-content git">
                                    <div class="from-group col-md-3">
                                      <label class="control-label" for="">Chọn mã sản phẩm<span style="color: red;">*</span></label> <br>
                                      <select class="form-control" required="required"  name="sanpham_id" >
                                      <option value="">--Chọn--</option>
                                         <?php
                                         $show_product = $product ->show_product();
                                           if($show_product){while($result=$show_product->fetch_assoc()){
                                             ?>
                                             <option value="<?php echo $result['sanpham_id'] ?>"><?php echo $result['sanpham_ma'] ?></option>
                                        <?php
                                            }}
                                        ?>
                                          </select> <br>
                                      
                                    </select></div>
                                    <div class="from-group col-md-3">
                                    <label class="control-label" for="">Ảnh sản phẩm<span style="color: red;">*</span></label> <br>
                                    <input class="form-control" required type="file" name="sanpham_anh"> <br> </div>
                                    <div class="from-group col-12">
                                    <button class="btn btn-save admin-btn" name="submit" type="submit">Gửi</button>  
                                    <a href="anhSPlist.php" class="btn btn-cancel">Hủy bỏ</a> </div>
                                    </div>    
                                </form>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>