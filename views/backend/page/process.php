<?php

use App\Models\Page;
use App\Models\Product;
$product = new Product();
$page = new Page();
$row_exist = $product->product_row(['slug' => str_slug(trim($_POST['name']))]);
//Thêm
if (isset($_POST['THEM'])) {
    $data = array(
        'topid' => $_POST['topid'],
        'title' => $_POST['name'],
        'slug' => str_slug(trim($_POST['name'])),
        'metakey' => 'từ khóa SEO',
        'metadesc' => 'từ khóa SEO',
        'created_at' => date('Y-m-d H:i:s'),
        'created_by' => $_SESSION['userid'],
        'updated_at' => date('Y-m-d H:i:s'),
        'updated_by' => $_SESSION['userid'],
        'status' => $_POST['status']
    );
    //Xử lí hình
    $target_dir = "../public/images/page/";
    $target_file = $target_dir . basename($_FILES["img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));//lấy ra kiểu tập tin
    if(in_array($imageFileType, array('jpg','png','gift')))
    {
        //đưa tập tin lên sever
        move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
        //lưu file
        $data['img'] = $_FILES["img"]["name"];
    }else{
        $data['img'] = "defaul.png";
    }
    $page->page_insert($data);
    set_flash('message', array('type'=>'success','msg'=> 'Thêm thành công'));
    redirect('index.php?option=page');
}
//Update

if (isset($_POST['CAPNHAT'])) {
    $id = $_REQUEST['id'];
    $row = $page->page_rowid($id);
    if($row == null){
        set_flash('message', array('type'=>'danger','msg'=> 'Mã không tồn tại'));
        redirect('index.php?option=page');
     }
    $data = array(
        'topid' => $_POST['topid'],
        'title' => $_POST['name'],
        'slug' => str_slug(trim($_POST['name'])),
        'metakey' => 'từ khóa SEO',
        'metadesc' => 'từ khóa SEO',
        'updated_at' => date('Y-m-d H:i:s'),
        'updated_by' => $_SESSION['userid'],
        'status' => $_POST['status']
    );
    //Xử lí hình
    $target_dir = "../public/images/page/";
    $target_file = $target_dir . basename($_FILES["img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));//lấy ra kiểu tập tin
    if(in_array($imageFileType, array('jpg','png','gift')))
    {
        if(file_exists($target_dir.$row['img'])){
            unlink($target_dir.$row['img']);
        }
        
        //đưa tập tin lên sever
        move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
        //lưu file
        $data['img'] = $_FILES["img"]["name"];
    }
    $page->page_update($data, $id);
    set_flash('message', array('type'=>'success','msg'=> 'Cập nhật thành công'));
    redirect('index.php?option=page');
}
