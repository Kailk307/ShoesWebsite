<?php

use App\models\Contact;

$id=$_REQUEST['id'];
$row=Contact::find($id);
$row->content=0;
$row->updated_at=date('Y-m-d H:i:s');
$row->updated_by=1;// Id của người đăng nhập
$row->save();//Lưu
header('location:index.php?option=contact');