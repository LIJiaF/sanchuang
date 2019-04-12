@extends('layouts.home')
@section('title','金汇智谷——首页')
@section('content')
	
	<link rel="stylesheet" type="text/css" href="{{asset('resources/views/home/css/main.css')}}">
	<script type="text/javascript" src="{{asset('resources/views/home/js/main.js')}}"></script>

	<!-- 轮播图代码开始 -->
	<div class="loop center" id="loop">
		
		<ul>
			<li><img src="{{asset('resources/views/home/images/loop/1.jpg')}}"></li>
			<li><img src="{{asset('resources/views/home/images/loop/2.jpg')}}"></li>
			<li><img src="{{asset('resources/views/home/images/loop/3.jpg')}}"></li>
		</ul>

		<div id="btn">
			<span class="active">1</span>
			<span>2</span>
			<span>3</span>
		</div>

		<div id="pubbtn">
			<a href="{{url('admin/need/create')}}" id="neebtn">发布需求</a>
			<a href="{{url('admin/fruit/create')}}" id="frubtn">发布成果</a>
		</div>

		<a href="javascript:;" id="prev" class="arrow">&lt;</a>
		<a href="javascript:;" id="next" class="arrow">&gt;</a>

	</div>
	<!-- 轮播图代码结束 -->

	<div class="news center" id="news">
		
		<h1><a href="{{url('fruit')}}" class="fr" target="_blank">更多&gt;</a>科技成果</h1>
		
		@foreach($frudata as $f)
			<div class="newsImportant fl">
				<a href="{{url('fruit/'.$f->fru_id)}}">
					<img src="{{$f->fru_thumb}}">
					<h2>{{$f->fru_name}}</h2>
				</a>
			</div>
		@endforeach

	</div>
	
	<!-- 主体部分代码开始 -->
	<div class="main center">
		
		<!-- 左边代码开始 -->
		<div class="mainLeft fl">
			
			<div class="public">
				
				<h1 id="tongzhi"><a href="{{url('need')}}" class="fr" target="_blank">更多</a>科技需求</h1>

				<ul class="publicList">
					@foreach($needata as $n)
					<li>					
						<span>{{date('Y-m-d',$n->nee_time)}}</span>
						<a href="{{url('need/'.$n->nee_id)}}" title="{{$n->nee_name}}">{{$n->nee_name}}</a>
					</li>
					@endforeach
				</ul>

			</div>

			<div class="public">
				
				<h1 id="kecheng"><a href="{{url('assess')}}" class="fr" target="_blank">更多</a>科技评估</h1>

				<ul class="publicList">
					@foreach($assdata as $a)
					<li>
						<span>{{date('Y-m-d',$a->ass_time)}}</span>
						<a href="{{url('assess/'.$a->ass_id)}}" title="{{$a->ass_name}}">{{$a->ass_name}}</a>
					</li>
					@endforeach
				</ul>

			</div>

			<div class="public">
				
				<h1 id="shijian"><a href="{{url('hatch')}}" class="fr" target="_blank">更多</a>科技孵化</h1>

				<ul class="publicList">
					@foreach($hatdata as $h)
					<li>
						<span>{{date('Y-m-d',$h->hat_time)}}</span>
						<a href="{{url('hatch/'.$h->hat_id)}}" title="{{$h->hat_name}}">{{$h->hat_name}}</a>
					</li>
					@endforeach
				</ul>

			</div>

			<div class="public">
				
				<h1 id="shijian"><a href="{{url('bank')}}" class="fr" target="_blank">更多</a>科技金融</h1>

				<ul class="publicList">
					@foreach($bandata as $b)
					<li>
						<span>{{date('Y-m-d',$b->ban_time)}}</span>
						<a href="{{url('bank/'.$b->ban_id)}}" title="{{$b->ban_name}}">{{$b->ban_name}}</a>
					</li>
					@endforeach
				</ul>

			</div>

		</div>
		<!-- 左边代码结束 -->
		
		<!-- 右边代码开始 -->
		<div class="mainRight fr" id="banner">

			<!-- 人物风采代码开始 -->
			<div class="banner">
				
				<h1><a href=""><img src="{{asset('resources/views/home/images/banner2.png')}}"></a></h1>
				<ul class="bannerul">
					@foreach($needata as $n)
					<li>					
						<span>{{date('Y-m-d',$n->nee_time)}}</span>
						<a href="{{url('need/'.$n->nee_id)}}" title="{{$n->nee_name}}">{{$n->nee_name}}</a>
					</li>
					@endforeach
				</ul>

			</div>
			<!-- 人物风采代码开始 -->

			<!-- 人物风采代码开始 -->
			<div class="banner">
				
				<h1><a href=""><img src="{{asset('resources/views/home/images/banner3.png')}}"></a></h1>
				<ul class="bannerul">
					@foreach($assdata as $a)
					<li>					
						<span>{{date('Y-m-d',$a->ass_time)}}</span>
						<a href="{{url('assess/'.$a->ass_id)}}" title="{{$a->ass_name}}">{{$a->ass_name}}</a>
					</li>
					@endforeach
				</ul>

			</div>
			<!-- 人物风采代码开始 -->
		
		</div>
		<!-- 右边代码结束 -->

	</div>
	<!-- 主体部分代码结束 -->

	<!-- 支部生活代码开始 -->
	<div class="alink">

		<h1 class="fl">推<br/>荐<br/>技<br/>术</h1>
		
		<ul class="fl" id="alink">
			<?php $i=0; ?>
			@foreach($frudata as $k)
				@if($i<6)
					<li title="{{$k->fru_name}}">
						<img src="{{$k->fru_thumb}}">
						<a href="{{url('fruit/'.$k->fru_id)}}">{{$k->fru_name}}</a>
						<i></i>
					</li>
				@endif
				<?php $i++; ?>
			@endforeach
		</ul>

	</div>
	<!-- 支部生活代码结束 -->

@endsection