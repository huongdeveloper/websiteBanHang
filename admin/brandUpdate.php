<?php
include "header.php";
include "leftside.php";
include "class/Data_class.php";
$brand = new data;
if (isset($_GET['loaisanpham_id'])|| $_GET['loaisanpham_id']!=NULL){
    $loaisanpham_id = $_GET['loaisanpham_id'];
    }
    $get_brand = $brand -> get_brand($loaisanpham_id);
    if($get_brand){$resul = $get_brand ->fetch_assoc();}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $loaisanpham_ten = $_POST['loaisanpham_ten'];
    $danhmuc_id = $_POST['danhmuc_id'];
	$update_brand = $brand->update_brand($loaisanpham_ten,$danhmuc_id,$loaisanpham_id);

}
?>
<!-- ================= Thêm danh mục ======================== -->
      <main class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                   <h3 class="title-h3">Sửa loại sản phẩm</h3>
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
                                        <option <?php if($resul['danhmuc_id'] == $result['danhmuc_id']) {echo "selected";} ?> value="<?php echo $result['danhmuc_id'] ?>"><?php echo $result['danhmuc_ten'] ?></option>
                                        <?php
                                         }}
                                        ?>
                                           
                                        </select>
                                      </div>
                                    <div class="from-group col-md-3">
                                      <label class="control-label" for="">Vui lòng chọn loại sản phẩm<span style="color: red;">*</span></label> <br>
                                      <input class="form-control"  type="text" value="<?php echo $resul['loaisanpham_ten'] ?>" name="loaisanpham_ten"> <br>
                                    </div>
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