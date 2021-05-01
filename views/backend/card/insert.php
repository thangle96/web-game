<?php

use App\Models\Card;
$card = new Card();
$listorder = $card->card_admin_index();
?>
<?php require_once('../views/backend/header.php'); ?>
<form action="index.php?option=card&cat=process" method="post" enctype="multipart/form-data">
<div class="content-wrapper my-2">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <strong class='text-danger'>
                        Thêm Thẻ nạp
                    </strong>
                </div>
                <div class="col-md-6 text-right">
                <button name = "THEM" class="btn btn-sm btn-success"><i class="fas fa-plus-circle"></i>Lưu[Thêm]</button>
                    <a class="btn btn-sm btn-danger" href="index.php?option=card"><i class="fas fa-trash"></i>Thoát</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label style="font-weight: bold;">Số thẻ</label>
                        <input name="code" type="text" class="form-control" value="<?php echo $card->generateCode(7)?>" required />
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold;">Mệnh giá</label>
                        <input name="deliveryname" type="text" class="form-control" placeholder="Mệnh giá" required />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</form>
<?php require_once('../views/backend/footer.php'); ?>