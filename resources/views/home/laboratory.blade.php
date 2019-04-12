@extends('layouts.home')
@section('title','金汇智谷——共建实验室')
@section('content')
	<link rel="stylesheet" type="text/css" href="{{asset('resources/views/home/css/teachering.css')}}">	
	<style>
		#testBox{
			margin: 0 auto;
			width: 953px;
			height: 537px;
		}
	</style>
	<link rel="stylesheet" href="{{asset('resources/views/home/css/fz-video.css')}}">
	<link rel="stylesheet" href="{{asset('resources/views/home/font/iconfont.css')}}">
	
	<div class="laboratoryclass">
		<div id="testBox"></div>
	</div>

	<div class="laboratorycontainer">

		<h1>共建实验室</h1>

		<ul class="laboratorylist" id="laboratorylist">
			@foreach($labdata as $l)
			<li>
				<a href="javascript:;" data="{{$l->lab_src}}">
					<img src="{{$l->lab_thumb}}">
					<div class="laboratoryhide">
						<p>{{$l->lab_name}}</p>
						<p>截止时间：{{$l->lab_opentime}}</p>
					</div>
				</a>
				<p class="laboratorybtn">预约参观</p>
			</li>
			@endforeach
		</ul>

	</div>

	<script src="{{asset('resources/views/home/js/fz-video.js')}}"></script>
	<script>
	 	var FZ_VIDEO = new createVideo(
	 		"testBox",	//容器的id
	 		{
				url         : 'https://upload.wikimedia.org/wikipedia/commons/7/75/Big_Buck_Bunny_Trailer_400p.ogg',  //视频地址
	 			autoplay	: true				//是否自动播放
	 		}

		);

		$('#laboratorylist a').on('click',function(){
			FZ_VIDEO.setUrl($(this).attr('data'));//切换视频,传入视频地址进行切换
		});

		// var FZ_VIDEO = new createVideo(参数); //实例化并创建播放器
		// setTimeout(function(){
		// 	FZ_VIDEO.setUrl("https://upload.wikimedia.org/wikipedia/commons/7/75/Big_Buck_Bunny_Trailer_400p.ogg");//切换视频,传入视频地址进行切换
		// },5000);
		// FZ_VIDEO.overVideo(); //移除播放器,且销毁实例,销毁后可重新进行实例化播放器


	</script>

@endsection