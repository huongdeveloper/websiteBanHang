<?php
include "../lib/database.php";
// include "lib/format.php";
require ('../Carbon/autoload.php');
   use Carbon\Carbon;
   use carbon\CarbonInterval;
?>

<?php 
$db = new Database();

    if(isset($_POST['thoigian'])){
        $thoigian = $_POST['thoigian'];
    }else{
        $thoigian = '';
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
    }

    if($thoigian== '7ngay'){
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
    }elseif($thoigian== '30ngay'){
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(30)->toDateString();
    }elseif($thoigian== '90ngay'){
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(90)->toDateString();
    }elseif($thoigian== '365ngay'){
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
    }

    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
    
    $query = "SELECT * FROM tbl_thongke WHERE date_thongke BETWEEN '$subdays' AND '$now' ORDER BY date_thongke ASC ";
    $result= $db -> select($query);
    foreach($result as $key => $row){
        $chart_data[] = array(
            'date' => $row['date_thongke'],
            'order' => $row['donhang'],
            'revenue' => $row['doanhthu'],
            'soluong' => $row['soluong'],
        );
    }
    echo $data = json_encode($chart_data);
?>