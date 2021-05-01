<?php

use App\Models\Card;

$card = new Card();
 $id = $_REQUEST['id'];
 $row = $card->card_rowid($id);
 if($row == null){
    set_flash('message', array('type'=>'danger','msg'=> 'Mã không tồn tại'));
    redirect('index.php?option=card&cat=trash');
 }

 $card->card_delete($id);
 set_flash('message', array('type'=>'success','msg'=> 'Xóa thành công'));
 redirect('index.php?option=card&cat=trash');
