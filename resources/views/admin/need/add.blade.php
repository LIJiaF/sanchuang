@extends('layouts.admin')
@section('title','三创网后台——发布需求')
@section('content')
<script type="text/javascript" src="{{asset('resources/org/edit/script/jquery-1.6.4.js')}}"></script>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 发布需求
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
                <a href="{{url('admin/need/create')}}"><i class="fa fa-plus"></i>发布需求</a>
                <a href="{{url('admin/need')}}"><i class="fa fa-fw fa-list-ul"></i>需求列表</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/need')}}" method="post">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="120">技术领域：</th>
                        <td>
                            <select name="nee_class">
                                <option value="信息技术">信息技术</option>
                                <option value="新材料">新材料</option>
                                <option value="资源环境">资源环境</option>
                                <option value="纺织服装">纺织服装</option>
                                <option value="食品营养">食品营养</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>需求名称：</th>
                        <td>
                            <input type="text" class="lg" name="nee_name">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>投入资金：</th>
                        <td>
                            <input type="text" class="lg" name="nee_rate" style="width:200px;">
                        </td>
                    </tr>                    
                    <tr>
                        <th>合作方式：</th>
                        <td>
                            <input type="text" class="lg" name="nee_method" style="width:200px;">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>需求描述：</th>
                        <td>
                            <textarea name="nee_content" style="resize:none;"></textarea>
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