<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="{{asset('resources/views/home/css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('resources/views/home/css/icon.css')}}">
	<script type="text/javascript" src="{{asset('resources/views/home/js/jquery-1.12.3.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('resources/views/home/js/script.js')}}"></script>
</head>
<body>
	
	<!-- header代码开始 -->
	<div class="header">
		
		<!-- top代码 -->
		<div class="top center">
			
			<ul class="topList fl">
				@if(!session('users'))
				<li style="padding:0;">亲，您还没有登录，请&nbsp;</li>
				<li><a href="{{url('admin/login')}}">登录</a></li>
				<li><a href="{{url('admin/register')}}">注册</a></li>
				@else
					<li style="padding:0;color:#fff;">您好，{{session('users')->username}}，欢迎来到金汇智谷网站</li>
				@endif
			</ul>

			<ul class="topList" style="width:200px;margin:0 auto;">
				<li style="padding:0;text-align:center;margin-left:50px;">日期：<?php echo date('Y-m-d'); ?></li>
			</ul>

			<ul class="topList fr">
				<li><a href="{{url('admin/index')}}" target="_blank">后台管理</a></li>
				@if(session('users'))
				<li><a href="{{url('quit')}}">注销登录</a></li>
				@endif
			</ul>

		</div>

	</div>
	<!-- header代码结束 -->

	<!-- logo、导航栏代码开始 -->
	<div id="navBox">

		<div class="nav" id="nav">
			
			<form action="{{url('search')}}" method="post" class="search fr">
				{{csrf_field()}}
				<input type="text" name="search">
				<input type="submit" value="搜索">
			</form>
			
			<!-- logo图片 -->
			<img src="{{asset('resources/views/home/images/mainLogo.png')}}" id="navImg">

		</div>

		<!-- 导航栏 -->
		<ul class="navList">
			<li class="navList_first" style="width:230px;"><a href="{{url('/')}}">金汇智谷</a></li>
			<li><a href="{{url('fruit')}}">科技成果</a></li>
			<li><a href="{{url('need')}}">科技需求</a></li>
			<li><a href="{{url('assess')}}">科技评估</a></li>
			<li><a href="{{url('hatch')}}">科技孵化</a></li>
			<li><a href="{{url('bank')}}">科技金融</a></li>
			<li><a href="{{url('link')}}">科技导航</a></li>
			<li><a href="{{url('laboratory')}}">共建实验室</a></li>
			<li><a href="{{url('expert')}}">科技专家库</a></li>
			<li><a href="{{url('videos')}}">科技大讲堂</a></li>
		</ul>

	</div>
	<!-- logo、导航栏代码结束 -->
	
	<div id="maincontent">
		@yield('content')
	</div>

	<!-- footer代码开始 -->
	<div class="footer">
		
		<p>版权所有&copy; 金汇智谷 <a href="javascript::">联系管理员</a></p>

	</div>
	<!-- footer代码结束 -->

</body>
</html>