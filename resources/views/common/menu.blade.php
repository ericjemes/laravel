<div id="sidebar">
	<div class="sidebar-inner">
		<ul id="sideNav" class="nav nav-pills nav-stacked">
			@foreach($menu as $key=>$val)
			<li @if($val['subMenu']) class="hasSub" @endif>
				<a href="#" class="expand active-state"> {{$val['name']}} <i @if($val['icon']) class="{{$val['icon']}}" @else class="im-paragraph-justify" @endif></i></a>
				<ul class="nav sub @if(isset($_COOKIE['pmenu-id']) && $val['id'] == $_COOKIE['pmenu-id']) show @endif" data-pid="{{$val['id']}}">
					@foreach($val['subMenu'] as $key1=>$val1)
					<li><a href="{{$val1['url']}}" class="J_menu @if(isset($_COOKIE['menu-id']) && $val1['id'] == $_COOKIE['menu-id']) active @endif" data-id="{{$val1['id']}}"><i class="en-arrow-right5"></i>{{$val1['name']}}</a></li>
					@endforeach
				</ul>
			</li>
			@endforeach
		</ul>
	</div>
</div>
<script>
    $(function () {
		$('.J_menu').on('click', function () {
			var _this = $(this);
            document.cookie="menu-id="+_this.data('id')+";path=/";
            document.cookie="pmenu-id="+_this.parent().parent().data('pid')+";path=/";
			return true;
		});
	});
</script>