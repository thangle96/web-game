<?php

use App\Models\Product;

$product = new Product();

$parentid_array = array();
$catid = $row_cat['id'];
array_push($parentid_array, $catid);
$list_cat2 = $category->category_parentid($catid);
foreach ($list_cat2 as $row_cat2) {
    array_push($parentid_array, $row_cat2['id']);
    $list_cat3 = $category->category_parentid($row_cat2['id']);
    foreach ($list_cat3 as $row_cat3) {
        array_push($parentid_array, $row_cat3['id']);
    }
}

$list_product = $product->product_home($parentid_array);
?>
<?php if (count($list_product) != 0) : ?>
    <div class="page">
        <section>
            <header>
                <h2 class="section-title"><?php echo $row_cat['name']; ?></h2>
                <a href="index.php?option=product&cat=<?php echo $row_cat['slug'] ?>" class="all">Show All</a>
            </header>

            <div class="product-list">
                <?php foreach ($list_product as $pro): ?>
                    <div class="product">
                        <div class="inner-product">
                            <div class="figure-image">
                                <a href="index.php?option=product&id=<?php echo $pro['id']; ?>"><img
                                            src="../public/dummy/<?php echo $pro['img']; ?>"
                                            alt="<?php echo $pro['img']; ?>"></a>
                            </div>
                            <h3 class="product-title"><a
                                        href="index.php?option=product&id=<?php echo $pro['id']; ?>"><?php echo substr($pro['name'], 0, 10); ?>
                                    ...</a></h3>
                            <small class="price">$<?php echo $pro['price']?></small>
                            <p><?php echo substr($pro['detail'], 0, 20) ?>...</p>
                            <?php if ($pro['price'] == 0) : ?>
                                <a href="cart.html" class="button">Download</a>
                            <?php else: ?>
                                <a href="cart.html" class="button">Buy</a>
                            <?php endif; ?>
                            <a href="index.php?option=product&id=<?php echo $pro['id']; ?>" class="button muted">Read Details</a>
                        </div>
                    </div> <!-- .product -->
                <?php endforeach; ?>
            </div> <!-- .product-list -->

        </section>
    </div>
<?php endif; ?>