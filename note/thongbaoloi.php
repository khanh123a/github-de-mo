<?php if(isset($_SESSION['success'])): ?>
<!--Hiển thị ra thông báo thêm mới thành công-->
<div class="alert alert-success">
<?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
</div>
<?php endif;?>

<!--Hiển thị ra thông báo Sửa thất bại-->
<?php if(isset($_SESSION['error'])): ?>
<div class="alert alert-danger">
<?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
</div>
<?php endif;?>
