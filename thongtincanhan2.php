<?php 
    require_once __DIR__. "/autoload/autoload.php";
    //Nếu chauw đăng nhập thì yêu cầu đăng nhập
    if( !isset($_SESSION['name_id']))
    {
        echo "<script> alert('Xin mời bạn đăng nhập!');location.href='dangnhap.php' </script>";
    }
    else{
        $id= intval($_SESSION['name_id']);
        $thongtin=$db->fetchID("user",$id);
        
        }
 ?>
 
 

    <?php require_once __DIR__. "/layouts/header.php"; ?>    
    
        <div class="col-md-9 bor">
            <?php  require_once __DIR__. "/note/thongbaoloi.php"; ?>
                <h3>Thông tin cá nhân</h3>
                
                <form action="" method="POST" enctype="multipart/form-data">
                <table style="width: 1000px;">



                    <th style="width: 500px;">
                        <div class="form-group row" >
                            <label for="exampleInputEmail1"><h5>Họ và tên: &emsp;<?php echo $thongtin['name'] ?></h5></label>
             
                        </div>
                        <div class="form-group row" >
                            <label for="exampleInputEmail1"><h5>Email: &emsp; &emsp;&ensp; <?php echo $thongtin['email'] ?></h5></label>
             
                        </div>
                        <div class="form-group row" >
                            <label for="exampleInputEmail1"><h5>Địa chỉ: &emsp; &emsp; <?php echo $thongtin['address'] ?></h5></label>
             
                        </div>
                        <div class="form-group row" >
                            <label for="exampleInputEmail1"><h5>Số điện thoại:  &emsp; <?php echo $thongtin['phone'] ?></h5></label>
             
                        </div>
                         
                        </th>
                        <th>
                       
                        <img src="admin/modules/product/images/user/<?php echo $thongtin['anh'] ?>"  width="250px" height="300px" >
                        <div>Ảnh đại diện</div>
                        </th>
                    </table>
                    <div class="col-sm-offset-2 col-sm-10">
                    <a href="thongtincanhan.php" class="btn btn-success" >Chỉnh sửa thông tin cá nhân</a>
                    <a href="thongtincanhan_donhang.php" class="btn btn-success" >Đơn hàng đã mua</a>
                    
                                   
            </form>
            <br>
            <br><br>
        <div>
        </div>
        </section>
        <br>
        <br>
        <br>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9 order-lg-1 order-0">
    
        

<?php require_once __DIR__. "/layouts/footer.php"; ?>