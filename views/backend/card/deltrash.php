<?php

use App\Models\Card;
use App\Models\Order;

$card = new Card();
 $id = $_REQUEST['id'];
 $row = $card->card_rowid($id);
 if($row == null){
    set_flash('message', array('type'=>'danger','msg'=> 'Mã không tồn tại'));
    redirect('index.php?option=card');
 }
 $date = array(
     'status' => 0,
 );
 $card->card_admin_update($date, $id);
 set_flash('message', array('type'=>'success','msg'=> 'xóa vào thùng rác thành công'));
 redirect('index.php?option=card');

 ?>