<?php

use App\Models\Topic;

$topic = new Topic();


//Thêm
if (isset($_POST['THEM'])) {
    $data = array(
        'parentid' => $_POST['parentid'],
        'name' => $_POST['name'],
        'slug' => $_POST['name'],
        'orders' => 1,
        'metakey' => $_POST['metakey'],
        'metadesc' => $_POST['metadesc'],
        'created_at' => date('Y-m-d H:i:s'),
        'created_by' => $_SESSION['userid'],
        'updated_at' => date('Y-m-d H:i:s'),
        'updated_by' => $_SESSION['userid'],
        'status' => $_POST['status']
    );
    $topic->topic_insert($data);
    set_flash('message', array('type'=>'success','msg'=> 'Thêm thành công'));
    redirect('index.php?option=topic');
}
//Update

if (isset($_POST['CAPNHAT'])) {
    $id = $_REQUEST['id'];
    $row = $topic->topic_rowid($id);
    if($row == null){
        set_flash('message', array('type'=>'danger','msg'=> 'Mã không tồn tại'));
        redirect('index.php?option=product');
     }
    $data = array(
        'parentid' => $_POST['parentid'],
        'name' => $_POST['name'],
        'slug' => str_slug(trim($_POST['name'])),
        'orders' => 1,
        'updated_at' => date('Y-m-d H:i:s'),
        'updated_by' => $_SESSION['userid'],
        'status' => $_POST['status']
    );
    $topic->topic_update($data, $id);
    set_flash('message', array('type'=>'success','msg'=> 'Cập nhật thành công'));
    redirect('index.php?option=topic');
}