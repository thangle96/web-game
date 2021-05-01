<?php
use App\Models\Product;
use App\Models\Users;
$user = new Users();
$product = new Product();
$list = $product->product_admin_index();
?>
<?php require_once('../views/backend/header.php'); ?>
<div class="content-wrapper my-2">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <strong  class='text-danger'>
                        DANH SÁCH SẢN PHẨM
                    </strong>
                </div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-sm btn-success" href="index.php?option=product&cat=insert"><i class="fas fa-plus-circle"></i>Thêm</a>
                    <a class="btn btn-sm btn-danger" href="index.php?option=product&cat=trash"><i class="fas fa-trash"></i>Thùng rác</a>
                </div>
            </div>
        </div>
        <div class="card-body">
        <?php include_once('../views/backend/message.php') ?>
            <table id = "myTable" class="table table-triped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th style="width:100px;">Hình</th>
                        <th>Tên sản phẩm</th>
                        <th>Loài sản phẩm</th>
                        <th class="text-center">Chức năng</th>
                        <th class="text-center" style="width: 20px;">ID</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($list as $row) : ?>
                    <tr>
                        <th>
                            <img src="../public/images/<?php echo $row['img']; ?>" class="img-fluid" style="width:100px; height:100px;">
                        </th>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['catname']; ?></td>
                        <td class="text-center" style="padding-top: 35px">
                            <?php if($row['status'] == 1) : ?>
                        <a class="btn btn-sm btn-success"
                         href="index.php?option=product&cat=status&id=<?php echo $row['id']; ?>"><i class="fas fa-toggle-on"></i></a>
                            <?php else: ?>
                        <a class="btn btn-sm btn-danger" 
                        href="index.php?option=product&cat=status&id=<?php echo $row['id']; ?>"><i class="fas fa-toggle-off"></i></a>
                            <?php endif; ?>
                        <a class="btn btn-sm btn-info" 
                        href="index.php?option=product&cat=update&id=<?php echo $row['id']; ?>"><i class="fas fa-edit"></i></a>
                        <a class="btn btn-sm btn-danger" 
                        href="index.php?option=product&cat=deltrash&id=<?php echo $row['id']; ?>"><i class="fas fa-trash"></i></a>
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
