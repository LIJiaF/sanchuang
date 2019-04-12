@extends('layouts.home')
@section('title','金汇智谷——科技导航')
@section('content')
	<link rel="stylesheet" type="text/css" href="{{asset('resources/views/home/css/teachering.css')}}">
	
	<div class="link_container">

		<div class="linkclass">
			<h1 class="linkclass_title">政策导航</h1>
			<ul class="linkclass_nav">
	        	@foreach($lindata1 as $i)
	        		<li><a href="{{$i->lin_href}}" title="{{$i->lin_name}}" target="_blank">{{$i->lin_name}}</a></li>
	        	@endforeach
			</ul>
		</div>

		<div class="linkclass">
			<h1 class="linkclass_title">资讯导航</h1>
			<ul class="linkclass_nav">
	        	@foreach($lindata2 as $i)
	        		<li><a href="{{$i->lin_href}}" title="{{$i->lin_name}}" target="_blank">{{$i->lin_name}}</a></li>
	        	@endforeach
			</ul>
		</div>

		<div class="linkclass">
			<h1 class="linkclass_title">专利导航</h1>
			<ul class="linkclass_nav">
	        	@foreach($lindata3 as $i)
	        		<li><a href="{{$i->lin_href}}" title="{{$i->lin_name}}" target="_blank">{{$i->lin_name}}</a></li>
	        	@endforeach
			</ul>
		</div>

		<div class="linkclass">
			<h1 class="linkclass_title">活动导航</h1>
			<ul class="linkclass_nav">
	        	@foreach($lindata4 as $i)
	        		<li><a href="{{$i->lin_href}}" title="{{$i->lin_name}}" target="_blank">{{$i->lin_name}}</a></li>
	        	@endforeach
			</ul>
		</div>

	</div>

@endsection