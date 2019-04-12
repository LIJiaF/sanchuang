@extends('layouts.home')
@section('title','金汇智谷——科技专家库')
@section('content')

	<link rel="stylesheet" type="text/css" href="{{asset('resources/views/home/css/teacherTeam.css')}}">

	<!-- 主体内容代码开始 -->

	<div class="content">

		<h1 class="present">专家队伍介绍</h1>

		<h2 class="cate"><i class="line" id="left"></i> 产业技术 <i class="line" id="right"></i></h2>
		
		<!-- 老师列表开始 -->
		<div class="container">
			
			@foreach($expdata1 as $e)
			<div class="con_list">
				<a href="{{url('expert/'.$e->exp_id)}}">
					<img src="{{$e->exp_thumb}}" style="max-width:220px;max-height:220px;">
					<div class="con_list_con">
						<h1 class="name">{{$e->exp_name}}&nbsp;&nbsp;<span>{{$e->exp_domain}}专家</span></h1>
						<p>{!!$e->exp_content!!}</p>
						<button class="con_list_btn">查看详情&gt;&gt;</button>
					</div>
				</a>
			</div>
			@endforeach

		</div>
		<!-- 老师列表结束 -->

		<h2 class="cate"><i class="line" id="left"></i> 互联网 <i class="line" id="right"></i></h2>
		
		<!-- 老师列表开始 -->
		<div class="container">
			
			@foreach($expdata2 as $e)
			<div class="con_list">
				<a href="{{url('expert/'.$e->exp_id)}}">
					<img src="{{$e->exp_thumb}}" style="max-width:220px;max-height:220px;">
					<div class="con_list_con">
						<h1 class="name">{{$e->exp_name}}&nbsp;&nbsp;<span>{{$e->exp_domain}}专家</span></h1>
						<p>{!!$e->exp_content!!}</p>
						<button class="con_list_btn">查看详情&gt;&gt;</button>
					</div>
				</a>
			</div>
			@endforeach

		</div>
		<!-- 老师列表结束 -->

		<h2 class="cate"><i class="line" id="left"></i> 创业指导 <i class="line" id="right"></i></h2>
		
		<!-- 老师列表开始 -->
		<div class="container">

			@foreach($expdata3 as $e)
			<div class="con_list">
				<a href="{{url('expert/'.$e->exp_id)}}">
					<img src="{{$e->exp_thumb}}" style="max-width:220px;max-height:220px;">
					<div class="con_list_con">
						<h1 class="name">{{$e->exp_name}}&nbsp;&nbsp;<span>{{$e->exp_domain}}专家</span></h1>
						<p>{{$e->exp_content}}</p>
						<button class="con_list_btn">查看详情&gt;&gt;</button>
					</div>
				</a>
			</div>
			@endforeach

		</div>
		<!-- 老师列表结束 -->

		<h2 class="cate"><i class="line" id="left"></i> 科技政策 <i class="line" id="right"></i></h2>
		
		<!-- 老师列表开始 -->
		<div class="container">

			@foreach($expdata4 as $e)
			<div class="con_list">
				<a href="{{url('expert/'.$e->exp_id)}}">
					<img src="{{$e->exp_thumb}}" style="max-width:220px;max-height:220px;">
					<div class="con_list_con">
						<h1 class="name">{{$e->exp_name}}&nbsp;&nbsp;<span>{{$e->exp_domain}}专家</span></h1>
						<p>{!!$e->exp_content!!}</p>
						<button class="con_list_btn">查看详情&gt;&gt;</button>
					</div>
				</a>
			</div>
			@endforeach

		</div>
		<!-- 老师列表结束 -->

	</div>

	<!-- 主体内容代码结束 -->

@endsection