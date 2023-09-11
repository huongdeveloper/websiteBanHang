<?php 
  include "header.php";
  $session_id = session_id();
require('./admin/Carbon/autoload.php');
	use Carbon\Carbon;
    use Carbon\CarbonInterval;
    
	$now = Carbon::now('Asia/Ho_Chi_Minh');
  if(isset($_GET['vnp_Amount'])){

    $vnp_Amount = $_GET['vnp_Amount'];
    $vnp_BankCode = $_GET['vnp_BankCode'];
    $vnp_BankTranNo = $_GET['vnp_BankTranNo'];
    $vnp_OrderInfo = $_GET['vnp_OrderInfo'];
    $vnp_PayDate = $_GET['vnp_PayDate'];
    $vnp_TmnCode = $_GET['vnp_TmnCode'];
    $vnp_TransactionNo = $_GET['vnp_TransactionNo'];
    $vnp_CardType = $_GET['vnp_CardType'];
    $code_cart = $_SESSION['code_cart'];
    $insert_vnpay = $index -> insert_vnpay($vnp_Amount,$code_cart,$vnp_BankCode,$vnp_BankTranNo,$vnp_CardType,$vnp_OrderInfo,$vnp_PayDate,$vnp_TmnCode,$vnp_TransactionNo);
    header('Location:success.php');
}

?>
