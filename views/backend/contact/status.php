<?php

use App\Models\Contact;
use App\Libraries\MessageArt;

$id = $_REQUEST['id'];
$row = Contact::find($id);
if($row==null)
{ 
    MessageArt::set_flash('message',['type'=>'success','msg'=>'Mẫu tin không tồn tại']);
    header('location: index.php?option=contact');
}
$row->status = ($row['status']==1) ? 2 : 1;
$row->updated_at = date('Y-m-d H:i:s');
$row->updated_by= $_SESSION['user_id'];
$row->save();
MessageArt::set_flash('message',['type'=>'success','msg'=>'Thay đổi trạng thái thành công']);
header('location: index.php?option=contact');
