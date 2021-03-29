<?php

use App\Models\Post;

$post = new Post();
 $id = $_REQUEST['id'];
 $row = $post->post_rowid($id);
 if($row == null){
    set_flash('message', array('type'=>'danger','msg'=> 'Mã không tồn tại'));
    redirect('index.php?option=post&cat=trash');
 }

 $post->post_delete($date, $id);
 set_flash('message', array('type'=>'success','msg'=> 'Xóa thành công'));
 redirect('index.php?option=post&cat=trash');

 ?>