@extends('layouts.admin')
@section('title','三创网后台——在线评估')
@section('content')
<script type="text/javascript" src="{{asset('resources/org/edit/script/jquery-1.6.4.js')}}"></script>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 在线评估
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
            @if(count($errors)>0)
                <div class="mark">
                    @if(is_object($errors))
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    @else
                        <p>{{$errors}}</p>
                    @endif
                </div>
            @endif
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/assess/create')}}"><i class="fa fa-plus"></i>在线评估</a>
                <a href="{{url('admin/assess')}}"><i class="fa fa-fw fa-list-ul"></i>评估报告</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/assess')}}" method="post">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th><i class="require">*</i>技术名称：</th>
                        <td>
                            <input type="text" class="lg" name="ass_name">
                        </td>
                    </tr>
                    <tr>
                        <th width="120">技术转让区域：</th>
                        <td>
                            <select name="ass_area">
                                <option value="全国">全国</option>
                                <option value="广东">广东</option>
                                <option value="北京">北京</option>
                                <option value="福建">福建</option>
                                <option value="安徽">安徽</option>
                                <option value="重庆">重庆</option>
                                <option value="甘肃">甘肃</option>
                                <option value="广西">广西</option>
                                <option value="贵州">贵州</option>
                                <option value="海南">海南</option>
                                <option value="河北">河北</option>
                                <option value="黑龙江">黑龙江</option>
                                <option value="河南">河南</option>
                                <option value="江苏">江苏</option>
                                <option value="江西">江西</option>
                                <option value="吉林">吉林</option>
                                <option value="辽宁">辽宁</option>
                                <option value="内蒙古">内蒙古</option>
                                <option value="宁夏">宁夏</option>
                                <option value="青海">青海</option>
                                <option value="山东">山东</option>
                                <option value="上海">上海</option>
                                <option value="山西">山西</option>
                                <option value="陕西">陕西</option>
                                <option value="四川">四川</option>
                                <option value="天津">天津</option>
                                <option value="新疆">新疆</option>
                                <option value="西藏">西藏</option>
                                <option value="云南">云南</option>
                                <option value="浙江">浙江</option>
                                <option value="台湾">台湾</option>
                                <option value="香港">香港</option>
                                <option value="澳门">澳门</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <th width="120">行业类别：</th>
                        <td>
                            <select name="ass_class">
                                <option value="电子信息">电子信息</option>
                                <option value="机械">机械</option>
                                <option value="新型材料">新型材料</option>
                                <option value="电气自动化">电气自动化</option>
                                <option value="仪器仪表">仪器仪表</option>
                                <option value="新能源">新能源</option>
                                <option value="安全防护">安全防护</option>
                                <option value="环保和资源">环保和资源</option>
                                <option value="轻工纺织">轻工纺织</option>
                                <option value="医药与医疗">医药与医疗</option>
                                <option value="包装印刷">包装印刷</option>
                                <option value="海洋开发">海洋开发</option>
                                <option value="航天航空">航天航空</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>评估目的：</th>
                        <td>
                            <input type="text" class="lg" name="ass_obj" style="width:200px;">
                        </td>
                    </tr>                    
                    <tr>
                        <th><i class="require">*</i>评估价格：</th>
                        <td>
                            <input type="text" class="lg" name="ass_rate" style="width:200px;">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>技术描述：</th>
                        <td>
                            <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/edit/kindeditor/kindeditor.js')}}"></script>
                            <script type="text/javascript">
                                KindEditor.ready(function(K) {
                                        window.editor = K.create('#editor_id');
                                });
                            </script>
                            <textarea name="ass_content" id="editor_id" style="width:930px;height:300px;"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

@endsection