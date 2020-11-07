<?php 
    require_once __DIR__. "/autoload/autoload.php";
    $open="product";
    $id= intval(getInput('id'));
    $productz=$db->fetchID("product",$id);

     //lay id danh muc trong sp ép kiểu
    $id_dm=intval($productz['category_id']);
    $sql=" SELECT *FROM product WHERE category_id=$id_dm ORDER BY ID DESC LIMIT 4";
    $tuongtu=$db->fetchsql($sql);

 ?>
 
 

    <?php require_once __DIR__. "/layouts/header.php"; ?>    
    
        <div class="col-md-9 bor">
            <table style="width: 800px;">
                <th>
                <img src="admin/modules/product/images/<?php echo $productz['thunbar'] ?>"  width="300px" height="370px" >
                </th>
                <th>
                    <ul id="right" style="font-size: 18px;">
                        <li><h3 style="font-family: Arial;"><?php echo $productz['name'] ?></h3></li>
                        <li><p>Giá niêm yết: <strike><?php echo formatPrice2($productz['price']) ?></strike> đ </p></li>
                        <li><p style="color: red;">Sale off: -<?php echo $productz['sale'] ?>% <b class="price">
                        <br><br> Giá sau khi giảm:<?php echo formatPrice2(money($productz['price'],$productz['sale'])) ?>đ</b</li>
                        <li><p >Đã bán:<?php echo $productz['pay'] ?> <br> Còn:<?php echo $productz['number'] ?> <b class="price">
                        <li style="background: yellow; width: 200px;"><a href="addcart.php?id=<?php echo  $productz['id'] ?> ?>" class="btn btn-default"> <i class="fa fa-shopping-basket" ></i>Thêm vào giỏ hàng</a></li>

                    </ul>

                </th>
            </table>
            
        </section>
        <div class="col-md-12" id="tabdetail">
            <div class="row" style="font-size: 18px;">
                <a>Mô tả sản phẩm:</a>
                <br>
                <a><?php echo $item['mota']  ?></a>
            </div>
        </div>
        <br>
        <br>
        <br>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9 order-lg-1 order-0">
    <div class="product-section">
        <div class="content-product-box">
            <h3>Có thể bạn quan tâm</h3>
                <div class="row">
                <?php foreach($tuongtu as $item): ?>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">

                        <div class="item-product">
                        
                            <div class="thumb">
                                <a href="chitietsanpham.php?id=<?php echo $item['id'] ?>"><img src="admin/modules/product/images/<?php echo $item['thunbar'] ?>" style="width: 200px; height: 200px;"  alt=""></a>
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
                                    <span class="price-old">Giá gốc:<?php echo formatPrice2($item['price'])  ?>₫</span>
                                    <span class="price-current">Đã bán:<?php echo formatPrice2($item['pay'])  ?><br> Còn:<?php echo formatPrice2($item['number'])  ?></span>
                                </div>
                                <a href="chitietsanpham.php?id=<?php echo $item['id'] ?>" class="view-more">Xem chi tiết</a>
                            </div>
                            
                        </div>
                    </div>
                <?php endforeach ?>		
                </div>
            </div>
    
    </div>

        

<?php require_once __DIR__. "/layouts/footer.php"; ?>