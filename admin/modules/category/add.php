
<!--header- lấy từ admin/layouts/header-->
<?php 
       
    require_once __DIR__. "/../../autoload/autoload.php";
    if ($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $data=
        [
            "name" => postInput('name'),
            "slug" => str_slug(postInput('name'))
            //"images"=> postInput('image')
        ];
        $error=[];
        if(postInput('name')=='')
        {
            $error['name']="Mời bạn nhập tên danh mục";
        }
        //
        if(empty($error))
        {
            
            //kiểm tra xem danh mục đã tồn tại ko(Database)
            $count_insert = $db -> fetchOne("category"," name= '" .$data['name']."'");
            if(count($count_insert)>0)
            {
                $_SESSION["error"]="Danh mục đã tồn tại!";
            }
            else
            {
                $id_insert = $db -> insert("category",$data);

                if($id_insert>0){
                    $_SESSION['success']=" Thêm mới thành công";
                    //Tự động quay về trang danh mục sản phẩm-hàm funciton.
                    redirectUrl("category");

                    }
                else
                {
                    $_SESSION['error']=" Thêm mới thất bại";
                    //Thêm mới thất bại
                };
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
                                <a href="index.php">Danh mục</a></li>
                            <li class="breadcrumb-item active">Thêm mới danh mục</li>
                        </ol>
                        <h1 class="mt-4">Thêm mới danh mục</h1>
                        <?php require_once __DIR__. "/../../../note/thongbaoloi.php"; ?>
                    </div>
                            <div class="card-body">
                                <div class="form-gruop ">
                            
                                <form action="" method="POST">
                                    <div class="form-group row" >
                                        <label for="exampleInputEmail1">Tên danh mục</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" >
                                       <!-- báo lỗi khi chưa nhập-->
                                       <?php
                                            if (isset($error['name'])):?> 
                                            <p class="text-danger"> <?php echo $error['name'] ?></p>
                                            <?php endif
                                          ?>    
                                    </div>
                                    </div>
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-success">Lưu</button>
                                    </div>
                                    </form>
                                </div>
                             
                            </div>
                            
                        </div>
                    </div>
                </main>
<!--footer-->
<?php require_once __DIR__. "/../../layouts/footer.php";?>