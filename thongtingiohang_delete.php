<?php require_once __DIR__. "/autoload/autoload.php"; 
    $key= intval(getInput('key'));
    unset($_SESSION['cart'][$key]);
    $_SESSION['success']="Xóa thành công sản phẩm!";
    header("location: thongtingiohang.php");
?>