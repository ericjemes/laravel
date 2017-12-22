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
                                <h3 class="panel-title">数据详情</h3>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal group-border hover-stripped" action="" id="validate">
                                    @foreach($form as $key=>$val)
                                        @if ($val['type'] == 'text')
                                            <div class="form-group">
                                                <label class="col-lg-2 col-md-2 col-sm-12 control-label">{{$val['name']}}</label>
                                                <div class="col-lg-8 col-md-8">
                                                    <input type="{{$val['type']}}" class="form-control"
                                                           name="{{$val['key']}}" value="{{$val['value']}}">
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
                                        @elseif ($val['type'] == 'list')
                                            <div class="form-group">
                                                <label class="col-lg-2 col-md-2 col-sm-12 control-label">{{$val['name']}}</label>
                                                <div class="col-lg-8 col-md-8">
                                                    <ul class="list-group">
                                                        @foreach($val['value'] as $val)
                                                            <li class="list-group-item"><tip class="en-arrow-right4">&nbsp&nbsp{{$val}}</tip></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">
                                                <button type="button" class="btn J_return btn-yellow">返 回</button>
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
        })
    </script>
@endsection