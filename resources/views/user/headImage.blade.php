@extends('common.layout_upload')
@section('content')
	<div id="content">
		<div class="content-wrapper">
			<div class="row">
				<div class="col-lg-12 heading">
					<h1 class="page-header"></h1>
					<ul id="crumb1" class="breadcrumb">
						<li><i class="im-home"></i><a href="/home">Home</a><i class="en-arrow-right7"></i></li>
						<li><i class="ec-images"></i>图片编辑</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-success" id="spr_0">
						<div class="panel-heading">
							<h3 class="panel-title">Demo Notes</h3>
						</div>
						<div class="panel-body">
							<div class="portrait_left">
								<div id="picture" style="border: 1px solid #000000;overflow: hidden;position: relative;height: auto;width: 280px;margin: 0 auto;">
									<img id="avatar" width="280" alt="ÇëÉÏ´«Í·Ïñ" src="/assets/img/Koala_cropped.jpg">
								</div>
								<form id="crop_form" method="post" action=".">
									<!--Í¨¹ýÉú³É³ß´çºÍÐý×ª½Ç¶È ºóÌ¨»ñÈ¡³ß´çºÍÐý×ª½Ç¶ÈÔÙ½øÐÐ²Ã¼ô-->
									<input id="id_top" type="hidden" name="top" value="90">
									<input id="id_left" type="hidden" name="left" value="61">
									<input id="id_right" type="hidden" name="right" value="201">
									<input id="id_bottom" type="hidden" name="bottom" value="200">
									<input id="rotation" type="hidden" value="0" name="rotation">
								</form>

								<!-- Ðý×ª£¬¿É²»Òª¸Ã¹¦ÄÜ -->
								<div class="portrait_revolve">
									<div class="revolve_left"></div>
									<a href="javascript:;" class="revol_left_txt" onClick="avatarrotateleft();">向左旋转</a>
									<a href="javascript:;" class="revol_right_txt" onClick="avatarrotateright();">向右旋转</a>
									<div class="revolve_right"></div>
								</div>
							</div>
							<div class="portrait_right">
								<p class="portrait_right_txt">您上传的头像会自动生成小尺寸头像，请注意小尺寸的头像是否清晰</p>
								<div class="portrait_right_bottom">
									<div class="portrait1">
										<div id="img_big_preview" class="img_preview">
											<img id="avatar1" alt="" src="/assets/img/Koala_cropped.jpg" style="width: 360px; height: 360px; margin-left: -117px; margin-top: -44px;">
										</div>
										<p>大尺寸头像，180×180</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="form-group">
			<label class="col-lg-2 control-label">
				<button type="button" class="btn btn-success" onClick="submit_avatar();">确定</button>
			</label>
		</div>
	</div>
<script type="text/javascript">
    $(document).ready(function (){
        function adjust(el, selection) {
            var scaleX = $(el).width() / (selection.width || 1);
            var scaleY = $(el).height() / (selection.width || 1);
            $(el+' img').css({
                width: Math.round(scaleX*$('#avatar').width() ) + 'px',
                height: Math.round(scaleY*$('#avatar').height() ) + 'px',
                marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px',
                marginTop: '-' + Math.round(scaleY * selection.y1) + 'px'
            });
        }
        function preview(img, selection) {
            adjust('#img_small_preview', selection);
            adjust('#img_big_preview', selection);
        }
        $('img#avatar').imgAreaSelect({
            aspectRatio: "4:4",
            x1: 60,
            y1:60,
            x2: 200,
            y2: 200,
            onSelectEnd:function(img, selection) {
                $('#id_top').val(selection.y1);
                $('#id_left').val(selection.x1);
                $('#id_right').val(selection.x2);
                $('#id_bottom').val(selection.y2);
            },
            onSelectChange: preview
        });
    });
    var value = 0;
    function avatarrotateleft(){
        value -=90;
        $('#avatar').rotate({ animateTo:value});
        $('#avatar1').rotate({ animateTo:value});
        $('#avatar2').rotate({ animateTo:value});
    }
    function avatarrotateright(){
        value +=90;
        $('#avatar').rotate({ animateTo:value});
        $('#avatar1').rotate({ animateTo:value});
        $('#avatar2').rotate({ animateTo:value});
    }
    function select_avatar(){
        $('#avatar_id').click();
    }
    function uploadavatar(){
        $('#avatar_form').submit();
    }
    function submit_avatar(){
        $('#rotation').val(value);
        $('#crop_form').submit();
    }
</script>
@endsection