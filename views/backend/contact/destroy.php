<?php

use App\models\Contact;

$id = $_REQUEST['id'];
$row = Contact::find($id);
$row->delete();
header('location:index.php?option=contact');