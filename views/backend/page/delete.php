<?php

use App\Models\Page;

$page = new page();
 $id = $_REQUEST['id'];
 $row = $page->page_rowid($id);
 if($row == null){
    set_flash('message', array('type'=>'danger','msg'=> 'Mã không tồn tại'));
    redirect('index.php?option=page&cat=trash');
 }

 $page->page_delete($id);
 set_flash('message', array('type'=>'success','msg'=> 'Xóa thành công'));
 redirect('index.php?option=page&cat=trash');

 ?>