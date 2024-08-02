<?php

use App\Models\Post;

$id = $_REQUEST['id'];
$row = Post::find($id);

$list = post::where('status', '!=', '0')->get();
$html_parent_id = '';
$html_sort_order = '';
foreach ($list as $item) {
    if ($item->id == $row->parent_id) {
        $html_parent_id .= "<option selected value='" . $item->id . "'>" . $item->name . "</option>";
    } else {
        $html_parent_id .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
    }
    if ($item->sort_order == $row->sort_order) {
        $html_sort_order .= "<option selected value='" .    ($item->sort_order + 1) . "'>Sau :" . $item->name . "</option>";
    } else {
        $html_sort_order .= "<option value='" .    ($item->sort_order + 1) . "'>Sau :" . $item->name . "</option>";
    }
}
?>

<?php require_once('../views/backend/header.php') ?>

<form action="index.php?option=post&cat=process" method="post" enctype="multipart/form-data">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Cập nhật danh mục</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active">Cập nhật danh mục</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button name="CAPNHAT" type="submit" class="btn btn-sm btn-success">
                                <i class="fas fa-save"></i> Lưu
                            </button>
                            <a class="btn btn-sm btn-info" href="index.php?option=post">
                                <i class="fas fa-step-backward"></i> Quay về danh sách
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="mb-3">
                            <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                <label for="name"> Tên danh mục </label>
                                <input name="name" value="<?= $row['name']; ?>" id="name" type="text" class="form-control" require placeholder="VD: Thực phẩm chức năng,...">
                            </div>
                            <div class="mb-3">
                                <label for="metadesc"> Mô tả(SE0)</label>
                                <textarea name="metadesc" id="metadesc" class="form-control" require placeholder="VD: Sản phẩm mới,..."><?= $row['metadesc']; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="metakey"> Từ khóa(SE0)</label>
                                <textarea name="metakey" id="metakey" class="form-control" require placeholder="VD: Sản phẩm mới..."><?= $row['metakey'] ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="parent_id">Chủ đề tổng quát</label>
                                <select name="parent_id" id="parent_id" class="form-control">
                                    <option value="0">--Chọn cấp tổng--</option>
                                    <?= $html_parent_id; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="sort_order">Chọn vị trí</label>
                                <select name="sort_order" id="sort_order" class="form-control">
                                    <option value="0">--Chọn vị trí--</option>
                                    <?= $html_sort_order; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="img">Hình ảnh</label>
                                <input name="img" id="img" type="file" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="status">Trang thái</label>
                                <select id="status" name="status" class="form-control">
                                    <option value="1" <?= ($row->status == 1) ? 'selected' : ''; ?>>--Đăng--</option>
                                    <option value="2" <?= ($row->status == 2) ? 'selected' : ''; ?>>--Ẩn--</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button name="THEM" type="submit" class="btn btn-sm btn-success">
                                <i class="fas fa-save"></i> Lưu
                            </button>
                            <a class="btn btn-sm btn-info" href="index.php?option=post">
                                <i class="fas fa-step-backward"></i> Quay về danh sách
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

</form>
<?php require_once('../views/backend/footer.php') ?>