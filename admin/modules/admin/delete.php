
<!--header- lấy từ admin/layouts/header-->
<?php 
    $open="admin";
    
    require_once __DIR__. "/../../autoload/autoload.php";
    $id=intval(getInput('id'));

    $deleteid=$db->fetchID("admin",$id);
    //kt id xem co con ton tai ko
    if(empty($deleteid))
    {
        $_SESSION['error']="Dữ liệu không tồn tại ";
        redirectUrl("admin");

    }
    $num =$db->delete("admin",$id);
    if($num>0)
    {
        $_SESSION['success']="Xóa thành công!";
            //Tự động quay về trang danh mục sản phẩm-hàm funciton
        redirectUrl("admin");
    }
    else{
        $_SESSION['error']="Xóa thất bại";
        redirectUrl("admin");
    }
   ?>