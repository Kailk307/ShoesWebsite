<?php

use App\Models\Category;
use App\Models\Product;

$list_category = Category::where([['status', '=', 1], ['parent_id', '=', 0]])
  ->orderBy('sort_order', 'ASC')->get();
//print_r($list_category);
?>
<?php require_once('views/frontend/header.php'); ?>
<!--  -->
<section class="product product-page" id="product">
  <?php foreach ($list_category as $row_cat) : ?>
    <?php
    $list_category_id = array();
    array_push($list_category_id, $row_cat->id);
    $list_category1 = Category::where([['status', '=', 1], ['parent_id', '=', $row_cat->id]])->get();
    if (count($list_category1) > 0) {
      foreach ($list_category1 as $row_cat1) {
        array_push($list_category_id, $row_cat1->id);
        $list_category2 = Category::where([['status', '=', 1], ['parent_id', '=', $row_cat->id]])->get();
        if (count($list_category2) > 0) {
          foreach ($list_category2 as $row_cat2) {
            array_push($list_category_id, $row_cat2->id);
            $list_category3 = Category::where([['status', '=', 1], ['parent_id', '=', $row_cat2->id]])->get();
            if (count($list_category3) > 0) {
              foreach ($list_category3 as $row_cat3) {
                array_push($list_category_id, $row_cat3->id);
              }
            }
          }
        }
      }
    }
    $product_list = Product::where('status', '=', 1)->whereIn('category_id', $list_category_id)
      ->orderBy('created_at', 'DESC')
      ->take(8)
      ->get();
    ?>
    <div class="row">
      <h1 class=""><a style="text-decoration: none;" href="index.php?option=product&cat=<?= $row_cat->slug; ?>"><?= $row_cat->name; ?></a></h1>
      <?php foreach ($product_list as $product) : ?>
        <div class="col-md-3">
          <div class="card">
            <a href="index.php?option=product&id=<?= $product->slug; ?>">
              <img style="object-fit: fill; max-height:239px; width:auto; display:block" class="img-fluid center mx-auto" src="public/images/product/<?= $product->image; ?>" alt="<?= $product->image; ?>">
            </a>
            <div class="card-body">
              <h3><a style="text-decoration: none;" href="index.php?option=product&id=<?= $product->slug; ?>"><?= $product->name; ?></a></h3>
              <h5>giá bán: <?= number_format($product->price); ?>đ</h5>
              <a href="index.php?option=cart&addcart=<?= $product->id; ?>" class="btn btn-sm btn-success">Thêm vào giỏ hàng</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    </div>
  <?php endforeach; ?>
</section>
<!--end product-->
<?php require_once('views/frontend/footer.php'); ?>