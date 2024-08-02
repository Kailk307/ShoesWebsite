<?php
use App\Models\Post;
use App\Libraries\MessageArt;
$id= $_REQUEST['id'];
$row= Post::find($id);  
// cach 2 $row1= post::where('id','=',$id)->first();    
$row->status= 2;    
$row->updated_at= date('Y-m-d H:i:s');
$row->updated_by=1;//id của người đăng nhập
$row->save();//lưu
MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Khôi phục thành công']);
header('location: index.php?option=post&cat=trash');//chuyển hướng trang
//UPDATE ntbn_post SET
//SELECT * FROM ntbn_post WHERE id='2'