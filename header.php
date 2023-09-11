<?php
@ob_start();
session_start();
$session_id = session_id();

?>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "class/index_class.php";

Session::init();
$index = new index;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/responsive.scss">
    <link rel="icon" href="assets/img/2023-05-17 (2).png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/b94913fe08.js" crossorigin="anonymous"></script>
    <title>Cửa hàng bán quần áo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@200;300;400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
<div class="row">
        <header>
            <div class="header-nav row">
                <div class="logo">
                    <a href="index.php"><img src="assets/img/2023-05-18 (5).png" alt=""></a>
                </div>
                <div class="menu">
                <?php
                        $show_danhmuc = $index ->show_danhmuc();
                        if($show_danhmuc){while($result = $show_danhmuc ->fetch_assoc()) {
                            ?>
                     <li><a href="#"><?php echo $result['danhmuc_ten'] ?></a>
                         <ul class="sub-menu">
                                   <?php
                                      $danhmuc_id = $result['danhmuc_id'];
                                      $show_loaisanpham = $index ->show_loaisanpham($danhmuc_id);
                                      if($show_loaisanpham){while($result = $show_loaisanpham ->fetch_assoc()) {
                                    ?>
                             <li><a href="Subpage.php?loaisanpham_id=<?php echo $result['loaisanpham_id'] ?>" class="menu_li-a"><?php echo $result['loaisanpham_ten'] ?></a></li>
                    
                                    <?php
                                      } }
                                    ?>
                         </ul>
                     </li>
                <?php
                     } }
                ?>
                 <li><a href="news.php">Tin tức </a></li>
                 <li class="show_li"><a href="Show.php">Show thời trang </a></li>
                </div>
                <div class="others">
                    <li>
                        <form action="search.php" method="POST">
                            <input class="header__search-input" type="text" name="tukhoa" placeholder="Tìm kiếm sản phẩm">
                            <button class="header_search-button" type="submit" name="search_product" value="Tìm kiếm"> 
                            <i class="fa-solid fa-magnifying-glass" name= "timkiem" ></i>
                            </button>
                        </form>
                    </li>
                    <li class="bell_li"><i class="fa-solid fa-bell"></i></li>
                    <?php 
                     if(isset($_GET['register_id'])){
                        $delCart = $index->del_data_cart();
                        Session::destroy();
                     }
                    ?>

                    <?php 
                      $login_check = Session::get('register_login');
                      if($login_check== false){
                        echo '
                        <li id="register" class="header__navbar-item header__navbar-item--strong header__navbar-item--separate name_header_user-li">Đăng ký</li>
                        <li id="modal" class="header__navbar-item header__navbar-item--strong name_header_user-li">Đăng Nhập</li>
                        ';
                      }else { 
                        echo '
                        <li class="header__navbar-item header__navbar-user name_header_user-li">
                            <img src="assets/img/nau1.png" alt="" class="header__navbar-user-img">
                            <spam class="header__navbar-user-name">'.Session::get('register_name').'</spam>

                            <ul class="header__navbar-user-menu">
                                <li class="header__navbar-user-item">
                                    <a href="profile.php">Tài khoản của tôi</a>
                                </li>
                                <li class="header__navbar-user-item">
                                    <a href="">Địa chỉ của tôi</a>
                                </li>
                                <li class="header__navbar-user-item">
                                    <a href="detaill.php">Đơn hàng của tôi</a>
                                </li>
                                <li class="header__navbar-user-item header__navbar-user-item--separate">
                                    <a href="?register_id='.Session::get('register_id').'">Đăng xuất</a>
                                </li>
                            </ul>
                        </li>
                        ';
                      }
                    ?>
                    
                    <div class="register">
                        <div class="register__overlay">
                        </div>
                        <div class="register__body">

                          <?php 
                           if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])){
                               $insert_register = $index ->insert_register($_POST,$_FILES);
                               }
                          
                           ?>
                            <div class="auth-form">
                                <div class="auth-form__container">
                                    <form action="" method="POST" onsubmit="if(password.value!=re_password.value)  {alert('Mật khẩu không đúng ! Vui lòng kiểm tra lại.'); return false;}">
                                        <div class="auth-form__header">
                                            <h3 class="auth-form__heading">Đăng ký</h3>
                                            <?php 
                                              if(isset($insert_register)){
                                                echo $insert_register;
                                              }
                                            ?>
                                            <span id="registers-closes" class="auth-form__switch-btn">X</span>
                                        </div>
                                        <div class="auth-form__form">
                                            <div class="auth-form__group">
                                                <input type="text" name="name" class="auth-form__input"  placeholder="Nhập tên:">
                                            </div>
                                            <div class="auth-form__group">
                                                <input type="text" name="phone" class="auth-form__input"  placeholder="Số điện thoại:">
                                            </div>
                                            <div class="auth-form__group">
                                                <input type="email" name="email" class="auth-form__input"  placeholder="Email:">
                                            </div>
                                            <div class="auth-form__group-select">
                                             <div class="auth-form__group-option">
                                                <select name="customer_tinh" id="tinh_tp" class="auth-form_select" >
                                                <option value="#">Chọn Tỉnh/Tp</option>
                                                <?php
                                                    $show_diachi = $index -> show_diachi();
                                                    if($show_diachi){while($result = $show_diachi->fetch_assoc()){
                                                ?>
                                                    <option value="<?php echo $result['ma_tinh'] ?>"><?php echo $result['tinh_tp'] ?></option>
                                                <?php
                                                 }}
                                                 ?>
                                                </select>
                                             </div>
                                             <div class="auth-form__group-customer">
                                                <select name="customer_huyen" id="quan_huyen" class="auth-form_select" >
                                                <option value="#">Chọn Quận/Huyện</option> 
                                                </select>
                                             </div>
                                            </div>
                                            <div class="auth-form__group">
                                                <select name="customer_xa" id="phuong_xa" class="auth-form_select" >
                                                <option value="#">Chọn Phường/Xã</option>
                                                </select>
                                            </div>
                                            <div class="auth-form__group">
                                                <input type="text" name="address" class="auth-form__input"  placeholder="Địa chỉ:">
                                            </div>
                                            <div class="auth-form__group">
                                                <input type="password" name="password" class="auth-form__input"  placeholder="password:">
                                            </div>
                                            <div class="auth-form__group">
                                                <input type="password" name="re_password" class="auth-form__input"  placeholder="Nhập lại password:">
                                            </div>
                                           
                                        </div>
                                        <div class="auth-form__aside">
                                            <p class="auth-form__policy-text">
                                                Bằng việc đăng ký, bạn đồng ý với Shop về
                                                <a href="" class="auth-form__text-link">Điều khoản dịch vụ</a> &
                                                <a href="" class="auth-form__text-link">Chính sách bảo mật</a>
                                            </p>
                                        </div>
                                        <div class="auth-form__controls">
                                            <button id="register-close" class="btn btn--normal auth-form__controls-back ">TRỞ LẠI</button>
                                            <button class="btn btn--primary" name="register">ĐĂNG KÝ</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="auth-form__socials">
                                    <a href="" class=" btn auth-form__socials--facebook btn--size-s btn--with-ion">
                                        <i class="auth-form__socials-icon fa-brands fa-square-facebook"></i>
                                        <span class="auth-form__socials-title">Kết nối với Facebook</span>
                                    </a>
                                    <a href="" class="auth-form__socials--google btn btn--size-s btn--with-ion">
                                        <img src="assets/img/google1.png" alt="" class="auth-form__socials-img">

                                        <span class="auth-form__socials-title">Kết nối với Google</span>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                    <div class="modal">
                        <div class="modal__overlay">
                        </div>
                        <div class="modal__body">
                            <?php 
                           if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])){
                               $login_register = $index ->login_register($_POST);
                               }
                          
                           ?>
                            <div class="auth-form">
                                <div class="auth-form__container">
                                    <form action="" method="POST">
                                        <div class="auth-form__header">
                                            <h3 class="auth-form__heading">Đăng nhập</h3>
                                            <?php 
                                              if(isset($login_register)){
                                                echo $login_register;
                                              }
                                            ?>
                                        </div>
                                        <div class="auth-form__form">
                                            <div class="auth-form__group">
                                                <input type="text" name="email" class="auth-form__input" placeholder="Nhập Email:">
                                            </div>
                                            <div class="auth-form__group">
                                                <input type="password" name="password" class="auth-form__input" placeholder="password:">
                                            </div>
                                        </div>
                                        <div class="auth-form__aside">
                                            <div class="auth-form__help">
                                                <a href="forgot.php" class="auth-form__help-link auth-form__help-forgot">Quên mật khẩu</a>
                                                <span class="auth-form__help-separate"></span>
                                                <a href="" class="auth-form__help-link">Cần trợ giúp ?</a>
                                            </div>
                                        </div>
                                        <div class="auth-form__controls">
                                            <button id="modal-close" class="btn btn--normal auth-form__controls-back ">TRỞ LẠI</button>
                                            <button class="btn btn--primary" name="login">ĐĂNG NHẬP</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="auth-form__socials">
                                    <a href="" class=" btn auth-form__socials--facebook btn--size-s btn--with-ion">
                                        <i class="auth-form__socials-icon fa-brands fa-square-facebook"></i>
                                        <span class="auth-form__socials-title">Đăng nhập Facebook</span>
                                    </a>
                                    <a href="" class="auth-form__socials--google btn btn--size-s btn--with-ion">
                                        <img src="assets/img/google1.png" alt="" class="auth-form__socials-img">
                                        <span class="auth-form__socials-title">Đăng nhập Google</span>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                    <li class="header__cart"><i class="fa-solid fa-cart-shopping"></i>
                        <span class="header__cart-notice"><?php  if(Session::get('SL'))  {
                            echo Session::get('SL'); }else {echo '0';} ?></span>
                        
                        <?php 
                         $session_id = session_id();
                         $show_cart = $index -> show_cartF($session_id);
                         if($show_cart) 
                            {
                        ?>
                        <div class="header__cart-list ">
                            <div class="cart_header">
                                <h4 class="header__cart-heading">Sản phẩm đã được thêm</h4>
                                <ul class="header__cart-list-item">
                                    <?php 
                                $session_id = session_id();
                                $show_cartF = $index -> show_cartF($session_id);
                                if($show_cartF){while($result = $show_cartF->fetch_assoc()){
                                
                                 ?>
                                    <li class="header__cart-item">
                                        <img src="<?php echo $result['sanpham_anh']  ?>" alt="" class="header__cart-img">
                                        <div class="header__cart-item-info">
                                            <div class="header__cart-item-head">
                                                <h5 class="header__cart-item-name"><?php echo $result['sanpham_tieude']  ?></h5>
                                                <div class="header__cart-item-price-wrap">
                                                    <span class="header__cart-item-price"><?php $resultC = number_format($result['sanpham_gia']); echo $resultC ?><sup>đ</sup></span>
                                                    <span class="header__cart-item-multiply">x</span>
                                                    <span class="header__cart-item-qnt"><?php echo $result['quantitys']  ?></span>
                                                </div>
                                            </div>
                                            <div class="header__cart-item-body">
                                                <span class="header__cart-item-description">Màu sắc: <img src="<?php echo $result['color_anh']  ?>" alt=""> </span>
                                                <span class="header__cart-item-remove">Size: <?php echo $result['sanpham_size']  ?></span>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                     }}
                                    ?>
                                </ul>
                                <a href="cart.php" class="header__cart-view-cart btn btn--primary">Xem giỏ hàng</a>
                            </div>
                        </div>
                        <?php 
                         } else {echo ' <div class="header__cart-list header__cart-list--no-cart">
                            <!-- ==========  Chưa có sản phẩm =========== -->
                            <img src="assets/img/gio trong2.png" alt="" class="header__cart-no-cart-img">
                            <span class="header__cart-list-no-cart-msg">
                         Chưa có sản phẩm
                         </span>';}
                        ?>

                    </li>
                </div>
            </div>
        </header>
    </div>