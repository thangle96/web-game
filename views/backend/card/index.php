<?php

use App\Models\Card;
use App\Models\Users;
$user = new Users();
$card = new Card();
$list = $card->card_admin_index();
?>
<?php require_once('../views/backend/header.php'); ?>
<div class="content-wrapper my-2">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <strong  class='text-danger'>
                        DANH SÁCH TRANG ĐƠN
                    </strong>
                </div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-sm btn-success" href="index.php?option=card&cat=insert"><i class="fas fa-plus-circle"></i>Thêm</a>
                    <a class="btn btn-sm btn-danger" href="index.php?option=card&cat=trash"><i class="fas fa-trash"></i>Thùng rác</a>
                </div>
            </div>
        </div>
        <div class="card-body">
        <?php include_once('../views/backend/message.php') ?>
            <table id = "myTable" class="table table-triped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Số thẻ</th>
                        <th style="width:100px;">Mệnh giá</th>
                        <th style="width:100px;">Trạng thái</th>
                        <th class="text-center">Chức năng</th>
                        <th class="text-center" style="width: 20px;">ID</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($list as $row) : ?>
                    <tr>
                        <td><?php echo $row['seri']; ?></td>    
                        <td><?php echo number_format($row['menhgia']);?><sup>đ</sup></td>  
                        <?php if($row['status'] == '2') : ?>
                        <td><span class="badge badge-danger">đã sử dụng</span></td>
                        <?php else: ?>  
                            <td><span class="badge badge-success">chưa sử dụng</span></td>
                        <?php endif; ?>  

                        <td class="text-center" style="padding-top: 35px">
                            <?php if($row['status'] == 1) : ?>
                        <a class="btn btn-sm btn-success"
                         href="index.php?option=card&cat=status&id=<?php echo $row['id']; ?>"><i class="fas fa-toggle-on"></i></a>
                            <?php else: ?>
                        <a class="btn btn-sm btn-danger" 
                        href="index.php?option=card&cat=status&id=<?php echo $row['id']; ?>"><i class="fas fa-toggle-off"></i></a>
                            <?php endif; ?>
                        <a class="btn btn-sm btn-info" 
                        href="index.php?option=card&cat=update&id=<?php echo $row['id']; ?>"><i class="fas fa-edit"></i></a>
                        <a class="btn btn-sm btn-danger" 
                        href="index.php?option=card&cat=deltrash&id=<?php echo $row['id']; ?>"><i class="fas fa-trash"></i></a>
                        </td>
                        <td class="text-center"><?php echo $row['id']; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
<?php require_once('../views/backend/footer.php'); ?>
