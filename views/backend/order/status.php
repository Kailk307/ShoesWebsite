<?php

use App\models\Category;

$id=$_REQUEST['id'];
$row=Category::find($id);
$row->status=($row['status']== 1) ? 2 : 1;
$row->updated_at=date('Y-m-d H:i:s');
$row->updated_by=1;// Id của người đăng nhập
$row->save();//Lưu
header('location:index.php?option=category');