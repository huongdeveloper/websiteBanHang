<?php
include "header.php";
include "leftside.php"; 
include "class/product_class.php";
$product = new product();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
    // var_dump($_POST);
	$insert_product = $product ->insert_product($_POST,$_FILES);
    header('Location:Sanphamlist.php');

}
?>
<!-- ================= Sản phẩm ======================== -->
      <main class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                   <h3 class="title-h3">Tạo mới sản phẩm</h3>
                    <div class="tile-body">
                        
                          <div class="admin-content-right">
                              <?php
                                if(isset($insert_product)){echo $insert_product; }
                              ?>
                                <form action="Sanphamadd.php" method="POST" enctype="multipart/form-data">
                                    <div class="product-add-content git">
                                    <div class="from-group col-md-3">
                                      <label class="control-label" for="">Tên sản phẩm<span style="color: red;">*</span></label> <br>
                                      <input class="form-control" required type="text" name="sanpham_tieude"> <br>
                                    </div>
                                    <div class="from-group col-md-3">
                                        <label class="control-label" for="">Mã sản phẩm<span style="color: red;">*</span></label> <br>
                                        <input class="form-control" required type="text" name="sanpham_ma"> <br>
                                      </div>
                                      <div class="from-group col-md-3">
                                        <label class="control-label" for="">Chọn danh mục<span style="color: red;">*</span></label> <br>
                                        <select class="form-control" required="required" name="danhmuc_id" id="danhmuc_id">
                                        <option value="">--Chọn--</option>
                                             <?php
                                               $show_danhmuc = $product ->show_danhmuc();
                                                  if($show_danhmuc){while($result=$show_danhmuc->fetch_assoc()){
                                              ?>
                                         <option value="<?php echo $result['danhmuc_id'] ?>"><?php echo $result['danhmuc_ten'] ?></option>
                                            <?php
                                                 }}
                                             ?>
                                           
                                        </select>
                                      </div>
                                   
                                      <div class="from-group col-md-3">
                                    <label class="control-label" for="">Chọn Loại sản phẩm<span style="color: red;">*</span></label> <br>
                                    <select class="form-control" required="required"  name="loaisanpham_id" id="loaisanpham_id">
                                        <option value="">--Chọn--</option>
                                      
                                    </select></div>
                                    <div class="from-group col-md-3">
                                    <label class="control-label" for="">Chọn Màu sản phẩm<span style="color: red;">*</span></label> <br>
                                    <select class="form-control" required="required" name="color_id" id="">
                                    <option value="">--Chọn--</option>
                                      <?php
                                         $show_color = $product ->show_color();
                                         if($show_color){while($result=$show_color->fetch_assoc()){
                                      ?>
                                    <option value="<?php echo $result['color_id'] ?>"><?php echo $result['color_ten'] ?></option>
                                      <?php
                                           }}
                                      ?>
                                        
                                    </select>
                                </div>
                                    <div class="from-group col-md-3">
                                    <label class="control-label" for="">Chọn Size sản phẩm<span style="color: red;">*</span></label> <br>
                                    <div class="sanpham-size">
                                    <p class="control-label">S</p>    <input class="form-control" type="checkbox" name="sanpham-size[]" value="S"> 
                                    <p class="control-label">M</p>    <input class="form-control" type="checkbox" name="sanpham-size[]" value="M"> 
                                    <p class="control-label">L</p>    <input class="form-control" type="checkbox" name="sanpham-size[]" value="L">
                                    <p class="control-label">XL</p>   <input class="form-control" type="checkbox" name="sanpham-size[]" value="XL">  
                                    <p class="control-label">XXL</p>  <input class="form-control" type="checkbox" name="sanpham-size[]" value="XXL">  
                                    </div>
                                </div>
                                <div class="from-group col-md-3">
                                    <label class="control-label" for="">Số lượng<span style="color: red;">*</span></label> <br>
                                    <input class="form-control" required type="text" name="soluong"> <br>
                                  </div>
                                  <div class="from-group col-md-3">
                                    <label class="control-label" for="">Giảm giá<span style="color: red;">*</span></label> <br>
                                    <input class="form-control" required type="text" name="giamgia"> <br> </div>

                                    <div class="from-group col-md-3">
                                    <label class="control-label" for="">Giá sản phẩm<span style="color: red;">*</span></label> <br>
                                    <input class="form-control" required type="text" name="sanpham_gia"> <br> </div>

                                    <div class="from-group col-md-3">
                                    <label class="control-label" for="">Tình trạng<span style="color: red;">*</span></label> <br>
                                    <select class="form-control" required="required" name="tinhtrang" id="">
                                        <option value="">--Chọn--</option>
                                        <option value="1">Còn Hàng</option>
                                        <option value="0">Hết Hàng</option>
                                    </select>
                                  </div>

                                  <div class="from-group col-md-3">
                                    <label class="control-label" for="">Sản phẩm host<span style="color: red;">*</span></label> <br>
                                    <select class="form-control" required="required" name="sanpham_host" id="">
                                        <option value="">--Chọn--</option>
                                        <option value="1">GIRL</option>
                                        <option value="2">MEN</option>
                                        <option value="3">KIDS</option>
                                        <option value="0">Khác</option>
                                    </select>
                                  </div>

                                  <div class="from-group col-md-3">
                                    <label class="control-label" for="">Sắp xếp sản phẩm<span style="color: red;">*</span></label> <br>
                                    <select class="form-control" required="required" name="sapxepsp" id="">
                                        <option value="">--Chọn--</option>
                                        <option value="0">Mới nhất</option>
                                        <option value="1">Bán chạy</option>
                                    </select>
                                  </div>
                                    
                                    <div class="from-group col-md-3">
                                    <label class="control-label" for="">Ảnh đại diện<span style="color: red;">*</span></label> <br>
                                    <input class="form-control" required type="file" name="sanpham_anh"> <br> </div>  
                                    <div class="from-group col-md-3">
                                    <label class="control-label" for="">Ảnh Sản phẩm mô tả<span style="color: red;">*</span></label> <br>
                                    <input class="form-control" required type="file" multiple  name="sanpham_anhs[]"> <br> </div> 
                                    
                                    <div class="from-group col-12"> 
                                        <label class="control-label" for="">Giới thiệu<span style="color: red;">*</span></label> <br>
                                        <textarea class="ckeditor"  required name="sanpham_gioithieu" cols="60" rows="5"></textarea><br> </div> 

                                    <div class="from-group col-12"> 
                                        <label class="control-label" for="">Chi tiết<span style="color: red;">*</span></label> <br>
                                        <textarea class="ckeditor"  required name="sanpham_chitiet" cols="60" rows="5"></textarea><br> </div> 
                                    <div class="from-group col-12">
                                        <label class="control-label"  for="">Bảo quản<span style="color: red;">*</span></label> <br>
                                        <textarea class="ckeditor" required name="sanpham_baoquan" cols="60" rows="5"></textarea><br> </div>
                                    <button class="btn btn-save admin-btn" name="submit" type="submit">Gửi</button>  
                                    <a href="Sanphamlist.php" class="btn btn-cancel">Hủy bỏ</a>
                                </div>
                                </form>
                                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
//     $(".ckeditor").each(function(){
//         CKEDITOR.replace( this.id, {
// 	filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
// 	filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
// } );
//     })
CKEDITOR.replace( 'ckeditor', {
	filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
	filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
} );
    

    </script>
    <script>
    $(document).ready(function(){
        $("#danhmuc_id").change(function(){
          
            // alert($(this).val())
            var x = $(this).val()
            $.get ("ajax/productadd_ajax.php", {danhmuc_id:x}, function(data) {
                $("#loaisanpham_id").html(data);
                // alert($("#loaisanpham_id").html(data));
            })

        })
    })
</script>
</body>
<script src="js/main.js"></script>
</html>