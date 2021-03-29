<?php if(has_flash('message')) : 
    $tb = get_flash('message');
?>
<div class="alert alert-<?php echo $tb['type']; ?>"><?php echo $tb['msg']; ?></div>

<?php endif; ?>