

							
						</div>
					</div>
				</div>
			</div>
			<footer>
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
							<div class="box-footer info-contact">
								<h3>Thông tin liên hệ</h3>
								<div class="content-contact">
									
									<p>
										<strong>Địa chỉ:</strong>Long Biên, Hà Nội
									</p>
									<p>
										<strong>Email: </strong> khanh041506@gmail.com
									</p>
									<p>
										<strong>Điện thoại: </strong> 0355133817
									</p>
									<p>
										<strong>Facebook: </strong> Khánh Đoàn Đình
									</p>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
							<div class="box-footer info-contact">
								<h3>Thông tin khác</h3>
								<div class="content-list">
									<ul>
										<li><a href="#"><i class="fa fa-angle-double-right"></i> Chính sách bảo mật</a></li>
										<li><a href="#"><i class="fa fa-angle-double-right"></i> Chính sách đổi trả</a></li>
										<li><a href="#"><i class="fa fa-angle-double-right"></i> Phí vẫn chuyển</a></li>
										<li><a href="#"><i class="fa fa-angle-double-right"></i> Hướng dẫn thanh toán</a></li>
										<li><a href="#"><i class="fa fa-angle-double-right"></i> Chương trình khuyến mãi</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
							<div class="box-footer info-contact">
								<h3>Form liên hệ</h3>
								<div class="content-contact">
									<form action="/" method="GET" role="form">
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<input type="text" name="" id="" class="form-control" placeholder="Họ và Tên">
											</div>
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
												<input type="email" name="" id="" class="form-control" placeholder="Địa chỉ mail">
											</div>
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
												<input type="text" name="" id="" class="form-control" placeholder="Số điện thoại">
											</div>
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<input type="text" name="" id="" class="form-control" placeholder="Tiêu đề">
											</div>
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
											</div>
										</div>
										<button type="submit" class="btn-contact">Liên hệ ngay</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="copyright">
					<p>Copyright © 2020 THIETKEWEB3.COM</p>
				</div>
			</footer>
		</div>
		<script src="libs/jquery-3.4.1.min.js"></script>
		<script src="libs/bootstrap/js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>
		<div id="fb-root"></div>
		<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0"></script>
		<style>
		.float-contact {
				position: fixed;
				bottom: 40px;
				right: 20px;
				z-index: 99999;
				}
				.chat-zalo {
				background: green;
				border-radius: 20px;
				padding: 0 18px;
				color: white;
				display: block;
				margin-bottom: 6px;
				}
				.chat-face {
				background: #125c9e;
				border-radius: 20px;
				padding: 0 18px;
				color: white;
				display: block;
				margin-bottom: 6px;
				}
				.float-contact .hotline {
				background: red!important;
				border-radius: 20px;
				padding: 0 18px;
				color: white;
				display: block;
				margin-bottom: 6px;
				}
				.chat-zalo a, .chat-face a, .hotline a {
				font-size: 15px;
				color: white;
				font-weight: 400;
				text-transform: none;
				line-height: 0;
				}
					.float-contact .chat-zalo:hover, .float-contact .chat-face:hover, .float-contact .hotline:hover{
				box-shadow: -3px 2px 2px 1px #121111;
				}
				@media (max-width: 549px){
					.float-contact{
					 display:none 
				}
			}</style>
			<div class="float-contact">
				<button class="chat-zalo" >
				<a href="http://zalo.me/0779235213" >Chat Zalo</a>
				</button>
				<button class="chat-face">
				<a href="https://www.facebook.com/profile.php?id=100010150744102">Chat Facebook</a>
				</button>
				<button class="hotline">
				<a href="tel:0787166699">Hotline:0787166699</a>
				</button>
			</div>
		

	</body>
</html>

<script type="text/javascript">
     //khai báo biến slideIndex đại diện cho slide hiện tại
     var slideIndex;
      // KHai bào hàm hiển thị slide
      function showSlides() {
          var i;
          var slides = document.getElementsByClassName("mySlides");
          var dots = document.getElementsByClassName("dot");
          for (i = 0; i < slides.length; i++) {
             slides[i].style.display = "none";  
          }
          for (i = 0; i < dots.length; i++) {
              dots[i].className = dots[i].className.replace(" active", "");
          }

          slides[slideIndex].style.display = "block";  
          dots[slideIndex].className += " active";
          //chuyển đến slide tiếp theo
          slideIndex++;
          //nếu đang ở slide cuối cùng thì chuyển về slide đầu
          if (slideIndex > slides.length - 1) {
            slideIndex = 0
          }    
          //tự động chuyển đổi slide sau 5s
          setTimeout(showSlides, 5000);
      }
      //mặc định hiển thị slide đầu tiên 
      showSlides(slideIndex = 0);


      function currentSlide(n) {
        showSlides(slideIndex = n);
      }


    $(function() {
        $hidenitem = $(".hidenitem");
        $itemproduct = $(".item-product");
        $itemproduct.hover(function(){
            $(this).children(".hidenitem").show(100);
        },function(){
            $hidenitem.hide(500);
        })
    })

    //Xứ lý cập nhật số lượng mua
    $(function(){
        $updatecart = $(".updatecart");
        $updatecart.click(function(e) {
            e.preventDefault();
            $qty = $(this).parents("tr").find(".qty").val();

            $key = $(this).attr("data-key");

            $.ajax({
                url: 'thongtingiohang.php',
                type: 'GET',
                data: {'qty': $qty, 'key':$key},
                success:function(data)
                {
                    if (data == 1) 
                    {
                        alert('Bạn đã cập nhật giỏ hàng thành công!');
                        location.href='thongtingiohang_capnhat.php';
                    }
                    else
                    {
                        alert('Xin lỗi! Số lượng bạn mua vượt quá số lượng hàng có trong kho!');
                        location.href='thongtingiohang_capnhat.php';
                    }
                }
            });
            
        })
    }) 
</script>