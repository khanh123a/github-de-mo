
<!--header- lấy từ admin/layouts/header-->
<?php 
    $open="hoadon";
    
    require_once __DIR__. "/../../autoload/autoload.php";
    $id=intval(getInput('id'));

    $deleteid=$db->fetchID("hoadon",$id);
    //kt id xem co con ton tai ko
    if(empty($deleteid))
    {
        $_SESSION['error']="Dữ liệu không tồn tại";
        redirectUrl("hoadon");

    }
    $num =$db->delete("hoadon",$id);
    if($num>0)
    {
        $_SESSION['success']="Xóa thành công!";
            //Tự động quay về trang danh mục sản phẩm-hàm funciton
        redirectUrl("hoadon");
    }
    else{
        $_SESSION['error']="Xóa thất bại";
        redirectUrl("hoadon");
    }
   ?>