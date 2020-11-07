<?php require_once __DIR__. "/autoload/autoload.php"; ?>
<?php 
    $sqlhome = "SELECT name , id FROM category WHERE home = 1 ORDER BY update_at ";
    $CategoryHome=$db->fetchsql($sqlhome);
	if (isset($_POST["search"]))
		{
		$nhap=$_POST['nhap'];
		$search= "SELECT * FROM product WHERE name LIKE '%$nhap%' ORDER BY ID DESC ";	
		$searchproduct= $db ->fetchsql($search);
		}
		
    $data=[];
    //Lấy tất cả id và tên có trong danh mục để đưa ra tt
    foreach($CategoryHome as $item)
    {
        $allId= intval($item['id']);
        $sql = "SELECT * FROM product WHERE category_id = $allId ";
        $productHome = $db -> fetchsql($sql);
        // đổi thành mảng nhiều chiều cho từng danh mục 
		$data[$item['name']]=$productHome;

		
    
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
								<?php foreach($data as $key=> $value): ?>
									<h2 class="title-product">
										<a href="#" class="title"><?php echo $key ?></a>
										<div class="bar-menu"><i class="fa fa-bars"></i></div>
										
										<div class="clear"></div>
									</h2>
									
									<div class="content-product-box">
										<div class="row">
										<?php foreach($value as $item): ?>
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
								<?php endforeach ?>	
								</div>
							</div>


<?php require_once __DIR__. "/layouts/footer.php"; ?>