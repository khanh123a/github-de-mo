
<!--header- lấy từ admin/layouts/header-->
<?php 
    
    require_once __DIR__. "/../autoload/autoload.php";
    $category = $db->fetchAll("category");
    
    
?>
<?php require_once __DIR__. "/layouts/header.php";?>
<!-- Nội dung-->
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <h1 class="mt-4">Xin chào bạn đến với trang quản trị!!</h1>
                        
                        
                        
                    </div>
                </main>
<!--footer-->
<?php require_once __DIR__. "/layouts/footer.php";?>