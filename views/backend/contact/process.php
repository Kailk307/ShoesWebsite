<?php
use App\models\Contact;
use App\Libraries\mystring;
if(isset($_POST['THEM']))
{
    $row=new Contact;
    $row->name=$_POST['name'];
    $row->metadesc=$_POST['metadesc'];
    $row->metakey=$_POST['metakey'];
    $row->parent_id=$_POST['parent_id'];
    $row->sort_order=$_POST['sort_order'];
    $row->content=$_POST['content'];
    $row->slug=($_POST['name']);
    $row->contentd_at=date('Y-m-d H:i:s');
    $row->contentd_by=1;
    $row->Save();
    header('location:index.php?option=contact');
}