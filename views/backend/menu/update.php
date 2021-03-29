<?php

use App\Models\Menu;

$menu = new Menu();
$listmenu = $menu->menu_admin_index();
$id = $_REQUEST['id'];
$row = $menu->menu_rowid($id);
$strcat = '';
foreach($listmenu as $rowcat){
    if($row['parentid'] == $rowcat['id'])
    {
        $strcat .= "<option selected value='".$rowcat['id']."'>".$rowcat['name']."</option>";
    }else{
        $strcat .= "<option value='".$rowcat['id']."'>".$rowcat['name']."</option>";
    }
}
?>
<?php require_once('../views/backend/header.php'); ?>
<form action="index.php?option=menu&cat=process&id=<?php echo $row['id']; ?>" method="post" enctype="multipart/form-data">
<div class="content-wrapper my-2">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <strong class='text-danger'>
                        CẬP NHẬT TRANG ĐƠN
                    </strong>
                </div>
                <div class="col-md-6 text-right">
                <button name = "CAPNHAT" class="btn btn-sm btn-success"><i class="fas fa-plus-circle"></i>Lưu[Cập nhật]</button>
                    <a class="btn btn-sm btn-danger" href="index.php?option=menu"><i class="fas fa-trash"></i>Thoát</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                <div class="form-group">
                        <label style="font-weight: bold;">Tên Menu</label>
                        <input name="name" type="text" value="<?php echo $row['name'] ?>" class="form-control" placeholder="tên sản phẩm" required />
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold;">Menu cha</label>
                        <select name="catid" class="form-control">
                            <option value="">[--Chọn--]</option>
                            <?php echo $strcat ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold;">Trạng thái</label>
                        <select name="status" class="form-control" >
                            <option value="1" <?php echo ($row['status'] == 1)?'selected' : ''; ?>>Xuất bản</option>
                            <option value="2" <?php echo ($row['status'] == 2)?'selected' : ''; ?> >Chưa xuất bản</option>
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