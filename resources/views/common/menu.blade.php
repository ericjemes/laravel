<div id="sidebar">
	<div class="sidebar-inner">

		<ul id="sideNav" class="nav nav-pills nav-stacked">
			@foreach($menu as $key=>$val)
			<li @if($val['subMenu']) class="hasSub" @endif>
				<a href="#" class="expand active-state"> {{$val['name']}} <i @if($val['icon']) class="{{$val['icon']}}" @else class="im-paragraph-justify" @endif></i></a>
				<ul class="nav sub @foreach($val['subMenu'] as $key1=>$val1) @if(isset($select_menu) && $val1['key'] == $select_menu) show @endif @endforeach">
					@foreach($val['subMenu'] as $key1=>$val1)
					<li><a href="{{$val1['url']}}" @if(isset($select_menu) && $val1['key']==$select_menu)class="active" @endif><i class="en-arrow-right5"></i>{{$val1['name']}}</a></li>
					@endforeach
				</ul>
			</li>
			@endforeach
		</ul>
	</div>
</div>