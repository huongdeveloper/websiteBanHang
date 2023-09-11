<?php
 session_start();
 ob_start();
include "class/index_class.php";
include_once 'mail/index.php';
$mail = new Mailer();
$index = new index;
if(isset($_POST['submit'])){
    $error = array();
    if($_POST['text'] != $_SESSION['code']){
        $error['fail'] = 'Mã xác nhận không hợp lệ !';
    }else {
        header('location: doimatkhau.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/util.css">
    <script src="https://kit.fontawesome.com/b94913fe08.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@200;300;400;500;700&display=swap" rel="stylesheet">
    <script src="ckeditor/ckeditor.js"></script>
    <script src="ckfinder/ckfinder.js"></script>

    <title>Document</title>
</head>
<body>
<div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="assets/img/xacnhan1.jpg" alt="IMG">
                </div>
                <div class="login100-form validate-form">
                    <span class="login100-form-title">
                        <b>NHẬP MÃ XÁC NHẬN</b>
                    </span>
                    <?php if(isset($error['fail'])): ?>
                    <span style="font-size: 17px; margin-left: 47px; color:#F42428">
                    <?= $error['fail'] ?> </span>
                    <?php else : ?>
                    <?php endif;?>

                    <span class="form-span-title">
                    </span><br>
                    
                    <form action="" method="POST">
                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="text" placeholder="Nhập lại mã xác nhận" name="text">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                            <i class="fa-solid fa-unlock-keyhole"></i>
                            </span>
                        </div>
                        <div class="container-login100-form-btn">
                            <button class="container-submit" name="submit" type="submit">Gửi</button>
                        </div>
                        <div class="text-right p-t-12">
                            <a class="txt2" href="index.php">
                            Trở về đăng nhập
                            </a>
                        </div>
                    </form>
                    
                </div>
                <div class="text-center p-t-70 txt2">
                        Phần mềm quản lý bán hàng <i class="far fa-copyright" aria-hidden="true"></i>
                       <a class="txt2" href=""> Code bởi Admin </a>
                    </div>
            </div>
        </div>
    </div>
    
</body>
</html>