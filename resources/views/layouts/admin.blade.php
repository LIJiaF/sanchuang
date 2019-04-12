<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{asset('resources/views/admin/style/css/ch-ui.admin.css')}}">
	<link rel="stylesheet" href="{{asset('resources/views/admin/style/font/css/font-awesome.min.css')}}">
	<script type="text/javascript" src="{{asset('resources/views/admin/style/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/views/admin/style/js/ch-ui.admin.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/org/layer/layer.js')}}"></script>
</head>
<body>

	<!--头部 开始-->
	<div class="top_box">
		<div class="top_left">
			<div class="logo">后台管理界面</div>
			<ul id="top_btn">
				<li><a href="{{url('admin/index')}}">首页</a></li>
				@if(session('users')->username=='administrator')
					<li><a href="{{url('admin/fruadmin')}}">管理页</a></li>
				@endif
			</ul>
		</div>
		<div class="top_right">
			<ul>
				<li>您好：{{session('users')->username}}</li>
				<li><a href="{{url('admin/pass')}}" target="main">修改密码</a></li>
				<li><a href="{{url('admin/quit')}}">返回</a></li>
			</ul>
		</div>
	</div>
	<!--头部 结束-->

	<!--左侧导航 开始-->
	<div class="menu_box">
		<ul>
            <li>
            	<h3><i class="fa fa-fw fa-clipboard"></i>科技成果</h3>
                <ul class="sub_menu">
                    <li><a href="{{url('admin/fruit/create')}}"><i class="fa fa-fw fa-plus-square"></i>发布成果</a></li>
                    <li><a href="{{url('admin/fruit')}}"><i class="fa fa-fw fa-list-ul"></i>成果列表</a></li>
                </ul>
            </li>
            <li>
            	<h3><i class="fa fa-fw fa-money"></i>科技需求</h3>
                <ul class="sub_menu">
                    <li><a href="{{url('admin/need/create')}}"><i class="fa fa-fw fa-plus-square"></i>发布需求</a></li>
                    <li><a href="{{url('admin/need')}}"><i class="fa fa-fw fa-list-ul"></i>需求列表</a></li>
                </ul>
            </li>
            <li>
            	<h3><i class="fa fa-fw fa-sort-alpha-asc"></i>科技评估</h3>
                <ul class="sub_menu">
                    <li><a href="{{url('admin/assess/create')}}"><i class="fa fa-fw fa-plus-square"></i>在线评估</a></li>
                    <li><a href="{{url('admin/assess')}}"><i  class="fa fa-fw fa-list-ul"></i>评估报告</a></li>
                </ul>
            </li>
            <li>
            	<h3><i class="fa fa-fw fa-circle-thin"></i>科技孵化</h3>
                <ul class="sub_menu">
                    <li><a href="{{url('admin/hatch/create')}}"><i class="fa fa-fw fa-plus-square"></i>发起孵化需求</a></li>
                    <li><a href="{{url('admin/hatch')}}"><i class="fa fa-fw fa-list-ul"></i>孵化需求列表</a></li>
                </ul>
            </li>
            <li>
            	<h3><i class="fa fa-fw fa-bar-chart-o"></i>科技金融</h3>
                <ul class="sub_menu">
                    <li><a href="{{url('admin/bank/create')}}"><i class="fa fa-fw fa-plus-square"></i>发布项目</a></li>
                    <li><a href="{{url('admin/bank')}}"><i class="fa fa-fw fa-list-ul"></i>项目列表</a></li>
                </ul>
            </li>
            @if(session('users')->username=='administrator')
            <li>
            	<h3><i class="fa fa-fw fa-unlink"></i>科技导航</h3>
                <ul class="sub_menu">
                    <li><a href="{{url('admin/link/create')}}"><i class="fa fa-fw fa-plus-square"></i>添加链接</a></li>
                    <li><a href="{{url('admin/link')}}"><i class="fa fa-fw fa-list-ul"></i>链接列表</a></li>
                </ul>
            </li>
            <li>
            	<h3><i class="fa fa-fw fa-institution"></i>共建实验室</h3>
                <ul class="sub_menu">
                    <li><a href="{{url('admin/laboratory/create')}}"><i class="fa fa-fw fa-plus-square"></i>增加实验室</a></li>
                    <li><a href="{{url('admin/laboratory')}}"><i class="fa fa-fw fa-list-ul"></i>实验室列表</a></li>
                </ul>
            </li>
            <li>
            	<h3><i class="fa fa-fw fa-mortar-board"></i>科技专家库</h3>
                <ul class="sub_menu">
                    <li><a href="{{url('admin/expert/create')}}"><i class="fa fa-fw fa-plus-square"></i>添加专家</a></li>
                    <li><a href="{{url('admin/expert')}}"><i class="fa fa-fw fa-list-ul"></i>专家列表</a></li>
                </ul>
            </li>
            <li>
            	<h3><i class="fa fa-fw fa-building-o"></i>科技大讲堂</h3>
                <ul class="sub_menu">
                    <li><a href="{{url('admin/video/create')}}"><i class="fa fa-fw fa-plus-square"></i>上传视频</a></li>
                    <li><a href="{{url('admin/video')}}"><i class="fa fa-fw fa-list-ul"></i>视频列表</a></li>
                </ul>
            </li>
            @endif
        </ul>
	</div>
	<!--左侧导航 结束-->

	<!--主体部分 开始-->
	<div class="main_box" style="overflow:auto;">

		@yield('content')

	</div>
	<!--主体部分 结束-->

	<!--底部 开始-->
	<div class="bottom_box">
		三创网后台管理
	</div>
	<!--底部 结束-->

</body>
</html>