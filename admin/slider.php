<?php
include "header.php";
include "leftside.php";
include "class/product_class.php";
include "helper/format.php";
$product = new product();
$fm = new Format();
if (isset($_GET['type_slider']) && isset($_GET['type'])){
    $id = $_GET['type_slider'];
    $type = $_GET['type'];
    $update_slider = $product -> update_type_slider($id,$type);
  }
    if (isset($_GET['del_slider'])){
        $id = $_GET['del_slider'];
        $del_slider = $product -> del_slider($id);
    }
?>

      <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="Sanphamlist.php"><b>Danh sách Slider</b></a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                            <div class="col-sm-2">
                              <a class="btn btn-add btn-sm" href="Slideradd.php" title="Thêm"><i class="fas fa-plus"></i>
                                Tạo mới Slider</a>
                            </div>
                          </div>
                        <div>
                          <table id="customers">
                            <tr>
                              <th>STT</th>
                              <th>ID Slider</th>
                              <th>Tên Slider</th>
                              <th>Ảnh Slider</th>
                              <th>Tình trạng</th>
                              <th>Chức năng</th>
                            </tr>
                            <?php
                                $show_slider = $product ->show_slider();
                                if($show_slider){$i=0; while($result = $show_slider ->fetch_assoc()){$i++;

                              ?>
                          <tr>
                              <td> <?php echo $i ?></td>
                              <td><?php echo $result['slider_id'] ?></td>
                              <td><?php echo $result['slider_name'] ?></td>
                              <td><img src="uploads/<?php echo $result['slider_image'] ?>" alt="" width="100px;"></td>
                              <td> <?php if($result['type']== 1){
                                ?>
                                <a href="?type_slider=<?php echo $result['slider_id'] ?>&type= 0"><span class="badge bg-danger">Off</span></a>
                                <?php
                                }else{
                                ?>
                                <a href="?type_slider=<?php echo $result['slider_id'] ?>&type= 1"><span class="badge bg-success">On</span></a> 
                                <?php
                                } ?>
                              </td>
                              <td><a href="?del_slider=<?php echo $result['slider_id'] ?>" class="btn btn-edit" type="button" title="Xóa"> <i class="fas fa-trash-alt"></i> </a>
                              </td>
                          </tr>
                          <?php
                           }}
                           ?> 
                        
                          </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
</html>