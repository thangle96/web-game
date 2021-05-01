<?php

use App\Library\Phantrang;
use App\Models\Category;
use App\Models\Product;

$category = new Category();
$product = new Product();

$limit = 15;
$page = Phantrang::pageCurrent();
$offset = Phantrang::pageOffset($page, $limit);

$slug = $_REQUEST['cat'];
$row_cat = $category->category_slug($slug);
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
$list = $product->product_listcatid($parentid_array, $offset, $limit);
$total = $product->product_listcatid_count($parentid_array);
$page_link = Phantrang::pageLink($total, $page, $limit, $url = "index.php?option=product&cat=" . $row_cat['slug']);

?>
<?php require_once('views/frontend/category.php'); ?>

<?php if (count($list) != 0) : ?>
<div class="container">    
            <h2 class="text-black"><?php echo $row_cat['name']; ?></a> </h2>
            <div class="product-list">
                <?php foreach ($list as $pro) : ?>
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
                                <a href="../public/file/<?php echo$pro['slug'];?>" class="button">Download</a>
                            <?php else: ?>
                                <a href="index.php?option=product-buy&id=<?php echo $pro['id']; ?>" class="button">Buy</a>
                            <?php endif; ?>
                            <a href="index.php?option=product&id=<?php echo $pro['id']; ?>" class="button muted">Read Details</a>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        
    </div>
    <?php echo $page_link; ?>

<?php endif; ?>
<?php echo "Đang cập nhật" ?>
<?php require_once('views/frontend/footer.php'); ?>