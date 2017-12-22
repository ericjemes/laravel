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
                                <form class="form-horizontal group-border hover-stripped" action="">
                                    @foreach($query as $key=>$val)
                                        @if ($val['type'] == 'text')
                                            <div class="form-group">
                                                <label class="col-lg-2 col-md-2 col-sm-12 control-label">{{$val['name']}}</label>
                                                <div class="col-lg-8 col-md-8">
                                                    <input type="{{$val['type']}}" class="form-control"
                                                           name="{{$val['key']}}" value="{{$val['value']}}"
                                                           placeholder="[{{$val['name']}}] 查询">
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
                                    @endforeach
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">
                                            <button type="submit" class="btn btn-success J_submit">查 寻</button>
                                        </label>
                                        <label class="control-label">
                                            <button type="button" class="btn J_reset">重 置</button>
                                        </label>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="outlet">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default plain">
                            <div class="panel-heading white-bg">
                                <h4 class="panel-title">Data table</h4>
                            </div>
                            <div class="panel-body">
                                <table class="table display" id="datatable">
                                    <thead>
                                    <tr>
                                        @foreach($head as $key=>$val)
                                            <th>{{$val}}</th>
                                        @endforeach
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data['list'] as $val)
                                        <tr class="odd gradeX">
                                            @foreach($head as $key=>$column)
                                                @if ($key=='buttons' && isset($val['buttons']))
                                                    <td>
                                                        @foreach($val['buttons'] as $key=>$val)
                                                            @if($val['type'] == 'page')
                                                                <button type="button" class="btn btn-xs btn-default"><a
                                                                            href="{{$val['url']}}">{{$val['name']}}</a>
                                                                </button>
                                                            @elseif($val['type'] == 'ajax')
                                                                <button type="button"
                                                                        class="btn btn-xs btn-default J_confirm_modal"
                                                                        data-url="{{$val['url']}}">{{$val['name']}}</button>
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                @else
                                                    <td>@if(isset($map[$key]) && isset($map[$key][$val[$key]])) {{$map[$key][$val[$key]]}} @else {{$val[$key]}} @endif</td>
                                                @endif
                                            @endforeach
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $('.J_reset').on('click', function () {
                $(':input', 'form').not(':button, :submit, :reset, :hidden').val('').removeAttr('checked').removeAttr('selected');
            });
            $('.J_confirm_modal').on('click', function () {
                var _this = $(this);
                bootbox.confirm({
                    message: "您确定要执行该操作？",
                    title: _this.html() + "当前数据",
                    callback: function (result) {
                        var url = _this.data('url');
                        if (result && url) {
                            $.ajax({
                                url: url,
                                type: 'post',
                                success: function (data) {
                                    if (data.code == 0) {
                                        successNotice('操作成功');
                                        location.reload();
                                    } else {
                                        errorNotice(data.msg)
                                    }
                                },
                                error: function () {
                                    errorNotice('接口异常')
                                }
                            })
                        }
                    }
                });
            });
        })

        //success notice
        function successNotice (text)
        {
            $.gritter.add({
                title: '成功!!!',
                text: text,
                time: '',
                close_icon: 'en-cross',
                icon: 'ec-trashcan',
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
                icon: 'ec-users',
                class_name: 'error-notice'
            });
        }
    </script>
@endsection