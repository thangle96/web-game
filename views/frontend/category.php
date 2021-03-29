<?php
use App\Models\Category;

$category = new Category;
$cate = $category->category_list();
?>
<?php require_once ('header.php')?>
<body class="slider-collapse">

<div id="site-content">
    <div class="site-header">
        <div class="container">
            <a href="index.html" id="branding">
                <img src="../public/images/logo.png" alt="" class="logo">
                <div class="logo-text">
                    <h1 class="site-title">Company name</h1>
                    <small class="site-description">Tagline goes here</small>
                </div>
            </a> <!-- #branding -->

            <div class="right-section pull-right">
                <a href="cart.html" class="img-user"><img width="50px" height="50px" style="background-color: red"
                                                          src="" alt=""></a>
                <a href="#">Login/Register</a>
            </div> <!-- .right-section -->

            <div class="main-navigation">
                <button class="toggle-menu"><i class="fa fa-bars"></i></button>
                <ul class="menu">
                    <li class="menu-item home current-menu-item"><a href="index.php"><i class="icon-home"></i></a>
                    </li>
                    <?php foreach ($cate as $cate_value ):?>
                    <li class="menu-item"><a href="<?php echo $cate_value['slug']?>"><?php echo $cate_value['name'] ?></a></li>
                    <?php endforeach;?>
                </ul> <!-- .menu -->
                <div class="search-form">
                    <label><img src="../public/images/icon-search.png"></label>
                    <input type="text" placeholder="Search...">
                </div> <!-- .search-form -->

                <div class="mobile-navigation"></div> <!-- .mobile-navigation -->
            </div> <!-- .main-navigation -->
        </div> <!-- .container -->
    </div> <!-- .site-header -->