<?php

use App\Models\Topic;

$topic = new Topic();
 $id = $_REQUEST['id'];
 $row = $topic->topic_rowid($id);
 if($row == null){
    set_flash('message', array('type'=>'danger','msg'=> 'Mã không tồn tại'));
    redirect('index.php?option=topic&cat=trash');
 }

 $topic->topic_delete($date, $id);
 set_flash('message', array('type'=>'success','msg'=> 'Xóa thành công'));
 redirect('index.php?option=topic&cat=trash');

 ?>