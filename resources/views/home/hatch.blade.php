@extends('layouts.home')
@section('title','金汇智谷——科技孵化')
@section('content')
	<link rel="stylesheet" type="text/css" href="{{asset('resources/views/home/css/teachering.css')}}">

	<div class="fruitclass">
		<table>
			<tr>
				<td width="80">机构等级：</td>
				<td>
					<ul>
						<li><a href="">不限</a></li>
						<li><a href="">中国科学院</a></li>
						<li><a href="">国家级</a></li>
						<li><a href="">省级</a></li>
						<li><a href="">市级</a></li>
					</ul>
				</td>
			</tr>
			<tr>
				<td width="80">所在地：</td>
				<td>
					<ul>
						<li><a href="">全国</a></li>
                        <li><a href="">广东</a></li>
                        <li><a href="">北京</a></li>
                        <li><a href="">福建</a></li>
                        <li><a href="">安徽</a></li>
                        <li><a href="">重庆</a></li>
                        <li><a href="">甘肃</a></li>
                        <li><a href="">广西</a></li>
                        <li><a href="">贵州</a></li>
                        <li><a href="">海南</a></li>
                        <li><a href="">河北</a></li>
                        <li><a href="">黑龙江</a></li>
                        <li><a href="">河南</a></li>
                        <li><a href="">江苏</a></li>
                        <li><a href="">江西</a></li>
                        <li><a href="">吉林</a></li>
                        <li><a href="">辽宁</a></li>
                        <li><a href="">内蒙古</a></li>
                        <li><a href="">宁夏</a></li>
                        <li><a href="">青海</a></li>
                        <li><a href="">山东</a></li>
                        <li><a href="">上海</a></li>
                        <li><a href="">山西</a></li>
                        <li><a href="">陕西</a></li>
                        <li><a href="">四川</a></li>
                        <li><a href="">天津</a></li>
                        <li><a href="">新疆</a></li>
                        <li><a href="">西藏</a></li>
                        <li><a href="">云南</a></li>
                        <li><a href="">浙江</a></li>
                        <li><a href="">台湾</a></li>
                        <li><a href="">香港</a></li>
                        <li><a href="">澳门</a></li>
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
			<h1 class="title">科技孵化&nbsp;&nbsp;&nbsp;<small>信息列表</small></h1>
			<div style="min-height:500px;">
			@foreach($hatdata as $h)
			<p class="content">
				<a href="{{url('hatch/'.$h->hat_id)}}" title="{{$h->hat_name}}">{{$h->hat_name}}</a>
				<span class="time">{{date('Y-m-d',$h->hat_time)}}</span>
			</p>
			@endforeach
			</div>
			<div class="page">
				{{$hatdata->links()}}
			</div>
			<!-- 教改科研板块结束 -->

		</div>
		<!-- 左边栏结束 -->

		<!-- 右边栏开始 -->
		<div class="con-right">

			<h1 class="con-right-title"><a href="{{url('admin/hatch')}}">我要发起孵化需求</a></h1>
			
			<!-- 点击排行开始 -->
			<div class="view">
				<h1 class="view-title">点击排行</h1>
				<ul>
					<?php $i=1; ?>
					@foreach($hatview as $v)
					<li><span class="block" style="background:#3BC9CB;"><?php echo $i; ?></span><a href="{{url('hatch/'.$v->hat_id)}}" title="{{$v->hat_name}}">{{$v->hat_name}}</a></li>
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
					@foreach($hattime as $t)
					<li><span class="block" style="background:#3BC9CB;"><?php echo $i; ?></span><a href="{{url('hatch/'.$t->hat_id)}}" title="{{$t->hat_name}}">{{$t->hat_name}}</a></li>
					<?php $i++; ?>
					@endforeach
				</ul>
			</div>
			<!-- 最新文章结束 -->

		</div>
		<!-- 右边栏结束 -->

	</div>

@endsection