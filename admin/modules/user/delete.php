
<!--header- lấy từ admin/layouts/header-->
<?php 
    $open="user";
    
    require_once __DIR__. "/../../autoload/autoload.php";
    $id=intval(getInput('id'));

    $deleteid=$db->fetchID("user",$id);
    //kt id xem co con ton tai ko
    if(empty($deleteid))
    {
        $_SESSION['error']="Dữ liệu không tồn tại ";
        redirectUrl("user");

    }
    $num =$db->delete("user",$id);
    if($num>0)
    {
        $_SESSION['success']="Xóa thành công!";
            //Tự động quay về trang danh mục sản phẩm-hàm funciton
        redirectUrl("user");
    }
    else{
        $_SESSION['error']="Xóa thất bại";
        redirectUrl("user");
    }
   ?>