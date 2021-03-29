<?php

use App\Models\Product;

$product = new Product();
 $id = $_REQUEST['id'];
 $row = $product->product_rowid($id);
 if($row == null){
    set_flash('message', array('type'=>'danger','msg'=> 'Mã không tồn tại'));
    redirect('index.php?option=product&cat=trash');
 }

 $product->product_delete($id);
 set_flash('message', array('type'=>'success','msg'=> 'Xóa thành công'));
 redirect('index.php?option=product&cat=trash');

 ?>