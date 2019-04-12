@extends('layouts.admin')
@section('title','三创网后台——首页')
@section('content')

	<!--面包屑导航 开始-->
	<div class="crumb_warp">
		<!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
		<i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 系统基本信息
	</div>
	<!--面包屑导航 结束-->
	
	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/fruit/create')}}"><i class="fa fa-fw fa-plus-square"></i>发布科技成果</a>
                <a href="{{url('admin/need/create')}}"><i class="fa fa-fw fa-plus-square"></i>发布科技需求</a>
                <a href="{{url('admin/hatch/create')}}"><i class="fa fa-fw fa-plus-square"></i>发起孵化需求</a>
                <a href="{{url('admin/bank/create')}}"><i class="fa fa-fw fa-plus-square"></i>发布金融项目</a>
                <a href="{{url('admin/assess/create')}}"><i class="fa fa-fw fa-plus-square"></i>在线评估</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

	
    <div class="result_wrap">
        <div class="result_title">
            <h3>系统基本信息</h3>
        </div>
        <div class="result_content">
            <ul>
                <li>
                    <label>操作系统</label><span>{{PHP_OS}}</span>
                </li>
                <li>
                    <label>运行环境</label><span>{{$_SERVER['SERVER_SOFTWARE']}}</span>
                </li>
                <li>
                    <label>设计-版本</label><span>v-0.1</span>
                </li>
                <li>
                    <label>北京时间</label><span><?php echo date('Y年m月d日 H时i分s秒'); ?></span>
                </li>
                <li>
                    <label>服务器域名/IP</label><span>{{$_SERVER['SERVER_NAME']}} [ {{$_SERVER['SERVER_ADDR']}} ]</span>
                </li>
                <li>
                    <label>Host</label><span>127.0.0.1</span>
                </li>
            </ul>
        </div>
    </div>

	<!--结果集列表组件 结束-->

@endsection