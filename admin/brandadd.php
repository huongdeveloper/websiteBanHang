<?php
include "header.php";
include "leftside.php";
include "class/Data_class.php";
// include "class/product_class.php";
// $product = new product();
$brand = new data;
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $loaisanpham_name = $_POST['loaisanpham_name'];
    $danhmuc_id = $_POST['danhmuc_id'];
	$insert_brand = $brand ->insert_brand($danhmuc_id,$loaisanpham_name);

}
?>
<!-- ================= Thêm danh mục ======================== -->
      <main class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                   <h3 class="title-h3">Tạo loại sản phẩm mới</h3>
                    <div class="tile-body">
                          <div class="admin-content-right">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="product-add-content git">
                                    
                                    <div class="from-group col-md-3">
                                        <label class="control-label" for="">Chọn danh mục<span style="color: red;">*</span></label> <br>
                                        <select class="form-control" required="required" name="danhmuc_id" id="">
                                        <option value="">--Chọn--</option>
                                        <?php
                                        $show_danhmuc = $brand ->show_danhmuc();
                                        if($show_danhmuc){while($result=$show_danhmuc->fetch_assoc()){
                                        ?>
                                        <option value="<?php echo $result['danhmuc_id'] ?>"><?php echo $result['danhmuc_ten'] ?></option>
                                        <?php
                                         }}
                                        ?>
                                           
                                        </select>
                                      </div>
                                    <div class="from-group col-md-3">
                                      <label class="control-label" for="">Vui lòng chọn loại sản phẩm<span style="color: red;">*</span></label> <br>
                                      <input class="form-control" required type="text" name="loaisanpham_name" placeholder="Vui lòng chọn loại sản phẩm"> <br>
                                    </div>
                                    <div class="from-group col-12">
                                    <button class="btn btn-save admin-btn" name="submit" type="submit">Gửi</button>  
                                    <a href="brandlist.php" class="btn btn-cancel">Hủy bỏ</a> </div>
                                    </div>    
                                </form>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>