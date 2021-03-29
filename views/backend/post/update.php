<?php

use App\Models\post;
use App\Models\Topic;
use App\Models\Users;
$topic = new Topic();
$user = new Users();
$post = new post();
$id = $_REQUEST['id'];
$row = $post->post_rowid($id);
$listtopic = $topic->topic_admin_index();
$strcat = '';
foreach($listtopic as $rowcat){
    if($row['topid'] == $rowcat['id'])
    {
        $strcat .= "<option selected value='".$rowcat['id']."'>".$rowcat['name']."</option>";
    }else{
        $strcat .= "<option value='".$rowcat['id']."'>".$rowcat['name']."</option>";
    }
    
}
?>
<?php require_once('../views/backend/header.php'); ?>
<form action="index.php?option=post&cat=process&id=<?php echo $row['id']; ?>" method="post" enctype="multipart/form-data">
<div class="content-wrapper my-2">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <strong class='text-danger'>
                        THÊM SẢN PHẨM
                    </strong>
                </div>
                <div class="col-md-6 text-right">
                <button name = "CAPNHAT" class="btn btn-sm btn-success"><i class="fas fa-plus-circle"></i>Lưu[Thêm]</button>
                    <a class="btn btn-sm btn-danger" href="index.php?option=post"><i class="fas fa-trash"></i>Thoát</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                <div class="form-group">
                        <label style="font-weight: bold;">Tên sản bài viết</label>
                        <input name="title" type="text" value="<?php echo $row['title'] ?>" class="form-control" placeholder="tên sản phẩm" required />
                    </div>
                    <div class="form-group">
                        <label style="font-weight:bold;">Mô tả(SEO)</label>
                        <textarea name="metadesc" class="form-control" placeholder="Mô tả: 155kt" required><?php echo $row['metadesc'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label style="font-weight:bold;">Từ khóa(SEO)</label>
                        <textarea name="metakey" class="form-control" placeholder="Từ khóa,  khóa từ, từ từ" required><?php echo $row['metakey'] ?></textarea>
                    </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
                        <label style="font-weight: bold;">post</label>
                        <select name="catid" class="form-control">
                            <option value="">[--Chọn loại--]</option>
                            <?php echo $strcat ?>
                        </select>
                    </div>
                    <label style="font-weight: bold;">Ảnh sản phẩm</label>
                        <img width="340" height="300" src="../public/images/post/<?php echo $row['img'] ?>" alt="">
                        <input name="img" type="file" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label style="font-weight: bold;">Trạng thái</label>
                        <select name="status" class="form-control" >
                            <option value="1" <?php echo ($row['status'] == 1)?'selected' : ''; ?>>Xuất bản</option>
                            <option value="2" <?php echo ($row['status'] == 2)?'selected' : ''; ?> >Chưa xuất bản</option>
                        </select>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
</form>
<?php require_once('../views/backend/footer.php'); ?>