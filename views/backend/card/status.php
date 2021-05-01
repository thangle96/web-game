 <?php

    use App\Models\Card;

    $card = new Card;
    $id = $_REQUEST['id'];
    $row = $card->card_rowid($id);
    if ($row == null) {
        set_flash('message', array('type' => 'danger', 'msg' => 'Mã không tồn tại'));
        redirect('index.php?option=order');
    }
    $date = array(
        'status' => ($row['status'] == 1) ? 2 : 1
    );
    $card->card_admin_update($date, $id);


    set_flash('message', array('type' => 'success', 'msg' => 'Thay đổi thành công'));
    redirect('index.php?option=card');

    ?>