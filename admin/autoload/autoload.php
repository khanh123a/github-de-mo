<?php 
    //trong quá trinh thêm và các trang khác khai báo để hoạt động $_SESSION
    session_start();
    require_once __DIR__. "/../../libraries/Database.php";
    require_once __DIR__. "/../../libraries/Function.php";
    $db = new Database;
    define("ROOT",$_SERVER['DOCUMENT_ROOT']."/websitephukien/admin/modules/product/");
    
    define("ROOT2",$_SERVER['DOCUMENT_ROOT']."/websitephukien/admin/modules/user/");
    
    
?>