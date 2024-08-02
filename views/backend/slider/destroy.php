<?php

use App\models\Slider;

$id = $_REQUEST['id'];
$row = Slider::find($id);
$row->delete();
header('location:index.php?option=slider');