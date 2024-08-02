<?php
use App\models\Slider;
use App\Libraries\mystring;
if(isset($_POST['THEM']))
{
    $row=new Slider;
    $row->name=$_POST['name'];
    
    $row->status=$_POST['status'];
    $row->link=($_POST['name']);
    $row->created_at=date('Y-m-d H:i:s');
    $row->created_by=1;
    $row->Save();
    header('location:index.php?option=slider');
}