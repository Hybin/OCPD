@extends('layouts.default')
@section('title', '注册')

@section('content')
	<div class="jumbotron" style="padding: 0;">
         <div id="register" class="signup-page">
             <h3>注册账户</h3>
             <form method="POST" action="{{ route('users.store') }}" id="signup">
                 {{ csrf_field() }}
                 <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="用户名">
				 <input type="text" name="email" class="form-control" value="{{ old('email') }}" placeholder="邮箱">
                 <input type="text" name="institute" class="form-control" value="{{ old( 'institute') }}" placeholder="工作单位">
                 <input type="password" name="password" class="form-control" value="{{ old('password') }}" placeholder="密码">
                 <input type="password" name="password_confirmation" class="form-control " value="{{ old('password_confirmation') }}" placeholder="确认密码">
                 <button type="submit" id="submit" class="btn-signup">注册</button>
                 <a href="/login" id="cancel" class="btn-signup">返回</a>
             </form>
         </div>
     </div>
@stop
