<?php

use App\Models\Brand;
use App\Models\Product;
use App\Libraries\Phantrang;

$slug = $_REQUEST['cat'];
$row_brand = Brand::where([['status', '=', 1], ['slug', '=', $slug]])->first();
$brand_id = $row_brand->id;
$page = Phantrang::pageCurrent();
$limit = 12; //so mau tin tren 1 page
$offset = Phantrang::pageOffset($page, $limit);
$total = Product::where([['status', '=', 1], ['brand_id', '=', $brand_id]])->count();
$product_list = Product::where([['status', '=', 1], ['brand_id', '=', $brand_id]])
    ->orderBy('created_at', 'DESC')
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
                <h2 style="text-decoration:none;color:#f23c0a;font-size:200%;" class="text-center"><?= $row_brand->name; ?></h2>
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
                                    <a style="text-decoration:none" href="index.php?option=product&id=<?= $product->slug; ?>">
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
                <div><?= Phantrang::pageLinks($total, $page, $limit, 'index.php?option=brand&cat=" . $slug '); ?></div>
            </div>
        </div>
    </div>
    </div>
</section>
<?php require_once('views/frontend/footer.php'); ?>