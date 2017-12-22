<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="author" content="SuggeElson" />
	<meta name="description" content=""/>
	<meta name="keywords" content=""/>
	<link href="/assets/css/icons.css" rel="stylesheet" />
	<link href="/assets/css/sprflat-theme/jquery.ui.all.css" rel="stylesheet" />
	<link href="/assets/css/bootstrap.css" rel="stylesheet" />
	<link href="/assets/css/plugins.css" rel="stylesheet" />
	<link href="/assets/css/main.css" rel="stylesheet" />
	<link href="/assets/css/custom.css" rel="stylesheet" />
	<script src="/assets/js/jquery-1.8.3.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/assets/css/imgareaselect-default.css" />
	<script type="text/javascript" src="/assets/js/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="/assets/js/jquery.imgareaselect.pack.js"></script>
	<script type="text/javascript" src="/assets/js/jQueryRotate.js"></script>
	<style>
		.portrait_left{float: left; height: auto; width: 306px;}
		#avatar{height: 280px;}
		.portrait_revolve{height: auto; padding-top: 15px; width: 306px;}
		.revol_left_txt{color: #FF6699;float: left;height: 22px;line-height: 22px;text-align: left;width: 110px;}
		.revol_right_txt{color: #FF6699;float: left;height: 22px;line-height: 22px;text-align: right;width: 131px;}
		.setup_but{height: 28px; padding-left: 93px; padding-top: 40px; width: auto;}
		.portrait_right{float: left; font-size: 12px; height: 280px; padding-left: 80px; width: 320px;}
		.portrait_right_bottom{color: #666666; height: 220px; width: 310px;}
		.portrait1{float: left; height: 200px; width: 180px;}
		#img_big_preview{height: 180px; margin: 0 auto; width: 180px;}.img_preview{border: 1px solid #000000; overflow: hidden; position: relative;}.img_preview img{margin: 0; position: relative;}.portrait2{float: left; height: auto; padding-left: 40px; width: 68px;}
		#img_small_preview{height: 49px; margin: 0 auto; width: 49px;}.img_preview{border: 1px solid #000000; overflow: hidden; position: relative;}
	</style>
</head>
<body>

<body>
<div id="header">
	<div class="container-fluid">
		<div class="navbar">
			<div class="navbar-header">
				<a class="navbar-brand" href="/home">
					<i class="im-windows8 text-logo-element animated bounceIn"></i><span class="text-logo">spr</span><span class="text-slogan">flat</span>
				</a>
			</div>
			<nav class="top-nav" role="navigation">
				<ul class="nav navbar-nav pull-right">
					<li>
						<a href="#" id="toggle-header-area"><i class="ec-download"></i></a>
					</li>
					<li class="dropdown">
						<a href="#" data-toggle="dropdown"><i class="br-alarm"></i> <span class="notification">5</span></a>
						<ul class="dropdown-menu notification-menu right" role="menu">
							<li class="clearfix">
								<i class="st-pencil"></i>
								<a href="#" class="notification-user"> SuggeElson </a>
								<span class="notification-action"> just write a </span>
								<a href="#" class="notification-link"> post</a>
							</li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" data-toggle="dropdown">
							<img class="user-avatar" src="/assets/img/avatars/48.jpg" alt="">{{isset($_COOKIE['name'])?$_COOKIE['name']:''}}</a>
						<ul class="dropdown-menu right" role="menu">
							<li><a href="/user/profile"><i class="st-user"></i>个人信息</a></li>
							<li><a href="file.html"><i class="st-cloud"></i> Files</a></li>
							<li><a href="#"><i class="st-settings"></i> Settings</a></li>
							<li><a href="/logout"><i class="im-exit"></i> Logout</a></li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>
		<!-- Start #header-area -->
		<div id="header-area" class="fadeInDown">
			<div class="header-area-inner">
				<ul class="list-unstyled list-inline">
					<li>
						<div class="shortcut-button">
							<a href="#">
								<i class="im-pie"></i>
								<span>Earning Stats</span>
							</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<!-- End #header-area -->
	</div>
</div>
@include('common.menu')
@yield('content')
<script src="/assets/plugins/core/pace/pace.min.js"></script>
<script>
    window.jQuery || document.write('<script src="/assets/js/libs/jquery-2.1.1.min.js">\x3C/script>')
</script>
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script>
    window.jQuery || document.write('<script src="/assets/js/libs/jquery-ui-1.10.4.min.js">\x3C/script>')
</script>
<script src="/assets/js/bootstrap/bootstrap.js"></script>
<script src="/assets/js/jRespond.min.js"></script>
<script src="/assets/plugins/core/slimscroll/jquery.slimscroll.min.js"></script>
<script src="/assets/plugins/core/slimscroll/jquery.slimscroll.horizontal.min.js"></script>
<script src="/assets/plugins/forms/autosize/jquery.autosize.js"></script>
<script src="/assets/plugins/core/quicksearch/jquery.quicksearch.js"></script>

<script src="/assets/plugins/core/moment/moment.min.js"></script>
<script src="/assets/plugins/charts/sparklines/jquery.sparkline.js"></script>
<script src="/assets/plugins/charts/pie-chart/jquery.easy-pie-chart.js"></script>
<script src="/assets/plugins/forms/icheck/jquery.icheck.js"></script>
<script src="/assets/plugins/forms/tags/jquery.tagsinput.min.js"></script>
<script src="/assets/plugins/forms/tinymce/tinymce.min.js"></script>
<script src="/assets/plugins/tables/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/tables/datatables/jquery.dataTablesBS3.js"></script>
<script src="/assets/plugins/tables/datatables/tabletools/ZeroClipboard.js"></script>
<script src="/assets/plugins/tables/datatables/tabletools/TableTools.js"></script>
<script src="/assets/plugins/misc/highlight/highlight.pack.js"></script>
<script src="/assets/plugins/misc/countTo/jquery.countTo.js"></script>
<script src="/assets/js/jquery.sprFlat.js"></script>
<script src="/assets/js/app.js"></script>
<script src="/assets/js/pages/blank.js"></script>
<script src="/assets/js/pages/data-tables.js"></script>

<script src="/assets/plugins/ui/notify/jquery.gritter.js"></script>			     <!--info hint-->
<script src="/assets/plugins/ui/bootbox/bootbox.js"></script>					 <!--fonfirm alert-->
{{--<script src="/assets/plugins/ui/tabdrop/bootstrap-tabdrop.js"></script>          //fonfirm alert--}}
</body>
</html>