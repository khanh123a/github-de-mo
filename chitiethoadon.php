<?php 
    require_once __DIR__. "/autoload/autoload.php";
    //Nếu chauw đăng nhập thì yêu cầu đăng nhập
    if( !isset($_SESSION['name_id']))
    {
        echo "<script> alert('Xin mời bạn đăng nhập!');location.href='dangnhap.php' </script>";
    }
    
    $id= intval($_SESSION['name_id']);
    $thongtin=$db->fetchID("user",$id);
    if(empty($thongtin))
    {
        $_SESSION['error']="Dữ liệu người dùng không tồn tại";
        redirectUrl("thongtincanhan.php");

    }
    if ($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $data=
        [
            "name" => postInput('name'),
            "email" => postInput("email"),
            "password" => MD5(postInput("password")),
            "address" => postInput("address"),
            "phone" => postInput("phone")
            //"images"=> postInput('image')
        ];
        $error=[];
       
        if(postInput('name')=='')
        {
            $error['name']="Mời nhập họ và tên!";
        }
        if(postInput('email')=='')
        {
            $error['email']="Mời bạn nhập đúng email!";
        }
        /*else
        {
            $count_insert = $db -> fetchOne("admin"," email= '" .$data['email']."'");
            if(count($count_insert)>0)
            {
                $_SESSION["error"]="email đã tồn tại";
            }
        }*/
        if(postInput('password')=='')
        {
            $error['password']="Bạn chưa nhập mật khẩu!";
        }
        if(postInput('password_re')=='')
        {
            $error['password_re']="Bạn chưa nhập lại mật khẩu!";
        }
        if(postInput('address')=='')
        {
            $error['address']="Mời bạn nhập địa chỉ nào!";
        }
        if(postInput('phone')=='')
        {
            $error['phone']="Mời bạn nhập số điện thoại!";
        }
      
        //
        if($data['password'] != MD5(postInput("password_re")))
        {
            $error['password']="Mật khẩu không khớp";
        }
        if(empty($error))
        {
            if( isset($_FILES['anh']))
            {
                $file_name=$_FILES['anh']['name'];
                $file_tmp=$_FILES['anh']['tmp_name'];
                $file_type=$_FILES['anh']['type'];
                $file_erro=$_FILES['anh']['error'];
                if($file_erro == 0)
                {
                    $part = ROOT ."images/user/"; // trỏ tới file chứa ảnh
                    $data['anh'] = $file_name;
                }

                $id_insert=$db -> update("user",$data,array("id"=>$id));
                if($id_insert)
                {  //auto di chuyển ảnh vào file websitephukien\public\uploads\user
                    move_uploaded_file($file_tmp,$part.$file_name);
                    $_SESSION['success']="Cập nhật thành công";
                    redirectUrl2("thongtincanhan.php");
                }
                else
                {
                    $_SESSION['error']="Cập nhật thất bại";
                    redirectUrl2("thongtincanhan.php");
                        
                }
            }
        }
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
                <h3>Thông tin cá nhân</h3>
                <form action="" method="POST" enctype="multipart/form-data">
                <table style="width: 1000px;">
                    <th style="width: 400px;">
                        <div class="form-group row" >
                            <label for="exampleInputEmail1"><h6>Họ tên:</h6></label>
                            <div class="col-sm-5" style="padding-left: 2cm;">
                                <input type="text" style="width: 250px;" class="form-control" id="exampleInputEmail1" placeholder="Tên admin!"  name="name"
                                value="<?php echo $thongtin['name'] ?>">
                                <!-- báo lỗi khi chưa nhập-->
                                <?php if (isset($error['name'])):?> 
                                <p class="text-danger"> <?php echo $error['name'] ?></p>
                                <?php endif?> 
                            </div>   
                        </div>
                        <div class="form-group row" >
                            <label for="exampleInputEmail1"><h6>Email:</h6></label>
                            <div class="col-sm-5" style="padding-left: 2.3cm;">
                                <input type="email" class="form-control" style="width: 250px;" id="" placeholder="@gmail.com" name="email" 
                                value="<?php echo $thongtin['email'] ?>" >
                                <!-- báo lỗi khi chưa nhập-->
                                <?php if (isset($error['email'])):?> 
                                <p class="text-danger"> <?php echo $error['email'] ?></p>
                                <?php endif?> 
                            </div>   
                        </div>
                        <div class="form-group row" >
                            <label for="exampleInputEmail1"><h6>Password</h6></label>
                            <div class="col-sm-3" style="padding-left: 1.65cm;">
                                <input type="password" class="form-control" style="width: 250px;" id=""  name="password" placeholder="*******" >
                                <!-- báo lỗi khi chưa nhập-->
                                <?php if (isset($error['password'])):?> 
                                <p class="text-danger"> <?php echo $error['password'] ?></p>
                                <?php endif?> 
                            </div>   
                        </div>
                        <div class="form-group row" >
                            <label for="exampleInputEmail1"><h6>ConfigPassword</h6></label>
                            <div class="col-sm-3">
                                <input type="password" class="form-control" style="width: 250px;" id=""  name="password_re" placeholder="*******" required=""> 
                                
                            </div>   
                        </div>
                        <div class="form-group row" >
                            <label for="exampleInputEmail1" ><h6>Địa chỉ</h6></label>
                            <div class="col-sm-3" style="padding-left: 2.1cm;">
                                <input type="text" class="form-control" style="width: 250px;" id="" placeholder="Địa chỉ" name="address"
                                value="<?php echo $thongtin['address'] ?>"  >
                                <!-- báo lỗi khi chưa nhập-->
                                <?php if (isset($error['address'])):?> 
                                <p class="text-danger"> <?php echo $error['address'] ?></p>
                                <?php endif?> 
                            </div>   
                        </div>
                        
                        <div class="form-group row" >
                            <label for="exampleInputEmail1" ><h6>Số điện thoại</h6>  </label>
                            <div class="col-sm-3" style="padding-left:1cm;">
                                <input type="text" class="form-control" style="width: 250px;" id=" " placeholder="0123456789" name="phone" 
                                value="<?php echo $thongtin['phone'] ?>" >
                                <?php if (isset($error['phone'])):?> 
                                <p class="text-danger"> <?php echo $error['phone'] ?></p>
                                <?php endif?> 
                            </div>  
                            
                        </div>
                                
                                
                        </th>
                        <th>
                        <img src="admin/modules/product/images/user/<?php echo $thongtin['anh'] ?>"  width="250px" height="300px" >
                        <div class="col-sm-5">
                             <input type="file" class="form-control" id="" placeholder="Ảnh" name="anh">
                        </div>
                        </th>
                    </table>
                    <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Cập nhật</button>
                    </div>  
                                   
            </form>
            <br>
            <br><br>
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