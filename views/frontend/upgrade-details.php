<?php

use App\Models\Users;

$user = new Users();
$id = $_REQUEST['id'];

$row = $user->user_detail($id);
?>
<?php require_once("views/frontend/header.php"); ?>
<?php require_once("views/frontend/category.php"); ?>
<?php
if ($row['money'] < 500000) {?>
    <script>
        alert("Bạn không đủ tiềnm, vui lòng nạp thêm");
        window.location = "index.php?option=customer-recharge&id=<?php echo $userde['id']; ?>";
    </script>
<?php
}
else{
    $user->card_update_dev($id);
    ?>
      <script>
        alert("Upgrade thành công");
        window.location = "index.php";
    </script>
    <?php
}
?>
<?php require_once("views/frontend/footer.php"); ?>