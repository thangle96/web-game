<?php
use App\Models\Category;

$category = new Category;
$list_category = $category->category_parentid(0);
?>

<?php require_once('views/frontend/category.php'); ?>
    <main class="main-content">
        <div class="container">
            <?php foreach ($list_category as $row_cat) : ?>
                <?php require('product.php'); ?>
            <?php endforeach; ?>
        </div> <!-- .container -->
    </main> <!-- .main-content -->
<?php require_once('views/frontend/footer.php'); ?>