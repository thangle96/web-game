<?php

use App\Models\Card;
use App\Models\Users;

$user = new Users();
$card = new Card();
$id = $_REQUEST['id'];
$row = $user->user_detail($id);


?>
<?php require_once("views/frontend/header.php"); ?>
<?php require_once("views/frontend/category.php"); ?>
<?php

//Xử lý nội dung
if (isset($_POST["GUI"])) {
    $pay = $card->get_card($_POST["seri"]);
    if ($pay['status'] == 2) {
       ?>
       <div class="container"><h1>card đã được sử dụng</h1></div>
       <?php
    } else {
        $data = array(
            'money' =>  $row['money'] + intval($pay['menhgia']),
        );
        $user->user_update($data, $id);
        $card->card_update($_POST["seri"]);
        header("Location: /index.php");
    }
}

?>
<section class="clearfix main mt-2">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form name="form1" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Seri</label>
                        <input type="text" name="seri" class="form-control" placeholder="Seri" required />
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