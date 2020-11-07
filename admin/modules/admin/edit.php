
<!--header- lấy từ admin/layouts/header-->
<?php 
    $open="admin";
       
    require_once __DIR__. "/../../autoload/autoload.php";

    $id=intval(getInput('id'));
    $editadm=$db->fetchID("admin",$id);
    
    //kt id xem co con ton tai ko
    if(empty($editadm))
    {
        $_SESSION['error']="Dữ liệu không tồn tại ";
        redirectUrl("admin");

    }
    
    if ($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $data=
        [
            "name" => postInput('name'),
            "email" => postInput("email"),
            "password" => MD5(postInput("password")),
            "address_adm" => postInput("address_adm"),
            "phone" => postInput("phone"),
            "level" => postInput("level")
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
        if(postInput('address_adm')=='')
        {
            $error['address_adm']="Mời bạn nhập địa chỉ nào!";
        }
        if(postInput('phone')=='')
        {
            $error['phone']="Mời bạn nhập số điện thoại!";
        }
        if(postInput('level')=='')
        {
            $error['level']="Mời bạn chọn level!";
        }
        //
        if($data['password'] != MD5(postInput("password_re")))
        {
            $error['password']="Mật khẩu không khớp";
        }
        if(empty($error))
        {
          
            $id_insert=$db -> update("admin",$data,array("id"=>$id));
            if($id_insert)
            {  
                $_SESSION['success']="Cập nhật thành công";
                redirectUrl("admin");
            }
            else
            {
                $_SESSION['error']="Cập nhật thất bại";
                redirectUrl("admin");
                    
            }
        }
    }
    
    
?>

<?php require_once __DIR__. "/../../layouts/header.php";?>
        <!-- Nội dung-->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        
                        <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active"><a href="/index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a href="index.php">Thêm mới admin</a></li>
                            <li class="breadcrumb-item active">Thêm mới Admin</li>
                        </ol>
                        <h1 class="mt-4">Thêm mới admin</h1>
                        <?php require_once __DIR__. "/../../../note/thongbaoloi.php"; ?>
                    </div>
                            <div class="card-body">
                                <div class="form-group ">
                            
                                <form action="" method="POST" enctype="multipart/form-data">
                                   
                                    <div class="form-group row" >
                                        <label for="exampleInputEmail1"><h6>Họ tên  </h6></label>
                                        <div class="col-sm-5" style="padding-left: 2cm;">
                                            <input type="text"  class="form-control" id="exampleInputEmail1" placeholder="Tên admin!"  name="name"
                                             value="<?php echo $editadm['name'] ?>">
                                            <!-- báo lỗi khi chưa nhập-->
                                            <?php if (isset($error['name'])):?> 
                                            <p class="text-danger"> <?php echo $error['name'] ?></p>
                                            <?php endif?> 
                                        </div>   
                                    </div>
                                    <div class="form-group row" >
                                        <label for="exampleInputEmail1"><h6>Email</h6></label>
                                        <div class="col-sm-5" style="padding-left: 2.3cm;">
                                            <input type="email" class="form-control" id="" placeholder="@gmail.com" name="email" 
                                            value="<?php echo $editadm['email'] ?>" >
                                            <!-- báo lỗi khi chưa nhập-->
                                            <?php if (isset($error['email'])):?> 
                                            <p class="text-danger"> <?php echo $error['email'] ?></p>
                                            <?php endif?> 
                                        </div>   
                                    </div>
                                    <div class="form-group row" >
                                        <label for="exampleInputEmail1"><h6>Password</h6></label>
                                        <div class="col-sm-3" style="padding-left: 1.65cm;">
                                            <input type="password" class="form-control" id=""  name="password" placeholder="*******" >
                                            <!-- báo lỗi khi chưa nhập-->
                                            <?php if (isset($error['password'])):?> 
                                            <p class="text-danger"> <?php echo $error['password'] ?></p>
                                            <?php endif?> 
                                        </div>   
                                    </div>
                                    <div class="form-group row" >
                                        <label for="exampleInputEmail1"><h6>ConfigPassword</h6></label>
                                        <div class="col-sm-3">
                                            <input type="password" class="form-control" id=""  name="password_re" placeholder="*******" required=""> 
                                          
                                        </div>   
                                    </div>
                                    <div class="form-group row" >
                                        <label for="exampleInputEmail1" ><h6>Địa chỉ</h6></label>
                                        <div class="col-sm-3" style="padding-left: 2.1cm;">
                                            <input type="text" class="form-control" id="" placeholder="Địa chỉ" name="address_adm"
                                            value="<?php echo $editadm['address_adm'] ?>"  >
                                            <!-- báo lỗi khi chưa nhập-->
                                            <?php if (isset($error['address_adm'])):?> 
                                            <p class="text-danger"> <?php echo $error['address_adm'] ?></p>
                                            <?php endif?> 
                                        </div>   
                                    </div>
                                    
                                    <div class="form-group row" >
                                        <label for="exampleInputEmail1" ><h6>Số điện thoại</h6>  </label>
                                        <div class="col-sm-3" style="padding-left:1cm;">
                                            <input type="text" class="form-control" id=" " placeholder="0123456789" name="phone" 
                                            value="<?php echo $editadm['phone'] ?>" >
                                            <?php if (isset($error['phone'])):?> 
                                            <p class="text-danger"> <?php echo $error['phone'] ?></p>
                                            <?php endif?> 
                                        </div>  
                                       
                                    </div>
                                    <div class="form-group row" >
                                        <label for="exampleInputEmail1" ><h6>Level</h6></label>
                                        <div class="col-sm-3" style="padding-left: 2.3cm;">
                                        <select class="form-control" name="level" id="">
                                                <option value="1">Cộng tác viên</option>
                                                <option value="2">Admin</option>
                                        </select>
                                        <?php if (isset($error['level'])):?> 
                                            <p class="text-danger"> <?php echo $error['level'] ?></p>
                                            <?php endif?>
                                        <!-- báo lỗi khi chưa nhập-->
                                         </div>
                                    </div>
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-success">Thêm</button>
                                    </div>
                                    </form>
                                </div>
                             
                            </div>
                            
                        </div>
                    </div>
                </main>
<!--footer-->
<?php require_once __DIR__. "/../../layouts/footer.php";?>