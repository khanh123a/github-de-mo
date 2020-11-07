
<!--header- lấy từ admin/layouts/header-->
<?php 
    $open="admin";
    require_once __DIR__. "/../../autoload/autoload.php";
    $category = $db->fetchAll("admin");
   
    
    
?>
<?php require_once __DIR__. "/../../layouts/header.php";?>
        <!-- Nội dung-->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">

                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"><a href="/website_phukien/admin/index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Danh mục</li>
                        </ol>
                        <!--In ra thông báo-->
                        <?php require_once __DIR__. "/../../../note/thongbaoloi.php";?>
                        
                        <h3>Danh sách danh mục</h3>
                       <a href="add.php" class="btn btn-info">Thêm mới admin</a>
                       <a href="/website_phukien/admin/index.php" class="btn btn-info">Thoát</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>STT</th>

                                                <th>Tên admin</th>
                                                <th>Email</th>
                                                <th>Điện thoại</th>
                                                <th>Địa chỉ</th>
                                                <th>Hành động</th>
                                                
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php 
                                            $stt=1;
                                            foreach($category as $item): ?>
                                            <tr>
                                                <td><?php echo $stt ?></td>
                                                <td><?php echo $item['name'] ?></td>
                                                <td><?php echo $item['email'] ?></td>
                                                <td><?php echo $item['phone'] ?></td>
                                                <td><?php echo $item['address_adm'] ?></td>
                                                <td>
                                                    <a class="btn btn-xs btn-info" href="edit.php?id=<?php echo $item['id'] ?>">
                                                    <i class="fa fa-edit"></i>Sửa</a>
                                                    <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id'] ?>">
                                                    <i class="fa fa-times"></i>
                                                    Xóa</a>
                                                    
                                                </td>
                                                
                                            </tr>
                                            <?php $stt++;endforeach ?>
                                        </tbody>
                                    </table>
                              
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
<!--footer-->
<?php require_once __DIR__. "/../../layouts/footer.php";?>