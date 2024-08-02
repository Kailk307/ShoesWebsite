<?php
use App\models\Category;
use App\Libraries\mystring;
if(isset($_POST['THEM']))
{
    $row=new Category;
    $row->name=$_POST['name'];
    $row->metadesc=$_POST['metadesc'];
    $row->metakey=$_POST['metakey'];
    $row->parent_id=$_POST['parent_id'];
    $row->sort_order=$_POST['sort_order'];
    $row->status=$_POST['status'];
    $row->slug=($_POST['name']);
    $row->created_at=date('Y-m-d H:i:s');
    $row->created_by=1;
    $row->Save();
    header('location:index.php?option=category');
}