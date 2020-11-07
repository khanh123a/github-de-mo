
<!--header- lấy từ admin/layouts/header-->
<?php 
    $open="category";
    
    require_once __DIR__. "/../../autoload/autoload.php";
    
    $id=intval(getInput('id'));
    $editid=$db->fetchID("category",$id);
    //kt id xem co con ton tai ko
    if(empty($editid))
    {
        $_SESSION['error']="Dữ liệu không tồn tại ";
        redirectUrl("category");

    }
    if ($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $data=
        [
            "name" => postInput('name'),
            "slug" => str_slug(postInput('name'))
        ];
        $error=[];
        if(postInput('name')=='')
        {
            $error['name']="Mời bạn nhập tên danh mục";
        }
        //
        if(empty($error))
        {
            //Kiểm tra xem sửa có bị trùng tên
            if($editid["name"] != $data['name'])
            {
                $count = $db -> fetchOne("category"," name= '" .$data['name']."'");
                if(count($count)>0)
                {
                    $_SESSION["error"]="Danh mục đã tồn tại!";
                }
                else
                {
                    $id_update = $db -> update("category",$data,array("id" => $id));
                    if($id_update>0){
                        $_SESSION['success']=" Cập nhật thành công";
                        //Tự động quay về trang danh mục sản phẩm-hàm funciton
                        redirectUrl("category");
                    }
                    else
                    {
                        $_SESSION['error']="Dữ liệu cập nhật thất bại";
                        redirectUrl("category");
                    }
                }
            }
            else
            {
                $id_update = $db -> update("category",$data,array("id" => $id));
                if($id_update>0){
                     $_SESSION['success']=" Cập nhật thành công";
                        //Tự động quay về trang danh mục sản phẩm-hàm funciton
                    redirectUrl("category");
                }
                else
                {
                    $_SESSION['error']="Dữ liệu cập nhật thất bại";
                    redirectUrl("category");
                }

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
                        <li class="breadcrumb-item active"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a href="index.php">Danh mục</a></li>
                            <li class="breadcrumb-item active">Cập nhật</li>
                        </ol>
                        <h1 class="mt-4">Cập nhật</h1>
                        <!--Thông báo danh mục đã tồn tại-->
                        <?php require_once __DIR__. "/../../../note/thongbaoloi.php";?>
                           
     
                    </div>
                            <div class="card-body">
                                <div class="form-gruop ">
                            
                                <form action="" method="POST">
                                    <div class="form-group row" >
                                        <label for="exampleInputEmail1">Tên danh mục</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="name"
                                        value="<?php echo $editid['name'] ?>" >
                                       <!-- báo lỗi khi chưa nhập-->
                                       <?php
                                            if (isset($error['name'])):?> 
                                            <p class="text-danger"> <?php echo $error['name'] ?></p>
                                            <?php endif ?>    
                                    </div>
                                    </div>
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-success">Lưu</button>
                                        
                                    </div>
                                    </form>
                                    <div class="col-sm-offset-2 col-sm-10">
                                    <a href="index.php"><button class="btn btn-success">Quay lại</button></a>
                                            </div>
                                </div>
                             
                            </div>
                            
                        </div>
                    </div>
                </main>
<!--footer-->
<?php require_once __DIR__. "/../../layouts/footer.php";?>