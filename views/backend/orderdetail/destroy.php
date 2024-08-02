<?php

use App\models\Category;

$id = $_REQUEST['id'];
$row = Category::find($id);
$row->delete();
header('location:index.php?option=category');