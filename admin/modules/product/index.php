
<!--header- lấy từ admin/layouts/header-->
<?php 
    $open="product";
    require_once __DIR__. "/../../autoload/autoload.php";
    $product = $db->fetchAll("product");

    //Bắt đầu từ trang 1
    if(isset($_GET['page']))
    {
        $p= $_GET['page'];

    }
    else
    {
        $p=1;
    }
    $sql= "SELECT product.*,category.name as namecate FROM product
    LEFT JOIN category on category.id = product.category_id ";
    $product=$db->fetchJone('product',$sql,$p,10,true);
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
                            <li class="breadcrumb-item active"><a href="/websitephukien/admin/index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Sản phẩm</li>
                        </ol>
                        <!--In ra thông báo-->
                        <?php require_once __DIR__. "/../../../note/thongbaoloi.php";?>
                        
                        <h3>Danh sách sản phẩm</h3>
                       <a href="add.php" class="btn btn-info">Thêm mới</a>
                       <a href="/website_phukien/admin/index.php" class="btn btn-info">Thoát</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" style="width:100%;height:300px"" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>STT</th>

                                                <th>Tên phụ kiện</th>
                                                <th>Ảnh</th>
                                                <th>Giá</th>
                                                <th>Mô tả</th>
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
                                                <td style="width:15%;">
                                                <img src="images/<?php echo $item['thunbar'] ?>" width="100px" height="100px">
                                                
                                                
                                                </td>
                                                <td style="width:15%;">
                                                    <img src="" alt="">
                                                    <ul>
                                                        <li> Giá: <?php echo $item['price'] ?> </li>
                                                        <li> Số lượng: <?php echo $item['number'] ?> </li>
                                                       
                                                    </ul>
                                                </td>

                                                <td style="width:23%;"><?php echo $item['mota'] ?></td>
                                                
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