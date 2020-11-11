<?php
    require_once __DIR__. "/autoload/autoload.php"; 
    //Bắt lỗi đăng kí tài khoản khi đang dùng tải khoản đăng nhập
    if( !isset($_SESSION['name_id']))
    {
        echo "<script> alert('Xin mời bạn đăng nhập!');location.href='dangnhap.php' </script>";
    }
    else{
        // lấy id của sp đang add
        $id= intval(getInput('id'));
        $product=$db->fetchID("product",$id);
        //Nếu giỏ hàng đã có sản pẩm thì cập nhật thêm, nếu không tạo mới 1 giỏ hàng
        if(! isset($_SESSION['cart'][$id]))
        {
            //tạo mới giỏ hàng
            $_SESSION['cart'][$id]['name'] = $product['name'];
            $_SESSION['cart'][$id]['id'] = $product['id'];
            
            $_SESSION['cart'][$id]['thunbar'] = $product['thunbar'];
            $_SESSION['cart'][$id]['qty'] = 1;
            $_SESSION['cart'][$id]['price'] =((100-$product['sale']) * $product['price'])/100;
            
            
        }
        else
        {  
            //cập nhật lại giỏ hàng khi có sản phẩm trùng
            $_SESSION['cart'][$id]['qty'] += 1;

        }
        echo "<script> alert('Thêm vào giỏ hàng thành công!');location.href='thongtingiohang.php' </script>";
    }
?>