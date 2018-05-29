@extends('common.layout')
@section('content')
    <div id="content">
        <div class="content-wrapper">
            @include('common.navigation')
            <div class="outlet">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default toggle">
                            <div class="panel-heading">
                                <h3 class="panel-title">检索条件</h3>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal group-border hover-stripped" action="" id="validate">
                                    @foreach($tpl::data() as $key=>$val)
                                        @if (!$val['readonly'])
                                        @if ($val['type'] == 'text')
                                            <div class="form-group">
                                                <label class="col-lg-2 col-md-2 col-sm-12 control-label">{{$val['name']}}</label>
                                                <div class="col-lg-8 col-md-8">
                                                    <input type="{{$val['type']}}" class="form-control"
                                                           name="{{$val['key']}}" value="{{$val['value']}}"
                                                           placeholder="请输入{{$val['name']}}" >
                                                </div>
                                            </div>
                                        @elseif ($val['type'] == 'select')
                                            <div class="form-group">
                                                <label class="col-lg-2 col-md-2 col-sm-12 control-label">{{$val['name']}}</label>
                                                <div class="col-lg-8 col-md-8">
                                                    <select class="form-control" name="{{$val['key']}}">
                                                        @foreach ($val['list'] as $lkey=>$lval)
                                                            <option @if(is_numeric($val['value']) && $val['value'] == (int)$lkey) selected
                                                                    @endif value="{{$lkey}}">{{$lval}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @endif
                                        @endif
                                    @endforeach
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
    </div>
    <script>
        $(function () {
            $('.J_return').on('click', function () {
                location = document.referrer;
            });
            $('.J_submit').on('click', function () {
                var data = $("form").serializeArray();
                $.ajax({
                    url: "{{$tpl::$addUrl}}",
                    type:'post',
                    data: data,
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