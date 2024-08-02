<?php

use App\Models\Product;

if (!isset($_SESSION['logincustomer'])) {
    header('location:index.php?option=customer&f=login');
}

$content_cart = null;
if (isset($_SESSION['contentcart'])) {
    $content_cart = $_SESSION['contentcart'];
}
?>

<?php require_once('views/frontend/header.php'); ?>
<form action="index.php?option=cart&checkoutCart=true" method="post">
    <section class="maincontent">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
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
                                        <?= $cart['qty']; ?>
                                    </th>
                                    <th class="text-center"><?= number_format($cart['amount']); ?></th>
                                </tr>
                                <?php $total_money += $cart['amount']; ?>
                            <?php endforeach; ?>
                        </table>
                    <?php else : ?>
                        <h3 class=" alert alert-danger" style="text-decoration:none;color:#f23c0a;font-size:100%;">Chưa có sản phẩm trong giỏ hàng</h3>
                    <?php endif; ?>
                </div>
                <div class="col-md-3">
                    <br></br>
                    <div class="mb-3">
                        <input name="deliveryname" -type="text" class="form-control" placeholder="Họ tên">
                    </div>
                    <div class="mb-3">
                        <input name="deliveryphone" type="text" class="form-control" placeholder="Điện thoại">
                    </div>
                    <div class="mb-3">
                        <input name="deliveryemail" type="text" class="form-control" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <input name="deliveryaddress" type="text" class="form-control" placeholder="Địa chỉ">
                    </div>
                    <button type="submit">THANH TOÁN</button>
                    <br></br>
                </div>
            </div>
        </div>
    </section>
</form>
<?php require_once('views/frontend/footer.php'); ?>