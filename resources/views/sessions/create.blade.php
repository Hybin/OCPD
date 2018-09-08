@extends('layouts.default')
@section('title', '登录')

@section('content')
	<div class="jumbotron" id="signin-card">
		@include('shared._errors')
		@include('shared._messages')
		<div id="login" class="signin-page">
			<img src="{{ asset('/images/planet2.png') }}">
			<h3>登录账户</h3>
			<form method="POST" action="{{ route('login') }}">
				{{ csrf_field() }}
				<input type="text" name="email" class="form-control" value="{{ old('email') }}" placeholder="邮箱">
				<input type="password" name="password" class="form-control" value="{{ old('password') }}" placeholder="密码">
				<label style="float: left;"><input type="checkbox" name="remember">记住我</label>
				<br>
				<button type="submit" id="submit">登录</button>
				<a href="/" id="cancel">返回</a>
			</form>
			<hr>
			<p>还没有账号？<a href="{{ route('signup') }}">现在注册</a></p>
		</div>
@endsection
