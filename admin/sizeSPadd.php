<?php
include "header.php";
include "leftside.php";
include "class/product_class.php";
$product = new product();
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $sanpham_id = $_POST['sanpham_id'];
    $sanpham_size = $_POST['sanpham_size'];
    $insert_sizesp =$product ->insert_sizesp($sanpham_id,$sanpham_size);
    
}
?>
<!-- ================= Thêm size  ======================== -->
      <main class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                   <h3 class="title-h3">Tạo size mới</h3>
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
                                    <label class="control-label" for="">Chọn Size sản phẩm<span style="color: red;">*</span></label> <br>
                                    <select class="form-control" name="sanpham_size">
                                       <option value="">--Chọn--</option>
                                       <option value="S">Size S</option>
                                       <option value="M">Size M</option>
                                       <option value="L">Size L</option>
                                       <option value="XL">Size XL</option>
                                       <option value="XXL">Size XXL</option>
                                    </select> <br> </div>
                                    <div class="from-group col-12">
                                    <button class="btn btn-save admin-btn" name="submit" type="submit">Gửi</button>  
                                    <a href="sizeSPlist.php" class="btn btn-cancel">Hủy bỏ</a> </div>
                                    </div>    
                                </form>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>