<?php

use App\Models\Brand;
use App\Libraries\MessageArt;
$id = $_REQUEST['id'];
$row = Brand::find($id);
$row->status = 0;
$row->updated_at = date('Y-m-d H:i:s');
$row->updated_by = 1;
$row->save();
MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Xóa khỏi thùng rác thành công']);
header('location: index.php?option=brand');