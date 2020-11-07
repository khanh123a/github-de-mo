
<!--header- lấy từ admin/layouts/header-->
<?php 
    $open="user";
    require_once __DIR__. "/../../autoload/autoload.php";
    $user = $db->fetchAll("user");

    //Bắt đầu từ trang 1
    if(isset($_GET['page']))
    {
        $p= $_GET['page'];

    }
    else
    {
        $p=1;
    }
    $sql= "SELECT user.* FROM user ORDER BY ID DESC";
    //Phân trang
    $product=$db->fetchJone('user',$sql,$p,5,true);
    if(isset($product['page']))
    {
        $sotrang = $product['page'];
        unset($product['page']);

    }

    
    
?>
<?php require_once __DIR__. "/../../layouts/header.php";?>
        <!-- Nội dung-->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">

                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"><a href="/website_phukien/admin/index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Thành viên</li>
                        </ol>
                        <!--In ra thông báo-->
                        <?php require_once __DIR__. "/../../../note/thongbaoloi.php";?>
                        
                        <h3>Danh sách thành viên</h3>
                       <a href="#" class="btn btn-info">Thêm mới</a>
                       <a href="/website_phukien/admin/index.php" class="btn btn-info">Thoát</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" style="width:100%;height:300px"" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>STT</th>

                                                <th>Tên </th>
                                                <th>Email</th>
                                                <th>Địa chỉ</th>
                                                <th>Điện thoại</th>
                                                <th>Hành động</th>
                                                
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php 
                                            $stt=1;
                                            foreach($product as $item): ?>
                                            <tr>
                                                <td style="width:5%;"><?php echo $stt ?></td>
                                                <td style="width:25%;"><?php echo $item['name'] ?></td>
                                                <td style="width:25%;"><?php echo $item['email'] ?></td>
                                                <td style="width:25%;">
                                                <li> <?php echo $item['phone'] ?> </li>
                                                </td>
                                                <td style="width:25%;">
                                                <li> <?php echo $item['address'] ?> </li>
                                                </td>
                                                    
                                               
                                                <td>
                                                   
                                                    <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id'] ?>">
                                                    <i class="fa fa-times"></i>
                                                    Xóa</a>
                                                    
                                                </td>
                                                
                                            </tr>
                                            <?php $stt++;endforeach ?>
                                        </tbody>
                                    </table>
                                <div class="pull-right">
                                    <!--Phân trang-->
                                    <nav aria-label="Page navigation example" >
                                        <ul class="pagination">
                                            <li class="page-item">
                                                <a href="" aria-label="Previous" class="page-link">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a> 
                                            </li>
                                            <?php for( $i=1 ; $i<=$sotrang ; $i++ ): ?>
                                             <?php
                                                if(isset($_GET['page']))
                                                {
                                                    $p=$_GET['page'];

                                                }
                                                else
                                                {
                                                    $p=1;
                                                } ?>
                                                
                                                <!--Số trang-->
                                                <li class="<?php echo ($i == $p)? 'active' : '' ?>">
                                                <a href="?page=<?php echo $i ; ?>" class="page-link"><?php echo $i; echo "  ";  ?></a>
                                            <?php endfor; ?>

                                            </li>
                                            <li class="page-item">
                                            <a href="" aria-label="Next" class="page-link">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a> 
                                            </li>
                                        </ul>
                                    </nav>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
<!--footer-->
<?php require_once __DIR__. "/../../layouts/footer.php";?>