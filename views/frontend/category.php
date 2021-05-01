<?php

use App\Models\Category;
use App\Models\Users;

session_start();
$category = new Category;
$cate = $category->category_list();
$user = new Users();
?>
<?php require_once('header.php') ?>

<body class="slider-collapse">

    <div id="site-content">
        <div class="site-header">
            <div class="container">
                <a href="index.php" id="branding">
                    <img src="../public/images/logo.png" alt="" class="logo">
                    <div class="logo-text">
                        <h1 class="site-title">Company name</h1>
                        <small class="site-description">Tagline goes here</small>
                    </div>
                </a> <!-- #branding -->

                <div class="right-section pull-right">
                    <?php if (isset($_SESSION['useradmin'])) : ?>
                        <?php $id = $_SESSION['userid'];
                        $userde = $user->user_detail($id); ?>
                        <?php if ($userde['access'] == 0) : ?>
                            <a href="index.php?option=customer-update&id=<?php echo $userde['id']; ?>" class="img-user"><img width="50px" height="50px" src="./public/images/<?php echo $userde['img'] ?>" alt=""></a><br>
                            <a href="index.php?option=customer-update&id=<?php echo $userde['id']; ?>" class="text-white">xin chào : <?php echo $userde['fullname']; ?> </a><br>
                            <a href="index.php?option=customer-recharge&id=<?php echo $userde['id']; ?>">Số tiền: <?php echo $userde['money'] ?></a><br>
                            <a href="index.php?option=customer-recharge&id=<?php echo $userde['id']; ?>">Nạp tiền</a><br>
                            <a href="index.php?option=customer-password&id=<?php echo $userde['id']; ?>">Đổi mật khẩu</a><br>
                            <a href="index.php?option=upgrade&id=<?php echo $userde['id']; ?>">Upgrade</a><br>
                            <a href="index.php?option=customer-logout" class="btn btn-outline-danger">Logout</a>
                        <?php elseif ($userde['access'] == 2) : ?>
                            <a href="index.php?option=customer-update&id=<?php echo $userde['id']; ?>" class="img-user"><img width="50px" height="50px" src="./public/images/<?php echo $userde['img'] ?>" alt=""></a><br>
                            <a href="index.php?option=customer-update&id=<?php echo $userde['id']; ?>" class="text-white">xin chào : <?php echo $userde['fullname']; ?> </a><br>
                            <a href="index.php?option=customer-recharge&id=<?php echo $userde['id']; ?>">Số tiền: <?php echo $userde['money'] ?></a><br>
                            <a href="index.php?option=customer-recharge&id=<?php echo $userde['id']; ?>">Nạp tiền</a><br>
                            <a href="index.php?option=customer-password&id=<?php echo $userde['id']; ?>">Đổi mật khẩu</a><br>
                            <a href="index.php?option=upload&id=<?php echo $userde['id']; ?>">Đăng ứng dụng</a><br>
                            <a href="index.php?option=customer-logout" class="btn btn-outline-danger">Logout</a>
                        <?php else :?>
                            <a href="index.php?option=customer-update&id=<?php echo $userde['id']; ?>" class="img-user"><img width="50px" height="50px" src="./public/images/<?php echo $userde['img'] ?>" alt=""></a><br>
                            <a href="index.php?option=customer-update&id=<?php echo $userde['id']; ?>" class="text-white">xin chào : <?php echo $userde['fullname']; ?> </a><br>
                            <a href="index.php?option=customer-recharge&id=<?php echo $userde['id']; ?>">Số tiền: <?php echo $userde['money'] ?></a><br>
                            <a href="index.php?option=customer-recharge&id=<?php echo $userde['id']; ?>">Nạp tiền</a><br>
                            <a href="index.php?option=customer-password&id=<?php echo $userde['id']; ?>">Đổi mật khẩu</a><br>
                            <a href="admin">Quản trị</a><br>
                            <a href="index.php?option=customer-logout" class="btn btn-outline-danger">Logout</a>
                        <?php endif; ?>
                    <?php else : ?>
                        <a href="index.php?option=customer-login">Login/Register</a>
                    <?php endif; ?>
                </div> <!-- .right-section -->

                <div class="main-navigation">
                    <button class="toggle-menu"><i class="fa fa-bars"></i></button>
                    <ul class="menu">
                        <li class="menu-item home current-menu-item"><a href="index.php"><i class="icon-home"></i></a>
                        </li>
                        <?php foreach ($cate as $cate_value) : ?>
                            <li class="menu-item"><a href="index.php?option=product&cat=<?php echo $cate_value['slug'] ?>"><?php echo $cate_value['name'] ?></a></li>
                        <?php endforeach; ?>
                    </ul> <!-- .menu -->
                    <div class="search-form">
                        <label><img src="../public/images/icon-search.png"></label>
                        <input type="text" placeholder="Search...">
                    </div> <!-- .search-form -->

                    <div class="mobile-navigation"></div> <!-- .mobile-navigation -->
                </div> <!-- .main-navigation -->
            </div> <!-- .container -->
        </div> <!-- .site-header -->