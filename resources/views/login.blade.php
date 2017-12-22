<!DOCTYPE html>
<html lang="en">
@include('common.header')
<body class="login-page">
<div id="login" class="animated bounceIn">
	<img id="logo" src="/assets/img/logo.png" alt="sprFlat Logo">
	<div class="login-wrapper">
		<ul id="myTab" class="nav nav-tabs nav-justified bn">
			<li>
				<a href="#log-in" data-toggle="tab">Login</a>
			</li>
			<li class="">
				<a href="#register" data-toggle="tab">Register</a>
			</li>
		</ul>
		<div id="myTabContent" class="tab-content bn">
			<div class="tab-pane fade active in" id="log-in">
				<form class="form-horizontal mt10" action="#" id="login-form" role="form">
					<div class="form-group">
						<div class="col-lg-12">
							<input type="text" name="email" id="email" class="form-control left-icon J_mobile" value="18652979336" placeholder="手机号码">
							<i class="ec-user s16 left-input-icon"></i>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-12">
							<input type="password" name="password" id="password" class="form-control left-icon J_password" value="123456" placeholder="登录密码">
							<i class="ec-locked s16 left-input-icon"></i>
							<span class="help-block"><a href="#"><small></small></a></span>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-12">
							<button class="btn btn-success pull-right J_login" type="submit">Login</button>
						</div>
					</div>
				</form>
			</div>
			<div class="tab-pane fade" id="register">
				<form class="form-horizontal mt10" action="#" role="form">
					<div class="form-group">
						<div class="col-lg-12">
							<input name="mobile" type="input" class="form-control left-icon J_R_mobile" value="18652979336" placeholder="手机号码">
							<i class="ec-mail s16 left-input-icon"></i>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-12">
							<input type="input" class="form-control left-icon J_R_name" name="name" value="name" placeholder="用户名称">
							<i class="ec-locked s16 left-input-icon"></i>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-12">
							<input type="password" class="form-control left-icon J_R_password" name="password" value="123456" placeholder="登录密码">
							<i class="ec-locked s16 left-input-icon"></i>
						</div>
						<div class="col-lg-12 mt15">
							<input type="password" class="form-control left-icon J_R_confirmPassowrd" name="confirm_passowrd" value="123456" placeholder="再次输入密码">
							<i class="ec-locked s16 left-input-icon"></i>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-12 col-md-6 col-sm-6 col-xs-4">
							<button class="btn btn-success pull-right J_register">Register</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
<script src="/assets/js/jquery-1.8.3.min.js"></script>
<script src="/assets/js/bootstrap/bootstrap.js"></script>
<script src="/assets/plugins/ui/notify/jquery.gritter.js"></script>			     <!--info hint-->
<script src="/assets/plugins/ui/bootbox/bootbox.js"></script>					 <!--fonfirm alert-->
<script>
	$(function(){
	    $('.J_login').on('click',function(){
            var mobile = $('.J_mobile').val();
            var password = $('.J_password').val();
            $.ajax({
                url: "/ajax/login",
                type:'post',
                data: {
                    mobile: mobile,
                    password:password,
                },
                success: function(data) {
                    if (data.code == 0)
                    {
                        location.href = '/home';
                    } else {
                        errorNotice(data.msg);
                    }
                }
            })
			return false;
		});

        $('.J_register').on('click',function(){
            var mobile = $('.J_R_mobile').val();
            var name = $('.J_R_name').val();
            var password = $('.J_R_password').val();
            var confirmPassword = $('.J_R_confirmPassowrd').val();
            $.ajax({
                url: "/ajax/register",
                type:'post',
                data: {
                    mobile: mobile,
                    name: name,
                    password:password,
                    confirmPassword:confirmPassword
                },
                success: function(data) {
                    if (data.code == 0)
                    {
                        location.reload();
                    } else {
                        errorNotice(data.msg);
                    }
                }
            });
            return false;
        });

        function successNotice (text)
        {
            $.gritter.add({
                title: '成功!!!',
                text: text,
                time: '',
                close_icon: 'en-cross',
                icon: 'ec-trashcan',
                class_name: 'success-notice'
            });
        }

        //error notice
        function errorNotice(text)
        {
            $.gritter.add({
                title: '错误!!!',
                text: text,
                time: '',
                close_icon: 'en-cross',
                icon: 'ec-users',
                class_name: 'error-notice'
            });
        }
	})
</script>
</html>