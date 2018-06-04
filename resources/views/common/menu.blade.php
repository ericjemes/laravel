<div id="sidebar">
	<div class="sidebar-inner">
		<ul id="sideNav" class="nav nav-pills nav-stacked">
			@foreach($menu as $key=>$val)
				<li><a href="#"> {{$val['name']}} <i @if($val['icon']) class="{{$val['icon']}}" @else class="im-paragraph-justify" @endif></i></a>
					<ul class="nav sub">
						@foreach($val['subMenu'] as $key1=>$val1)
						<li><a href="{{$val1['url']}}"><i class="en-arrow-right7" data-id="{{$val1['id']}}"></i> {{$val1['name']}}</a></li>
						@endforeach
					</ul>
				</li>
			@endforeach
		</ul>
	</div>
</div>