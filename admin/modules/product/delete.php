
<!--header- lấy từ admin/layouts/header-->
<?php 
    $open="product";
    
    require_once __DIR__. "/../../autoload/autoload.php";
    $id=intval(getInput('id'));

    $deleteid=$db->fetchID("product",$id);
    //kt id xem co con ton tai ko
    if(empty($deleteid))
    {
        $_SESSION['error']="Dữ liệu không tồn tại ";
        redirectUrl("product");

    }
    $num =$db->delete("product",$id);
    if($num>0)
    {
        $_SESSION['success']="Xóa thành công!";
            //Tự động quay về trang danh mục sản phẩm-hàm funciton
        redirectUrl("product");
    }
    else{
        $_SESSION['error']="Xóa thất bại";
        redirectUrl("product");
    }
   ?>