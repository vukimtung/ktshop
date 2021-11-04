
<!DOCTYPE html>
<html>
<head>
	<title>Đăng nhập shipper</title>
	<?php 
  session_start();
	include('phantrangshipper/head.php');
	if(isset($_POST['login'])){
		include('../phantrangfrontend/connect.php');
		$email=$_POST['email'];
		$password=$_POST['password'];

		$sql="SELECT * FROM shipper WHERE email_s='$email' AND password='$password'";
		$results=$connect->query($sql);
		$kq=$results->fetch_assoc();

    $_SESSION['id_s']=$kq['id_s'];
    $_SESSION['email_s']=$kq['email_s'];
    $_SESSION['name_s']=$kq['ten_s'];
    $_SESSION['password_s']=$kq['password'];

		if($shippername=$kq['email_s'] AND $password=$kq['password']){
			header('location: shipperindex.php');
		}else{
			header('location: shipperlogin.php');
		}

	}
	?>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <h1 style="color: red;"><strong>Đăng Nhập Shipper</strong></h1>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Điền thông tin để đăng nhập</p>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Email" name="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Mật khẩu" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="login" style="margin-left: 130%;">Đăng nhập</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
<!-- 
    <div class="social-auth-links text-center">
      <p>- Hoặc -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Đăng nhập với Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Đăng nhập với Google+</a>
    </div> -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
