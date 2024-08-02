<?php

use App\Models\Menu;

$args_footer = [
    ['status', '=', 1],
    ['position', '=', 'footermenu']
];
$list_menu_footer = Menu::where($args_footer)->get();
?>
<h3 style="text-decoration:none;color:white;font-size:150%;">Các chính sách</h3>
<ul>
    <?php foreach ($list_menu_footer as $row_menu_footer) : ?>
        <li><a class="st-footer" href="<?= $row_menu_footer->link; ?>"><?= $row_menu_footer->name; ?></a></li>
    <?php endforeach; ?>
</ul>


