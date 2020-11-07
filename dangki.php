
<?php require_once __DIR__. "/autoload/autoload.php"; 
    //Bắt lỗi đăng kí tài khoản khi đang dùng tải khoản đăng nhập
    if(isset($_SESSION['name_user']))
    {
        echo "<script> alert('Bạn đang sử dụng tài khoản rồi!! Mời đăng xuất để tiếp tục ');location.href='index.php' </script>";
    }
  

?>
<?php 

    $data=
    [
        "name" => postInput('name'),
        "email" => postInput('email'),
        'password' => MD5(postInput("password")),
        'address' => postInput("address"),
        'phone' => postInput("phone"),
        
        //"images"=> postInput('image')
    ];
    $error=[];
    
    if ($_SERVER["REQUEST_METHOD"]=="POST")
    {   
    if($data['name']=='')
    {
        $error['name']="Mời nhập họ và tên!";
    }
    if(postInput('email')=='')
    {
        $error['email']="Mời bạn nhập đúng email!";
    }
    else
    {   //Kiểm tra xem email có tồn tại chưa
        $checkemail = $db->fetchOne("user","email = '".$data['email']."' ");
        if($checkemail!= NULL)
        {
            $error['email']="Email đã tồn tại!";
        }
    }
    if($data['password']=='')
    {
        $error['password']="Bạn chưa nhập mật khẩu!";
    }
    if(postInput('password2')=='')
    {
        $error['password2']="Bạn chưa nhập lại mật khẩu!";
    }
    if($data['address']=='')
    {
        $error['address']="Mời bạn nhập địa chỉ nào!";
    }
    if($data['phone']=='')
    {
        $error['phone']="Mời bạn nhập số điện thoại!";
    }
    if($data['address']=='')
    {
        $error['address']="Mời nhập địa chỉ!";
        
    }
    //
    if($data['password'] != MD5(postInput("password2")))
    {
        $error['password']="Mật khẩu không khớp";
    }
    if(empty($error))
    {   //kiểm tra xem email đã tồn tại ko(Database)
        $emailin=$db -> insert("user",$data);
        if($emailin > 0)
        {
            $_SESSION['success']="Đăng kí thành công. Mời bạn đăng nhập!!";
            header("location: dangnhap.php");
        }
        else
        {

        }
    }
}
    
?>
<?php require_once __DIR__. "/layouts/header.php"; ?>                
                    <div class="col-md-9 bor" style="width: 500px;"  >
                        <section id="slide"  >
                        <h3 class="title-main" class="text-center" style=" color: green;" > &emsp;&emsp;&emsp;&emsp;&emsp; Đăng kí tài khoản </h3>
                        <form action="" method="POST" class="form-horizontal" role="form">
                            <div class="form-group" >
                              <div class="" >
                                <label style=" font-size: 14px;margin-top: 10px; margin-bottom: 10px" >Họ và tên:</label>

                                <div style="width: 500px; " >
                                     <input  type="text" name="name" placeholder="Your name" class="form-control" value="<?php echo $data['name'] ?>">
                                     </div>
                                     <?php if (isset($error['name'])):?> 
                                            <p class="text-danger"> <?php echo $error['name'] ?></p>
                                    <?php endif?> 
                                    
                                    <label style=" font-size: 14px;margin-top: 10px; margin-bottom: 10px">Email:</label>
                                <div style="width: 500px; " >
                                     <input  type="email" name="email" placeholder="abc@gmail.com" class="form-control" value="<?php echo $data['email'] ?>">
                                    </div> <?php if (isset($error['email'])):?> 
                                            <p class="text-danger"> <?php echo $error['email'] ?></p>
                                    <?php endif?> 
                                    
                                    
                                    <label style="font-size: 14px;margin-top: 10px; margin-bottom: 10px">Mật khẩu:</label>
                                <div style="width: 500px; " >
                                     <input  type="password" name="password" placeholder="*******" class="form-control" value="">
                                    </div>
                                    <?php if (isset($error['password'])):?> 
                                            <p class="text-danger"> <?php echo $error['password'] ?></p>
                                    <?php endif?> 

                                    <label style=" font-size: 14px;margin-top: 10px; margin-bottom: 10px">Nhập lại mật khẩu:</label>
                                    <div style="width: 500px; " >
                                     <input  type="password" name="password2" placeholder="*******" class="form-control" value="">
                                    </div>
                                    <?php if (isset($error['password2'])):?> 
                                            <p class="text-danger"> <?php echo $error['password2'] ?></p>
                                    <?php endif?> 
                                    
                                    <label style="font-size: 14px;margin-top: 10px; margin-bottom: 10px">Số điện thoại:</label>
                                <div style="width: 500px; " >
                                     <input  type="text" name="phone" placeholder="0123456" class="form-control"value="<?php echo $data['phone'] ?>">
                                    </div>
                                    <?php if (isset($error['phone'])):?> 
                                            <p class="text-danger"> <?php echo $error['phone'] ?></p>
                                    <?php endif?> 

                                    <label style="font-size: 14px;margin-top: 10px; margin-bottom: 10px"">Địa chỉ:</label>
                                <div style="width: 500px; " >
                                     <input  type="text" name="address" placeholder="Số nhà, đường, phố, quận, huyện, thành phố" class="form-control"
                                     value="<?php echo $data['address'] ?>">
                                    </div>
                                    <?php if (isset($error['address'])):?> 
                                            <p class="text-danger"> <?php echo $error['address'] ?></p>
                                    <?php endif?> 
                              </div>
                              <button type="submit" class="btn btn-success col-md-8" style="margin-top: 20px; width: 200px; margin-left: 160px">Đăng kí</button>
                              <?php if (isset($error['success'])):?> 
                                            <p class="text-success" style="margin-right:200px; font-size:30px;margin-top: 30px" > <?php echo $error['success'] ?></p>
                                    <?php endif?>
                                
                              </div>
                              
                        </form>
                        </section>

                    </div>
                </div>
<?php require_once __DIR__. "/layouts/footer.php"; ?>
