<?php

use App\Models\Product;
use App\Libraries\Phantrang;

$limit = 6;

$page = Phantrang::pageCurrent();
$offset = Phantrang::pageOffset($page, $limit);
$total = Product::where('status', '=', '1')
    ->count();

$list_product = Product::where('status', '=', '1')
    ->skip($offset)
    ->take($limit)
    ->orderBy('created_at', 'DESC')->get();
?>
<?php require_once('views/frontend/header.php'); ?>

<section class="maincontent my-3">
    <div class="container">
        <div class="row">          
            <div class="col-md-9">
                <h2>Tất cả sản phẩm</h2>
                <div class="row">
                    <?php foreach ($list_product as $product) : ?>
                        <div class="col-md-3 mb-3">
                            <div class="product-item">
                                <div class="product-image border">
                                    <a href="index.php?option=product&id=<?= $product->id; ?>">
                                        <img class="img-fluid" src="public/images/product/<?= $product->image ?>" alt="<?= $product->image ?>">
                                    </a>
                                </div>
                                <div class="product-name">

                                    <a style="text-decoration:none " href="index.php?option=product&id=<?= $product->id; ?>">
                                        <h3 style="color:black;font-size:100%;"><?= $product->name ?></h3>
                                    </a>

                                </div>
                                <div class="product-price-cart">
                                    <div class="row">
                                        <div class="col-6">Giá: <?= number_format($product->price); ?></div>
                                        <div class="col-6">
                                            <a class="btn btn-sm btn-success" href="index.php?option=cart&addcart=<?= $product->id; ?>">Thêm vào giỏ hàng</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div><?= Phantrang::pageLinks($total, $page, $limit, 'index.php?option=product'); ?></div>
            </div>
        </div>
    </div>
</section>

<?php require_once('views/frontend/footer.php'); ?>