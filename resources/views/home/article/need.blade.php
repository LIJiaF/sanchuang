@extends('layouts.home')
@section('title','金汇智谷——科技需求详情')
@section('content')
	
	<link rel="stylesheet" type="text/css" href="{{asset('resources/views/home/css/newslist.css')}}">

	<!-- 主体部分代码开始 -->

	<div class="content">
		
		<!-- 位置信息代码 -->
		<div class="position">
			
			您现在所处位置：<a href="{{url('/')}}">首页</a>&gt;&gt;<a href="{{url('need')}}">科技需求</a>&gt;&gt;<span id="position">{{$needata->nee_name}}</span>

		</div>

		<!-- 新闻文章代码 -->
		<div class="newslist">
			
			<h1 id="title">{{$needata->nee_name}}</h1>

			<h2>浏览次数： <span id="source">0</span>	发布人:<span id="author">{{$needata->nee_author}}</span>	日期：<span id="time">{{date('Y-m-d',$needata->nee_time)}}</span></h2>
			
			<div class="newslistcontent">
				<p>{!!$needata->nee_content!!}</p>
			</div>

		</div>

	</div>

	<!-- 主体部分代码结束 -->

@endsection