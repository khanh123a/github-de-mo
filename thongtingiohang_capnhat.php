<?php require_once __DIR__. "/autoload/autoload.php"; 
    $key= intval(getInput("key"));
    $qty= intval(getInput("qty"));
    //Sản phẩm cần sửa và số lượng cần sửa-lấy từ giỏ hàng chiếu đến từng dòng
    $_SESSION['cart'][$key]['qty'] = $qty;
    echo 1;
?>