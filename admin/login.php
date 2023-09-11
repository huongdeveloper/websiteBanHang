<?php
include "class/admin_class.php";
Session::init();
$admin = new admin();
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST['username'];
    $userpassword = md5($_POST['password']);
    // var_dump($_POST);
	$check_admin = $admin ->check_admin($username,$userpassword);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/main.css"> -->
    <link rel="stylesheet" href="css/css.css">
    <script src="https://kit.fontawesome.com/b94913fe08.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@200;300;400;500;700&display=swap" rel="stylesheet">
    <script src="ckeditor/ckeditor.js"></script>
    <script src="ckfinder/ckfinder.js"></script>

    <title>Phần mềm quản lý bán hàng</title>
</head>
<body>
<div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="icon/team.jpg" alt="IMG">
                </div>
                <!--=====TIÊU ĐỀ======-->
                <div class="login100-form validate-form">
                    <span class="login100-form-title">
                        <b>ĐĂNG NHẬP HỆ THỐNG ADMIN</b>
                        
                    </span>

                    <span class="form-span-title">
                     <?php if(isset($check_admin)){ echo $check_admin;}?>
                    </span><br>
                    
                    <!--=====FORM INPUT TÀI KHOẢN VÀ PASSWORD======-->
                    <form action="login.php" method="POST">
                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="text" placeholder="Tài khoản quản trị" name="username">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa-regular fa-user"></i>
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="password" placeholder="Mật khẩu" name="password">
                           
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa-solid fa-key"></i>
                            </span>
                        </div>

                        <!--=====ĐĂNG NHẬP======-->
                        <div class="container-login100-form-btn">
                            <button class="container-submit" type="submit">Đăng nhập</button>
                        </div>
                        <!--=====LINK TÌM MẬT KHẨU======-->
                        <div class="text-right p-t-12">
                            <a class="txt2" href="#">
                                Bạn quên mật khẩu?
                            </a>
                        </div>
                    </form>
                    
                </div>
                <!--  -->
                <!--=====FOOTER======-->
                <div class="text-center p-t-70 txt2">
                        Phần mềm quản lý bán hàng <i class="far fa-copyright" aria-hidden="true"></i>
                       <a class="txt2" href=""> Code bởi Admin </a>
                    </div>
            </div>
        </div>
    </div>
    
</body>
</html>