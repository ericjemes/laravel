<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
	<title>jqueryÍ·ÏñÔÚÏß²Ã¼ô²å¼þ - Õ¾³¤ËØ²Ä</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/imgareaselect-default.css" />
	<script type="text/javascript" src="/assets/js/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="/assets/js/jquery.imgareaselect.pack.js"></script>
	<script type="text/javascript" src="/assets/js/jqueryRotate.js"></script>
	<style>
		.portrait_left{float: left; height: auto; width: 306px;}
		#avatar{height: 280px;}
		.portrait_revolve{height: auto; padding-top: 15px; width: 306px;}
		/*.revolve_left{background: url("images/setup.gif") repeat scroll -128px -55px rgba(0, 0, 0, 0); float: left; height: 22px; width: 22px;}.revol_left_txt{color: #FF6699; float: left; height: 22px; line-height: 22px; text-align: left; width: 110px;}*/
		.revol_left_txt{color: #FF6699;float: left;height: 22px;line-height: 22px;text-align: left;width: 110px;}
		.revol_right_txt{color: #FF6699;float: left;height: 22px;line-height: 22px;text-align: right;width: 131px;}
		/*.revolve_right{background: url("images/setup.gif") repeat scroll -128px -77px rgba(0, 0, 0, 0); float: left; height: 22px; width: 22px;}*/
		.setup_but{height: 28px; padding-left: 93px; padding-top: 40px; width: auto;}
		/*.baseinf_but1{background: url("images/secondary.gif") repeat scroll -194px -96px rgba(0, 0, 0, 0); border: medium none; color: #FFFFFF; font-size: 14px; font-weight: bold; height: 28px; line-height: 28px; margin-right: 22px; outline: medium none; width: 78px;}*/
		.portrait_right{float: left; font-size: 12px; height: 280px; padding-left: 80px; width: 320px;}
		.portrait_right_bottom{color: #666666; height: 220px; width: 310px;}
		.portrait1{float: left; height: 200px; width: 180px;}
		#img_big_preview{height: 180px; margin: 0 auto; width: 180px;}.img_preview{border: 1px solid #000000; overflow: hidden; position: relative;}.img_preview img{margin: 0; position: relative;}.portrait2{float: left; height: auto; padding-left: 40px; width: 68px;}
		#img_small_preview{height: 49px; margin: 0 auto; width: 49px;}.img_preview{border: 1px solid #000000; overflow: hidden; position: relative;}
	</style>
</head>
<body>
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
	<div class="setup_but">
		<button class="baseinf_but12" onClick="submit_avatar();">确定</button>
	</div>
</div>

<div class="portrait_right">
	<p class="portrait_right_txt">您上传的头像会自动生成小尺寸头像，请注意小尺寸的头像是否清晰</p>
	<div class="portrait_right_bottom">
		<div class="portrait1">
			<div id="img_big_preview" class="img_preview">
				<img id="avatar1" alt="Í·ÏñÔ¤ÀÀ" src="/assets/img/Koala_cropped.jpg" style="width: 360px; height: 360px; margin-left: -117px; margin-top: -44px;">
			</div>
			<p>大尺寸头像，180×180</p>
		</div>
	</div>
	<div class="portrait2">
		<div id="img_small_preview" class="img_preview"><img id="avatar2" alt="Ô¤ÀÀ" src="/assets/img/Koala_cropped.jpg" style="width: 98px; height: 98px; margin-left: -32px; margin-top: -12px;"></div>
		<p>中尺寸头像</p>
		<p>50*50</p>
	</div>
</div>

</body>

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
</html>