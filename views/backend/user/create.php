<?php
use App\models\User;
$list=User::where('status','!=','0')->get();
$html_parent_id="";
$html_sort_order="";
foreach($list as $item)
{
    $html_parent_id="<option value='".$item->id."'>".$item->name."</option>"; 
    $html_sort_order="<option value='".($item->sort_order+1)."'>Sau:".$item->name."</option>"; 
}
?>
<?php require_once('../views/backend/header.php');?>
<form action="index.php?option=user&cat=process" method="post" enctype="multipart/form-data">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thêm Danh Mục</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active">Thêm Danh Mục</li>
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
                            <button name="THEM" type="submit" class="btn btn-sm btn-success">
                                <i class="fas fa-save"></i> lưu[thêm]
                            </button>
                            <a class=" btn btn-sm btn-info" href=" index.php?
                        option=user">
                                <i class="fas fa-step-backward"></i>Quay Về Danh Sách
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="md-3">
                                <label for="name">Tên Danh mục</label>
                                <input name="name" id="name" type="text" class="form-control" required
                                    placeholder="VD:Ao polo1">
                            </div>

                            <div class="md-3">
                                <label for="metadesc">Mô tả(SEO)</label>
                                <textarea name="metadesc" id="metadesc" class="form-control" requiered
                                    placeholder="VD:thời trang nam, quý ông">
                                </textarea>
                            </div>
                            <div class=" md-3">
                                <label for="metakey">Từ khóa(SEO) </label>
                                <textarea name="metakey" id="metakey" type="text" class="form-control" requiered
                                    placeholder="VD:thời trang nam, áo thun nam, polo quý ông">
                                </textarea>
                            </div>
                        </div>
                        <div class=" col-md-3">
                            <div class="md-3">
                                <label for="parent_id">Chủ đề cha</label>
                                <select id="parent_id" name="parent_id" class="form-control">
                                    <option value="0">---chọn cấp cha---</option>
                                    <?=$html_parent_id;?>
                                </select>

                            </div>
                            <div class="md-3">
                                <label for="sort_order">Vị Trí</label>
                                <select id="sort_order" name="sort_order" class="form-control">
                                    <option value="0">---chọn vị trí---</option>
                                    <? $html_sort_order;?>
                                </select>
                            </div>
                            <div class="md-3">
                                <label for="image">Hình ảnh</label>
                                <input name="image" id="image" type="file" class="form-control">
                            </div>
                            <div class="md-3">
                                <label for="status"> Trạng Thái</label>
                                <select id="status" name="status" class="form-control">
                                    <option value="2">---chưa xuất bản---</option>
                                    <option value="">--- xuất bản---</option>
                                    <? $html_sort_order;?>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class=" card-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button name="THEM" type="submit" class="btn btn-sm btn-success">
                                <i class="fas fa-save"></i> lưu[thêm]
                            </button>
                            <a class=" btn btn-sm btn-info" href=" index.php? option=user">
                                <i class="fas fa-step-backward"></i>Quay Về Danh Sách</a>
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
<?php require_once('../views/backend/footer.php');?>