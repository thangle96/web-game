<?php

use App\Models\Category;

$category = new Category();
 $id = $_REQUEST['id'];
 $row = $category->category_rowid($id);
 if($row == null){
    set_flash('message', array('type'=>'danger','msg'=> 'Mã không tồn tại'));
    redirect('index.php?option=category&cat=trash');
 }
 $date = array(
     'status' => 2,
     'updated_at'=>date('Y-m-d H:i:s'),
     'updated_by'=>$_SESSION['userid']
 );
 $category->category_update($date, $id);


 set_flash('message', array('type'=>'success','msg'=> 'Khôi phục thành công'));
 redirect('index.php?option=category&cat=trash');

 ?>