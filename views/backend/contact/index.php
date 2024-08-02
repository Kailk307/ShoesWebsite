<?php
use App\models\Contact;
//SELECT * from cqt_category WHERE status !=0 ORDER BY created _at DESC
$list =Contact::where('status','!=','0')-> orderBy('created_at','DESC')->get();
?>
<?php require_once('../views/backend/header.php');?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tất Cả Liên Hệ</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active">Tất Cả Danh Mục</li>
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
                        <a class=" btn btn-sm btn-success " href=" index.php?
                        option=contact&cat=create">
                            <i class="fas fa-plus"></i>thêm
                        </a>
                        <a class=" btn btn-sm btn-danger " href=" index.php?
                        option=contact&cat=strash">
                            <i class="fas fa-trash"></i>Thùng Rác</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width:20px;">Tùy chọn</th>
                                    <th>Tất cả liên hệ</th>
  			  <th>Tên</th>
                                    <th>Email</th>
		<th>Phone</th>
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
			<td><?=$row['id']?></td>
                                    <td><?=$row['name']?></td>
                                    <td><?=$row['email']?></td>
		<td><?=$row['phone']?></td>
                                    <td class="text-center"><?=$row['created_at']?></td>
                                    <td class="text-center">
                                        <?php if($row['status']==1):?>
                                        <a class=" btn btn-sm btn-success " href=" index.php?
                        option=contact&cat=status& id=<?=$row['id']?>">
                                            <i class="fas fa-toggle-on"></i>
                                        </a>
                                        <?php else:?>
                                        <a class=" btn btn-sm btn-danger " href=" index.php?
                        option=contact&cat=status& id=<?=$row['id']?>">
                                            <i class="fas fa-toggle-off"></i>
                                        </a>
                                        <?php endif;?>
                                        <a class=" btn btn-sm btn-info " href=" index.php?
                        option=contact&cat=detail& id=<?=$row['id']?>">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a class=" btn btn-sm btn-primary " href=" index.php?
                        option=contact&cat=edit& id=<?=$row['id']?>">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a class=" btn btn-sm btn-danger " href=" index.php?
                        option=contact&cat=delete& id=<?=$row['id']?>">
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

                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require_once('../views/backend/footer.php');?>