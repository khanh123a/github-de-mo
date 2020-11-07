<?php 
    $open="category";
    
    require_once __DIR__. "/../../autoload/autoload.php";
    
    $id=intval(getInput('id'));
    $edithome=$db->fetchID("category",$id);
    //kt id xem co con ton tai ko
    if(empty($edithome))
    {
        $_SESSION['error']="Dữ liệu không tồn tại ";
        redirectUrl("category");
    }
    //Đổi giá trị
    $home = $edithome['home'] == 0 ? 1 : 0;
    $updatehome = $db->update("category",array("home" => $home), array("id" => $id));

    
    if($updatehome>0){
         $_SESSION['success']=" Cập nhật thành công";
            //Tự động quay về trang danh mục sản phẩm-hàm funciton
        redirectUrl("category");
    }
    else
    {
        $_SESSION['error']="Dữ liệu cập nhật thất bại";
        redirectUrl("category");
    }

    ?>