<?php

use App\Models\Order;

$order = new Order();
 $id = $_REQUEST['id'];
 $row = $order->order_rowid($id);
 if($row == null){
    set_flash('message', array('type'=>'danger','msg'=> 'Mã không tồn tại'));
    redirect('index.php?option=order&cat=trash');
 }

 $order->order_delete($id);
 set_flash('message', array('type'=>'success','msg'=> 'Xóa thành công'));
 redirect('index.php?option=order&cat=trash');

 ?>