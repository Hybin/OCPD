@extends('layouts.default')
@section('title', '登錄')

@section('content')
	<div class="jumbotron" id="signin-card">
		@include('shared._errors')
		@include('shared._messages')
		<div id="login" class="signin-page">
			<img src="{{ asset('/images/planet2.png') }}">
			<h3>登錄賬戶</h3>
			<form method="POST" action="{{ route('login') }}">
				{{ csrf_field() }}
				<input type="text" name="email" class="form-control" value="{{ old('email') }}" placeholder="郵箱">
				<input type="password" name="password" class="form-control" value="{{ old('password') }}" placeholder="密碼">
				<label style="float: left;"><input type="checkbox" name="remember">記住我</label>
				<br>
				<button type="submit" id="submit">登錄</button>
				<a href="/" id="cancel">返回</a>
			</form>
			<hr>
			<p>還沒有賬號？<a href="{{ route('signup') }}">現在註冊</a></p>
		</div>
@endsection
