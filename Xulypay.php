<?php 
  include "header.php";
  require_once("config/config_vnpay.php");
?>
<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $register_id = Session::get('register_id');
    $session_idA = session_id();
    $today = date("Y-m-d");
    $deliver_method = $_POST['deliver-method'];
    $method_payment = $_POST['paymentS'];
    $code_oder = substr($session_id,0,8);
    if($method_payment == 'tienmat'){
       	$insert_payment = $index ->insert_payment($register_id,$code_oder,$session_idA,$deliver_method,$method_payment,$today );
    }elseif($method_payment == 'VNPAY'){
        $vnp_TxnRef =  $code_oder; 
        $vnp_OrderInfo = 'Thanh toán đơn đặt hàng tại Website';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $_POST['total_congthanhtoan'] * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $vnp_ExpireDate = $expire;
        
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate"=>$vnp_ExpireDate
        );
        
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        
        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
            if (isset($_POST['redirect'])) {
                $_SESSION['code_cart'] = $code_oder;
                $insert_payment = $index ->insert_payment($register_id,$code_oder,$session_idA,$deliver_method,$method_payment,$today );
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
    }elseif($method_payment == 'Momo'){
        echo "<script> alert('thanh toan Momo') </script>";;
    }

    header('Location:success.php');
}
?>