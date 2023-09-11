<?php
include "header.php";
include "leftside.php"; 
include "class/product_class.php";
$product = new product();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
    // var_dump($_POST);
	$insert_slider = $product ->insert_slider($_POST,$_FILES);
    header('Location:slider.php');

}
?>
<!-- ================= Sản phẩm ======================== -->
      <main class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                   <h3 class="title-h3">Tạo mới Slider</h3>
                    <div class="tile-body">
                        
                          <div class="admin-content-right">
                              <?php
                                if(isset($insert_slider)){echo $insert_slider; }
                              ?>
                                <form action="Slideradd.php" method="POST" enctype="multipart/form-data">
                                    <div class="product-add-content git">

                                    <div class="from-group col-md-3">
                                      <label class="control-label" for="">Tên Slider<span style="color: red;">*</span></label> <br>
                                      <input class="form-control" required type="text" name="slider_name"> <br>
                                    </div>

                                    <div class="from-group col-md-3">
                                    <label class="control-label" for="">Ảnh Slider<span style="color: red;">*</span></label> <br>
                                    <input class="form-control" required type="file" name="slider_image"> <br> </div>  
                                    
                                    <div class="from-group col-md-3">
                                    <label class="control-label" for="">Tình trạng<span style="color: red;">*</span></label> <br>
                                    <select class="form-control" required="required" name="type" id="">
                                        <option value="">--Chọn--</option>
                                        <option value="1">On</option>
                                        <option value="0">Off</option>
                                    </select>
                                  </div>
                                    
                                    
                                  <div class="from-group col-12">
                                    <button class="btn btn-save admin-btn" name="submit" type="submit">Gửi</button>  
                                    <a href="slider.php" class="btn btn-cancel">Hủy bỏ</a>
                                  </div>
                                </div>
                                </form>
                                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="js/main.js"></script>
</html>