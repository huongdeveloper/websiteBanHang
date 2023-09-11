<?php
include "header.php";
include "leftside.php"; 
include "class/product_class.php";
// $product = new product();
$product = new product();
if (isset($_GET['sanpham_id'])|| $_GET['sanpham_id']!=NULL){
    $sanpham_id = $_GET['sanpham_id'];
    }
    $get_sanpham = $product -> get_sanpham($sanpham_id);
    if($get_sanpham){$resul = $get_sanpham ->fetch_assoc();}
  
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])){
	$update_product = $product ->update_product($_POST,$_FILES,$sanpham_id );
    // header('Location:brandlist.php');
}
?>
<!-- ================= Sản phẩm ======================== -->
      <main class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                   <h3 class="title-h3">Sửa sản phẩm</h3>
                    <div class="tile-body">
                        
                          <div class="admin-content-right">
                                <?php
                                  if(isset($insert_product)){echo $insert_product; }
                                 ?>
                                <form action="Sanphamadd.php" method="POST" enctype="multipart/form-data">
                                    <div class="product-add-content git">
                                    <div class="from-group col-md-3">
                                      <label class="control-label" for="">Tên sản phẩm<span style="color: red;">*</span></label> <br>
                                      <input class="form-control" value="<?php echo $resul['sanpham_tieude'] ?>" required type="text" name="sanpham_tieude"> <br>
                                    </div>
                                    <div class="from-group col-md-3">
                                        <label class="control-label" for="">Mã sản phẩm<span style="color: red;">*</span></label> <br>
                                        <input class="form-control" value="<?php echo $resul['sanpham_ma'] ?>" required type="text" name="sanpham_ma"> <br>
                                      </div>
                                      <div class="from-group col-md-3">
                                        <label class="control-label" for="">Chọn danh mục<span style="color: red;">*</span></label> <br>
                                        <select class="form-control" required="required" name="danhmuc_id" id="danhmuc_id">
                                        <option value="">--Chọn--</option>
                                        <?php
                                           $show_danhmuc = $product ->show_danhmuc();
                                            if($show_danhmuc){while($result=$show_danhmuc->fetch_assoc()){
                                        ?>
                                          <option <?php if($resul['danhmuc_id']== $result['danhmuc_id']) {echo "selected";} ?> value="<?php echo $result['danhmuc_id'] ?>"><?php echo $result['danhmuc_ten'] ?></option>
                                        <?php
                                           }}
                                        ?>
                                           
                                        </select>
                                      </div>
                                   
                                      <div class="from-group col-md-3">
                                    <label class="control-label" for="">Chọn Loại sản phẩm<span style="color: red;">*</span></label> <br>
                                    <select class="form-control" required="required"  name="loaisanpham_id" id="loaisanpham_id">
                                        <option value="">--Chọn--</option>
                                        <?php
                                          $show_loaisanpham = $product ->show_loaisanpham();
                                          if($show_loaisanpham){while($result=$show_loaisanpham->fetch_assoc()){
                                        ?>
                                         <option <?php if($resul['loaisanpham_id']== $result['loaisanpham_id']) {echo "selected";} ?> value="<?php echo $result['loaisanpham_id'] ?>"><?php echo $result['loaisanpham_ten'] ?></option>
                                         <?php
                                            }}
                                         ?>
                                    </select></div>
                                    <div class="from-group col-md-3">
                                    <label class="control-label" for="">Chọn Màu sản phẩm<span style="color: red;">*</span></label> <br>
                                    <select class="form-control" required="required" name="color_id" id="">
                                    <option value="">--Chọn--</option>
                                    <?php
                                       $show_color = $product ->show_color();
                                         if($show_color){while($result=$show_color->fetch_assoc()){
                                    ?>
                                        <option  <?php if($resul['color_id']== $result['color_id']) {echo "selected";} ?> value="<?php echo $result['color_id'] ?>"><?php echo $result['color_ten'] ?></option>
                                    <?php
                                         }}
                                    ?>    
                                    </select>
                                </div>
                                <div class="from-group col-md-3">
                                    <label class="control-label" for="">Số lượng<span style="color: red;">*</span></label> <br>
                                    <input class="form-control" value="<?php echo $resul['soluong'] ?>" required type="text" name="soluong"> <br>
                                  </div>
                                  <div class="from-group col-md-3">
                                    <label class="control-label" for="">Giảm giá<span style="color: red;">*</span></label> <br>
                                    <input class="form-control" value="<?php echo $resul['giamgia'] ?>" required type="text" name="giamgia"> <br> </div>

                                    <div class="from-group col-md-3">
                                    <label class="control-label" for="">Giá sản phẩm<span style="color: red;">*</span></label> <br>
                                    <input class="form-control" value="<?php echo $resul['sanpham_gia'] ?>" required type="text" name="sanpham_gia"> <br> </div>

                                    <div class="from-group col-md-3">
                                    <label class="control-label" for="">Tình trạng<span style="color: red;">*</span></label> <br>
                                    <select class="form-control" required="required" name="tinhtrang" id="">
                                    <option value="">--Chọn--</option>
                                        <?php
                                          if($resul['tinhtrang']==1){
                                        ?>
                                        <option value="1" selected>Còn Hàng</option>
                                        <option value="0">Hết Hàng</option>
                                        <?php 
                                          }else {
                                        ?>
                                        <option value="1">Còn Hàng</option>
                                        <option value="0" selected>Hết Hàng</option>
                                        <?php 
                                          }
                                          ?>                                                                               
                                    </select>
                                  </div>

                                  <div class="from-group col-md-3">
                                    <label class="control-label" for="">Sắp xếp sản phẩm theo<span style="color: red;">*</span></label> <br>
                                    <select class="form-control" required="required" name="sanpham_host" id="">
                                    <option value="">--Chọn--</option>
                                        <?php
                                          if($resul['sanpham_host']==1){
                                        ?>
                                        <option value="2">MEN</option>
                                        <option value="1" selected>GIRL</option>
                                        <option value="3">KIDS</option>
                                        <option value="0">Khác</option>
                                        
                                        <?php 
                                          }elseif($resul['sanpham_host']==2) {
                                        ?>
                                        <option value="2" selected>MEN</option>
                                        <option value="1">GIRL</option>
                                        <option value="3">KIDS</option>
                                        <option value="0">Khác</option>
                                        <?php 
                                         }elseif($resul['sanpham_host']==3) {
                                          ?> 
                                        <option value="2">MEN</option>
                                        <option value="1">GIRL</option>
                                        <option value="3" selected>KIDS</option>
                                        <option value="0">Khác</option>
                                          <?php 
                                         }else{
                                          ?> 
                                        <option value="2">MEN</option>
                                        <option value="1">GIRL</option>
                                        <option value="3">KIDS</option>
                                        <option value="0" selected>Khác</option>
                                          <?php }?>
                                    </select>
                                  </div>

                                  <div class="from-group col-md-3">
                                    <label class="control-label" for="">Sắp xếp sản phẩm<span style="color: red;">*</span></label> <br>
                                    <select class="form-control" required="required" name="sapxepsp" id="">
                                    <option value="">--Chọn--</option>
                                        <?php
                                          if($resul['sapxepsp']==1){
                                        ?>
                                        <option value="1" selected>Bán chạy</option>
                                        <option value="0">Mới nhất</option>
                                        <?php 
                                          }else {
                                        ?>
                                        <option value="1">Bán chạy</option>
                                        <option value="0" selected>Mới nhất</option>
                                        <?php 
                                          }
                                          ?>                                                                               
                                    </select>
                                  </div>
                                    
                                    <div class="from-group col-md-3">
                                    <label class="control-label" for="">Ảnh đại diện<span style="color: red;">*</span></label> <br>
                                    <input class="form-control" required type="file" name="sanpham_anh"> <br>
                                    <img style="width: 100px; height: 100px" src="uploads/<?php echo $resul['sanpham_anh'] ?>"> <br>  </div>  
                                    <div class="from-group col-md-3">
                                    <label class="control-label" for="">Ảnh Sản phẩm mô tả<span style="color: red;">*</span></label> <br>
                                    <input class="form-control" required type="file" multiple  name="sanpham_anhs[]"> <br>
                                    <div class="sanpham-anh">
                                      <?php
                                        $get_anh = $product -> get_anh($sanpham_id);                        
                                        if($get_anh){while($resultA=$get_anh->fetch_assoc()){
                                      ?>
                                        <img style="width: 100px; height: 100px" src="uploads/<?php echo $resultA['sanpham_anh'] ?>">
                                      <?php
                                         }}
                                       ?>
                                    </div>
                                 </div> 
                                    
                                    <div class="from-group col-12"> 
                                        <label class="control-label" for="">Giới thiệu<span style="color: red;">*</span></label> <br>
                                        <textarea class="ckeditor"  required name="sanpham_gioithieu" cols="60" rows="5"><?php echo $resul['sanpham_gioithieu'] ?></textarea><br> </div> 

                                    <div class="from-group col-12"> 
                                        <label class="control-label" for="">Chi tiết<span style="color: red;">*</span></label> <br>
                                        <textarea class="ckeditor"  required name="sanpham_chitiet" cols="60" rows="5"><?php echo $resul['sanpham_chitiet'] ?></textarea><br> </div> 
                                    <div class="from-group col-12">
                                        <label class="control-label"  for="">Bảo quản<span style="color: red;">*</span></label> <br>
                                        <textarea class="ckeditor" required name="sanpham_baoquan" cols="60" rows="5"><?php echo $resul['sanpham_baoquan'] ?></textarea><br> </div>
                                    <button class="btn btn-save admin-btn" name="submit" type="submit">Sửa</button>  
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