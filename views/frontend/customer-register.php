<?php

use App\Models\Users;

$user = new Users();
?>
<?php require_once("views/frontend/header.php"); ?>
<?php
//Xử lý nội dung
if (isset($_POST["GUI"])) {
    $data = array(
        'fullname' => $_POST["fullname"],
        'email' => $_POST["email"],
        'username' => $_POST["username"],
        'password' => sha1($_POST["password"]),
        'phone' => $_POST["phone"],
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
        'updated_by' => 1,
        'access' => 0,
        'status' => 1
    );
    $user->user_insert($data);
    ?>
    <script>
        alert("Đăng ký thành công");
        window.location = "index.php?option=customer-login";
    </script>
    <?php
}

?>
<section class="clearfix main mt-2">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1> Đăng ký </h1>
                <form name="form1" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Họ và tên</label>
                        <input type="text" name="fullname" class="form-control" placeholder="Họ tên" required />
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" placeholder="name@gmail.com" required />
                    </div>
                    <div class="form-group">
                        <label>Tài Khoản</label>
                        <input type="text" name="username" class="form-control" placeholder="username" required />
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="text" name="password" class="form-control" placeholder="mật khẩu" required />
                    </div>

                    <div class="form-group">
                        <label>Điện thoại</label>
                        <input type="text" name="phone" class="form-control" placeholder="Vd: 0123456789" required />
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