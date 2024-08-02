<?php

use App\Models\Brand;
use App\Libraries\Mystring;
use App\Libraries\MessageArt;

if (isset($_POST['THEM'])) {
    $row = new Brand;
    $row->name = $_POST['name'];
    $row->metadesc = $_POST['metadesc'];
    $row->metakey = $_POST['metakey'];
    $row->parent_id = $_POST['parent_id'];
    $row->sort_order = $_POST['sort_order'];
    $row->status = $_POST['status'];
    $row->slug = Mystring::str_slug($_POST['name']);
    $row->created_at = date('Y-m-d H:i:s');
    $row->created_by = 1;
    $row->save();
    MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
    header('location:index.php?option=brand');
}
if (isset($_POST['CAPNHAT'])) {
    $id=$_POST['id'];
    $row =brand::find($id);
    $row->name = $_POST['name'];
    $row->metadesc = $_POST['metadesc'];
    $row->metakey = $_POST['metakey'];
    $row->parent_id = $_POST['parent_id'];
    $row->sort_order = $_POST['sort_order'];
    $row->status = $_POST['status'];
    $row->slug = Mystring::str_slug($_POST['name']);
    $row->updated_at = date('Y-m-d H:i:s');
    $row->updated_by = 1;
    $row->save();
    MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật thành công']);
    header('location:index.php?option=brand');
}