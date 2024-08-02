<?php

use App\Models\Menu;

$list = Menu::where('status', '!=', '0')->get();
$html_parent_id='';
$html_sort_order='';
foreach ($list as $item)
{
    $html_parent_id.="<option value='" .$item->id. "'>" .$item->name . "</option>";
    $html_sort_order.="<option value='" .$item->sort_order. "'>Sau:" .$item->name . "</option>";
}
?>
<?php require_once('../views/backend/header.php'); ?>
<!-- Content Wrapper. Contains page content -->
<form action="" method="post" enctype ="multipart/form-data">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm danh mục</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active">tất cả danh mục</li>
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
                        <button name ="THEM" type ="submit" class="btn btn-sm btn-success">
                        <i class="fas fa-save"></i>Lưu[thêm]
                        </button>
                    <a class="btn btn-sm btn-info" href="index.php?option=menu">
                            <i class="fas fa-undo"></i> Quay lại danh sách
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <div class="mb-3">                          
                            <label for ="name">Tên chủ dề </label>
                             <input name="name" id="name" type="text" class="form-control" requierd>
                        </div> 
                        <div class="mb-3">                          
                            <label for ="metadesc">Mô tả(SEO) </label>
                            <textarea name="metadesc" id="metadesc"  class="form-control" requierd></textarea>
                        </div>         
                        <div class="mb-3">                          
                            <label for ="metakey">Từ khóa(SEO) </label>
                            <textarea name="metakey" id="metakey"  class="form-control" requierd></textarea>
                        </div>           
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">                          
                        <label for ="parent_id">Chủ dề cha</label>
                        <select id="parent_id" name="parent_id" class="form-control">
                            <option value="0">--chọn cấp cha--</option>
                            <?= $html_parent_id;?>
                        </select>
                    </div>
                    <div class="mb-3">                          
                        <label for ="sort_order">Vị trí</label>
                        <select id="sort_order" name="sort_order" class="form-control">
                            <option value="0">--chọn vị trí--</option>
                            <?= $html_sort_order;?>
                        </select>
                </div>
                <div class="mb-3">                          
                        <label for ="image">Hình ảnh</label>
                        <input name="image" id="image" type="file" class="form-control" >
                 </div>
                 <div class="mb-3">                          
                        <label for ="status">Trạng thái</label>
                        <select id="status" name="status" class="form-control">
                            <option value="2">Chưa xuất bản</option>
                            <option value="1">Xuất bản</option>              
                        </select>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                        <button name ="THEM" type ="submit" class="btn btn-sm btn-success">
                        <i class="fas fa-save"></i>Lưu[thêm]
                        </button>
                    <a class="btn btn-sm btn-info" href="index.php?option=menu">
                            <i class="fas fa-undo"></i> Quay lại danh sách
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
</form>
<!-- /.content-wrapper -->
<?php require_once('../views/backend/footer.php'); ?>