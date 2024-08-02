<?php

use App\Models\Product;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\User;
use App\Libraries\Cart;

//unset( $_SESSION['contentcart']);

if (isset($_REQUEST['addcat'])) {
    $id = $_REQUEST['addcat'];
    //Chi tiết của mẫu tin 
    $product =  Product::find($id);
    //Tao ra mang
    $cart_item = array(
        'id' => $product->id,
        'price' => $product->price,
        'qty' => 1,
        'amount' => $product->price
    );
    //Kiểm tra
    if (isset($_SESSION['contentcart'])) {
        $carts = $_SESSION['contentcart'];
        if ((Cart::cart_exists($carts, $id) == true)) {
            $carts = Cart::cart_update($carts, $id, 1);
        } else {
            $carts[] = $cart_item;
        }
        $_SESSION['contentcart'] = $carts;
    } else {
        $cart[] = $cart_item; //$cart: mang 2 chieu
        $_SESSION['contentcart'] = $cart;
    }
    header("location:index.php?option=cart");
}
//xu ly xoa trong gio hang
if (isset($_REQUEST['delcart'])) {
    $id = $_REQUEST['delcart'];
    if (isset($_SESSION['contentcart'])) {
        $carts = $_SESSION['contentcart'];
        $carts = Cart::cart_delete($carts, $id);
        $_SESSION['contentcart'] = $carts;
    }
}
if (isset($_POST['updateCart'])) {
    $arr_qty = $_POST['qty'];
    foreach ($arr_qty as $id => $number) {
        $carts = $_SESSION['contentcart'];
        $carts = Cart::cart_update($carts, $id, $number, "update");
        $_SESSION['contentcart'] = $carts;
        header("location:index.php?option=cart");
    }
}
if (isset($_REQUEST['checkoutCart'])) {
    // Lưu vào bảng order
    $user = User::find($_SESSION['user_id']);
    $date = getdate();
    $order = new Order();
    $order->code = $date[0];
    $order->user_id = $_SESSION['user_id'];
    $order->deliveryname = (isset($_POST['deliveryname']) ? $_POST['deliveryname'] : $user['name']);
    $order->deliveryphone = (isset($_POST['deliveryphone']) ? $_POST['deliveryphone'] : $user['phone']);
    $order->deliveryemail = (isset($_POST['deliveryemail']) ? $_POST['deliveryemail'] : $user['email']);
    $order->deliveryaddress = (isset($_POST['deliveryaddress']) ? $_POST['deliveryaddress'] : $user['address']);
    $order->created_at = date('Y-m-d H:i:s');
    $order->status = 2;
    if ($order->save()) {
        $carts = $_SESSION['contentcart'];
        foreach ($carts as $cart) {
            $orderdetail = new Orderdetail();
            $orderdetail->order_id = $order->id;
            $orderdetail->product_id = $cart['id'];
            $orderdetail->price = $cart['price'];
            $orderdetail->qty = $cart['qty'];
            $orderdetail->amount = $cart['amount'];
            $orderdetail->save();
        }
    }
    unset($_SESSION['contentcart']);
    header("location:index.php?option=cart");
}
if (isset($_REQUEST['checkout'])) {
    require_once('views/frontend/cart-checkout.php');
} else {
    require_once('views/frontend/cart-content.php');
}
