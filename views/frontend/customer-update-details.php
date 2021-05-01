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
        'fullname' => $_POST["fullname"],
        'email' => $_POST["email"],
        'phone' => $_POST["phone"],
        'gender' => $_POST["gender"],
    );
     //Xử lí hình
     $target_dir = "./public/images/";
     $target_file = $target_dir . basename($_FILES["img"]["name"]);
     $uploadOk = 1;
     $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));//lấy ra kiểu tập tin
     if(in_array($imageFileType, array('jpg','png','gift')))
     {
         //đưa tập tin lên sever
         move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
         //lưu file
         $data['img'] = $_FILES["img"]["name"];
     }else{
         $data['img'] = "defaul.png";
     }

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
                        <label>Họ và tên</label>
                        <input type="text" name="fullname" class="form-control" value="<?php echo $row['fullname'] ?>"placeholder="Họ tên" required />
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" value="<?php echo $row['email'] ?>"  placeholder="name@gmail.com" required />
                    </div>

                    <!-- giới tính -->
                    <div class="form-group">
                        <label style="font-weight: bold;">Giới tính</label>
                        <select name="gender" class="form-control" >
                            <option value="1" <?php echo ($row['gender'] == 1)?'selected' : ''; ?>>Nam</option>
                            <option value="2" <?php echo ($row['gender'] == 2)?'selected' : ''; ?> >Nữ</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Điện thoại</label>
                        <input type="text" name="phone" class="form-control" value="<?php echo $row['phone'] ?>" placeholder="Vd: 0123456789" required />
                    </div>
                    <div class="form-group">
                    <label style="font-weight: bold;">Ảnh</label>
                        <img width="340" height="300" src="./public/images/<?php echo $row['img'] ?>" alt="">
                        <input name="img" type="file" class="form-control"/>
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