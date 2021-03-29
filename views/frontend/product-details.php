<?php
require_once('views/frontend/category.php');

use App\Models\Product;

$product = new Product();
$id = $_GET['id'];
$prod = $product->product_detail($id);
$row_cat = $product->product_cat_name($id);
$pros = $product->product_similiar($id);

?>

?>
<div class="breadcrumbs">
    <div class="container">
        <a href="index.php">Home</a>
        <a href="products.html"><?php echo $row_cat['name'] ?></a>
        <span>Need for Speed Rivals</span>
    </div>
</div>
</div> <!-- .container -->
</div> <!-- .site-header -->

<main class="main-content">
    <div class="container">
        <div class="page">
            <?php foreach ($prod as $pro) : ?>
                <div class="entry-content">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <div class="product-images">
                                <figure class="large-image">
                                    <a><img src="public/dummy/<?php echo $pro['img'] ?>"></a>
                                </figure>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-8">
                            <h2 class="entry-title"><?php echo $pro['name'] ?></h2>
                            <small class="price">$<?php echo $pro['price'] ?></small>

                            <p><?php echo $pro['detail'] ?></p>

                            <div class="addtocart-bar">
                                <?php if ($pro['price'] == 0): ?>
                                    <form action="#">
                                        <input type="submit" value="Download">
                                    </form>
                                <?php else: ?>
                                    <form action="#">
                                        <input type="submit" value="Buy">
                                    </form>
                                <?php endif; ?>

                                <div class="social-links square">
                                    <strong>Share</strong>
                                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                                    <a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <section>
                <header>
                    <h2 class="section-title">Similiar Product</h2>
                </header>
                <div class="product-list">
                    <?php foreach ($pros as $prosi) : ?>
                        <div class="product">
                            <div class="inner-product">
                                <div class="figure-image">
                                    <img src="public/dummy/<?php echo $prosi['img'] ?>"
                                         alt="<?php echo $prosi['img'] ?>">
                                </div>
                                <h3 class="product-title"><a href="#"><?php echo $prosi['name'] ?></a></h3>
                                <small class="price">$<?php echo $prosi['price'] ?></small>
                                <p><?php echo substr($prosi['detail'], 0, 30) ?> ...</p>
                                <?php if ($prosi['price'] == 0) : ?>
                                    <a href="#" class="button">Download</a>
                                    <a href="index.php?option=product&id=<?php echo $prosi['id']; ?>" class="button muted">Read Details</a>
                                <?php else: ?>
                                    <a href="#" class="button">Buy</a>
                                    <a href="index.php?option=product&id=<?php echo $prosi['id']; ?>" class="button muted">Read Details</a>
                                <?php endif; ?>
                            </div>
                        </div> <!-- .product -->
                    <?php endforeach; ?>
                </div> <!-- .product-list -->
            </section>


        </div>
    </div> <!-- .container -->
</main> <!-- .main-content -->

<div class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="widget">
                    <h3 class="widget-title">Information</h3>
                    <ul class="no-bullet">
                        <li><a href="#">Site map</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div> <!-- .widget -->
            </div> <!-- column -->
            <div class="col-md-2">
                <div class="widget">
                    <h3 class="widget-title">Consumer Service</h3>
                    <ul class="no-bullet">
                        <li><a href="#">Secure</a></li>
                        <li><a href="#">Shipping &amp; Returns</a></li>
                        <li><a href="#">Shipping</a></li>
                        <li><a href="#">Orders &amp; Returns</a></li>
                        <li><a href="#">Group Sales</a></li>
                    </ul>
                </div> <!-- .widget -->
            </div> <!-- column -->
            <div class="col-md-2">
                <div class="widget">
                    <h3 class="widget-title">My Account</h3>
                    <ul class="no-bullet">
                        <li><a href="#">Login/Register</a></li>
                        <li><a href="#">Settings</a></li>
                        <li><a href="#">Cart</a></li>
                        <li><a href="#">Order Tracking</a></li>
                        <li><a href="#">Logout</a></li>
                    </ul>
                </div> <!-- .widget -->
            </div> <!-- column -->
            <div class="col-md-6">
                <div class="widget">
                    <h3 class="widget-title">Join our newsletter</h3>
                    <form action="#" class="newsletter-form">
                        <input type="text" placeholder="Enter your email...">
                        <input type="submit" value="Subsribe">
                    </form>
                </div> <!-- .widget -->
            </div> <!-- column -->
        </div><!-- .row -->

        <div class="colophon">
            <div class="copy">Copyright 2014 Company name. Designed by Themezy. All rights reserved.</div>
            <div class="social-links square">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-google-plus"></i></a>
                <a href="#"><i class="fa fa-pinterest"></i></a>
            </div> <!-- .social-links -->
        </div> <!-- .colophon -->
    </div> <!-- .container -->
</div> <!-- .site-footer -->
</div>

<div class="overlay"></div>

<div class="auth-popup popup">
    <a href="#" class="close"><i class="fa fa-close"></i></a>
    <div class="row">
        <div class="col-md-6">
            <h2 class="section-title">Login</h2>
            <form action="#">
                <input type="text" placeholder="Username...">
                <input type="password" placeholder="Password...">
                <input type="submit" value="Login">
            </form>
        </div> <!-- .column -->
        <div class="col-md-6">
            <h2 class="section-title">Create an account</h2>
            <form action="#">
                <input type="text" placeholder="Username...">
                <input type="text" placeholder="Email address...">
                <input type="submit" value="register">
            </form>
        </div> <!-- .column -->
    </div> <!-- .row -->
</div> <!-- .auth-popup -->

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/app.js"></script>

</body>

</html>