<?php

use App\Models\Menu;

$menu = new Menu();
 $id = $_REQUEST['id'];
 $row = $menu->menu_rowid($id);
 if($row == null){
    set_flash('message', array('type'=>'danger','msg'=> 'Mã không tồn tại'));
    redirect('index.php?option=menu');
 }
 $date = array(
     'status' => 0,
     'updated_at'=>date('Y-m-d H:i:s'),
     'updated_by'=>$_SESSION['userid']
 );
 $menu->menu_update($date, $id);


 set_flash('message', array('type'=>'success','msg'=> 'xóa vào thùng rác thành công'));
 redirect('index.php?option=menu');

 ?>