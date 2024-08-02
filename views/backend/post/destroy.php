<?php
use App\Models\Post;
use App\Libraries\MessageArt;
$id= $_REQUEST['id'];
$row= Post::find($id);  
// cach 2 $row1= post::where('id','=',$id)->first();    
$row->delete();
MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Xóa khỏi CSDL thành công']);
header('location: index.php?option=post&cat=trash');//chuyển hướng trang
//UPDATE ntbn_post SET
//SELECT * FROM ntbn_post WHERE id='2'