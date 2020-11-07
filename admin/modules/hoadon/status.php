<?php
require_once __DIR__. "/../../autoload/autoload.php";

    $id=intval(getInput('id'));
    $edithoadon=$db->fetchID("hoadon",$id);
    
    //kt id xem co con ton tai ko
    if(empty($edithoadon))
    {
        $_SESSION['error']="Dữ liệu không tồn tại ";
        redirectUrl("hoadon");

    }
    if($edithoadon['status']==1)
    {
        $_SESSION['error']="Đã xử lý đơn hàng!! ";
        redirectUrl("hoadon");

    }
    //Kiểm tra xem đã cập nhạt, nếu rồi thì đóng nút

    $status =1 ;
    $update = $db->update("hoadon",array("status" => $status), array("id" => $id));

    
    if($update>0){
         $_SESSION['success']=" Cập nhật thành công";
         $sql="SELECT product_id,qty FROM orders where hoadon_id=$id ";
         $order=$db -> fetchsql($sql);
         foreach($order as $item)
         {
             $idproduct=intval($item['product_id']); //lấy tuwf trong bảng order sau khi ép kiểu

             $product=$db -> fetchID("product",$idproduct);
             $number=$product['number']-$item['qty'];//Tính lại số lượng sản phẩm sau khi admin chấp nhận đơn hàng
             // Sau đó cập nhật lại số lượng theo id của product
             $update_product=$db->update("product",array("number"=>$number,"pay"=>$product['pay']+$item['qty']),array("id"=>$idproduct));
         }
            //Tự động quay về trang danh mục sản phẩm-hàm funciton
        redirectUrl("hoadon");
    }
    else
    {
        $_SESSION['error']="Dữ liệu cập nhật thất bại";
        redirectUrl("hoadon");
    }

?>