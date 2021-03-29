<?php

use App\Models\Contact;

$contact = new Contact();
?>
<?php require_once("views/frontend/header.php"); ?>
<?php
//Xử lý nội dung
if (isset($_POST["GUI"])) {
    $data = array(
        'fullname' => $_POST["fullname"],
        'email' => $_POST["email"],
        'phone' => $_POST["phone"],
        'title' => $_POST["title"],
        'detail' => $_POST["detail"],
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
        'updated_by' => 1,
        'status' => 1
    );
    $contact->contact_insert($data);
}

?>
<section class="clearfix main mt-2">
    <div class="container">
        <div class="row">
            <div class="col-md-6" style="text-align:center ;">
                <h1> BẢN ĐỒ </h1>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3918.1760090604125!2d106.7299601141172!3d10.87421396035625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1605954619841!5m2!1svi!2s" width="450" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>

            <div class="col-md-6">
                <h1> LIÊN HỆ VỚI CHÚNG TÔI </h1>
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
                        <label>Điện thoại</label>
                        <input type="text" name="phone" class="form-control" placeholder="Vd: 0123456789" required />
                    </div>

                    <div class="form-group">
                        <label>Chủ để liên hệ</label>
                        <input type="text" name="title" class="form-control" placeholder="Hỏi giá sỉ" required />
                    </div>

                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea name="detail" class="form-control" rows="3" placeholder="Nội dung" required> </textarea>
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