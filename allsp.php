<?php require_once __DIR__. "/autoload/autoload.php"; ?>
<?php 
    $sqlhome = "SELECT * FROM product ORDER BY name DESC ";
    //$sqlhome = "SELECT * FROM product ORDER BY price DESC ";
    $product = $db->fetchAll("product");
	if (isset($_POST["search"]))
		{
		$nhap=$_POST['nhap'];
		$search= "SELECT * FROM product WHERE name LIKE '%$nhap%' ORDER BY ID DESC ";	
		$searchproduct= $db ->fetchsql($search);
		}
	if(isset($_GET['page']))
		{
			$p= $_GET['page'];
	
		}
	else
		{
			$p=1;
		}
    
    //Lấy tất cả id và tên có trong danh mục để đưa ra tt
	$sql= "SELECT * FROM product";
    $product = $db -> fetchJone('product',$sql,$p,50,true);
	//Phân trang
	if(isset($product['page']))
	{
		$sotrang = $product['page'];
		unset($product['page']);

	}

?>
<?php require_once __DIR__. "/layouts/header.php"; ?>   
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-9 order-lg-1 order-0">
							<div class="product-section">
							<div class="content-product-box">
									<h3>Sản phẩm bạn tìm kiếm</h3>
										<div class="row">
										<?php foreach($searchproduct as $item): ?>
											<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
												<div class="item-product">
												
													<div class="thumb">
														<a href="chitietsanpham.php?id=<?php echo $item['id'] ?>"><img src="admin/modules/product/images/<?php echo $item['thunbar'] ?>" alt=""></a>
														<span class="sale">Giảm <br><?php echo $item['sale'] ?></span>
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
												
									</div>
								
								<br>
								<br>
								<div class="product-section">
								
									<div class="content-product-box">
										<div class="row">
										<?php foreach($product as $item): ?>
											<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
												<div class="item-product">
												
													<div class="thumb">
														<a href="chitietsanpham.php?id=<?php echo $item['id'] ?>"><img src="admin/modules/product/images/<?php echo $item['thunbar'] ?>" style="width: 200px ; height: 200px;" alt=""></a>
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
															<span class="price-current">Còn <?php echo $item['number'] ?>sp</span>
														</div>
														<a href="chitietsanpham.php?id=<?php echo $item['id'] ?>" class="view-more">Xem chi tiết</a>
													</div>
													
												</div>
											</div>
											<?php endforeach ?>		
											
										</div>
												
									</div>
							
								</div>
							</div>
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

<?php require_once __DIR__. "/layouts/footer.php"; ?>