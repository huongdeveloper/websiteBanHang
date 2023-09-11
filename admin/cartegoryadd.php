<?php
include "header.php";
include "leftside.php";
include "class/Data_class.php"; 
$cartegory = new data;
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $cartegory_name = $_POST['cartegory_name'];
	$insert_cartegory = $cartegory ->insert_cartegory($cartegory_name);

}
?>
<!-- ================= Thêm danh mục ======================== -->
      <main class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                   <h3 class="title-h3">Tạo danh mục mới</h3>
                    <div class="tile-body">
                          <div class="admin-content-right">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="product-add-content git">
                                    <div class="from-group col-md-3">
                                      <label class="control-label" for="">Vui lòng điền vào danh mục<span style="color: red;">*</span></label> <br>
                                      <input class="form-control" required type="text" name="cartegory_name" placeholder="Vui lòng điền vào danh mục"> <br>
                                    </div>
                                    <div class="from-group col-12">
                                    <button class="btn btn-save admin-btn" name="submit" type="submit">Gửi</button>  
                                    <a href="cartegorylist.php" class="btn btn-cancel">Hủy bỏ</a> </div>
                                    </div>    
                                </form>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>