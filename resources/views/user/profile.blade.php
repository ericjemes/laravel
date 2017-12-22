@extends('common.layout')
@section('content')
	<div id="content">
		<div class="content-wrapper">
			<div class="row">
				<div class="col-lg-12 heading">
					<h1 class="page-header"></h1>
					<ul id="crumb1" class="breadcrumb">
						<li><i class="im-home"></i><a href="/home">Home</a><i class="en-arrow-right7"></i></li>
						<li><i class="st-user"></i>个人信息</li>
					</ul>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12 heading">
					<div class="option-buttons">
						<div class="btn-toolbar" role="toolbar">
							<div class="btn-group">
								<a id="clear-localstorage" class="btn tip" title="Reset panels position">
									<i class="ec-refresh color-red s24"></i>
								</a>
							</div>
							<div class="btn-group dropdown">
								<a class="btn dropdown-toggle" data-toggle="dropdown" id="dropdownMenu1"><i class="br-grid s24"></i></a>
								<div class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu1">
									<div class="option-dropdown">
										<div class="shortcut-button">
											<a href="#">
												<i class="im-pie"></i>
												<span>Earning Stats</span>
											</a>
										</div>
										<div class="shortcut-button">
											<a href="#">
												<i class="ec-images color-dark"></i>
												<span>Gallery</span>
											</a>
										</div>
										<div class="shortcut-button">
											<a href="#">
												<i class="en-light-bulb color-orange"></i>
												<span>Fresh ideas</span>
											</a>
										</div>
										<div class="shortcut-button">
											<a href="#">
												<i class="ec-link color-blue"></i>
												<span>Links</span>
											</a>
										</div>
										<div class="shortcut-button">
											<a href="#">
												<i class="ec-support color-red"></i>
												<span>Support</span>
											</a>
										</div>
										<div class="shortcut-button">
											<a href="#">
												<i class="st-lock color-teal"></i>
												<span>Lock area</span>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="btn-group dropdown">
								<a class="btn dropdown-toggle" data-toggle="dropdown" id="dropdownMenu2"><i class="ec-pencil s24"></i></a>
								<div class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu2">
									<div class="option-dropdown">
										<div class="row">
											<p class="col-lg-12">Quick post</p>
											<form class="form-horizontal" role="form">
												<div class="form-group">
													<div class="col-lg-12">
														<input type="text" class="form-control" placeholder="Enter title">
													</div>
												</div>
												<div class="form-group">
													<div class="col-lg-12">
														<textarea class="form-control wysiwyg" placeholder="Enter text"></textarea>
													</div>
												</div>
												<div class="form-group">
													<div class="col-lg-12">
														<input type="text" class="form-control tags1" placeholder="Enter tags">
													</div>
												</div>
												<div class="form-group">
													<div class="col-lg-12">
														<button class="btn btn-default btn-xs">Save Draft</button>
														<button class="btn btn-success btn-xs pull-right">Publish</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<div class="btn-group">
								<a class="btn dropdown-toggle" data-toggle="dropdown" id="dropdownMenu3"><i class="ec-help s24"></i></a>
								<div class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu3">
									<div class="option-dropdown">
										<p>First time visitor ? <a href="#" id="app-tour" class="btn btn-success ml15">Take app tour</a>
										</p>
										<hr>
										<p>Or check the <a href="#" class="btn btn-danger ml15">FAQ</a>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="outlet">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default plain profile-widget">
							<div class="panel-heading white-bg pl0 pr0">
								<img class="profile-image img-responsive" src="/assets/img/profile-cover.jpg" alt="profile cover">
							</div>
							<div class="panel-body">
								<div class="col-lg-4 col-md-4 col-sm-12">
									<div class="profile-avatar">
										<img class="img-responsive" src="/assets/img/avatars/132.jpg" alt="@roybarberuk">
									</div>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-12">
									<div class="profile-name">
										{{$userInfo['name']}}
										@foreach($roleInfo as $key=>$val)
											<span class="label label-success">{{$val}}</span>
										@endforeach
									</div>
									<div class="profile-quote">
										<p>@if($userInfo['description']){{$userInfo['description']}} @else 这个人懒，什么都没有留下... @endif</p>
									</div>
									<div class="profile-stats-info">
										<a href="#" class="tipB" title="Views"><i class="im-eye2"></i> <strong>5600</strong></a>
										<a href="#" class="tipB" title="Comments"><i class="im-bubble"></i> <strong>75</strong></a>
										<a href="#" class="tipB" title="Likes"><i class="im-heart"></i> <strong>45</strong></a>
									</div>
								</div>
							</div>
							<div class="panel-footer white-bg">
								<ul class="profile-info">
									<li><i class="ec-mobile"></i> {{$userInfo['mobile']}}</li>
									<li><i class="ec-location"></i> {{$userInfo['address']}}</li>
									<li><i class="ec-mail"></i> {{$userInfo['email']}}</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default plain">
							<div class="panel-heading white-bg">
								<h4 class="panel-title"><i class="ec-user"></i> 个人信息设置</h4>
							</div>
							<div class="panel-body">
								<form class="form-vertical hover-stripped" role="form" >
									<div class="form-group" style="display: none">
										<label class="control-label">手机号</label>
										<input type="text" class="form-control" name="id" value="{{$userInfo['id']}}">
									</div>
									<div class="form-group">
										<label class="control-label">手机号</label>
										<input type="text" class="form-control" name="mobile" value="{{$userInfo['mobile']}}" disabled>
									</div>
									<div class="form-group">
										<label class="control-label">姓名</label>
										<input type="text" class="form-control" name="name" value="{{$userInfo['name']}}">
									</div>
									<div class="form-group">
										<label class="control-label">邮箱</label>
										<input type="text" class="form-control" name="email" value="{{$userInfo['email']}}">
									</div>
									<div class="form-group">
										<label class="control-label">地址</label>
										<input type="text" class="form-control" name="address" value="{{$userInfo['address']}}">
									</div>
									<div class="form-group">
										<label class="control-label">个人签名</label>
										<textarea class="form-control" rows="3" name="description">{{$userInfo['description']}}</textarea>
									</div>
									<div class="form-group mb15">
										<button class="btn btn-success J_submit">确定</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<button class="btn btn-primary btn-alt mr15 mb15" data-toggle="modal" data-target="#myLargeModal">Large Modal</button>
		<div class="clearfix"></div>
	</div>
	<script>
        $(function () {
            $('.J_return').on('click', function () {
                location = document.referrer;
            });
            $('.J_submit').on('click', function () {
                var data = $("form").serializeArray();
                $.ajax({
                    url: "/ajax/user/update",
                    type:'post',
                    data: data,
                    success: function(data) {
                        if (data.code == 0)
                        {
                            successNotice('操作成功');
                            setTimeout("location=location; ", 3000);
                        } else {
                            errorNotice(data.msg);

                        }
                    }
                })
				return false;
            })
        })
        //success notice
        function successNotice (text)
        {
            $.gritter.add({
                title: '成功!!!',
                text: text,
                time: '',
                close_icon: 'en-cross',
                icon: 'im-info2',
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
                icon: 'br-cancel',
                class_name: 'error-notice'
            });
        }
	</script>
@endsection