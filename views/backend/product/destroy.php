<?php

use App\models\Product;

$id = $_REQUEST['id'];
$row = Product::find($id);
$row->delete();
header('location:index.php?option=product');