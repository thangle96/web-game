<?php

use App\Models\Menu;

$menu = new Menu();
 $id = $_REQUEST['id'];
 $row = $menu->menu_rowid($id);
 if($row == null){
    set_flash('message', array('type'=>'danger','msg'=> 'Mã không tồn tại'));
    redirect('index.php?option=menu&cat=trash');
 }

 $menu->menu_delete($id);
 set_flash('message', array('type'=>'success','msg'=> 'Xóa thành công'));
 redirect('index.php?option=menu&cat=trash');

 ?>