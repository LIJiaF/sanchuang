@extends('layouts.home')
@section('title','金汇智谷——科技评估详情')
@section('content')
	
	<link rel="stylesheet" type="text/css" href="{{asset('resources/views/home/css/newslist.css')}}">

	<!-- 主体部分代码开始 -->

	<div class="content">
		
		<!-- 位置信息代码 -->
		<div class="position">
			
			您现在所处位置：<a href="{{url('/')}}">首页</a>&gt;&gt;<a href="{{url('assess')}}">科技评估</a>&gt;&gt;<span id="position">{{$assdata->ass_name}}</span>

		</div>

		<!-- 新闻文章代码 -->
		<div class="newslist">
			
			<h1 id="title">{{$assdata->ass_name}}</h1>

			<h2>浏览次数： <span id="source">0</span>	发布人:<span id="author">{{$assdata->ass_author}}</span>	日期：<span id="time">{{date('Y-m-d',$assdata->ass_time)}}</span></h2>
			
			<div class="newslistcontent">
				<p>{!!$assdata->ass_content!!}</p>
			</div>

		</div>

	</div>

	<!-- 主体部分代码结束 -->

@endsection