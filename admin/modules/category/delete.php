
<!--header- lấy từ admin/layouts/header-->
<?php 
    $open="category";
    
    require_once __DIR__. "/../../autoload/autoload.php";
    $id=intval(getInput('id'));

    $deleteid=$db->fetchID("category",$id);
    //kt id xem co con ton tai ko
    if(empty($deleteid))
    {
        $_SESSION['error']="Dữ liệu không tồn tại ";
        redirectUrl("category");

    }
/*
Kiểm tra xem danh mục đã có sản phẩm chưa
*/
    $is_product = $db -> fetchOne("product"," category_id = $id ");
    if($is_product==NULL)
    {
        $num =$db->delete("category",$id);
        if($num>0)
        {
            $_SESSION['success']="Xóa thành công!";
                //Tự động quay về trang danh mục sản phẩm-hàm funciton
            redirectUrl("category");
        }
        else{
            $_SESSION['error']="Xóa thất bại";
            redirectUrl("category");
        }

    }
    else{
        $_SESSION['error']="Danh mục đã có sản phẩm! bạn không thể xóa!";
        redirectUrl("category");
    }
    
   ?>