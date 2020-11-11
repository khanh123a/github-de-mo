<?php 
    require_once __DIR__. "/autoload/autoload.php";
    //Nếu chauw đăng nhập thì yêu cầu đăng nhập
    if( !isset($_SESSION['name_id']))
    {
        echo "<script> alert('Xin mời bạn đăng nhập!');location.href='dangnhap.php' </script>";
    }
    
    $id= intval($_SESSION['name_id']);
    
    
    if(isset($_GET['page']))
    {
        $p= $_GET['page'];

    }
    else
    {
        $p=1;
    }
    $sql= "SELECT * FROM hoadon  where '$id' = hoadon.users_id ";
    $hoadon=$db->fetchJone('hoadon',$sql,$p,9,true);
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
        <h3>Đơn hàng đã mua</h3>
        <a href="thongtincanhan2.php" class="btn btn-success" >Quay lại</a>
        <br><br>
        <table class="table table-bordered" id="dataTable" style="width:100%;height:300px"" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã hóa đơn</th>
                        <th>Tổng số tiền</th>
                        <th>Ngày thanh toán:</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php 
                    $stt=1;
                    foreach($hoadon as $item): ?>
                    <tr>
                        <td style="width:5%;"><?php echo $stt ?></td>
                        <td style="width:10%;"><a ><?php echo $item['id'] ?></a></td>
                        <td style="width:5%;"> <?php echo formatPrice( $item['amount']) ?>VNĐ</td>
                        <td style="width:10%;"> <?php echo $item['update_at'] ?></td>
                        <td style="width:8%;"> <a class="btn btn-success" href="chitiethoadon.php?id=<?php echo $item['id'] ?>">Xem chi tiết</a></td>
                      
                    </tr>
                    <?php $stt++;endforeach ?>
                </tbody>
            </table>

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