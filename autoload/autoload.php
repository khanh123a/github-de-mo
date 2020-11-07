<?php 
    //trong quá trinh thêm và các trang khác khai báo để hoạt động $_SESSION
    session_start();
    require_once __DIR__. "/../libraries/Database.php";
    require_once __DIR__. "/../libraries/Function.php";
    $db = new Database;
    define("ROOT",$_SERVER['DOCUMENT_ROOT']."/websitephukien/admin/modules/product/");
    //define("ROOT2",$_SERVER['DOCUMENT_ROOT']."/website_phukien/layouts/");
    $category= $db->fetchAll("category");
    $user_idname= $db->fetchAll("user");

    //lấy ds sản phẩm mới
    $sqlN= "SELECT * FROM product WHERE 1 ORDER BY ID DESC LIMIT 3";
    $productNew= $db -> fetchsql($sqlN);
    //Sản phẩm bán chạy
    $sqlpay= "SELECT * FROM product WHERE 1 ORDER BY PAY DESC LIMIT 4";
    $productPay= $db -> fetchsql($sqlpay);
    $search= "SELECT id,name,sale FROM product WHERE name LIKE '' ORDER BY ID DESC ";
    $searchproduct= $db ->fetchsql($search);
?>