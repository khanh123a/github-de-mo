<!DOCTYPE html>
<html lang="vi">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Website phụ kiện điện thoại</title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i">
		<link rel="stylesheet" href="public/libs/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="public/libs/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="css/responsive.css">
		<link rel="stylesheet" type="text/css" href="public/frontend/css/style2.css"/>
	</head>
	
	<body>
		<?php 
		
		?>
		
		<div id="wallpaper">

			<header>
				<div class="top">
					<div class="container">
						<div class="row">

							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								
								<p>Chào mừng đến với shop bán hàng phụ kiện điện thoại!</p>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							
								<div class="top-menu">
									<ul>
									<?php if(isset($_SESSION['name_user'])):?>
									<li style="color: red;font-family: Arial, Helvetica, sans-serif;">Chào: <?php echo $_SESSION['name_user'] ?></li><li>
										
										<li><a href="thongtincanhan2.php">Thông tin cá nhân</a></li>
										<li><a href="thongtingiohang.php">Giỏ hàng</a></li>
										<li><a href="exit.php">Đăng Xuất</a></li>
										<?php else: ?>
											<li>
                                                <a href="dangnhap.php"  ><i class="fa fa-unlock" ></i>Đăng nhập</a>
                                            </li>
                                            <li>
                                                <a href="dangki.php"><i class="fa fa-user"></i>Đăng Kí</a>
                                            </li>

										<?php endif; ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="main-header">
					<div class="container">
						<div class="row">
							<div class="col-6 col-xs-6 col-sm-6 col-md-3 col-lg-3 order-md-0 order-0">
								<div class="logo">
									<a href="#"><img src="" alt=""></a>
									<h1>Website bán hàng</h1>
								</div>
							</div>
							<div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 order-md-1 order-2">
								<div class="form-seach-product">
									<form action="" method="POST"  role="form" enctype="multipart/form-data">
										
										<div class="input-seach" >
											<input type="text" name="nhap" id="" class="form-control">
											<button  type="submit" class="btn-search-pro" name="search"  >
												<i class="fa fa-search"></i></button>
										</div>

										<div class="clear"></div>
									</form>
								</div>
							</div>
							<?php if(isset($_SESSION['name_user'])):?>
							<div class="col-6 col-xs-6 col-sm-6 col-md-3 col-lg-3 order-md-2 order-1" style="text-align: right">
							
								<a href="thongtingiohang.php" class="icon-cart">
									<div class="icon">
										<i class="fa fa-shopping-cart" aria-hidden="true"></i>
										<span>!</span>
									</div>
									<div class="info-cart">
										<p>Giỏ hàng</p>
										<p>của bạn</p>
									</div>
									<span class="clear"></span>
								</a>
							
							</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="main-menu-header">
					<div class="container">
						<div id="nav-menu">
							<ul>
								<li class="current-menu-item"><a href="index.php">Trang chủ</a></li>
								<li><a href="allsp.php">All Sản phẩm</a></li>
								<li>
									<a href="#">Danh mục</a>
									<ul>
										
										<li>
										<?php foreach($category as $item) : ?>
											<a href="danhmucsanpham.php?id=<?php echo $item['id'] ?>"> <?php echo $item['name'] ?></a>
											<?php endforeach ?>
										</li>

									</ul>
								</li>
								
								
								
							</ul>
							<div class="clear"></div>
						</div>
					</div>
				</div>
			</header>
			<div id="content">
				<div class="container">
					<div class="slider">
						<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
						  <div class="carousel-inner">
						    <div class="carousel-item active">
						      <img class="d-block w-100" src="admin/modules/product/images/banner11.jpg" alt="First slide">
						    </div>
						    <div class="carousel-item">
						      <img class="d-block w-100" src="admin/modules/product/images/banner12.jpg" alt="Second slide">
						    </div>
						  </div>
						  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
						    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
						    <span class="sr-only">Previous</span>
						  </a>
						  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
						    <span class="carousel-control-next-icon" aria-hidden="true"></span>
						    <span class="sr-only">Next</span>
						  </a>
						</div>
					</div>
				</div>
				<div class="product-box">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 order-lg-0 order-1">
								<div class="sidebar">
									<div class="category-box">
										<h3>Danh mục phụ kiện</h3>
										<div class="content-cat">
											<ul><?php foreach($category as $item) : ?>
												<li>
													<a href="danhmucsanpham.php?id=<?php echo $item['id'] ?>"> <?php echo $item['name'] ?></a>
												</li>
											<?php endforeach; ?></ul>
										</div>
									</div>
									<div class="widget">
										<h3>
											<i class="fa fa-bars"></i>
											Top 4 phụ kiện bán chất
										</h3>
										<div >
											<ul >
											<?php foreach($productPay as $item) : ?>
											<li>
												<a href="chitietsanpham.php?id=<?php echo $item['id'] ?>">
													<img src="admin/modules/product/images/<?php echo $item['thunbar'] ?>" class="img-responsive pull-left" width="90px" height="140px">                                    
													<div   >
														<a style="font-size: 15px;" href="chitietsanpham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a >
														<br>
														<a style="font-size: 15px;color: black;">Giá gốc: &emsp; </a>
														<a class="price" style="font-size: 15px;color: black;"><?php echo formatPrice2($item['price']) ?>Đ</a> 
														<br>
														<a style="font-size: 15px;">Giảm: <a style="color:red;" ><?php echo $item['sale']?> %</a> => 
														<a class="price" style="font-size: 15px;"><?php echo formatPrice2($item['price']-($item['price']*$item['sale']/100)) ?>Đ</a> <a>
														<br>
														<a style="font-size: 15px;">Đã bán: <a style="color:red;" ><?php echo $item['pay']?></a> 
														<br>
														<a style="font-size: 15px;">Còn lại: <a style="color:red;" ><?php echo $item['number']?></a> 

														
													</div>
													
												</a>
												<div class="clear"></div>
												<br>
												<br>
											</li>
                            				<?php endforeach ?>
											
										</div>
									</div>
									<div class="widget">
										<h3>
											<i class="fa fa-bars"></i>
											Quảng cáo
										</h3>
										<div class="content-banner">
											<a href="#">
												<img src="images/banner.png" alt="">
											</a>
										</div>
									</div>
									<div class="widget">
										<h3>
											<i class="fa fa-facebook"></i>
											Facebook
										</h3>
										<div class="content-fb">
											<div class="fb-page" data-href="https://www.facebook.com/huykiradotnet/" data-tabs="timeline" data-width="" data-height="200" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div> 
										</div>
									</div>
									<div class="widget">
										<h3>
											<i class="fa fa-bars"></i>
											Vị trí cửa hàng
										</h3>
										<div class="content-fb">
										<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5265.86549436805!2d105.73920819409827!3d21.051525061430254!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454f0d6347175%3A0x9769e9dbc4ccfb5c!2zTWnhur91IMSQ4buTbmcgQ-G7lQ!5e0!3m2!1svi!2s!4v1604427433441!5m2!1svi!2s" width="400" height="300" frameborder="0" style="border:0;"
											 allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
										</div>
									</div>
									
									



								</div>
							</div>


							