<?php

use App\Models\Customers;

session_start();
if(isset($_SESSION['useradmin']))
{
    header("location: index.php?option=home");
}
$user = new Customers();

?>
<!doctype html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<head>
    <title>Đăng nhập</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
</head>
<?php 
if(isset($_POST['DANGNHAP']))
{
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    $taikhoan = $user->user_row($username);
    if($taikhoan == null){
        $err = "Tên đăng nhập không tồn tại";
    }else {
        if($taikhoan['password'] == $password)
        {
            $_SESSION['useradmin'] = $username;
            $_SESSION['fullname'] = $taikhoan['fullname'];
            $_SESSION['img'] = $taikhoan['img'];
            $_SESSION['userid'] = $taikhoan['id'];
            $_SESSION['permision'] = $taikhoan['access'];
            header("location: index.php?option=home");
        }else {
            $err = "Mật khẩu không chính xác";
        }
    }
}
?>
<body>
    <style>
        .khung {
            margin: auto;
            max-width: 600px;
            min-height: 200px;
            padding: 15px;
            border: 1px solid #ccc;
            
        }
    </style>
    <form action="" method="post" name="form1">
        <div class="khung mt-md-5">
            <h3 class='text-center'>ĐĂNG NHẬP NGƯỜI DÙNG</h3>
            <div class="form-group">
                <label for="">Tên đăng nhập</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="form-group">
                <label for="">Mật khẩu</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="text-center">
            <?php if(isset($err))
            {
                echo "<div class='alert alert-danger'>".$err."</div>";
            } ?></div>
            <div class="form-group text-right">
                <button type="submit" class="btn btn-success text-right" name="DANGNHAP">Đăng nhập </button>
                <a class="btn btn-info" href="index.php?option=customer-register">đăng ký</a>
            </div>
            
        </div>
    </form>
</body>

</html>