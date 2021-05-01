<?php

use App\Models\Product;

$product = new Product();

$row_exist = $product->product_row(['slug' => str_slug(trim($_POST['name']))]);
//Thêm
if (isset($_POST['THEM'])) {
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
        'status' => $_POST['status']
    );
    //Xử lí hình
    $target_dir = "../public/images/";
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
    //lưu file
    $data['slug'] = $_FILES["fileUpload"]["name"];
    $product->product_insert($data);
    set_flash('message', array('type' => 'success', 'msg' => 'Thêm thành công'));
    redirect('index.php?option=product');
}
//Update

if (isset($_POST['CAPNHAT'])) {
    $id = $_REQUEST['id'];
    $row = $product->product_rowid($id);
    if ($row == null) {
        set_flash('message', array('type' => 'danger', 'msg' => 'Mã không tồn tại'));
        redirect('index.php?option=product');
    }
    $data = array(
        'catid' => $_POST['catid'],
        'name' => $_POST['name'],
        'detail' => $_POST['detail'],
        'number' => $_POST['number'],
        'price' => $_POST['price'],
        'pricesale' => $_POST['pricesale'],
        'metakey' => $_POST['metakey'],
        'metadesc' => $_POST['metadesc'],
        'updated_at' => date('Y-m-d H:i:s'),
        'updated_by' => $_SESSION['userid'],
        'status' => $_POST['status']
    );
    //Xử lí hình
    $target_dir = "../public/images/";
    $target_file = $target_dir . basename($_FILES["img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); //lấy ra kiểu tập tin
    if (in_array($imageFileType, array('jpg', 'png', 'gift'))) {
        if (file_exists($target_dir . $row['img'])) {
            unlink($target_dir . $row['img']);
        }

        //đưa tập tin lên sever
        move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
        //lưu file
        $data['img'] = $_FILES["img"]["name"];
    }

    $target_file_upload = "../public/file/";
    //Xử lí file

    $fileType = strtolower(pathinfo($target_file_upload . basename($_FILES['fileUpload']['name']), PATHINFO_EXTENSION));
    if (in_array($fileType, array('zip'))) {
        if (file_exists($target_file_upload . $row['slug'])) {
            unlink($target_file_upload . $row['slug']);
        }
        move_uploaded_file($_FILES['fileUpload']['tmp_name'], $target_file_upload . basename($_FILES['fileUpload']['name']));
        //lưu file
        $data['slug'] = $_FILES["fileUpload"]["name"];
    }
    $product->product_update($data, $id);
    set_flash('message', array('type' => 'success', 'msg' => 'Cập nhật thành công'));
    redirect('index.php?option=product');
}
