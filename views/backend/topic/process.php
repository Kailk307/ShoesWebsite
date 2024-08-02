<?php
use App\models\Topic;
use App\Libraries\mystring;
if(isset($_POST['THEM']))
{
    $row=new Topic;
    $row->name=$_POST['name'];
    $row->parent_id=$_POST['parent_id'];
    $row->metadesc=$_POST['metadesc'];
    $row->metakey=$_POST['metakey'];
    $row->status=$_POST['status'];
    $row->slug=($_POST['name']);
    $row->created_at=date('Y-m-d H:i:s');
    $row->created_by=1;
    $row->Save();
    header('location:index.php?option=topic');
}