<?php require_once __DIR__. "/autoload/autoload.php"; 
 $user=$db->fetchID("user",intval($_SESSION['name_id']));
/*if( !isset($_SESSION['name_id']))
{
    echo "<script> alert('Xin mời bạn đăng nhập!');location.href='index.php' </script>";

}
*/
if ($_SERVER["REQUEST_METHOD"]=="POST")
{
    $data=
    [
        'amount' => $_SESSION['total'],
        'users_id' => $_SESSION['name_id'],
        'note' => postInput("note")
        
    ];
    $inserth=$db -> insert("hoadon",$data);
    if($inserth>0)
    {
        foreach($_SESSION['cart'] as $key => $value)
        {

            
            $data2=
            [
                'hoadon_id' => $inserth,
                'product_id' => $key,
                // lấy trong giỏ hàng
                'qty' => $value['qty'],
                'price' => $value['price']
            ];
            $insert_order=$db -> insert("orders",$data2);
        }
        //thanh toán thành công sẽ huy đi đơn hàng
        unset($_SESSION['cart']);
        unset($_SESSION['total']);
        $_SESSION['success']="Bạn đã thanh toán thành công, Đơn hàng của bạn đang được xử lý!";
        header("location:thongbao.php");
    }


}
?>
<title>Giỏ Hàng</title>
<?php require_once __DIR__. "/layouts/header.php"; ?>                
                    <div class="col-md-9 bor" >
                      
                        <section class="box-main1"  style="width: 700px;">
                            <h2 class="title-main">Thanh toán</h2>
                            <form action="" method="POST" class="form-horizontal" role="form">
                            <div class="form-group">
                              <div class="" style="margin-top: 5px; margin-bottom: -10px;">
                                <label style="margin-right:600px; " >Họ và tên:</label>

                                <div style="width: 500px; " >
                                     <input  type="text" name="name" placeholder="Your name" class="form-control" readonly value="<?php echo $user['name'] ?>">
                                     </div>
                                     
                                    
                                    <label style="margin-right:600px;">Email:</label>
                                <div style="width: 500px; " >
                                     <input  type="email" name="email" placeholder="abc@gmail.com" class="form-control" readonly value="<?php echo $user['email'] ?>">

                                    <label >Số điện thoại:</label>
                                <div style="width: 500px; " >
                                     <input  type="text" name="phone" placeholder="0123456" class="form-control" readonly value="<?php echo $user['phone'] ?>">
                                    </div>

                                    <label >Địa chỉ :</label>
                                <div style="width: 500px; " >
                                     <input  type="text" name="address"  readonly value="<?php echo $user['address'] ?>" class="form-control"
                                     >
                                    </div>
                                    
                                    <label >Ghi chú :</label>
                                <div style="width: 500px; " >
                                     <input  type="text" name="note"  placeholder="Bạn có yêu cầu gì khác không?" class="form-control"
                                     >
                                    </div>
                                    

                                    <label >Số tiền phải thanh toán:</label>
                                <div style="width: 500px; " >
                                     <input  type="text" name="total" readonly placeholder="Số nhà, đường, phố, quận, huyện, thành phố" class="form-control"
                                     value="<?php echo formatPrice2($_SESSION['total']); ?> VNĐ">
                                    </div>
                                    

                                   
                              </div>
                              <button type="submit" class="btn btn-success col-md-8" style="margin-top: 20px;">Thanh Toán</button>
                              
                              </div>
                        </form>
                        
                        </section>

                    </div>
                </div>
                
<?php require_once __DIR__. "/layouts/footer.php"; ?>
