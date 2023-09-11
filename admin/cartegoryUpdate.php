<?php
include "header.php";
include "leftside.php";
include "class/Data_class.php"; 
$cartegory = new data();
if (isset($_GET['danhmuc_id'])|| $_GET['danhmuc_id']!=NULL){
    $danhmuc_id = $_GET['danhmuc_id'];
    }
    $get_cartegory = $cartegory -> get_cartegory($danhmuc_id);
    if($get_cartegory){$resul = $get_cartegory ->fetch_assoc();}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $danhmuc_ten = $_POST['danhmuc_ten'];
	$update_cartegory = $cartegory->update_cartegory($danhmuc_ten,$danhmuc_id);

}
?>
<!-- ================= Thêm danh mục ======================== -->
      <main class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                   <h3 class="title-h3">Sửa danh mục</h3>
                    <div class="tile-body">
                          <div class="admin-content-right">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="product-add-content git">
                                    <div class="from-group col-md-3">
                                      <label class="control-label" for="">Vui lòng điền vào danh mục<span style="color: red;">*</span></label> <br>
                                      <input class="form-control" type="text" name="danhmuc_ten" value="<?php echo $resul['danhmuc_ten'] ?>"> <br>
                                    </div>
                                    <div class="from-group col-12">
                                    <button class="btn btn-save admin-btn" name="submit" type="submit">Sửa</button>  
                                    <a href="cartegorylist.php" class="btn btn-cancel">Hủy bỏ</a> </div>
                                    </div>    
                                </form>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>