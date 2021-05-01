<?php

use App\Models\Card;
$card = new Card();
//Thêm
if (isset($_POST['THEM'])) {
    $data = array(
        'seri' => $_POST['code'],
        'menhgia' => $_POST['deliveryname']
    );
    $card->card_insert($data);
    set_flash('message', array('type'=>'success','msg'=> 'Thêm thành công'));
    redirect('index.php?option=card');
}
//Update

if (isset($_POST['CAPNHAT'])) {
    $id = $_REQUEST['id'];
    $row = $card->card_rowid($id);
    if($row == null){
        set_flash('message', array('type'=>'danger','msg'=> 'Mã không tồn tại'));
        redirect('index.php?option=order');
     }
    $data = array(
        'seri' => $_POST['code'],
        'menhgia' => $_POST['deliveryname']
    );
    $card->card_admin_update($data, $id);
    set_flash('message', array('type'=>'success','msg'=> 'Cập nhật thành công'));
    redirect('index.php?option=card');
}
