<?php

use App\Models\Menu;
use App\Libraries\MessageArt;

$id = $_REQUEST['id'];
$row = Menu::find($id);
$row->delete();
MessageArt::set_flash('message',['type'=>'success','msg'=>'Xoá khỏi CSDL thành công']);
header('location: index.php?option=menu');
