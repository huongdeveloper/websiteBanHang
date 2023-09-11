<?php
//  define('__ROOT__', dirname(dirname(__FILE__))); 
//  include (__ROOT__.'./admin/lib/session.php');
include "lib/database.php";
include "lib/session.php";
// Session::checkLogin();
include "lib/format.php";
?>

<?php
class admin
{

   private $db;
   private $fm;

public function __construct()
   {
       $this ->db = new Database();
       $this ->fm = new Format();
    
   }
   public function check_admin($username,$userpassword){
      $query = "SELECT * FROM tbl_admin  WHERE admin_name = '$username' AND admin_password = '$userpassword' LIMIT 1 ";
      $result = $this -> db ->select($query);
      if($result!=false) {
          $value = $result ->fetch_assoc();
          Session::set('user_login',true);
          Session::set('admin_User',$value['admin_User']);
          Session::set('admin_id',$value['admin_id']);
          // echo Session::get('admin_name');
          header('Location:index.php');
      }
      else {
          $alert = "Tên đăng nhập hoặc mật khẩu không đúng";
          return $alert;
      }
      // return $result;
  }

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
   
// public function insert_member($user_ten,$user_password){
//             $query = "INSERT INTO tbl_user (user_ten,user_password) VALUES ('$user_ten','$user_password')";
//             $result = $this ->db ->insert($query);
//             header('Location:memberlist.php');
//             return $result;
           
          
//         }
    
//     public function delete_member($userA_id){
//             $query = "DELETE  FROM tbl_user WHERE userA_id = '$userA_id'";
//             $result = $this -> db ->delete($query);
//             return $result;
//             // if($result) {$alert = "<span class = 'alert-style'> Delete Thành công</span> "; return $alert;}
//             // else {$alert = "<span class = 'alert-style'> Delete Thất bại</span>"; return $alert;}
          
        
        
//         }


       
   }


?>