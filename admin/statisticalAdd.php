<?php
   include "lib/database.php";
   $db = new Database();
   require ('Carbon/autoload.php');
   use Carbon\Carbon;
   use carbon\CarbonInterval;
   $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

    if(isset($_GET['session_idA'])) {
        $session_idA = $_GET['session_idA'];
		$sql_update ="UPDATE tbl_payment SET statusA=1 WHERE session_idA='".$session_idA."'";
        $resultA =  $db ->update($sql_update);
       
        $query_tbl_payment = "SELECT * FROM tbl_carta,tbl_sanpham WHERE tbl_carta.sanpham_id=tbl_sanpham.sanpham_id AND tbl_carta.session_idA='$session_idA' ORDER BY tbl_carta.cartA_id DESC";
        $resultB =  $db ->select($query_tbl_payment);

        $query_tbl_thongke = "SELECT * FROM tbl_thongke WHERE date_thongke = '$now'";
        $resultC=  $db -> select($query_tbl_thongke);

        $soluong = 0;
        $doanhthu = 0;

        while($row = mysqli_fetch_array($resultB)){
            $soluong+=$row['quantitys'];
            $doanhthu+=$row['sanpham_gia'];                     
        }
        header('Location:orderlist.php');
        if($resultC->num_rows==0){
            $soluong = $soluong;
            $doanhthu = $doanhthu;
            $donhang = 1;
             $sql_insert_thongke = "INSERT INTO tbl_thongke (date_thongke,soluong,doanhthu,donhang) 
            VALUE('$now','$soluong','$doanhthu','$donhang')";
             $resultD=  $db -> insert($sql_insert_thongke);
             return $resultD;
        }elseif(mysqli_num_rows($resultC)!=0){
                while($row_tk = mysqli_fetch_array($resultC)){
                    $soluong = $row_tk['soluong']+$soluong;
                    $doanhthu = $row_tk['doanhthu']+$doanhthu;
                    $donhang = $row_tk['donhang']+1;
                    $sql_update_thongke ="UPDATE tbl_thongke SET soluong='$soluong',doanhthu='$doanhthu',donhang='$donhang' WHERE date_thongke='$now'" ;
                    $resultD=  $db -> update($sql_update_thongke);
                    return  $resultD;
                }
                
        }
       

    }
  
?>