<?php

use App\Models\Menu;
use App\Models\Product;

$menu = new Menu();
$product = new Product;
$row_exist = $product->product_row(['slug' => str_slug(trim($_POST['name']))]);
//Thêm
if (isset($_POST['THEM'])) {
    $data = array(
        'parentid' => $_POST['parentid'],
        'name' => $_POST['name'],
        'link' => "index.php?option=product&cat=".str_slug(trim($_POST['name'])),
        'created_at' => date('Y-m-d H:i:s'),
        'created_by' => $_SESSION['userid'],
        'updated_at' => date('Y-m-d H:i:s'),
        'updated_by' => $_SESSION['userid'],
        'status' => $_POST['status']
    );
    $menu->menu_insert($data);
    set_flash('message', array('type'=>'success','msg'=> 'Thêm thành công'));
    redirect('index.php?option=menu');
}
//Update

if (isset($_POST['CAPNHAT'])) {
    $id = $_REQUEST['id'];
    $row = $menu->menu_rowid($id);
    if($row == null){
        set_flash('message', array('type'=>'danger','msg'=> 'Mã không tồn tại'));
        redirect('index.php?option=order');
     }
    $data = array(
        'parentid' => $_POST['parentid'],
        'name' => $_POST['name'],
        'link' => "index.php?option=product&cat=".str_slug(trim($_POST['name'])),
        'updated_at' => date('Y-m-d H:i:s'),
        'updated_by' => $_SESSION['userid'],
        'status' => $_POST['status']
    );
    $menu->menu_update($data, $id);
    set_flash('message', array('type'=>'success','msg'=> 'Thêm thành công'));
    redirect('index.php?option=menu');
}
