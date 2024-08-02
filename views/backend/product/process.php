<?php

use App\Libraries\MessageArt;
use App\Models\Product;
use App\Libraries\Mystring;

if (isset($_POST['THEM'])) {
    $row = new Product;
    $row->name = $_POST['name'];
    $row->slug = Mystring::str_slug($_POST['name']);
    $row->detail = $_POST['detail'];
    $row->metadesc = $_POST['metadesc'];
    $row->metakey = $_POST['metakey'];
    $row->category_id = $_POST['category_id'];
    $row->brand_id = $_POST['brand_id'];
    $row->qty = $_POST['qty'];
    $row->price = $_POST['price'];
    $row->pricesale = $_POST['pricesale'];
    $row->status = $_POST['status'];
    $row->created_at = date('Y-m-d H:i:s');
    $row->created_by = 1;
    if(strlen($_FILES["image"]["name"])!=0)
    {
        
    }
    //upload
    $path_dir="../public/images/product/";
    $file=$_FILES["image"];
    $path_file=$path_dir.basename($file["name"]);
    $file_extension=strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if(in_array($file_extension,['png','gif','igp']))
    {
        $path_file=$path_dir.$row->slug.".".$file_extension;
    move_uploaded_file($file['tmp_name'],$path_file);
    $row->image=$row->slug.".".$file_extension;
    
    $row->save();
    MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'thêm thành công công thành công']);
    header('location:index.php?option=product');
    }
    else
    {
        MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'kieu hinh anh khong hop le']);
        header('location:index.php?option=product&cat=create');
    }
}

if (isset($_POST['CAPNHAT'])) {

    $id = $_POST['id'];
    $row = Product::find($id);
    $row->name = $_POST['name'];
    $row->metadesc = $_POST['metadesc'];
    $row->metakey = $_POST['metakey'];
   
    
    $row->status = $_POST['status'];
    $row->slug = Mystring::str_slug($_POST['name']);
    $row->created_at = date('Y-m-d H:i:s');
    $row->created_by = $_SESSION['user_id'];
    $row->save();
    header('location:index.php?option=product');
}