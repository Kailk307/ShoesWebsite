<?php

use App\models\User;

$id = $_REQUEST['id'];
$row = User::find($id);
$row->delete();
header('location:index.php?option=user');