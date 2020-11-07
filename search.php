<?php 
    require_once __DIR__. "/autoload/autoload.php";
    $open="category";
    $s=$_GET['name'];
			$search= "SELECT * FROM product WHERE name LIKE '%$s%' ORDER BY ID DESC ";
			$searchproduct= $db ->fetchsql($search);


 ?>

<?php require_once __DIR__. "/layouts/header.php"; ?>    
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-9 order-lg-1 order-0">
    <div class="product-section">
        <div class="content-product-box">
         
                <div class="row">
                <?php foreach($searchproduct as $item): ?>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="item-product">
                        
                            <div class="thumb">
                                <a href="chitietsanpham.php?id=<?php echo $item['id'] ?>"><img src="admin/modules/product/images/<?php echo $item['thunbar'] ?>" alt=""></a>
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