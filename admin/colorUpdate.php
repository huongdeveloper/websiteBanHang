<?php
include "header.php";
include "leftside.php";
include "class/Data_class.php";
$brand = new data;
if (isset($_GET['color_id'])|| $_GET['color_id']!=NULL){
    $color_id = $_GET['color_id'];
    }
    $get_color = $brand -> get_color($color_id);
    if($get_color){$resul = $get_color ->fetch_assoc();}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $color_ten = $_POST['color_ten'];
    $file_name = $_FILES['color_anh']['name'];
    $file_temp = $_FILES['color_anh']['tmp_name'];
    $div = explode('.',$file_name);
    $file_ext = strtolower(end($div));
    $color_anh = substr(md5(time()),0,10).'.'.$file_ext;
    $upload_image = "uploads/".$color_anh;
    move_uploaded_file( $file_temp,$upload_image);
	$update_color = $brand ->update_color($color_ten,$color_anh,$color_id);

}
?>
<!-- ================= Thêm danh mục ======================== -->
      <main class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                   <h3 class="title-h3">Sửa Màu sắc</h3>
                    <div class="tile-body">
                          <div class="admin-content-right">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="product-add-content git">
                                    <div class="from-group col-md-3">
                                      <label class="control-label" for="">Tên màu sắc<span style="color: red;">*</span></label> <br>
                                      <input class="form-control" type="text" name="color_ten"  value="<?php echo $resul['color_ten'] ?>"> <br>
                                    </div>
                                    <div class="from-group col-md-3">
                                    <label class="control-label" for="">Ảnh màu sắc<span style="color: red;">*</span></label> <br>
                                    
                                    <input class="form-control" required type="file" name="color_anh"> <br> </div>
                                    <div class="from-group col-md-3 img-uploads-color">
                                    <img src="uploads/<?php echo $resul['color_anh'] ?>" alt=""></div>
                                    <div class="from-group col-12">
                                    <button class="btn btn-save admin-btn" name="submit" type="submit">Sửa</button>  
                                    <a href="brandlist.php" class="btn btn-cancel">Hủy bỏ</a> </div>
                                    </div>    
                                </form>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>