<?php require_once __DIR__. "/autoload/autoload.php"; 
if( !isset($_SESSION['name_id']))
{
    echo "<script> alert('Xin mời bạn đăng nhập!');location.href='dangnhap.php' </script>";
}
$sumall=0;
if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0)
{
    
    echo "<script> alert('Trong giỏ hàng của bạn ko có sản phẩm thanh toán!');location.href='index.php' </script>";
}
if ($_SERVER["REQUEST_METHOD"]=="POST")
{
   
    $qty= $_POST["qty"];
    $id= $_POST["id"];
        $soluong=intval(getInput(['soluong']));
        $product=$db->fetchID("product",$id);
        //Nếu giỏ hàng đã có sản pẩm thì cập nhật thêm, nếu không tạo mới 1 giỏ hàng
        if(! isset($_SESSION['cart'][$id]))
        {
            //tạo mới giỏ hàng
            $_SESSION['cart'][$id]['name'] = $product['name'];
            $_SESSION['cart'][$id]['id'] = $product['id'];
            
            $_SESSION['cart'][$id]['thunbar'] = $product['thunbar'];
            $_SESSION['cart'][$id]['qty'] = 1;
            $_SESSION['cart'][$id]['price'] =((100-$product['sale']) * $product['price'])/100;
            
            
        }
        else
        {  
            if($qty >= $product['number'])
            {
                $_SESSION['cart'][$id]['qty'] =$product['number'];
                echo "<script> alert('Số lượng phụ kiện trong cửa hàng đã đạt tối đa'); location.href='thongtingiohang.php' </script>";
            }
            if
            ($qty <= 1)
            {
                $_SESSION['cart'][$id]['qty'] =$product['number'];
                echo "<script> alert('Số lượng ít nhất là 1'); location.href='thongtingiohang.php' </script>";
            }
            //cập nhật lại giỏ hàng khi có sản phẩm trùng
            else{
            $_SESSION['cart'][$id]['qty'] = $qty;
            $_SESSION['success']="Cập nhật thành công sản phẩm!";
            }
        }
        
        echo "<script> location.href='thongtingiohang.php' </script>";


}  


    
?>
<title>Giỏ Hàng</title>
<?php require_once __DIR__. "/layouts/header.php"; ?>                
                    <div class="col-md-9 bor" >
                    <?php if(isset($_SESSION['success'])): ?>
                            <div class="alert alert-success" >
                              <strong style="font-size: 20px;"> </strong>
                                  <?php echo $_SESSION['success']; unset($_SESSION['success']) ?>
                              
                            </div>
                            <?php endif ?>
                        <section class="box-main1"  style="width: 700px;">
                            <h2 class="title-main">Giỏ hàng của bạn!</h2>
                            
                            <form action="" method="POST" class="form-horizontal" role="form">
                          
                            <table class="table talbe-hover" CELLSPACING = 2; border="1";style="width: 1000px;"  >
                                <thead style="background-color:silver" >
                                    <tr>
                                        <th style="width: 5px;">STT</th>
                                        <th style="width: 90px;">Tên phụ kiện</th>
                                        <th >Hình ảnh</th>
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
                                            <td style="width:160px">
                                                <img src="admin/modules/product/images/<?php echo $value['thunbar'] ?>" alt="" width="120px" height="120px">
                                            </td>
                                            <td style="width:160px">
                                            <form action="" method="POST" class="form-horizontal" role="form">
                                                <input type="number" name="qty"  value="<?php echo $value['qty']; ?>" class="form-control" style="width: 60px;" id="qty" min="0"  >    
                                                <input style="display: none;" type="number" name="id"  value="<?php echo $key; ?>" class="form-control" style="width: 60px;" id="qty" min="0"  >   
                                                <a class="btn btn-xs btn-danger"  href="cart_no.php?id=<?php echo $key ?>"  >
                                                        -</a>  
                                                <a class="btn btn-xs btn-success" href="addcart.php?id=<?php echo $key ?>" >
                                                        +</a>
                                                        </div>
                                                        <button type="submit"   class="btn btn-success col-md-8"  style="margin-top: 20px;">Cập nhật</button>
                                                        
                                                        </div>        
                                            </form>
                                            </td>
                                            <td> 
                                                <?php echo  formatPrice2($value['price']) ?>VNĐ
                                            </td>
                                            <td><?php echo  formatPrice2($value['price'] * $value['qty']) ?>VNĐ</td>
                                            <td> 
                                                    
                                                    <a class="btn btn-xs btn-danger" href="thongtingiohang_delete.php?key=<?php echo $key ?>" >
                                                    <i class="fa fa-times" ></i>Xóa</a>
                                                   
                                                    
                                            </td>
                                                    
                                        </tr>
                                        <?php $sumall+= $value['price'] * $value['qty'];
                                            $_SESSION['tongtien']=$sumall; ?>
                                    <?php $stt ++; endforeach ?>         
                                   
                                   
                                </tbody>
                                </form>
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
                                    <a class="btn btn-xs btn-success" href="index.php" >
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

                   
              