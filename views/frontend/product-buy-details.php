<?php

use App\Models\Product;
use App\Models\Users;

session_start();
$user = new Users();

$id = $_SESSION['userid'];
$userde = $user->user_detail($id);
$product = new Product();
$pro = $product->product_rowid($_REQUEST['id']);
require_once("views/frontend/category.php");
?>
<div class="container">
<h1><a href="index.php">Quay về trang chủ</a></h1></div>

<?php if (($userde['money'] - $pro['price']) > 0) : ?>
    <?php $data = array(
        'money' => ($userde['money'] - $pro['price']),
    );
    $user->user_update($data, $id);
    ?>
    <script>
        alert("mua thành công");
        window.location = "../public/file/<?php echo $pro['slug']; ?>";
    </script>
<?php else : ?>
    <script>
        alert("Bạn không đủ tiền");
        window.location = "index.php";
    </script>
<?php endif; ?>
