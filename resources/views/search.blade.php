<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>金汇智谷——搜索</title>
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
			
			<form action="{{url('search')}}" method="post" class="search fr" onsubmit="return checkSubmit();">
				{{csrf_field()}}
				<input type="text" name="search" value="{{$search}}">
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

	<style type="text/css">
	.searchcontent{
		width:1000px;
		min-height: 700px;
		margin:20px auto;
		padding:35px;
		border:1px solid #ddd;
	}
	.search_list{
		list-style: none;
	}
	.search_list h1{
		font-size:20px;
		color:#666;
		text-align: center;
		margin-top:100px;
		font-family: '微软雅黑';
	}
	.search_list li{
		line-height: 50px;
		border-bottom:1px solid #ccc;
	}
	.search_list li span{
		width:200px;
		color:#35A7C1;
		padding-left: 10px;
		display: inline-block;
	}
	.search_list li a{
		display: inline-block;
		width:650px;
	}
	.search_list li a:hover{
		text-decoration: underline;
	}
	.search_list li i{
		float:right;
		color:gray;
		padding-right: 10px;
	}
	</style>

	<div class="searchcontent">
		<ul class="search_list">
		@if(isset($data))
			@if(count($data)>0)
				@foreach($data as $d)
					@if(isset($d->fru_id))
						<li><span>科技成果</span><a href="{{url('fruit/'.$d->fru_id)}}" target="_blank">{{$d->fru_name}}</a><i>{{date('Y-m-d',$d->fru_time)}}</i></li>
					@elseif(isset($d->nee_id))
						<li><span>科技需求</span><a href="{{url('need/'.$d->nee_id)}}" target="_blank">{{$d->nee_name}}</a><i>{{date('Y-m-d',$d->nee_time)}}</i></li>
					@elseif(isset($d->ass_id))
						<li><span>科技评估</span><a href="{{url('assess/'.$d->ass_id)}}" target="_blank">{{$d->ass_name}}</a><i>{{date('Y-m-d',$d->ass_time)}}</i></li>
					@elseif(isset($d->hat_id))
						<li><span>科技孵化</span><a href="{{url('hatch/'.$d->hat_id)}}" target="_blank">{{$d->hat_name}}</a><i>{{date('Y-m-d',$d->hat_time)}}</i></li>
					@elseif(isset($d->ban_id))
						<li><span target="_blank">科技金融</span><a href="{{url('bank/'.$d->ban_id)}}">{{$d->ban_name}}</a><i>{{date('Y-m-d',$d->ban_time)}}</i></li>
					@endif
				@endforeach
			@else
				<h1>搜索结果为空</h1>
			@endif
		@endif
		</ul>
	</div>

	<!-- footer代码开始 -->
	<div class="footer">
		
		<p>版权所有&copy; 金汇智谷 <a href="javascript::">联系管理员</a></p>

	</div>
	<!-- footer代码结束 -->

</body>
</html>