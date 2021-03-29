<?php

use App\Models\Contact;

$contact = new Contact();

//Trả lời
if (isset($_POST['TRALOI'])) {
    $id = $_REQUEST['id'];
    $row = $contact->contact_rowid($id);
    if($row == null){
        set_flash('message', array('type'=>'danger','msg'=> 'Mã không tồn tại'));
        redirect('index.php?option=order');
     }
    $data = array(
        'title' => $_POST['title'],
        'fullname' => $_POST['fullname'],
        'detail' => $_POST['detail'],
        'updated_at' => date('Y-m-d H:i:s'),
        'updated_by' => $_SESSION['userid'],
        'status' => 2
    );
    $contact->contact_update($data, $id);
    set_flash('message', array('type'=>'success','msg'=> 'Thêm thành công'));
    redirect('index.php?option=contact');
}
//Update
