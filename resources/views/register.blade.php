<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login | Klorofil - Free Bootstrap Dashboard Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="/assets/img/logo-dark.png" alt="Klorofil Logo"></div>
								<p class="lead">Login to your account</p>
							</div>
							<div class="form-group">
								<label for="signin-email" class="control-label sr-only">Email</label>
								<input type="input" class="form-control" id="J_account" value="18652979336" placeholder="手机号码">
							</div>
							<div class="form-group">
								<label for="signin-email" class="control-label sr-only">Email</label>
								<input type="input" class="form-control" id="J_name" value="jemes" placeholder="用户名称">
							</div>
							<div class="form-group">
								<label for="signin-password" class="control-label sr-only">Password</label>
								<input type="password" class="form-control" id="J_password" value="123456" placeholder="登录密码">
							</div>
							<div class="form-group">
								<label for="signin-password" class="control-label sr-only">Password</label>
								<input type="password" class="form-control" id="J_confirmpassword" value="123456" placeholder="再次输入密码">
							</div>
							<div class="form-group clearfix">
								<label class="fancy-checkbox element-left">
									<input type="checkbox">
								</label>
							</div>
							<button type="submit" class="btn btn-primary btn-lg btn-block" id="J_submit">register</button>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Free Bootstrap dashboard template</h1>
							<p>by The Develovers</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="/assets/vendor/jquery/jquery.min.js"></script>
<script>
	$(function(){
	    $('#J_submit').on("click", function() {
	        var mobile = $('#J_account').val();
	        var name = $('#J_name').val();
	        var password = $('#J_password').val();
	        var cpassword = $('#J_confirmpassword').val();
            $.ajax({
                url: "/ajax/register",
				type:'post',
                data: {
                    mobile: mobile,
                    name: name,
                    password:password,
                    confirmPassword:cpassword
                },
                success: function(data) {
                    if (data.code == 0)
					{
                        location.href = '/login';
					} else {
                        alert(data.msg);
					}
                }
            });
		})
	});
</script>
</html>
