<?php require_once __DIR__. "/autoload/autoload.php"; 
if(isset($_SESSION['name_user']))
{
    echo "<script> alert('Bạn đang sử dụng tài khoản rồi! ');location.href='index.php' </script>";
}?>
<?php 

    $data=
     [
        'email' => postInput('email'),
        'password' => postInput("password")
         
     ];
     $error=[];
     if ($_SERVER["REQUEST_METHOD"]=="POST")
    {   
        if($data['email']=='')
        {
            $error['email']="Mời nhập Email!";
        }
        if($data['password']=='')
        {
            $error['password']="Mời nhập mật khẩu";
        }
        if(empty($error))
        {
            $icheck = $db->fetchOne("user","email = '".$data['email']."' AND password = '".md5($data['password'])."' ");  
            if($icheck != NULL)
            {   // lấy tên và id người dùng
                $_SESSION['name_user']=$icheck['name'];
                $_SESSION['name_id']=$icheck['id'];
                echo "<script> alert('Đăng nhập thành công');location.href='index.php' </script>";
            }
            else
            {
                //Tài khoản hoặc mật khẩu không đúng
                $_SESSION['error']="";
            }
        }
    }
    

?>
<?php require_once __DIR__. "/layouts/header.php"; ?>                
                <div class="col-md-9 bor" style="width: 500px;">
                    <section id="slide" class="text-center" >
                        <h3 class="title-main" >Đăng nhập</h3>
                        <?php if(isset($_SESSION['success'])): ?>
                            <div class="alert alert-success" style="size: 18;" >
                              <strong style="font-size: 20px;"></strong>
                                  <?php echo $_SESSION['success']; unset($_SESSION['success']) ?>
                              
                            </div>

                            <?php endif ?>
                        
                        <?php if(isset($_SESSION['error'])): ?>
                            <div class="alert alert-danger" >
                              <strong style="font-size: 20px;">  Tài khoản hoặc mật khẩu không chính xác!</strong>
                                  <?php echo $_SESSION['error']; unset($_SESSION['error']) ?>
                              
                            </div>

                            <?php endif ?>
                        <form action="" method="POST" class="form-horizontal" role="form">
                            <div class="form-group">
                              <div class="">
                                <label style="margin-right:700px;">Email:</label>
                                <div style="width: 800px; " >
                                     <input  type="email" name="email" placeholder="abc@gmail.com" class="form-control" value="<?php  echo $data['email'];?>" >
                                     <?php if (isset($error['email'])):?> 
                                            <p class="text-danger"> <?php echo $error['email'] ?></p>
                                        <?php endif ?> 
                                </div> 
                                    <label style="margin-right:700px;">Mật khẩu:</label>
                                <div style="width: 800px; " >
                                     <input  type="password" name="password" placeholder="*******" class="form-control">
                                     <?php if (isset($error['password'])):?> 
                                            <p class="text-danger"> <?php echo $error['password'] ?></p>
                                    <?php endif ?> 
                                    </div> 
                                </div>
                                <button type="submit" class="btn btn-success col-md-8" style="margin-top: 30px; width: 200px;">Đăng nhập</button>
                                <a href="dangki.php" class="btn btn-danger col-md-8" style="margin-left: 60px; margin-top: 30px; width: 200px;margin-right: 60px;">Đăng kí ngay</a>
                            </div>
                        </form>
                    </section>

                </div>
                </div>
<?php require_once __DIR__. "/layouts/footer.php"; ?>
