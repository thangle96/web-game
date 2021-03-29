<?php

use App\Models\Contact;

$contact = new Contact();
$list = $contact->contact_admin_index();
?>
<?php require_once('../views/backend/header.php'); ?>
<div class="content-wrapper my-2">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <strong class='text-danger'>
                        DANH SÁCH SẢN PHẨM
                    </strong>
                </div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-sm btn-danger" href="index.php?option=contact&cat=trash"><i class="fas fa-trash"></i>Thùng rác</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <?php include_once('../views/backend/message.php') ?>
            <table id="myTable" class="table table-triped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Tiêu đề liên hệ</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Điện thoại</th>
                        <th class="text-center">Trạng thái</th>
                        <th class="text-center">chức năng</th>
                        <th class="text-center" style="width: 20px;">ID</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list as $row) : ?>
                        <tr>
                            <td><?php echo $row['detail']; ?></td>
                            <td><?php echo $row['fullname']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <?php if ($row['status'] == 1) : ?>
                                <td> <span class="badge badge-danger">Chưa trả lời</span></td>
                            <?php else : ?>
                                <td> <span class="badge badge-success">Đã trả lời</span></td>
                            <?php endif; ?>
                            <td class="text-center" style="padding-top: 35px">
                                <?php if ($row['status'] == 1) : ?>
                                    <a class="btn btn-sm btn-success" href="index.php?option=contact&cat=update&id=<?php echo $row['id']; ?>"><i class="fas fa-toggle-on"></i>trả lời</a>
                                <?php else : ?>
                                    <a class="btn btn-sm btn-danger" href="index.php?option=contact&cat=status&id=<?php echo $row['id']; ?>"><i class="fas fa-toggle-off"></i></a>
                                <?php endif; ?>
                                <a class="btn btn-sm btn-danger" href="index.php?option=contact&cat=deltrash&id=<?php echo $row['id']; ?>"><i class="fas fa-trash"></i></a>
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
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
<?php require_once('../views/backend/footer.php'); ?>