<?php

use App\Models\Category;

$category = new Category();
 $id = $_REQUEST['id'];
 $row = $category->category_rowid($id);
 if($row == null){
    set_flash('message', array('type'=>'danger','msg'=> 'Mã không tồn tại'));
    redirect('index.php?option=category&cat=trash');
 }

 $category->category_delete($id);
 set_flash('message', array('type'=>'success','msg'=> 'Xóa thành công'));
 redirect('index.php?option=category&cat=trash');

 ?>