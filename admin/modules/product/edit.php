
<!--header- lấy từ admin/layouts/header-->
<?php 
    $open="category";
       
    require_once __DIR__. "/../../autoload/autoload.php";

    $id=intval(getInput('id'));
    $editid=$db->fetchID("product",$id);
    
    //kt id xem co con ton tai ko
    if(empty($editid))
    {
        $_SESSION['error']="Dữ liệu không tồn tại ";
        redirectUrl("product");

    }

    $category=$db->fetchAll("category");
    if ($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $data=
        [
            "name" => postInput('name'),
            "slug" => str_slug(postInput("name")),
            "category_id" => postInput("category_id"),
            "price" => postInput("price"),
            "sale" => postInput("sale"),
            "number" => postInput("number"),
            "mota" => postInput("mota")
            //"images"=> postInput('image')
        ];
        $error=[];
        if(postInput('name')=='')
        {
            $error['name']="Mời bạn nhập tên danh mục!";
        }
        if(postInput('category_id')=='')
        {
            $error['category_id']="Mời bạn chọn danh mục!";
        }
        if(postInput('price')=='')
        {
            $error['price']="Mời bạn nhập giá!";
        }
        if(postInput('number')=='')
        {
            $error['number']="Mời bạn nhập số lượng!";
        }
        if(! isset ($_FILES['thunbar']))
        {
            $error['thunbar']="Mời bạn chọn hình ảnh!";
        }
        
        if(postInput('mota')=='')
        {
            $error['mota']="Mời bạn nhập mô tả ví dụ chức năng và công suất!";
        }
        //
        if(empty($error))
        {
            if( isset($_FILES['thunbar']))
            {
                $file_name=$_FILES['thunbar']['name'];
                $file_tmp=$_FILES['thunbar']['tmp_name'];
                $file_type=$_FILES['thunbar']['type'];
                $file_erro=$_FILES['thunbar']['error'];
                if($file_erro == 0)
                {
                    $part = ROOT ."images/"; // trỏ tới file chứa ảnh
                    $data['thunbar'] = $file_name;
                }
                //update
                $update=$db -> update("product",$data,array ("id" =>$id));
                if($update>0)
                {   //auto di chuyển file vào file website_phukien\public\uploads\product
                    move_uploaded_file($file_tmp,$part.$file_name);
                    $_SESSION['success']=" Cập nhật thành công";
                    //Tự động quay về trang danh mục sản phẩm-hàm funciton
                    redirectUrl("product");
                }
                else
                {
                    $_SESSION['error']="Dữ liệu cập nhật thất bại";
                    redirectUrl("product");
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
                        <li class="breadcrumb-item active"><a href="/index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">
                                <a href="index.php">Sản phẩm</a></li>
                            <li class="breadcrumb-item active">Sửa sản phẩm</li>
                        </ol>
                        <h1 class="mt-4">Sửa sản phẩm</h1>
                        <?php require_once __DIR__. "/../../../note/thongbaoloi.php"; ?>
                    </div>
                            <div class="card-body">
                                <div class="form-group ">
                            
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-group row" >
                                            <label for="exampleInputEmail1"><h6>Chọn danh mục</h6></label>
                                            <div class="col-sm-5">
                                                <select  class="form-control col-md-8" id="" name="category_id">
                                                <option > Mời chọn danh mục </option>
                                                    <?php foreach($category as $item): ?>
                                                    <option value="<?php echo $item['id'] ?>"
                                                    <?php echo $editid['category_id']== $item['id'] ? "selected = 'selected'":'' ?>>
                                                    <?php echo $item['name'] ?> </option>
                                                    </option>
                                                    
                                                    <?php endforeach ?>
                                                    
                                                </select>
                                                <!-- báo lỗi khi chưa nhập-->
                                                <?php if (isset($error['category_id'])):?> 
                                                    <p class="text-danger"> <?php echo $error['category_id'] ?></p>
                                                    <?php endif?>
                                               
                                            </div>   
                                        </div>
                                    <div class="form-group row" >
                                        <label for="exampleInputEmail1"><h6>Tên sản phẩm</h6></label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tên sản phẩm"  name="name"
                                            value="<?php echo $editid['name'] ?>" >
                                            <!-- báo lỗi khi chưa nhập-->
                                            <?php if (isset($error['name'])):?> 
                                            <p class="text-danger"> <?php echo $error['name'] ?></p>
                                            <?php endif?> 
                                        </div>   
                                    </div>
                                    <div class="form-group row" >
                                        <label for="exampleInputEmail1"><h6>Giá sản phẩm</h6></label>
                                        <div class="col-sm-3">
                                            <input type="number" class="form-control" id="" placeholder="VNĐ" name="price" 
                                            value="<?php echo $editid['price'] ?>" >
                                            <!-- báo lỗi khi chưa nhập-->
                                            <?php if (isset($error['price'])):?> 
                                            <p class="text-danger"> <?php echo $error['price'] ?></p>
                                            <?php endif?> 
                                        </div>   
                                    </div>
                                    <div class="form-group row" >
                                        <label for="exampleInputEmail1"><h6>Số lượng</h6></label>
                                        <div class="col-sm-3">
                                            <input type="number" class="form-control" id="" placeholder="0,1,2..." name="number"
                                            value="<?php echo $editid['number'] ?>"  >
                                            <!-- báo lỗi khi chưa nhập-->
                                            <?php if (isset($error['number'])):?> 
                                            <p class="text-danger"> <?php echo $error['number'] ?></p>
                                            <?php endif?> 
                                        </div>   
                                    </div>
                                    
                                    <div class="form-group row" >
                                        <label for="exampleInputEmail1"><h6>Giảm giá . . .(%)</h6>  </label>
                                        <div class="col-sm-3">
                                            <input type="number" class="form-control" id=" " placeholder="15%" name="sale" value="0"
                                            value="<?php echo $editid['sale'] ?>" >
                                        </div>  
                                        <label for="exampleInputEmail1" ><h6>Hình ảnh </h6>  </label>
                                        <div class="col-sm-5">
                                            <input type="file" class="form-control" id="" placeholder="Ảnh" name="thunbar" 
                                            >
                                            <?php if (isset($error['thunbar'])):?> 
                                            <p class="text-danger"> <?php echo $error['thunbar'] ?></p>
                                            <?php endif?> 
                                            
                                            <img src="images/<?php echo $item['thunbar']?>" width="30px" height="30px">
                                        </div>   
                                    </div>
                                    <div class="form-group row" >
                                        <label for="exampleInputEmail16"><h6>Mô tả phụ kiện</h6></label>
                                        <div class="col-sm-6">
                                            <textarea type="text" class="col-sm-8"  rows="5" name="mota"><?php echo $editid['mota'] ?>  </textarea>
                                             
                                        </div> 
                                        <?php if (isset($error['mota'])):?> 
                                            <p class="text-danger"> <?php echo $error['mota'] ?></p>
                                            <?php endif?>
                                        <!-- báo lỗi khi chưa nhập-->
                                         
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