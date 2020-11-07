
<!--header- lấy từ admin/layouts/header-->
<?php 
    $open="hoadon";
    require_once __DIR__. "/../../autoload/autoload.php";
    $hoadon = $db->fetchAll("hoadon");

    //Bắt đầu từ trang 1
    if(isset($_GET['page']))
    {
        $p= $_GET['page'];

    }
    else
    {
        $p=1;
    }
    $sql= "SELECT hoadon.*, user.name as nameuser, user.phone as phone,user.email as email, orders.product_id as productid, orders.price as gia, product.name as nameproduct, orders.qty as soluongmua
    FROM hoadon LEFT JOIN user ON user.id=hoadon.users_id JOIN orders on orders.hoadon_id=hoadon.id JOIN product on product.id=orders.product_id ORDER BY ID DESC   ";
    $hoadon=$db->fetchJone('hoadon',$sql,$p,9,true);
    if(isset($hoadon['page']))
    {
        $sotrang = $hoadon['page'];
        unset($hoadon['page']);

    }

    
    
?>
<?php require_once __DIR__. "/../../layouts/header.php";?>
        <!-- Nội dung-->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">

                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"><a href="/website_phukien/admin/index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Đơn hàng</li>
                        </ol>
                        <!--In ra thông báo-->
                        <?php require_once __DIR__. "/../../../note/thongbaoloi.php";?>
                        
                        <h3>Danh sách đơn hàng</h3>
                      
                       <a href="/website_phukien/admin/index.php" class="btn btn-info">Thoát</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" style="width:100%;height:300px"" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>STT</th>

                                                <th>Tên </th>
                                                
                                                <th>Email/Số điện thoại</th>
                                                <th>Đặt mua</th>
                                                <th>Yêu cầu/Tổng tiền</th>
                                                <th>Trạng thái</th>
                                                
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php 
                                            $stt=1;
                                            foreach($hoadon as $item): ?>
                                            <tr>
                                                <td style="width:5%;"><?php echo $stt ?></td>
                                                <td style="width:15%;"><?php echo $item['nameuser'] ?></td>
                                                
                                                <td style="width:10%;">
                                                        <?php echo $item['email'] ?>
                                                        <?php echo $item['phone'] ?>
                                                </td>
                                                <td style="width:15%;">
                                                    <?php echo $item['nameproduct']?>
                                                    <br>Số lượng:
                                                    <?php echo $item['soluongmua'] ;?>
                                                </td>
                                                <td style="width:15%;">
                                                    <?php echo $item['note']?>
                                                    <br>Số tiền:
                                                <?php echo formatPrice($item['gia'])?>
                                                
                                                VNĐ</td>
                                                <td style="width:10%;">
                                                <!--Xét trạng thái status trong mysqp.user -->
                                                <a href="status.php?id=<?php echo $item['id'] ?>"
                                                     class="btn btn-xs <?php echo $item['status']==1? 'btn-info': 'btn-danger' ?>" >
                                                   <?php echo $item['status']==0 ?'Chưa duyệt':'Đã duyệt' ?></a> 
                                                </a>
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