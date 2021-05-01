<?php

use App\Models\Category;
use App\Models\Product;

$category = new Category();
$listCategory = $category->category_admin_index();
$product = new Product();
$strcat = '';
foreach ($listCategory as $rowcat) {
    $strcat .= "<option value='" . $rowcat['id'] . "'>" . $rowcat['name'] . "</option>";
}
?>
<?php require_once("views/frontend/header.php"); ?>
<?php require_once("views/frontend/category.php"); ?>
<?php
//Xử lý nội dung
if (isset($_POST["GUI"])) {
    $data = array(
        'catid' => $_POST['catid'],
        'name' => $_POST['name'],
        'detail' => $_POST['detail'],
        'number' => $_POST['number'],
        'price' => $_POST['price'],
        'pricesale' => $_POST['pricesale'],
        'metakey' => $_POST['metakey'],
        'metadesc' => $_POST['metadesc'],
        'created_at' => date('Y-m-d H:i:s'),
        'created_by' => $_SESSION['userid'],
        'updated_at' => date('Y-m-d H:i:s'),
        'updated_by' => $_SESSION['userid'],
        'status' => 2
    );
    //Xử lí hình
    $target_dir = "./public/images/";
    $target_file = $target_dir . basename($_FILES["img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); //lấy ra kiểu tập tin
    if (in_array($imageFileType, array('jpg', 'png', 'gift'))) {
        //đưa tập tin lên sever
        move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
        //lưu file
        $data['img'] = $_FILES["img"]["name"];
    } else {
        $data['img'] = "defaul.png";
    }

    //Xử lí file
    move_uploaded_file($_FILES['fileUpload']['tmp_name'], './public/file/' . $_FILES['fileUpload']['name']);
    echo "upload thành công <br/>";
    echo 'Dường dẫn: upload/' . $_FILES['fileUpload']['name'] . '<br>';
    echo 'Loại file: ' . $_FILES['fileUpload']['type'] . '<br>';
    echo 'Dung lượng: ' . ((int)$_FILES['fileUpload']['size'] / 1024) . 'KB';
    //lưu file
    $data['slug'] = $_FILES["fileUpload"]["name"];
    $product->product_insert($data);
?>
    <script>
        alert("Thêm thành công");
        window.location = "index.php";
    </script>
<?php
}

?>

<form name="form1" action="" method="post" enctype="multipart/form-data">
    <div class="content-wrapper my-2">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <strong class='text-danger'>
                            Đăng ứng ụng
                        </strong>
                    </div>
                    <div class="col-md-6 text-right">
                        <button type="submit" class="btn btn-info" name="GUI" value="Gửi"><i class="far fa-paper-plane"></i>GỬI</button>
                        <a class="btn btn-sm btn-danger" href="index.php"><i class="fas fa-trash"></i>Thoát</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label style="font-weight: bold;">Tên sản phẩm</label>
                            <input name="name" type="text" class="form-control" placeholder="tên sản phẩm" required />
                        </div>
                        <div class="form-group">
                            <label style="font-weight:bold;">Chi tiết sản phẩm</label>
                            <textarea name="detail" class="form-control" placeholder="Chi tiết sản phẩm" required></textarea>
                        </div>
                        <div class="form-group">
                            <label style="font-weight:bold;">Mô tả(SEO)</label>
                            <textarea name="metadesc" class="form-control" placeholder="Mô tả: 155kt" required></textarea>
                        </div>
                        <div class="form-group">
                            <label style="font-weight:bold;">Từ khóa(SEO)</label>
                            <textarea name="metakey" class="form-control" placeholder="Từ khóa,  khóa từ, từ từ" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label style="font-weight: bold;">Loại sản phẩm</label>
                            <select name="catid" class="form-control" required>
                                <option value="">[--Chọn loại--]</option>
                                <?php echo $strcat ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label style="font-weight: bold;">Số lượng</label>
                            <input name="number" type="number" class="form-control" value="1" min="1" />
                        </div>
                        <div class="form-group">
                            <label style="font-weight: bold;">Giá</label>
                            <input name="price" type="number" class="form-control" value="10000" min="10000" step="10000" />
                        </div>
                        <div class="form-group">
                            <label style="font-weight: bold;">Giá khuyến mãi</label>
                            <input name="pricesale" type="number" class="form-control" value="10000" min="10000" step="10000" />
                        </div>
                        <div class="form-group">
                            <label style="font-weight: bold;">Ảnh đại diện</label>
                            <input name="img" type="file" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label style="font-weight: bold;">File</label>
                            <input type="file" name="fileUpload" class="form-control" value="">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</form>
<?php require_once("views/frontend/footer.php"); ?>