<?php
if(isset($_GET['admin_id'])){
    Session::destroyAdmin();
}
?>

<header class="app-header">
        <ul class="app-nav">
          <li><a class="app-nav__item"href="?admin_id=<?php echo Session::get('admin_id') ?>">
            <i class="bx fa-solid fa-right-from-bracket"></i> </a>
    
          </li>
        </ul>
      </header>

      <aside class="app-sidebar">
        <div class="app-sidebar__user">
            <img class="app-sidebar__user-avatar" src="./icon/AdmQ2.png" width="50px"
            alt="User Image">
          <div>

            <h3 class="app-sidebar__user-name"><?php echo Session::get('admin_User') ?></h3>
            <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
          </div>
        </div>
        <hr>
        <ul class="app-menu">
          <li><a class="app-menu__item haha" href="index.php"><i class="app-menu__icon bx fa-solid fa-cart-shopping"></i>
              <span class="app-menu__label">POS Bán Hàng</span></a></li>
          <li><a class="app-menu__item active" href="Sanphamlist.php">
                 <img class="app-menu__item-img" src="icon/article.png" alt="">
                <span class="app-menu__label">Quản lý sản phẩm</span></a>
          </li>
          <li><a class="app-menu__item" href="orderlistall.php">
            <img class="app-menu__item-img" src="icon/note.svg" alt="">
            <span class="app-menu__label">Quản lý đơn hàng</span></a></li>
          <li><a class="app-menu__item" href="binhluanAll.php">
          <img class="app-menu__item-img" src="icon/comments.png" alt="">
            <span class="app-menu__label">Quản lý bình luận</span></a></li>
            <li><a class="app-menu__item" href="rating.php">
          <img class="app-menu__item-img" src="icon/sao1.jpg" alt="">
            <span class="app-menu__label">Đánh giá sản phẩm </span></a></li>
            <li><a class="app-menu__item" href="wishlist.php">
          <img class="app-menu__item-img" src="icon/tim.jpg" alt="">
            <span class="app-menu__label">Sản phẩm yêu thích</span></a></li>
          <li><a class="app-menu__item" href="registerKH.php">
            <img class="app-menu__item-img" src="icon/KH1.png" alt="">
                <span class="app-menu__label">Khách hàng</span></a>
          </li>
          <li><a class="app-menu__item" href="statistical.php">
            <img class="app-menu__item-img" src="icon/dongho1.jpg" alt="">
                <span class="app-menu__label">Báo cáo doanh thu</span></a>
          </li>
          <li><a class="app-menu__item" href="slider.php">
            <img class="app-menu__item-img" src="icon/GF1.jpg" alt="">
                <span class="app-menu__label">Slider</span></a>
          </li>
        </ul>
      </aside>