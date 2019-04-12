@extends('layouts.home')
@section('title','金汇智谷——科技成果')
@section('content')
	<link rel="stylesheet" type="text/css" href="{{asset('resources/views/home/css/teachering.css')}}">

	<div class="fruitclass">
		<table>
			<tr>
				<td width="80">行业分类：</td>
				<td>
					<ul>
						<li><a href="">不限</a></li>
						<li><a href="">食品饮料</a></li>
						<li><a href="">建筑建材</a></li>
						<li><a href="">家居用品</a></li>
						<li><a href="">轻工纺织</a></li>
						<li><a href="">化学化工</a></li>
						<li><a href="">新能源</a></li>
						<li><a href="">机械</a></li>
						<li><a href="">环保和资源</a></li>
						<li><a href="">安全防护</a></li>
						<li><a href="">交通运输</a></li>
						<li><a href="">橡胶塑料</a></li>
						<li><a href="">仪器仪表</a></li>
						<li><a href="">新型材料</a></li>
						<li><a href="">电子信息</a></li>
						<li><a href="">医药与医疗</a></li>
						<li><a href="">航空航天</a></li>
						<li><a href="">采矿冶金</a></li>
						<li><a href="">电气自动化</a></li>
						<li><a href="">包装印刷</a></li>
						<li><a href="">教育休闲</a></li>
					</ul>
				</td>
			</tr>
			<tr>
				<td width="80">交易价格：</td>
				<td>
					<ul>
						<li><a href="">不限</a></li>
						<li><a href="">面议</a></li>
						<li><a href="">1-10万</a></li>
						<li><a href="">10-50万</a></li>
						<li><a href="">50-100万</a></li>
						<li><a href="">100-500万</a></li>
						<li><a href="">500-1000万</a></li>
						<li><a href="">1000万以上</a></li>
					</ul>
				</td>
			</tr>
		</table>
	</div>

	<div class="container">
		
		<!-- 左边栏开始 -->
		<div class="con-left">
			
			<!-- 教改科研板块开始 -->
			<h1 class="title">科技成果&nbsp;&nbsp;&nbsp;<small>信息列表</small></h1>
			
			<div style="min-height:500px;">
			@foreach($frudata as $f)
			<p class="content">
				<a href="{{url('fruit/'.$f->fru_id)}}" title="{{$f->fru_name}}">{{$f->fru_name}}</a>
				<span class="time">{{date('Y-m-d',$f->fru_time)}}</span>
			</p>
			@endforeach
			</div>
			<div class="page">
				{{$frudata->links()}}
			</div>
			<!-- 教改科研板块结束 -->

		</div>
		<!-- 左边栏结束 -->

		<!-- 右边栏开始 -->
		<div class="con-right">

			<h1 class="con-right-title"><a href="{{url('admin/fruit')}}">我要发布成果</a></h1>
			
			<!-- 点击排行开始 -->
			<div class="view">
				<h1 class="view-title">点击排行</h1>
				<ul>
					<?php $i=1; ?>
					@foreach($fruview as $v)
					<li><span class="block" style="background:#3BC9CB;"><?php echo $i; ?></span><a href="{{url('fruit/'.$v->fru_id)}}" title="{{$v->fru_name}}">{{$v->fru_name}}</a></li>
					<?php $i++; ?>
					@endforeach
				</ul>
			</div>
			<!-- 点击排行结束 -->

			<!-- 最新文章开始 -->
			<div class="view">
				<h1 class="view-title" style="background:#FD6E48;">最新文章</h1>
				<ul>					
					<?php $i=1; ?>
					@foreach($frutime as $t)
					<li><span class="block" style="background:#3BC9CB;"><?php echo $i; ?></span><a href="{{url('fruit/'.$t->fru_id)}}" title="{{$t->fru_name}}">{{$t->fru_name}}</a></li>
					<?php $i++; ?>
					@endforeach
				</ul>
			</div>
			<!-- 最新文章结束 -->

		</div>
		<!-- 右边栏结束 -->

	</div>

@endsection