<?php
use App\models\Category;
//SELECT * from cqt_category WHERE status !=0 ORDER BY created _at DESC
$list =Category::where('status','=','0')-> orderBy('created_at','DESC')->get();

?>
<?php require_once('../views/backend/header.php');?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thùng rác Danh Mục</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active">Thùng Rác Danh Mục</li>
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
                        <a class=" btn btn-sm btn-info" href=" index.php?
                        option=category">
                            <i class="fas fa-step-backward"></i>Quay Về Danh Sách</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width:20px;">Tùy chọn</th>
                                    <th>tên danh mục</th>
                                    <th>phân loại</th>
                                    <th class="text-center" style="width:160px;">Ngày Tạo</th>
                                    <th class="text-center" style="width:200px;">Chức Năng</th>
                                    <th class="text-center" style="width:20px;">STT</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach($list as $row):?>
                                <tr>
                                    <td class="text-center">
                                        <input type="checkbox">
                                    </td>
                                    <td><?=$row['name']?></td>
                                    <td><?=$row['slug']?></td>
                                    <td class="text-center"><?=$row['created _at']?></td>
                                    <td class="text-center">
                                        <a class=" btn btn-sm btn-primary " href=" index.php?
                        option=category&cat=restore& id=<?=$row['id']?>">
                                            <i class="fas fa-undo"></i>
                                        </a>
                                        <a class=" btn btn-sm btn-danger " href=" index.php?
                        option=category&cat=destroy& id=<?=$row['id']?>">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                    <td class="text-center"><?=$row['id']?>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class=" card-footer">
                        footer
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require_once('../views/backend/footer.php');?>