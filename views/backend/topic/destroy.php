<?php

use App\Models\Topic;

$id = $_REQUEST['id'];
$row = Topic::find($id);
$row->delete();
header('location:index.php?option=topic');