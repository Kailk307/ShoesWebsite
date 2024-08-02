<?php
use App\Models\Post;
use App\Libraries\MessageArt;
$id= $_REQUEST['id'];
$row= Post::find($id);  
// cach 2 $row1= post::where('id','=',$id)->first();    
$row->status= 0;    
$row->updated_at= date('Y-m-d H:i:s');
$row->updated_by=$_SESSION['user_id'];//id của người đăng nhập
$row->save();//lưu
MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Xóa vào thùng rác thành công']);

header('location: index.php?option=post');//chuyển hướng trang
//UPDATE ntbn_post SET
//SELECT * FROM ntbn_post WHERE id='2'