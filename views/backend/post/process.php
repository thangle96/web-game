<?php

use App\Models\Post;

$post = new Post();


//Thêm
if (isset($_POST['THEM'])) {
    $data = array(
        'topid' => $_POST['topid'],
        'title' => $_POST['name'],
        'slug' => $_POST['name'],
        'detail' => $_POST['detail'],
        'type' => 1,
        'metakey' => $_POST['metakey'],
        'metadesc' => $_POST['metadesc'],
        'created_at' => date('Y-m-d H:i:s'),
        'created_by' => $_SESSION['userid'],
        'updated_at' => date('Y-m-d H:i:s'),
        'updated_by' => $_SESSION['userid'],
        'status' => $_POST['status']
    );
    //Xử lí hình
    $target_dir = "../public/images/post/";
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
    $post->post_insert($data);
    set_flash('message', array('type'=>'success','msg'=> 'Thêm thành công'));
    redirect('index.php?option=post');
}
//Update

if (isset($_POST['CAPNHAT'])) {
    $id = $_REQUEST['id'];
    $row = $post->post_rowid($id);
    if($row == null){
        set_flash('message', array('type'=>'danger','msg'=> 'Mã không tồn tại'));
        redirect('index.php?option=post');
     }
    $data = array(
        'topid' => $_POST['topid'],
        'title' => $_POST['title'],
        'slug' => $_POST['title'],
        'detail' => $_POST['detail'],
        'type' => 1,
        'metakey' => $_POST['metakey'],
        'metadesc' => $_POST['metadesc'],
        'updated_at' => date('Y-m-d H:i:s'),
        'updated_by' => $_SESSION['userid'],
        'status' => $_POST['status']
    );
    //Xử lí hình
    $target_dir = "../public/images/post/";
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
    $post->post_update($data, $id);
    set_flash('message', array('type'=>'success','msg'=> 'Cập nhật thành công'));
    redirect('index.php?option=post');
}