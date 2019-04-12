@extends('layouts.home')
@section('title','金汇智谷——科技评估')
@section('content')
	<link rel="stylesheet" type="text/css" href="{{asset('resources/views/home/css/teachering.css')}}">

	<div class="assessclass">
		
		<img src="{{asset('resources/views/home/images/assess_top.jpg')}}">
		<p class="description">免费评估</p>
		<a href="javascript:;" onclick="alert('咨询热线：400-820-8820');" class="seek">在线咨询</a>
		<a href="{{url('admin/assess/create')}}" class="assess">立即评估</a>
		<p class="phone">咨询热线：400-820-8820</p>

	</div>

	<div class="container">
		
		<!-- 左边栏开始 -->
		<div class="con-left">
			
			<!-- 教改科研板块开始 -->
			<h1 class="title" style="font-size:25px;text-align:center;padding:20px 0;">Qcount知识产权评估系统</h1>

			<h2 class="title_small">服务说明</h2>
			<p class="title_content">
				本系统采用科学合理的评估原理，根据美国最具代表性的评估协会——NACVA评估理论及评估准则公报为基础，为企业、专家提供定价的参考体系。
			</p>
			<p class="title_content">
				如若需要用于工商注册、技术入股、专利诉讼、质押融资、财务报告等用途的无形资产评估报告。
			</p>
			
			<!-- 教改科研板块结束 -->

			<!-- 教改科研板块开始 -->

			<!-- <h2 class="title_small">服务流程</h2>
			<img class="title_flow" src="{{asset('resources/views/home/images/assess_flow.jpg')}}"> -->
			
			<!-- 教改科研板块结束 -->

			<!-- 教改科研板块开始 -->
			
			<h2 class="title_small">评估案例</h2>
			<img class="title_flow" src="{{asset('resources/views/home/images/assess_example.png')}}">
			
			<!-- 教改科研板块结束 -->

			<!-- 教改科研板块开始 -->
			
			<!-- <h2 class="title_small">功能用途</h2>
			<img class="title_flow" src="{{asset('resources/views/home/images/assess_use.png')}}"> -->
			
			<!-- 教改科研板块结束 -->

			<!-- 教改科研板块开始 -->
			
			<h2 class="title_small">专业资质</h2>
			<img class="title_flow" src="{{asset('resources/views/home/images/assess_aptitude.png')}}">
			
			<!-- 教改科研板块结束 -->

			<!-- 教改科研板块开始 -->
			
			<h2 class="title_small">四大特色</h2>
			<img class="title_flow" src="{{asset('resources/views/home/images/assess_feature.png')}}">
			
			<!-- 教改科研板块结束 -->

		</div>
		<!-- 左边栏结束 -->

		<!-- 右边栏开始 -->
		<div class="con-right">

			<h1 class="con-right-title"><a href="{{url('admin/assess')}}">我要立即评估</a></h1>
			
			<!-- 点击排行开始 -->
			<div class="view">
				<h1 class="view-title">技术评估浏览排行</h1>
				<ul>
					<?php $i=1; ?>
					@foreach($assview as $v)
					<li><span class="block" style="background:#3BC9CB;"><?php echo $i; ?></span><a href="{{url('assess/'.$v->ass_id)}}" title="{{$v->ass_name}}">{{$v->ass_name}}</a></li>
					<?php $i++; ?>
					@endforeach
				</ul>
			</div>
			<!-- 点击排行结束 -->

			<!-- 最新文章开始 -->
			<div class="view">
				<h1 class="view-title" style="background:#FD6E48;">最新技术评估</h1>
				<ul>
					<?php $i=1; ?>
					@foreach($asstime as $t)
					<li><span class="block" style="background:#3BC9CB;"><?php echo $i; ?></span><a href="{{url('assess/'.$t->ass_id)}}" title="{{$t->ass_name}}">{{$t->ass_name}}</a></li>
					<?php $i++; ?>
					@endforeach
				</ul>
			</div>
			<!-- 最新文章结束 -->

		</div>
		<!-- 右边栏结束 -->

	</div>

@endsection