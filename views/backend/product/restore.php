<?php
use App\Libraries\MessageArt;
use App\models\Product;

$id=$_REQUEST['id'];
$row=Product::find($id);
$row->status=2;
$row->updated_at=date('Y-m-d H:i:s');
$row->updated_by=1;// Id của người đăng nhập
$row->save();//Lưu
MessageArt::set_flash('message',['type'=>'success','msg'=>'Khôi phục thành công']);
header('location:index.php?option=product&cat=strash');