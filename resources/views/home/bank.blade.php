@extends('layouts.home')
@section('title','金汇智谷——科技金融')
@section('content')
	<link rel="stylesheet" type="text/css" href="{{asset('resources/views/home/css/teachering.css')}}">

	<div class="fruitclass">
		<table>
			<tr>
				<td width="80">融资领域：</td>
				<td>
					<ul>
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
					</ul>
				</td>
			</tr>
			<tr>
				<td width="80">融资方式：</td>
				<td>
					<ul>
                    	<li><a href="">其他</a></li>
                       	<li><a href="">短期融资</a></li>
                       	<li><a href="">银行贷款</a></li>
                       	<li><a href="">委托贷款</a></li>
                       	<li><a href="">金融租赁</a></li>
                       	<li><a href="">个人贷款</a></li>
                       	<li><a href="">IPO上市</a></li>
                       	<li><a href="">股权转让</a></li>
                       	<li><a href="">产权转让</a></li>
                       	<li><a href="">投资加盟</a></li>
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
			<h1 class="title">科技金融&nbsp;&nbsp;&nbsp;<small>信息列表</small></h1>
			<div style="min-height:500px;">
			@foreach($bandata as $b)
			<p class="content">
				<a href="{{url('bank/'.$b->ban_id)}}" title="{{$b->ban_name}}">{{$b->ban_name}}</a>
				<span class="time">{{date('Y-m-d',$b->ban_time)}}</span>
			</p>
			@endforeach
			</div>
			<div class="page">
				{{$bandata->links()}}
			</div>
			<!-- 教改科研板块结束 -->

		</div>
		<!-- 左边栏结束 -->

		<!-- 右边栏开始 -->
		<div class="con-right">

			<h1 class="con-right-title"><a href="{{url('admin/bank')}}">我要发布项目</a></h1>
			
			<!-- 点击排行开始 -->
			<div class="view">
				<h1 class="view-title">点击排行</h1>
				<ul>
					<?php $i=1; ?>
					@foreach($banview as $v)
					<li><span class="block" style="background:#3BC9CB;"><?php echo $i; ?></span><a href="{{url('bank/'.$v->ban_id)}}" title="{{$v->ban_name}}">{{$v->ban_name}}</a></li>
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
					@foreach($bantime as $t)
					<li><span class="block" style="background:#3BC9CB;"><?php echo $i; ?></span><a href="{{url('bank/'.$t->ban_id)}}" title="{{$t->ban_name}}">{{$t->ban_name}}</a></li>
					<?php $i++; ?>
					@endforeach
				</ul>
			</div>
			<!-- 最新文章结束 -->

		</div>
		<!-- 右边栏结束 -->

	</div>

@endsection