<?php

use App\Models\Contact;

$contact = new Contact();
 $id = $_REQUEST['id'];
 $row = $contact->contact_rowid($id);
 if($row == null){
    set_flash('message', array('type'=>'danger','msg'=> 'Mã không tồn tại'));
    redirect('index.php?option=contact&cat=trash');
 }

 $contact->contact_delete($id);
 set_flash('message', array('type'=>'success','msg'=> 'Xóa thành công'));
 redirect('index.php?option=contact&cat=trash');

 ?>