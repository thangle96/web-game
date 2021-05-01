<?php
use App\Models\Users;
$user = new Users();
$id = $_REQUEST['id'];
$row = $user->user_detail($id);

?>
<?php require_once("views/frontend/header.php"); ?>
<?php
//Xử lý nội dung
if (isset($_POST["GUI"])) {
    $data = array(
        'password' => sha1($_POST["password"]),
    );
    $user->user_update($data,$id);
    header("Location: /index.php");
}

?>
<section class="clearfix main mt-2">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form name="form1" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Mật khẩu mới</label>
                        <input type="text" name="password" class="form-control" placeholder="Nhập mật khẩu mới" required />
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info" name="GUI" value="Gửi"><i class="far fa-paper-plane"></i>GỬI</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
        </div>

    </div>
</section>
<?php require_once("views/frontend/footer.php"); ?>