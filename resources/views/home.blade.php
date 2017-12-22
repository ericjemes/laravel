@extends('common.layout')
@section('content')
<div id="content">
	<div class="content-wrapper">
		<h1>欢迎使用后台关系系统</h1>
		<div class="clearfix"></div>
	</div>
	<div class="row">
		<div class="col-lg-6 col-md-6">
			<div class="page-header">
				<h5>Carousel example</h5>
			</div>
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators dotstyle center">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"><a href="#">slide1</a>
					</li>
					<li data-target="#carousel-example-generic" data-slide-to="1"><a href="#">slide2</a>
					</li>
					<li data-target="#carousel-example-generic" data-slide-to="2"><a href="#">slide3</a>
					</li>
				</ol>
				<div class="carousel-inner">
					<div class="item active">
						<img src="assets/img/carousel/1.jpg" alt="Image1">
						<div class="carousel-caption">
							<h4>Seagull</h4>
							<p>Wonderful seagull in the beach.</p>
						</div>
					</div>
					<div class="item">
						<img src="assets/img/carousel/2.jpg" alt="Image2">
						<div class="carousel-caption">
							<h4>Pack of Seagulls</h4>
							<p>Wonderful pack of seagulls in the beach.</p>
						</div>
					</div>
					<div class="item">
						<img src="assets/img/carousel/3.jpg" alt="Image3">
						<div class="carousel-caption">
							<h4>Stones</h4>
							<p>Very nice stones in the beach.</p>
						</div>
					</div>
				</div>
				<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
					<i class="en-arrow-left8"></i>
				</a>
				<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
					<i class="en-arrow-right8"></i>
				</a>
			</div>
		</div>
	</div>
</div>
@endsection