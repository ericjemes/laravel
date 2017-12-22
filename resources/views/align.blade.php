@extends('common.layout')
@section('content')
	<div id="content">
		<div class="content-wrapper">
			@include('common.navigation')
			<div class="outlet">
				<div class="row">
					<!-- Start .row -->
					<div class="col-lg-12">
						<!-- Start col-lg-12 -->
						<div class="panel panel-default toggle">
							<div class="panel-heading">
								<h3 class="panel-title">分配</h3>
							</div>
							<div class="panel-body">
								<form class="form-horizontal group-border" role="form">
									<div class="form-group">
										<label class="col-lg-2 col-md-2  control-label">请勾选需要分配的数据</label>
										<div class="col-lg-8 col-md-8">
											<select multiple="multiple" size="10" name="duallistbox" class="duallistbox col-lg-12">
												<optgroup label="Mountain Time Zone">
													@foreach($data as $key=>$val)
													<option value="{{$val['id']}}" @if($val['selected']) selected @endif>&nbsp&nbsp&nbsp{{$val['name']}}</option>
													@endforeach
												</optgroup>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2 control-label">
											<button type="button" class="btn btn-success J_submit">确 定</button>
										</label>
										<label class="control-label">
											<button type="button" class="btn btn-yellow J_return">返 回</button>
										</label>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<script src="/assets/plugins/forms/dual-list-box/jquery.bootstrap-duallistbox.js"></script>
	<script>
		$(function(){
            $('.J_return').on('click', function () {
                location = document.referrer;
            });
            $('.duallistbox').bootstrapDualListbox({
                nonselectedlistlabel: '未勾选',
                selectedlistlabel: '已勾选',
                preserveselectiononmove: 'moved',
                moveonselect: false,
                iconMove: 'en-arrow-right8 s16',
                iconMoveAll: 'fa-double-angle-right s16',
                iconRemove: 'en-arrow-left8 s16',
                iconRemoveAll: 'fa-double-angle-left s16'
            });
            $('.J_submit').on('click', function () {
                var data = $("form").serializeArray();
                var param = [];
                $.each(data,function(key, val){
					if (val.name=='duallistbox') {
                        param.push(val['value']);
					}
				});
                $.ajax({
                    url: "{{$ajax}}",
                    type:'post',
                    data: {'id':'{{$id}}','{{$update_key}}':param.join()},
                    success: function(data) {
                        if (data.code == 0)
                        {
                            successNotice('操作成功');
                        } else {
                            errorNotice(data.msg);

                        }
                    }
                })
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