<?php

use App\Models\Product;

$content_cart = null;
if (isset($_SESSION['contentcart'])) {
    $content_cart = $_SESSION['contentcart'];
}
?>

<?php require_once('views/frontend/header.php'); ?>
<form action="index.php?option=cart" method="post">
    <section class="maincontent">
        <div class="container">
            <h2 style="text-decoration:none;color:#f23c0a;font-size:200%;" class="text-center">GIỎ HÀNG CỦA BẠN</h2>
            <?php if ($content_cart != null) : ?>
                <table class="table table-bordered">
                    <tr class="text-center">
                        <th style="width:10px">Id</th>
                        <th style="width:90px">Hình</th>
                        <th style="width:200px">Tên sản phẩm</th>
                        <th style="width:50px">Gía</th>
                        <th style="width:50px">Số lượng</th>
                        <th style="width:50px">Thành tiền</th>
                        <th style="width:50px">Xóa</th>
                    </tr>
                    <?php $total_money = 0; ?>
                    <?php foreach ($content_cart as $cart) : ?>
                        <?php
                        $product = Product::find($cart['id']);
                        ?>
                        <tr>
                            <th class="text-center"><?= $cart['id']; ?></th>
                            <th><img class="img-fluid" src="public/images/product/<?= $product->image ?>" alt="<?= $product->image ?>"></th>
                            <th class="text-center"><?= $product->name; ?></th>
                            <th class="text-center"><?= number_format($cart['price']); ?></th>
                            <th class="text-center">
                                <input style="width:50px" min="1" type="number" name="qty[<?= $cart['id']; ?>]" value="<?= $cart['qty']; ?>" />
                            </th>
                            <th class="text-center"><?=number_format($cart['amount']); ?></th>
                            <th class="text-center">
                                <a class="btn btn-sm btn-danger" href="index.php?option=cart&delcart=<?= $cart['id']; ?>">
                                    <i class="fa-solid fa-square-minus"></i>
                                </a>
                            </th>
                        </tr>
                        <?php $total_money += $cart['amount']; ?>
                    <?php endforeach; ?>
                    <tr>
                        <th colspan="4">
                            <a class="btn btn-sm btn-danger" href="index.php?option=cart&delcart=all">
                                Xóa tất cả
                            </a>
                            <input type="submit" name="updateCart" class="btn btn-sm btn-info" value="Cập nhật">
                            <a class="btn btn-sm btn-success" href="index.php?option=cart&checkout=true">Thanh toán</a>
                        </th>
                        <th colspan="3" class="text-end">
                            <strong>TỔNG TIỀN: <?= number_format($total_money) ."VNĐ"; ?></strong>
                        </th>
                    </tr>
                </table>
            <?php else : ?>
                <h3 class=" alert alert-danger" style="text-decoration:none;color:#f23c0a;font-size:100%;">Bạn chưa có sản phẩm trong giỏ hàng, tiếp tục mua sắm bạn nhé!</h3>
            <?php endif; ?>
        </div>
    </section>
</form>
<?php require_once('views/frontend/footer.php'); ?>