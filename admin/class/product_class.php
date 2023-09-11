<?php
include "lib/database.php";
// include "lib/format.php"
?>

<?php
 class product
 {

    private $db;
    // private $fm;
    

    public function __construct()
    {
        $this ->db = new Database();
        // $this ->fm = new Format();
    }
    // =====================  Sản phẩm   ============================
    public function insert_product($data,$file){
              $sanpham_tieude = $data['sanpham_tieude'];
              $sanpham_ma = $data['sanpham_ma'];
              $danhmuc_id = $data['danhmuc_id'];
              $loaisanpham_id = $data['loaisanpham_id'];
              $color_id = $data['color_id'];
              $giamgia = $data['giamgia'];
              $sanpham_gia = $data['sanpham_gia'];
              $soluong = $data['soluong'];
              $tinhtrang = $data['tinhtrang'];
              $sanpham_host = $data['sanpham_host'];
              $sapxepsp = $data['sapxepsp'];
              $sanpham_gioithieu = $data['sanpham_gioithieu'];
              $sanpham_chitiet = $data['sanpham_chitiet'];
              $sanpham_baoquan = $data['sanpham_baoquan'];
              $file_name = $_FILES['sanpham_anh']['name'];
              $file_size = $_FILES['sanpham_anh']['size'];
              $file_temp = $_FILES['sanpham_anh']['tmp_name'];
              $div = explode('.',$file_name);
              $file_ext = strtolower(end($div));
              $sanpham_anh = substr(md5(time()),0,10).'.'.$file_ext;
              $upload_image = "uploads/".$sanpham_anh;
              move_uploaded_file( $file_temp,$upload_image);
              $query = "INSERT INTO tbl_sanpham (sanpham_tieude,sanpham_ma,danhmuc_id,loaisanpham_id,color_id,giamgia,sanpham_gia,soluong,tinhtrang,sanpham_host,sapxepsp,sanpham_gioithieu,sanpham_chitiet,sanpham_baoquan,sanpham_anh) 
              VALUES 
              ('$sanpham_tieude','$sanpham_ma','$danhmuc_id','$loaisanpham_id','$color_id','$giamgia','$sanpham_gia',' $soluong','$tinhtrang','$sanpham_host','$sapxepsp','$sanpham_gioithieu','$sanpham_chitiet','$sanpham_baoquan','$sanpham_anh')";
              $result = $this ->db ->insert($query);
              if($result) {
                $query = "SELECT * FROM tbl_sanpham ORDER BY sanpham_id DESC LIMIT 1";
                $result = $this -> db ->select($query) ->fetch_assoc();
                $sanpham_id = $result['sanpham_id'];
                $filename = $_FILES['sanpham_anhs']['name'] ;
                $filetmp =  $_FILES['sanpham_anhs']['tmp_name'] ;
                // foreach ($filetmp as $key => $element) {
                //         move_uploaded_file( $filetmp[$key],"uploads/".$element);
                // }
                foreach ($filename as $key => $element) {
                        move_uploaded_file( $filetmp[$key],"uploads/".$element);
                        $query = "INSERT INTO tbl_sanpham_anh (sanpham_id,sanpham_anh) VALUES ('$sanpham_id','$element')";
                        $result = $this -> db ->insert($query);
                    }
                $sanpham_size = $data['sanpham-size'];
                foreach ($sanpham_size as $key => $element) {
                    $query = "INSERT INTO tbl_sanpham_size (sanpham_id,sanpham_size) VALUES ('$sanpham_id','$element')";
                    $result = $this -> db ->insert($query);
                }
                 }
              header('Location:Sanphamlist.php');
              return $result;               
        }
        // $alert = "<span class = 'alert-style'>Thành công</span> "; return $alert;
    public function show_product(){
        $sp_tungtrang = 10;
        if(!isset($_GET['trang'])){
            $trang = 1;
        }else {
            $trang = $_GET['trang'];
        }
        $trung_trang = ($trang - 1) * $sp_tungtrang;
        $query = "SELECT DISTINCT tbl_sanpham.*, tbl_danhmuc.danhmuc_ten,tbl_loaisanpham.loaisanpham_ten,tbl_color.color_ten
        FROM tbl_sanpham INNER JOIN tbl_danhmuc ON tbl_sanpham.danhmuc_id = tbl_danhmuc.danhmuc_id
        INNER JOIN tbl_loaisanpham ON tbl_sanpham.loaisanpham_id = tbl_loaisanpham.loaisanpham_id
        INNER JOIN tbl_color ON tbl_sanpham.color_id = tbl_color.color_id
        ORDER BY tbl_sanpham.sanpham_id DESC LIMIT $trung_trang, $sp_tungtrang ";
        $result = $this -> db ->select($query);
        return $result;
    }

    // =================
    public function show_All_product(){
        $query = "SELECT * FROM tbl_sanpham ";
        $result = $this -> db ->select($query);
        return $result;
    }

    public function delete_product($sanpham_id){
        $query = "DELETE  FROM tbl_sanpham WHERE sanpham_id = '$sanpham_id'";
        $result = $this -> db ->delete($query);
        if($result) {$alert = "<span class = 'alert-style'> Delete Thành công</span> "; return $alert;}
        else {$alert = "<span class = 'alert-style'> Delete Thất bại</span>"; return $alert;}
    }

    public function delete_product_anh($sanpham_id){
        $query = "DELETE  FROM tbl_sanpham_anh WHERE sanpham_id = '$sanpham_id'";
        $result = $this -> db ->delete($query);
        if($result) {$alert = "<span class = 'alert-style'> Delete Thành công</span> "; return $alert;}
        else {$alert = "<span class = 'alert-style'> Delete Thất bại</span>"; return $alert;}
    }

    public function get_sanpham($sanpham_id){
        $query = "SELECT * FROM tbl_sanpham WHERE sanpham_id = '$sanpham_id'";
        $result = $this -> db ->select($query);
        return $result;
    }

    public function update_product($data,$file,$sanpham_id ) {
        $sanpham_tieude = $data['sanpham_tieude'];
        $sanpham_ma = $data['sanpham_ma'];
        $danhmuc_id = $data['danhmuc_id'];
        $loaisanpham_id = $data['loaisanpham_id'];
        $color_id = $data['color_id'];
        $giamgia = $data['giamgia'];
        $sanpham_gia = $data['sanpham_gia'];
        $soluong = $data['soluong'];
        $tinhtrang = $data['tinhtrang'];
        $sanpham_host = $data['sanpham_host'];
        $sapxepsp = $data['sapxepsp'];
        $sanpham_gioithieu = $data['sanpham_gioithieu'];
        $sanpham_chitiet = $data['sanpham_chitiet'];
        $sanpham_baoquan = $data['sanpham_baoquan'];
        $file_name = $_FILES['sanpham_anh']['name'];
        $file_size = $_FILES['sanpham_anh']['size'];
        $file_temp = $_FILES['sanpham_anh']['tmp_name'];
        $filenames = $_FILES['sanpham_anhs']['name'] ;
        $filetmps =  $_FILES['sanpham_anhs']['tmp_name'] ;
        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $sanpham_anh = substr(md5(time()),0,10).'.'.$file_ext;
        $upload_image = "uploads/".$sanpham_anh;
        move_uploaded_file( $file_temp,$upload_image);
        if(!empty($file_name)&& !empty($filenames))
        {
            $query = "UPDATE tbl_sanpham SET                            
            sanpham_tieude = '$sanpham_tieude', 
            sanpham_ma = '$sanpham_ma', 
            danhmuc_id = '$danhmuc_id', 
            loaisanpham_id = '$loaisanpham_id', 
            color_id = '$color_id', 
            giamgia = '$giamgia',
            sanpham_gia = '$sanpham_gia',
            soluong = '$soluong',
            tinhtrang = '$tinhtrang',
            sanpham_host = '$sanpham_host',
            sapxepsp = '$sapxepsp',
            sanpham_gioithieu = '$sanpham_gioithieu',
            sanpham_chitiet = '$sanpham_chitiet',
            sanpham_baoquan = '$sanpham_baoquan',
            sanpham_anh = '$sanpham_anh'
            WHERE sanpham_id = '$sanpham_id'";
            $result = $this ->db ->update($query);
            if($result ) {
                $query = "DELETE  FROM tbl_sanpham_anh WHERE sanpham_id = '$sanpham_id'";
                $result = $this -> db ->delete($query);
                foreach ($filenames as $key => $element) {
                        move_uploaded_file( $filetmps[$key],"uploads/".$element);
                        $query = "INSERT INTO tbl_sanpham_anh (sanpham_id,sanpham_anh) VALUES ('$sanpham_id','$element')";
                        $result = $this -> db ->insert($query);
                    }
                 }
              header('Location:Sanphamlist.php');
              return $result; 
         
              }   
        else {
                $query = "UPDATE tbl_sanpham SET                            
                sanpham_tieude = '$sanpham_tieude', 
                sanpham_ma = '$sanpham_ma', 
                danhmuc_id = '$danhmuc_id', 
                loaisanpham_id = '$loaisanpham_id', 
                color_id = '$color_id', 
                giamgia = '$giamgia',
                sanpham_gia = '$sanpham_gia',
                soluong = '$soluong',
                tinhtrang = '$tinhtrang',
                sanpham_host = '$sanpham_host',
                sapxepsp = '$sapxepsp,
                sanpham_gioithieu = '$sanpham_gioithieu',
                sanpham_chitiet = '$sanpham_chitiet',
                sanpham_baoquan = '$sanpham_baoquan'
                WHERE sanpham_id = '$sanpham_id'";
                $result = $this ->db ->update($query);
                header('Location:Sanphamlist.php');
                return $result; 
        }


        }
    
    // ==========================================================================

    public function show_danhmuc(){
        $query = "SELECT * FROM tbl_danhmuc ORDER BY danhmuc_id DESC";
        $result = $this -> db ->select($query);
        return $result;
    }

    public function show_loaisanpham_ajax($danhmuc_id){
        $query = "SELECT * FROM tbl_loaisanpham WHERE danhmuc_id = $danhmuc_id ORDER BY loaisanpham_id DESC";
        $result = $this -> db ->select($query);
        // echo  $result;
        return $result;
    }

    public function show_loaisanpham(){
        $query = "SELECT * FROM tbl_loaisanpham ORDER BY loaisanpham_id DESC";
        $result = $this -> db ->select($query);
        return $result;
    }

    public function show_color(){
        $query = "SELECT * FROM tbl_color ORDER BY color_id DESC";
        $result = $this -> db ->select($query);
        return $result;
    }
// ======================= Xem, Thêm Size  =======================================
    
    public function get_size($sanpham_id) {
        $query = "SELECT tbl_sanpham_size.*, tbl_sanpham.sanpham_ma
        FROM tbl_sanpham_size INNER JOIN tbl_sanpham ON tbl_sanpham_size.sanpham_id = tbl_sanpham.sanpham_id
        WHERE tbl_sanpham_size.sanpham_id = $sanpham_id
        ORDER BY tbl_sanpham_size.sanpham_size_id DESC  ";
        $result = $this -> db ->select($query);
        return $result;
    }

    public function insert_sizesp($sanpham_id,$sanpham_size){
        $query = "INSERT INTO tbl_sanpham_size (sanpham_id,sanpham_size) VALUES ('$sanpham_id','$sanpham_size')";
        $result = $this ->db ->insert($query);
        header('Location:sizeSPlist.php');
        return $result;
    }

    public function get_all_size(){
        $query = "SELECT tbl_sanpham_size.*, tbl_sanpham.sanpham_ma
        FROM tbl_sanpham_size INNER JOIN tbl_sanpham ON tbl_sanpham_size.sanpham_id = tbl_sanpham.sanpham_id
        ORDER BY tbl_sanpham.sanpham_ma DESC  ";
        $result = $this -> db ->select($query);
        return $result;
    }
    
    public function delete_size_sanpham($sanpham_size_id){
        $query = "DELETE  FROM tbl_sanpham_size WHERE sanpham_size_id = '$sanpham_size_id'";
        $result = $this -> db ->delete($query);
        if($result) {$alert = "<span class = 'alert-style'> Delete Thành công</span> "; return $alert;}
        else {$alert = "<span class = 'alert-style'> Delete Thất bại</span>"; return $alert;}
    }

    // ================= Xem, Thêm ảnh mô tả ============================

    public function get_anh($sanpham_id){
        $query = "SELECT tbl_sanpham_anh.*, tbl_sanpham.sanpham_ma
        FROM tbl_sanpham_anh INNER JOIN tbl_sanpham ON tbl_sanpham_anh.sanpham_id = tbl_sanpham.sanpham_id
        WHERE tbl_sanpham_anh.sanpham_id = $sanpham_id
        ORDER BY tbl_sanpham_anh.sanpham_anh_id DESC  ";
        $result = $this -> db ->select($query);
        return $result;
    }

    public function insert_anhsp($sanpham_id,$sp_anh) {
        $query = "INSERT INTO tbl_sanpham_anh (sanpham_id,sanpham_anh) VALUES ('$sanpham_id','$sp_anh')";
        $result = $this ->db ->insert($query);
        header('Location:anhSPlist.php');
        return $result;
    }

    public function get_all_anh(){
        $query = "SELECT tbl_sanpham_anh.*, tbl_sanpham.sanpham_ma
        FROM tbl_sanpham_anh INNER JOIN tbl_sanpham ON tbl_sanpham_anh.sanpham_id = tbl_sanpham.sanpham_id
        ORDER BY tbl_sanpham_anh.sanpham_anh_id DESC  ";
        $result = $this -> db ->select($query);
        return $result;
    }

    public function delete_anh_sanpham($sanpham_anh_id){
        $query = "DELETE  FROM tbl_sanpham_anh WHERE sanpham_anh_id = '$sanpham_anh_id'";
        $result = $this -> db ->delete($query);
        if($result) {$alert = "<span class = 'alert-style'> Delete Thành công</span> "; return $alert;}
        else {$alert = "<span class = 'alert-style'> Delete Thất bại</span>"; return $alert;}
    }

    //  ======== Thông tin tất cả các đơn hàng  ============
    public function show_orderAll(){
        $query = "SELECT * FROM tbl_payment ";
        $result = $this -> db ->select($query);
        return $result;
    }

    // ========== Chi tiết đơn hàng  ==========
    public function show_order_detail($order_ma){
        $query = "SELECT * FROM tbl_carta WHERE session_idA = '$order_ma' ORDER BY carta_id DESC";
        $result = $this -> db ->select($query);
        return $result;
    }
    // ======== Thông tin khách hàng =========
    public function show_register($id){
        $query = "SELECT * FROM tbl_register WHERE id = '$id'";
        $result = $this -> db ->select($query);
        return $result;
    }

    // ========  Xóa đơn hàng ============
    public function delete_payment($session_idA){
        $query = "DELETE  FROM tbl_payment WHERE session_idA = '$session_idA'";
        $result = $this -> db ->delete($query);
        return $result;
    }

    public function delete_cart($session_idA){
        $query = "DELETE  FROM tbl_carta WHERE session_idA = '$session_idA'";
        $result = $this -> db ->delete($query);
        return $result;
    }

    public function delete_order($register_id){
        $query = "DELETE  FROM tbl_payment WHERE register_id = '$register_id'";
        $result = $this -> db ->delete($query);
        return $result;
    }

    // ========  update lại đơn hàng ==================
    public function update_order($status,$session_idA){
        $query = "UPDATE tbl_payment SET statusA = '$status' WHERE session_idA = '$session_idA'";
        $result = $this ->db ->update($query);
        return $result;
    
    }

    //  ======== Thông tin tất cả các bình luận ============
    public function show_binhluan(){
        $query = "SELECT tbl_binhluan.*, tbl_sanpham.sanpham_ma
        FROM tbl_binhluan INNER JOIN tbl_sanpham ON tbl_binhluan.sanpham_id = tbl_sanpham.sanpham_id
        ORDER BY tbl_binhluan.binhluan_id DESC  ";
        $result = $this -> db ->select($query);
        return $result;
    }

    // ========  update lại bình luận ==================
    public function update_binhluan($blog_id){
        $query = "UPDATE tbl_binhluan SET blog_id = '$blog_id'";
        $result = $this ->db ->update($query);
        // header('Location:orderlist.php');
        return $result;
    
    }

    //  ========= Xóa bình luận =============
    public function delete_binhluan($binhluan_id){
        $query = "DELETE  FROM tbl_binhluan WHERE binhluan_id = '$binhluan_id'";
        $result = $this -> db ->delete($query);
        if($result) {$alert = "<span class = 'alert-style'> Delete Thành công</span> "; return $alert;}
        else {$alert = "<span class = 'alert-style'> Delete Thất bại</span>"; return $alert;}
      
    }

    // =====================  Slider  ============================
      public function insert_slider($data,$file){
             $slider_name = $data['slider_name'];
            $file_name = $_FILES['slider_image']['name'];
            $file_size = $_FILES['slider_image']['size'];
            $file_temp = $_FILES['slider_image']['tmp_name'];
            $div = explode('.',$file_name);
            $file_ext = strtolower(end($div));
            $slider_image = substr(md5(time()),0,10).'.'.$file_ext;
            $upload_image = "uploads/".$slider_image;
            
            $type = $data['type'];

            if($slider_name== ""|| $type== ""){
                $alert = "<script>alert('Bạn chưa nhập thông tin ! Vui lòng điền vào.')</script>";
                return $alert;
            }else{
                
                    move_uploaded_file( $file_temp,$upload_image);
                    $query = "INSERT INTO tbl_slider(slider_name, type, slider_image) VALUES ('$slider_name','$type','$slider_image')";
                    $result = $this ->db ->insert($query);
                    header('Location:slider.php');
                    return $result;
               
            }
        }
        
        // ==========  hiện ra slider =============
        public function show_slider(){
            $query = "SELECT * FROM tbl_slider  ORDER BY slider_id DESC";
            $result = $this -> db ->select($query);
            return $result;
        }

        // ======== tình trạng slider ============
        public function update_type_slider($id,$type){
        $type = mysqli_real_escape_string($this->db->link, $type);
        $query = "UPDATE tbl_slider SET type = '$type' WHERE slider_id = '$id'";
        $result = $this ->db ->update($query);
        // header('Location:orderlist.php');
        return $result;
        }

        // ======= Xóa slider ==================
        public function del_slider($id){
            $query = "DELETE  FROM tbl_slider WHERE slider_id = '$id'";
            $result = $this -> db ->delete($query);
            return $result;
        }
    
         //  ======== Thông tin tất cả các đánh giá sao  ============
    public function show_rating(){
        $query = "SELECT  tbl_rating.*, tbl_sanpham.sanpham_tieude
        FROM tbl_rating INNER JOIN tbl_sanpham ON tbl_rating.sanpham_id = tbl_sanpham.sanpham_id
        ORDER BY tbl_rating.id DESC ";
        $result = $this -> db ->select($query);
        return $result;
    }

     //  ========= Xóa đánh giá =============
     public function delete_rating($id){
        $query = "DELETE  FROM tbl_rating WHERE id = '$id'";
        $result = $this -> db ->delete($query);
        if($result) {$alert = "<span class = 'alert-style'> Delete Thành công</span> "; return $alert;}
        else {$alert = "<span class = 'alert-style'> Delete Thất bại</span>"; return $alert;}
      
    }

     //  ======== Thông tin tất cả các sản phẩm yêu thích  ============
     public function show_wishlist(){
        $query = "SELECT * FROM tbl_wishlist ";
        $result = $this -> db ->select($query);
        return $result;
    }

    //  ========= Xóa yêu thích =============
    public function delete_wishlist($id){
        $query = "DELETE  FROM tbl_wishlist WHERE id = '$id'";
        $result = $this -> db ->delete($query);
        if($result) {$alert = "<span class = 'alert-style'> Delete Thành công</span> "; return $alert;}
        else {$alert = "<span class = 'alert-style'> Delete Thất bại</span>"; return $alert;}
      
    }

     //  ======== Thông tin tất cả các khách hàng  ============
     public function show_registerKH(){
        $query = "SELECT * FROM tbl_register ";
        $result = $this -> db ->select($query);
        return $result;
    }

    //  ========= Xóa thông tin khách hàng =============
    public function delete_registerKH($id){
        $query = "DELETE  FROM tbl_register WHERE id = '$id'";
        $result = $this -> db ->delete($query);
        if($result) {$alert = "<span class = 'alert-style'> Delete Thành công</span> "; return $alert;}
        else {$alert = "<span class = 'alert-style'> Delete Thất bại</span>"; return $alert;}
      
    }
    // public function show_orderAll(){
    //     $query = "SELECT * FROM tbl_payment ";
    //     $result = $this -> db ->select($query);
    //     return $result;
    // }
//     $query = "SELECT  tbl_rating.*, tbl_sanpham.sanpham_tieude
//     FROM tbl_rating INNER JOIN tbl_sanpham ON tbl_rating.sanpham_id = tbl_sanpham.sanpham_id
//     ORDER BY tbl_rating.id DESC ";

// $query = "SELECT tbl_loaisanpham.*, tbl_danhmuc.danhmuc_ten
// FROM tbl_loaisanpham INNER JOIN tbl_danhmuc ON tbl_loaisanpham.danhmuc_id = tbl_danhmuc.danhmuc_id
// ORDER BY tbl_loaisanpham.loaisanpham_id DESC  ";

// $query = "SELECT DISTINCT tbl_sanpham.*, tbl_danhmuc.danhmuc_ten,tbl_loaisanpham.loaisanpham_ten,tbl_color.color_ten
// FROM tbl_sanpham INNER JOIN tbl_danhmuc ON tbl_sanpham.danhmuc_id = tbl_danhmuc.danhmuc_id
// INNER JOIN tbl_register ON tbl_rating.register_id = tbl_register.id
// INNER JOIN tbl_color ON tbl_sanpham.color_id = tbl_color.color_id
// ORDER BY tbl_sanpham.sanpham_id DESC LIMIT $trung_trang, $sp_tungtrang ";
        
                   


//    public function show_order() {
//     $query = "SELECT tbl_order.*, tbl_payment.*,tbl_diachi.*
//     FROM tbl_order INNER JOIN tbl_payment ON tbl_order.session_idA = tbl_payment.session_idA
//     INNER JOIN tbl_diachi ON tbl_order.customer_xa = tbl_diachi.ma_px
//     WHERE tbl_payment.statusA = 0
//     ORDER BY tbl_payment.payment_id DESC   ";
//     $result = $this -> db ->selectdc($query);
//     return $result;
// }
        

// public function show_order_done(){
//     $query = "SELECT tbl_order.*, tbl_payment.*,tbl_diachi.*
//     FROM tbl_order INNER JOIN tbl_payment ON tbl_order.session_idA = tbl_payment.session_idA
//     INNER JOIN tbl_diachi ON tbl_order.customer_xa = tbl_diachi.ma_px
//     WHERE tbl_payment.statusA = 1
//     ORDER BY tbl_payment.payment_id DESC   ";
//     $result = $this -> db ->select($query);
//     return $result;
// }





    }

 
?>