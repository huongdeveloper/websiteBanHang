<!-- <?php
// include "lib/database.php";
// // include "../helper/format.php"
// require ('../Carbon/autoload.php');
//    use Carbon\Carbon;
//    use carbon\CarbonInterval;
// ?>

// <?php
// class comment
// {

   // private $db;
//    private $fm;

   // public function __construct()
   // {
   //     $this ->db = new Database();
   //    //  $this ->fm = new Format();
   // }

//    public function show_statistical($session_idA){
//       $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
//       $query = "SELECT * FROM tbl_payment WHERE session_idA = '$session_idA' ";
//       $result = $this -> db ->select($query);
//        return $result;
//       $sql_thongke = "SELECT * FROM tbl_thongke WHERE date_thongke='$now'"; 
//       $results = $this -> db ->select($sql_thongke);
//        return $results;
//        $soluong = 0;
//         $doanhthu = 0;
//         while($row = mysqli_fetch_array($result)){
//               $soluong+=$row['quantitys'];
//               $doanhthu+=$row['sanpham_gia'];
//         }
//         if(mysqli_num_rows($results)==0){
//          $soluong = $soluong;
//          $doanhthu = $doanhthu;
//          $donhang = 1;
//          $update_thongke ="INSERT INTO tbl_thongke (doanhthu,donhang,date_thongke,soluong) VALUE('$now','$donhang','$doanhthu','$soluong')";
//          $resultA = $this -> db ->insert($update_thongke);
//          return $resultA;
//       }elseif(mysqli_num_rows($results)!=0){
//      while($row_tk = mysqli_fetch_array($results)){
//          $soluong = $row_tk['soluong']+$soluong;
//          $doanhthu = $row_tk['doanhthu']+$doanhthu;
//          $donhang = $row_tk['donhang']+1;
//          $update_thongke ="UPDATE tbl_thongke SET soluong='$soluong',doanhthu='$doanhthu',donhang='$donhang' WHERE date_thongke='$now'";
//          $resultB = $this -> db ->update($update_thongke);
//          return $resultB;
//      }
//  }
// }
// public function show_question(){
//     $query = "SELECT * FROM tbl_question ORDER BY question_id DESC";
//     $result = $this -> db ->select($query);
//     return $result;
// }
// public function show_answer() {
//     $query = "SELECT * FROM tbl_question_answer ORDER BY question_answer_id  DESC";
//     $result = $this -> db ->select($query);
//     return $result;
// }
// public function show_member(){
//     $query = "SELECT * FROM tbl_user ORDER BY userA_id DESC";
//     $result = $this -> db ->select($query);
//     return $result;
// }
// public function delete_comment($comment_id){
//     $query = "DELETE  FROM tbl_comment WHERE comment_id = '$comment_id'";
//     $result = $this -> db ->delete($query);
//     return $result;
//     // if($result) {$alert = "<span class = 'alert-style'> Delete Thành công</span> "; return $alert;}
//     // else {$alert = "<span class = 'alert-style'> Delete Thất bại</span>"; return $alert;}
  
// }
// public function delete_question($question_id) {
//     $query = "DELETE  FROM tbl_question WHERE question_id = '$question_id'";
//     $result = $this -> db ->delete($query);
//     return $result;
// }
// public function delete_answer($question_answer_id){
//     $query = "DELETE  FROM tbl_question_answer WHERE question_answer_id = '$question_answer_id'";
//     $result = $this -> db ->delete($query);
//     return $result;
// }
   
// public function insert_member($user_ten,$user_password,$user_img){
//             $query = "INSERT INTO tbl_user (user_ten,user_password,user_img) VALUES ('$user_ten','$user_password','$user_img')";
//             $result = $this ->db ->insert($query);
//             // header('Location:memberlist.php');
//             return $result;
           
          
//         }
    
//         public function delete_member($userA_id){
//             $query = "DELETE  FROM tbl_user WHERE userA_id = '$userA_id'";
//             $result = $this -> db ->delete($query);
//             return $result;
//             // if($result) {$alert = "<span class = 'alert-style'> Delete Thành công</span> "; return $alert;}
//             // else {$alert = "<span class = 'alert-style'> Delete Thất bại</span>"; return $alert;}
          
        
        
//         }


       
   // }


?> -->