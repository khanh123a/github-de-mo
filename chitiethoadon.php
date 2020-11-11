<?php 
    require_once __DIR__. "/autoload/autoload.php";
    //Nếu chauw đăng nhập thì yêu cầu đăng nhập
    if( !isset($_SESSION['name_id']))
    {
        echo "<script> alert('Xin mời bạn đăng nhập!');location.href='dangnhap.php' </script>";
    }
    $id=intval(getInput('id'));
    if(isset($_GET['page']))
    {
        $p= $_GET['page'];

    }
    else
    {
        $p=1;
    }
    //$sql= "SELECT * FROM orders  where '$id' = orders.hoadon_id ";
    $sql= "SELECT orders.*,product.id as id_name,  product.name as nameproduct, product.price as gia, product.sale as giam,product.thunbar as anh, orders.qty as soluongmua
    FROM hoadon LEFT JOIN orders on orders.hoadon_id=hoadon.id JOIN product on product.id=orders.product_id where '$id' = orders.hoadon_id ORDER BY ID DESC   ";
    $hoadon=$db->fetchJone('hoadon',$sql,$p,10,true);
    if(isset($hoadon['page']))
    {
        $sotrang = $hoadon['page'];
        unset($hoadon['page']);

    }



     //lay id danh muc trong sp ép kiểu
   

 ?>
 
 

    <?php require_once __DIR__. "/layouts/header.php"; ?>    
    
        <div class="col-md-9 bor">
            <?php  require_once __DIR__. "/note/thongbaoloi.php"; ?>
                
        <div>
        <h3>Chi tiết hóa đơn mã: <?php echo $id; ?></h3>
        <br><br><br>
        <table class="table table-bordered" id="dataTable" style="width:100%;height:300px"" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên phụ kiện</th>
                        <th>Ảnh</th>
                        <th>Giá/Số lượng mua</th>
                        <th>Thời gian</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php 
                    $stt=1;
                    foreach($hoadon as $item): ?>
                    <tr>
                        <td style="width:5%;"><?php echo $stt ?></td>
                        <td style="width:15%;"><a href="chitietsanpham.php?id=<?php echo $item['id_name']?>"><?php echo $item['nameproduct']?></a></td>
                        <td style="width:15%;"><img src="admin/modules/product/images/<?php echo $item['anh']?>" alt=""></td>
                        <td style="width:15%;"> Giá: <?php echo formatPrice( $item['gia']) ?>VNĐ

                            <br>Số lượng:<?php echo formatPrice( $item['soluongmua']) ?>
                            <br>Giảm:<?php echo $item['giam'] ?>%</td>
                            
                        <td style="width:15%;"> <?php echo $item['update_at'] ?></td>
                    </tr>
                    <?php $stt++;endforeach ?>
                </tbody>
            </table>
            <a href="thongtincanhan_donhang.php" class="btn btn-success" >Quay lại</a>
            <!-- Phân trang -->
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


               
            
        </section>
        
        <br>
        <br>
        <br>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9 order-lg-1 order-0">
    
        

<?php require_once __DIR__. "/layouts/footer.php"; ?>