<?php

session_start();
define('LTW', true);
require_once("../vendor/autoload.php");
require_once("../app/Helpers/functions.php");
use App\Library\Route;
if (isset($_SESSION['useradmin']) == false) {
	// Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
	header('Location: login.php');
}else {
	if (isset($_SESSION['permision']) == true) {
		// Ngược lại nếu đã đăng nhập
		$permission = $_SESSION['permision'];
		// Kiểm tra quyền của người đó có phải là admin hay không
		if ($permission == '0') {
			// Nếu không phải admin thì xuất thông báo
			echo "Bạn không đủ quyền truy cập vào trang này<br>";
			echo "<a href='http://localhost:81/NguyenThanhSang_2117110323/index.php?option=home'> Click để về lại trang chủ</a>";
			exit();
		}
	}
}
//$route = new Route(); //include
new Route('admin');
