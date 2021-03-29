<?php

use App\Models\Contact;

$contact = new Contact();
$listcontact = $contact->contact_admin_index();
$id = $_REQUEST['id'];
$row = $contact->contact_rowid($id);
$strcat = '';
?>
<?php require_once('../views/backend/header.php'); ?>
<form action="index.php?option=contact&cat=process&id=<?php echo $row['id']; ?>" method="post" enctype="multipart/form-data">
<div class="content-wrapper my-2">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <strong class='text-danger'>
                        Trả lời
                    </strong>
                </div>
                <div class="col-md-6 text-right">
                <button name = "TRALOI" class="btn btn-sm btn-success"><i class="fas fa-plus-circle"></i>Lưu[Thêm]</button>
                    <a class="btn btn-sm btn-danger" href="index.php?option=contact"><i class="fas fa-trash"></i>Thoát</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label style="font-weight: bold;">Chủ đề</label>
                        <input name="title" type="text" class="form-control"  value="<?php echo $row['title'] ?>" placeholder="mã đơn hàng" required />
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold;">Tên khác hàng</label>
                        <input name="fullname" type="text"  value="<?php echo $row['fullname'] ?>" class="form-control" placeholder="tên đơn hàng" required />
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold;">Nội dung</label>
                        <input name="detail" type="text" class="form-control"  value="<?php echo $row['detail'] ?>" placeholder="mã đơn hàng" required />
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold;">trả lời</label>
                        <input name="code" type="text" class="form-control"  placeholder="nội dung" required />
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