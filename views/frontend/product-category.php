<?php

use App\Models\Category;
use App\Models\Product;
use App\Libraries\Phantrang;

$slug = $_REQUEST['cat'];
$row_cat = Category::where([['status', '=', 1], ['slug', '=', $slug]])->first();
$list_category_id = array();
array_push($list_category_id, $row_cat->id);
$list_category1 = Category::where([['status', '=', 1], ['parent_id', '=', $row_cat->id]])
    ->get();
if (count($list_category1) > 0) {
    foreach ($list_category1 as $row_cat1) {
        array_push($list_category_id, $row_cat1->id);
        $list_category2 = Category::where([['status', '=', 1], ['parent_id', '=', $row_cat1->id]])
            ->get();
        if (count($list_category2) > 0) {
            foreach ($list_category2 as $row_cat2) {
                array_push($list_category_id, $row_cat2->id);
                $list_category3 = Category::where([['status', '=', 1], ['parent_id', '=', $row_cat2->id]])
                    ->get();
                if (count($list_category3) > 0) {
                    foreach ($list_category3 as $row_cat3) {
                        array_push($list_category_id, $row_cat3->id);
                    }
                }
            }
        }
    }
}
//phan trang
$page = Phantrang::pageCurrent();
$limit = 12; //so mau tin tren 1 page
$offset = Phantrang::pageOffset($page, $limit);
//lay ra tong so trang
$total = Product::where('status', '=', 1)->whereIn('category_id', $list_category_id)->count();

//ket thuc
$product_list = Product::where('status', '=', 1)
    ->whereIn('category_id', $list_category_id)
    ->orderBy('created_by', 'DESC') //orderBy: mau tin moi cap nhat dc cho len dau
    ->skip($offset)
    ->take($limit)
    ->get();
?>
<?php require_once('views/frontend/header.php'); ?>
<section class="maintcontent my-3">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php
                 require_once('views/frontend/mod_listcategory.php');
                 require_once('views/frontend/mod_listbrand.php');
                  ?>
            </div>
            <div class="col-md-9">
                <h2 style="text-decoration:none;color:#f23c0a;font-size:200%;" class="text-center">
                    <?= $row_cat->name; ?>
                </h2>
                <div class="row">
                    <?php foreach ($product_list as $product) : ?>
                        <div class="col-md-3 mb-3">
                            <div class="product-item border">
                                <div class="product-image">
                                    <a href="index.php?option=product&id=<?= $product->slug; ?>">
                                        <img class="img-fluid" src="public/images/product/<?= $product->image ?>" alt="<?= $product->image ?>">
                                    </a>
                                </div>
                                <div class="product-name ">
                                    <a style="text-decoration:none" href="index.php?option=product&id=<?= $product->id; ?>">
                                        <h3 style="color:black;font-size:100%;"><?= $product->name ?></h3>
                                    </a>
                                </div>
                                <div class="product-price">
                                    <div class="row">
                                        <div class="col-6">Giá: <?= number_format($product->price); ?></div>
                                        <div class="col-6">
                                            <a href="index.php?option=cart&addcat=<?= $product->id; ?>" class="btn btn-sm btn-success" href="index.php?option=cart&addcart=<?= $product->id; ?>"><i class="fa-solid fa-cart-shopping"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div><?= Phantrang::pageLinks($total, $page, $limit, 'index.php?option=product&cat=" . $slug '); ?></div>
            </div>
        </div>
    </div>
    </div>
</section>
<?php require_once('views/frontend/footer.php'); ?>