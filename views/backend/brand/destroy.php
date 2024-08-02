<?php

use App\Models\Brand;

$id = $_REQUEST['id'];
$row = Brand::find($id);
$row->delete();
header('location: index.php?option=brand&cat=trash');
