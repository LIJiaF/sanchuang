<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>三创网后台——注册</title>
	<link rel="stylesheet" href="{{asset('resources/views/admin/style/css/ch-ui.admin.css')}}">
	<link rel="stylesheet" href="{{asset('resources/views/admin/style/font/css/font-awesome.min.css')}}">
</head>
<body style="background:#F3F3F4;">
	<div class="login_box">
		<h1>Welcome</h1>
		<h2>注册</h2>
		<div class="form">
			@if(count($errors)>0)
                @if(is_object($errors))
                    @foreach($errors->all() as $error)
                        <p style="color:red">{{$error}}</p>
                    @endforeach
                @else
                    <p style="color:red">{{$errors}}</p>
                @endif
	        @endif
			<form action="{{url('admin/register')}}" method="post">
				{{csrf_field()}}
				<ul>
					<li>
					<input type="text" name="username" class="text" placeholder="用户名" />
						<span><i class="fa fa-user"></i></span>
					</li>
					<li>
						<input type="password" name="password" class="text" placeholder="密码" />
						<span><i class="fa fa-lock"></i></span>
					</li>
					<li>
						<input type="password" name="password_confirmation" class="text" placeholder="确认密码" />
						<span><i class="fa fa-lock"></i></span>
					</li>
					<li>
						<input type="submit" value="立即注册"/>
					</li>
				</ul>
			</form>
			<p><a href="{{url('admin/login')}}">马上登录</a></p>
		</div>
	</div>
</body>
</html>
