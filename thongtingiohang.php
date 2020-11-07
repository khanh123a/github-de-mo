<?php require_once __DIR__. "/autoload/autoload.php"; 
$sumall=0;
    if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0)
    {
       
        echo "<script> alert('Trong giỏ hàng của bạn ko có sản phẩm thanh toán!');location.href='index.php' </script>";
    }
    
?>
<title>Giỏ Hàng</title>
<?php require_once __DIR__. "/layouts/header.php"; ?>                
                    <div class="col-md-9 bor" >
                    <?php if(isset($_SESSION['success'])): ?>
                            <div class="alert alert-danger" >
                              <strong style="font-size: 20px;"> </strong>
                                  <?php echo $_SESSION['success']; unset($_SESSION['success']) ?>
                              
                            </div>
                            <?php endif ?>
                        <section class="box-main1"  style="width: 700px;">
                            <h2 class="title-main">Giỏ hàng của bạn!</h2>
                            
                            
                            <table class="table talbe-hover" CELLSPACING = 2; border="1";style="width: 900px;"  >
                                <thead style="background-color:yellow" >
                                    <tr>
                                        <th>STT</th>
                                        <th style="width: 90px;">Tên phụ kiện</th>
                                        <th>Hình ảnh</th>
                                        <th>Số lượng</th>
                                        <th>Giá</th>
                                        <th>Tổng tiền</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    <?php $stt=1; foreach ($_SESSION['cart'] as $key => $value): ?>
                                        <tr>
                                            <td><?php echo $stt ?></td>
                                            <td ><a href="chitietsanpham.php?id=<?php echo $value['id'] ?>"> <?php echo $value['name'] ?></a> </td>
                                            <td>
                                                <img src="admin/modules/product/images/<?php echo $value['thunbar'] ?>" alt="" width="100px" height="120px">
                                            </td>
                                            <td>
                                                <input type="number" name="qty"  value="<?php echo $value['qty'] ?>" class="form-control qty" style="width: 60px;" id="qty" min="0"  >    
                                            </td>
                                            <td>
                                                
                                                <li><?php echo  formatPrice2($value['price']) ?>VNĐ</li>
                                              
                                                
                                            </td>
                                            <td><?php echo  formatPrice2($value['price'] * $value['qty']) ?>VNĐ</td>
                                            <td style="width: 150px;"> 
                                                    <a href="#" class="btn btn-xs btn-info updatecart" data-key=<?php echo $key ?> >
                                                    <i class="fa fa-refresh"></i>Cập nhật</a>


                                                    <a class="btn btn-xs btn-danger" href="thongtingiohang_delete.php?key=<?php echo $key ?>" >
                                                    <i class="fa fa-times" ></i>
                                                    Xóa</a></td>
                                                    
                                        </tr>
                                        <?php $sumall+= $value['price'] * $value['qty'];
                                            $_SESSION['tongtien']=$sumall; ?>
                                    <?php $stt ++; endforeach ?>         
                                   
                                   
                                </tbody>
                            </table>
                        <div class="col-md-5 pull-center" >
                           
                            <ul class="list-group" style="width: 600px; font-size: 20px;" >
                                <li class="list-group-item active" style="font-family: Arial"><h4>Thông tin đơn hàng</h4></li>
                                <li class="list-group-item">
                                Tạm tính:
                                    <span class="badge">
                                    <?php echo  formatPrice2($_SESSION['tongtien']) ?> VNĐ
                                    </span>
                                </li>
                                
                                   <!-- sale
                                   ($_SESSION['tongtien'])
                                    $_SESSION['total']=($_SESSION['tongtien'] -$_SESSION['tongtien']*sale($_SESSION['tongtien'])/100) *11/10 -->
                                    
                                <li class="list-group-item">Thuế VAT:
                                    <span class="badge">
                                    10%
                                    </span></li>
                                <li class="list-group-item" style="color: red;">
                                Tổng số tiền thanh toán:
                                    <span class="badge"> 
                                    <?php  $_SESSION['total']=$_SESSION['tongtien'] *11/10; 
                                     echo  formatPrice2($_SESSION['total'])
                                    ?>VNĐ
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    <a class="btn btn-xs btn-danger" href="index.php" >
                                        </i>Tiếp tục mua hàng
                                    </a>
                                    <a class="btn btn-xs btn-success" href="thanhtoan.php"  >
                                        <i class="fa fa-edit" ></i>Thanh toán</a
                                    ></td>
                                </li>
                            </ul>

                        </div>
                        </section>

                    </div>
                </div>
                
<?php require_once __DIR__. "/layouts/footer.php"; ?>

                   
              