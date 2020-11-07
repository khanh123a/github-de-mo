<?php 
    require_once __DIR__. "/autoload/autoload.php";
    $open="category";
    $id= intval(getInput('id'));
    $editCategory=$db->fetchID("category",$id);
    //Hàm phân trang ở database
    // kiểm tra xem hiện đang ở trong bn?
    if(isset($_GET['p']))
    {
        $p = $_GET['p'];
    }
    else
    {
        $p=1;
    }

    $sql=" SELECT *FROM product WHERE category_id = $id";
    $total = count($db->fetchsql($sql));

    $product = $db->fetchJones("product",$sql,$total,$p,5,true); // 9 là sp/ trang
    $sotrang=$product["page"];
    unset($product["page"]);
    //lấy tên dường dẫn
    $path =$_SERVER['SCRIPT_NAME'];


 ?>

<?php require_once __DIR__. "/layouts/header.php"; ?>    
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-9 order-lg-1 order-0">
    <div class="product-section">
        <div class="content-product-box">
            <h3><?php echo $editCategory['name'] ?></h3>
                <div class="row">
                <?php foreach($product as $item): ?>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="item-product">
                        
                            <div class="thumb">
                                <a href="chitietsanpham.php?id=<?php echo $item['id'] ?>"><img src="admin/modules/product/images/<?php echo $item['thunbar'] ?>" style="width: 200px;height: 200px;" alt=""></a>
                                <span class="sale">Giảm <br><?php echo $item['sale'] ?>%</span>
                                <div class="action">
                                    <a href="addcart.php?id=<?php echo $item['id'] ?>" class="buy"><i class="fa fa-cart-plus"></i>Add Cart</a>
                                    <a href="#" class="like"><i class="fa fa-heart"></i> Yêu thích</a>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="info-product">
                                <h4><a href="chitietsanpham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a></h4>
                                <div class="price">
                                    <span class="price-current">Giá:<?php echo formatPrice2(money($item['price'],$item['sale'])) ?>đ</span>
                                    <span class="price-old"><?php echo formatPrice2($item['price'])  ?>₫</span>
                                    <br>
                                    <span class="price-current">Còn:<?php echo $item['number'] ?>sp</span>
                                </div>
                                
                                <a href="chitietsanpham.php?id=<?php echo $item['id'] ?>" class="view-more">Xem chi tiết</a>
                            </div>
                            
                        </div>
                    </div>
                <?php endforeach ?>		
                </div>
												
        <nav class="text-center">
            <ul class="pagination" >
                <?php for ($i=1;$i<=$sotrang;$i++) :?>
                    <li class="<?php echo isset($_GET['p']) && $_GET['p'] == $i ? 'active': ''  ?>" >
                    <a  href="<?php echo $path?> ?id=<?php echo $id ?> 
                    &&p=<?php echo $i ?>" style="position: relative;
                                            float: left;
                                            padding-top: 6px;
                                            padding-right: 12px;
                                            padding-bottom: 6px;
                                            padding-left: 12px;
                                            margin-left: -1px;
                                            line-height: 1.42857143;
                                            color: #337ab7;
                                            text-decoration: none;
                                            background-color: #fff;
                                            border: 1px solid #ddd;"><?php echo $i ?></a>
                    </li>
                <?php endfor; ?>

            </ul>

        </nav>

    </div>
    
 </div>

<?php require_once __DIR__. "/layouts/footer.php"; ?>