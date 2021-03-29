<?php

use App\Models\Menu;

$menu = new Menu();
$listmenu = $menu->menu_admin_index();
$strcat = '';
foreach($listmenu as $rowcat){
    $strcat .= "<option value='".$rowcat['id']."'>".$rowcat['name']."</option>";
}
?>
<?php require_once('../views/backend/header.php'); ?>
<form action="index.php?option=menu&cat=process" method="post" enctype="multipart/form-data">
<div class="content-wrapper my-2">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <strong class='text-danger'>
                        THÊM SẢN PHẨM
                    </strong>
                </div>
                <div class="col-md-6 text-right">
                <button name = "THEM" class="btn btn-sm btn-success"><i class="fas fa-plus-circle"></i>Lưu[Thêm]</button>
                    <a class="btn btn-sm btn-danger" href="index.php?option=menu"><i class="fas fa-trash"></i>Thoát</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label style="font-weight: bold;">Tên danh mục</label>
                        <input name="name" type="text" class="form-control" placeholder="tên chủ đề" required />
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold;">Cấp cha</label>
                        <select name="parentid" class="form-control" >
                            <option value="">[--Chọn loại--]</option>
                            <?php echo $strcat ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold;">Trạng thái</label>
                        <select name="status" class="form-control" >
                            <option value="1">Xuất bản</option>
                            <option value="1">Chưa xuất bản</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</form>
<?php require_once('../views/backend/footer.php'); ?>