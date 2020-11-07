<?php require_once __DIR__. "/autoload/autoload.php"; 


?>
<title>Giỏ Hàng</title>
<?php require_once __DIR__. "/layouts/header.php"; ?>                
                    <div class="col-md-9 bor" >
                      
                        <section class="box-main1"  style="width: 700px;">
                            <h2 class="title-main">Thành công!!!</h2>
                            <?php if(isset($_SESSION['success'])): ?>
                            <div class="alert alert-success" >
                              <strong style="font-size: 20px;"></strong>
                                  <?php echo $_SESSION['success']; unset($_SESSION['success']) ?>
                              
                            </div>
                            <?php endif ?>
                            <a href="index.php" class="btn btn-xs btn-danger">Trở về trang chủ</a>
                        </section>

                    </div>
                </div>
                
<?php require_once __DIR__. "/layouts/footer.php"; ?>
