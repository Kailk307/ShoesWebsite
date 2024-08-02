<?php
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
$id = $_REQUEST['id'];
$row = Product::find($id);
$list = Product::where('status', '!=', '0')->get();
$html_category_id= '';
$html_brand_id = '';
foreach ($list as $item) {
    if ($item->id == $row->parent_id) {
        $html_category_id.= "<option selected value='" . $item->id . "'>" . $item->name . "</option>";
    } else {
        $html_category_id.= "<option value='" . $item->id . "'>" . $item->name . "</option>";
    }
    if ($item->brand_id == $row->brand_id) {
        $html_brand_id .= "<option selected value='" . ($item->brand_id + 1) . "'>Sau: " . $item->name . "</option>";
    } else {
        $html_brand_id .= "<option value='" . ($item->brand_id + 1) . "'>Sau: " . $item->name . "</option>";
    }
}
?>
<?php
?>
<?php require_once('../views/backend/header.php') ?>

<form action="index.php?option=product&cat=process" method="post" enctype="multipart/form-data">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Cập nhật sản phẩm</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active">Cập nhật sản phẩm</li>
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
                                <i class="fas fa-save"></i> Lưu[cập nhập]]
                            </button>
                            <a class="btn btn-sm btn-info" href="index.php?option=product">
                                <i class="fas fa-step-backward"></i> Quay về danh sách
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <input type="hidden" name="id" value="<?= $row['id']; ?>">
                            <div class="mb-3">
                                <label for="name">Tên chủ đề</label><input name="name" id="name" type="text"
                                    value="<?= $row['name']; ?>" class="form-control" placeholder="Vd:chó cảnh" require>
                            </div>
                            <div class="md-3">
                                <label for="detail">Chi tiết</label>
                                <textarea name="detail" id="detail" class="form-control" requiered
                                    placeholder="chi tiết">
                                </textarea>
                            </div>
                            <div class="mb-3">
                                <label for="metadesc">Mô tả(SE0)</label>
                                <textarea name="metadesc" id="metadesc" class="form-control"
                                    placeholder="Vd:chó cảnh dành cho bạn" require><?= $row['metadesc']; ?></textarea>

                            </div>
                            <div class="mb-3">
                                <label for="metakey">Từ khóa(SE0)</label>
                                <textarea name="metakey" id="metakey" class="form-control" placeholder="Vd:chó,chó cảnh"
                                    require><?= $row['metakey']; ?></textarea>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="md-3">
                                <label for="category_id">Danh Mục</label>
                                <select id="category_id" name="category_id" class="form-control" required>
                                    <option value="">---chọn Danh mục---</option>
                                    <?=$html_category_id;?>
                                </select>

                            </div>
                            <div class="mb-3">
                                <label for="brand_id">thương hiệu</label>
                                <select name="brand_id" id="brand_id" class="form-control">
                                    <option value="0">--Chọn vị trí--</option>
                                    <?= $html_brand_id; ?>
                                </select>
                            </div>
                            <div class="md-3">
                                <label for="qty">Số lượng</label>
                                <input name="qty" id="qty" type="number" value="1" min="i" class="form-control">
                            </div>
                            <div class="md-3">
                                <label for="price">Giá</label>
                                <input name="price" id="price" type="number" value="1000" min="1000" step="500"
                                    class="form-control">
                            </div>
                            <div class="md-3">
                                <label for="pricesale">Giá khuyến mãi</label>
                                <input name="pricesale" id="pricesale" type="number" value="1000" min="1000" step="500"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="img">Hình ảnh</label>
                                <input name="img" id="img" type="file" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="status">Trang thái</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="2" <?= ($row->status == 2) ? 'selected' : ''; ?>>--Chưa xuất bản--
                                    </option>
                                    <option value="1" <?= ($row->status == 1) ? 'selected' : ''; ?>>--Đã xuất bản--
                                    </option>

                                </select>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

</form>
<?php require_once('../views/backend/footer.php') ?>